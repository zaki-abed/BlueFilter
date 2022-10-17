<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserRequest;

class ProviderRequest extends Component
{
    public $service_provider_requests ;
    public function mount()
    {
        $this->service_provider_requests = UserRequest::all();
    }

    public function render()
    {
        return view('livewire.ProviderRequest')->layout('layouts.app', ['title' => __('messages.request.index')]);
    }


}
