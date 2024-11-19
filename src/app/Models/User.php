<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_users')->withTimestamps();
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function getFavoriteShop()
    {
        return $this
            ->belongsToMany(Shop::class, 'favorites')
            ->orderByPivot('shop_id');
    }

    public function getReservedShop()
    {
        return $this
            ->belongsToMany(Shop::class, 'reservations')
            ->withPivot('id', 'date', 'time', 'number')
            ->orderByPivot('date')
            ->orderByPivot('time');
    }
}
