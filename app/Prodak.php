<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodak extends Model
{
    public $table = 'produks';
    protected $hidden = ['created_at','updated_at'];
  
}
