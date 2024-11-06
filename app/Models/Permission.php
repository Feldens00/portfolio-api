<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permissions')
                    ->withPivot('permissible_type', 'permissible_id')
                    ->withTimestamps();
    }
}
