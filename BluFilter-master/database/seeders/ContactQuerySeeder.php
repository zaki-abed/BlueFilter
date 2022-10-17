<?php

namespace Database\Seeders;

use App\Models\ContactQuery;
use App\Models\SupportEmail;
use Illuminate\Database\Seeder;
use App\Models\User;


class ContactQuerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ContactQuery::truncate();

        ContactQuery::factory()->count(500)->create();
    }
}
