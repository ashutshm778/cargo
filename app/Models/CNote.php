<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CNote extends Model
{
    use HasFactory;

    public function c_note_detail_data()
    {
        return $this->hasmany(CNoteDetail::class,'c_no_id','id');
    }
}
