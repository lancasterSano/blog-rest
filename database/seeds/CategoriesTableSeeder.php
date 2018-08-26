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
        // Let's truncate our existing records to start from scratch.
        Category::truncate();

        $faker = \Faker\Factory::create()->unique();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'title' => $faker->word
            ]);
        }
    }
}
