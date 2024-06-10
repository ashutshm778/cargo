<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingProductBarcode extends Model
{
    use HasFactory;

    public function bookingProductData()
    {
        return $this->belongsTo(BookingProduct::class,'booking_product_id','id');
    }
}
