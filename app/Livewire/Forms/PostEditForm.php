<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Livewire\Attributes\Validate;

class PostEditForm extends Form
{

    public $postId = '';
    public $open = false;

    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $content;
    #[Validate('required|exists:categories,id')]
    public $category_id = '';
    #[Validate('required|array')]
    public $tags = [];

    public function edit($postId)
    {
        $this->open = true;
        $this->postId = $postId;

        $post = Post::find($postId);

        $this->category_id = $post->category_id;
        $this->title = $post->title;
        $this->content = $post->content;

        $this->tags = $post->tags->pluck('id')->toArray();
    }

    public function update()
    {

        $this->validate();
        $post = Post::find($this->postId);

        $post->update([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category_id
        ]);

        $post->tags()->sync($this->tags);

        $this->reset();

    }
}
