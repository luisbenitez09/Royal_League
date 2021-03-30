<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        $admin = Role::create(['name' => 'Admin']);
        //Admin
        $user = Role::create(['name' => 'User']);

        //Permission list
        Permission::create(['name' => 'create profiles']);
        Permission::create(['name' => 'create teams']);
        Permission::create(['name' => 'delete users']);

        $admin->givePermissionTo([
            'delete users'
        ]);

        $user->givePermissionTo([
            'create profiles',
            'create teams'
        ]);

        $users = User::all();

        foreach ($users as $user) {
            if ($user->role_id != null) {
                $user->assignRole($user->role_id);
            }
        }
    }
}
