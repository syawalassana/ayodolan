<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPeserta extends Model
{
    protected $table = 'transaksi_peserta';

    public function transaksi(){
        return $this->belongsTo('App\Transaksi','transaksi_id');
    }
}
