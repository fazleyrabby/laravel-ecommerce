<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions =  [
            ['name' => 'create vendor'],
            ['name' => 'edit vendor'],
            ['name' => 'delete vendor'],
            ['name' => 'create user'],
            ['name' => 'edit user'],
            ['name' => 'delete user']
        ];

        $adminRole = Role::create(['name' => 'admin']);

        $vendorRole = Role::create(['name' => 'vendor']);

        $userRole = Role::create(['name' => 'user']);

        foreach ($permissions as $permission) {
            $per= Permission::create($permission);
            $adminRole->givePermissionTo($per);
        }

        $user = User::create([
    		'role_id' => 1,
    		'name' => 'Admin',
    		'email' => 'admin@admin.com',
    		'password' => Hash::make('admin'),
		]);

        $user->assignRole($adminRole);

        $user = User::create([
    		'role_id' => 2,
    		'name' => 'Vendor',
    		'email' => 'vendor@mail.com',
    		'password' => Hash::make('vendor'),
		]);

        $user->assignRole($vendorRole);

        $user = User::create([
    		'role_id' => 3,
    		'name' => 'User',
    		'email' => 'user@mail.com',
    		'password' => Hash::make('user'),
		]);

        $user->assignRole($userRole);
      
        
    }
}
