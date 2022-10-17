<?php

namespace App\Http\Livewire\Ads;

use App\Models\Ads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title;
    public $body; 
    public $published;
    public $lang;
    public $brief;
    public $featured_image;

    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount() {
        $this->title = '';
        $this->body = '';
        $this->brief = '';
        $this->published = '1';
        $this->lang = 'ar';
    }

    public function render()
    {
        return view('livewire.ads.create')->layout('layouts.app', ['title' => __('messages.ads.create')]);
    }

    public function imageSelected($image_name) {
        $this->featured_image = $image_name;
    }

    public function submit() {
        
        $this->emit('getEditorContent');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            'brief' =>  'required',
            'published' => ['required', Rule::in(['0', '1'])],
            'lang' => ['required', Rule::in(['ar', 'en'])]
        ];
    }

    public function receiveData($body) {
        $this->body = $body;
        $validatedData = $this->validate();

        if($this->featured_image) {
            $validatedData['featured_image'] = $this->featured_image;
        }

        // $validatedData['user_id'] = Auth::user()->id;

        Ads::create($validatedData);

        $this->reset(['title', 'body', 'published','lang', 'brief']);

        $this->dispatchBrowserEvent('itemCreated',
            ['message' => __('messages.ads.created'), 'redirect' => route('ads.index')]);
    }
}
