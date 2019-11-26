<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
    protected $table = 'wisatawan';
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
