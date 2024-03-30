<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'username' => 'justkangyann',
            'email' => 'justkangyann@example.com',
            'password' => bcrypt('justkangyann'),
            'no_hp' => '6283829055059',
            'email_verified_at' => now(),
        ]);
        
    }
}
