<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\UserAdmin;
use App\Customer;

// Route::get('activation/{token}', function ($token)
// {
//     $customer = App\Customer::where('activation_token', $token)->first();
//
//     if ($customer) {
//         $customer->activated_at = \Carbon\Carbon::now();
//         $customer->save();
//
//         return 'Your account has been activated.';
//     }
//
//     return 'Invalid activation token.';
// });

/////// CONFIG ROUTE FRONT /////////
///////////////////////////////////
Route::get('/', 'HomeController@index');

Route::get('/category_product/{id}', 'ProductController@category_product');
Route::get('/detail_product/{id}', 'ProductController@detail_product');
Route::get('/checkout', 'ProductController@checkout');
Route::get('/checkout/success/{id}', 'ProductController@checkout_success');
Route::post('/checkout/konfirmasipembayaran/{id}', 'ProductController@konfirmasipembayaran');

Route::get('ExportClients', 'ExcellController@ExportClients');
Route::get('pdf', 'PDFController@pdf');


Route::get('/blank', function () {
    return view('front/blank');
});


Route::post('/getKota', 'ProductController@getKota');
Route::post('/getCost', 'ProductController@getCost');



///// ROUTE MASTER /////
Route::get('/toc', 'HomeController@toc');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/privacy', 'HomeController@privacy');
Route::get('/career', 'HomeController@karir');
Route::get('/howtopayment', 'HomeController@payment');
Route::get('/faq', 'HomeController@faq');


/// CART ROUTE ///
/////////////////
Route::get('/cart', 'CartController@index');
Route::post('/cart/store', 'CartController@store');
Route::get('/cart/destroy/{id}', 'CartController@destroy');
Route::post('/cart/checkout', 'CartController@checkout');
Route::get('/hapus', 'CartController@hapus');


///////// CUSTOMER ROUTE /////////

Route::get('/customer', 'CustomerController@index');
Route::post('/customer/login', 'CustomerController@login');
Route::post('/customer/loginback', 'CustomerController@loginback');

Route::post('/customer/register', 'CustomerController@register');
Route::get('/customer/logout', 'CustomerController@logout');
Route::get('/customer/existemail/{id}', 'CustomerController@existemail');
Route::post('/customer/updateregister', 'CustomerController@updateregister');
Route::get('/verify', 'CustomerController@verify')->name('signup.verify');
Route::get('/customer/confirmation', 'CustomerController@confirmation');
Route::get('/customer/success', 'CustomerController@success');
Route::get('/customer/resend', 'CustomerController@resend');

Route::get('/customer/forgotpassword', 'CustomerController@forgotpassword');
Route::post('/customer/doforgot', 'CustomerController@doforgot');
Route::get('/customer/changepassword'. 'CustomerController@changepassword');

Route::get('autocomplete', function()
{
    return View::make('autocomplete');
});

Route::get('getdata', function(Request $request)
{
    $term = strtolower($request->term);
    $data = \App\DetailProduct::all();
    foreach ($data as $k => $v) {
        if (strpos(strtolower($v), $term) !== FALSE) {
            $return_array[] = array('value' => $v->namaproducts, 'id' =>$k);
        }
    }

    // $data = DB::table('detailproducts')->get();
    // $return_array = array();
    //
    // foreach ($data as $k) {
    //     if (strpos(strtolower($k->namaproducts), $term) !== FALSE) {
    //         $return_array[] = array('value' => $k->namaproducts, 'id' =>$k->id);
    //     }
    // }


    return Response::json($return_array);
});

Route::get('coba', function(){
    $details['email'] = 'bb81395ba3-7e0612@inbox.mailtrap.io';
    $job = (new \App\Jobs\SendEmail($details))->delay(10);

    dispatch($job);
    dd('Berhasil');
});

/////////ROUTE MEMBER /////////
Route::group(['middleware' => 'customer'], function(){
  Route::get('/customer/dashboard', 'CustomerController@dashboard');
  Route::post('/customer/ubahpassword', 'CustomerController@ubahpassword');
  Route::get('/customer/alamat', 'CustomerController@alamat');
  Route::get('/customer/transaksi', 'CustomerController@transaksi');
  Route::post('/customer/updateprofile', 'CustomerController@updateprofile');
  Route::get('/customer/setalamat/{id}', 'CustomerController@setalamat');
  Route::post('/customer/getdataalamat', 'CustomerController@getdataalamat');
  Route::post('/customer/updatealamat', 'CustomerController@updatealamat');
  Route::post('/customer/detailalamat', 'CustomerController@detailalamat');
  Route::get('/customer/deletealamat/{id}', 'CustomerController@deletealamat');
});

/////// CONFIG EMAIL ROUTE///////
Route::get('/mail/sendemail', 'MailController@sendemail');



////// CONFIG ADMIN LOGIN REGISTER //////
Route::get('/administrator', 'BackendController@index');
Route::post('/administrator/dologin', 'BackendController@dologin');
Route::get('/administrator/register', 'BackendController@register');
Route::post('/administrator/doregister', 'BackendController@doregister');


Route::group(['middleware' => 'useradmin'], function(){
    ////// CONFIG ROUTE ADMIN ///////
    ////////////////////////////////
    Route::prefix('useradmin')->group(function () {
        Route::get('usergroup', function () {
            Route::get('/administrator/dashboard', 'BackendController@dashboard');
        });
    });
    Route::get('/administrator/dashboard', 'BackendController@dashboard');
    /// ROUTE CRUD USERGROUP ////
    Route::get('/administrator/configuser', 'BackendController@configuser');
    Route::get('/administrator/addusergroup', 'BackendController@addusergroup');
    Route::get('/administrator/editusergroup/{id}', 'BackendController@editusergroup');
    Route::post('/administrator/updateusergroup/{id}', 'BackendController@updateusergroup');
    Route::post('/administrator/insertusergroup', 'BackendController@insertusergroup');
    Route::get('/administrator/deleteusergroup/{id}', 'BackendController@deleteusergroup');
    /// ROUTE CRUD USERADMIN ////
    Route::get('/administrator/configuseradmin/{id}', 'BackendController@configuseradmin');
    Route::post('/administrator/adduseradmin', 'BackendController@adduseradmin');
    Route::post('/administrator/insertuseradmin', 'BackendController@insertuseradmin');
    Route::post('/administrator/edituseradmin', 'BackendController@edituseradmin');
    Route::post('/administrator/updateuseradmin', 'BackendController@updateuseradmin');
    Route::post('/administrator/changepassword', 'BackendController@changepassword');
    Route::post('/administrator/ubahpassword', 'BackendController@ubahpassword');

    /////////////////////////////////

    /// ROUTE CUSTOMER ////
    Route::get('/administrator/member', 'BackendController@member');
    Route::get('/administrator/nonmember', 'BackendController@nonmember');


    ///// CONFIG ROUTE PRODUCT ///
    //// crud category product
    Route::get('/administrator/categoryproduct', 'BackendController@categoryproduct');
    Route::get('/administrator/addcategoryproduct', 'BackendController@addcategoryproduct');
    Route::post('/administrator/postcategoryproduct', 'BackendController@postcategoryproduct');
    Route::get('/administrator/editcategoryproduct/{id}', 'BackendController@editcategoryproduct');
    Route::post('/administrator/updatecategoryproduct/{id}', 'BackendController@updatecategoryproduct');
    Route::get('/administrator/publishcategoryproduct/{id}/{publish}', 'BackendController@publishcategoryproduct');
    Route::get('/administrator/featurecategoryproduct/{id}/{publish}', 'BackendController@featurecategoryproduct');
    Route::get('/administrator/deletecategoryproduct/{id}', 'BackendController@deletecategoryproduct');
    //// crud detail product
    Route::get('/administrator/product/{id}', 'BackendController@product');
    Route::get('/administrator/addproduct/{id}', 'BackendController@addproduct');
    Route::post('/administrator/postproduct/{id}', 'BackendController@postproduct');
    Route::get('/administrator/editproduct/{id}/{id_product}', 'BackendController@editproduct');
    Route::post('/administrator/updateproduct/{id}/{id_product}', 'BackendController@updateproduct');
    Route::get('/administrator/deleteproduct/{id}/{id_product}', 'BackendController@deleteproduct');
    Route::get('/administrator/publishproduct/{id}/{id_product}/{publish}', 'BackendController@publishproduct');
    Route::get('/administrator/dealsproduct/{id}/{id_product}/{publish}', 'BackendController@dealsproduct');
    //// crud stok product
    Route::get('/administrator/stockproduct/{id}/{id_product}', 'BackendController@stockproduct');
    Route::get('/administrator/addstockproduct/{id}/{id_product}', 'BackendController@addstockproduct');
    Route::post('/administrator/poststockproduct/{id}/{id_product}', 'BackendController@poststockproduct');
    Route::get('/administrator/editstockproduct/{id}/{id_product}/{idlogstok}', 'BackendController@editstockproduct');
    Route::post('/administrator/updatestockproduct/{id}/{id_product}/{idlogstok}', 'BackendController@updatestockproduct');
    Route::get('/administrator/deletestockproduct/{id}/{id_product}/{idlogstok}', 'BackendController@deletestockproduct');
    /////////////////////////////


    //// crud stok galleryproduct
    Route::get('/administrator/galleryproduct/{id}/{id_product}', 'BackendController@galleryproduct');
    Route::get('/administrator/addgalleryproduct/{id}/{id_product}', 'BackendController@addgalleryproduct');
    Route::post('/administrator/postgalleryproduct/{id}/{id_product}', 'BackendController@postgalleryproduct');
    Route::get('/administrator/editgalleryproduct/{id}/{id_product}/{id_gallery}', 'BackendController@editgalleryproduct');
    Route::post('/administrator/updategalleryproduct/{id}/{id_product}/{id_gallery}', 'BackendController@updategalleryproduct');
    Route::get('/administrator/deletegalleryproduct/{id}/{id_product}/{id_gallery}', 'BackendController@deletegalleryproduct');


    ////// ROUTE CONFIG MENU //////
    /// route menu level 1 ////
    Route::get('/administrator/configmenu', 'BackendController@configmenu');
    Route::get('/administrator/editmenu/{id}', 'BackendController@editmenu');
    Route::get('/administrator/addmenu', 'BackendController@addmenu');
    Route::post('/administrator/insertmenu', 'BackendController@insertmenu');
    Route::get('/administrator/deletemenu/{id}', 'BackendController@deletemenu');

    Route::get('/administrator/publishmenu/{id}/{publish}', 'BackendController@publishmenu');
    Route::post('/administrator/updatemenu/{id}', 'BackendController@updatemenu');

    /// route menu level 2 ////
    Route::get('/administrator/configmenuchild/{id}', 'BackendController@configmenuchild');
    Route::get('/administrator/editmenuchild/{id}/{idchild}', 'BackendController@editmenuchild');
    Route::get('/administrator/addmenuchild/{id}', 'BackendController@addmenuchild');
    Route::post('/administrator/insertmenuchild/{id}', 'BackendController@insertmenuchild');
    Route::get('/administrator/deletemenuchild/{id}/{idchild}', 'BackendController@deletemenuchild');
    Route::post('/administrator/updatemenuchild/{id}/{idchild}', 'BackendController@updatemenuchild');
    Route::get('/administrator/publishmenuchild/{id}/{idchild}/{publish}', 'BackendController@publishmenuchild');
    ////////////////////////////////


    ////// ROUTE MASTER CONTENT //////
    ///// route banner /////
    Route::get('/administrator/banner', 'BackendController@banner');
    Route::get('/administrator/addbanner', 'BackendController@addbanner');
    Route::post('/administrator/postbanner', 'BackendController@postbanner');
    Route::get('/administrator/deletebanner/{id}', 'BackendController@deletebanner');

    ///// route about /////
    Route::get('/administrator/about', 'BackendController@about');
    Route::post('/administrator/postabout/{id}', 'BackendController@postabout');

    ///// route faq /////
    Route::get('/administrator/faq', 'BackendController@faq');
    Route::post('/administrator/postfaq/{id}', 'BackendController@postfaq');

    ///// route contact /////
    Route::get('/administrator/configshop', 'BackendController@configshop');
    Route::post('/administrator/postconfig/{id}', 'BackendController@postconfig');


    ///// route bank /////
    Route::get('/administrator/bank', 'BackendController@bank');
    Route::get('/administrator/addbank', 'BackendController@addbank');
    Route::post('/administrator/postbank', 'BackendController@postbank');
    Route::get('/administrator/deletebank/{id}', 'BackendController@deletebank');
    //////////////////////////////////

    ///// ROUTE TRANSAKSI //////
    //// route pesanan /////
    Route::get('/administrator/pesanan', 'BackendController@pesanan');
    Route::post('/administrator/getdatatransaksi', 'BackendController@getdatatransaksi');
    Route::post('/administrator/updatepesanan', 'BackendController@updatepesanan');
    Route::post('/administrator/searchpesanan', 'BackendController@searchpesanan');

    /// route detail pesanan ///
    Route::get('/administrator/detailpesanan/{id}', 'BackendController@detailpesanan');

    /// route pembayaran ///
    Route::get('/administrator/pembayaran', 'BackendController@pembayaran');
    Route::get('/administrator/detailpembayaran/{id}', 'BackendController@detailpembayaran');
    Route::post('/administrator/getdatapembayaran', 'BackendController@getdatapembayaran');
    Route::post('/administrator/updatepembayaran', 'BackendController@updatepembayaran');

    /// route pengiriman ///
    Route::get('/administrator/pengiriman', 'BackendController@pengiriman');
    Route::get('/administrator/detailpengiriman/{id}', 'BackendController@detailpengiriman');
    Route::post('/administrator/getdatapengiriman', 'BackendController@getdatapengiriman');
    Route::post('/administrator/updatepengiriman', 'BackendController@updatepengiriman');

    //// ROUTE EXPORT ////
    Route::get('/administrator/exportpesanan', 'BackendController@exportpesanan');

    Route::get('/administrator/logout', 'BackendController@logout');
});
