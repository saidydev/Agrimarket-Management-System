<?php

namespace Database\Seeders;

use App\Models\Input;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            InputSeeder::class,
        ]);
    }
}

// UserSeeder.php
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'farmer1',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'location' => 'Nairobi',
            'phone' => '123456789',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'user_type' => 'farmer',
        ]);

        User::create([
            'username' => 'farmer2',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'location' => 'Mombasa',
            'phone' => '123456789',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'user_type' => 'farmer',
        ]);

        User::create([
            'username' => 'supplier1',
            'first_name' => 'Mike',
            'last_name' => 'Smith',
            'location' => 'Kisumu',
            'phone' => '123456789',
            'email' => 'mike@example.com',
            'password' => Hash::make('password'),
            'user_type' => 'supplier',
        ]);
    }
}

// ProductSeeder.php
class ProductSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 10) as $i) {
            Product::create([
                'user_id' => User::where('username', 'farmer1')->first()->user_id,
                'Name' => 'Product ' . $i,
                'quantity' => rand(1, 100),
                'description' => 'Description for product ' . $i,
                'price' => rand(100, 1000),
            ]);
        }
    }
}

// InputSeeder.php
class InputSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 10) as $i) {
            Input::create([
                'user_id' => User::where('username', 'supplier1')->first()->user_id,
                'Name' => 'Input ' . $i,
                'price' => rand(100, 1000),
                'quantity' => rand(1, 100),
            ]);
        }
    }
}

