<?php

namespace Database\Seeders;

use App\Models\ServiceProviderClicks;
use App\Models\User;
use Illuminate\Database\Seeder;

class ServiceProviderClicksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceProviderClicks::truncate();

        $providers = User::serviceProvider()->get();

        foreach ($providers as $provider) {
            ServiceProviderClicks::create(['service_provider_id' => $provider->id, 'click_count' => rand(1,2500)]);
        }
//        ServiceProviderClicks::factory()->count(500)->create();
    }
}
