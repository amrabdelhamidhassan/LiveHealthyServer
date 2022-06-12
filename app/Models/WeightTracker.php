<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightTracker extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'weight',
        'entrydate',
        'userId',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
