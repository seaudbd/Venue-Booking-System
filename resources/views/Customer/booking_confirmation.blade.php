@extends('Layouts.customer_public')
@section('content')
    <div style="height: 10px;"></div>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10">
            <div class="row">
                <div class="col text-center">
                    Your Booking has been Confirmed with the Following Information
                </div>
            </div>

            <div class="table-responsive mt-3">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Venue</td>
                        <td>{{ $customerBooking->venue->venue }}</td>
                    </tr>
                    <tr>
                        <td>Price Per Hour</td>
                        <td>${{ $customerBooking->price_per_hour }}</td>
                    </tr>
                    <tr>
                        <td>Total Hour</td>
                        <td>{{ $customerBooking->total_hour }}</td>
                    </tr>
                    <tr>
                        <td>Security Deposit</td>
                        <td>${{ $customerBooking->security_deposit_amount }}</td>
                    </tr>
                    <tr>
                        <td>Cleaning Fee</td>
                        <td>${{ $customerBooking->cleaning_fee }}</td>
                    </tr>
                    <tr>
                        <td>City Fee</td>
                        <td>${{ $customerBooking->city_fee }}</td>
                    </tr>
                    <tr>
                        <td>Total Payable</td>
                        <td>${{ (($customerBooking->price_per_hour * $customerBooking->total_hour) + ($customerBooking->security_deposit_amount + $customerBooking->cleaning_fee + $customerBooking->city_fee)) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection