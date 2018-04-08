<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
class ExcellController extends Controller
{
    public function ExportClients(){
      Excel::create('clients', function($excel){
        $excel->sheet('clients', function($sheet){
          $sheet->loadView('ExportClients');
        });
      })->export('xlsx');
    }
}
