<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRunSheet extends Model
{
    use HasFactory;

    public function drsList()
    {
        return $this->hasmany(DeliveryRunSheetDetail::class,'delivery_run_sheet_id','id');
    }

    public function staff_detail()
    {
        return $this->belongsTo(Admin::class,'code','code');
    }
}
