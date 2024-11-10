<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['shop_name',  'area_id', 'genre_id', 'user_id', 'shop_description', 'shop_image'];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeAreaSearch($query, $shop_area)
    {
        if (!empty($shop_area)) {
            $query->where('area_id', $shop_area);
        }
    }

    public function scopeGenreSearch($query, $shop_genre)
    {
        if (!empty($shop_genre)) {
            $query->where('genre_id', $shop_genre);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('shop_name', 'like', '%' . $keyword . '%');
        }
    }

    public function scopeUserIdSearch($query, $userId)
    {
        if (!empty($userId)) {
            $query->where('user_id', $userId);
        }
    }

    public function hasFavorite($user_id)
    {
        $favorite = Favorite::where('user_id', $user_id)
            ->where('shop_id', $this->id)
            ->first();
        if ($favorite) {
            return true;
        }
        return false;
    }

    public function confirmReservations()
    {
        return $this
            ->belongsToMany(User::class, 'reservations')
            ->withPivot('shop_id', 'date', 'time', 'number')
            ->orderByPivot('date')
            ->orderByPivot('time')
            ->get();
    }
}
