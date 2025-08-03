<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bus_id',
        'seat_number',
        'schedule',
        'payment_status',
        'order_status',
        'promo_id',
        'diskon_rp',
        'harga_total'
    ];

    protected $casts = [
        'schedule' => 'datetime',
        'payment_status' => 'string',
        'order_status' => 'string'
    ];

    /**
     * Relasi ke user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke promo (jika digunakan)
     */
    public function promo()
    {
        return $this->belongsTo(Promotion::class, 'promo_id');
    }

    /**
     * Relasi ke bus route (asumsinya field `bus_id` menunjuk ke `bus_routes.id`)
     */
    public function busRoute()
    {
        return $this->belongsTo(BusRoute::class, 'bus_id');
    }
}
