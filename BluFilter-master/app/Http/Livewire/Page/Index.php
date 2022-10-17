<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshParent' => '$refresh', 'deleteItem', 'massDestroy'];

    public $massDestroyAll = [];

    public function massDestroy() {
        Page::destroy($this->massDestroyAll);
        $this->dispatchBrowserEvent('itemDeleted', [
            'message' => __('messages.pages.deleted'),
            'redirect' => route('page.index')
        ]);
    }

    public function deleteItem($id) {
        $result = Page::where('id', $id)->delete();

        if($result) {
            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.pages.deleted'),
                'redirect' => route('page.index')
            ]);
        }
    }

    public function render()
    {
        $pages = Page::orderBy('id', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.page.index', ['pages' => $pages])
            ->layout('layouts.app', ['title' => __('messages.pages.index')]);
    }
}
