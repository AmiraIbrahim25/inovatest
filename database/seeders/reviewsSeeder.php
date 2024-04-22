<?php

namespace Database\Seeders;
use App\Models\Review;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class reviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($x = 0; $x <= 20000; $x++) {
            review::create([
                'review' => fake()->text,
                'post_id' => Post::all()->random()->id,
 
            ]);
          }
    }
}
