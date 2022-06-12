<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foodTypes=collect(['fruit','vegetable','snack','beverage','protein','fat','dairy','grain']);
        $foodTypes->each(function($foodType, $key) {
            DB::table('food_types')->insert([
                'id' => ($key+1),
                'name' => $foodType,
            ]);         
       });
    }
}
