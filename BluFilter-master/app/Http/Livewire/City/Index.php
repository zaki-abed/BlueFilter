<?php
namespace App\Http\Livewire\City;


use App\Models\Post;
use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshParent' => '$refresh', 'deleteItem'];

    public function deleteItem($id) {
        $result = City::find($id);
        $country = Country::where('Country_ID' , $result->Country_ID)->with('city')->first();
   
        $country = $country->city->where('City_ID' , $result->City_ID)->first()->delete();
        if($country) {
            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.cities.deleted'),
                'redirect' => route('city.index')
            ]);
        }
    }

    public function render()
    {
        $cities = City::orderBy('City_ID', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.city.index', ['cities' => $cities])
            ->layout('layouts.app', ['title' => __('messages.cities.index')]);
    }
}
