<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Setting as Settings;
use \App\Models\Subscribe;

use App\Models\Category;
use Livewire\WithPagination;

class showSubscribe extends Component
{
    public $subscribes;

    public function mount()
    {
        $this->subscribes = Subscribe::orderBy('id', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.showSubscribe')->layout('layouts.app', ['title' => __('messages.subscribe.index')]);
    }
    protected $listeners = ['refreshParent' => '$refresh', 'deleteItem'];

    public function deleteItem($id) {

        $result = Subscribe::where('id', $id)->delete();

        if($result) {
            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.subscribe.deleted'),
                'redirect' =>  route('subscribe.index')
            ]);
        }
    }

}
