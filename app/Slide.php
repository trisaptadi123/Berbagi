<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table ="slider";

    protected $fillable = [
        'gambar_slide','title','subtitle','penempatan','button','link','qurban'
    ];
    
    protected $primaryKey = 'id_slider';

}
