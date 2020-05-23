<?php

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
        $categories = ['Strategy and Growth', 'Financial Management', 'Technology', 'Communications and Marketing', 'Human Resource Issues'];

        DB::table('categories')->truncate();

        foreach ($categories as $category) {
            \App\Category::create([
                'name' => $category
            ]);
        }
    }
}
