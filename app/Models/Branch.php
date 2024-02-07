<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Branch extends Model
{
    use HasFactory,SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::created(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'created',
                'details' => 'Branch created with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Branch'
            ]);
        });

        static::updated(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'updated',
                'details' => 'Branch updated with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Branch'
            ]);
        });

        static::deleted(function ($resource) {
            ResourceLog::create([
                'resource_id' => $resource->id,
                'action' => 'deleted',
                'details' => 'Branch deleted with ID ' . $resource->id .' by user  '.auth()->guard("admin")->user()->name,
                'user_id' => auth()->guard("admin")->user()->id,
                'model'=>'Branch'
            ]);
        });
    }
}
