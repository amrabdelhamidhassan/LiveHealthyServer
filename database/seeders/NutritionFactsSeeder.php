<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionFactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=300 ; $i++) { 
                $protien=rand(1,700)/10.0;
                $carbs=rand(1,600)/10.0;
                $fats=rand(1,500)/10.0;
                $calories=$protien*4 + $carbs*4 + $fats*9 ;
                DB::table('nutrition_facts')->insert([
                    'id'=>$i,
                    'calories' => $calories,
                    'protein'=> $protien,
                    'totalcarbs'=>$carbs,
                    'totalfats'=>$fats,
                    'servingQuantityId'=>1,
                    'servingSize'=>250,
                    'foodId'=>$i
                ]);    
            
     
        }
    }
}
