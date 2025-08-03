<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'plate_number',
        'capacity'
    ];

    // Relasi ke BusRoute
    public function routes()
    {
        return $this->hasMany(BusRoute::class);
    }
}