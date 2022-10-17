<?php

namespace App\Http\Livewire\Misc;

use Livewire\Component;

class Editor extends Component
{
    public $body;

    protected $listeners = ['completed', 'getEditorContent'];


    public function mount($body = null) {
        if($body) {
            $this->body = $body;
        }
    }

    public function getEditorContent() {
        $this->emitUp('receiveData', $this->body);
    }

    public function completed() {
        $this->reset(['body']);
    }

    public function render()
    {
        return view('livewire.misc.editor');
    }
}
