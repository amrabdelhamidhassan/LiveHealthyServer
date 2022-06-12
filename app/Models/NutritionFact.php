<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionFact extends Model
{
    use HasFactory;
            /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'totalfats',
        'saturatedfats',
        'polyunsaturatedfats',
        'monounsaturatedfats',
        'transfats',
        'totalcarbs',
        'sugars',
        'fibers',
        'starches',
        'protein',
        'vitaminA',
        'vitaminC',
        'vitaminD',
        'vitaminK',
        'vitaminE',
        'vitaminB1',
        'vitaminB2',
        'vitaminB3',
        'vitaminB5',
        'vitaminB6',
        'vitaminB7',
        'vitaminB9',
        'vitaminB12',
        'choline',
        'calcium',
        'chloride',
        'chromium',
        'copper',
        'fluoride',
        'iodine',
        'iron',
        'magnesium',
        'manganese',
        'molybdenum',
        'phosphorus',
        'potassium',
        'selenium',
        'sodium',
        'zinc',
    ];
    public function food()
    {
        return $this->belongsTo(Food::class);

    }
    public function servingQuantity()
    {
        return $this->belongsTo(ServingQuantity::class,'servingQuantityId');

    }
}
