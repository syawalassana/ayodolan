<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    protected $table = 'obj_wisata';

    protected $appends = ['url_image'];

    public function getUrlImageAttribute()
    {
        if($this->gambar){
            return asset('objekwisata/'.$this->gambar);
        }
        return asset(DEFAULT_IMAGE);
    }

    public function gambarWisata(){
        return $this->hasMany('App\GambarWisata', 'gambarwisata_id' );
    }
}
