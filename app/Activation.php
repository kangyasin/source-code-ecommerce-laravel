<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    //
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

}
