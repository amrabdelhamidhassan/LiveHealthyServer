<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Database\Eloquent\Builder;
use App\Models\NutritionFact;
use App\Models\FoodType;
use App\Models\ServingQuantity;
use stdClass;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFoodItem(Request $req)
    {
        return Food::where('id',$req->id)->first();
    }
    public function getNutritionFact(Request $req)
    {
        return NutritionFact::where('foodId',$req->id)->first();
    }
    public function search(Request $req)
    {   
        $food=Food::All();
        if($req->name!=""&& $req->name!=null )
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return str_contains(strtolower($item->name),strtolower($req->name));
            });
            $food=$food1->merge($food1);
        }
        if($req->mincalories!="" &&$req->mincalories!=0)
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return ($item->nutritionfacts[0]->calories)>=($req->mincalories) ;
            });
            $food=$food1->merge($food1);
        }
        if($req->maxcalories!="" &&$req->maxcalories!=0)
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return ($item->nutritionfacts[0]->calories)<=($req->maxcalories);
            });
            $food=$food1->merge($food1);
        }
        if($req->mincarbs!="" &&$req->mincarbs!=0)
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return ($item->nutritionfacts[0]->totalcarbs)>=($req->mincarbs);
            });
            $food=$food1->merge($food1);
        }

        if($req->maxcarbs!="" &&$req->maxcarbs!=0)
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return ($item->nutritionfacts[0]->totalcarbs)<=($req->maxcarbs);
            });
            $food=$food1->merge($food1);
        }
        if($req->minfats!="" &&$req->minfats!=0)
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return ($item->nutritionfacts[0]->totalfats)>=($req->minfats);
            });
            $food=$food1->merge($food1);
        }
        if($req->maxfats!="" &&$req->maxfats!=0)
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return ($item->nutritionfacts[0]->totalfats)<=($req->maxfats);
            });
            $food=$food1->merge($food1);
        }
        if($req->minprotein!="" &&$req->minprotein!=0)
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return ($item->nutritionfacts[0]->protein)>=($req->minprotein);
            });
            $food=$food1->merge($food1);
        }
        if($req->maxprotein!="" &&$req->maxprotein!=0)
        {
            $food1=$food->filter(function($item) use ($req)
            {
                return ($item->nutritionfacts[0]->protein)<=($req->maxprotein);
            });
            $food=$food1->merge($food1);
        }
        if($req->foodTypeId!="" &&$req->foodTypeId!='0')
        {
            $food1=$food->where('foodTypeId',(int)$req->foodTypeId);
            $food=$food1->merge($food1);
        }
        if($req->foodVerfication!="" &&$req->foodVerfication!="all")
        {
            if($req->foodVerfication=="verified")
            {
                $food1=$food->where('userId','==',null);
                $food=$food1->merge($food1);
            }
            else
            {
                $food1=$food->where('userId',$req->userId);
                $food=$food1->merge($food1);
            }

        }
        $foodcollection = [];

        foreach ($food as $foodItem){
            $foodData=new stdClass();
            $foodData->id=$foodItem->id;
            $foodData->name=$foodItem->name;
            $foodData->foodType=$foodItem->food_type;
            $foodData->userId=$foodItem->userId;
            foreach($foodItem->nutritionfacts as $nutritionfact)
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
        if($req->sortBy!="" &&$req->sortDir!="")
        {
            if($req->sortDir=='Asc')
{                error_log('here');
    if($req->sortBy=='calories')$foodcollection=collect($foodcollection)->sortBy('nutritionfacts.calories')->toArray();
                else if($req->sortBy=='protein')$foodcollection=collect($foodcollection)->sortBy('nutritionfacts.protein')->toArray();
                else if($req->sortBy=='totalcarbs')$foodcollection=collect($foodcollection)->sortBy('nutritionfacts.totalcarbs')->toArray();
                else if($req->sortBy=='totalfats')$foodcollection=collect($foodcollection)->sortBy('nutritionfacts.totalfats')->toArray();}
            else
{                error_log('here2');
                if($req->sortBy=='calories')$foodcollection=collect($foodcollection)->sortByDesc('nutritionfacts.calories')->toArray();
            else if($req->sortBy=='protein')$foodcollection=collect($foodcollection)->sortByDesc('nutritionfacts.protein')->toArray();
            else if($req->sortBy=='totalcarbs')$foodcollection=collect($foodcollection)->sortByDesc('nutritionfacts.totalcarbs')->toArray();
            else if($req->sortBy=='totalfats')$foodcollection=collect($foodcollection)->sortByDesc('nutritionfacts.totalfats')->toArray();}
        }

        return array_slice($foodcollection, 0, 10) ;
    }
    public function index(Request $req)
    {
        $food=Food::All();
        $search=json_decode($req->searchquery);
        if($search->name!="" && $search->name!=null )
        {
            $food1=$food->filter(function($item) use ($search)
            {
                return str_contains(strtolower($item->name),strtolower($search->name));
            }
        );
        $food=$food1->merge($food1);
        }
        if($search->id!="" && $search->id!=null )
        {
            $food2=$food->where('id',(int)$search->id);
            $food=$food2->merge($food2);

        }
        if($search->foodType!="all" && $search->foodType!=null )
        {
            $food2=$food->where('foodTypeId',(int)$search->foodType);
            $food=$food2->merge($food2);

        }
        $foodData1=$food->map(function ($foodItem)
        {

            $nutritionfact=NutritionFact::where('foodId',$foodItem->id )->first();
            $servingQuantity=ServingQuantity::where('id',$nutritionfact->servingQuantityId)->first();
            $foodItem->servingSize=$nutritionfact->servingSize .' '.$servingQuantity->name;
            $foodItem->calories=$nutritionfact->calories;
            $foodItem->protein=$nutritionfact->protein;
            $foodItem->totalcarbs=$nutritionfact->totalcarbs;
            $foodItem->totalfats=$nutritionfact->totalfats;
        });
        
        if($search->sortDir=='ASC')
        {
            $food2=$food->sortBy($search->sortAttr);
            $food=$food2->merge($food2);
        }
        else {
            $food2=$food->sortByDesc($search->sortAttr);
            $food=$food2->merge($food2);        }

        $foodData=$food->map(function ($foodItem)
        
        {   
            $foodType=FoodType::where('id',$foodItem->foodTypeId )->first();

            return [
                $foodItem->id ,
                $foodItem->name ,
                $foodType->name,
                $foodItem->servingSize,
                $foodItem->calories,
                $foodItem->protein,
                $foodItem->totalcarbs,
                $foodItem->totalfats

            ];
        }
        );
        return json_encode($foodData) ;
    }
    public function getFoodStatistices()
    {   
        
        return response()->json([
            'NumberOfFood' =>$this->getNumberOfFood() ,
            'NumberOfFruitsFood' =>$this->getNumberOfFoodTypeFood('fruit') ,
            'NumberOfVegetablesFood' =>$this->getNumberOfFoodTypeFood('vegetable') ,
            'NumberOfBeveragesFood' =>$this->getNumberOfFoodTypeFood('beverage') ,
            'NumberOfSnacksFood' =>$this->getNumberOfFoodTypeFood('snack') ,
            'NumberOfDairyFood' =>$this->getNumberOfFoodTypeFood('dairy') ,
            'NumberOfGrainFood' =>$this->getNumberOfFoodTypeFood('grain') ,
            'NumberOfProteinFood' =>$this->getNumberOfFoodTypeFood('protein') ,
            'NumberOfFatFood' =>$this->getNumberOfFoodTypeFood('fat') ,

        ]);
    }
    public function getNumberOfFood()
    {
        return Food::All()->count();

    }
    public function getNumberOfFoodTypeFood($req)
    {
        if($req==='protein')
        $foods=Food::whereHas('food_type',function(Builder $foodtype)
        {$foodtype->where('name','like','protein');}
);
        else if($req==='fruit')
        $foods=Food::whereHas('food_type',function(Builder $foodtype)
        {$foodtype->where('name','like','fruit');}
);
        else if($req==='vegetable')
        $foods=Food::whereHas('food_type',function(Builder $foodtype)
        {$foodtype->where('name','like','vegetable');}
);
        else if($req==='snack')
        $foods=Food::whereHas('food_type',function(Builder $foodtype)
        {$foodtype->where('name','like','snack');}
);
        else if($req==='beverage')
        $foods=Food::whereHas('food_type',function(Builder $foodtype)
        {$foodtype->where('name','like','beverage');}
);
        else if($req==='fat')
        $foods=Food::whereHas('food_type',function(Builder $foodtype)
        {$foodtype->where('name','like','fat');}
);
        else if($req==='grain')
        $foods=Food::whereHas('food_type',function(Builder $foodtype)
        {$foodtype->where('name','like','grain');}
);
        else if($req==='dairy')
        $foods=Food::whereHas('food_type',function(Builder $foodtype)
        {$foodtype->where('name','like','dairy');}
);


        return $foods->count();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food=new Food();
        $food->name=$request->name;
        $food->foodTypeId=$request->foodTypeId;
        $nutritionfact=new NutritionFact();
        $nutritionfact->calories=$request->calories;
        $nutritionfact->servingSize=$request->servingSize;
        $nutritionfact->totalfats=$request->totalfats;
        $nutritionfact->totalcarbs=$request->totalcarbs;
        $nutritionfact->protein=$request->protein;
        $nutritionfact->servingQuantityId=$request->servingQuantityId;
        if($request->userId)
        {
            $food->userId=$request->userId;

        
        }
        $food->save();
        $nutritionfact->foodId=$food->id;
        $nutritionfact->save();
        if($request->userId)
        {
            $food->userId=$request->userId;
            $food->meals()->attach($request->mealId);
            $food->meals()->updateExistingPivot($request->mealId, ['serving' => $request->serving]);
        
        }
    }
    public function addToMeal(Request $req)
    {
        $food=Food::find($req->foodId);
        $food->meals()->attach($req->mealId);
        $food->meals()->updateExistingPivot($req->mealId, ['serving' => $req->serving]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }
    public function remove(Request $req)
    {
        $food=Food::find($req->foodId);
        $food->meals()->detach($req->mealId);
        $food->save();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $food=Food::where('id',$request->id)->first();
        $food->name=$request->name;
        $food->foodTypeId=$request->foodTypeId;

        $nutritionfact=NutritionFact::where('foodId',$request->id)->first();
        $nutritionfact->calories=$request->calories;
        $nutritionfact->servingSize=$request->servingSize;
        $nutritionfact->totalfats=$request->totalfats;
        $nutritionfact->totalcarbs=$request->totalcarbs;
        $nutritionfact->protein=$request->protein;
        $nutritionfact->servingQuantityId=$request->servingQuantityId;
        $food->save();
        $nutritionfact->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

       return  Food::where('id',$request->id)->first()->delete();
    }
}
