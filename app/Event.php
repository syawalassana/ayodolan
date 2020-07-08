<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $appneds = ['url_image','tgl_event_tx'];

    public function getUrlImageAttribute()
    {
        if($this->gambar_event){
            return asset('event/'.$this->gambar_event);
        }
        return asset(DEFAULT_IMAGE);
    }

    public function getTglEventTxAttribute()
    {
        if($this->tgl_event){
            return Carbon::parse($this->tgl_event)->format('d-m-Y');
        }
        return '';
    }

    public function gambarevent(){
        return $this->hasMany('App\GambarEvent', 'event_id');
    }
}
