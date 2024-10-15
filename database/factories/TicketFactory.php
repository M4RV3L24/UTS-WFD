<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
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
            'ticket_code' => $this->faker->unique()->lexify('?????'),
            'flight_id' => 1,
            'passenger_name' => $this->faker->name(),
            'passenger_phone' => $this->faker->e164PhoneNumber(),
            'seat_number' => $this->faker->numberBetween(1, 100),
            'is_boarding' => 0,
            'boarding_time' => null,
            'active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            
        ];
    }
}
