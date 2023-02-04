<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table ="cities";

    protected $fillable = [
     'province_id','name'
 ];


 protected $primaryKey = 'city_id';

}