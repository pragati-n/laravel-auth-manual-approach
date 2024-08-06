<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CommentsTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        \App\Models\Comment::factory(5)->create();
    }
}
