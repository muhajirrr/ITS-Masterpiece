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
        Role::create(['name' => 'Departemen']);

        $admin->givePermissionTo(['Tambah User', 'Lihat User', 'Edit User', 'Hapus User']);
        User::where('username', 'admin')->first()->assignRole('Admin');
    }
}
