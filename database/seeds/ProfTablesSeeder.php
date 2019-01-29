<?php

use Illuminate\Database\Seeder;

class ProfTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         \App\Profession::create([
            'name' => 'Producteur'
        ]);
        \App\Profession::create([
            'name' => 'Transformateur'
        ]);\App\Profession::create([
        'name' => 'Revendeur'
        ]);
        \App\Profession::create([
            'name' => 'Particulier'
        ]);
    }
}
