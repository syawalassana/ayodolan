<?php

namespace App;

use App\Helpers\Ayo;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($mobil) {
            $relationMethods = ['paket'];

            foreach ($relationMethods as $relationMethod) {
                if ($mobil->$relationMethod()->count() > 0) {
                    // return redirect()->back()->with('error', 'Data ada relasinya');
                    // session()->now('error', 'Data memiliki relasi dengan ' . $relationMethod);
                    session()->flash('error', 'Gagal hapus karena memiliki relasi dengan data ' . $relationMethod);

                    return false;
                }
            }
        });
    }

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
        return $this->hasMany('App\Paket', 'mobil_id');
    }
    public function mobildetail()
    {
        return $this->hasMany('App\GambarMobil', 'mobil_id');
    }
}
