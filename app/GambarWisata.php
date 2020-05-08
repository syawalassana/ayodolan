<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarWisata extends Model
{
    protected $table = 'gambar_wisata';

    public function obj_wisata(){
        return $this->belongsTo('App\ObjekWisata', 'obj_wisata_id');    
    }
}
