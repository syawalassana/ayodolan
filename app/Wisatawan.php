<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
    protected $table = 'wisatawan';

    protected $appends = ['url_image','tanggal_lahir_tx'];

    public function getTanggalLahirTxAttribute()
    {
        if ($this->tanggal_lahir) {
            return date('d-m-Y', strtotime($this->tanggal_lahir));
        }

        return date('d-m-Y', now());
    }

    public function getUrlImageAttribute()
    {
        if ($this->foto) {
            return asset('wisatawan/' . $this->foto);
        }

        return asset(DEFAULT_IMAGE);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
