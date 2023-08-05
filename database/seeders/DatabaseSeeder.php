<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 40 Users
        \App\Models\User::factory(40)->create();

        // Create 60 Tags
        $tags = \App\Models\Tag::factory(60)->create();

        // Create 60 Tags
        \App\Models\Post::factory(400)
        ->hasComments(4) // Create 4 commit
        ->create()
        ->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(rand(2, 4)));
        });

        // Create 60 Tags
        \App\Models\Video::factory(200)
        ->hasComments(3) // Create 4 commit
        ->create()
        ->each(function ($video) use ($tags) {
            $video->tags()->attach($tags->random(rand(2, 4)));
        });

    }
}
