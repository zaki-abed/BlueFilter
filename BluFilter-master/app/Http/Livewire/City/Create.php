<?php

namespace App\Http\Livewire\City;

use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $city;
    public $country;
    public $city_name_ar;
    public $cityid;
    public $city_name_en;


    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount() {
        $this->cityid = '';
        $this->city = '';
        $this->city_name_ar = '';
        $this->city_name_en = '';
        $this->country = '';

    }

    public function render()
    {
        $countries = Country::all();
         return view('livewire.city.create', compact('countries'))->layout('layouts.app', ['title' => __('messages.cities.create')]);
    }



    public function submit() {
        $this->validate();
        $this->city = new City();
        $this->city->City_Name_Ar = $this->city_name_ar;
        $this->city->City_Name_En = $this->city_name_en;
        $this->city->Country_ID = $this->country;

        $this->city->save();

        $this->dispatchBrowserEvent('itemUpdated',
            ['message' => __('messages.cities.created'), 'redirect' => route('city.index')]);

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'city_name_ar' => 'required|max:255| unique:cities,City_Name_Ar',
            'city_name_en' => 'required|max:255 |unique:cities,City_Name_En',
            'country' => 'required'
        ];
    }


}
