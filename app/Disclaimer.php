<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disclaimer extends Model
{
    protected $table ="disclaimer";

    protected $fillable = [
     'deskripsi'
 ];

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
