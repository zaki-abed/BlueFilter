<?php

namespace App\Http\Livewire\Ads;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ads;
class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshParent' => '$refresh', 'deleteItem', 'massDestroy'];

    public $massDestroyAll = [];

    public function massDestroy() {
        Ads::destroy($this->massDestroyAll);
        $this->dispatchBrowserEvent('itemDeleted', [
            'message' => __('messages.ads.deleted'),
            'redirect' => route('ads.index')
        ]);
    }

    public function deleteItem($id) {
        $result = Ads::find($id)->delete();

        if($result) {
            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.ads.deleted'),
                'redirect' => route('ads.index')
            ]);
        }
    }

    public function render()
    {
        $ads = Ads::orderBy('id', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.ads.index', ['ads' => $ads])
            ->layout('layouts.app', ['title' => __('messages.ads.index')]);
    }
}
