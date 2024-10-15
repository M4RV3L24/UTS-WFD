<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'flight_code' => $this->faker->unique()->lexify('?????'),
            'origin' => $this->faker->lexify('???'),
            'destination' => $this->faker->lexify('???'),
            'departure_time' => $this->faker->dateTimeBetween('now', '+1 year'),
            'arrival_time' => $this->faker->dateTimeBetween('+1 year', '+2 years'),
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //
        ];
    }
}
