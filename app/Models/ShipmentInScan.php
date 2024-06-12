<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentInScan extends Model
{
    use HasFactory;

    public function forwardFrom()
    {
        return $this->belongsTo(Branch::class,'forward_from','id');
    }

    public function forwardTo()
    {
        return $this->belongsTo(Branch::class,'forward_to','id');
    }

    public function shipmentList()
    {
        return $this->hasmany(ShipmentInScanDetail::class,'shipment_in_scan_id','id');
    }
}
