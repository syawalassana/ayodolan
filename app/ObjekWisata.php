<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    protected $table = 'obj_wisata';

    public function gambarWisata(){
        return $this->hasMany('App\GambarWisata', 'gambarwisata_id' );
    }
}
