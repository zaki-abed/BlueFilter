<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Livewire\Component;

class View extends Component
{
    public $page;

    public function mount($id){
        $this->page = Page::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.page.view', ['page' => $this->page])
            ->layout('layouts.app', ['title' => $this->page->title]);
    }
}
