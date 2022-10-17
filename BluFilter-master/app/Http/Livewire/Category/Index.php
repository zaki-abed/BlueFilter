<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshParent' => '$refresh', 'deleteItem'];

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.category.index', [ 'categories' =>  $categories])
            ->layout('layouts.app', ['title' => __('messages.categories.index')]);
    }

    public function deleteItem($id) {
        $result = Category::where('id', $id)->delete();

        if($result) {
            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.categories.deleted'), 'redirect' => route('category.index')]);
        }
    }
}
