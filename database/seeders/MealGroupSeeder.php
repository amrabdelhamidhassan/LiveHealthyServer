<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=150 ; $i++) { 
            DB::table('meal_groups')->insert([
                'id'=>$i,
                'name' => 'Meal Group ' .strval($i),
                'userId'=>rand(1,51)
            ]);    
        
 
        }
        for ($i=1; $i <=400 ; $i++) { 
            DB::table('meal_meal_group')->insert([
                'id'=>$i,
                'meal_group_id' => rand(1,150),
                'meal_id' => rand(1,400),

            ]);    
        
 
        }
    }
}
