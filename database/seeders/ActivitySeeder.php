<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            'id' => 1,
            'name' => 'none',
            'description'=>'little or no exercise, desk job',
            'ratio'=>1.2
        ]);   
        DB::table('activities')->insert([
            'id' => 2,
            'name' => 'low',
            'description'=>'light exercise/ sports 1-3 days/week',
            'ratio'=>1.375
        ]);   
        DB::table('activities')->insert([
            'id' => 3,
            'name' => 'moderate',
            'description'=>'moderate exercise/ sports 6-7 days/week',
            'ratio'=>1.55
        ]);   
        DB::table('activities')->insert([
            'id' => 4,
            'name' => 'high',
            'description'=>'hard exercise every day, or exercising 2 xs/day',
            'ratio'=>1.725
        ]);   
        DB::table('activities')->insert([
            'id' => 5,
            'name' => 'extreme',
            'description'=>'(hard exercise 2 or more times per day, or training for
            marathon, or triathlon, etc.',
            'ratio'=>1.9
        ]);   
    }
}
