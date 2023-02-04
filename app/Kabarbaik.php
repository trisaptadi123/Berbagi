<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabarbaik extends Model
{
    protected $table ="kabarbaik";

    protected $fillable = [
        'gambar_cerita','judul','artikel','link'
    ];
    
    public function getRouteKeyName(){
        return 'judul';
    }
}
