<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class Child extends Component
{

    #[Modelable]
    public $name;

    public function render()
    {
        return view('livewire.child');
    }
}
