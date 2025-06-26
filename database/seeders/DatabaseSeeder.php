<?php

namespace Database\Seeders;

use App\Models\Input;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\QuantityType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            QuantityTypeSeeder::class,
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

// CategorySeeder.php
class CategorySeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::create([
            'name' => 'vegetables',
        ]);
        ProductCategory::create([
            'name' => 'fruits',
        ]);
        ProductCategory::create([
            'name' => 'grains',
        ]);
        ProductCategory::create([
            'name' => 'meat',
        ]);
        ProductCategory::create([
            'name' => 'dairy',
        ]);
    }
}

// QuantityTypeSeeder.php
class QuantityTypeSeeder extends Seeder
{
    public function run(): void
    {
        QuantityType::create(['name' => 'kg']);
        QuantityType::create(['name' => 'liters']);
        QuantityType::create(['name' => 'pieces']);
        QuantityType::create(['name' => 'bunches']);
        QuantityType::create(['name' => 'bags']);
    }
}

// ProductSeeder.php
class ProductSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 10) as $i) {
            Product::create([
                'user_id' => User::where('username', 'farmer1')->first()->id,
                'Name' => 'Product ' . $i,
                'category_id' => rand(1, 5), // Assuming categories are seeded with IDs 1 to 5
                'quantity' => rand(1, 100),
                'quantity_type_id' => rand(1, 5), // Assuming quantity types are seeded with IDs 1 to 5
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
                'user_id' => User::where('username', 'supplier1')->first()->id,
                'Name' => 'Input ' . $i,
                'price' => rand(100, 1000),
                'quantity' => rand(1, 100),
            ]);
        }
    }
}

