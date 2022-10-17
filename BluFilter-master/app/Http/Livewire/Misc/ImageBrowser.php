<?php

namespace App\Http\Livewire\Misc;

use Livewire\Component;

class ImageBrowser extends Component
{
    protected $listeners = ['loadImageBrowser'];


    public function render()
    {
        return view('livewire.misc.image-browser');
    }

    public function loadImageBrowser() {
        $this->dispatchBrowserEvent('showBrowser');
    }
}
