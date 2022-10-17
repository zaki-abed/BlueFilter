<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshParent' => '$refresh', 'deleteItem', 'massDestroy'];

    public $massDestroyAll = [];

    public function massDestroy() {
        Post::destroy($this->massDestroyAll);
        $this->dispatchBrowserEvent('itemDeleted', [
            'message' => __('messages.posts.deleted'),
            'redirect' => route('post.index')
        ]);
    }

    public function deleteItem($id) {
        $result = Post::find($id)->delete();

        if($result) {
            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.posts.deleted'),
                'redirect' => route('post.index')
            ]);
        }
    }

    public function render()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.post.index', ['posts' => $posts])
            ->layout('layouts.app', ['title' => __('messages.posts.index')]);
    }
}
