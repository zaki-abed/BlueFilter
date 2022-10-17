<?php

namespace App\Http\Livewire\User;

use Arr;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;
use App\Models\User;
use App\Traits\ImageUpload;
use Hash;
class EditForm extends Component
{
    use WithFileUploads;
    use ImageUpload;

    public $editUser;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $address;
    public $locale;
    public $type;
    public $profile_img;
    public $phone;
    public $bio;

    public $image;

    protected $listeners = ['editItem'];

    public function editItem($id) {
        $this->editUser = User::findOrFail($id);

        $this->name = $this->editUser->name;
        $this->address = $this->editUser->address;
        $this->email = $this->editUser->email;
        $this->locale = $this->editUser->locale;
        $this->type = $this->editUser->type;
        $this->profile_img = $this->editUser->profile_img;
        $this->phone = $this->editUser->phone;
        $this->bio = $this->editUser->bio;

        $this->dispatchBrowserEvent('editItem', ['modal' => '#editUserModel']);
    }

    public function updateUser() {
        $validatedData = $this->validate();

        $data_exclude = ['image'];

        if(!$this->password) {
            array_push($data_exclude, 'password', 'password_confirmation');
        }

        $filtered = Arr::except($validatedData, $data_exclude);

        if($this->image) {
//            if($this->profile_img) {
//                Storage::delete($this->profile_img);
//            }

            $filtered['profile_img'] = $this->storeImage();
        }

        //hash password because the set for passsword doesnot work with update
        if($this->password) {
            $filtered['password'] = Hash::make($this->editUser->password) ;
        }


        User::where('id', $this->editUser->id)->update($filtered);

        $this->emit('refreshParent');

        $this->dispatchBrowserEvent('userUpdated', ['message' => __('messages.users.updated')]);
    }

    public function updated($propertyName)
    {
        if($this->editUser) {
            $this->validateOnly($propertyName);

            if($propertyName == 'image') {
                $this->dispatchBrowserEvent('imageSelected', ['id' => '#image']);
            }
        }
    }

    public function render()
    {
        return view('livewire.user.edit-form');
    }

    protected function rules(){
        return [
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $this->editUser->id,
            'password' => ['nullable', 'min:8', 'max:16'],
            'password_confirmation' => ['nullable', 'same:password', 'min:8', 'max:16'],
            'locale' => 'required|in:ar,en',
            'type' => 'required|in:customer,admin',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|max:1024',
            'phone' => 'nullable',
            'address' => 'nullable|string|max:255'
        ];
    }
}
