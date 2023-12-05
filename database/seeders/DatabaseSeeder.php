<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

       

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => Hash::make(12345678),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.fr',
            'password' => Hash::make(12345678),
        ]);

        

        Post::factory(100)->create();
        Category::factory(5)->create();
    }
}
