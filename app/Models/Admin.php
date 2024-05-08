<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard = 'admin';
    protected $fillable = [
        'name', 'email', 'password', 'branch_id',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];



    protected static function boot()
    {
        parent::boot();
        if (!app()->runningInConsole()) {
            static::created(function ($resource) {
                ResourceLog::create([
                    'resource_id' => $resource->id,
                    'action' => 'created',
                    'details' => 'Staff created with ID ' . $resource->id . ' by user  ' . auth()->guard("admin")->user()->name,
                    'user_id' => auth()->guard("admin")->user()->id,
                    'model' => 'Admin'
                ]);
            });

            static::updated(function ($resource) {
                ResourceLog::create([
                    'resource_id' => $resource->id,
                    'action' => 'updated',
                    'details' => 'Staff updated with ID ' . $resource->id . ' by user  ' . auth()->guard("admin")->user()->name,
                    'user_id' => auth()->guard("admin")->user()->id,
                    'model' => 'Admin'
                ]);
            });

            static::deleted(function ($resource) {
                ResourceLog::create([
                    'resource_id' => $resource->id,
                    'action' => 'deleted',
                    'details' => 'Staff deleted with ID ' . $resource->id . ' by user  ' . auth()->guard("admin")->user()->name,
                    'user_id' => auth()->guard("admin")->user()->id,
                    'model' => 'Admin'
                ]);
            });
        }
    }

    public function branch_data()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
