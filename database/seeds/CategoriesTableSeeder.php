<?php

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
        //
        \App\Categorie::create([
            'name' => 'Fruits'
        ]);
        \App\Categorie::create([
            'name' => 'Substences'
        ]);\App\Categorie::create([
        'name' => 'Legumes'
        ]);
        \App\Categorie::create([
            'name' => 'Vegetaux'
        ]);

    }
}
