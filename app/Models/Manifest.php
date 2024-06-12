<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
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

    public function manifestList()
    {
        return $this->hasmany(ManifestDetails::class,'mainfest_id','id');
    }
}
