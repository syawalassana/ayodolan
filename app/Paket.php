<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    public function mobil()
    {
        return $this->belongsTo('App\Mobil', 'mobil_id');
    }
    public function hotel()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }
    public function paketDetail()
    {
        return $this->hasMany('App\PaketDetail', 'paket_id');
    }
    public function transaksi(){
        return $this->hasMany('App\Transaksi','paket_id');
    }
}
