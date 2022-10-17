<?php

namespace App\Http\Livewire\Ads;

use App\Models\Ads;
use Livewire\Component;

class View extends Component
{
    public $ads;

    public function mount($id){
        $this->ads = Ads::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.ads.view', ['ads' => $this->ads])
            ->layout('layouts.app', ['title' => $this->ads->title]);
    }
}
