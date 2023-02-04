<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qurban extends Model
{
    protected $table ="qurban";

    protected $fillable = [
        'judul', 'deskripsi','harga','name','gambar','alamat','status','id_users','link','jenis','aktif'
    ];

    public function getRouteKeyName(){
        return 'link';
    }

    public function dataqurban()
{
    // return $this->hasOne('App\DataDonatur');
    return $this->belongsTo(Dataqurban::class);
}

    protected $primaryKey = 'id_qurban';
}
