<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.backend.dashboard')->layout('components.backend.layouts.app');
    }
}