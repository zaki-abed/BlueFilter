<?php

namespace App\Http\Livewire\Notifications;

use App\Models\PushNotification;
use App\Models\User;
use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $can_resend;

    public function mount() {
        $this->tokens_list = User::select('firebase_token')->where('notification', true)->where('firebase_token', '!=', null)->get();

        if($this->tokens_list->isNotEmpty()) {
            $this->can_resend = true;
        }
        else {
            $this->can_resend = false;
        }
    }

    public function render()
    {
        $notifications = PushNotification::orderBy('id', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.notifications.history', ['notifications' => $notifications])
                        ->layout('layouts.app', ['title' => __('messages.notifications.history')]);
    }

    public function resendNotification($id) {
        $notification = PushNotification::find($id);

        $tokens_list = User::select('firebase_token')->where('notification', true)->where('firebase_token', '!=', null)->get();

        if($tokens_list->isNotEmpty()) {
            $tokens_list = $tokens_list->pluck('firebase_token');

            $push_message = [
                'registration_ids' => $tokens_list,
                'notification' => [
                    'title'=> $notification->title,
                    'body' => $notification->message
                ]
            ];

            if(isset($notification->image_url)) {
                $push_message['notification']['image'] = $notification->image_url;
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
                $this->dispatchBrowserEvent('notification-sent', ['message' => __('messages.notifications.created')]);
            }
            else {
                $this->dispatchBrowserEvent('notification-error', ['message' => __('messages.notifications.not_created')]);
            }
        }
    }
}
