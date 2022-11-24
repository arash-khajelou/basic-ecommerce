<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $prices = [
            100000,
            200000,
            250000,
            400000,
            600000,
            800000,
            950000,
            1000000,
            1500000,
            2000000
        ];


        return [
            "title" => fake()->word(),
            "price" => $prices[rand(0, 9)],
            "count" => rand(250, 450),
            "description" => fake()->sentence(100),
            "color_id" => rand(1, 100),
            "is_available" => true
        ];
    }
}
