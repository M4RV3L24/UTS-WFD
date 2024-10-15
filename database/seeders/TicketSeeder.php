<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $flightId = \App\Models\Flight::pluck('id')->toArray();

        Ticket::class::factory()->count(100)->create([

            'flight_id' => function () use ($flightId) {
                return $flightId[array_rand($flightId)];
            },
        ]);
    }
}
