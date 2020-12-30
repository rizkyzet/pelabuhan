<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KapalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     [
        //         'jenis' => 'Ferry',
        //         'slug' => \Str::slug('ferry'),
        //     ],
        //     [
        //         'jenis' => 'Tanker',
        //         'slug' => \Str::slug('tanker'),
        //     ],
        //     [
        //         'jenis' => 'Kargo',
        //         'slug' => \Str::slug('kargo'),
        //     ]
        // ];

        // \App\Kapal::insert($data);


        $kapal = collect(['Ferry', 'Tanker', 'Kargo']);

        $kapal->each(function ($k) {
            \App\Kapal::create([
                'jenis' => $k,
                'slug' => Str::slug($k),
            ]);
        });
    }
}
