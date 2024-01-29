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
        Permission::create(['name' => 'tambah user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'hapus user']);
        Permission::create(['name' => 'lihat user']);
        Permission::create(['name' => 'detail user']);
        Permission::create(['name' => 'lihat dashboard']);
        Permission::create(['name' => 'lihat dashboard kegiatan']);
        Permission::create(['name' => 'lihat kegiatan audit']);
        Permission::create(['name' => 'membuat kegiatan audit']);
        Permission::create(['name' => 'edit kegiatan audit']);
        Permission::create(['name' => 'simpan kegiatan audit']);
        Permission::create(['name' => 'update kegiatan audit']);
        Permission::create(['name' => 'hapus kegiatan audit']);
        Permission::create(['name' => 'finish kegiatan audit']);
        Permission::create(['name' => 'onprogress kegiatan audit']);
        Permission::create(['name' => 'cancel kegiatan audit']);


        Permission::create(['name' => 'lihat perencanaan audit']);
        Permission::create(['name' => 'detail perencanaan audit']);
        Permission::create(['name' => 'hapus perencanaan audit']);
        Permission::create(['name' => 'lanjut perencanaan audit']);
        Permission::create(['name' => 'membuat perencanaan audit']);
        Permission::create(['name' => 'edit perencanaan audit']);
        Permission::create(['name' => 'simpan perencanaan audit']);
        Permission::create(['name' => 'update perencanaan audit']);
        Permission::create(['name' => 'jadwal perencanaan audit']);



        Permission::create(['name' => 'lihat program kerja audit']);
        Permission::create(['name' => 'detail program kerja audit']);
        Permission::create(['name' => 'hapus program kerja audit']);
        Permission::create(['name' => 'membuat program kerja audit']);
        Permission::create(['name' => 'simpan program kerja audit']);
        Permission::create(['name' => 'edit program kerja audit']);
        Permission::create(['name' => 'update program kerja audit']);
        Permission::create(['name' => 'tambah pustaka audit-program audit']);

        Permission::create(['name' => 'lihat dokumen program kerja audit']);
        Permission::create(['name' => 'simpan dokumen program kerja audit']);
        Permission::create(['name' => 'update dokumen program kerja audit']);
        Permission::create(['name' => 'hapus dokumen program kerja audit']);


        Permission::create(['name' => 'membuat tim audit']);
        Permission::create(['name' => 'simpan tim audit']);
        Permission::create(['name' => 'update tim audit']);
        Permission::create(['name' => 'hapus tim audit']);
        Permission::create(['name' => 'lihat tim audit']);



        Permission::create(['name' => 'lihat pelaksanaan audit']);
        Permission::create(['name' => 'membuat pelaksanaan audit']);
        Permission::create(['name' => 'edit pelaksanaan audit']);
        Permission::create(['name' => 'update pelaksanaan audit']);
        Permission::create(['name' => 'delete pelaksanaan audit']);
        Permission::create(['name' => 'detail pelaksanaan audit']);
        Permission::create(['name' => 'selesai pelaksanaan audit']);




        Permission::create(['name' => 'lihat program kerja audit di pelaksanaan']);
        Permission::create(['name' => 'detail program kerja audit di pelaksanaan']);
        Permission::create(['name' => 'hapus program kerja audit di pelaksanaan']);
        Permission::create(['name' => 'membuat program kerja audit di pelaksanaan']);
        Permission::create(['name' => 'simpan program kerja audit di pelaksanaan']);
        Permission::create(['name' => 'edit program kerja audit di pelaksanaan']);
        Permission::create(['name' => 'update program kerja audit di pelaksanaan']);
        Permission::create(['name' => 'finish program kerja audit di pelaksanaan']);
        Permission::create(['name' => 'batal program kerja audit di pelaksanaan']);


        Permission::create(['name' => 'membuat kertas kerja audit']);
        Permission::create(['name' => 'lihat kertas kerja audit']);
        Permission::create(['name' => 'detail kertas kerja audit']);
        Permission::create(['name' => 'simpan kertas kerja audit']);
        Permission::create(['name' => 'edit kertas kerja audit']);
        Permission::create(['name' => 'update kertas kerja audit']);
        Permission::create(['name' => 'hapus kertas kerja audit']);
        Permission::create(['name' => 'konfirmasi kertas kerja audit']);
        Permission::create(['name' => 'batal konfirmasi kertas kerja audit']);

        //



        Permission::create(['name' => 'lihat program temuan']);
        Permission::create(['name' => 'detail program temuan']);
        Permission::create(['name' => 'lihat program temuan ditanggapi']);
        Permission::create(['name' => 'lihat program temuan tinjau ulang']);
        Permission::create(['name' => 'lihat program temuan tindak lanjut']);
        Permission::create(['name' => 'detail temuan']);
        Permission::create(['name' => 'simpan tanggapan']);
        Permission::create(['name' => 'simpan tanggapan ulang']);
        Permission::create(['name' => 'lihat tanggapan']);



        Permission::create(['name' => 'lihat tindak lanjut auditor']);
        Permission::create(['name' => 'detail tindak lanjut auditor']);
        Permission::create(['name' => 'simpan tindak lanjut auditor']);
        Permission::create(['name' => 'konfirmasi tindak lanjut auditor']);


        //


        Permission::create(['name' => 'lihat tindak lanjut auditee']);

        Permission::create(['name' => 'simpan tindak lanjut auditee']);
        Permission::create(['name' => 'update tindak lanjut auditee']);
        Permission::create(['name' => 'detail tindak lanjut auditee']);



        Permission::create(['name' => 'lihat program kerja auditee']);


        Permission::create(['name' => 'lihat dokumen auditee']);
        Permission::create(['name' => 'update dokumen auditee']);

        Permission::create(['name' => 'lihat tanggapan auditee']);
        Permission::create(['name' => 'detail tanggapan auditee']);
        Permission::create(['name' => 'sanggah tanggapan auditee']);


        Permission::create(['name' => 'lihat manajemen role']);
        Permission::create(['name' => 'membuat manajemen role']);
        Permission::create(['name' => 'simpan manajemen role']);
        Permission::create(['name' => 'detail manajemen role']);
        Permission::create(['name' => 'simpan permission manajemen role']);




        Permission::create(['name' => 'lihat manajemen pegawai']);
        Permission::create(['name' => 'membuat manajemen pegawai']);
        Permission::create(['name' => 'edit manajemen pegawai']);
        Permission::create(['name' => 'simpan manajemen pegawai']);
        Permission::create(['name' => 'update manajemen pegawai']);
        Permission::create(['name' => 'hapus manajemen pegawai']);
        Permission::create(['name' => 'detail manajemen pegawai']);



        Permission::create(['name' => 'lihat manajemen auditor']);
        Permission::create(['name' => 'membuat manajemen auditor']);
        Permission::create(['name' => 'edit manajemen auditor']);
        Permission::create(['name' => 'simpan manajemen auditor']);
        Permission::create(['name' => 'update manajemen auditor']);
        Permission::create(['name' => 'hapus manajemen auditor']);



        Permission::create(['name' => 'lihat manajemen auditee']);
        Permission::create(['name' => 'membuat manajemen auditee']);
        Permission::create(['name' => 'edit manajemen auditee']);
        Permission::create(['name' => 'simpan manajemen auditee']);
        Permission::create(['name' => 'update manajemen auditee']);
        Permission::create(['name' => 'hapus manajemen auditee']);
        Permission::create(['name' => 'detail manajemen auditee']);



        Permission::create(['name' => 'lihat pustaka audit']);
        Permission::create(['name' => 'membuat pustaka audit']);
        Permission::create(['name' => 'edit pustaka audit']);
        Permission::create(['name' => 'simpan pustaka audit']);
        Permission::create(['name' => 'update pustaka audit']);
        Permission::create(['name' => 'hapus pustaka audit']);



        Permission::create(['name' => 'lihat laporan']);
        Permission::create(['name' => 'cetak laporan']);
        Permission::create(['name' => 'detail laporan']);




        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'auditor']);
        Role::create(['name' => 'lead auditor']);
        Role::create(['name' => 'auditee']);
        Role::create(['name' => 'watcher']);

        // Assign seluruh permission ke role super admin
        Role::findByName('super admin')->syncPermissions(Permission::all());
        Role::findByName('admin')->syncPermissions(Permission::all());

        Role::findByName('lead auditor')->syncPermissions([
            'lihat dashboard',
            'lihat dashboard kegiatan',
            'lihat kegiatan audit',

            'lihat perencanaan audit',
            'detail perencanaan audit',

            'lihat program kerja audit',
            'detail program kerja audit',
            'hapus program kerja audit',
            'membuat program kerja audit',
            'simpan program kerja audit',
            'edit program kerja audit',
            'update program kerja audit',
            'tambah pustaka audit-program audit',



            'lihat dokumen program kerja audit',
            'simpan dokumen program kerja audit',
            'update dokumen program kerja audit',
            'hapus dokumen program kerja audit',


            'membuat tim audit',
            'simpan tim audit',
            'update tim audit',
            'hapus tim audit',
            'lihat tim audit',



            'lihat pelaksanaan audit',
            'membuat pelaksanaan audit',
            'edit pelaksanaan audit',
            'update pelaksanaan audit',
            'delete pelaksanaan audit',
            'detail pelaksanaan audit',
            'selesai pelaksanaan audit',



            'lihat program kerja audit di pelaksanaan',
            'detail program kerja audit di pelaksanaan',
            'hapus program kerja audit di pelaksanaan',
            'membuat program kerja audit di pelaksanaan',
            'simpan program kerja audit di pelaksanaan',
            'edit program kerja audit di pelaksanaan',
            'update program kerja audit di pelaksanaan',
            'finish program kerja audit di pelaksanaan',
            'batal program kerja audit di pelaksanaan',


            'membuat kertas kerja audit',
            'lihat kertas kerja audit',
            'detail kertas kerja audit',
            'simpan kertas kerja audit',
            'edit kertas kerja audit',
            'update kertas kerja audit',
            'hapus kertas kerja audit',
            'konfirmasi kertas kerja audit',
            'batal konfirmasi kertas kerja audit',

            'lihat tindak lanjut auditor',
            'detail tindak lanjut auditor',
            'simpan tindak lanjut auditor',
            'konfirmasi tindak lanjut auditor',


            'lihat laporan',
            'cetak laporan',
            'detail laporan',





        ]);


        Role::findByName('auditor')->syncPermissions([
            'lihat dashboard',
            'lihat dashboard kegiatan',
            'lihat kegiatan audit',

            'lihat perencanaan audit',
            'detail perencanaan audit',

            'lihat program kerja audit',
            'detail program kerja audit',




            'lihat tanggapan auditee',
            'detail tanggapan auditee',
            'sanggah tanggapan auditee',

            'lihat dokumen program kerja audit',

            'lihat tim audit',



            'lihat pelaksanaan audit',

            'detail pelaksanaan audit',



            'lihat program kerja audit di pelaksanaan',
            'detail program kerja audit di pelaksanaan',



            'membuat kertas kerja audit',
            'lihat kertas kerja audit',
            'detail kertas kerja audit',
            'simpan kertas kerja audit',
            'edit kertas kerja audit',
            'update kertas kerja audit',
            'hapus kertas kerja audit',

            'lihat tindak lanjut auditor',
            'detail tindak lanjut auditor',



            'lihat laporan',
            'cetak laporan',
            'detail laporan',





        ]);



        Role::findByName('auditee')->syncPermissions([

            'lihat dashboard',
            'lihat dashboard kegiatan',
            'lihat kegiatan audit',



            'lihat program temuan',
            'detail program temuan',
            'lihat program temuan ditanggapi',
            'lihat program temuan tinjau ulang',
            'lihat program temuan tindak lanjut',
            'detail temuan',
            'simpan tanggapan',
            'simpan tanggapan ulang',
            'lihat tanggapan',




            'simpan tindak lanjut auditee',
            'lihat tindak lanjut auditee',
            'update tindak lanjut auditee',
            'detail tindak lanjut auditee',



            'lihat program kerja auditee',


            'lihat dokumen auditee',
            'update dokumen auditee',


            'detail tanggapan auditee',
            'sanggah tanggapan auditee',



            'lihat laporan',
            'cetak laporan',
            'detail laporan',

        ]);
    }
}
