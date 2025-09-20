<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sukur Kaku',
            'email' => 'sukur@gmail.com',
            'no_hp' => '081234567890',
            'password' => Hash::make('1234567890'),
            'role' => 'admin'
        ]);
    }
}
