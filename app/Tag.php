<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table ="tag_tabel";

    protected $fillable = [
     'name'
 ];

    public function post()
    {
        return $this->belongToMany('App\Post');
    }

    public function articel()
    {
        return $this->belongToMany('App\Artikel');
    }
  
}
