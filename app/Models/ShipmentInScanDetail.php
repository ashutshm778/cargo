<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentInScanDetail extends Model
{
    use HasFactory;

    public function branch_from()
    {
        return $this->belongsTo(Branch::class,'origin','id');
    }

    public function branch_to()
    {
        return $this->belongsTo(Branch::class,'destination','id');
    }


}
