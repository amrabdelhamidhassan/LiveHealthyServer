<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'fname' => 'Amr',
            'lname' =>'Abdelhamid',
            'phone' => '01140083012',
            'age' => 26,
            'height' => 170,
            'weight' => 76,
            'gender'=>'male',
            'fatpercentage'=>23,
            'activityId'=>2,
            'roleId'=>1,
            'isblocked'=>false,
            'remember_token' => Str::random(10),
        ]); 
        User::factory()
            ->count(50)
            ->create();
    }
}
