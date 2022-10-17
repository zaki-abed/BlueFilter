<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Setting as Settings;

class homepage extends Component
{
    public $general;
    public $mail;
    public $homepage;
    public $selectedTab;
    public $howtouse;
    public $vision;
    public $features;
    public $aboutus;

    protected $listeners = ['tabChanged'];

    public function tabChanged($currentTab)
    {
        $this->selectedTab = $currentTab;
    }

    public function mount()
    {
        $this->selectedTab = 'homepage';

        $settings = Settings::all()->pluck('value', 'key');

        $this->general = $settings['general'];
        $this->mail = $settings['mail'];
        $this->homepage = $settings['homepage'];
        $this->howtouse = $settings['howtouse'];
        $this->vision = $settings['vision'];
        $this->features = $settings['features'];
        $this->aboutus = $settings['aboutus'];


        }

    public function render()
    {
        return view('livewire.frontendhomepage')->layout('layouts.app', ['title' => __('messages.settings.index')]);
    }

    public function updateVision()
    {
        $validatedData = $this->validate();

        Settings::where('key', 'vision')->update(['value' => $validatedData['vision']]);

        Cache::forever('setting_vision', $validatedData['vision']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.vision.updated'), 'redirect' => route('homepages')]
        );
    }

    public function updateFeature()
    {
        $validatedData = $this->validate();
        Settings::where('key', 'features')->update(['value' => $validatedData['features']]);

        Cache::forever('setting_features', $validatedData['features']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.vision.updated'), 'redirect' => route('homepages')]
        );
    }


    public function updateAboutUs()
    {

        $validatedData = $this->validate();

        Settings::where('key', 'aboutus')->update(['value' => $validatedData['aboutus']]);

        Cache::forever('setting_aboutus', $validatedData['aboutus']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.vision.updated'), 'redirect' => route('homepages')]
        );
    }


    public function updateHowtouse()
    {
        $validatedData = $this->validate();
        Settings::where('key', 'howtouse')->update(['value' => $validatedData['howtouse']]);

        Cache::forever('setting_howtouse', $validatedData['howtouse']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.howtouse.updated'), 'redirect' => route('homepages')]
        );
    }

    public function updateHomepage()
    {
        $validatedData = $this->validate();

        Settings::where('key', 'homepage')->update(['value' => $validatedData['homepage']]);

        Cache::forever('setting_homepage', $validatedData['homepage']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.homepage.updated'), 'redirect' => route('homepages')]
        );
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        $rules = [];
        $rules =[
            'general.site_name' => 'required|max:255',
            'general.site_url' => 'url',
            'general.site_description' => 'max:255',
            'general.site_locale' => 'in:ar,en',
            'general.site_author' => 'max:255',
            'general.coming_soon' => 'required',
            'general.back_date' => Rule::requiredIf($this->general['coming_soon'] == 'true'),

            'mail.host' => 'required',
            'mail.username' => 'required',
            'mail.password' => 'required',
            'mail.encryption' => 'required|in:ssl,tls',
            'mail.port' => 'required|numeric',
            'mail.reply_to' => 'nullable|email',


            'homepage.Home_Page_Title_En' => 'required',
            'homepage.Home_Page_Title_Ar' => 'required',
            'homepage.Home_Page_Description_Ar' => 'required',
            'homepage.Home_Page_Description_En' => 'required',
            'homepage.App_Store' => 'required|url',
            'homepage.Google_App_Link' => 'required|url',
            'homepage.download_counter' => 'required',
            
            'homepage.email' => 'nullable|email',
            'homepage.phone' => 'nullable',
            'homepage.facebook' => 'nullable|url',
            'homepage.youtube' => 'nullable|url',

            'vision.Vision_Title_En' => 'required',
            'vision.Vision_Title_Ar' => 'required',
            'vision.Vsion_Description_En' => 'required',
            'vision.Vsion_Description_Ar' => 'required',

            'aboutus.about_us_En' => 'required',
            'aboutus.about_us_Ar' => 'required',

            'features.Main_Feature_Title2_En' => 'required',
            'features.Main_Feature_Title2_Ar' => 'required',
            'features.Main_Feature_Title1_En' => 'required',
            'features.Main_Feature_Title1_Ar' => 'required',
        ];
        for ($i = 1; $i < 5; $i++){
            $rules += ['howtouse.howtouse'.$i.'name_En' =>'required' ,
                       'howtouse.howtouse'.$i.'info_En' =>'required' ,
                       'howtouse.howtouse'.$i.'name_Ar' =>'required' ,
                       'howtouse.howtouse'.$i.'info_Ar' =>'required' ];

        }
        for ($i = 1; $i < 4; $i++){
            $rules += ['features.Feature_Title'.$i.'_En' =>'required' ,
                       'features.Feature_Description'.$i.'_En' =>'required' ,
                       'features.Feature_Title'.$i.'_Ar' =>'required' ,
                       'features.Feature_Description'.$i.'_Ar' =>'required' ];

        }
        return $rules;
    }
}
