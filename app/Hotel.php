<?php

namespace App;

use App\Helpers\Ayo;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';

    protected $appends = ['harga_tx','url_image'];

    public function getUrlImageAttribute()
    {
        if($this->foto_hotel){
            return asset("hote/".$this->foto_hotel);
        }
        return asset(DEFAULT_IMAGE);
    }

    public function getHargaTxAttribute()
    {
        if ($this->harga) {
            return Ayo::rupiah($this->harga);
        }

        return 'Rp. 0';
    }

    public function paket()
    {
        return $this->hasMany('App\Paket', 'paket_id');
    }

    public function hoteldetail()
    {
        return $this->hasMany('App\GambarHotel', 'hotel_id');
    }
}
