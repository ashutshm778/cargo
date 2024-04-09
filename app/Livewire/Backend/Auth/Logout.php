<?php

namespace App\Livewire\Backend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function render()
    {
        return view('livewire.backend.auth.logout');
    }
}
