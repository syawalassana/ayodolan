<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketDetail extends Model
{
    protected $table = 'paket_detail';

    public function Paket(){
        return $this->hasMany('App\Paket','paket_id');
    }
    public function ObjekWisata(){
        return $this->hasMany('App\ObjekWisata','obj_wisata_id');
    }
}
