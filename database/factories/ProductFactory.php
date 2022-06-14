<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use App\Models\Concerns\ProductCurrency;
use App\Models\Concerns\ProductStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $currencies = ProductCurrency::$list;
        $statuses = ProductStatus::$list;

        return [
            'title' => $this->faker->name(),
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create(),
            'price' => $this->faker->randomFloat(),
            'currency' => $this->faker->randomElement(array_values($currencies)),
            'status' => $this->faker->randomElement(array_values($statuses)),
        ];
    }
}
