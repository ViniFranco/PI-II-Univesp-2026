<?php

namespace Database\Factories;

use App\Models\PedagogicalRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PedagogicalRecord>
 */
class PedagogicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'has_medical_report' => $this->faker->boolean(),
            'content' => fake()
                ->filamentRichContent()
                ->heading()
                ->paragraphs(3)
                ->bulletList()
                ->toArray(),
        ];
    }
}
