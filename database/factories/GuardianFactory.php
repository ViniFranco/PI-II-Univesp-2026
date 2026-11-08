<?php

namespace Database\Factories;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'birth_date' => $this->faker->date(max: today()->subYears(18)),
            'street' => $this->faker->streetName(),
            'complement' => $this->faker->words(2, true),
            'number' => $this->faker->buildingNumber(),
            'neighborhood' => $this->faker->words(2, true),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'zip_code' => $this->faker->postcode(),
        ];
    }
}
