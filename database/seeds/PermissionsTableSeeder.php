<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Tambah Karya Mahasiswa']);
        Permission::create(['name' => 'Lihat Karya Mahasiswa']);
        Permission::create(['name' => 'Edit Karya Mahasiswa']);
        Permission::create(['name' => 'Hapus Karya Mahasiswa']);
        Permission::create(['name' => 'Tambah Post Kompetisi']);
        Permission::create(['name' => 'Lihat Post Kompetisi']);
        Permission::create(['name' => 'Edit Post Kompetisi']);
        Permission::create(['name' => 'Hapus Post Kompetisi']);
        Permission::create(['name' => 'Tambah Prestasi']);
        Permission::create(['name' => 'Edit Prestasi']);
        Permission::create(['name' => 'Konfirmasi Tambah Prestasi']);
        Permission::create(['name' => 'Konfirmasi Edit Prestasi']);
        Permission::create(['name' => 'Tambah User']);
        Permission::create(['name' => 'Lihat User']);
        Permission::create(['name' => 'Edit User']);
        Permission::create(['name' => 'Hapus User']);
    }
}
