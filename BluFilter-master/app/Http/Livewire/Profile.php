<?php

namespace App\Http\Livewire;

use App\Models\User;
use Arr;
use Livewire\Component;
use Auth;
use Hash;

class Profile extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $locale;
    public $image;
    public $user;

    protected $listeners = ['imageSelected'];

    public function mount() {
        $this->user = User::find(Auth::user()->id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->locale = $this->user->locale;
    }

    public function imageSelected($image_name) {
        $this->image = $image_name;
    }

    public function updateUser() {
        $validatedData = $this->validate();

        $data_exclude = ['password_confirmation'];

        if(!$this->password) {
            array_push($data_exclude, 'password');
        }
        
        $filtered = Arr::except($validatedData, $data_exclude);

        if($this->image) {
            $filtered['profile_image'] = $this->image;
        }
        
        if ($this->password) {
            $filtered['password'] = Hash::make($this->password);
        }
        
        User::where('id', $this->user->id)->update($filtered);

        $this->dispatchBrowserEvent('itemUpdated',
            ['message' => __('messages.users.profile_updated'), 'redirect' => route('profile')]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.profile')->layout('layouts.app', ['title' => __('messages.users.profile')]);
    }

    protected function rules(){
        return [
            'name' => 'required|string|max:255',
            'email' => 'email|unique:users,email,' . $this->user->id,
            'password' => ['nullable', 'min:8', 'max:16'],
            'password_confirmation' => ['nullable', 'same:password',  'min:8', 'max:16'],
            'locale' => 'required|in:ar,en'
        ];
    }
}

