<?php

namespace Database\Factories;

use App\Enums\CommunicationChannels;
use App\Enums\CommunicationReturnStatus;
use App\Models\Communication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Communication>
 */
class CommunicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'communication_channel' => $this->faker->randomElement(CommunicationChannels::cases()),
            'communication_return_status' => $this->faker->randomElement(CommunicationReturnStatus::cases()),
            'description' => fake()
                ->filamentRichContent()
                ->heading()
                ->paragraphs(3)
                ->bulletList()
                ->toArray(),
        ];
    }
}
