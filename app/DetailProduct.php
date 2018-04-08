<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    //
    protected $table = 'detailproducts';
    protected $appends = ['productimage'];
    public $timestamps = false;

    public function stokproduct()
    {
        return $this->hasMany('App\LogStocks', 'detailproducts_id');
    }

    //fungsi untuk mendefinisikan tabel relasi lain
    public function category()
    {
        return $this->belongsTo('App\CategoryProduct');
    }

    public function detailpesanan()
    {
        return $this->hasMany('App\TsDtTransaksi');
    }

    public function picture()
    {
        return $this->hasMany('App\ImageProduct', 'detailproducts_id');
    }

    public function getProductimageAttribute()
    {
      foreach ($this->picture as $pictures) {

        if($pictures->mainflag == 1){
          return $pictures->nameimage;
        }
      }
    }


}
