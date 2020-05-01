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
                <div class="col">
                    <button type="button" class="btn btn-sm btn_default" id="add_single">ADD SINGLE</button>
                    <button type="button" class="btn btn-sm btn_default ml-3" id="add_bulk">ADD BULK</button>
                </div>
                <div class="col" id="search_section">
                    <form id="search_form">
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Search..." id="search_key" name="search_key">
                            </div>
                            <div class="col-sm-4">
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
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-2" style="padding-top: 10px;">
                            <input type="checkbox" id="bulk_records"> All Check
                        </div>
                        <div class="col-sm-2">
                            <select name="bulk_status" id="bulk_status" class="form-control">
                                <option value="">Bulk Action</option>
                                <option value="Active">Make Active</option>
                                <option value="Inactive">Make Inactive</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <button type="button" id="bulk_apply" class="btn btn-sm btn_default">APPLY</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Narrative</th>
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


    <div class="modal fade" id="add_single_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Single Blocked Booking</h5>
                    <button type="button" class="close add_single_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 50px;">
                    <div id="add_single_form_message" class="text-center text-danger">

                    </div>
                    <form id="add_single_form">
                        <input name="id" type="hidden" id="id_for_single_add">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="date_for_single_add">Date</label>
                                    <input name="date" type="text" class="form-control" id="date_for_single_add" placeholder="Date" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="venue_id_for_single_add">Venue</label>
                                    <select name="venue_id" type="text" class="form-control" id="venue_id_for_single_add">
                                        <option value="">Select a Venue</option>
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id }}">{{ $venue->number }} [{{ $venue->type }}] - {{ $venue->venue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="start_time_for_single_add">Start Time</label>
                                    <input name="start_time" type="text" class="form-control" id="start_time_for_single_add" placeholder="hh:mm:ss" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="end_time_for_single_add">End Time</label>
                                    <input name="end_time" type="text" class="form-control" id="end_time_for_single_add" placeholder="hh:mm:ss" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="background_color_for_single_add">Background Color</label>
                                    <input type="color" name="background_color" id="background_color_for_single_add" class="form-control color" value="#ff0000">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="text_color_for_single_add">Text Color</label>
                                    <input type="color" name="text_color" id="text_color_for_single_add" class="form-control color" value="#000000">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="status_for_single_add">Status</label>
                                    <select name="status" class="form-control" id="status_for_single_add">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="narrative_for_single_add">Narrative</label>
                                    <textarea name="narrative" type="text" class="form-control" id="narrative_for_single_add" placeholder="Narrative"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary btn-sm add_single_modal_close" data-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn_default btn-sm ml-3" id="add_single_form_submit"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add_bulk_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bulk Blocked Booking</h5>
                    <button type="button" class="close add_bulk_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 50px;">
                    <div id="add_bulk_form_message" class="text-center text-danger">

                    </div>
                    <form id="add_bulk_form">
                        <input name="id" type="hidden" id="id_for_bulk_add">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="day_for_bulk_add">Day</label>
                                    <select name="day" class="form-control" id="day_for_bulk_add">
                                        <option value="">Select a Day</option>
                                        <option value="Monday">Every Monday</option>
                                        <option value="Tuesday">Every Tuesday</option>
                                        <option value="Wednesday">Every Wednesday</option>
                                        <option value="Thursday">Every Thursday</option>
                                        <option value="Friday">Every Friday</option>
                                        <option value="Saturday">Every Saturday</option>
                                        <option value="Sunday">Every Sunday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="year_for_bulk_add">Year</label>
                                    <select name="year" class="form-control" id="year_for_bulk_add">
                                        <option value="">Select a Year</option>
                                        @for($year=date('Y'); $year<=date('Y')+10; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="venue_id_for_bulk_add">Venue</label>
                                    <select name="venue_id" type="text" class="form-control" id="venue_id_for_bulk_add">
                                        <option value="">Select a Venue</option>
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id }}">{{ $venue->number }} [{{ $venue->type }}] - {{ $venue->venue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="start_time_for_bulk_add">Start Time</label>
                                    <input name="start_time" type="text" class="form-control" id="start_time_for_bulk_add" placeholder="hh:mm:ss" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="end_time_for_bulk_add">End Time</label>
                                    <input name="end_time" type="text" class="form-control" id="end_time_for_bulk_add" placeholder="hh:mm:ss" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="background_color_for_bulk_add">Background Color</label>
                                    <input type="color" name="background_color" id="background_color_for_bulk_add" class="form-control color" value="#ff0000">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="text_color_for_bulk_add">Text Color</label>
                                    <input type="color" name="text_color" id="text_color_for_bulk_add" class="form-control color" value="#000000">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="status_for_bulk_add">Status</label>
                                    <select name="status" class="form-control" id="status_for_bulk_add">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="narrative_for_bulk_add">Narrative</label>
                                    <textarea name="narrative" type="text" class="form-control" id="narrative_for_bulk_add" placeholder="Narrative"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-justify small">
                                Note: The Overlapping Date Time will be Skipped in this Bulk Operation.
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary btn-sm add_bulk_modal_close" data-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn_default btn-sm ml-3" id="add_bulk_form_submit"></button>
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
            $('#bulk_action_section').addClass('sr-only');
            $('#bulk_records').prop('checked', false);
            $('#bulk_status').val('');
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
                            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                            let link = [];
                            for (let i=1; i<=result.last_page; i++) {
                                let linkUrl = '{{ url('admin/operation/blocked/booking/date/gets') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
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
                                let jumpOver = '<div class="form-inline ml-3"><label for="jump_pagination">Go To</label><input type="text" pattern="\d+" class="form-control form-control-sm mx-2" id="jump_pagination"><label for="jump_pagination">Page</label></div>';
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

                        let venue;
                        $.each(result.data, function (key, value) {
                            if (value.venue !== null) {
                                venue = value.venue.venue.length > 40 ? value.venue.number + ' [' + value.venue.type + '] - ' + value.venue.venue.substring(0, 40) + '...' : value.venue.number + ' [' + value.venue.type + '] - ' + value.venue.venue;
                            } else {
                                venue = '---';
                            }
                            $('#records').append($('<tr></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] + '</td>')
                                .append('<td width="25%">' + venue + '</td>')
                                .append('<td>' + $.datepicker.formatDate('dd-MM-yy', new Date(value.date)) + '</td>')
                                .append('<td>' + value.start_time + '</td>')
                                .append('<td>' + value.end_time + '</td>')
                                .append('<td>' + value.status + '</td>')
                                .append('<td>' + value.narrative + '</td>')
                                .append('<td width="10%"><i class="far fa-edit fa-2x edit text_default" data-id="' + value.id + '" style="cursor: pointer;" data-toggle="tooltip" title="Edit"></i><i class="fa fa-trash ml-3 fa-2x text_default delete" data-id="' + value.id + '" style="cursor: pointer;"></i></td>')
                            );
                        });

                        $('#record_section').removeClass('sr-only');
                        $('#pagination_section').parent().removeClass('sr-only');
                        $('#bulk_action_section').removeClass('sr-only');
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

            document.getElementsByClassName('color').onchange = function() {
                this.value = this.value;
            }

            $('#date_for_single_add').datepicker();

            $('#start_time_for_single_add').clockpicker({
                autoclose: false,
                donetext: 'Done',
                afterDone: function() {
                    $('#start_time_for_single_add').val($('#start_time_for_single_add').val() + ':00');
                },
            });

            $('#end_time_for_single_add').clockpicker({
                autoclose: false,
                donetext: 'Done',
                afterDone: function() {
                    $('#end_time_for_single_add').val($('#end_time_for_single_add').val() + ':00');
                },
            });


            $('#start_time_for_bulk_add').clockpicker({
                autoclose: false,
                donetext: 'Done',
                afterDone: function() {
                    $('#start_time_for_bulk_add').val($('#start_time_for_bulk_add').val() + ':00');
                },
            });

            $('#end_time_for_bulk_add').clockpicker({
                autoclose: false,
                donetext: 'Done',
                afterDone: function() {
                    $('#end_time_for_bulk_add').val($('#end_time_for_bulk_add').val() + ':00');
                },
            });


            $('#search_key').val('');
            currentPageUrl = '{{ url('admin/operation/blocked/booking/date/gets') }}/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('admin/operation/blocked/booking/date/gets') }}/' + searchKey + '/{{ $recordPerPage }}';
            gets(currentPageUrl);
            return false;
        });

        $('#bulk_records').click(function () {
            $('.bulk_record').not(this).prop('checked', this.checked);
            $('#bulk_records').not(this).prop('checked', this.checked);
            return true;
        });

        $(document).on('click', '#bulk_apply', function () {
            let data = new FormData(),
                status = $('#bulk_status').val(),
                ids = [];
            $('.bulk_record:checkbox:checked').each(function () {
                ids.push($(this).val());
            });
            data.append('ids', ids);
            data.append('status', status);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/operation/blocked/booking/date/apply/bulk/operation') }}',
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
                    let message = '';
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                $.each(value, function (k, v) {
                                    message += v + '<br>';
                                });
                            });
                        }
                    }
                    $.toaster({ title: 'Warning', priority : 'danger', message : message });
                }
            });
            return false;
        });


        function clearSingleAddForm() {
            $('#add_single_form').trigger('reset');
            $('#id_for_single_add').val('');
            $('#add_single_form_message').empty();
            $('#add_single_form').find('.text-danger').removeClass('text-danger');
            $('#add_single_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_single_form').find('span').remove();
            return true;
        }


        $(document).on('submit', '#add_single_form', function () {
            $('#add_single_form_message').empty();
            $('#add_single_form').find('.text-danger').removeClass('text-danger');
            $('#add_single_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_single_form').find('span').remove();
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/operation/blocked/booking/date/single/save') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('.add_single_modal_close').trigger('click');
                    if ($('#id_for_single_add').val() === '') {
                        let landingPageUrl;
                        if (totalRecord !== 0 && (totalRecord % '{{ $recordPerPage }}') === 0) {
                            landingPageUrl = lastPageUrl.split('=')[0] + '=' + (parseInt(lastPageUrl.split('=')[1]) + 1);
                        } else {
                            landingPageUrl = lastPageUrl;
                        }
                        currentPageUrl = landingPageUrl;
                        gets(landingPageUrl);
                    } else {
                        gets(currentPageUrl);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'id') {
                                    $('#' + key + '_for_single_add').after('<span></span>');
                                    $('#' + key + '_for_single_add').parent().find('label').addClass('text-danger');
                                    $('#' + key + '_for_single_add').addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key + '_for_single_add').parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                    });
                                } else {
                                    $.each(value, function (k, v) {
                                        $('#add_single_form_message').append('<p style="margin: 0;">' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
            return false;
        });

        $(document).on('click', '#add_single', function () {
            clearSingleAddForm();
            $('#add_single_form_submit').text('SAVE');
            $('#add_single_modal').modal('show');
            return false;
        });





        function clearBulkAddForm() {
            $('#add_bulk_form').trigger('reset');
            $('#id_for_bulk_add').val('');
            $('#add_bulk_form_message').empty();
            $('#add_bulk_form').find('.text-danger').removeClass('text-danger');
            $('#add_bulk_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_bulk_form').find('span').remove();
            return true;
        }


        $(document).on('submit', '#add_bulk_form', function () {
            $('#add_bulk_form_message').empty();
            $('#add_bulk_form').find('.text-danger').removeClass('text-danger');
            $('#add_bulk_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_bulk_form').find('span').remove();
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/operation/blocked/booking/date/bulk/save') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('.add_bulk_modal_close').trigger('click');
                    if ($('#id_for_bulk_add').val() === '') {
                        let landingPageUrl;
                        if (totalRecord !== 0 && (totalRecord % '{{ $recordPerPage }}') === 0) {
                            landingPageUrl = lastPageUrl.split('=')[0] + '=' + (parseInt(lastPageUrl.split('=')[1]) + 1);
                        } else {
                            landingPageUrl = lastPageUrl;
                        }
                        currentPageUrl = landingPageUrl;
                        gets(landingPageUrl);
                    } else {
                        gets(currentPageUrl);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'id') {
                                    $('#' + key + '_for_bulk_add').after('<span></span>');
                                    $('#' + key + '_for_bulk_add').parent().find('label').addClass('text-danger');
                                    $('#' + key + '_for_bulk_add').addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key + '_for_bulk_add').parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                    });
                                } else {
                                    $.each(value, function (k, v) {
                                        $('#add_bulk_form_message').append('<p style="margin: 0;">' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
            return false;
        });

        $(document).on('click', '#add_bulk', function () {
            clearBulkAddForm();
            $('#add_bulk_form_submit').text('SAVE');
            $('#add_bulk_modal').modal('show');
            return false;
        });



        $(document).on('click', '.edit', function () {
            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('admin/operation/blocked/booking/date/get') }}/' + id,
                cache: false,
                success: function (result) {
                    console.log(result);
                    clearSingleAddForm();
                    $('#id_for_single_add').val(id);
                    if (result.venue_id !== null) {
                        $('#venue_id_for_single_add').val(result.venue_id);
                    }
                    $('#date_for_single_add').val($.datepicker.formatDate('dd-MM-yy', new Date(result.date)));
                    $('#start_time_for_single_add').val(result.start_time);
                    $('#end_time_for_single_add').val(result.end_time);
                    $('#background_color_for_single_add').val(result.background_color);
                    $('#text_color_for_single_add').val(result.text_color);
                    $('#status_for_single_add').val(result.status);
                    if (result.narrative !== '---') {
                        $('#narrative_for_single_add').val(result.narrative);
                    }
                    $('#add_single_form_submit').text('UPDATE');
                    $('#add_single_modal').modal('show');
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
                url: '{{ url('admin/operation/blocked/booking/date/delete') }}',
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
