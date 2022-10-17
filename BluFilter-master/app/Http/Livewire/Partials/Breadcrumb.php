<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.partials.breadcrumb', ['title' => $this->title]);
    }
}
