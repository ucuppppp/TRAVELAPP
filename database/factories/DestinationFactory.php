<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Destination::class;

    public function definition(): array
    {
        return [
            //
            'image' => fake()->image(),
            'destinationName' => fake()->sentence(3),
            'description' => fake()->sentence(20),
            'location' => fake()->address(),
            'created_at' => now(),
            'updated_at' => null
        ];
    }
}
