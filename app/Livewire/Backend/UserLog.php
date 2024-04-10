<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\ResourceLog;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserLog extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $resource_logs = ResourceLog::where('id', '>', 0);
        $resource_logs=$resource_logs->paginate(15);
        return view('livewire.backend.user-log',compact('resource_logs'));
    }
}
