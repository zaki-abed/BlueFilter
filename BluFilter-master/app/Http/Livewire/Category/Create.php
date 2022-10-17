<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $name_ar;
    public $color;

    public function mount() {
        $this->name = '';
        $this->name_ar = '';
        $this->color = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.category.create')->layout('layouts.app', ['title' => __('messages.categories.create')]);
    }

    public function createCategory()
    {
        $validatedData = $this->validate();

        Category::create($validatedData);

        $this->dispatchBrowserEvent('itemCreated',
            ['message' => __('messages.categories.created'), 'redirect' => route('category.index')]);
    }

    protected function rules(){
        return [
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ];
    }
}
