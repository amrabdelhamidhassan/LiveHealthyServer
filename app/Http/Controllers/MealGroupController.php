<?php

namespace App\Http\Controllers;

use App\Models\MealGroup;
use Illuminate\Http\Request;
use stdClass;

class MealGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
         $groups=MealGroup::where('userId',$req->userId)->get();
         $groupscollection = [];
         foreach ($groups as $group){ 
            $groupData=new stdClass();
            $groupData->id=$group->id;
            $groupData->name=$group->name;
            $groupData->userId=$group->userId;
            $mealscollection = [];
            foreach ($group->meals as $meal){ 
                $mealData=new stdClass();
                $mealData->id=$meal->id;
                $mealData->name=$meal->name;
                $foodcollection = [];
                foreach($meal->foods as $food)
                {
                    $foodData=new stdClass();
                    $foodData->id=$food->id;
                    $foodData->name=$food->name;
                    $foodData->foodType=$food->food_type; 
                    error_log($food->pivot->serving);
                    $foodData->serving=$food->pivot->serving;
                    foreach($food->nutritionfacts as $nutritionfact)
                    {
                        $nutritionfactData=new stdClass();
                        $nutritionfactData->id=$nutritionfact->id;
                        $nutritionfactData->calories=$nutritionfact->calories;
                        $nutritionfactData->servingSize=$nutritionfact->servingSize;
                        $nutritionfactData->servingQuantity=$nutritionfact->servingQuantity;
                        $nutritionfactData->totalfats=$nutritionfact->totalfats;
                        $nutritionfactData->protein=$nutritionfact->protein;
                        $nutritionfactData->totalcarbs=$nutritionfact->totalcarbs;
                        $foodData->nutritionfacts=$nutritionfactData;
                    }
                    $foodcollection[]=$foodData;

                }
                $mealData->food=$foodcollection;
                $mealscollection[]=$mealData;

            }
            $groupData->meals=$mealscollection;
            $groupscollection[]=$groupData;
         }
         return ($groupscollection);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $mealGroup=new MealGroup;
        $mealGroup->name=$req->name;
        $mealGroup->userId=$req->userId;
        $mealGroup->save();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MealGroup  $mealGroup
     * @return \Illuminate\Http\Response
     */
    public function show(MealGroup $mealGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MealGroup  $mealGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(MealGroup $mealGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MealGroup  $mealGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MealGroup $mealGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MealGroup  $mealGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $mealGroup=MealGroup::where('id',$req->id)->first();
        $mealGroup->delete();

    }
}
