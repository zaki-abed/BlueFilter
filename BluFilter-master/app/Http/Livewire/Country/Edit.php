<?php

namespace App\Http\Livewire\Country;

use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Component;
use PHPUnit\Framework\Constraint\Count;

class Edit extends Component
{

    public $country_name_en;
    public $country_name_ar;
    public $city;
    public $country;


    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount($id){
        $this->country = Country::findOrFail($id);

        $this->country_name_en = $this->country->Country_Name_En;
        $this->country_name_ar = $this->country->Country_Name_Ar;
      //  $this->city = $this->country->City_ID;

    }

    public function render()
    {
    //    $cities = City::all();

        return view('livewire.country.edit' )->layout('layouts.app', ['title' => __('messages.countries.edit')]);
    }

    public function imageSelected($image_name) {
        $this->featured_image = $image_name;
    }

    public function update() {
        $this->validate();

        $this->country->Country_Name_Ar = $this->country_name_ar;
        $this->country->Country_Name_En = $this->country_name_en;

        $this->country->save();

        $this->dispatchBrowserEvent('itemUpdated',
            ['message' => __('messages.countries.updated'), 'redirect' => route('country.index')]);
    }



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'country_name_ar' => 'required|max:255|unique:countries,Country_Name_Ar,'.$this->country->Country_ID.',Country_ID',
            'country_name_en' => 'required|max:255|unique:countries,Country_Name_En,'.$this->country->Country_ID.',Country_ID',


        ];

    }
}
