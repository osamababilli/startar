<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roles_permission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'super admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
            ]
        ];

        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::create($role);
        }

        // $permissions = [

        //     'create user',
        //     'edit user',
        //     'delete user',
        //     'view user',

        //     'create role',
        //     'edit role',
        //     'delete role',
        //     'view role',

        //     'create permission',
        //     'edit permission',
        //     'delete permission',
        //     'view permission',

        //     'create category',
        //     'edit category',
        //     'delete category',
        //     'view category',

        //     'create product',
        //     'edit product',
        //     'delete product',
        //     'view product',
        // ];

        // foreach ($permissions as $permission) {
        //     \Spatie\Permission\Models\Permission::create(['name' => $permission, 'guard_name' => 'web']);
        // }
    }
}
