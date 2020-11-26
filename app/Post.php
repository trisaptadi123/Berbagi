<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table ="posts";

   protected $fillable = [
    'title', 'deskripsi','id_category','terkumpul','end_date','kategori','gambar', 'artikel'
];

public function category()
{
    return $this->belongsTo('App\Category');
}

public function getRouteKeyName(){
    return 'deskripsi';
}

public function datadonatur()
{
    return $this->hasOne('App\DataDonatur');
}

protected $primaryKey = 'id_konten';

}
