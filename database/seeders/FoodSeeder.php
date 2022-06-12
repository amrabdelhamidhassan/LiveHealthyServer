<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\NutritionFact;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $data=[
        //     [ 
        //         'id' => 1,
        //         'name' => 'Grilled Chicken Breasts',
        //         'foodTypeId'=>5,
        //     ],
        //     [ 
        //         'id' => 2,
        //         'name' => 'Grilled Meat',
        //         'foodTypeId'=>5,
        //     ],
        //     [ 
        //         'id' => 3,
        //         'name' => 'Tuna Sunshine',
        //         'foodTypeId'=>5,
        //     ],
        //     [ 
        //         'id' => 4,
        //         'name' => 'Grilled Fish Fillet (Tilapia) ',
        //         'foodTypeId'=>5,
        //     ],
        //     [ 
        //         'id' => 5,
        //         'name' => 'Grilled Squid',
        //         'foodTypeId'=>5,
        //     ],
        //     [ 
        //         'id' => 6,
        //         'name' => 'Pro Protein Bar (Coffee)',
        //         'foodTypeId'=>3,
        //     ],
        //     [ 
        //         'id' => 7,
        //         'name' => 'Max Muscle Protein Bar',
        //         'foodTypeId'=>3,
        //     ],
        //     [ 
        //         'id' => 8,
        //         'name' => 'Gold Standard Whey Protein',
        //         'foodTypeId'=>5,
        //     ],
        //     [ 
        //         'id' => 9,
        //         'name' => 'Abu Auf Protein Bar',
        //         'foodTypeId'=>3,
        //     ],
        //     [ 
        //         'id' => 10,
        //         'name' => 'Red Beans (California Gardens)',
        //         'foodTypeId'=>8,
        //     ],
        //     [ 
        //         'id' => 11,
        //         'name' => 'Oat',
        //         'foodTypeId'=>8,
        //     ],
        //     [ 
        //         'id' => 12,
        //         'name' => 'Checkpeas  (California Gardens)',
        //         'foodTypeId'=>8,
        //     ],
        //     [ 
        //         'id' => 13,
        //         'name' => 'Eggs',
        //         'foodTypeId'=>5,
        //     ],
        //     [ 
        //         'id' => 14,
        //         'name' => 'Rich Bake Whole Wheat Baladi Bread',
        //         'foodTypeId'=>8,
        //     ],
        //     [ 
        //         'id' => 15,
        //         'name' => 'Rich Bake Whole Wheat Toast Bread',
        //         'foodTypeId'=>8,
        //     ],
        //     [ 
        //         'id' => 16,
        //         'name' => 'Light Yougurt',
        //         'foodTypeId'=>7,
        //     ],
        //     [ 
        //         'id' => 17,
        //         'name' => 'Skimmed Milk',
        //         'foodTypeId'=>7,
        //     ],
        //     [ 
        //         'id' => 18,
        //         'name' => 'Spianch',
        //         'foodTypeId'=>2,
        //     ],
        //     [ 
        //         'id' => 19,
        //         'name' => 'Green Besela and carrots',
        //         'foodTypeId'=>2,
        //     ],
        //     [ 
        //         'id' => 20,
        //         'name' => 'Green Beans ',
        //         'foodTypeId'=>2,
        //     ],
        //     [ 
        //         'id' => 21,
        //         'name' => 'Cucumber',
        //         'foodTypeId'=>2,
        //     ],
        //     [ 
        //         'id' => 22,
        //         'name' => 'Orange',
        //         'foodTypeId'=>1,
        //     ],
        //     [ 
        //         'id' => 23,
        //         'name' => 'Banana',
        //         'foodTypeId'=>1,
        //     ],
        //     [ 
        //         'id' => 24,
        //         'name' => 'Apple',
        //         'foodTypeId'=>1,
        //     ],
        //     [ 
        //         'id' => 25,
        //         'name' => 'Honey',
        //         'foodTypeId'=>3,
        //     ],
        //     [ 
        //         'id' => 26,
        //         'name' => 'Coffee',
        //         'foodTypeId'=>4,
        //     ],
        //     [ 
        //         'id' => 27,
        //         'name' => 'Almonds',
        //         'foodTypeId'=>6,
        //     ],
        //     [ 
        //         'id' => 28,
        //         'name' => 'Cashew',
        //         'foodTypeId'=>6,
        //     ],
        //     [ 
        //         'id' => 29,
        //         'name' => 'Hazelnut',
        //         'foodTypeId'=>6,
        //     ],
        //     [ 
        //         'id' => 30,
        //         'name' => 'Pistachio',
        //         'foodTypeId'=>6,
        //     ],
        //     [ 
        //         'id' => 31,
        //         'name' => 'Walnut',
        //         'foodTypeId'=>6,
        //     ],
        // ];
        //DB::table('food')->insert($data);   
        Food::factory()->count(300)
        ->create();
    }
}
