<?php

namespace App\Http\Livewire\Misc;

use App\Models\MediaImage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Traits\ImageUpload;
use Str;

class MediaSelector extends Component
{
    use WithPagination;
    use WithFileUploads;
    use ImageUpload;

    public $image;
    public $selectedTab;

    protected $paginationTheme = 'bootstrap';

    protected $rules = ['image' => 'image|max:1024'];

    protected $listeners = ['tabChanged'];

    public function mount() {
        $this->selectedTab = 'gallery';
    }

    public function tabChanged($currentTab) {
        $this->selectedTab = $currentTab;
    }

    public function uploadImage() {
        $this->storeImage();
        $this->resetForm();

        session()->flash('message', __('Image uploaded successfully. Go to Media Library tab to select the image'));

        $this->dispatchBrowserEvent('imageUploaded');
    }

    public function render(){
        $images = MediaImage::select('filename')->orderBy('created_at', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.misc.media-selector', ['images' => $images])
            ->layout('layouts.media-list', ['title' => __('messages.MediaImage')]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->dispatchBrowserEvent('imageSelected');
    }

    function resetForm() {
        $this->reset(['image']);
    }
}
