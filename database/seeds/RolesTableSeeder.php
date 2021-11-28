<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $role = Role::create(['name' => 'admin',]);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $permissions2 = [
            'user-list',
            'product-list',
        ];


        $role2 = Role::create(['name' => 'employe',]);
        $role2->syncPermissions($permissions2);

        $role3 = Role::create(['name' => 'client',]);
        $role3->syncPermissions($permissions2);
    }
}