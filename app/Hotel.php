<?php

namespace App;

use App\Helpers\Ayo;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($hotel) {
            $relationMethods = ['paket'];

            foreach ($relationMethods as $relationMethod) {
                if ($hotel->$relationMethod()->count() > 0) {
                    // return redirect()->back()->with('error', 'Data ada relasinya');
                    // session()->now('error', 'Data memiliki relasi dengan ' . $relationMethod);
                    session()->flash('error', 'Gagal hapus karena memiliki relasi dengan data ' . $relationMethod);

                    return false;
                }
            }
        });
    }

    protected $appends = ['harga_tx','url_image'];

    public function getUrlImageAttribute()
    {
        if ($this->foto_hotel) {
            return asset('hotel/' . $this->foto_hotel);
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
        return $this->hasMany('App\Paket', 'hotel_id');
    }

    public function hoteldetail()
    {
        return $this->hasMany('App\GambarHotel', 'hotel_id');
    }
}
