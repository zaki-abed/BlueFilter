<?php
namespace App\Http\Livewire\Country;

use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshParent' => '$refresh', 'deleteItem'];

    public function deleteItem($id) {

        $result = Country::find($id)->with('city')->first();
    foreach($result->city  as $city){
       $city->delete();
    }
        
        $result = $result->delete();

        if($result) {
            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.countries.deleted'),
                'redirect' => route('country.index')
            ]);
        }
    }

    public function render()
    {
        $countries = Country::orderBy('Country_ID', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.country.index', ['countries' => $countries])
            ->layout('layouts.app', ['title' => __('messages.countries.index')]);
    }
}