<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingProduct extends Model
{
    use HasFactory;

    public function unitData()
    {
        return $this->belongsTo(Unit::class, 'unit', 'id');
    }

    public function bookingData()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }
}
