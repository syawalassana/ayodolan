<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $appends = ['url_image','tgl_event_tx'];

    public function getUrlImageAttribute()
    {
        if ($this->gambar_event) {
            return asset('event/' . $this->gambar_event);
        }

        return asset(DEFAULT_IMAGE);
    }

    public function getTglEventTxAttribute()
    {
        if ($this->tgl_event) {
            return date('d-m-Y', strtotime($this->tgl_event));
        }

        return '';
    }

    public function gambarevent()
    {
        return $this->hasMany('App\GambarEvent', 'event_id');
    }
}
