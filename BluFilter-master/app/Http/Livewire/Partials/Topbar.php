<?php

namespace App\Http\Livewire\Partials;

use App\Models\ContactQuery;
use App\Models\Setting as Settings;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\User;

class Topbar extends Component
{

    public $requests;
    public $queries;
    private $general_settings;

    public $notification_count = 0;

    public function mount() {
        $this->queries = ContactQuery::select('subject')->where('read', false)->get();

        $this->notification_count += count($this->queries);
    }

    public function changeLanguage($lang) {
        $settings = Settings::all()->pluck('value', 'key');

        $this->general_settings = $settings['general'];
        $this->general_settings['site_locale'] = $lang;

        Settings::where('key', 'general')->update(['value' => $this->general_settings]);

        Cache::forever('setting_general', $this->general_settings);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.partials.topbar', [
            'notification_count' => $this->notification_count,
            'requests' => $this->requests,
            'queries' => $this->queries
        ]);
    }
}
