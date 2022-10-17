<?php

namespace App\Providers;

use App;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        if(!app()->runningInConsole()) {
            $settings_general = Cache::get('setting_general');
            App::setLocale($settings_general['site_locale'] ?? config('app.locale'));

            config($settings_general);

            $setting_mail = Cache::get('setting_mail');

            $updated_mail = [
                'mail.mailers.smtp' => [
                    'transport' => 'smtp',
                    'host' => $setting_mail['host'] ?? config('mail.mailers.smtp.host'),
                    'port' => $setting_mail['port'] ?? config('mail.mailers.smtp.port'),
                    'encryption' => $setting_mail['encryption'] ?? config('mail.mailers.smtp.encryption'),
                    'username' => $setting_mail['username'] ?? config('mail.mailers.smtp.username'),
                    'password' => $setting_mail['password'] ?? config('mail.mailers.smtp.password'),
                    'timeout' => null,
                    'auth_mode' => null,
                ],
                'mail.from' => [
                    'name' => $settings_general['site_name'] ?? config('app.name'),
                    'address' => $setting_mail['username'] ?? config('mail.from.address')
                ]
            ];

            config($updated_mail);
        }
    }
}
