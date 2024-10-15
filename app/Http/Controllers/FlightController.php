<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    //
    public function index()
    {

        // $events = Event::all();
        $flights = Flight::where('active', 1)->get()->map(function ($flight) {
            $flight->formatted_departure_time = Carbon::parse($flight->departure_time)->format('D, j Y - h:i A'); // e.g., January 1, 2023
            $flight->formatted_arrival_time = Carbon::parse($flight->arrival_time)->format('D, j Y - h:i A'); // e.g., 1:00 PM
            return $flight;
        });

        return view('flight.index', [
            'flights' => $flights
        ]);
    }

    public function showTicket($id) {
        $ticketList = Flight::find($id)->tickets->where('active', 1);
        return view('flight.ticket', 
        [
            'tickets' => $ticketList
        ]);
    }

    public function order($id) {
        $flight = Flight::find($id);
        $flight->formatted_departure_time = Carbon::parse($flight->departure_time)->format('D, j Y - h:i A'); // e.g., January 1, 2023
        $flight->formatted_arrival_time = Carbon::parse($flight->arrival_time)->format('D, j Y - h:i A'); // e.g., 1:00 PM
    
         return view('flight.book', [
            'flight' => $flight
        ]);
    }

   

}
