<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Role
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

class Role extends Model
{
    use HasFactory;

    public function abilities(): BelongsToMany
    {
        return $this->belongsToMany(Ability::class, 'ability_role', 'role_id', 'ability_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
    
}