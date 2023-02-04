<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataqurban extends Model
{
    protected $table ="dataqurban";

    protected $fillable = [
'id_user','id_qurban','name','judul','qty','total','nama_qurban','email','nohp','status','pesan','kode','bank','url','anonim'
 ];

 public function qurban()
 {
     return $this->belongsTo(Qurban::class);
   
 } 

 public function dataqurban()
 {
     return $this->belongsTo(Dataqurban::class);
 } 

 protected $primaryKey = 'id_pequrban';
 public $incrementing = false;
}
