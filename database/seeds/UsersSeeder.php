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
        \App\User::create([
            'name' => 'Muhamad Rizki',
            'email' => 'rizkyzet121@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwer121'),
            'alamat' => 'ciracas',
            'foto' => 'images/profile/default.png',
            'role_id' => 1,
        ]);
    }
}
