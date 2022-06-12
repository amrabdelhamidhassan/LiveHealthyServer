<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
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
        'description',
        'ratio',
    ];
    public function users()
    {
        return $this->hasMany(User::class);

    }
    public static function getActivityById($id)
    {
       $activity=Activity::where('id',$id)->first();
       if($activity)
       return $activity->name;
    }
}
