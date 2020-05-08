<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarEvent extends Model
{
    protected $table = 'gambar_event';
    public function event(){

        return $this->belongsTo('App\Event', 'event_id');
    }
}
