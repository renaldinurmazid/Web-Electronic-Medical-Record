<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Renaldi Nurmazid',
            'email' => 'renaldinurmazid@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Egi Renaldi',
            'email' => 'egirenaldi@gmail.com',
            'password' => Hash::make('admin1234'),
            'role' => 'petugas'
        ]);
    }
}
