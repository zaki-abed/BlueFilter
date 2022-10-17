<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Edit extends Component
{
    public $page;
    public $title;
    public $brief;
    public $body;
    public $featured_image;
    public $published;
    public $lang;

    protected $listeners = ['receiveData'];

    public function mount($id){
        $this->page = Page::findOrFail($id);

        $this->title = $this->page->title;
        $this->brief = $this->page->brief;
        $this->body = $this->page->body;
        $this->published = $this->page->published;
        $this->lang = $this->page->lang;
    }

    public function receiveData($body) {
        $this->body = $body;

        $this->validate();

        $this->page->title = $this->title;
        $this->page->brief = $this->brief;

        if($this->featured_image) {
            $this->page->featured_image = $this->featured_image;
        }

        $this->page->body = $this->body;
        $this->page->published = $this->published;

        $this->page->lang = $this->lang;

        $this->page->save();

        $this->dispatchBrowserEvent('itemUpdated',
            ['message' => __('messages.pages.updated'), 'redirect' => route('page.index')]);

        //$this->reset(['title', 'brief', 'image', 'body', 'published']);
        $this->reset(['title', 'brief', 'body', 'published']);
        }

    public function update() {
        $this->emit('getEditorContent');
    }

    public function render()
    {
        return view('livewire.page.edit')->layout('layouts.app', ['title' => __('messages.pages.edit')]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules(){
        return [
            'title' => 'required|max:255',
            'brief' => 'required',
            'body' => 'required',
            'published' => ['required', Rule::in(['0', '1'])],
            'lang' => ['required', Rule::in(['ar', 'en'])]
        ];
    }
}
