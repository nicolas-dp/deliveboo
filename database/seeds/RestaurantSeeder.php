<?php

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


            $restaurants = config('db.restaurants');

            foreach($restaurants as $key => $value) {

                $new_restaurant = new Restaurant();

                $new_restaurant->user_id = $faker->unique()->numberBetween(1, App\Models\User::count());
                $new_restaurant->name = $key;
                $new_restaurant->description = $faker->text(500);
                $new_restaurant->address = $faker->streetAddress;
                $new_restaurant->delivery_cost = rand(1,5);
                $new_restaurant->opening_hours = '08:00:00';
                $new_restaurant->closing_hours = '23:00:00';
                $new_restaurant->phone_number = '347' . $faker->numberBetween(1000000, 9999999);
                $new_restaurant->cover_image = $value;
                $new_restaurant->PIVA = $faker ->unique()->numberBetween(10000000000, 99999999999);
                $new_restaurant->slug = Str::slug($new_restaurant->name) . '-' . rand(1, 1000000);

                $new_restaurant->save();

                $categories = Category::inRandomOrder()->limit(rand(1, 3))->get();
                $new_restaurant->categories()->attach($categories);

/*                 'user_id' => $faker->unique()->numberBetween(1, App\Models\User::count()),
                //'name' => $faker->sentence(2),
                'description' => $faker->text(500),
                'address' => $faker->streetAddress,
                'delivery_cost' => rand(1,10),
                'opening_hours' => '08:00:00',
                'closing_hours' => '23:00:00',
                'phone_number' => $faker->phoneNumber,
                //'cover_image' => $faker->imageUrl(600, 300, 'Restaurant', true, '$restaurant->slug', false),
                'PIVA' => substr($faker ->unique() ->iban('IT'), 0, 11) */
            }
    }
}
