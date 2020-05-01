@extends('Layouts.customer')

@section('content')

    <div class="card">
        <div class="card-header">My Reservation</div>
        <div class="card-body">
            @if ($reservations->count() === 0)
                No Reservations Found!
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Date Time</th>
                            <th>Venue</th>
                            <th>Total Hour</th>
                            <th>Price Per Hour</th>
                            <th>Cleaning Fee</th>
                            <th>City Fee</th>
                            <th>Security Deposit</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>From {{ $reservation->starting_date_time }} To {{ $reservation->ending_date_time }}</td>
                                <td>{{ $reservation->venue->venue }}</td>
                                <td>{{ $reservation->total_hour }}</td>
                                <td>${{ $reservation->price_per_hour }}</td>
                                <td>${{ $reservation->cleaning_fee }}</td>
                                <td>${{ $reservation->city_fee }}</td>
                                <td>${{ $reservation->security_deposit_amount }}</td>
                                <td>${{ (($reservation->total_hour * $reservation->price_per_hour) + ($reservation->cleaning_fee + $reservation->city_fee + $reservation->security_deposit_amount)) }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header">My Bookings</div>
        <div class="card-body">
            @if ($bookings->count() === 0)
                No Bookings Found!
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Date Time</th>
                            <th>Venue</th>
                            <th>Total Hour</th>
                            <th>Price Per Hour</th>
                            <th>Cleaning Fee</th>
                            <th>City Fee</th>
                            <th>Security Deposit</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>From {{ $booking->starting_date_time }} To {{ $booking->ending_date_time }}</td>
                                <td>{{ $booking->venue->venue }}</td>
                                <td>{{ $booking->total_hour }}</td>
                                <td>${{ $booking->price_per_hour }}</td>
                                <td>${{ $booking->cleaning_fee }}</td>
                                <td>${{ $booking->city_fee }}</td>
                                <td>${{ $booking->security_deposit_amount }}</td>
                                <td>${{ (($booking->total_hour * $booking->price_per_hour) + ($booking->cleaning_fee + $booking->city_fee + $booking->security_deposit_amount)) }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header">My Message</div>
        <div class="card-body">
            No Messages Found!
        </div>
    </div>


@endsection
