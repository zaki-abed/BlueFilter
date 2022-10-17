<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $brief;
    public $body;
    public $published;
    public $featured_image;
    public $lang;

    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount() {
        $this->title = '';
        $this->brief = '';
        $this->body = '';
        $this->published = '1';
        $this->lang = 'ar';
    }

    public function render(){
        return view('livewire.page.create')->layout('layouts.app', ['title' => __('messages.pages.create')]);
    }

    public function imageSelected($image_name) {
        $this->featured_image = $image_name;
    }

    public function receiveData($body) {
        $this->body = $body;

        $validatedData = $this->validate();

        if($this->featured_image) {
            $validatedData['featured_image'] = $this->featured_image;
        }

        $validatedData['user_id'] = Auth::user()->id;

        Page::create($validatedData);

        $this->reset(['title', 'brief', 'body', 'published']);

        $this->dispatchBrowserEvent('itemCreated',
            ['message' => __('messages.pages.created'), 'redirect' => route('page.index')]);
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
            'brief' => 'required',
            'body' =>   'required',
            'published' => ['required', Rule::in(['0', '1'])],
            'lang' => ['required', Rule::in(['ar', 'en'])]
        ];
    }
}
