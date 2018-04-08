<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;
use App\Product;
use App\LogStocks;
use App\ImageProduct;
use App\Customer;
use App\Alamat;
use App\TsHdTransaksi;
use App\TsDtTransaksi;
use App\TsHdPayment;
use App\TsDtPayment;
use App\Bank;
use Session;
use DB;
use Illuminate\Support\Facades\Crypt;
use CustomHelper;

class ProductController extends Controller
{
    //
    public function index(){
      return 'Index Product';
    }

    public function category_product($id){
      $CategoryProduct = CategoryProduct::find($id);
      $Product = Product::where('categoryproducts_id', $id)->simplePaginate(12);
      //dd($Product[0]->productimage);
      return view('front/category_product', ['CategoryProduct' => $CategoryProduct, 'Product' =>$Product]);
    }

    public function detail_product($id){
      $ProductData = Product::with('stokproduct','picture')->where('id', $id)->orderBy('id', 'DESC')->first();
      $otherproduct = Product::with('picture')->where('id','<>',$id)->orderBy('id', 'DESC')->limit(4)->get();
      //dd($ProductData);
      return view('front/detail_product', ['ProductData' => $ProductData, 'otherproduct' => $otherproduct]);
    }


    public function checkout(){
      $ProductData = Product::with('stokproduct','picture')->orderBy('id', 'DESC')->get();
      $Bank = Bank::all();
      $getprovinsi = new CustomHelper;
      return view('front/checkout', ['ProductData' => $ProductData, 'bank' => $Bank, 'provinsi' => $getprovinsi->getProvince()]);
    }

    public function checkout_success($id){
      $idTransaksi = Crypt::decryptString($id);
      //$DataTransaksi = Product::with('detailtransaksi')->where('id', $idTransaksi)->orderBy('id', 'DESC')->get();
      $DataTransaksi = DB::table('ts_hdtransaksi')
        ->leftJoin('ts_dttransaksi', 'ts_hdtransaksi.id', '=', 'ts_dttransaksi.ts_hdtransaksi_id')
        ->leftJoin('detailproducts', 'ts_dttransaksi.detailproducts_id', '=', 'detailproducts.id')
        ->leftJoin('categoryproducts', 'detailproducts.categoryproducts_id', '=', 'categoryproducts.id')
        ->leftJoin('customers', 'ts_hdtransaksi.customer_id', '=', 'customers.id')
        ->leftJoin('imageproducts', 'detailproducts.id', '=', 'imageproducts.detailproducts_id')
        ->select('ts_hdtransaksi.*', 'ts_dttransaksi.*', 'detailproducts.namaproducts', 'customers.nama', 'categoryproducts.namacategory', 'imageproducts.nameimage')
        ->where('ts_hdtransaksi.id', $idTransaksi)
        ->get();

      $statuskonfirmasi = $DataTransaksi[0]->statuspembelian;
      if($statuskonfirmasi <> 0){
          return 'pembayaran sudah dikonfirmasi';
      }
      $DataBank = Bank::all();
      // dd($DataTransaksi);
      return view('front/checkout_success',['DataTransaksi'=>$DataTransaksi, 'DataBank' => $DataBank]);
    }

    public function konfirmasipembayaran(Request $request, $id){

        $totalpembayaran = $request->totalpembayaran;
        $namapemilikbank = $request->namapemilik;
        $namabank = $request->namabank;
        $nomorekening = $request->nomor_rekening;

        $totalpembayaran = str_replace(",","",$totalpembayaran);

        $idTransaksi = Crypt::decryptString($id);
        $HDtransaksi = TsHdTransaksi::where('id',$idTransaksi)->with('detailtransaksi')->first();
        $customer_id = $HDtransaksi->customer_id;

        if($totalpembayaran < $HDtransaksi->totalpembelian){
          return "Gagal Pembayaran Lebih Kecil Dari Jumlah Pembelian";
        }

        // update data transaksi menjadi konfirmasi
        TsHdTransaksi::where('id', $idTransaksi)
              ->update(['statuspembelian' => 1]);

        $date = date('Y-m-d');
        $inserthdpayment = new TsHdPayment;
        $inserthdpayment->ts_hdtransaksi_id = $idTransaksi;
        $inserthdpayment->id_bank = $request->transfer;
        $inserthdpayment->namapayment = $namapemilikbank;
        $inserthdpayment->nomorpayment = $request->nomor_rekening;
        $inserthdpayment->bankpayment = $request->namabank;
        $inserthdpayment->tipepayment = 1;
        $inserthdpayment->statuspayment = 0;
        $inserthdpayment->totalpayment = $totalpembayaran;
        $inserthdpayment->totaldiskon = 0;
        $inserthdpayment->tanggalpayment = $date;
        $inserthdpayment->save();
        $hd_id = $inserthdpayment->id;

        foreach ($HDtransaksi->detailtransaksi as $key) {
          $insertdtpayment = new TsDtPayment;
          $insertdtpayment->ts_hdpayment_id = $hd_id;
          $insertdtpayment->hargabayar = $key->harga;
          $insertdtpayment->ts_dttransaksi_id = $key->id;
          $insertdtpayment->save();

        }

        return "terima kasih pembayaran anda sedang kami proses";
    }


    ///////// FUNGSI RAJA ONGKIR FRONT //////////////////
    public function getKota(Request $request){

        $id_provinsi = $request->id_provinsi;


        $getkota = new CustomHelper;
        $kota = $getkota->getKota($id_provinsi);
        echo "<option value='' myTag=''>Pilih Kota</option>";
        foreach($kota as $city): //it is important if not compulsory to use a different name for variables!!
        echo "<option value='".$city['city_id']."' myTag='".$city['postal_code']."' namakota='".$city['city_name']."'>".$city['city_name']."</option>";
        endforeach;
    }

    public function getCost(Request $request){

        $tujuan = $request->tujuan;
        $kurir = $request->kurir;
        $berat = $request->berat;

        $getpaket = new CustomHelper;
        $paket = $getpaket->getHarga(152, $tujuan, 1000, $kurir);
        $costs = $paket['costs'];

        // echo "<option value='' myValue=''>Pilih Paket</option>";
        foreach($costs as $key => $pakets): //it is important if not compulsory to use a different name for variables!!
          $value = $costs[$key]['cost'];
        echo "<option value='".$pakets['service']."' myValue='".$value[0]['value']."' etd='".$value[0]['etd']."'>".$pakets['service']."</option>";
        endforeach;
    }

}
