<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menu';
    public $timestamps = false;
    public function parent()
    {
      return $this->belongsTo('App\Menu', 'parent_number');
    }
    
}
