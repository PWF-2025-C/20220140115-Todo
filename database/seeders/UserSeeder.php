<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // ← Tambahin ini!

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'khaiqal@example.com'],
            [
                'name' => 'khaiqal satrio alfirdaus',
                'password' => Hash::make('password321'),
                'is_admin' => 1,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
