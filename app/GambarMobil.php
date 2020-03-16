<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarMobil extends Model
{
    protected $table = 'gambar_mobil'; //nama yang ada di table database

    public function mobil(){

         return $this->belongsTo('App/Mobil', 'mobil_id');

}
}
