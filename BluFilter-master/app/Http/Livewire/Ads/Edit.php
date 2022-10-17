<?php

namespace App\Http\Livewire\Ads;

use App\Models\Ads;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Edit extends Component
{

    public $ads;
    public $title;
    public $brief;
    public $body;
    public $published;
    public $featured_image;
    public $lang;

    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount($id){
        $this->ads = Ads::findOrFail($id);

        $this->title = $this->ads->title;
        $this->brief = $this->ads->brief;
        $this->body = $this->ads->body;
        $this->published = $this->ads->published;
        $this->lang = $this->ads->lang;
    }

    public function render()
    {
        return view('livewire.ads.edit')->layout('layouts.app', ['title' => __('messages.ads.edit')]);
    }

    public function imageSelected($image_name) {
        $this->featured_image = $image_name;
    }

    public function update() {
        $this->emit('getEditorContent');
    }

    public function receiveData($body) {
        $this->body = $body;
        
        $this->validate();

        $this->ads->title = $this->title;
        $this->ads->brief = $this->brief;

        if($this->featured_image) {
            $this->ads->featured_image = $this->featured_image;
        }

        $this->ads->body = $this->body;
        $this->ads->published = $this->published;
        $this->ads->lang = $this->lang;

        $this->ads->save();

        $this->dispatchBrowserEvent('itemUpdated',
            ['message' => __('messages.ads.updated'), 'redirect' => route('ads.index')]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'title' => 'required|max:255',
            'brief' => 'required|max:255',
            'body' => 'required',
            'published' => ['required', Rule::in(['0', '1'])],
            'lang' => ['required', Rule::in(['ar', 'en'])]
        ];
    }
}
