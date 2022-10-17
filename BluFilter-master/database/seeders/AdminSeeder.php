<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'type' => 'super_admin',
        //     'name' => 'Khader Handal',
        //     'email' => 'khader1@element.ps',
        //     'password' => 'admin123',
        //     'password_confirmation' => 'admin123'
        // ]);
        User::create([
            'type' => 'super_admin',
            'name' => 'Khader Handal',
            'email' => 'mohammedamo@element.ps',
            'password' => Hash::make('admin123'),
            'password_confirmation' => 'admin123',
        ]);
    }
}
