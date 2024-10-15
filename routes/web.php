<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Queue\Attributes\DeleteWhenMissingModels;

Route::get('/', function () {
    return view('base');
});


Route::group(['prefix' => '/flights', 'as' => 'flight.'], function () {
    Route::get('/', [FlightController::class, 'index'])->name('list');
    Route::get('/tickets/{id}', [FlightController::class, 'showTicket'])->name('ticket');
    Route::get('/book/{id}', [FlightController::class, 'order'])->name('book');

});

Route::group(['prefix' => '/tickets', 'as' => 'ticket.'], function () {
    Route::get('/', [TicketController::class, 'ticket'])->name('list');
    Route::post('/submit', [TicketController::class, 'ticketAdd'])->name('submit');
    Route::put('/board/{id}', [TicketController::class, 'ticketUpdate'])->name('board');
    Route::delete('/delete/{id}', [TicketController::class, 'ticketDelete'])->name('delete');
});


