<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table ="posts";

   protected $fillable = [
    'title', 'deskripsi','id_category','terkumpul','end_date','kategori', 'tag', 'nama_kota','gambar','rincian','rincian_dana','keterangan_dokumen' ,'artikel','alamat','status','id_users','campaign', 'unggulan','id','id_disclaimer','des_disclaimer','id_camutama','cam_utama','dana_iklan'
];

public function category()
{
    return $this->belongsTo('App\Category');
}

public function tag()
{
    return $this->belongsTo('App\Tag');
}

public function getRouteKeyName(){
    return 'deskripsi';
}

public function datadonatur()
{
    // return $this->hasOne('App\DataDonatur');
    return $this->belongsTo(DataDonatur::class);
}

protected $primaryKey = 'id_konten';

}
