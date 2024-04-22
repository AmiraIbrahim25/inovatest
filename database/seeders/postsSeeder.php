<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class postsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($x = 0; $x <= 50000; $x++) {
            Post::create([
                'title' => fake()->text,
                'body' => fake()->text,
                'user_id' => User::all()->random()->id,
 
            ]);
          }
    }
}
