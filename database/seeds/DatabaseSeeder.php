<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(LocationsTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(UitiesTableSeeder::class);
         $this->call(ProfTablesSeeder::class);
    }
}
