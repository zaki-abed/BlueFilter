<?php

namespace App\Http\Livewire\ContactQueries;

use App\Models\ContactQuery;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshParent' => '$refresh', 'deleteItem', 'massDestroy'];

    public $massDestroyAll = [];

    public function massDestroy() {
        ContactQuery::destroy($this->massDestroyAll);
        $this->dispatchBrowserEvent('itemDeleted', [
            'message' => __('messages.general.query_deleted'),
            'redirect' => route('contact-queries.index')
        ]);
}

    public function render()
    {
        $queries = ContactQuery::orderBy('read', 'ASC')->orderBy('id', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.contact-queries.index', ['queries' => $queries])
            ->layout('layouts.app', ['title' => __('messages.menu.queries')]);
    }

    public function deleteItem($id) {
        $result = ContactQuery::where('id', $id)->delete();

        if($result) {
            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.general.query_deleted'),
                'redirect' => route('contact-queries.index')
            ]);
        }
    }
}
