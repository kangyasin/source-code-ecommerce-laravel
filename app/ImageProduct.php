<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    //
    protected $table = 'imageproducts';
    // protected $fillable = [
    //     'detailproducts_id',
    //     'nameimage',
    //     'mainflag'
    // ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'id');
    }

    
}
