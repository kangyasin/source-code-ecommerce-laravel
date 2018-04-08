<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAdmin extends Authenticatable
{
protected $guard = 'useradmin';
    protected $table = 'useradmin';
    public $timestamps = false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    // public function getUserAdmin($email)
    // {
    //   $datauser = DB::where('email', $email)
    //   ->orWhere('email', 'like', '%' . $email . '%')->get();
    //
    //   return $datauser;
    // }

}
