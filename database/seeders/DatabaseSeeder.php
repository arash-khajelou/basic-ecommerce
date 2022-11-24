<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CartRow;
use App\Models\Color;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void {
        User::factory(100)->create();
        Color::factory(100)->create();
        Product::factory(100)->create();
        CartRow::factory(200)->create();
    }
}
