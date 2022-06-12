<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            FoodTypeSeeder::class,
            PreferableTimeSeeder::class,
            ActivitySeeder::class,
            ServingQuantitySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            FoodSeeder::class,
            NutritionFactsSeeder::class,
            MealSeeder::class,
            MealGroupSeeder::class
        ]);

    }
}
