<?php

use Illuminate\Database\Seeder;

class UitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Unity::create([
            'name' => 'kg'
        ]);
        \App\Unity::create([
            'name' => 'litre'
        ]);
        \App\Unity::create([
            'name' => 'tonne'
        ]);
    }
}
