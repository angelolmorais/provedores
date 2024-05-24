<?php

namespace Database\Seeders;
use Database\Seeders\CategoriesSeeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            ActivitiesSeeder::class,
            CategoriesSeeder::class,
            UserSeeder::class,
            
        ]);
    }
}
