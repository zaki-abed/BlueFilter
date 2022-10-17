<?php
namespace App\Http\Livewire\City;

use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Edit extends Component
{

    public $city;
    public $city_name_ar;
    public $cityid;
    public $Country_ID;
    public $city_name_en;

    protected $listeners = ['receiveData', 'imageSelected'];

    public function mount($id){
        $this->cityid = $id;
        $this->city = City::findOrFail($id);
        $this->city_name_ar = $this->city->City_Name_Ar;
        $this->city_name_en = $this->city->City_Name_En;
        $this->Country_ID = $this->city->Country_ID;

    }

    public function render()
    {
        $countries = Country::all();
        return view('livewire.city.edit' , compact('countries'))->layout('layouts.app', ['title' => __('messages.cities.edit')]);
    }

    public function update() {
        $this->validate();

        $this->city->City_Name_Ar = $this->city_name_ar;
        $this->city->City_Name_En = $this->city_name_en;
        $this->city->Country_ID = $this->Country_ID;

        $this->city->save();

        $this->dispatchBrowserEvent('itemUpdated',
            ['message' => __('messages.cities.updated'), 'redirect' => route('city.index')]);
    }

    public function receiveData() {

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'city_name_ar' => 'required|max:255| unique:cities,City_Name_Ar,'.$this->city->City_ID.',City_ID',
            'city_name_en' => 'required|max:255 |unique:cities,City_Name_En,'.$this->city->City_ID.',City_ID',
            'Country_ID' => 'required'
        ];
    }
}
