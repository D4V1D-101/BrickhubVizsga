<?php

namespace App\Livewire;

use App\Models\Games;
use App\Models\Service;
use Livewire\Component;

class ShowService extends Component
{
    public $id;
    public $service;

    public function mount()
    {
        $this->service = Games::findOrFail($this->id);
    }

    public function render()
    {
        return view('livewire.show-service', [
            'service' => $this->service
        ]);
    }
}

