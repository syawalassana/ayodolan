<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';

    public function paket(){
        return $this->hasMany('App\Paket','paket_id');
    }

    public function hoteldetail(){
        return $this->hasMany('App\GambarHotel','hotel_id');
    }
}
