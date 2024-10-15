<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    function ticketDelete(Request $request) {
        $validated = $request->validate([
            'ticket_id' => 'required',
        ]);
        
        $ticket = Ticket::where('id', $validated['ticket_id'])->first();
        $flight_id = $ticket->flight_id;
        try {
            $ticket->update([
                'active' => 0
            ]);
            return redirect()->route('flight.ticket', ['id' => $flight_id])->with('success', 'Ticket deleted successfully');
        }
        catch (Exception $e) {
            return redirect()->route('flight.ticket', ['id' => $flight_id])->with('error', 'Ticket not found');
        }

    }

    function ticketUpdate(Request $request) {
        $validated = $request->validate([
            'ticket_id' => 'required',
        ]);

        $ticket = Ticket::where('id', $validated['ticket_id'])->first();
        $flight_id = $ticket->flight_id;
        try {
            $ticket->update([
                'is_boarding' => 1,
                'boarding_time' => now()
            ]);
            return redirect()->route('flight.ticket', ['id' => $flight_id])->with('success', 'Ticket boarded successfully');
        }
        catch (Exception $e) {
            return redirect()->route('flight.ticket', ['id' => $flight_id])->with('error', 'Ticket not found');
        }

    }

    function ticketAdd (Request $request) {
        $validated = $request->validate([
            'flight_id' => 'required',
            'passenger_name' => 'required',
            'passenger_phone' => 'required',
            'seat_number' => 'required',
        ]);

        try {
            $ticket = Ticket::create([
                'ticket_code' => uniqid(),
                'flight_id' => $validated['flight_id'],
                'passenger_name' => $validated['passenger_name'],
                'passenger_phone' => $validated['passenger_phone'],
                'seat_number' => $validated['seat_number'],
                'is_boarding' => 0,
                'boarding_time' => null,
                'active' => 1
            ]);
            return redirect()->route('flight.ticket', ['id' => $validated['flight_id']])->with('success', 'Ticket added successfully');
        }
        catch (Exception $e) {
            return redirect()->route('flight.ticket', ['id' => $validated['flight_id']])->with('error', 'Ticket not added');
        }


    }
}
