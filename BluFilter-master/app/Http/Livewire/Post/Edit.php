<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Edit extends Component
{

    public $post;
    public $title;
    public $brief;
    public $video_link;
    public $body;
    public $published;
    public $featured_image;
    public $lang;

    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount($id){
        $this->post = Post::findOrFail($id);

        $this->title = $this->post->title;
        $this->brief = $this->post->brief;
        $this->video_link = $this->post->video_link;
        $this->body = $this->post->body;
        $this->published = $this->post->published;
        $this->lang = $this->post->lang;
    }

    public function render()
    {
        return view('livewire.post.edit')->layout('layouts.app', ['title' => __('messages.posts.edit')]);
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

        $this->post->title = $this->title;
        $this->post->brief = $this->brief;
        $this->post->video_link = $this->video_link;

        if($this->featured_image) {
            $this->post->featured_image = $this->featured_image;
        }

        $this->post->body = $this->body;
        $this->post->published = $this->published;
        $this->post->lang = $this->lang;

        $this->post->save();

        $this->dispatchBrowserEvent('itemUpdated',
            ['message' => __('messages.posts.updated'), 'redirect' => route('post.index')]);
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
}
