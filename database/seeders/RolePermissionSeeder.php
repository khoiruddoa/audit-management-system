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
        Permission::create(['name' =>'hapus user']);
        Permission::create(['name' =>'lihat user']);
        Permission::create(['name' =>'detail user']);
        Permission::create(['name' =>'lihat dashboard']);
        Permission::create(['name' =>'lihat dashboard kegiatan']);
        Permission::create(['name' =>'membuat kegiatan audit']);
        Permission::create(['name' =>'edit kegiatan audit']);
        Permission::create(['name' =>'simpan kegiatan audit']);
        Permission::create(['name' =>'update kegiatan audit']);
        Permission::create(['name' =>'hapus kegiatan audit']);
        Permission::create(['name' =>'finish kegiatan audit']);
        Permission::create(['name' =>'onprogress kegiatan audit']);
        Permission::create(['name' =>'cancel kegiatan audit']);


        Permission::create(['name' =>'lihat perencanaan audit']);
        Permission::create(['name' =>'detail perencanaan audit']);
        Permission::create(['name' =>'hapus perencanaan audit']);
        Permission::create(['name' =>'lanjut perencanaan audit']);
        Permission::create(['name' =>'membuat perencanaan audit']);
        Permission::create(['name' =>'edit perencanaan audit']);
        Permission::create(['name' =>'simpan perencanaan audit']);
        Permission::create(['name' =>'update perencanaan audit']);
        Permission::create(['name' =>'jadwal perencanaan audit']);



        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);

        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);
        Permission::create(['name' =>'']);









        Role::create(['name' =>'admin']);
        Role::create(['name' =>'super admin']);
        Role::create(['name' =>'auditor']);
        Role::create(['name' =>'lead auditor']);
        Role::create(['name' =>'auditee']);
        Role::create(['name' =>'watcher']);

     
    }
}
