<?php

namespace Database\Seeders;

use App\Models\MediaImage;
use Illuminate\Database\Seeder;

class MediaImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        MediaImage::truncate();

        MediaImage::factory()->count(200)->create();
    }
}
