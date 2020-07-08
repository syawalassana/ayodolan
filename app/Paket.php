<?php

namespace App;

use App\Helpers\Ayo;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $appends = ['harga_tx','harga_supir_tx','harga_tour_guide_tx','url_image','harga_final','harga_final_tx'];

    public function getHargaFinalAttribute()
    {
        return $this->harga + $this->harga_supir + $this->harga_tour_guide;
    }

    public function getHargaFinalTxAttribute()
    {
        $h = $this->harga + $this->harga_supir + $this->harga_tour_guide;

        return Ayo::rupiah($h);
    }

    public function getHargaTxAttribute()
    {
        if ($this->harga) {
            return Ayo::rupiah($this->harga);
        }

        return 'Rp. 0';
    }

    public function getUrlImageAttribute()
    {
        if ($this->gambar_paket) {
            return asset('paket/' . $this->gambar_paket);
        }

        return asset(DEFAULT_IMAGE);
    }

    public function getHargaSupirTxAttribute()
    {
        if ($this->harga_supir) {
            return Ayo::rupiah($this->harga_supir);
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
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'paket_id');
    }
}
