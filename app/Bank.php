<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table ="bank";

    protected $fillable = [
     'logo','nama','norek','url','QR','deskripsi','jenis'
 ];
}
