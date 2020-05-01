@extends('Layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    {{ $activeMenuValue }} | {{ $activeSubMenuValue }}
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">

                <div class="col" id="search_section">
                    <form id="search_form">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="date_from">Booking Create Date From</label>
                                    <input type="text" class="form-control" id="date_from" placeholder="Date From">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="date_to">Booking Create Date To</label>
                                    <input type="text" class="form-control" id="date_to" placeholder="Date To">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="start_date">Booking Start Date</label>
                                    <input type="text" class="form-control" id="start_date" placeholder="Start Date">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="end_date">Booking End Date</label>
                                    <input type="text" class="form-control" id="end_date" placeholder="End Date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="status">Booking Status</label>
                                    <select class="form-control" id="status">
                                        <option value="">Select a Status</option>
                                        <option value="Booked">Booked</option>
                                        <option value="Reserved">Reserved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="venue_id">Venue</label>
                                    <select class="form-control" id="venue_id">
                                        <option value="">Select a Venue</option>
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id }}">{{ $venue->venue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="customer_id">Customer</label>
                                    <select class="form-control" id="customer_id">
                                        <option value="">Select a Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->number }}-{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-top: 28px;">
                                <button class="btn btn-sm btn_default btn-block" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="row sr-only" style="" id="record_section">
                <div class="col">
                    <i class="fa fa-print fa-2x mb-2 text_default" style="cursor: pointer;" aria-hidden="true" id="generate_report"></i>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Created On</th>
                            <th>Invoice Number</th>
                            <th>Customer</th>
                            <th>Venue</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Rate Per Hour</th>
                            <th>Total Hour</th>
                            <th>Cleaning Fee</th>
                            <th>City Fee</th>
                            <th>Security Deposit</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody id="records"></tbody>
                    </table>
                </div>
            </div>

            <div class="row sr-only" id="no_record_section">
                <div class="col text-center mt-3">
                    No Record Found
                </div>
            </div>

        </div>
    </div>

    <script language="JavaScript">




        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
            $('#records').empty();
            $('#no_record_section').addClass('sr-only');
            return true;
        }
        function gets(url) {
            setPageDefaults();
            $.ajax({
                method: 'get',
                url: url,
                success: function (result) {
                    console.log(result);
                    if (result.length > 0) {
                        $.each(result, function (key, value) {
                            $('#records').append($('<tr></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + ++key + '</td>')
                                .append('<td>' + $.datepicker.formatDate('dd-M-yy', new Date(value.created_at)) + '</td>')
                                .append('<td>' + value.invoice_number + '</td>')
                                .append('<td>' + value.customer.number + '-' + value.customer.name + '</td>')
                                .append('<td>' + value.venue.number + '-' + value.venue.venue + '</td>')
                                .append('<td>' + $.datepicker.formatDate('dd-M-yy', new Date(value.starting_date_time)) + ' ' + value.starting_date_time.split(' ')[1] + '</td>')
                                .append('<td>' + $.datepicker.formatDate('dd-M-yy', new Date(value.ending_date_time)) + ' ' + value.ending_date_time.split(' ')[1] + '</td>')
                                .append('<td>$' + value.price_per_hour + '</td>')
                                .append('<td>' + value.total_hour + '</td>')
                                .append('<td>$' + value.cleaning_fee + '</td>')
                                .append('<td>$' + value.city_fee + '</td>')
                                .append('<td>$' + value.security_deposit_amount + '</td>')
                                .append('<td>$' + ((parseFloat(value.price_per_hour) * parseFloat(value.total_hour)) + (parseFloat(value.cleaning_fee) + parseFloat(value.city_fee) + parseFloat(value.security_deposit_amount))) + '</td>')
                                .append('<td>' + value.status + '</td>')

                            );
                        });
                        $('#record_section').removeClass('sr-only');
                    } else {
                        $('#no_record_section').removeClass('sr-only');
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return true;
        }




        $(document).ready(function () {
            $('#date_from').datepicker();
            $('#date_to').datepicker();
            $('#start_date').datepicker();
            $('#end_date').datepicker();

            let dateFrom = $('#date_from').val() === '' ? 'null' : $('#date_from').val();
            let dateTo = $('#date_to').val() === '' ? 'null' : $('#date_to').val();
            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
            let status = $('#status').val() === '' ? 'null' : $('#status').val();
            let venueId = $('#venue_id').val() === '' ? 'null' : $('#venue_id').val();
            let customerId = $('#customer_id').val() === '' ? 'null' : $('#customer_id').val();
            gets('{{ url('admin/report/booking/and/reservation/gets') }}/' + dateFrom + '/' + dateTo + '/' + startDate + '/' + endDate + '/' + status + '/' + venueId + '/' + customerId);

        });

        $(document).on('submit', '#search_form', function () {
            let dateFrom = $('#date_from').val() === '' ? 'null' : $('#date_from').val();
            let dateTo = $('#date_to').val() === '' ? 'null' : $('#date_to').val();
            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
            let status = $('#status').val() === '' ? 'null' : $('#status').val();
            let venueId = $('#venue_id').val() === '' ? 'null' : $('#venue_id').val();
            let customerId = $('#customer_id').val() === '' ? 'null' : $('#customer_id').val();
            gets('{{ url('admin/report/booking/and/reservation/gets') }}/' + dateFrom + '/' + dateTo + '/' + startDate + '/' + endDate + '/' + status + '/' + venueId + '/' + customerId);
            return false;
        });


        $(document).on('click', '#generate_report', function () {
            let dateFrom = $('#date_from').val() === '' ? 'null' : $('#date_from').val();
            let dateTo = $('#date_to').val() === '' ? 'null' : $('#date_to').val();
            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
            let status = $('#status').val() === '' ? 'null' : $('#status').val();
            let venueId = $('#venue_id').val() === '' ? 'null' : $('#venue_id').val();
            let customerId = $('#customer_id').val() === '' ? 'null' : $('#customer_id').val();
            $.ajax({
                method: 'get',
                url: '{{ url('admin/report/booking/and/reservation/generate/report') }}',
                data: {
                    'date_from': dateFrom,
                    'date_to': dateTo,
                    'start_date': startDate,
                    'end_date': endDate,
                    'status': status,
                    'venue_id': venueId,
                    'customer_id': customerId
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    window.open(result);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });


    </script>
@endsection
