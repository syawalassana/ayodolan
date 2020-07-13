<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['url_image'];

    public function getUrlImageAttribute()
    {
        if ($this->wisatawan->foto) {
            return asset('fotowisatawan/' . $this->wisawatan->foto);
        }

        return asset(DEFAULT_USER_IMAGE);
    }

    public function wisatawan()
    {
        return $this->hasOne('App\Wisatawan', 'user_id');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'user_id');
    }
}
