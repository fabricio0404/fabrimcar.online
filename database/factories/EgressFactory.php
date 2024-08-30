<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Egress>
 */
class EgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "egress" => $this->faker->numberBetween(5000, 0),
            "description" => $this->faker->sentence,
            "category_id" => $this->faker->randomElement(Category::all()->where('type','E')),
            "account_id"=> $this->faker->randomElement(Account::all()),
        ];
    }
}
