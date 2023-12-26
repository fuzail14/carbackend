<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_name', 'car_model', 'car_number', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
