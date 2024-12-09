<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Ability
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * 
 * Relations:
 * @property Collection<int, User> $users
 * @property Collection<int, Ability> $abilities
 */

class Ability extends Model
{
    use HasFactory;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'ability_role', 'ability_id', 'role_id');
    }
}