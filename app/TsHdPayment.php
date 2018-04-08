<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TsHdPayment extends Model
{
    //
    protected $table = 'ts_hdpayment';
    public $timestamps = false;

    public function headertransaksi()
    {
        return $this->belongsTo('App\TsHdTransaksi', 'ts_hdtransaksi_id');
    }

    public function detailpayment()
    {
        return $this->hasMany('App\TsDtPayment', 'ts_hdpayment_id');
    }



}
