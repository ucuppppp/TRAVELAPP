<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImageDestination>
 */
class ImageDestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'destinationId' => random_int(1, 10),
            'fileName' => (fake()->word() . '.' . $this->faker->fileExtension()),
            'filePath' => $this->faker->filePath()
        ];
    }
}
