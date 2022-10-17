<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Setting as Settings;

class Setting extends Component
{
    public $general;
    public $mail;
    public $homepage;
    public $selectedTab;
    public $howtouse;
    protected $listeners = ['tabChanged'];

    public function tabChanged($currentTab)
    {
        $this->selectedTab = $currentTab;
    }

    public function mount()
    {
        $this->selectedTab = 'general';

        $settings = Settings::all()->pluck('value', 'key');

        $this->general = $settings['general'];
        $this->mail = $settings['mail'];
        $this->homepage = $settings['homepage'];
        $this->howtouse = $settings['howtouse'];
    }

    public function render()
    {
        return view('livewire.setting')->layout('layouts.app', ['title' => __('messages.settings.index')]);
    }

    public function updateGeneral()
    {
        $validatedData = $this->validate();

        Settings::where('key', 'general')->update(['value' => $validatedData['general']]);

        Cache::forever('setting_general', $validatedData['general']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.general.updated'), 'redirect' => route('settings')]
        );
    }
    public function updateHowtouse()
    {
        $validatedData = $this->validate();
        Settings::where('key', 'howtouse')->update(['value' => $validatedData['howtouse']]);

        Cache::forever('setting_howtouse', $validatedData['howtouse']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.howtouse.updated'), 'redirect' => route('settings')]
        );
    }
    public function updateMail()
    {
        $validatedData = $this->validate();

        Settings::where('key', 'mail')->update(['value' => $validatedData['mail']]);

        Cache::forever('setting_mail', $validatedData['mail']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.mail.updated'), 'redirect' => route('settings')]
        );
    }
    public function updateHomepage()
    {
        $validatedData = $this->validate();

        Settings::where('key', 'homepage')->update(['value' => $validatedData['homepage']]);

        Cache::forever('setting_homepage', $validatedData['homepage']);

        $this->dispatchBrowserEvent(
            'itemUpdated',
            ['message' => __('messages.settings.homepage.updated'), 'redirect' => route('settings')]
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


      

            'homepage.Home_Page_Description_Ar' => 'required',
            'homepage.Home_Page_Description_En' => 'required',
            'homepage.App_Store' => 'required|url',
            'homepage.Google_App_Link' => 'required|url',

        ];
        for ($i = 1; $i < 5; $i++){
            $rules += ['howtouse.howtouse'.$i.'name_En' =>'required' ,
                       'howtouse.howtouse'.$i.'info_En' =>'required' ,
                       'howtouse.howtouse'.$i.'name_Ar' =>'required' ,
                       'howtouse.howtouse'.$i.'info_Ar' =>'required' ];

        }
        return $rules;
    }
}
