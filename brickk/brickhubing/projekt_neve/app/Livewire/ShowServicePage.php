<?php

namespace App\Livewire;

use App\Models\Games;
use Livewire\Component;
class ShowServicePage extends Component
{
    public function render()
    {
        $services = Games::orderBy('name','ASC')->get();
        return view('livewire.show-service-page',[
            'services' => $services
        ]);
    }
}
