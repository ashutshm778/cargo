<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::created(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'created',
                'details' => 'Pincode created with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Pincode'
            ]);
        });

        static::updated(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'updated',
                'details' => 'Pincode updated with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Pincode'
            ]);
        });

        static::deleted(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'deleted',
                'details' => 'Pincode deleted with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Pincode'
            ]);
        });
    }
}
