<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);

        $user = User::create([
            'name' => "farhan",
            'email' => "farhan7534031b@gmail.com",
            'password' => Hash::make('indonesia123B'),

        ]);

        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'create posts']);

        $role->givePermissionTo($permission);
        $user->assignRole($role);
    }
}
