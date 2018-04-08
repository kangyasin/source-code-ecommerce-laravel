<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TsDtTransaksi extends Model
{
    //
    protected $table = 'ts_dttransaksi';

    public function productinfo()
    {
        return $this->belongsTo('App\DetailProduct', 'detailproducts_id');
    }

    public function headertransaksi()
    {
        return $this->hasMany('App\TsHdTransaksi', 'ts_hdtransaksi_id');
    }

    public function getheaderdata()
    {
        return $this->belongsTo('App\TsHdTransaksi', 'ts_hdtransaksi_id');
    }

    public function detailpayment()
    {
        return $this->belongsTo('App\TsDtPayment', 'id');
    }
}
