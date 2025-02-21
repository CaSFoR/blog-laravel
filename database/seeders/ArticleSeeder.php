<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Create 50 articles
            Article::factory()->count(150)->create()->each(function ($article) {
                // Get a random category or multiple categories
                $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray();
    
                // Attach the categories to the article
                $article->categories()->attach($categories);
            });
    }
}