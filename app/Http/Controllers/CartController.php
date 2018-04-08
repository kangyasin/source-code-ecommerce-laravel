<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;
use App\Alamat;
use App\TsHdTransaksi;
use App\TsDtTransaksi;
use App\Product;
use App\LogStocks;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    //

    public function index()
    {
      //  $id_product = Session::flash('cart.items', $id);
      $ProductData = Product::with('stokproduct','picture')->orderBy('id', 'DESC')->get();
        return view('front/cart', ['ProductData' => $ProductData]);
    }

    public function hapus(){
      Session::pull('cart.items');
    }

    public function store(Request $request)
    {
      $sessioncart = Session::get('cart.items');

        $product = Product::where('id',$request->id)->first();
        if(Session::get('cart.items')){

          foreach (Session::get('cart.items') as $key => $value) {

            if($sessioncart[$key]['id'] == $request->id){
              session()->forget('cart.items.'.$key);
              $qty = $sessioncart[$key]['qty'] + $request->qty;
            }else{
              $qty = $request->qty;
            }

              $totalqty = $qty;
              $harga = $product->harga;
              $totalharga = $totalqty * $harga;

              $dataStore =array(
                  'id' =>$request->id,
                  'name' =>$request->name,
                  'price' =>$request->price,
                  'image' =>$request->image,
                  'diskon' =>$request->diskon,
                  'color' =>$request->color,
                  'size' =>$request->size,
                  'total' =>$totalharga,
                  'berat' =>$request->berat,
                  'qty' =>$totalqty,
                  'ongkir' =>0,
              );


            }

        }else{

          $totalqty = $request->qty;
          $harga = $request->price;
          $totalharga = $totalqty * $harga;

          $dataStore =array(
              'id' =>$request->id,
              'name' =>$request->name,
              'price' =>$request->price,
              'image' =>$request->image,
              'diskon' =>$request->diskon,
              'color' =>$request->color,
              'size' =>$request->size,
              'berat' =>$request->berat,
              'total' =>$totalharga,
              'qty' =>$totalqty,
              'ongkir' =>0,
          );

        }
        Session::push('cart.items', $dataStore);



        return redirect('/cart');
        //return redirect('/cart')->withSuccessMessage('Item was added to your cart!');
    }

    public function destroy($id)
    {

      $remove = Product::where('id',$id)->first();

      if(Session::has('cart.items')){
      	foreach (Session::get('cart.items') as $key => $value) {
          // dd($value['id'].'/'.$id);
      		if($value['id'] === $id){
      			Session::pull('cart.items.'.$key); // retrieving pen and removing
      		}
      	}
      }

      return redirect('/cart');
        //return redirect('/cart')->withSuccessMessage('Item has been removed!');
    }

    public function checkout(Request $request){


      $tanggal = date('Y-m-d');
      if($request->alamat){

        $customers_id = auth('customer')->user()->id;
        $id_alamat = $request->alamat;

      }else{

          $namadepan = $request->namadepan;
          $namabelakang = $request->namabelakang;


          $cekcustomer = Customer::where('email', $request->email)->first();

          if($cekcustomer){
            $customers_id = $cekcustomer->id;
          }else{
            $customers = new Customer();
            $customers->nama = $namadepan.' '.$namabelakang;
            $customers->email =  $request->email;
            $customers->notelp =  $request->tel;
            $customers->password =  "";
            $customers->save();
            $customers_id = $customers->id;
          }

          //Alamat::create(['customer_id' => $customers_id, 'notelp' =>$request->tel,'alamat' => $request->address,'kota' => $request->city,'kodepos' => $request->kodepos]);

          $alamat = new Alamat();
          $alamat->customer_id = $customers_id;
          $alamat->id_kota = $request->city;
          $alamat->provinsi = $request->nameprovinsi;
          $alamat->kota = $request->namekota;
          $alamat->namalamat = $request->namekota;
          $alamat->notelp = $request->tel;
          $alamat->alamat = $request->address;
          $alamat->kodepos =  $request->kodepos;
          $alamat->main =  0;
          $alamat->save();

          $id_alamat = $alamat->id;

      }

      $headertransaksi = new TsHdTransaksi();
      $headertransaksi->customer_id = $customers_id;
      $headertransaksi->totaldiskon = 0;
      $headertransaksi->statuspembelian = 0;
      $headertransaksi->tanggaltransaksi = $tanggal;
      $headertransaksi->totalpembelian = $request->total;
      $headertransaksi->totalberat = $request->berat;
      $headertransaksi->kurir = $request->kurir;
      $headertransaksi->kurirpaket = $request->paket;
      $headertransaksi->totalongkir = $request->ongkir;
      $headertransaksi->noresi = 0;
      $headertransaksi->alamat = $id_alamat;
      $headertransaksi->save();

      $hd_id = $headertransaksi->id;

      $product = array();
      foreach ($request->id_order as $key => $id) {
        //return $request->qty[$key];
        $product = Product::where('id', $id)->first();
        $getstok = LogStocks::where('detailproducts_id', $product->id)->orderBy("id","DESC")->first();
        $qtybeli = $request->qty[$key];
        $totalstok = $getstok->totalstok;

        $sisastok = $totalstok - $qtybeli;

        $updatestok = LogStocks::find($getstok->id);
        $updatestok->totalstok = $sisastok;
        $updatestok->save();

        $dtTransaksi = new TsDtTransaksi;
        $dtTransaksi->ts_hdtransaksi_id = $hd_id;
        $dtTransaksi->detailproducts_id = $product->id;
        $dtTransaksi->jumlahpembelian = $request->qty[$key];
        $dtTransaksi->harga = $product->harga;
        $dtTransaksi->save();
      }

      $job = (new \App\Jobs\SendingInvoice($hd_id))->delay(15);
      $this->dispatch($job);

      Session::forget('cart.items');
      $id = Crypt::encryptString($hd_id);
      return redirect('/checkout/success/'.$id);

    }

}
