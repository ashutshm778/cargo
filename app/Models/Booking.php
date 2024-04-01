<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();


        if(!empty(auth()->guard("admin")->user()->id)){

        static::created(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'created',
                'details' => 'Booking created with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Booking'
            ]);
        });

        static::updated(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'updated',
                'details' => 'Booking updated with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Booking'
            ]);
        });

        static::deleted(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'deleted',
                'details' => 'Booking deleted with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Booking'
            ]);
        });

      }

    }

    public function booking_product()
    {
        return $this->hasmany(BookingProduct::class,'booking_id','id');
    }

    public function booking_log()
    {
        return $this->hasmany(BookingLog::class,'booking_id','id');
    }

    public function branch_from()
    {
        return $this->belongsTo(Branch::class,'from','id');
    }

    public function branch_to()
    {
        return $this->belongsTo(Branch::class,'to','id');
    }



}
