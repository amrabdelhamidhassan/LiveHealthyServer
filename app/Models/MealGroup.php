<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'userId',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
}