<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table ="artikel";

    protected $fillable = [
     'id_user','id','judul','penulis','isi','deskripsi','gambar','status'
 ];

 public function getRouteKeyName(){
        return 'deskripsi';
 }

 protected $primaryKey = 'id_artikel';

 public function tags(){
    return $this->belongToMany('App\Tag');
}


}
