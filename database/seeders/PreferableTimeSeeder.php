<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferableTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preferableTimes=collect(['morning','noon','afternoon','evening','night']);
        $preferableTimes->each(function($preferableTime, $key) {
            DB::table('preferable_times')->insert([
                'id' => ($key+1),
                'name' => $preferableTime,
            ]);         
       });
    }
}
