<?php

namespace Database\Seeders;

use App\Models\Comunity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ComunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comunities =  Comunity::factory(10)->create();


        foreach ($comunities as $comunity) {
            Image::factory(1)->create([
                'imageable_id' => $comunity->id,
                'imageable_type' => Comunity::class
            ]);
        }
        //
    }
}
