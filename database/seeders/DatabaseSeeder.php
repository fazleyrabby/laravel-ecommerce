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
        
        $superadminRole = Role::create(['name' => 'superadmin']);
        Permission::create(['name' => 'all']);

        $adminRole = Role::create(['name' => 'admin']);
        Role::create(['name' => 'subadmin']);
        Role::create(['name' => 'vendor']);
        $userRole = Role::create(['name' => 'user']);
        
        $user = User::create([
    		'role_id' => 1,
    		'name' => 'Super Admin',
    		'email' => 'superadmin@admin.com',
    		'password' => Hash::make('admin'),
		]);

        $user->assignRole($superadminRole);

       
        $user = User::create([
    		'role_id' => 2,
    		'name' => 'Admin',
    		'email' => 'admin@admin.com',
    		'password' => Hash::make('admin'),
		]);

        $user->assignRole($adminRole);

      
        $user = User::create([
    		'role_id' => 4,
    		'name' => 'Vendor',
    		'email' => 'vendor@mail.com',
    		'password' => Hash::make('vendor'),
		]);

        $user->assignRole($userRole);
    }
}
