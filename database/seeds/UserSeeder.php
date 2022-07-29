<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i = 0; $i < 20; $i++) {
        //     $new_user = new User();
        //     $new_user->name = $faker->name;
        //     $new_user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; //password
        //     $new_user->email = $faker->unique()->safeEmail;
        //     $new_user->save();
        // }
        factory(User::class, count(config('db.restaurants')))->create();
    }
}
