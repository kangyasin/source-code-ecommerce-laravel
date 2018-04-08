<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    //
    protected $table = 'alamats';

    public function headertransaksi(){
          return $this->belongsTo('App\TsHdTransaksi');
    }
}
