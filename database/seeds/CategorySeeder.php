<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['pizza', 'sushi', 'messicano', 'indiano', 'americano', 'cinese', 'pesce', 'italiano', 'dolce', 'greco'];

        foreach($categories as $category) {
            $new_cat = new Category();
            $new_cat->name = $category;
            $new_cat->slug = Str::slug($new_cat->slug);
            $new_cat->save();
        }
    }
}
