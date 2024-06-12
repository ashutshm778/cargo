<?php

namespace App\Livewire\Backend\Booking;

use Livewire\Component;
use App\Models\Manifest;

class ManifestShow extends Component
{

    public $maifest_id;

    function mount($id)
    {
        $this->maifest_id=$id;
    }

    public function render()
    {
        $manifest=Manifest::find($this->maifest_id);
        return view('livewire.backend.booking.manifest-show',compact('manifest'));
    }
}
