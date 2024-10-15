<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Post;
use Livewire\Attributes\Rule;


class PostCreateForm extends Form
{
    #[Rule('required', message: 'El campo es requerido')]
    public $title;
    #[Rule('required', as: 'Contenido')]
    public $content;
    #[Rule('required|exists:categories,id', as: 'Categoria')]
    public $category_id = '';
    #[Rule('required|array', as: 'Etiquetas')]
    public $tags = [];

    public $imageKey;
    public $image;

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category_id
        ]);


        $post->tags()->attach($this->tags);

        if($this->image){

            $post->image_path = $this->image->store('posts', 'public');
            $post->save();
        }
        $this->reset();

        $this->imageKey = rand();

    }
}
