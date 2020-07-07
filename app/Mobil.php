<?php

namespace App;

use App\Helpers\Ayo;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

    protected $appends = ['harga_sewa_tx','url_image'];

    public function getUrlImageAttribute()
    {
        if ($this->foto_mobil) {
            return asset('mobil/' . $this->foto_mobil);
        }

        return asset('images/default.jpg');
    }

    public function getHargaSewaTxAttribute()
    {
        if ($this->harga_sewa) {
            return Ayo::rupiah($this->harga_sewa);
        }

        return 'Rp. 0';
    }

    public function paket()
    {
        return $this->hasMany('App\Paket', 'paket_id');
    }
    public function mobildetail()
    {
        return $this->hasMany('App\GambarMobil', 'mobil_id');
    }
}
