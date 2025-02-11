<?php

namespace App\Livewire;

use App\Models\Games;
use App\Models\Service;
use Livewire\Component;

class ShowHome extends Component
{
    public function render()
    {
        $services = Games::orderBy('name','ASC')->get();
        return view('livewire.show-home',[
            'services' => $services
        ]);
    }
}
