<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    protected $table ="fundraise";

    protected $fillable = [
        'target','title','id_konten','deskripsi','id_users','id_qurban','hrgqurban','nama','gambar_fdn','artikel','end_date','terkumpul','kutama'
    ];

    public function getRouteKeyName(){
        return 'deskripsi';
    }

    protected $primaryKey = 'id_fundraise';
    public $incrementing = false;
}
