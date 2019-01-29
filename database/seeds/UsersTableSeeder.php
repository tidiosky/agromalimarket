<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('ne_NP');
        for ($i=0; $i < 500; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'lat' => $faker->unique()->latitude(12.6500),
                'lng' => $faker->unique()->longitude(-8.0000)
            ]);
        }
    }
}
