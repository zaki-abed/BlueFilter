<?php

namespace Database\Seeders;

use App\Models\LoginHistory;
use Illuminate\Database\Seeder;

class LoginHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoginHistory::truncate();
        LoginHistory::factory()->count(2000)->create();
    }
}
