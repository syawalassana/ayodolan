<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
    public function paket(){
        return $this->belongsTo('App\Paket','paket_id');
    }
    public function transaksiPeserta(){
        return $this->hasMany('App\TransaksiPeserta','transaksi_id');
    }
}


