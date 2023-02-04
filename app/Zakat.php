<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    protected $table ="zakat";

    protected $fillable = [
        'jumlah','nama','email','bank','kode_unik','nomorhp','jenis'
 ];

//  protected $primaryKey = 'id_zakat';
protected $primaryKey = 'id_zakat'; // or null

    public $incrementing = false;

}
