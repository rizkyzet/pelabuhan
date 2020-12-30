<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([[
            'name' => 'Muhamad Rizki',
            'email' => 'rizkyzetzet121@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwer121'),
            'alamat' => 'ciracas',
            'foto' => 'images/profile/default.png',
            'no_hp' => '0895359449377',
            'role_id' => 3,
        ], [
            'name' => 'Audrey Hepburn',
            'email' => 'audrey@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwer121'),
            'alamat' => 'ciracas',
            'foto' => 'images/profile/default.png',
            'no_hp' => '0895359449377',
            'role_id' => 1,
        ], [
            'name' => 'Miss Rae',
            'email' => 'rae@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwer121'),
            'alamat' => 'ciracas',
            'foto' => 'images/profile/default.png',
            'no_hp' => '0895359449377',
            'role_id' => 3,
        ]]);
    }
}
