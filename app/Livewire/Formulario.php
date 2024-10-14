<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Formulario extends Component
{

    //inicializacion de variables para metodo mount
    public $categories, $tags, $posts;


    //datos de formulario
    public PostCreateForm $postCreate;

    //datos de formulario editar
    public PostEditForm $postEdit;

    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }

    public function save()
    {
        $this->postCreate->save();
        $this->posts = Post::all();

        $this->dispatch('post-created', 'Nuevo articulo creado');
    }

    public function edit($postId)
    {
        $this->resetValidation();

        $this->postEdit->edit($postId);
    }

    public function update()
    {
        $this->postEdit->update();
        $this->posts = Post::all();

        $this->dispatch('post-created', 'Articulo actualizado');
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);

        $post->delete();

        $this->posts = Post::all();

        $this->dispatch('post-created', 'Articulo eliminado');
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
