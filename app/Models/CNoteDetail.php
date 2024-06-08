<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CNoteDetail extends Model
{
    use HasFactory;

    public function branchData()
    {
        return $this->belongsTo(Branch::class, 'assign_to', 'id');
    }

}
