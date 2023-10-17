<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' =>'tambah user']);
        Permission::create(['name' =>'edit user']);

        Role::create(['name' =>'admin']);
        Role::create(['name' =>'super admin']);
        Role::create(['name' =>'auditor']);
        Role::create(['name' =>'lead auditor']);
        Role::create(['name' =>'auditee']);
        Role::create(['name' =>'watcher']);

     
    }
}
