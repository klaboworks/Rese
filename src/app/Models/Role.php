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
        return $this->BelongsToMany(User::class, 'roles_users')->withTimestamps();
    }

    public function managers()
    {
        return $this->belongsToMany(User::class, 'roles_users')
            ->withPivot('role_id')
            ->get();
    }
}
