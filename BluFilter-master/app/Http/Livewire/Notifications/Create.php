<?php

namespace App\Http\Livewire\Notifications;

use App\Models\PushNotification;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $message;
    public $image_url;


    public function mount(){
        $this->title = '';
        $this->message = '';
        $this->image_url = '';
    }

    public function render()
    {
        return view('livewire.notifications.create')->layout('layouts.app', ['title' => __('messages.notifications.create')]);
    }

    public function sendNotification() {
        $validatedData = $this->validate();

        $tokens_list = User::select('firebase_token')->where('notification', true)->where('firebase_token', '!=', null)->get();

        if($tokens_list->isNotEmpty()) {
            $tokens_list = $tokens_list->pluck('firebase_token');

            $push_message = [
                'registration_ids' => $tokens_list,
                'notification' => [
                    'title'=> $this->title,
                    'body' => $this->message
                ]
            ];

            if($this->image_url) {
                $push_message['notification']['image'] = $this->image_url;
            }

            $client = new Client([
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'key=' . config('app.fcm_server_key')
                ]
            ]);

            $response = $client->post('https://fcm.googleapis.com/fcm/send', ['body' => json_encode($push_message)]);

            $response = json_decode($response->getBody(), true);

            if($response['success']) {
                PushNotification::create($validatedData);

                $this->dispatchBrowserEvent('notification-sent', ['message' => __('messages.notifications.created')]);

                $this->reset(['title', 'message', 'image_url']);
            }
            else {
                $this->dispatchBrowserEvent('notification-error', ['message' => __('messages.notifications.not_created')]);
            }
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    protected function rules(){
        return [
            'title' => 'required|max:255',
            'message' => 'required|max:255',
            'image_url' => 'url|max:255'
        ];
    }
}
