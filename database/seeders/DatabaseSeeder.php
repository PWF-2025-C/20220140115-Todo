<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'khaiqal satrio alfirdaus',
            'email' => 'khaiqal@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => str::random(!0),
            'is_admin' => true,
        ]);

        User::factory(100)->create();
        Todo::factory(500)->create();
    }
}
