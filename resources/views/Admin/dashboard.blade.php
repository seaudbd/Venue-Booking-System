@extends('Layouts.admin')

@section('content')
    <div class="row" >
        <div class="col">
            <div class="card">
                <div class="card-header">Booking and Reservation</div>
                <div class="card-body" id="calendar">

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="update_modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 1rem;"></h5>
                    <button type="button" class="close update_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 50px;">
                    <div id="update_form_message" class="text-center text-danger">

                    </div>
                    <form id="update_form">
                        <input name="id" type="hidden" id="id">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="invoice_number">Invoice Number</label>
                                    <input name="invoice_number" type="text" class="form-control" id="invoice_number" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="customer_id">Customer</label>
                                    <select name="customer_id" type="text" class="form-control" id="customer_id"></select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="venue_id">Venue</label>
                                    <select name="venue_id" type="text" class="form-control" id="venue_id"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="arrival_date_time">Arrival Date Time</label>
                                    <input name="arrival_date_time" type="text" class="form-control" id="arrival_date_time" placeholder="YYYY-MM-DD hh:mm:ss" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="starting_date_time">Starting Date Time</label>
                                    <input name="starting_date_time" type="text" class="form-control" id="starting_date_time" placeholder="YYYY-MM-DD hh:mm:ss" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="ending_date_time">Ending Date Time</label>
                                    <input name="ending_date_time" type="text" class="form-control" id="ending_date_time" placeholder="YYYY-MM-DD hh:mm:ss" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="number_of_children">Number of Children</label>
                                    <input name="number_of_children" type="text" class="form-control" id="number_of_children" placeholder="Number of Children" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="number_of_adult">Number of Adult</label>
                                    <input name="number_of_adult" type="text" class="form-control" id="number_of_adult" placeholder="Number of Adult" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="price_per_hour">Price Per Hour</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input name="price_per_hour" type="text" class="form-control" id="price_per_hour" placeholder="Price Per Hour" autocomplete="off">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="total_hour">Total Hour</label>
                                    <input name="total_hour" type="text" class="form-control" id="total_hour" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="cleaning_fee">Cleaning Fee</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input name="cleaning_fee" type="text" class="form-control" id="cleaning_fee" placeholder="Cleaning Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="city_fee">City Fee</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input name="city_fee" type="text" class="form-control" id="city_fee" placeholder="City Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="security_deposit_amount">Security Deposit Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input name="security_deposit_amount" type="text" class="form-control" id="security_deposit_amount" placeholder="Security Deposit Amount" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="security_deposit_status">Security Deposit Status</label>
                                    <input name="security_deposit_status" type="text" class="form-control" id="security_deposit_status" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="status">Booking Status</label>
                                    <input name="status" type="text" class="form-control" id="status" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="narrative">Narrative</label>
                                    <textarea name="narrative" type="text" class="form-control" id="narrative" placeholder="Narrative"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary btn-sm update_modal_close" data-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn_default btn-sm ml-3" id="update_form_submit"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                method: 'get',
                url: '{{ url('admin/get/venue/bookings/and/reservations') }}',
                success: function (result) {
                    console.log(result);
                    let reservations = [];
                    $.each(result.bookingsAndReservations, function (key, value) {
                        let startingDateTime = new Date(value.starting_date_time).getTime();
                        let endingDateTime = new Date(value.ending_date_time).getTime();
                        for (let loopTime = startingDateTime; loopTime <= endingDateTime; loopTime += 3600000) {
                            reservations.push({
                                html: true,
                                id: value.id,
                                title : value.status + '<br />' + value.customer.name + '<br />Cell: ' + value.customer.contact_number,
                                start : new Date(loopTime),
                                allDay : false,
                                backgroundColor: value.venue.background_color,
                                textColor: value.venue.text_color
                            });

                        }

                    });


                    $.each(result.blockedBookingDates, function (key, value) {
                        let startDateTime = new Date(value.date + ' ' + value.start_time).getTime();
                        let endDateTime = new Date(value.date + ' ' + value.end_time).getTime();
                        for (let loopTime = startDateTime; loopTime <= endDateTime; loopTime += 3600000) {
                            reservations.push({
                                html: true,
                                id: 0,
                                title : 'Blocked<br />' + value.narrative,
                                start : new Date(loopTime),
                                allDay : false,
                                backgroundColor: value.background_color,
                                textColor: value.text_color
                            });

                        }

                    });


                    let calendarEl = document.getElementById('calendar');
                    let calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: [ 'timeGrid' ],
                        events: reservations,
                        eventRender: function(event, element) {
                            const title = $(event.el).find('.fc-title');
                            title.html(title.text());
                        },
                        eventClick: function(event, jsEvent, view) {
                            console.log(event.event.id);
                            if (parseInt(event.event.id) !== 0) {
                                $.ajax({
                                    method: 'get',
                                    url: '{{ url('admin/operation/booking/and/reservation/get') }}/' + event.event.id,
                                    cache: false,
                                    success: function (result) {
                                        console.log(result);
                                        clearUpdateForm();
                                        $('#update_modal .modal-title').text(result.venue.number + '-' + result.venue.venue + ' ' + result.status + ' for ' + result.customer.number + '-' + result.customer.name);
                                        $('#id').val(event.event.id);
                                        $('#invoice_number').val(result.invoice_number);
                                        $('#customer_id').empty().append('<option value="' + result.customer_id + '">' + result.customer.number + '-' + result.customer.name + '</option>');
                                        $('#venue_id').empty().append('<option value="' + result.venue_id + '">' + result.venue.number + '-' + result.venue.venue + '</option>');
                                        $('#arrival_date_time').val(result.arrival_date_time.split(':')[0] + ':' + result.arrival_date_time.split(':')[1]);
                                        $('#starting_date_time').val(result.starting_date_time.split(':')[0] + ':' + result.starting_date_time.split(':')[1]);
                                        $('#ending_date_time').val(result.ending_date_time.split(':')[0] + ':' + result.ending_date_time.split(':')[1]);
                                        $('#number_of_children').val(result.number_of_children);
                                        $('#number_of_adult').val(result.number_of_adult);
                                        $('#price_per_hour').val(result.price_per_hour);
                                        $('#total_hour').val(result.total_hour);
                                        $('#cleaning_fee').val(result.cleaning_fee);
                                        $('#city_fee').val(result.city_fee);
                                        $('#security_deposit_amount').val(result.security_deposit_amount);
                                        $('#security_deposit_status').val(result.security_deposit_status);
                                        $('#status').val(result.status);
                                        if (result.narrative !== '---') {
                                            $('#narrative').val(result.narrative);
                                        }
                                        $('#update_form_submit').text('UPDATE');
                                        $('#update_modal').modal('show');
                                    },
                                    error: function (xhr) {
                                        console.log(xhr);
                                    }
                                });
                            }




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




        function clearUpdateForm() {
            $('#update_form').trigger('reset');
            $('#id').val('');
            $('#update_form_message').empty();
            $('#update_form').find('.text-danger').removeClass('text-danger');
            $('#update_form').find('.is-invalid').removeClass('is-invalid');
            $('#update_form').find('.error_message').remove();
            return true;
        }


        $(document).on('submit', '#update_form', function () {
            $('#update_form_message').empty();
            $('#update_form').find('.text-danger').removeClass('text-danger');
            $('#update_form').find('.is-invalid').removeClass('is-invalid');
            $('#update_form').find('.error_message').remove();
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/operation/booking/and/reservation/save') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('.update_modal_close').trigger('click');
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'id') {

                                    if (key === 'price_per_hour' ||  key === 'cleaning_fee' || key === 'city_fee' || key === 'security_deposit_amount') {

                                        $('#' + key).parent().after('<span class="error_message"></span>');
                                        $('#' + key).parent().parent().find('label').addClass('text-danger');
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().parent().find('.error_message').addClass('text-danger').append('<p>' + v + '</p>');
                                        });
                                    } else {
                                        $('#' + key).after('<span class="error_message"></span>');
                                        $('#' + key).parent().find('label').addClass('text-danger');
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().find('.error_message').addClass('text-danger').append('<p>' + v + '</p>');
                                        });
                                    }

                                } else {
                                    $.each(value, function (k, v) {
                                        $('#update_form_message').append('<p style="margin: 0;">' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
            return false;
        });











    </script>
@endsection
