<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'password' => 'hehe'
        ]);

        User::create([
            'username' => 'hmtc',
            'name' => 'HMTC',
            'password' => 'hehe'
        ]);
    }
}
