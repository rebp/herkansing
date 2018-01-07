<?php


use App\Category;
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
        $laravel = Category::create([
            'name' => 'Laravel',
        ]);

        $php = Category::create([
            'name' => 'PHP',
        ]);

        $javascript = Category::create([
            'name' => 'Javascript',
        ]);

        $python = Category::create([
            'name' => 'Python',
        ]);
    }
}
