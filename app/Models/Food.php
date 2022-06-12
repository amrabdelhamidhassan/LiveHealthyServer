<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Food extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'arabicname',
        'nickname',
        'arabicnickname',
        'photourl',
        'userId'
    ];
    public function food_type()
    {
        return $this->belongsTo(FoodType::class,'foodTypeId');

    }
    public function preferableTime()
    {
        return $this->belongsTo(PreferableTime::class);

    }
    public function nutritionfacts()
    {
        return $this->hasMany(NutritionFact::class,'foodId');

    }
    public function meals()
    {
        return $this->belongsToMany(Meal::class)->withPivot('serving');;

    }
    public function user()
    {
        
            return $this->belongsToMany(User::class);
    
    }
}
