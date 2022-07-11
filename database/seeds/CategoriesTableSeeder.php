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
        $categories = [
            'antipasti',
            'primi piatti',
            'secondi piatti',
            'contorni',
            'fritti',
            'pizze',
            'panini',
            'dolci',
        ];

        foreach($categories as $category){
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = Category::generateSlug($new_category->name);

            $new_category->save();
        }
    }
}
