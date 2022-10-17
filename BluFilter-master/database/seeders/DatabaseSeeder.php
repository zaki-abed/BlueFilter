<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement("INSERT INTO `countries` (`Country_ID`, `Country_Name_En`, `Country_Name_Ar`, `created_at`, `updated_at`) VALUES
        (1, 'Palestine', 'فلسطين', '2021-11-18 22:51:16', '2021-11-18 23:03:38');");

        DB::statement("INSERT INTO `cities` (`City_ID`, `City_Name_Ar`, `City_Name_En`, `Country_ID`, `created_at`, `updated_at`) VALUES
        (1, 'غزة', 'Gaza', 1, '2021-11-18 22:51:32', '2021-11-18 23:27:41'),
        (2, 'بيت لحم', 'Bethlehem', 1, '2021-11-18 22:51:44', '2021-11-18 23:27:32'),
        (3, 'رام الله', 'Ramallah', 1, '2021-11-18 22:51:59', '2021-11-18 23:27:30'),
        (4, 'بيت جالا', 'Beit Jala', 1, '2021-11-18 22:56:51', '2021-11-18 23:27:21'),
        (6, 'الخليل', 'Hebron', 1, '2021-11-18 23:28:02', '2021-11-18 23:28:02'),
        (7, 'جنين', 'Jenin', 1, '2021-11-18 23:28:16', '2021-11-18 23:28:16');");

        // \App\Models\User::factory(10)->create();
       $this->call(CategorySeeder::class);
    //    $this->call(UserSeeder::class);
    //    $this->call(PostSeeder::class);
    //    $this->call(PagesSeeder::class);
    //    $this->call(LoginHistorySeeder::class);
    //    $this->call(ContactQuerySeeder::class);
    //    $this->call(MediaImageSeeder::class);
    //    $this->call(PushNotificationSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(ServiceProviderClicksSeeder::class);
        $this->call(SettingsSeeder::class);


    }
}
