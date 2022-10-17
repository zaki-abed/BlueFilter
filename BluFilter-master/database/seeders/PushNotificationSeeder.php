<?php

namespace Database\Seeders;

use App\Models\PushNotification;
use Illuminate\Database\Seeder;

class PushNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PushNotification::truncate();

        PushNotification::factory()->count(1500)->create();
    }
}
