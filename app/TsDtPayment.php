<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TsDtPayment extends Model
{
    //
    protected $table = 'ts_dtpayment';

    public function headerpayment()
    {
        return $this->hasMany('App\TsHdPayment', 'ts_hdpayment_id');
    }

    public function tsdttransaksi()
    {
        return $this->hasOne('App\TsDtTransaksi', 'id');
    }
    
}
