<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usermeta;
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
            'status' => 1,
		]);

        Usermeta::create([
            'user_id' => $user->id,
            'key' => 'user_data',
            'value' => '{"contact":"+88015564568888","photo":"admin\/images\/uploads\/1731560317008930.jpg"}',
        ]);
        

        $user->assignRole($adminRole);

        $user = User::create([
    		'role_id' => 2,
    		'name' => 'Vendor',
    		'email' => 'vendor@admin.com',
    		'password' => Hash::make('vendor'),
            'status' => 1,
		]);

        $user->assignRole($vendorRole);

        Usermeta::create([
            'user_id' => $user->id,
            'key' => 'vendor_data',
            'value' => '{"shop_name":"Regina Livingston","shop_address":"Non quia enim natus","shop_city":"Laudantium libero d","shop_state":"55","shop_country":"Fugiat dolor cupidat","shop_pincode":"Est mollitia ratione","shop_mobile":"5641545633","shop_website":"https:\/\/www.qahoqyn.ca","shop_email":"byromyme@mailinator.com","license_number":"734 456645"}',
        ]);
        
        Usermeta::create([
            'user_id' => $user->id,
            'key' => 'user_data',
            'value' => '{"contact":"fasfsdf","photo":"admin\/images\/uploads\/1731564452251958.jpg","city":"dfasfasdfasd","address":"fasf"}',
        ]);

        $user = User::create([
    		'role_id' => 3,
    		'name' => 'User',
    		'email' => 'user@admin.com',
    		'password' => Hash::make('user'),
            'status' => 1,
		]);

        $user->assignRole($userRole);
      
    }
}
