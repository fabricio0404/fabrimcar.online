<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "income"=> $this->faker->numberBetween(100000,0),
            "description"=> $this->faker->sentence,
            "category_id"=> $this->faker->randomElement(Category::all()->where('type','I')),
            "account_id"=> $this->faker->randomElement(Account::all()),
        ];
    }
}
