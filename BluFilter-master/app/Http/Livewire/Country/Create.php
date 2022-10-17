<?php

namespace App\Http\Livewire\Country;

use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $country_name_en;
    public $country_name_ar;
    public $city;


    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount()
    {
        $this->country_name_en = '';
        $this->country_name_ar = '';
        $this->city = '';
    }

    public function render()
    {
        return view('livewire.country.create' )->layout('layouts.app', ['title' => __('messages.countries.create')]);
    }

    public function imageSelected($image_name)
    {
        $this->featured_image = $image_name;
    }

    public function submit()
    {

        $validatedData = $this->validate();

        Country::create([
            'Country_Name_Ar' => $validatedData['country_name_ar'],
            'Country_Name_En' => $validatedData['country_name_en'],
        ]);


        $this->dispatchBrowserEvent(
            'itemCreated',
            ['message' => __('messages.countries.created'), 'redirect' => route('country.index')]
        );
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'country_name_ar' => 'required|max:255|unique:countries,Country_Name_Ar',
            'country_name_en' => 'required|max:255|unique:countries,Country_Name_En',

        ];
    }
}
