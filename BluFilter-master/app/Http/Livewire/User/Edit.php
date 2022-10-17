<?php

namespace App\Http\Livewire\User;

use App\Models\City;
use App\Models\Country;
use Arr;
use Livewire\Component;
use App\Models\User;
use Hash;

class Edit extends Component
{
    public $editUser;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $address;
    public $locale;
    public $type;
    public $phone;
    public $bio;
    public $views;
    public $profile_image;
    public $image;
    public $show;
    public $City;
    public $cities;
    public $country;
    public $countries;


    protected $listeners = ['imageSelected'];

    public function mount($id)
    {
        $this->editUser = User::findOrFail($id);

        if ($this->editUser->type == 'super_admin')
            return redirect()->to(route('user.index'));

        if ($this->editUser->isServiceProvider() && $this->editUser->views()->exists())
            $this->views = $this->editUser->views->click_count;

            $this->show = false;

        $this->profile_image = $this->editUser->profile_thumbnail;
        $this->name = $this->editUser->name;
        $this->address = $this->editUser->address;
        $this->email = $this->editUser->email;
        $this->locale = $this->editUser->locale;
        $this->type = $this->editUser->type;
        $this->phone = $this->editUser->phone;
        $this->bio = $this->editUser->bio;

        $this->City = $this->editUser->City;
        if ($this->City) {
            $this->country = City::where('City_ID', $this->City)->first()->Country_ID;
            $this->cities = City::where('Country_ID', $this->country)->get();
        }else{
            $this->cities = '';
            $this->country = '';
            $this->City = '';
        }

        $this->countries = Country::all();
    }

    public function imageSelected($image_name)
    {
        $this->image = $image_name;
    }
    public function like()
    {
        $this->show = true;

        $this->cities = City::where('Country_ID', $this->country)->get();
    }
    public function updateUser()
    {
        $validatedData = $this->validate();

        $data_exclude = ['password_confirmation'];

        if (!$this->password) {
            array_push($data_exclude, 'password');
        }

        $filtered = Arr::except($validatedData, $data_exclude);

        if ($this->image) {
            $filtered['profile_image'] = $this->image;
        }

        //hash password because the set for passsword doesnot work with update
        if ($this->password) {
            $filtered['password'] = Hash::make($this->editUser->password);
        }

        User::where('id', $this->editUser->id)->update($filtered);

        $this->dispatchBrowserEvent('itemUpdated', [
            'message' => __('messages.users.updated'),
            'redirect' => route('user.index')
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.user.edit')->layout('layouts.app', ['title' => __('messages.users.update')]);
    }

    protected function rules()
    {
        return [
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $this->editUser->id,
            'password' => ['nullable', 'min:8', 'max:16'],
            'password_confirmation' => ['nullable', 'same:password', 'min:8', 'max:16'],
            'locale' => 'required|in:ar,en',
            'type' => 'required|in:customer,admin',
            'bio' => 'nullable|string',
            'phone' => 'nullable',
            'address' => 'nullable|string|max:255',
            'City' => 'required',
        ];
    }
}
