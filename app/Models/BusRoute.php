<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin_id',
        'destination_id',
        'bus_id',
        'departure_time',
        'arrival_time',
        'price',
        'is_featured'
    ];

    // Scope untuk rute unggulan
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Relasi ke City (origin)
    public function origin()
    {
        return $this->belongsTo(City::class, 'origin_id');
    }

    // Relasi ke City (destination)
    public function destination()
    {
        return $this->belongsTo(City::class, 'destination_id');
    }

    // Relasi ke Bus
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}