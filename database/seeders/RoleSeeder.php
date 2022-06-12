<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=collect(['admin','manager','contentmanager']);
        $roles->each(function($role, $key) {
            DB::table('roles')->insert([
                'id' => ($key+1),
                'name' => $role,
            ]);         
       });
    }
}
