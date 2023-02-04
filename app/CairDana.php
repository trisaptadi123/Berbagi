<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CairDana extends Model
{
    protected $table ="cairdana";

    protected $fillable = [
       'id_konten','id','campaigner','judul_campaign','alamat','ajuan_dana','ren_dana','tgl_penyaluran','status'
    ];
    
   
    
    protected $primaryKey = 'id_cairdana';
}
