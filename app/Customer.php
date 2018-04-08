<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    //
    protected $guard = 'customer';
    protected $table = 'customers';
    public $timestamps = false;
    use Notifiable;

    protected $fillable = [
        'nama', 'email', 'password', 'status'
    ];

    public function transaksiuser()
    {
        return $this->hasMany('App\TsHdTransaksi', 'customer_id');
    }

    public function alamat()
    {
        return $this->hasOne('App\Alamat');
    }

    public function alamats()
    {
        return $this->hasMany('App\Alamat');
    }
}
