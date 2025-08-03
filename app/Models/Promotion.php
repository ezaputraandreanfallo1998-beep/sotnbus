<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    // Sesuaikan dengan nama tabel di database
    protected $table = 'promotions';

    protected $fillable = [
        'title',
        'description',
        'discount_code',
        'discount_amount',
        'start_date',
        'end_date',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Scope promo yang aktif dan belum expired
     */
    public static function active()
    {
        return self::where('is_active', 1)
                   ->whereDate('end_date', '>=', now());
    }

    /**
     * Relasi ke rute bus (jika kamu punya kolom bus_route_id)
     */
    public function busRoute()
    {
        return $this->belongsTo(BusRoute::class);
    }
}
