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
                    <div class="row sr-only" style="margin-bottom: 10px;" id="bulk_action_section">
                        <div class="col-sm-3" style="padding-top: 10px;">
                            <input type="checkbox" id="bulk_records"> All Check
                        </div>
                        <div class="col-sm-4">
                            <select name="bulk_status" id="bulk_status" class="form-control">
                                <option value="">Bulk Action</option>
                                <option value="Casual">Make Casual</option>
                                <option value="Regular">Make Regular</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" id="bulk_apply" class="btn btn-sm btn_default">APPLY</button>
                        </div>
                    </div>
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
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Access Code</th>
                            <th>Number</th>
                            <th>Login ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
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


    <div class="modal" id="booking_modal">
        <div class="modal-dialog modal-dialog-centered modal_ninety">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Booking Details</h4>
                    <button type="button" class="close booking_modal_close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" style="padding: 30px 20px 30px 20px;">
                    <div class="row sr-only" id="no_booking_found">
                        <div class="col text-center">
                            No Record Found!
                        </div>
                    </div>
                    <div class="table-responsive sr-only" id="booking_record_section">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Venue</th>
                                <th>Booking Hours</th>
                                <th>Rate/Hour</th>
                                <th>Total Hour</th>
                                <th>Cleaning Fee</th>
                                <th>City Fee</th>
                                <th>Deposit Amount</th>
                                <th>Deposit Status</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody id="booking_records">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal" id="access_code_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Access Code</h4>
                    <button type="button" class="close access_code_modal_close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" style="padding: 30px 20px 30px 20px;">
                    <div id="access_code_form_message" class="text-danger text-center"></div>
                    <form id="access_code_form">
                        <input type="hidden" id="customer_id_for_access_code" name="id">
                        <div class="row">
                            <div class="col-sm-4">Access Code</div>
                            <div class="col-sm-8">
                                <input name="access_code" type="text" class="form-control" id="access_code" placeholder="Access Code">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary btn-sm access_code_modal_close" data-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn_default btn-sm ml-3" id="access_code_form_submit">Save</button>
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
                                let linkUrl = '{{ url('admin/operation/customer/gets') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
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

                        let status;
                        
                        $.each(result.data, function (key, value) {
                            
							let recordColor;

                            if (value.customer_bookings.length > 0) {
                            	recordColor = 'text-danger';
                                $.each(value.customer_bookings, function (k, v) {
                                    if (v.security_deposit_status === 'Paid') {
                                        recordColor = 'text-success';
                                        return;
                                    }
                                });
                            } else {
                                recordColor = 'text_blue';
                            }

                            

                            if (value.status === 'Casual') {
                                status = '<option value="Casual" selected>Casual</option><option value="Regular">Regular</option>';
                            } else {
                                status = '<option value="Casual">Casual</option><option value="Regular" selected>Regular</option>';
                            }

                            $('#records').append($('<tr class="' + recordColor + '"></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] + '</td>')
                                .append('<td>' + value.access_code + '</td>')
                                .append('<td>' + value.number + '</td>')
                                .append('<td>' + value.login_id + '</td>')
                                .append('<td>' + value.name + '</td>')
                                .append('<td>' + value.email + '</td>')
                                .append('<td>' + value.contact_number + '</td>')
                                .append('<td>' + value.status + '</td>')
                                .append('<td>' + value.narrative + '</td>')
                                .append('<td width="20%"><select class="form-control mb-2 status" data-id="' + value.id + '">' + status + '</select><i class="fas fa-universal-access fa-2x ml-3 text_default access_code" style="cursor: pointer;" data-id="' + value.id + '"></i><i class="fa fa-trash fa-2x ml-3 text_default delete" style="cursor: pointer;" data-id="' + value.id + '"></i><i class="fas fa-bars fa-2x ml-3 text_default booking" style="cursor: pointer;" data-id="' + value.id + '"></i></td>')
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
            $('#search_key').val('');
            currentPageUrl = '{{ url('admin/operation/customer/gets') }}/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('admin/operation/customer/gets') }}/' + searchKey + '/{{ $recordPerPage }}';
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
                url: '{{ url('admin/operation/customer/apply/bulk/operation') }}',
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

        $(document).on('click', '.access_code', function () {
            $('#access_code_form').find('.text-danger').removeClass('text-danger');
            $('#access_code_form').find('.is-invalid').removeClass('is-invalid');
            $('#access_code_form').find('span').remove();
            $('#access_code_form_submit').removeAttr('disabled');
            $('#access_code_form_message').empty();

            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('admin/operation/customer/get/access/code') }}',
                data: {
                    id: id
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#customer_id_for_access_code').val(result.id);
                    if (result.access_code !== '---') {
                        $('#access_code').val(result.access_code);
                    }
                    $('#access_code_modal').modal('show');
                }
            });
            return false;
        });

        $(document).on('submit', '#access_code_form', function () {
            $('#access_code_form').find('.text-danger').removeClass('text-danger');
            $('#access_code_form').find('.is-invalid').removeClass('is-invalid');
            $('#access_code_form').find('span').remove();
            $('#access_code_form_submit').attr('disabled', 'disabled');
            $('#access_code_form_message').empty();
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/operation/customer/save/access/code') }}',
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#access_code_form_submit').removeAttr('disabled');
                    $('.access_code_modal_close').trigger('click');
                    gets(currentPageUrl);
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#access_code_form_submit').removeAttr('disabled');
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'id') {
                                    $('#' + key).after('<span></span>');
                                    $('#' + key).parent().parent().children('div').eq(0).addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                    });
                                } else {
                                    $.each(value, function (k, v) {
                                        $('#access_code_form_message').append('<p style="margin: 0;">' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
            return false;
        });

        $(document).on('change', '.status', function () {
            let id = $(this).data('id');
            let status = $(this).val();
            let data = new FormData();
            data.append('id', id);
            data.append('status', status);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/operation/customer/change/status') }}',
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

        $(document).on('click', '.delete', function () {
            let id = $(this).data('id');
            let data = new FormData();
            data.append('id', id);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/operation/customer/delete') }}',
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


        $(document).on('click', '.booking', function () {
            $('#no_booking_found').addClass('sr-only');
            $('#booking_record_section').addClass('sr-only');
            $('#booking_records').empty();
            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('admin/operation/customer/get/bookings/by/customer/id') }}',
                data: {
                    customer_id: id
                },
                cache: false,
                success: function (result) {
                    console.log(result);

                    if (result.length > 0) {
                        $.each(result, function (key, value) {
                            $('#booking_records').append($('<tr></tr>')
                                .append('<td>' + ++key + '</td>')
                                .append('<td>' + value.venue.venue + '</td>')
                                .append('<td>From ' + value.starting_date_time + ' To ' + value.ending_date_time + '</td>')
                                .append('<td>$' + value.price_per_hour + '</td>')
                                .append('<td>' + value.total_hour + '</td>')
                                .append('<td>$' + value.cleaning_fee + '</td>')
                                .append('<td>$' + value.city_fee + '</td>')
                                .append('<td>$' + value.security_deposit_amount + '</td>')
                                .append('<td>' + value.security_deposit_status + '</td>')
                                .append('<td>' + value.status + '</td>')
                            );
                        });
                        $('#booking_record_section').removeClass('sr-only');
                    } else {
                        $('#no_booking_found').removeClass('sr-only');
                    }

                    $('#booking_modal').modal('show');
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
                currentPageUrl = '{{ url('admin/operation/customer/gets') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>
@endsection
