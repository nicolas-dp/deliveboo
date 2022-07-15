<?php

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Restaurant::class, 20)
        ->make()
        ->each(function($restaurant) {
        $categories = Category::inRandomOrder()->limit(rand(1,3))->get();
        $restaurant->categories()->attach($categories);

        $restaurant->slug = Str::slug($restaurant->name);

        $restaurant->save();
        });
    }
}
