<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->BelongsToMany(User::class, 'roles_users');
    }

    public function managers()
    {
        return $this->belongsToMany(User::class, 'roles_users')
            ->withPivot('role_id')
            ->get();
    }

    // public function managers()
    // {
    //     return $this->belongsToMany(Shop::class, 'roles_users', null, 'user_id', null, 'user_id')
    //         ->withPivot('role_id')
    //         ->get();
    // }
}
