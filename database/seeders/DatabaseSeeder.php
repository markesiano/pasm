<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Resources\Post;
use App\Models\Category;
use App\Models\Comunity;
use App\Models\Tag;
use App\Models\Thought;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');


        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        $this->call(PostSeeder::class);
        $this->call(ComunitySeeder::class);
        $this->call(ThoughtSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
