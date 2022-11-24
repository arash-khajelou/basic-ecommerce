<?php

namespace Database\Factories;

use App\Models\CartRow;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CartRow>
 */
class CartRowFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            "user_id" => rand(1, 100),
            "product_id" => rand(1, 100),
            "count" => rand(1, 10)
        ];
    }
}
