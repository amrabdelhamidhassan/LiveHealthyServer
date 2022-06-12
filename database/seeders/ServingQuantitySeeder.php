<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServingQuantitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servingquantaties=collect(['gm','mgm','l','ml','cup','pack']);
        $servingquantaties->each(function($servingquantity, $key) {
            DB::table('serving_quantities')->insert([
                'id' => ($key+1),
                'name' => $servingquantity,
            ]);         
       });
    }
}
