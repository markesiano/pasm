<?php

namespace Database\Seeders;

use App\Models\Thought;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThoughtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Thought::create([
            'user_id' => 1,
            'pensamiento' => 'Et fugiat quo pariatur et facilis blanditiis odit.',
        ]);
        Thought::factory(10)->create();
        //
    }
}
