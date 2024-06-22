<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CNoteFrenchiesDetail extends Model
{
    use HasFactory;

    public function frenchiesData()
    {
        return $this->belongsTo(Franchise::class, 'assign_to', 'id');
    }
}
