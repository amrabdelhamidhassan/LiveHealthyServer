<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServingQuantity extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];
    public function nutritionfacts()
    {
        return $this->hasMany(NutritionFact::class);

    }
}
