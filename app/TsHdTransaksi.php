<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TsHdTransaksi extends Model
{
    //
    protected $table = 'ts_hdtransaksi';

    public function detailtransaksi()
    {
        return $this->hasMany('App\TsDtTransaksi', 'ts_hdtransaksi_id');
    }

    public function customertransaksi()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function headerpayment()
    {
        return $this->hasOne('App\TsHdPayment', 'ts_hdtransaksi_id');
    }

    public function dataalamat(){
        return $this->belongsTo('App\Alamat', 'alamat');
    }
}
