<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example of seeding a SUPER Admin
        Admin::create([
            'id' => (string) Str::uuid(),
            'avatar' => null, 
            'name' => 'Super Admin',
            'email' => 'africteam@gmail.com',
            'mobile' => '08012345678',
            'role' => 'SUPER', 
            'email_verified_at' => now(), 
            'password' => Hash::make('AfricGreat2024$'), 
            'remember_token' => Str::random(10), 
        ]);

        // Example of seeding a regular Admin
        Admin::create([
            'id' => (string) Str::uuid(),
            'avatar' => null,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'mobile' => '08087654321',
            'role' => 'ADMIN', 
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), 
            'remember_token' => Str::random(10),
        ]);

        // Example of seeding a Support Admin
        Admin::create([
            'id' => (string) Str::uuid(),
            'avatar' => null,
            'name' => 'Support Admin',
            'email' => 'supportadmin@example.com',
            'mobile' => '08011223344',
            'role' => 'SUPPORT', 
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), 
            'remember_token' => Str::random(10),
        ]);
    }
}
