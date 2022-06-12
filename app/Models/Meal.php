<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
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
];
public function foods()
{
    return $this->belongsToMany(Food::class)->withPivot('serving');

}
public function groups()
{
    return $this->belongsToMany(MealGroup::class);

}
}
