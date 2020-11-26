<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table ="slider";

    protected $fillable = [
        'gambar_slide','title','subtitle','button','link'
    ];

}
