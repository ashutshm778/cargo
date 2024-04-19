<?php

namespace App\Livewire\Backend\Staff;

use App\Models\User;
use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{

    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $list = Admin::orderBy('id', 'desc')->paginate(10);
        return view('livewire.backend.staff.index',compact('list'))->layout('components.backend.layouts.app');
    }
}
