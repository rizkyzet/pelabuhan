<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect(['agen', 'admin', 'pimpinan']);
        $roles->each(function ($r) {
            \App\Role::create([
                'name' => $r
            ]);
        });
    }
}
