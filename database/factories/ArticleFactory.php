<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        $userId = User::inRandomOrder()->first()->id;
        $title = fake()->sentence;
        return [
            'user_id' => $userId,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' =>  fake()->paragraph,
            'image_path' => fake()->imageUrl(),
            
        ];
    }
}