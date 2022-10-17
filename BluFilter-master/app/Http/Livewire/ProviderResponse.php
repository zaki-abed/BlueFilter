<?php

namespace App\Http\Livewire;

use App\Models\ServiceProviderResponse;
use Livewire\Component;
use App\Models\UserRequest;

class ProviderResponse extends Component
{
    public $service_provider_response;
    public $userrequest;


    public function mount($id)
    {
        $this->userrequest = UserRequest::where('Request_ID' , $id)->with('user')->with('service_provider')->first();
        $this->service_provider_response = ServiceProviderResponse::where('User_Request_ID' , $id)->first();
    }

    public function render()
    {
        return view('livewire.ProviderResponse')->layout('layouts.app', ['title' => __('messages.response.index')]);
    }
}
