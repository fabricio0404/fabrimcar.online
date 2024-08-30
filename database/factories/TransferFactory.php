<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "from"=> $this->faker->word(),
            "to"=> $this->faker->word(),
            "ammount"=> $this->faker->numberBetween(200, 10000),
            "comment"=> $this->faker->sentence(),
            
        ];
    }
}
