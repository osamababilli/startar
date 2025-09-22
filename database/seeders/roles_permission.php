<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class roles_permission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء الأدوار


        $role =   Role::create(['name' => 'super admin', 'guard_name' => 'web']);

        $permissions = [


            'create user',
            'edit user',
            'delete user',
            'view users',
            'show user',


            'create role',
            'edit role',
            'delete role',
            'view roles',



            'create permission',
            'edit permission',
            'delete permission',
            'view permissions',


            'view activity logs',


        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission, 'guard_name' => 'web']);
            $role->givePermissionTo($permission);
        }


        $user = \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // password
            'status' => 'active',
        ]);

        $user->assignRole('super admin');
    }
}
