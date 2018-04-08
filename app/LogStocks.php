<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogStocks extends Model
{
    //
    protected $table = 'logstocks';

    public function product()
    {
        return $this->belongsTo('App\Product', 'id');
    }

}
