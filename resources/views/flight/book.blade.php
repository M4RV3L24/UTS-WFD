@extends('base')

@section('content')
<div class="p-10 rounded-lg bg-white bg-opacity-50 dark:bg-slate-800 dark:bg-opacity-80 max-w-xl mx-auto">
    <h1 class="text-3xl font-extrabold mb-5 dark:text-white">Add Ticket Booking For <span class="uppercase">{{ $flight->flight_code }}</span></h1>
    <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">Departure</p>
    <p class="font-bold italic mb-1 text-gray-700 dark:text-gray-400">{{ $flight->formatted_departure_time}}</p>
    <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">Arrived</p>
    <p class="mb-1 font-bold italic text-gray-700 dark:text-gray-400">{{$flight->formatted_arrival_time}}</p>

    <p class="mb-6 text-xs text-gray-900 dark:text-white uppercase">{{$flight->origin. " -> " .$flight->destination }}</p>

    <form class="w-full mx-auto"
        action="{{route('ticket.submit')}}"
        method="POST">

        @csrf
        <input type="hidden" name="flight_id" value="{{ $flight->id }}">
        <div class="grid grid-cols-1 sm:grid-cols-1 gap-5">
            <div>
                <div class="mb-5">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Passenger Name</label>
                    @if ($errors->has('name'))
                        <div class="text-red-500">{{ $errors->first('name') }}</div>
                    @endif
                    <input type="text" id="name" name="passenger_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Marvel Wilbert Odelio" required
                        value="" />
                </div>
                <div class="mb-5">
                    <label for="phone"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Passenger Phone</label>
                    <input type="text" id="phone" name="passenger_phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="085735605326/+6285735605326" required
                        value="" />
                </div>
                <div class="mb-5">
                    <label for="seat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat Number</label>
                    <input type="number" id="seat" name="seat_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="10" required
                        value="" />
                </div>
            </div>
        </div>

        <button type="submit"
            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
            <span
                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Submit
            </span>
        </button>
        <a href="{{ route('flight.list') }}">
            <button type="button"
                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                <span
                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Cancel
                </span>
            </button>
        </a>
    </form>

</div>

@endsection


@section('scripts')
    @vite('resources/js/tinymce.js')
@endsection
