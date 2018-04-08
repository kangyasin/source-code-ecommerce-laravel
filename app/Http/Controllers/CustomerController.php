<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Alamat;
use App\TsHdTransaksi;
use App\TsDtTransaksi;
use App\TsHdPayment;
use App\TsDtPayment;
use App\Bank;
use Crypt;
use Auth;
use \App\Mail\UserActivation;
use \App\Mail\CustomerConfirmation;
use Hash;
use Alert;
use CustomHelper;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('customer');
    // }
    //
    public function index(){
      if(auth('customer')->user()){
        return redirect('/customer/dashboard');
      }
        return view('front/customer/login');
    }

    public function login(Request $request){

      $email = $request->email;
      $password = $request->password;

      $cekstatus = Customer::whereEmail($email)->first();
      $status = $cekstatus['status'];

      if($cekstatus){
        if($status == 1){
          $status = Crypt::encrypt('confirmation');
          $email = Crypt::encrypt($email);
          return redirect('/customer/confirmation?status='.$status.'&email='.$email);
        }
      }else{
        $data = array(
          'status' => 'success',
          'pesan' => 'Email Anda Belum Terdaftar',
          'login' => '<h4>Email anda belum terdaftar <strong>Daftarkan Sekarang !!</strong>.</h4>',
          'button' => '<a href="/customer" class="primary-btn">Register</a>'
        );

        return view('front.customer.success',['DataKonfirmasi' => $data]);
      }

      $credentials = [
          'email' =>  $request->email,
          'password' =>  $request->password,
      ];

      $auth = Auth::guard('customer')->attempt($credentials);


      if($auth){
        return redirect('/customer/dashboard');
      }else{
        return "Gagal";
      }

      dd($request);
    }

    public function loginback(Request $request){

      $email = $request->email;
      $password = $request->password;

      $cekstatus = Customer::whereEmail($email)->first();
      $status = $cekstatus['status'];

      if($cekstatus){
        if($status == 1){
          $status = Crypt::encrypt('confirmation');
          $email = Crypt::encrypt($email);
          return redirect('/customer/confirmation?status='.$status.'&email='.$email);
        }
      }else{
        $data = array(
          'status' => 'success',
          'pesan' => 'Email Anda Belum Terdaftar',
          'login' => '<h4>Email anda belum terdaftar <strong>Daftarkan Sekarang !!</strong>.</h4>',
          'button' => '<a href="/customer" class="primary-btn">Register</a>'
        );

        return view('front.customer.success',['DataKonfirmasi' => $data]);
      }

      $credentials = [
          'email' =>  $request->email,
          'password' =>  $request->password,
      ];

      $auth = Auth::guard('customer')->attempt($credentials);


      if($auth){
        Alert::message('Selamat Datang!');
        alert()->flash('Selamat Datang!', 'success', [
          'text' => 'Login anda Berhasil!',
          'timer' => 3000
        ]);
        return redirect()->back();
      }else{
        Alert::message('Gagal Login!');
        alert()->flash('Gagal Login!', 'error', [
          'text' => 'Login gagal email atau password anda salah!',
          'timer' => 3000
        ]);
        return redirect()->back();
      }
    }

    public function register(Request $request){
      $this->validate($request , [
        'name' => 'required|min:5',
        'email' => 'email',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6'
      ]);

      $cekemail = Customer::where('email', $request->email)->first();

      if($cekemail){
          $id = Crypt::encryptString($cekemail->id);
          return redirect('/customer/existemail/'.$id);
      }

      $customer = new Customer();
      $customer->nama = $request->name;
      $customer->email = $request->email;
      $customer->status = 1;
      $customer->password = bcrypt($request->password);
      $customer->save();

      //$details['email'] = 'bb81395ba3-7e0612@inbox.mailtrap.io';
      //$this->dispatch(new ProcessPhoto($id, $file_name));
      // dispatch(new \App\Jobs\SendEmail($data));

      $job = (new \App\Jobs\SendEmail($customer))->delay(15);
      $this->dispatch($job);

      //\Mail::to('bb81395ba3-7e0612@inbox.mailtrap.io')->send(new CustomerConfirmation($customer));

      return redirect('/customer/success');
    }

    public function logout()
    {
      Auth::guard('customer')->logout();
      return redirect('/');

    }

    function existemail($id){
      $id = Crypt::decryptString($id);
      $DataCustomer = Customer::find($id);

      return view('front/customer/emailexist', ['DataCustomer' => $DataCustomer]);
    }

    function updateregister(Request $request){

      $this->validate($request , [
        'name' => 'required|min:5',
        'email' => 'email',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6'
      ]);

      $id = Crypt::decryptString($request->id);
      $customer = Customer::find($id);
      $customer->password = bcrypt($request->password);
      $customer->save();

      $job = (new \App\Jobs\SendEmail($customer))->delay(15);
      $this->dispatch($job);

      //\Mail::to('bb81395ba3-7e0612@inbox.mailtrap.io')->send(new \App\Mail\UserActivation($customer));

      $status = Crypt::encrypt('confirmation');
      $email = Crypt::encrypt($customer->email);
      return redirect('/customer/confirmation?status='.$status.'&email='.$email);
    }

    public function verify()
    {
        if (empty(request('token'))) {
            // if token is not provided
            return redirect()->route('/customer/register');
        }
        $token = request('token');
        // decrypt token as email
        $decryptedEmail = Crypt::decrypt($token);
        // find user by email
        $customer = Customer::whereEmail($decryptedEmail)->first();
        //dd($customer);

        if ($customer->status == 2) {
            $status = Crypt::encrypt('activated');
            return redirect('/customer/confirmation?status='.$status);
        }

        // otherwise change user status to "activated"
        $customer->status = 2;
        $customer->save();

        $status = Crypt::encrypt('succes');
        return redirect('/customer/confirmation?status='.$status.'&email='.$token);
        //autologin
        //Auth::loginUsingId($customer->id);
        //return redirect('/home');

    }

    public function resend(){
      $email = Crypt::decrypt(request('email'));
      $customer = Customer::whereEmail($email)->first();
      \Mail::to('bb81395ba3-7e0612@inbox.mailtrap.io')->send(new \App\Mail\UserActivation($customer));

      $data = array(
        'status' => 'success',
        'pesan' => 'Verifikasi Email Anda.',
        'login' => '<h4>Silahkan lakukan konfirmasi pendaftaran pada <strong>Email Anda Sekarang !!</strong>.</h4>',
        'button' => '<a href="/customer" class="primary-btn">Login</a>'
      );

      return view('front.customer.success',['DataKonfirmasi' => $data]);
    }

    public function confirmation(){
        $status = request('status');
        $info = Crypt::decrypt($status);

        $data = array(
          'status' => 'success',
          'pesan' => 'Selamat Konfirmasi Email Anda Berhasil.',
          'login' => '<h4>Silahkan masuk kedalam akun anda <strong>Sekarang !!</strong>.</h4>',
          'button' => '<a href="/customer" class="primary-btn">Login</a>'
        );

        if($info == 'activated'){
          $data = array(
            'status' => 'activated',
            'pesan' => 'Email Anda Sudah Dikonfirmasi.',
            'login' => '<h4>Silahkan masuk kedalam akun anda <strong>Sekarang !!</strong>.</h4>',
            'button' => '<a href="/customer" class="primary-btn">Login</a>'
          );
        }elseif($info == 'confirmation'){
          //$email = Crypt::decrypt(request('email'));
          $data = array(
            'status' => 'confirmation',
            'pesan' => 'Silahkan Konfirmasi Email Anda.',
            'login' => '<h4>Silahkan konfirmasi <strong>Email anda !!</strong>.</h4>',
            'button' => '<a href="/customer/resend?email='.request('email').'" class="primary-btn">Konfirmasi Email</a>'
          );
        }

        return view('front.customer.confirmation', ['DataKonfirmasi' => $data]);
    }

    public function success(){
        $data = array(
          'status' => 'success',
          'pesan' => 'Pendaftaran Akun Anda Berhasil.',
          'login' => '<h4>Silahkan lakukan konfirmasi pendaftaran pada <strong>Email Anda Sekarang !!</strong>.</h4>',
          'button' => '<a href="/customer" class="primary-btn">Login</a>'
        );

        return view('front.customer.success',['DataKonfirmasi' => $data]);
    }


    public function forgotpassword(){
        return view('front/customer/forgot_password');
    }

    public function doforgot(Request $request){
      $customer = Customer::whereEmail($request->email)->first();
      $job = (new \App\Jobs\ForgotPassword($customer))->delay(3);
      $this->dispatch($job);
    }

    public function changepassword(){
        return view('front/customer/changepassword');
    }

    public function updatepassword(Request $request){
      dd($request);
    }


    ///// ROUTE DASHBOARD /////

    public function dashboard(){
      $DataCustomer = auth('customer')->user();
      return view('front.member.dashboard', ['DataCustomer'=>$DataCustomer]);
    }

    public function ubahpassword(Request $request){
      $current_password = bcrypt($request->current_password);
      $newpassword = bcrypt($request->new_password);

      if (!(Hash::check($request->current_password, auth('customer')->user()->password))) {
           return redirect()->back()->with("status","Password yang anda masukan salah.");
      }


      if(strcmp($request->current_password, $request->new_password) == 0){
          return redirect()->back()->with("status","Password baru tidak boleh sama dengan password lama anda.");
      }


      $this->validate($request , [
        'current_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required_with:new_password|same:new_password|min:6'
      ]);

      $user = auth('customer')->user();
      $user->password = bcrypt($request->get('new_password'));
      $user->save();

      return redirect()->back()->with("success","Ubah password berhasil.");

    }

    public function updateprofile(Request $request){
      $password = bcrypt($request->password);

      if (!(Hash::check($request->password, auth('customer')->user()->password))) {
           return redirect()->back()->with("error_profile","Password yang anda masukan salah.");
      }

      $user = auth('customer')->user();
      $user->email = $request->get('email');
      $user->save();

      return redirect()->back()->with("success_profile","Update profile berhasil.");

    }

    public function alamat(){
      $AuthCustomer = auth('customer')->user();
      $DataAlamat = Customer::find($AuthCustomer->id);
      return view('front.member.alamat', ['DataAlamat' => $DataAlamat]);
    }

    public function setalamat($id){
      $DataAlamat = Alamat::find($id);
      $idCustomer = $DataAlamat->customer_id;
      Alamat::where([['customer_id', $idCustomer], ['main', 1]])->update(['main' => 0]);
      Alamat::where('id', $id)->update(['main' => 1]);


      return redirect()->back()->with("success","Data utama alamat berhasil diubah.");

    }

    public function getdataalamat(Request $request){
      $id = $request->id_alamat;
      $DataAlamat = Alamat::find($id);

      return '
      <input type="hidden" name="id" value="'.$DataAlamat->id.'" />
      <div class="form-group">
        <label>Nama Alamat</label>
        <input type="text" value="'.$DataAlamat->namalamat.'" name="namalamat" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required>'.$DataAlamat->alamat.'</textarea>
      </div>
      <div class="form-group">
        <label>No Telp</label>
        <input type="text" value="'.$DataAlamat->notelp.'" name="notelp" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Kota</label>
        <input type="text" value="'.$DataAlamat->kota.'" name="kota" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Kode Pos</label>
        <input type="text" value="'.$DataAlamat->kodepos.'" name="kodepos" class="form-control" required>
      </div>
      ';

    }

    public function detailalamat(Request $request){
      $DataAlamat = Alamat::where('id', $request->id_alamat)->first();
        return '<strong>'.$DataAlamat->namalamat.'</strong><br/>
        <i>Alamat : </i> '.$DataAlamat->alamat.', '.$DataAlamat->provinsi.', '.$DataAlamat->kota.' - '.$DataAlamat->kodepos.'<br/>
        <i>No Telp : </i> '.$DataAlamat->notelp.'
        <input type="hidden" class="datakota" value="'.$DataAlamat->id_kota.'"/>';
    }

    public function updatealamat(Request $request){

      $DataAlamat = Alamat::find($request->id);
      $DataAlamat->namalamat = $request->namalamat;
      $DataAlamat->alamat = $request->alamat;
      $DataAlamat->notelp = $request->notelp;
      $DataAlamat->kota = $request->kota;
      $DataAlamat->kodepos = $request->kodepos;
      $DataAlamat->save();

      return redirect()->back()->with("success","Alamat telah berhasil diubah.");
    }

    public function deletealamat($id){
        Alert::message('Welcome back!');
        $DataAlamat = Alamat::find($id);
        //$DataAlamat->delete();
        // alert()->flash('Berhasil', 'success', [
        // 'text' => 'Alamat berhasil dihapus'
        // ]);

      //   alert()->flash('Are you sure?', 'warning',[
      //     'text' => 'You won\'t be able to revert this!',
      //     'showCancelButton' => true,
      //     'confirmButtonColor' => '#3085d6',
      //     'cancelButtonColor' => '#d33',
      //     'confirmButtonText' => 'Yes, delete it!',
      //     // if user clicked Yes, delete it!
      //     // then this will run
      //     'deleted' => 'Deleted!',
      //     'msg' => 'Your file has been deleted.',
      //     'type' => 'success'
      // ]);
        return redirect()->back();
    }

    public function transaksi(){
      $AuthCustomer = auth('customer')->user();
      $DataTransaksi = TsHdTransaksi::where('customer_id', $AuthCustomer->id);
      dd($DataTransaksi);
      return view('front.member.alamat', ['DataAlamat' => $DataAlamat]);
    }



}
