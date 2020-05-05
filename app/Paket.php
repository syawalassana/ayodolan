<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    public function Mobil()
    {
        return $this->belongsTo('App\Mobil','mobil_id');
    }
    public function Hotel()
    {
        return $this->belongsTo('App\Hotel','hotel_id');
    }
    public function PaketDetail(){
        return $this->belongsTo('App\Paket','paket_detail_id');
    }
    
}
