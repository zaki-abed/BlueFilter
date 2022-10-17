<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class View extends Component
{
    public $post;

    public function mount($id){
        $this->post = Post::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.post.view', ['post' => $this->post])
            ->layout('layouts.app', ['title' => $this->post->title]);
    }
}
