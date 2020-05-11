<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketDetail extends Model
{
    protected $table = 'paket_detail';

    public function paket(){
        return $this->belongsTo('App\Paket','paket_id');
    }
    public function objekWisata(){
        return $this->belongsTo('App\ObjekWisata','obj_wisata_id');
    }
}
