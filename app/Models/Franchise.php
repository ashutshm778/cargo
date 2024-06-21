<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;

    public function branch_data()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
