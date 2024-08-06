<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Post;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model= Comment::class;

    public function definition()
    {
        return [
            "post_id" => \App\Models\Post::factory(),
            "user_id" => \App\Models\User::factory(),
            "body" => $this->faker->paragraph(),
        ];
    }
}
