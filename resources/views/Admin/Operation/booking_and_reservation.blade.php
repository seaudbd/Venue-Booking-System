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
                                    <label for="status_for_search">Booking Status</label>
                                    <select class="form-control" id="status_for_search">
                                        <option value="">Select a Status</option>
                                        <option value="Booked">Booked</option>
                                        <option value="Reserved">Reserved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="venue_id_for_search">Venue</label>
                                    <select class="form-control" id="venue_id_for_search">
                                        <option value="">Select a Venue</option>
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id }}">{{ $venue->venue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="customer_id_for_search">Customer</label>
                                    <select class="form-control" id="customer_id_for_search">
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

            <div class="row sr-only" style="margin-top: 15px;" id="record_section">
                <div class="col">

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
                            <th>Action</th>
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

            <div class="row sr-only" style="margin-top: 15px; margin-bottom: 50px;">
                <div class="sr-only" id="pagination_section">
                    <ul class="pagination" role="navigation" id="pagination_links">

                    </ul>
                </div>
                <div class="text-right" id="record_count_section">

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add_modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 1rem;"></h5>
                    <button type="button" class="close add_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 50px;">
                    <div id="add_form_message" class="text-center text-danger">

                    </div>
                    <form id="add_form">
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
                                <button type="button" class="btn btn-primary btn-sm add_modal_close" data-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn_default btn-sm ml-3" id="add_form_submit"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script language="JavaScript">


        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
            $('#records').empty();
            $('#no_record_section').addClass('sr-only');
            $('#record_count_section').removeClass('col-sm-12 col-sm-2');
            $('#pagination_section').removeClass('col-sm-10');
            $('#pagination_section').parent().addClass('sr-only');
            $('#pagination_section').addClass('sr-only');
            $('#pagination_links').empty();
            $('#record_count_section').empty();
            return true;
        }
        function gets(url) {
            setPageDefaults();
            $.ajax({
                method: 'get',
                url: url,
                success: function (result) {
                    console.log(result);
                    totalRecord = result.total;
                    lastPageUrl = result.last_page_url;
                    lastPageNumber = result.last_page;
                    let firstItem = result.current_page - 4;
                    let lastItem = result.current_page + 4;
                    if (result.total > 0) {
                        $('#record_count_section').append('Record: ' + result.from + ' ~ ' + result.to + ' of ' + result.total);
                        if (result.total > '{{ $recordPerPage }}') {
                            let dateFrom = $('#date_from').val() === '' ? 'null' : $('#date_from').val();
                            let dateTo = $('#date_to').val() === '' ? 'null' : $('#date_to').val();
                            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
                            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
                            let status = $('#status_for_search').val() === '' ? 'null' : $('#status_for_search').val();
                            let venueId = $('#venue_id_for_search').val() === '' ? 'null' : $('#venue_id_for_search').val();
                            let customerId = $('#customer_id_for_search').val() === '' ? 'null' : $('#customer_id_for_search').val();
                            let link = [];
                            for (let i=1; i<=result.last_page; i++) {
                                let linkUrl = '{{ url('admin/operation/booking/and/reservation/gets') }}/' + dateFrom + '/' + dateTo + '/' + startDate + '/' + endDate + '/' + status + '/' + venueId + '/' + customerId + '/{{ $recordPerPage }}?page=' + i;
                                if (result.current_page === i) {
                                    link[i] = '<a href="#" class="page-link btn_default pagination_active" data-url="' + linkUrl + '">' + i + '</a>';
                                } else {
                                    link[i] = '<a href="#" class="page-link btn_default" data-url="' + linkUrl + '">' + i + '</a>';
                                }
                            }

                            if (result.last_page <= 9) {
                                for (let i = 1; i<=result.last_page; i++){
                                    $('#pagination_links').append('<li class="page-item">' + link[i] + '<li>');
                                }
                            } else {
                                if (result.current_page <= 5) {
                                    firstItem = 1;
                                } else if (lastItem >= lastPageNumber) {
                                    firstItem = lastPageNumber - 8;
                                }
                                for (let i=0; i<9; i++) {
                                    $('#pagination_links').append('<li class="page-item">' + link[firstItem+i] + '<li>');
                                }
                                let jumpOver = '<div class="form-inline"><label for="jump_pagination">Go To</label><input type="text" pattern="\d+" class="form-control form-control-sm mx-2" id="jump_pagination"><label for="jump_pagination">Page</label></div>';
                                $('#pagination_links').append(jumpOver);
                            }
                            $('#record_count_section').addClass('col-sm-2');
                            $('#pagination_section').addClass('col-sm-10');
                            $('#pagination_section').removeClass('sr-only');
                        } else {
                            $('#record_count_section').addClass('col-sm-12');
                        }
                        let sl = [];
                        for (let j = result.from; j <= result.to; j++) {
                            sl.push(j);
                        }

                        $.each(result.data, function (key, value) {

                            $('#records').append($('<tr></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] + '</td>')
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
                                .append('<td width="10%"><i class="far fa-edit fa-2x edit text_default" data-id="' + value.id + '" style="cursor: pointer;" data-toggle="tooltip" title="Edit"></i><i class="fa fa-trash ml-3 fa-2x text_default delete" data-id="' + value.id + '" style="cursor: pointer;"></i></td>')
                            );
                        });

                        $('#record_section').removeClass('sr-only');
                        $('#pagination_section').parent().removeClass('sr-only');

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

        var currentPageUrl = '';
        var lastPageUrl = '';
        var totalRecord = 0;

        $(document).ready(function () {

            $('#date_from').datepicker();
            $('#date_to').datepicker();
            $('#start_date').datepicker();
            $('#end_date').datepicker();

            $('#arrival_date_time').datetimepicker({
                format:'Y-m-d H:i',
            });
            $('#starting_date_time').datetimepicker({
                format:'Y-m-d H:i',
            });
            $('#ending_date_time').datetimepicker({
                format:'Y-m-d H:i',
            });

            let dateFrom = $('#date_from').val() === '' ? 'null' : $('#date_from').val();
            let dateTo = $('#date_to').val() === '' ? 'null' : $('#date_to').val();
            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
            let status = $('#status_for_search').val() === '' ? 'null' : $('#status_for_search').val();
            let venueId = $('#venue_id_for_search').val() === '' ? 'null' : $('#venue_id_for_search').val();
            let customerId = $('#customer_id_for_search').val() === '' ? 'null' : $('#customer_id_for_search').val();

            currentPageUrl = '{{ url('admin/operation/booking/and/reservation/gets') }}/' + dateFrom + '/' + dateTo + '/' + startDate + '/' + endDate + '/' + status + '/' + venueId + '/' + customerId + '/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let dateFrom = $('#date_from').val() === '' ? 'null' : $('#date_from').val();
            let dateTo = $('#date_to').val() === '' ? 'null' : $('#date_to').val();
            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
            let status = $('#status_for_search').val() === '' ? 'null' : $('#status_for_search').val();
            let venueId = $('#venue_id_for_search').val() === '' ? 'null' : $('#venue_id_for_search').val();
            let customerId = $('#customer_id_for_search').val() === '' ? 'null' : $('#customer_id_for_search').val();

            currentPageUrl = '{{ url('admin/operation/booking/and/reservation/gets') }}/' + dateFrom + '/' + dateTo + '/' + startDate + '/' + endDate + '/' + status + '/' + venueId + '/' + customerId + '/{{ $recordPerPage }}';
            gets(currentPageUrl);
            return false;
        });






        function clearAddForm() {
            $('#add_form').trigger('reset');
            $('#id').val('');
            $('#add_form_message').empty();
            $('#add_form').find('.text-danger').removeClass('text-danger');
            $('#add_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_form').find('.error_message').remove();
            return true;
        }


        $(document).on('submit', '#add_form', function () {
            $('#add_form_message').empty();
            $('#add_form').find('.text-danger').removeClass('text-danger');
            $('#add_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_form').find('.error_message').remove();
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
                    $('.add_modal_close').trigger('click');
                    gets(currentPageUrl);
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
                                        $('#add_form_message').append('<p style="margin: 0;">' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
            return false;
        });





        $(document).on('click', '.edit', function () {
            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('admin/operation/booking/and/reservation/get') }}/' + id,
                cache: false,
                success: function (result) {
                    console.log(result);
                    clearAddForm();
                    $('#add_modal .modal-title').text(result.venue.number + '-' + result.venue.venue + ' ' + result.status + ' for ' + result.customer.number + '-' + result.customer.name);
                    $('#id').val(id);
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
                    $('#add_form_submit').text('UPDATE');
                    $('#add_modal').modal('show');
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });

        $(document).on('click', '.delete', function () {
            let id = $(this).data('id');
            let data = new FormData();
            data.append('id', id);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/operation/booking/and/reservation/delete') }}',
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    gets(currentPageUrl);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });



        $(document).on('change', '#jump_pagination', function () {
            let pageNumber = parseInt($('#jump_pagination').val());
            console.log(pageNumber);
            if (Number.isInteger(pageNumber) && pageNumber > 0 && pageNumber <= lastPageNumber) {
                let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                currentPageUrl = '{{ url('admin/operation/blocked/booking/date/gets') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>
@endsection
