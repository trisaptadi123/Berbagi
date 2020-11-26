<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDonatur extends Model
{
    protected $table ="datadonatur";

    protected $fillable = [
'jumlah','kode','namakonten','id_konten','bank','nama','email','nomorhp','status','komentar'
 ];

 public function post()
 {
     return $this->belongsTo('App\Post');
 } 

 protected $primaryKey = 'id_donatur';

}
