<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100 ; $i++) { 

            $new_dish = new Dish();
            $new_dish->restaurant_id = $faker->numberBetween(1, App\Models\Restaurant::count());
            
            $new_dish->name = $faker->sentence(2);
            $new_dish->slug = Str::slug($new_dish->name, '-') . '-' . rand(1, 1000000);
            $new_dish->description = $faker->text(100);
            $new_dish->ingredients = $faker->sentence(10);
            $new_dish->cover_image = $faker->imageUrl(600, 300, 'Dishes', true, '$dishes->slug', false);
            $new_dish->price = rand(5, 20);
            $new_dish->is_available = true;
            $new_dish->save();


        }
    }
}
