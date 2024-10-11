<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Tag;

class Formulario extends Component
{

    public $categories, $tags;

    public $category_id = '', $title, $content;

    public $selected_tags = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
    }

    public function save()
    {
        dd([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'content' => $this->content,
            'tags' => $this->selected_tags
        ]);
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
