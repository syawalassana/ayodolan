<?php

namespace App;

use App\Helpers\Ayo;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $appends = ['harga_tx','harga_supir_tx','harga_tour_guide_tx','total_transaksi_tx'];

    public function getTotalTransaksiTxAttribute()
    {
        if ($this->total_transaksi) {
            return Ayo::rupiah($this->total_transaksi);
        }

        return 'Rp. 0';
    }

    public function getHargaTxAttribute()
    {
        if ($this->harga) {
            return Ayo::rupiah($this->harga);
        }

        return 'Rp. 0';
    }

    public function getHargaTourGuideTxAttribute()
    {
        if ($this->harga_tour_guide) {
            return Ayo::rupiah($this->harga_tour_guide);
        }

        return 'Rp. 0';
    }

    public function getHargaSupirTxAttribute()
    {
        if ($this->harga_supir) {
            return Ayo::rupiah($this->harga_supir);
        }

        return 'Rp. 0';
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function paket()
    {
        return $this->belongsTo('App\Paket', 'paket_id');
    }
    public function transaksiPeserta()
    {
        return $this->hasMany('App\TransaksiPeserta', 'transaksi_id');
    }
}
