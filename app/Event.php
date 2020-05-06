<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    
    public function gambarevent(){
        return $this->hasMany('App/GambarEvent', 'event_id');
    }
}
