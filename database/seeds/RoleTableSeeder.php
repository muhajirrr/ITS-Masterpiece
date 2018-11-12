<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $departemen = Role::create(['name' => 'Departemen']);

        $admin->givePermissionTo([
            'Tambah Karya Mahasiswa',
            'Lihat Karya Mahasiswa',
            'Edit Karya Mahasiswa',
            'Hapus Karya Mahasiswa',
            'Tambah Post Kompetisi',
            'Lihat Post Kompetisi',
            'Edit Post Kompetisi',
            'Hapus Post Kompetisi',
            'Konfirmasi Tambah Prestasi',
            'Konfirmasi Edit Prestasi',
            'Tambah User',
            'Lihat User',
            'Edit User',
            'Hapus User',
        ]);

        User::where('username', 'admin')->first()->assignRole('Admin');

        $departemen->givePermissionTo([
            'Tambah Prestasi',
            'Edit Prestasi',
        ]);
    }
}
