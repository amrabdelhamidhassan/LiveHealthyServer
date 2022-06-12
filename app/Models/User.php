<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'fname',
        'lname',
        'age',
        'phone',
        'height',
        'weight',
        'weightGoal',
        'gender',
        'fatpercentage',
        'isblocked',
        'lastLogin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function role()
    {
        error_log('here');
        return $this->belongsTo(Role::class,'roleId','id');

    }
    public function activity()
    {
        return $this->belongsTo(Activity::class);

    }
    public function mealGroups()
    {
        return $this->hasMany(MealGroup::class);

    }
    public function food()
    {
        return $this->hasMany(Food::class);

    }
    public function weightTrackers()
    {
        return $this->hasMany(WeightTracker::class);

    }
}
