<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;
use App\Product;
use App\LogStocks;
use App\ImageProduct;
use App\Banner;
use App\About;
use App\Toc;
use App\Payment;
use App\Karir;
use App\Privacy;
use App\Faq;
use Session;
use DB;
use Illuminate\Support\Facades\Crypt;
use CustomHelper;

class HomeController extends Controller
{

  // public function __construct() {
  //    View::share ( 'variable1', $this->variable1 );
  // }
    //
    public function index(){

     $ProductData = Product::with('stokproduct','picture')->orderBy('id', 'DESC')->limit(8)->get();
     $deals = Product::with('stokproduct','picture')->where('deals',1)->orderBy('id', 'DESC')->get();
     $CategoryProduct = CategoryProduct::with('product')->where('feature',1)->orderBy('id', 'DESC')->get();
     $Banner = Banner::where('main', 1)->get();
     $SubBanner = Banner::where('main', 2)->get();

      // return view ('front/home', ['categorys' => $categoryproduct]);
      return view ('front/home', [
        'ProductData' => $ProductData,
        'DataBanner' => $Banner,
        'SubBanner' => $SubBanner,
        'Deals' => $deals,
        'CategoryProduct' =>$CategoryProduct
        ]);
    }

    public function about(){

     $DataAbout = About::first();
      return view ('front/about', ['DataAbout' => $DataAbout]);
    }

    public function toc(){

      $DataToc = Toc::first();
      return view ('front/toc', ['DataToc' => $DataToc]);
    }

    public function payment(){

      $DataPayment = Payment::first();
      return view ('front/payment', ['DataPayment' => $DataPayment]);
    }

    public function karir(){

      $DataKarir = Karir::first();
      return view ('front/karir', ['DataKarir' => $DataKarir]);
    }

    public function privacy(){

      $DataPrivacy = Privacy::first();
      return view ('front/privacy', ['DataPrivacy' => $DataPrivacy]);
    }

    public function faq(){

      $DataFaq = Faq::first();
      return view ('front/faq', ['DataFaq' => $DataFaq]);
    }



}
