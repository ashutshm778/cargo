<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BookingLog extends Model
{
    use HasFactory;

    public function branch_data()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function booking_data()
    {
        return $this->belongsTo(Booking::class,'booking_id','id');
    }

    public function user_data()
    {
        return $this->belongsTo(Admin::class,'user_id','id');
    }
    protected static function boot()
    {
        parent::boot();


        if(!empty(auth()->guard("admin")->user()->id)){

        static::created(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'created',
                'details' => 'Booking Log created with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'BookingLog'
            ]);
        });

        static::updated(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'updated',
                'details' => 'BookingLog updated with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'BookingLog'
            ]);
        });

        static::deleted(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'deleted',
                'details' => 'BookingLog deleted with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'BookingLog'
            ]);
        });

        // if(auth()->guard("admin")->user()->id!=1){
        //     static::addGlobalScope('bookinglog', function (Builder $builder) {
        //         $builder->where('user_id',auth()->guard("admin")->user()->id);
        //     });
        // }

      }

    }
}
