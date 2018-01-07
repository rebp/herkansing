<?php

use Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_1 = Category::create([
            'name' => 'Laravel',
        ]);

        $category_2 = Category::create([
            'name' => 'PHP',
        ]);

        $category_3 = Category::create([
            'name' => 'Javascript',
        ]);

        $category_4 = Category::create([
            'name' => 'Python',
        ]);
    }
}
