<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnakAsuh extends Model
{
    protected $table ="anakasuh";

    protected $fillable = [
'id_users','id','nama_anak','name','bulan','total','email','nohp','status','pesan','kode','bank','url','anonim'
 ];

 public function anak()
 {
     return $this->belongsTo(Anak::class);
   
 } 

 public function anakasuh()
 {
     return $this->belongsTo(AnakAsuh::class);
 } 

 protected $primaryKey = 'id_anakasuh';
 public $incrementing = false;
}
