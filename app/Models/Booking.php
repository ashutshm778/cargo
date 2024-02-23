<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

      if(!empty(auth()->guard("api")->user()->id)){

        static::created(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'created',
                'details' => 'Booking created with ID ' . $resource->id .' by user  '.auth()->guard("api")->user()->name,
                'user_id' => auth()->guard("api")->user()->id,
                'model'=>'Booking'
            ]);
        });

        static::updated(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'updated',
                'details' => 'Booking updated with ID ' . $resource->id .' by user  '.auth()->guard("api")->user()->name,
                'user_id' => auth()->guard("api")->user()->id,
                'model'=>'Booking'
            ]);
        });

        static::deleted(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'deleted',
                'details' => 'Booking deleted with ID ' . $resource->id .' by user  '.auth()->guard("api")->user()->name,
                'user_id' => auth()->guard("api")->user()->id,
                'model'=>'Booking'
            ]);
        });

      }
    }

    public function booking_product()
    {
        return $this->hasmany(BookingProduct::class,'booking_id','id');
    }

}
