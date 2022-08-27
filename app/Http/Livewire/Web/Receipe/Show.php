<?php

namespace App\Http\Livewire\Web\Receipe;

use Livewire\Component;

class Show extends Component
{

    public $receipe;

    public function render()
    {
        return view('livewire.web.receipe.show');
    }
}
