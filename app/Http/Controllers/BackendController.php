<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserGroups;
use App\UserAdmin;
use App\CategoryProduct;
use App\Product;
use App\Menu;
use App\LogStocks;
use App\ImageProduct;
use Session;
use App\Http\Requests\UploadRequest;
use File;
use Auth;
use App\Banner;
use App\About;
use App\Faq;
use App\TsHdTransaksi;
use App\TsDtTransaksi;
use App\TsHdPayment;
use App\TsDtPayment;
use App\Customer;
use App\Bank;
use App\ConfigShop;
use Hash;
use CustomHelper;
use Excel;
class BackendController extends Controller
{
    //
    //
    function __construct(){
      //$this->middleware(loginadmin);
    }

    public function index()
    {


        return view('backend/login');
    }

    function seo_friendly_url($string){
        $string = str_replace(array('[\', \']'), '', $string);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
        return strtolower(trim($string, '-'));
    }

    public function dologin(Request $request)
    {

          $email = $request->email;
          $password = $request->password;

          $credentials = [
              'email' =>  $request->email, // Nomor email useradmin
              'password' =>  $request->password,
          ];
          //$auth->attempt($credentials);

          $auth = Auth::guard('useradmin')->attempt($credentials);

          // if ($auth) {
          //
          //     return redirect('/administrator/dashboard');
          //     //Session::forget('UserID'); // menghapus session tertentu
          //     //Session::flush(); // menghapus semua Session
          // }

          if ($auth){
              return redirect('/administrator/dashboard');
              }else{
                return "Gagal";
              }



    }

    public function register()
    {
      $usergroup = UserGroups::where('id', '>', 1)->get();
      return view('backend/register', ['usergroup' => $usergroup]);
    }

    public function doregister(Request $request)
    {

      // return $request->groupadmin;

      $this->validate($request , [
        'groupadmin' => 'required',
        'username' => 'required|min:5',
        'email' => 'email',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6'
      ]);

      $useradmin = new UserAdmin();
      $useradmin->usergroups_id = $request->groupadmin;
      $useradmin->name = $request->username;
      $useradmin->email = $request->email;
      $useradmin->password = bcrypt($request->password);
      $useradmin->save();

      return redirect('/administrator');

    }

    public function dashboard()
    {
      // $getprovinsi = new CustomHelper;
      // dd($getprovinsi->getKota(6));
      return view('backend/dashboard');
    }

    public function logout()
    {

      Auth::guard('useradmin')->logout();
      return redirect('/administrator');

    }


    /////////// CONFIG MEMBER ////////////

    public function member()
    {
      $customer = Customer::where('status', 2)->get();
      return view('backend/customer/main',['Customer'=>$customer]);

    }

    public function nonmember()
    {
      $customer = Customer::where('status', 0)->get();
      return view('backend/customer/main',['Customer'=>$customer]);
    }

    //////////// CONTROL MENU LEVEL 1 ///////////////
    public function configmenu()
    {
      $menu = Menu::where('parent_number', 0)->get();

      $datamenu = array();
      foreach ($menu as $menus) {
        $sub = Menu::where([['parent_number', $menus->id]])->get();
        // array_push($datamenu, $sub);
        $count = count($sub);
        $datamenu[$menus->id] = $count;
      }
      return view('backend/config/menu/main', ['menu' => $menu, 'count' => $datamenu]);

    }

    public function addmenu()
    {
      return view('backend/config/menu/insert');
    }

    public function insertmenu(Request $request)
    {
        $publish = $request->publish;
        if($publish == 'on'){
            $publish = 1;
        }else{
            $publish = 0;
        }

        $menu = new Menu();
        $menu->controller = $request->controller;
        $menu->icon = $request->icon;
        $menu->namamenu = $request->namamenu;
        $menu->menulevel = $request->menulevel;
        $menu->parent_number = 0;
        $menu->sort = 0;
        $menu->publish = $publish;
        $menu->type = $request->type;
        $menu->save();

        return redirect('/administrator/configmenu');
    }

    public function editmenu($menu_id)
    {
        $datamenu = Menu::find($menu_id);
        return view('/backend/config/menu/edit', ['datamenu' => $datamenu]);
    }

    public function updatemenu(Request $request, $menu_id)
    {

      $publish = $request->publish;
      if($publish == 'on'){
          $publish = 1;
      }else{
          $publish = 0;
      }

      $menu = Menu::find($menu_id);
      $menu->controller = $request->controller;
      $menu->icon = $request->icon;
      $menu->namamenu = $request->namamenu;
      $menu->menulevel = $request->menulevel;
      $menu->parent_number = 0;
      $menu->sort = 0;
      $menu->publish = $publish;
      $menu->type = $request->type;
      $menu->save();

      return redirect('/administrator/configmenu');
    }

    public function deletemenu($id)
    {
        $product = Menu::destroy($id);
        return redirect('/administrator/configmenu');
    }

    public function publishmenu($id, $publish)
    {

      if($publish == 1)
      {
        $publish = 0;
      }else{
        $publish = 1;
      }

      $menu = Menu::where('id', $id)
            ->update(['publish' => $publish]);
      return redirect('/administrator/configmenu');

    }

    public function childmenu($id)
    {
      $menu = Menu::where('parent_number', $id)->get();
      return view('backend/config/childmenu', ['menu' => $menu]);

    }

    /////// END CONFIG MENU LEVEL 1 ///////////


    //////////// CONTROL MENU LEVEL 1 ///////////////
    public function configmenuchild($id)
    {
      $menu = Menu::where('parent_number', $id)->get();
      return view('backend/config/childmenu/main', ['menu' => $menu]);

    }

    public function addmenuchild()
    {
      return view('backend/config/childmenu/insert');
    }

    public function insertmenuchild(Request $request, $id)
    {
        $publish = $request->publish;
        if($publish == 'on'){
            $publish = 1;
        }else{
            $publish = 0;
        }

        $menu = new Menu();
        $menu->controller = $request->controller;
        $menu->icon = $request->icon;
        $menu->namamenu = $request->namamenu;
        $menu->menulevel = $request->menulevel;
        $menu->parent_number = $id;
        $menu->sort = 0;
        $menu->publish = $publish;
        $menu->type = $request->type;
        $menu->save();

        return redirect('/administrator/configmenuchild/'.$id);
    }

    public function editmenuchild($id, $id_child)
    {
        $datamenu = Menu::find($id_child);
        return view('/backend/config/childmenu/edit', ['datamenu' => $datamenu]);
    }

    public function updatemenuchild(Request $request, $id, $id_child)
    {

      $publish = $request->publish;
      if($publish == 'on'){
          $publish = 1;
      }else{
          $publish = 0;
      }

      $menu = Menu::find($id_child);
      $menu->controller = $request->controller;
      $menu->icon = $request->icon;
      $menu->namamenu = $request->namamenu;
      $menu->publish = $publish;
      $menu->type = $request->type;
      $menu->save();

      return redirect('/administrator/configmenuchild/'.$id);
    }

    public function deletemenuchild($id, $id_child)
    {
        $product = Menu::destroy($id_child);
        return redirect('/administrator/configmenuchild/'.$id);
    }

    public function publishmenuchild($id, $id_child, $publish)
    {

      if($publish == 1)
      {
        $publish = 0;
      }else{
        $publish = 1;
      }

      $menu = Menu::where('id', $id_child)
            ->update(['publish' => $publish]);
      return redirect('/administrator/configmenuchild/'.$id);

    }

    /////// END CONFIG MENU LEVEL 1 ///////////


    /////// CONFIG USER ////////
    public function configuser()
    {
      $usergroups = UserGroups::all();
      return view('backend/config/usergroup/main', ['usergroups' => $usergroups]);

    }

    public function addusergroup()
    {
      return view('backend/config/usergroup/insert');
    }

    public function insertusergroup(Request $request)
    {

      $menu = new UserGroups();
      $menu->namagroup = $request->namagroup;
      $menu->save();

      return redirect('/administrator/configuser');
    }

    public function editusergroup($id)
    {
      $usergroups = UserGroups::find($id);
      return view('backend/config/usergroup/edit', ['usergroups' => $usergroups]);

    }

    public function updateusergroup(Request $request, $id)
    {

      $menu = UserGroups::find($id);
      $menu->namagroup = $request->namagroup;
      $menu->save();

      return redirect('/administrator/configuser');
    }

    public function deleteusergroup($id)
    {
        $product = UserGroups::destroy($id);
        return redirect('/administrator/configuseradmin');
    }

    public function configuseradmin($id)
    {
      $useradmin = UserAdmin::where('usergroups_id', $id)->get();
      return view('backend/config/useradmin/main', ['useradmin' => $useradmin]);
    }

    public function adduseradmin(Request $request){
      return '

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h3 class="modal-title" id="lineModalLabel">Tambah User Baru</h3>
        </div>
        <form action="/administrator/insertuseradmin" method="post">
          '.csrf_field().'
          <input type="hidden" name="groupadmin" value="'.$request->group_id.'"/>
        <div class="modal-body">

        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="username" value="'.old('username').'" required class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" value="'.old('email').'" required class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" value="'.old('password').'" required class="form-control">
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" value="'.old('confirm_password').'" required class="form-control">
        </div>


        </div>
        <div class="modal-footer">
          <div class="btn-group btn-group-justified" role="group" aria-label="group button">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
            </div>
            <div class="btn-group btn-delete hidden" role="group">
              <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
            </div>
            <div class="btn-group" role="group">
              <button type="submit" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
            </form>
            </div>
          </div>
        </div>
      </div>';
    }

    public function insertuseradmin(Request $request){

      $this->validate($request , [
        'groupadmin' => 'required',
        'username' => 'required|min:5',
        'email' => 'email',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6'
      ]);

      $useradmin = new UserAdmin();
      $useradmin->usergroups_id = $request->groupadmin;
      $useradmin->name = $request->username;
      $useradmin->email = $request->email;
      $useradmin->password = bcrypt($request->password);
      $useradmin->save();

      return redirect()->back()->with("sukses","User admin berhasil ditambahkan.");

    }

    public function edituseradmin(Request $request){

      $datauser = UserAdmin::find($request->id);
      return '

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h3 class="modal-title" id="lineModalLabel">Edit User '.$datauser->name.'</h3>
        </div>
        <form action="/administrator/insertuseradmin" method="post">
          '.csrf_field().'
          <input type="hidden" name="groupadmin" value="'.$request->group_id.'"/>
        <div class="modal-body">

        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="username" value="'.$datauser->name.'" required class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" value="'.$datauser->email.'" required class="form-control">
        </div>
        </div>
        <div class="modal-footer">
          <div class="btn-group btn-group-justified" role="group" aria-label="group button">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
            </div>
            <div class="btn-group btn-delete hidden" role="group">
              <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
            </div>
            <div class="btn-group" role="group">
              <button type="submit" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
            </form>
            </div>
          </div>
        </div>
      </div>';
    }

    public function changepassword(Request $request){

      return '
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h3 class="modal-title" id="lineModalLabel">Ubah Password</h3>
        </div>
        <form action="/administrator/ubahpassword" method="post">
          '.csrf_field().'
          <input type="hidden" name="groupadmin" value="'.$request->group_id.'"/>
          <input type="hidden" name="id" value="'.$request->id.'"/>
        <div class="modal-body">

        <div class="form-group">
          <label>Current Password</label>
          <input type="password" name="current_password" value="'.old('current_password').'" required class="form-control">
        </div>

        <div class="form-group">
          <label>New Password</label>
          <input type="password" name="new_password" value="'.old('new_password').'" required class="form-control">
        </div>

        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" value="'.old('confirm_password').'" required class="form-control">
        </div>


        </div>
        <div class="modal-footer">
          <div class="btn-group btn-group-justified" role="group" aria-label="group button">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
            </div>
            <div class="btn-group btn-delete hidden" role="group">
              <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
            </div>
            <div class="btn-group" role="group">
              <button type="submit" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
            </form>
            </div>
          </div>
        </div>
      </div>';

    }

    public function ubahpassword(Request $request){
      $current_password = bcrypt($request->current_password);
      $newpassword = bcrypt($request->new_password);

      $datauser = UserAdmin::find($request->id);
      if (!(Hash::check($request->current_password, $datauser->password))) {
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

      $user = UserAdmin::find($request->id);
      $user->password = bcrypt($request->get('new_password'));
      $user->save();

      return redirect()->back()->with("sukses","Ubah password berhasil.");
    }

    public function deleteuseradmin(Request $request){
      $product = UserAdmin::destroy($request->id);
      return redirect()->back()->with('success','User deleted successfully');
    }

    /////////// CONFIG PRODUCT ////////////

    public function categoryproduct()
    {
      $CategoryProduct = CategoryProduct::all();
      return view('backend/category/main',['CategoryProduct'=>$CategoryProduct]);

    }

    public function addcategoryproduct()
    {
      return view('backend/category/insert');
    }

    public function postcategoryproduct(Request $request)
    {

      $publish = $request->publish;
      if($publish == 'on'){
          $publish = 1;
      }else{
          $publish = 0;
      }

      $table = new CategoryProduct();
      $table->namacategory = $request->namacategory;
      $table->publish = $publish;
      $table->sort = 0;
      $table->save();

      return redirect('/administrator/categoryproduct');

    }

    public function editcategoryproduct($id)
    {
      $table = CategoryProduct::find($id);
      return view('backend/category/edit', ['CategoryProduct' => $table]);
    }

    public function updatecategoryproduct(Request $request, $id)
    {

      $publish = $request->publish;
      if($publish == 'on'){
          $publish = 1;
      }else{
          $publish = 0;
      }

      $table = CategoryProduct::find($id);
      $table->namacategory = $request->namacategory;
      $table->publish = $publish;
      $table->save();

      return redirect('/administrator/categoryproduct');
    }

    public function deletecategoryproduct($id)
    {
      $product = CategoryProduct::destroy($id);
      return redirect('/administrator/categoryproduct');
    }

    public function publishcategoryproduct($id, $publish)
    {

      if($publish == 1)
      {
        $publish = 0;
      }else{
        $publish = 1;
      }

      $menu = CategoryProduct::where('id', $id)
            ->update(['publish' => $publish]);
      return redirect('/administrator/categoryproduct');

    }

    public function featurecategoryproduct($id, $feature)
    {

      if($feature == 1)
      {
        $feature = 0;
      }else{
        $feature = 1;
      }

      $menu = CategoryProduct::where('id', $id)
            ->update(['feature' => $feature]);
      return redirect('/administrator/categoryproduct');

    }


    ////// CONFIG PRODUCT DETAIL //////

    public function product($id_category)
    {
      // dd( auth()->check());
      // return;
        $ProductData = Product::where('categoryproducts_id', $id_category)->with('stokproduct')->get();

        return view('backend/product/main',['ProductData'=> $ProductData]);

      }


    public function addproduct($id_category)
    {
      return view('backend/product/insert');
    }

    public function postproduct(Request $request, $id_category)
    {

      $publish = $request->publish;
      if($publish == 'on'){
          $publish = 1;
      }else{
          $publish = 0;
      }

      $table = new Product;
      $table->categoryproducts_id = $id_category;
      $table->namaproducts = $request->namaproducts;
      $table->deskripsi = $request->deskripsi;
      $table->shortdesc = $request->shortdesc;
      $table->harga = $request->harga;
      $table->berat = $request->berat;
      $table->publish = $publish;
      $table->save();

      return redirect('/administrator/product/'.$id_category);
    }

    public function editproduct($id_category, $id)
    {
      $table = Product::find($id);
      return view('backend/product/edit', ['Product' => $table]);
    }

    public function updateproduct(Request $request, $id_category, $id)
    {


      $publish = $request->publish;
      if($publish == 'on'){
          $publish = 1;
      }else{
          $publish = 0;
      }

      $table = Product::find($id);
      $table->namaproducts = $request->namaproducts;
      $table->deskripsi = $request->deskripsi;
      $table->shortdesc = $request->shortdesc;
      $table->harga = $request->harga;
      $table->berat = $request->berat;
      $table->publish = $publish;
      $table->save();

      return redirect('/administrator/product/'.$id_category);
    }

    public function deleteproduct($id_category, $id)
    {
      $product = Product::destroy($id);
      return redirect('/administrator/product/'.$id_category);
    }

    public function publishproduct($id_category, $id, $publish)
    {

      if($publish == 1)
      {
        $publish = 0;
      }else{
        $publish = 1;
      }

      $menu = Product::where('id', $id)
            ->update(['publish' => $publish]);
      return redirect('/administrator/product/'.$id_category);

    }

    public function dealsproduct($id_category, $id, $deals)
    {

      if($deals == 1)
      {
        $deals = 0;
      }else{
        $deals = 1;
      }

      $menu = Product::where('id', $id)
            ->update(['deals' => $deals]);
      return redirect('/administrator/product/'.$id_category);

    }


    /////// CONFIG STOCK PRODUCT ///////
    public function stockproduct($id_category, $id_product)
    {
      $LogStocks = LogStocks::where('detailproducts_id',$id_product)->orderBy('id','DESC')->get();
      $getID = LogStocks::where('detailproducts_id',$id_product)->orderBy('id', 'desc')->first();


        if($getID){
          $sisastok = $getID->totalstok;
        }else{
          $sisastok = 0;
        }


      return view('backend/stockproduct/main',['LogStocks' => $LogStocks, 'TotalStok' => $sisastok]);

    }

    public function addstockproduct($id_category, $id_product)
    {
      return view('backend/stockproduct/insert');
    }

    public function poststockproduct(Request $request, $id_category, $id_product)
    {

      $tanggal = date('Y-m-d');
      $getsisastok = LogStocks::where('detailproducts_id',$id_product)->orderBy('id', 'desc')->first();

      if($getsisastok == ''){
        $sisastok = 0;
      }else{
        $sisastok = $getsisastok->totalstok;
      }


      $sisastok = $sisastok + $request->jumlahstok;

      $table = new LogStocks;
      $table->detailproducts_id = $id_product;
      $table->masuk = $request->jumlahstok;
      $table->totalstok = $sisastok;
      $table->keluar = 0;
      $table->tanggal = $tanggal;
      $table->save();

      return redirect('/administrator/stockproduct/'.$id_category.'/'.$id_product);
    }

    public function editstockproduct($id_category, $id_product, $id_stok)
    {
      $table = LogStocks::find($id_stok);
      return view('backend/stockproduct/edit', ['DataLogStok' => $table]);
    }

    public function updatestockproduct(Request $request, $id_category, $id_product, $id_stok)
    {

      $getsisastok = LogStocks::where('id', $id_stok)->first();

      $stoksebelumnya = $request->stoksebelumnya;
      $stokrequest = $request->jumlahstok;

      if($getsisastok){
        $sisastok = $getsisastok->totalstok;
        $masuk = $getsisastok->masuk;
        $stokdbakhir = $sisastok - $masuk;

        if($stoksebelumnya > $stokrequest)
        {
          $stokakhir = $stokdbakhir + $stokrequest;
        }elseif($stoksebelumnya < $stokrequest){
          $stokakhir =  $stokdbakhir - $stokrequest;
        }else{
          $stokakhir =  $stokrequest;
        }

      }else{
        $sisastok = $stokrequest;
      }

      $table = LogStocks::find($id_stok);
      $table->masuk = $request->jumlahstok;
      $table->totalstok = $stokakhir;
      $table->save();


      return redirect('/administrator/stockproduct/'.$id_category.'/'.$id_product);
    }

    public function deletestockproduct($id_category, $id_product, $id_stok, $id)
    {

      $getsisastok = StockProduct::where('detailproducts_id', $id_product)->first();
      if($getsisastok){
        $sisastok = $getsisastok->sisastok;
      }else{
        $sisastok = 0;
      }

      $getmasuk = LogStocks::where('id', $id)->first();
      $masuk = $getmasuk->masuk;

      $sisastoks = $sisastok - $masuk;
      $tables = StockProduct::find($id_stok);
      $tables->sisastok = $sisastoks;

      LogStocks::destroy($id);
      return redirect('/administrator/stockproduct/'.$id_category.'/'.$id_product);
    }

    /////// CONFIG GALLERY PRODUCT ///////
    public function galleryproduct($id_category, $id_product)
    {
      $data = ImageProduct::where('detailproducts_id',$id_product)->orderBy('id','DESC')->get();
      return view('backend/galleryproduct/main',['ImageData' => $data]);

    }

    public function addgalleryproduct($id_category, $id_product)
    {
      return view('backend/galleryproduct/insert');
    }

    public function postgalleryproduct(Request $request, $id_category, $id_product)
    {

      $this->validate($request, [
          'files.*' => 'required|mimes:jpeg,bmp,png,jpg|max:2000'
      ]);

      $nameproduct = Product::where('id', $id_product)->first();
      $nameproduct = $this->seo_friendly_url($nameproduct->namaproducts);
      $files = [];
      $total = 0;
      foreach ($request->file('files') as $file) {
          if ($file->isValid()) {

              $data = ImageProduct::orderBy('id','DESC')->first();
              if($data == null){
                  $id = 1;
              }else{
                  $lastid = $data->id;
                  $id = $lastid + 1;
              }
              $extension = $file->getClientOriginalExtension();
              $custom_file_name = $nameproduct.'_'.$id.'.'.$extension;

              $path = $file->storeAs('public/product', $custom_file_name);

              $table = new ImageProduct;
              $table->detailproducts_id = $id_product;
              $table->mainflag = '0';
              $table->nameimage = $path;
              $table->save();

              $total = $total++;

              //
              // $files[] = [
              //   'detailproducts_id' => $id_product,
              //   'mainflag' => 0,
              //   'nameimage' => $path
              // ];
          }else{
            return 'image not valid';
          }

      }


      return redirect()
      ->back()
      ->withSuccess(sprintf('Total %s berkas berhasil diunggah.', $total));
    }

    public function deletegalleryproduct($id_category, $id_product, $id_gallery)
    {

      $data = ImageProduct::where('id', $id_gallery)->first();
      $cekdata = storage_path().'/app/'.$data->nameimage;
      if(file_exists($cekdata)){
          unlink($cekdata);
      }

      ImageProduct::destroy($id_gallery);
      return redirect('/administrator/galleryproduct/'.$id_category.'/'.$id_product);
    }


    /////// MASTER BANNER ///////
    public function banner()
    {
      $data = Banner::orderBy('id','DESC')->get();
      return view('backend/master/banner/main',['ImageData' => $data]);
    }

    public function addbanner()
    {
      return view('backend/master/banner/insert');
    }

    public function postbanner(Request $request)
    {

      $this->validate($request, [
          'files.*' => 'required|mimes:jpeg,bmp,png,jpg|max:2000'
      ]);

      $namebanner = $request->name;
      $nameproduct = $this->seo_friendly_url($namebanner);
      $files = [];
      $total = 0;
      foreach ($request->file('files') as $file) {
          if ($file->isValid()) {

              $extension = $file->getClientOriginalExtension();
              $custom_file_name = $nameproduct.'.'.$extension;

              $path = $file->storeAs('public/banner', $custom_file_name);

              $table = new Banner;
              $table->name = $namebanner;
              $table->image = $custom_file_name;
              $table->link = $request->link;
              $table->save();

              $total = $total++;

              //
              // $files[] = [
              //   'detailproducts_id' => $id_product,
              //   'mainflag' => 0,
              //   'nameimage' => $path
              // ];
          }else{
            return 'image not valid';
          }

      }

      return redirect()
      ->back()
      ->withSuccess(sprintf('Total %s berkas berhasil diunggah.', $total));
    }

    public function deletebanner($id)
    {

      $data = Banner::where('id', $id)->first();
      $cekdata = storage_path().'/app/public/banner/'.$data->image;

      if(file_exists($cekdata)){
          unlink($cekdata);
      }

      Banner::destroy($id);
      return redirect('/administrator/banner');
    }


    ////// MASTER ABOUT //////
    public function about()
    {
      $data = About::first();
      return view('backend/master/about/main',['AboutData' => $data]);
    }

    public function postabout(Request $request, $id)
    {
      $table = About::find($id);
      $table->name = $request->name;
      $table->deskripsi = $request->deskripsi;
      $table->save();

      return redirect('/administrator/fa');
    }

    ////// MASTER FAQ //////
    public function faq()
    {
      $data = Faq::first();
      return view('backend/master/faq/main',['FaqData' => $data]);
    }

    public function postfaq(Request $request, $id)
    {
      $table = Faq::find($id);

      $table->deskripsi = $request->deskripsi;
      $table->save();

      return redirect('/administrator/faq');
    }

    /////// MASTER BANNER ///////
    public function bank()
    {
      $data = Bank::orderBy('id','DESC')->get();
      return view('backend/master/bank/main',['DataBank' => $data]);
    }

    public function addbank()
    {
      return view('backend/master/bank/insert');
    }

    public function postbank(Request $request)
    {

      $this->validate($request, [
          'files.*' => 'required|mimes:jpeg,bmp,png,jpg|max:2000'
      ]);

      $namebanner = $request->name;
      $nameproduct = $this->seo_friendly_url($namebanner);
      $files = [];
      $total = 0;
      foreach ($request->file('files') as $file) {
          if ($file->isValid()) {

              $extension = $file->getClientOriginalExtension();
              $custom_file_name = $nameproduct.'.'.$extension;

              $path = $file->storeAs('public/bank', $custom_file_name);

              $table = new Bank;
              $table->namabank = $namebanner;
              $table->infobank = $request->infobank;
              $table->image = $custom_file_name;
              $table->save();

              $total = $total++;

              //
              // $files[] = [
              //   'detailproducts_id' => $id_product,
              //   'mainflag' => 0,
              //   'nameimage' => $path
              // ];
          }else{
            return 'image not valid';
          }

      }

      return redirect()
      ->back()
      ->withSuccess(sprintf('Total %s berkas berhasil diunggah.', $total));
    }

    public function deletebank($id)
    {

      $data = Bank::where('id', $id)->first();
      $cekdata = storage_path().'/app/public/bank/'.$data->image;

      if(file_exists($cekdata)){
          unlink($cekdata);
      }

      Bank::destroy($id);
      return redirect('/administrator/bank');
    }

    /////////////////////////
    ////// CONFIGSHOP //////
    ///////////////////////

    public function configshop()
    {
      $data = ConfigShop::first();
      return view('backend/configshop/main',['ConfigData' => $data]);
    }

    public function postconfig(Request $request, $id)
    {
      $dataconfig = ConfigShop::find($id);
      $namelogo = $this->seo_friendly_url($request->webtitle);

      $file = $request->file('files');

      $table = ConfigShop::find($id);
      $ubahlogo = $request->ubahlogo;
      if($ubahlogo){

        $this->validate($request, [
            'files' => 'required|mimes:jpeg,bmp,png,jpg|max:2000'
        ]);

        $extension = $file->getClientOriginalExtension();
        $custom_file_name = $namelogo.'.'.$extension;

        $imagenamelogo = $dataconfig->logo;

        if($imagenamelogo <> 'public/logo/nologo.png'){
          $cekdata = storage_path().'/app/'.$imagenamelogo;
          if(file_exists($cekdata)){
              unlink($cekdata);
          }
        }

        $path = $file->storeAs('public/logo', $custom_file_name);
        $table->logo = $path;
      }else{
        $table->logo = 'public/logo/nologo.png';
      }



      $table->facebook = $request->facebook;
      $table->instagram = $request->instagram;
      $table->twitter = $request->twitter;
      $table->google = $request->google;
      $table->webtitle = $request->webtitle;
      $table->webkeyword = $request->webkeyword;
      $table->webdesc = $request->webdesc;
      $table->save();

      return redirect('/administrator/configshop');
    }


    ////////////////////////////////
    ////// TRANSAKSI PESANAN //////
    //////////////////////////////

    public function pesanan()
    {
      $DataPesanan = TsHdTransaksi::whereIn('statuspembelian', [0, 6])->with('detailtransaksi','customertransaksi')->get();
      return view('backend/transaksi/pesanan',['DataPesanan' => $DataPesanan]);
    }


    public function getdatatransaksi(Request $request)
    {
      $id = $request->idTransaksi;
      $DataPesanan = TsHdTransaksi::where('id', $id)->first();
      $statuspembelian = $DataPesanan->statuspembelian;
      if($statuspembelian == 0){$checked0 = 'checked';}else{$checked0 = '';}
      if($statuspembelian == 1){$checked1 = 'checked';}else{$checked1 = '';}
      if($statuspembelian == 2){$checked2 = 'checked';}else{$checked2 = '';}
      if($statuspembelian == 3){$checked3 = 'checked';}else{$checked3 = '';}
      if($statuspembelian == 4){$checked4 = 'checked';}else{$checked4 = '';}
      if($statuspembelian == 5){$checked5 = 'checked';}else{$checked5 = '';}
      if($statuspembelian == 6){$checked6 = 'checked';}else{$checked6 = '';}

      return '
      <input type="hidden" name="idpesanan" value="'.$DataPesanan->id.'" />
      <div class="funkyradio">
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembelian" id="radio1" value="0" '.$checked0.'/>
            <label for="radio1">Belum Dibayar</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembelian" id="radio2" value="1" '.$checked1.'/>
            <label for="radio2">Konfirmasi</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembelian" id="radio3" value="2" '.$checked2.'/>
            <label for="radio3">Dibayar</label>
        </div>

      </div>';

      // <div class="funkyradio-primary">
      //     <input type="radio" name="statuspembelian" id="radio4" value="3" '.$checked3.'/>
      //     <label for="radio4">Proses Kirim</label>
      // </div>
      // <div class="funkyradio-primary">
      //     <input type="radio" name="statuspembelian" id="radio5" value="4" '.$checked4.'/>
      //     <label for="radio5">Dikirim</label>
      // </div>
      // <div class="funkyradio-primary">
      //     <input type="radio" name="statuspembelian" id="radio6" value="5" '.$checked5.'/>
      //     <label for="radio6">Diterima</label>
      // </div>
      // <div class="funkyradio-primary">
      //     <input type="radio" name="statuspembelian" id="radio7" value="6" '.$checked6.'/>
      //     <label for="radio7">Ditolak</label>
      // </div>


    }

    public function updatepesanan(Request $request){
      $id = $request->idpesanan;
      $status = $request->statuspembelian;

      $tshdtransaksi = TsHdTransaksi::find($id);
      $tshdtransaksi->statuspembelian = $request->statuspembelian;
      //$tshdtransaksi->save();

      $TsDtTransaksi = TsDtTransaksi::find($tshdtransaksi->id);
      $stokproduct = $TsDtTransaksi->productinfo->stokproduct;

      dd($stokproduct);

      $dt_transaksi = $tshdtransaksi->detailtransaksi;

      if($status == 1){

        $inserthdpayment = new TsHdPayment();
        $inserthdpayment->ts_hdtransaksi_id = $tshdtransaksi->id;
        $inserthdpayment->id_bank = 1;
        $inserthdpayment->namapayment = $request->namapayment;
        $inserthdpayment->bankpayment = $request->bankpayment;
        $inserthdpayment->nomorpayment = $request->nomorpayment;
        $inserthdpayment->tipepayment = $request->tipepayment;
        $inserthdpayment->statuspayment = 0;
        $inserthdpayment->totalpayment = $tshdtransaksi->totalpembelian;
        $inserthdpayment->totaldiskon = 0;
        $inserthdpayment->tanggalpayment = date('Y-m-d');
        $inserthdpayment->save();

        $id_hdpayment = $inserthdpayment->id;

        foreach ($dt_transaksi as $detail) {
          $insert_details = new TsDtPayment();
          $insert_details->ts_hdpayment_id = $id_hdpayment;
          $insert_details->ts_dttransaksi_id = $detail->id;
          $insert_details->hargabayar = $detail->harga;
          $insert_details->save();
        }

      }elseif($status == 2){

        $inserthdpayment = new TsHdPayment();
        $inserthdpayment->ts_hdtransaksi_id = $tshdtransaksi->id;
        $inserthdpayment->id_bank = 1;
        $inserthdpayment->namapayment = $request->namapayment;
        $inserthdpayment->bankpayment = $request->bankpayment;
        $inserthdpayment->nomorpayment = $request->nomorpayment;
        $inserthdpayment->tipepayment = $request->tipepayment;
        $inserthdpayment->statuspayment = 1;
        $inserthdpayment->totalpayment = $tshdtransaksi->totalpembelian;
        $inserthdpayment->totaldiskon = 0;
        $inserthdpayment->tanggalpayment = date('Y-m-d');
        $inserthdpayment->save();

        $id_hdpayment = $inserthdpayment->id;

        foreach ($dt_transaksi as $detail) {
          $insert_details = new TsDtPayment();
          $insert_details->ts_hdpayment_id = $id_hdpayment;
          $insert_details->ts_dttransaksi_id = $detail->id;
          $insert_details->hargabayar = $detail->harga;
          $insert_details->save();
        }

      }else{

      }
      return redirect('/administrator/pesanan');
    }



    public function getdatapengiriman(Request $request)
    {

      $id = $request->idTransaksi;
      $DataTransaksi = TsHdPayment::where('id', $id)->first();
      $statupayment = $DataTransaksi->statuspayment;

      // $hdTrasaksi = $DataTransaksi->headertransaksi;
      // dd($hdTrasaksi);

      if($statupayment == 1){$checked1 = 'checked';}else{$checked1 = '';}
      if($statupayment == 2){$checked2 = 'checked';}else{$checked2 = '';}
      if($statupayment == 3){$checked3 = 'checked';}else{$checked3 = '';}
      if($statupayment == 4){$checked4 = 'checked';}else{$checked4 = '';}
      if($statupayment == 5){$checked5 = 'checked';}else{$checked5 = '';}
      if($statupayment == 6){$checked6 = 'checked';}else{$checked6 = '';}

      return '
      <script type="text/javascript">

      function yesnoCheck() {
          if (document.getElementById("radio3").checked) {
              document.getElementById("noresi").style.display = "block";
              document.getElementById("noresikirim").disabled = false;
              document.getElementById("alasan").style.display = "none";
              document.getElementById("alasantolak").disabled = true;

          }else{
              document.getElementById("noresi").style.display = "none";
              document.getElementById("noresikirim").disabled = true;
              document.getElementById("alasan").style.display = "none";
              document.getElementById("alasantolak").disabled = true;

          }
      }

      </script>
      <input type="hidden" name="idpayment" value="'.$DataTransaksi->id.'" />
      <div class="funkyradio">

        <div class="funkyradio-primary">
            <input type="radio" name="statuspengiriman" onclick="javascript:yesnoCheck();" id="radio1" value="1" '.$checked1.'/>
            <label for="radio1">Dibayar</label>
        </div>

        <div class="funkyradio-primary">
            <input type="radio" name="statuspengiriman" onclick="javascript:yesnoCheck();" id="radio2" value="2" '.$checked2.'/>
            <label for="radio2">Proses Kirim</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspengiriman" onclick="javascript:yesnoCheck();" id="radio3" value="3" '.$checked3.'/>
            <label for="radio3">Kirim</label>
            <div id="noresi" style="display:none; margin-bottom:5px;">
               <input type="text" id="noresikirim" name="noresi" placeholder="Input No Resi" class="form-control" disabled>
            </div>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspengiriman" onclick="javascript:yesnoCheck();" id="radio4" value="4" '.$checked4.'/>
            <label for="radio4">Diterima</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspengiriman" onclick="javascript:yesnoCheck();" id="radio5" value="5" '.$checked5.'/>
            <label for="radio5">Ditolak</label>
        </div>
      </div>';

      // <div class="funkyradio-primary">
      //     <input type="radio" name="statuspengiriman" onclick="javascript:yesnoCheck();" id="radio0" value="0" '.$checked0.'/>
      //     <label for="radio0">Belum Dibayar</label>
      // </div>
      // <div class="funkyradio-primary">
      //     <input type="radio" name="statuspengiriman" onclick="javascript:yesnoCheck();" id="radio1" value="1" '.$checked1.'/>
      //     <label for="radio1">Konfirmasi</label>
      // </div>
      // <div class="funkyradio-primary">
      //     <input type="radio" name="statuspengiriman" onclick="javascript:yesnoCheck();" id="radio6" value="6" '.$checked6.'/>
      //     <label for="radio6">Ditolak</label>
      //     <div id="alasan" style="display:none">
      //        <input type="text" id="alasantolak" name="alasan" placeholder="Input Alasan Tolak Pembayaran" class="form-control" disabled>
      //     </div>
      // </div>


    }

    public function updatepengiriman(Request $request){
      $id = $request->idpayment;
      $status = $request->statuspengiriman;

      $table = TsHdPayment::find($id);
      $tshdtransaksi = TsHdTransaksi::find($table->ts_hdtransaksi_id);

      if($status == 2){
        $statushd = 1;
      }elseif($status == 3){

        // Proses Kirim
        $job = (new \App\Jobs\SendingProduct($table))->delay(5);
        $this->dispatch($job);

        $statushd = 2;

      }elseif($status == 4){

        // Diterima
        // $job = (new \App\Jobs\SendingComplete($table))->delay(5);
        // $this->dispatch($job);

        $statushd = 3;
      }elseif($status == 5){
        $statushd = 4;
      }


      if($request->noresi){
        $tshdtransaksi->noresi = $request->noresi;

        // Kirim
        $job = (new \App\Jobs\SendingResi($table))->delay(5);
        $this->dispatch($job);
      }
      $tshdtransaksi->statuspembelian = $statushd;
      $tshdtransaksi->save();

      $table->statuspayment = $status;
      $table->save();

      return redirect('/administrator/pengiriman');
    }

    public function detailpesanan($id)
    {
      $DetailPesanan = TsDtTransaksi::with('productinfo')->where('ts_hdtransaksi_id', $id)->get();
      return view('backend/transaksi/detailpesanan',['DetailPesanan' => $DetailPesanan]);

    }

    public function pembayaran()
    {
      //$DataPesanan = TsHdTransaksi::whereIn('statuspembelian', [2,3,4,5])->with('detailtransaksi','customertransaksi')->get();
      //$DataPesanan = TsHdPayment::whereIn('statuspayment', [0,1])->with('detailpayment', 'headertransaksi','headertransaksi.detailtransaksi')->get();
      $HeaderPayment = TsHdPayment::whereIn('statuspayment', [0,1])->get();
      return view('backend/transaksi/pembayaran',['HeaderPayment' => $HeaderPayment]);
    }

    public function getdatapembayaran(Request $request)
    {
      $id = $request->idPembayaran;
      $DataPayment = TsHdPayment::where('id', $id)->first();
      $statupayment = $DataPayment->statuspayment;
      if($statupayment == 0){$checked0 = 'checked';}else{$checked0 = '';}
      if($statupayment == 1){$checked1 = 'checked';}else{$checked1 = '';}
      if($statupayment == 2){$checked2 = 'checked';}else{$checked2 = '';}
      if($statupayment == 3){$checked3 = 'checked';}else{$checked3 = '';}
      if($statupayment == 4){$checked4 = 'checked';}else{$checked4 = '';}
      if($statupayment == 5){$checked5 = 'checked';}else{$checked5 = '';}
      if($statupayment == 6){$checked6 = 'checked';}else{$checked6 = '';}

      return '
      <script type="text/javascript">

      function yesnoCheck() {
          if (document.getElementById("radio4").checked) {
              document.getElementById("noresi").style.display = "block";
              document.getElementById("noresikirim").disabled = false;
              document.getElementById("alasan").style.display = "none";
              document.getElementById("alasantolak").disabled = true;

          }else if(document.getElementById("radio6").checked){
              document.getElementById("alasan").style.display = "block";
              document.getElementById("alasantolak").disabled = false;
              document.getElementById("noresi").style.display = "none";
              document.getElementById("noresikirim").disabled = true;
          }else{
              document.getElementById("noresi").style.display = "none";
              document.getElementById("noresikirim").disabled = true;
              document.getElementById("alasan").style.display = "none";
              document.getElementById("alasantolak").disabled = true;

          }
      }

      </script>
      <input type="hidden" name="idpayment" value="'.$DataPayment->id.'" />
      <div class="funkyradio">
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembayaran" onclick="javascript:yesnoCheck();" id="radio1" value="0" '.$checked0.'/>
            <label for="radio1">Konfirmasi</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembayaran" onclick="javascript:yesnoCheck();" id="radio2" value="1" '.$checked1.'/>
            <label for="radio2">Disetujui</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembayaran" onclick="javascript:yesnoCheck();" id="radio3" value="2" '.$checked2.'/>
            <label for="radio3">Proses Kirim</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembayaran" onclick="javascript:yesnoCheck();" id="radio4" value="3" '.$checked3.'/>
            <label for="radio4">Kirim</label>
            <div id="noresi" style="display:none; margin-bottom:5px;">
               <input type="text" id="noresikirim" name="noresi" placeholder="Input No Resi" class="form-control" disabled>
            </div>

        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembayaran" onclick="javascript:yesnoCheck();" id="radio5" value="4" '.$checked4.'/>
            <label for="radio5">Diterima</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="statuspembayaran" onclick="javascript:yesnoCheck();" id="radio6" value="5" '.$checked5.'/>
            <label for="radio6">Ditolak</label>
            <div id="alasan" style="display:none">
               <input type="text" id="alasantolak" name="alasan" placeholder="Input Alasan Tolak Pembayaran" class="form-control" disabled>
            </div>
        </div>

      </div>';


    }

    public function updatepembayaran(Request $request){
      $id = $request->idpayment;
      $status = $request->statuspembayaran;


      $table = TsHdPayment::find($id);
      $hdtransaksi = $table->ts_hdtransaksi_id;
      
      $transaksi = TsHdTransaksi::find($hdtransaksi);
      $dttransaksi = TsDtTransaksi::where('ts_hdtransaksi_id',$hdtransaksi)->get();
      
    
      
      
        
      

      if($status == 1){
        
        // Pembayaran disetujui
         
        foreach ($dttransaksi as $value) {
          $idProduct = $value->detailproducts_id;
          $GetStok = LogStocks::where('detailproducts_id',$idProduct)->orderBy('id', 'desc')->first();
          
          $totalstok = $GetStok->totalstok;
          $totalstokakhir = $totalstok - $value->jumlahpembelian;
          
          $keluarbarang = new LogStocks;
          $keluarbarang->detailproducts_id = $idProduct;
          $keluarbarang->masuk = 0;
          $keluarbarang->keluar = $value->jumlahpembelian;
          $keluarbarang->totalstok = $totalstokakhir;
          $keluarbarang->tanggal = date('Y-m-d');
          $keluarbarang->save();
          
          // LogStocks::where('id', $GetStok->$id)->update(['totalstok' => $totalstokakhir, 'keluar' => $value->jumlahpembelian]);
          
        }
        
        $job = (new \App\Jobs\SendingApprove($table))->delay(5);
        $this->dispatch($job);

        $statushd = 2;
      }elseif($status == 2){

        // Proses Kirim
        // foreach ($dttransaksi as $value) {
        //   $idProduct = $value->detailproducts_id;
        //   $GetStok = LogStocks::where('detailproducts_id',$idProduct)->orderBy('id', 'desc')->first();
        //
        //   $totalstok = $GetStok->totalstok;
        //   $totalstokakhir = $totalstok - $value->jumlahpembelian;
        //
        //   LogStocks::where('id', $GetStok->$id)->update(['totalstok' => $totalstokakhir, 'keluar' => $value->jumlahpembelian]);
        //
        // }
        $job = (new \App\Jobs\SendingProduct($table))->delay(5);
        $this->dispatch($job);

        $statushd = 3;
      }elseif($status == 3){
        $statushd = 4;
      }elseif($status == 4){

        // Diterima
        $job = (new \App\Jobs\SendingComplete($table))->delay(5);
        $this->dispatch($job);

        $statushd = 5;
      }elseif($status == 5){
        $statushd = 6;
      }


      $updatehdtransaksi = TsHdTransaksi::find($hdtransaksi);
      $updatehdtransaksi->statuspembelian = $statushd;

      if($request->noresi){
        $updatehdtransaksi->noresi = $request->noresi;

        // Kirim
        $job = (new \App\Jobs\SendingResi($table))->delay(5);
        $this->dispatch($job);
      }

      if($request->alasan){
        $updatehdtransaksi->catatan = $request->alasan;
        // Kirim
        $job = (new \App\Jobs\SendingFailed($table))->delay(5);
        $this->dispatch($job);
      }

      $updatehdtransaksi->save();
      $table->statuspayment = $status;
      $table->save();

      return redirect('/administrator/pembayaran');
    }

    public function detailpembayaran($id)
    {
      $DetailPayment = TsDtPayment::where('ts_hdpayment_id', $id)->get();
      return view('backend/transaksi/detailpembayaran',['DetailPayment' => $DetailPayment]);

    }

    public function pengiriman()
    {
      $DataPesanan = TsHdPayment::whereIn('statuspayment', [1,2,3,4,5])->get();
      return view('backend/transaksi/pengiriman',['DataPesanan' => $DataPesanan]);
    }

    public function detailpengiriman($id)
    {
      $DetailPesanan = TsDtTransaksi::with('productinfo')->where('ts_hdtransaksi_id', $id)->get();
      return view('backend/transaksi/detailpengiriman', ['DetailPesanan' => $DetailPesanan]);
    }


    /// ROUTE EXPORT ///

    public function exportpesanan(){
      Excel::create('clients', function($excel){
        $excel->sheet('clients', function($sheet){
          $sheet->loadView('ExportClients');
        });
      })->export('xlsx');
    }


}
