<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DataSeeder extends Seeder
{
    public function run()
    {
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
