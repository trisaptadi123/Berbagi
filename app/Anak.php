<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table ="anak";

    protected $fillable = [
     'nama','gambar_anak','kriteria','jk','hobi','jp','kls','sekolah','shelter','cabang','ttl','id_disclaimer','deskripsi', 'orangtua_asuh'
    ];

 public function getRouteKeyName(){
     
    return 'nama';
}
}
