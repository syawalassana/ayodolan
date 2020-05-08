<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarHotel extends Model
{
    protected $table = 'gambar_hotel'; //nama yang ada di table database

    public function hotel(){

         return $this->belongsTo('App\Hotel', 'hotel_id');
    }
}
