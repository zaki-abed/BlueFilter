<?php

namespace App\Http\Livewire\User;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Arr;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\ImageUpload;
use Str;

class Create extends Component
{
    use WithFileUploads;
    use ImageUpload;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $locale;
    public $type;
    public $image;
    public $show;
    public $City;
    public $cities;
    public $country;
    public $countries;


    public function mount() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->locale = 'ar';
        $this->type = 'customer';
        $this->show = false;
        $this->City = '';
        $this->cities = '';
        $this->country = '';
        $this->countries = Country::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if($propertyName == 'image') {
            $this->dispatchBrowserEvent('imageSelected', ['id' => '#image']);
        }
    }

    public function render()
    {

        return view('livewire.user.create')->layout('layouts.app',
            ['title' => __('messages.users.create')]);
    }

    public function like()
    {
        $this->show = true;
        $this->cities = City::where('Country_ID' , $this->country)->get();
    }
    public function createUser()
    {
        $validatedData = $this->validate();

        $data_exclude = ['image'];

        $filtered = Arr::except($validatedData, $data_exclude);

        if ($this->image) {
            $filtered['profile_img'] = $this->storeImage();
        }

        User::create($filtered);

        $this->dispatchBrowserEvent('itemCreated',
            ['message' => __('messages.users.created'), 'redirect' => route('user.index')]);
    }

    protected function rules(){
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => ['required',  'min:8', 'max:16'],
            'password_confirmation' => ['required', 'same:password',  'min:8', 'max:16'],
            'locale' => 'required|in:ar,en',
            'type' => 'required|in:customer,admin',
            'image' => 'nullable|image|max:1024',
            'City' => 'required',
            'country' => 'required',

        ];
    }
}
