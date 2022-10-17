<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class EditModal extends Component
{
    protected $listeners = ['editItem'];

    public $name;
    public $name_ar;
    public $color;
    public $editCategory;

    public function render()
    {
        return view('livewire.category.edit-modal');
    }

    protected function rules(){
        return [
            'name' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateCategory() {
        Category::where('id', $this->editCategory->id)->update($this->validate());
        $this->emit('refreshParent');

        $this->dispatchBrowserEvent('categoryUpdated', ['message' => __('messages.categories.updated')]);
    }

    public function editItem($id) {
        $this->editCategory = Category::find($id);
        $this->name = $this->editCategory->name;
        $this->name_ar = $this->editCategory->name_ar;
        $this->color = $this->editCategory->color;

        $this->dispatchBrowserEvent('editItem', ['modal' => '#editCategoryModel']);
    }
}
