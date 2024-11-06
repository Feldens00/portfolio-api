<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'view_account'],
            ['name' => 'edit_account'],
            ['name' => 'delete_account'],
            ['name' => 'view_post'],
            ['name' => 'edit_post'],
            ['name' => 'delete_post'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }
    }
}
