<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donatefundraiser extends Model
{
    protected $table ="donaturfundraiser";

    protected $fillable = [
'jumlah','qty','total','nama_pequrban','kode','namakonten','id_konten','id_users','id_qurban','bank','nama','email','nomorhp','status','komentar','url','id_fundraise'
 ];

 public function post()
 {
     return $this->hasMany('App\Post');
 } 

 protected $primaryKey = 'id_donaturfdn';
 public $incrementing = false;
}
