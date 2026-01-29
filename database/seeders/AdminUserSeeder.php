<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin Cafein Holic',
            'email' => 'admin@cafeinholic.com',
            'phone' => '+6281234567890',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
            'email_verified_at' => now(),
            'preferences' => [
                'newsletter' => true,
                'marketing_emails' => true
            ]
        ]);

        // Create sample customer
        User::create([
            'name' => 'John Customer',
            'email' => 'customer@example.com',
            'phone' => '+6289876543210',
            'password' => Hash::make('customer123'),
            'is_admin' => false,
            'email_verified_at' => now(),
            'preferences' => [
                'newsletter' => true,
                'marketing_emails' => false
            ]
        ]);

        // Create more sample users
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "Customer {$i}",
                'email' => "customer{$i}@example.com",
                'phone' => '+628' . rand(1111111111, 9999999999),
                'password' => Hash::make('password123'),
                'is_admin' => false,
                'email_verified_at' => now(),
                'preferences' => json_encode([
                    'newsletter' => rand(0, 1) == 1,
                    'marketing_emails' => rand(0, 1) == 1
                ])
            ]);
        }

        $this->command->info('Users seeded successfully!');
        $this->command->info('Admin login: admin@cafeinholic.com / admin123');
        $this->command->info('Customer login: customer@example.com / customer123');
    }
}