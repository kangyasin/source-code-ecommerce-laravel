<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailProduct;
use PDF;

class PDFController extends Controller
{
  public function pdf(){
    $product = DetailProduct::all();
    $pdf = PDF::loadView('pdf', ['DetailProduct' => $product]);
    return $pdf->download('detailproduct.pdf');

  }
}
