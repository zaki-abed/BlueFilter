<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Create extends Component
{
   
    public $title;
    public $brief;
    public $video_link;
    public $body; 
    public $published;
    public $featured_image;
    public $lang;

    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount() {
        $this->title = '';
        $this->brief = '';
        $this->video_link = '';
        $this->body = '';
        $this->published = '1';
        $this->lang = 'ar';
    }

    public function render()
    {
        return view('livewire.post.create')->layout('layouts.app', ['title' => __('messages.posts.create')]);
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
            'brief' => 'required|max:255',
            'video_link' => 'nullable|url',
            'body' => 'required',
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

        $validatedData['user_id'] = Auth::user()->id;

        Post::create($validatedData);

        $this->reset(['title', 'brief', 'video_link', 'body', 'published','lang']);

        $this->dispatchBrowserEvent('itemCreated',
            ['message' => __('messages.posts.created'), 'redirect' => route('post.index')]);
    }
}
