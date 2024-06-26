<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRunSheetDetail extends Model
{
    use HasFactory;

    public function bookingData()
    {
        return $this->belongsTo(Booking::class,'bill_no','bill_no');
    }
}
