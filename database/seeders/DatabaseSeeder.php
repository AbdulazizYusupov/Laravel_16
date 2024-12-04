<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Group;
use App\Models\Jadval;
use App\Models\Post;
use App\Models\Test;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        for ($i = 0; $i < 100; $i++) {
            Category::create([
                'name' => 'Category ' . $i,
            ]);
        }
        for ($i = 0; $i < 100; $i++) {
            Post::create([
                'title' => 'Post ' . $i,
                'description' => 'Content ' . $i,
                'category_id' => rand(1, 100),
            ]);
        }
        for ($i = 1; $i <= 20; $i++) {
            Group::create([
                'name' => 'Group ' . $i,
                'tr' => rand(1, 20),
            ]);
        }
        for ($i = 1; $i <= 20; $i++) {
            Test::create([
                'name' => 'Test ' . $i,
                'status' => rand(0, 3)
            ]);
        }
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('<PASSWORD>'),
            ]);
        }
//        for ($i = 1; $i <= 20; $i++) {
//            Jadval::create([
//                'user_id' => rand(1, 20),
//                'data'
//            ]);
//        }
    }
}
