<?php

use App\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class categoriesSeeder extends Seeder
{
    /** COMENTÁRIO RANDOM 2
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<10;$i++){
            $category = new Category;
            $category->name = 'Categoria '.$i;
            $category->parent_id = 0;
            $category->description = 'description';
            $category->url = 'category-url-'.$i;
            $category->save();
        }

        for($i=1; $i<20;$i++){
            $category = new Category;
            $category->name = 'SubCategoria '.$i;
            $category->parent_id = rand(1,9);
            $category->description = 'description sub';
            $category->url = 'subcategory-url-'.$i;
            $category->save();
        }
    }
}
