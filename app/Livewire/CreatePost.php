<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatePost extends Component
{
    //Array, String, Integer, Float, Boolean, Null, Object, Resource
        //colecciones, modelos, datetime,etc
    public $title;

    public $name, $email
;
    public function mount($user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
