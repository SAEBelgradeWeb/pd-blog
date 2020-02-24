<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title' => 'Sports']);
        Category::create(['title' => 'Lifestyle']);
        Category::create(['title' => 'Politics']);
        Category::create(['title' => 'Music']);
        Category::create(['title' => 'Technology']);
    }
}
