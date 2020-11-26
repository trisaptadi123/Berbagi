<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table ="anak";

    protected $fillable = [
     'nama','foto_anak','kriteria','jk','hobi','jp','kls','sekolah','ttl'
 ];
}
