<?php

use App\Tag;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\TagFactory;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 30)->create();
    }
}
