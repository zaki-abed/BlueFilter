<?php

namespace App\Http\Livewire\ContactQueries;

use App\Models\User;
use Livewire\Component;
use App\Models\ContactQuery;
use Illuminate\Validation\Rule;
use App\Notifications\QueryReply;
use Illuminate\Support\Facades\Notification;

class DetailsModal extends Component
{
    public $contact_query;

    public $reply_message;

    protected $listeners = ['editItem'];

    public function render()
    {
        return view('livewire.contact-queries.details-modal');
    }

    public function sendReply() {
        $validatedData = $this->validate();

        $this->emit('sendingReply');
        
        Notification::route('mail', [
            $this->contact_query->email => $this->contact_query->name,
        ])->notify(new QueryReply($this->reply_message));
        
        
        $this->emit('replySent');

        $this->emit('refreshParent');

        $this->dispatchBrowserEvent('itemUpdated', [
            'message' => __('messages.general.reply_sent'),
            'redirect' => route('contact-queries.index')
        ]);
    }

    public function editItem($id) {
        ContactQuery::whereId($id)->update(['read' => true]);

        $this->contact_query = ContactQuery::find($id);

        $this->dispatchBrowserEvent('editItem', ['modal' => '#contactQueryModal']);
    }

    protected function rules(){
        return [
            'reply_message' => 'required'
        ];
    }
}
