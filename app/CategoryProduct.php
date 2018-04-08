<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    // protected $table = 'namatable'; jika nama model berbeda dengan nama table deklarasi ini
    protected $table = 'categoryproducts';
    public $timestamps = false; // jika pada tabel tidak ada field create_at dan update_at set false

    // fungsi untuk menampilkan banyak product berdasarkan relasi kategori tabel ini ke tabel model lain e.g App\DetailProduct
    public function product()
    {
        return $this->hasMany('App\DetailProduct', 'categoryproducts_id');
    }
}
