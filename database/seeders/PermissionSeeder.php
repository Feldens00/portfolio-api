<?php

namespace Database\Seeders;

use App\Enums\PermissionType;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'view_post', 'type' => PermissionType::POST->value],
            ['name' => 'edit_post', 'type' => PermissionType::POST->value],
            ['name' => 'delete_post', 'type' => PermissionType::POST->value],
            ['name' => 'view_account', 'type' => PermissionType::ACCOUNT->value],
            ['name' => 'edit_account', 'type' => PermissionType::ACCOUNT->value],
            ['name' => 'delete_account', 'type' => PermissionType::ACCOUNT->value],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }
    }
}
