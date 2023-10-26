<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Role;
use \Spatie\Permission\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $superadmin_permissions = [

            'access-users-page',
            'edit-users',
            'delete-users',
            'add-users',

            'access-services-page',
            'edit-services',
            'delete-services',
            'add-services',

            'access-questions-page',
            'edit-questions',
            'delete-questions',
            'add-questions',

            'access-states-page',
            'edit-states',
            'delete-states',
            'add-states',

            'access-communes-page',
            'edit-communes',
            'delete-communes',
            'add-communes',

            'access-centers-page',
            'edit-centers',
            'delete-centers',
            'add-centers',


            'access-documents-page',
            'edit-documents',
            'delete-documents',
            'add-documents',

            'access-structures-page',
            'edit-structures',
            'delete-structures',
            'add-structures',

            'access-structure-types-page',
            'edit-structure-types',
            'delete-structure-types',
            'add-structure-types',


        ];

        foreach ($superadmin_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $permission1 = Permission::create(['name' => 'access-dashboard',]);
        $role  = Role::findByName('superadmin');
        $role->syncPermissions($superadmin_permissions);
        $role->givePermissionTo($permission1);

        $permission = Permission::create(['name' => 'access-appointments-page',]);

        $admin_permissions = [
            'edit-appointments',
            'delete-appointments',
            'add-appointments',
        ];
        foreach ($admin_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role  = Role::findByName('admin');
        $role->syncPermissions($admin_permissions);
        $role->givePermissionTo($permission);
        $role->givePermissionTo($permission1);

        $user_permissions = [
            'access-home-page',
            'book-appointments',
        ];
        foreach ($user_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $role  = Role::findByName('user');
        $role->syncPermissions($user_permissions);
        $role->givePermissionTo($permission);
    }
}
