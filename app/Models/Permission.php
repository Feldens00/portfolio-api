<?php

namespace App\Models;

use App\Enums\PermissionType;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'type'];

    protected $casts = [
        'type' => PermissionType::class,
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permissions')
                    ->withTimestamps();
    }
}
