<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'fatek@unima.ac.id'],
            [
                'name' => 'Admin Fatek',
                'email' => 'admink@ft.unima.ac.id',
                'password' => Hash::make('password'),
            ]
        );
    }
} 