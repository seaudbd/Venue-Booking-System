@extends('Layouts.public')
@section('content')
<div style="height: 10px;"></div>
<div class="container-fluid">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto">
            <div class="row">
                <div class="col">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <?php $images = explode(',', $venue->image); ?>
                            @foreach($images as $key => $image)
                                @if ($key === 0)
                                    <li data-target="#demo" data-slide-to="{{ $key }}" class="active"></li>
                                @else
                                    <li data-target="#demo" data-slide-to="{{ $key }}"></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="carousel-inner">

                            @foreach($images as $key => $image)
                                @if ($key === 0)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Los Angeles" width="100%" class="img-fluid">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Chicago" width="100%" class="img-fluid">
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-center" style="font-size: 120%;">
                    {{ $venue->venue }}
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Accommodations</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Number of Rooms</td>
                                    <td>{{ $venue->number_of_rooms }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Seats</td>
                                    <td>{{ $venue->number_of_seats }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Guests</td>
                                    <td>{{ $venue->number_of_guests }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Opening Hours</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Monday to Friday</td>
                                    <td>08:00 AM - 05:00 PM</td>
                                </tr>
                                <tr>
                                    <td>Saturday</td>
                                    <td>08:00 AM - 05:00 PM</td>
                                </tr>
                                <tr>
                                    <td>Sunday</td>
                                    <td>08:00 AM - 05:00 PM</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Prices</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Price Per Hour</td>
                                    <td>${{ $venue->price_per_hour }}</td>
                                </tr>
                                <tr>
                                    <td>Security Deposit</td>
                                    <td>${{ $venue->security_deposit_amount }}</td>
                                </tr>
                                <tr>
                                    <td>Cleaning Fee</td>
                                    <td>${{ $venue->cleaning_fee }}</td>
                                </tr>
                                <tr>
                                    <td>City Fee</td>
                                    <td>${{ $venue->city_fee }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Allowing Details</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Additional Guest</td>
                                    <td>{{ $venue->is_additional_guest_allowed }}</td>
                                </tr>
                                <tr>
                                    <td>Children</td>
                                    <td>{{ $venue->are_children_allowed }}</td>
                                </tr>
                                <tr>
                                    <td>Pet</td>
                                    <td>{{ $venue->is_pet_allowed }}</td>
                                </tr>
                                <tr>
                                    <td>Party</td>
                                    <td>{{ $venue->is_party_allowed }}</td>
                                </tr>
                                <tr>
                                    <td>Smoking</td>
                                    <td>{{ $venue->is_smoking_allowed }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Features</div>
                        <div class="card-body">
                            Coming Soon!
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Refund Policy</div>
                        <div class="card-body">
                            @if ($venue->refund_policy !== '---')
                                {{ $venue->refund_policy }}
                            @else
                                No Refund Policy Found!
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">$<span style="font-size: 200%; font-weight: bold;">{{ $venue->price_per_hour }}</span>/Hour</div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col"><a href="{{ url('login') }}" class="btn btn-primary btn-block" >Instant Booking</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Availability</div>
                        <div class="card-body" id="calendar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<script type="text/javascript">

    $(document).ready(function () {



        $.ajax({
            method: 'get',
            url: '{{ url('booking/get/customer/venue/booking/' . $venue->id) }}',
            success: function (result) {
                console.log(result);
                let reservations = [];
                $.each(result.bookingsAndReservations, function (key, value) {
                    let startingDateTime = new Date(value.starting_date_time).getTime();
                    let endingDateTime = new Date(value.ending_date_time).getTime();
                    for (let loopTime = startingDateTime; loopTime <= endingDateTime; loopTime += 3600000) {
                        reservations.push({
                            title : value.status,
                            start : new Date(loopTime),
                            allDay : false,
                            backgroundColor: value.venue.background_color,
                            textColor: value.venue.text_color
                        });
                        console.log(new Date(loopTime));
                    }

                });
                $.each(result.blockedBookingDates, function (key, value) {
                    let startDateTime = new Date(value.date + ' ' + value.start_time).getTime();
                    let endDateTime = new Date(value.date + ' ' + value.end_time).getTime();
                    for (let loopTime = startDateTime; loopTime <= endDateTime; loopTime += 3600000) {
                        reservations.push({
                            title : 'Blocked',
                            start : new Date(loopTime),
                            allDay : false,
                            backgroundColor: value.background_color,
                            textColor: value.text_color
                        });
                        console.log(new Date(loopTime));
                    }

                });
                let calendarEl = document.getElementById('calendar');
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: [ 'timeGrid' ],
                    events: reservations,
                    eventRender: function(event, element) {
                        const title = $(event.el).find('.fc-title');
                        title.html(title.text());
                    }
                });
                calendar.setOption('height', 1185);
                calendar.render();
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });

    });





</script>
@endsection