<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    //

    protected $table = 'usergroups';
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\UserAdmin', 'usergroups_id');
    }
}
