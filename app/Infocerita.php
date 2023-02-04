<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infocerita extends Model
{
    protected $table ="info";

    protected $fillable = [
     'id_konten','id_qurban','artikel','judul','id_cairdana'
 ];

 public function getRouteKeyName(){
    return 'deskripsi';
}
protected $primaryKey = 'id';
public $incrementing = false;
}
