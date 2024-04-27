<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingArea extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'weekday_price', 'weekend_price', 'discount'];
}
