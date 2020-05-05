<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

public function paket(){
    
    return $this->hasMany('App/Paket','paket_id');
}
public function mobildetail(){

    return $this->hasMany('App/GambarMobil','gambarmobil_id');
}


}

