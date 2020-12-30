<?php

use Illuminate\Database\Seeder;

class DermagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dermaga = collect(['Dermaga 1', 'Dermaga 2', 'Dermaga 3']);
        $dermaga->each(function ($r) {
            \App\Dermaga::create([
                'nama' => $r,
                'slug' => \Str::slug($r)
            ]);
        });
    }
}
