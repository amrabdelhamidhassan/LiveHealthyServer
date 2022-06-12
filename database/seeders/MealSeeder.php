<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=400 ; $i++) { 
            DB::table('meals')->insert([
                'id'=>$i,
                'name' => 'Meal' . strval($i),
            ]);    
        
 
        }
        for ($i=1; $i <=400 ; $i++) { 
            DB::table('food_meal')->insert([
                'id'=>$i,
                'food_id' => rand(1,300),
                'meal_id' => rand(1,400),

            ]);    
        
 
        }
    }
}
