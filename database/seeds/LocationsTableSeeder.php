<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
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
        for ($i=0; $i < 100; $i++) {
            Location::create([
                'district' => $faker->district,
                'city' => $faker->cityName,
                'lat' => $faker->unique()->latitude(12.6500),
                'lng' => $faker->unique()->longitude(-8.0000)
            ]);
        }
    }
}
