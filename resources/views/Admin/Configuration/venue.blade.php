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
                    <button type="button" class="btn btn-sm btn_default" id="add">ADD</button>
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
                            <th>Type</th>
                            <th>Price Per Hour</th>
                            <th>Security Deposit Amount</th>
                            <th>Number of Rooms</th>
                            <th>Number of Seats</th>
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

            <div class="modal fade" id="add_modal">
                <div class="modal-dialog modal-dialog-centered modal_95">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Venue</h5>
                            <button type="button" class="close add_modal_close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="padding-left: 80px; padding-right: 80px; padding-bottom: 50px;">
                            <div id="add_form_message" class="text-center text-danger">

                            </div>
                            <form id="add_form">
                                <input name="id" type="hidden" id="id">

                                <div class="row">
                                    <div class="col-sm-3 pt-4">

                                        <div class="custom-file">
                                            <input type="file" name="image[]" class="custom-file-input" id="image" onchange="readImageURL(this);" multiple>
                                            <label class="custom-file-label" for="image">Choose Files</label>
                                        </div>

                                        <div id="image_wrapper"></div>


                                    </div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="venue">Venue</label>
                                                    <input name="venue" type="text" class="form-control" id="venue" placeholder="Venue">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="type">Type</label>
                                                    <select name="type" class="form-control" id="type">
                                                        <option value="Regular">Regular</option>
                                                        <option value="Casual">Casual</option>
                                                        <option value="Assembly">Assembly</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="price_per_hour">Price Per Hour</label>
                                                    <input name="price_per_hour" type="text" class="form-control" id="price_per_hour" placeholder="Price Per Hour">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="security_deposit_amount">Security Deposit Amount</label>
                                                    <input name="security_deposit_amount" type="text" class="form-control" id="security_deposit_amount" placeholder="Security Deposit Amount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="number_of_rooms">Number of Rooms</label>
                                                    <input name="number_of_rooms" type="text" class="form-control" id="number_of_rooms" placeholder="Number of Rooms">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="number_of_seats">Number of Seats</label>
                                                    <input name="number_of_seats" type="text" class="form-control" id="number_of_seats" placeholder="Number of Seats">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="number_of_guests">Number of Guests</label>
                                                    <input name="number_of_guests" type="text" class="form-control" id="number_of_guests" placeholder="Number of Guests">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="refund_policy">Refund Policy</label>
                                                    <textarea name="refund_policy" class="form-control" id="refund_policy" placeholder="Refund Policy"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="cleaning_fee">Cleaning Fee</label>
                                                    <input name="cleaning_fee" type="text" class="form-control" id="cleaning_fee" placeholder="Cleaning Fee">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="city_fee">City Fee</label>
                                                    <input name="city_fee" type="text" class="form-control" id="city_fee" placeholder="City Fee">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="background_color">Background Color</label>
                                                    <input type="color" name="background_color" id="background_color" class="form-control color" value="#00008b">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="text_color">Text Color</label>
                                                    <input type="color" name="text_color" id="text_color" class="form-control color" value="#f0f8ff">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" class="form-control" id="status">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="narrative">Narrative</label>
                                                    <textarea name="narrative" type="text" class="form-control" id="narrative" placeholder="Narrative"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col">Opening Hours</div>
                                                    <div class="col text-right text_default"><button type="button" class="btn btn-sm btn_default" id="add_more_opening_hour"><i class="fa fa-plus" aria-hidden="true"></i> ADD MORE</button></div>
                                                </div>
                                            </div>
                                            <div class="card-body" id="opening_hours_container">


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="checkbox" id="are_children_allowed"> Allow Children &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" id="is_additional_guest_allowed"> Allow Additional Guest &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" id="is_smoking_allowed"> Allow Smoking &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" id="is_party_allowed"> Allow Party &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" id="is_pet_allowed"> Allow Pet
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <button type="button" class="btn btn-primary text-center btn-sm add_modal_close" data-dismiss="modal">CLOSE</button>
                                        <button type="submit" class="btn btn_default btn-sm text-center margin_left_fifteen_px" id="add_form_submit"></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript">







        $(document).on('click', '#add_more_opening_hour', function () {
            let numberOfOpeningHour = $('.card-body').children('div').length;
            console.log(numberOfOpeningHour);
            let openingHourElement = '<div class="row mb-2" id="opening_hour_' + (numberOfOpeningHour + 1) + '"><div class="col"><input name="name_of_day[]" type="text" class="form-control" id="name_of_day_' + (numberOfOpeningHour + 1) + '" placeholder="Name of Day"></div><div class="col"><input name="opening_time[]" type="text" class="form-control" id="opening_time_' + (numberOfOpeningHour + 1) + '" placeholder="Opening Time"></div><div class="col"><input name="closing_time[]" type="text" class="form-control" id="closing_time_' + (numberOfOpeningHour + 1) + '" placeholder="Closing Time"></div></div>'
            $('#opening_hours_container').append(openingHourElement);
            $('#opening_time_' + (numberOfOpeningHour + 1)).datetimepicker({
                format:'H:i',
                datepicker: false,
            });
            $('#closing_time_' + (numberOfOpeningHour + 1)).datetimepicker({
                format:'H:i',
                datepicker: false,
            });
            return false;
        });

        function readImageURL(input) {
            $('.custom-file-label').empty();
            $('#image_wrapper').empty();
            $.each(input.files, function (key, file) {
                if (file) {
                    if (key === input.files.length - 1) {
                        $('.custom-file-label').append(file.name);
                    } else {
                        $('.custom-file-label').append(file.name + ', ');
                    }

                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_wrapper').append('<div class="row mt-3"><div class="col"><img src="' + e.target.result + '" height="100px" width="100%"></div></div>');

                    };
                    reader.readAsDataURL(file);
                }
            });
        }


        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
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
                                let linkUrl = '{{ url('admin/configuration/venue/gets') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
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
                        let image;
                        let images;
                        let imagePath;
                        $.each(result.data, function (key, value) {
                            if (value.image === '---') {
                                imagePath = '{{ asset('storage/venue/venue_image.png') }}';
                                image = '<img src="' + imagePath + '" width="50px" height="50px">';
                            } else {
                                images = value.image.split(',');
                                image = '';
                                $.each(images, function (k, v) {
                                    imagePath = '{{ asset('storage') }}/' + v;
                                    image += '<div class="wrapper"><img src="' + imagePath + '" width="50px" height="50px" class="image"><div class="overlay"><a href="javascript:void(0)" class="icon delete_image" data-image_path="' + v + '" data-id="' + value.id + '"><i class="fa fa-trash"></i></a></div></div> ';
                                });

                            }
                            $('#records').append($('<tr></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] + '</td>')
                                .append('<td>' + image + ' <div style="display: block; margin-top: 0px;">' + value.venue + '</div></td>')
                                .append('<td>' + value.type + '</td>')
                                .append('<td>$' + value.price_per_hour + '</td>')
                                .append('<td>$' + value.security_deposit_amount + '</td>')
                                .append('<td>' + value.number_of_rooms + '</td>')
                                .append('<td>' + value.number_of_seats + '</td>')
                                .append('<td>' + value.status + '</td>')
                                .append('<td>' + value.narrative + '</td>')
                                .append('<td><i class="far fa-edit fa-2x edit text_default" data-id="' + value.id + '" style="cursor: pointer;" data-toggle="tooltip" title="Edit"></i></td>')
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
            document.getElementsByClassName('color').onchange = function() {
                this.value = this.value;
            }
            $('#search_key').val('');
            currentPageUrl = '{{ url('admin/configuration/venue/gets') }}/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('admin/configuration/venue/gets') }}/' + searchKey + '/{{ $recordPerPage }}';
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
                url: '{{ url('admin/configuration/venue/apply/bulk/operation') }}',
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

        function clearAddForm() {
            $('#add_form').trigger('reset');
            $('#id').val('');
            $('#add_form_message').empty();
            $('.custom-file-label').text('Choose Files');
            $('#image_wrapper').empty();
            $('#add_form').find('.text-danger').removeClass('text-danger');
            $('#add_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_form').find('span').remove();
            $('#opening_hours_container').empty();
            return true;
        }

        $(document).on('submit', '#add_form', function () {
            $('#add_form_message').empty();
            $('#add_form').find('.text-danger').removeClass('text-danger');
            $('#add_form').find('.is-invalid').removeClass('is-invalid');
            $('#add_form').find('span').remove();
            let data = new FormData(this);
            if ($('#are_children_allowed').prop('checked') === true) {
                data.append('are_children_allowed', 'Yes');
            } else {
                data.append('are_children_allowed', 'No');
            }
            if ($('#is_additional_guest_allowed').prop('checked') === true) {
                data.append('is_additional_guest_allowed', 'Yes');
            } else {
                data.append('is_additional_guest_allowed', 'No');
            }
            if ($('#is_smoking_allowed').prop('checked') === true) {
                data.append('is_smoking_allowed', 'Yes');
            } else {
                data.append('is_smoking_allowed', 'No');
            }
            if ($('#is_party_allowed').prop('checked') === true) {
                data.append('is_party_allowed', 'Yes');
            } else {
                data.append('is_party_allowed', 'No');
            }
            if ($('#is_pet_allowed').prop('checked') === true) {
                data.append('is_pet_allowed', 'Yes');
            } else {
                data.append('is_pet_allowed', 'No');
            }
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/configuration/venue/save') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('.add_modal_close').trigger('click');
                    if ($('#id').val() === '') {
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
                                if (key !== 'id' && key !== 'image') {
                                    $('#' + key).after('<span></span>');
                                    $('#' + key).parent().find('label').addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                    });
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

        $(document).on('click', '#add', function () {
            clearAddForm();
            $('#add_form_submit').text('SAVE');
            let openingHourElement = '<div class="row mb-2" id="opening_hour_1"><div class="col"><input name="name_of_day[]" type="text" class="form-control" id="name_of_day_1" placeholder="Name of Day"></div><div class="col"><input name="opening_time[]" type="text" class="form-control" id="opening_time_1" placeholder="Opening Time"></div><div class="col"><input name="closing_time[]" type="text" class="form-control" id="closing_time_1" placeholder="Closing Time"></div></div>'
            $('#opening_hours_container').append(openingHourElement);
            $('#opening_time_1').datetimepicker({
                format:'H:i',
                datepicker: false,
            });
            $('#closing_time_1').datetimepicker({
                format:'H:i',
                datepicker: false,
            });
            $('#add_modal').modal('show').on('shown.bs.modal', function () {
                $('#venue').focus();
            });
            return false;
        });



        $(document).on('click', '.edit', function () {
            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('admin/configuration/venue/get') }}/' + id,
                cache: false,
                success: function (result) {
                    console.log(result);
                    clearAddForm();
                    $('#id').val(id);
                    $('#venue').val(result.venue);
                    $('#type').val(result.type);
                    $('#price_per_hour').val(result.price_per_hour);
                    $('#security_deposit_amount').val(result.security_deposit_amount);
                    $('#number_of_rooms').val(result.number_of_rooms);
                    $('#number_of_seats').val(result.number_of_seats);
                    $('#number_of_guests').val(result.number_of_guests);
                    if (result.cleaning_fee !== 0) {
                        $('#cleaning_fee').val(result.cleaning_fee);
                    }
                    if (result.city_fee !== 0) {
                        $('#city_fee').val(result.city_fee);
                    }
                    if (result.refund_policy !== '---') {
                        $('#refund_policy').val(result.refund_policy);
                    }
                    if (result.image !== '---') {
                        let images = result.image.split(',');
                        let imagePath;
                        $.each(images, function (key, value) {
                            imagePath = '{{ asset('storage') }}/' + value;
                            $('#image_wrapper').append('<div class="row mt-3"><div class="col"><img src="' + imagePath + '" height="100px" width="100%"></div></div>');
                        });
                    }
                    $('#background_color').val(result.background_color);
                    $('#text_color').val(result.text_color);
                    $('#status').val(result.status);
                    if (result.narrative !== '---') {
                        $('#narrative').val(result.narrative);
                    }
                    if (result.are_children_allowed === 'Yes') {
                        $('#are_children_allowed').prop('checked', true);
                    } else {
                        $('#are_children_allowed').prop('checked', false);
                    }
                    if (result.is_additional_guest_allowed === 'Yes') {
                        $('#is_additional_guest_allowed').prop('checked', true);
                    } else {
                        $('#is_additional_guest_allowed').prop('checked', false);
                    }
                    if (result.is_smoking_allowed === 'Yes') {
                        $('#is_smoking_allowed').prop('checked', true);
                    } else {
                        $('#is_smoking_allowed').prop('checked', false);
                    }

                    if (result.is_party_allowed === 'Yes') {
                        $('#is_party_allowed').prop('checked', true);
                    } else {
                        $('#is_party_allowed').prop('checked', false);
                    }

                    if (result.is_pet_allowed === 'Yes') {
                        $('#is_pet_allowed').prop('checked', true);
                    } else {
                        $('#is_pet_allowed').prop('checked', false);
                    }
                    
                    if (result.venue_opening_hours.length > 0) {
                        $.each(result.venue_opening_hours, function (key, venueOpeningHour) {
                            let openingHourElement = '<div class="row mb-2" id="opening_hour_' + (key + 1) + '"><div class="col"><input name="name_of_day[]" type="text" class="form-control" id="name_of_day_' + (key + 1) + '" placeholder="Name of Day" value="' + venueOpeningHour.name_of_day + '"></div><div class="col"><input name="opening_time[]" type="text" class="form-control" id="opening_time_' + (key + 1) + '" placeholder="Opening Time" value="' + venueOpeningHour.opening_time.split(':')[0] + ':' + venueOpeningHour.opening_time.split(':')[1] + '"></div><div class="col"><input name="closing_time[]" type="text" class="form-control" id="closing_time_' + (key + 1) + '" placeholder="Closing Time" value="' + venueOpeningHour.closing_time.split(':')[0] + ':' + venueOpeningHour.closing_time.split(':')[1] + '"></div></div>'
                            $('#opening_hours_container').append(openingHourElement);
                            $('#opening_time_' + (key + 1)).datetimepicker({
                                format:'H:i',
                                datepicker: false,
                            });
                            $('#closing_time_' + (key + 1)).datetimepicker({
                                format:'H:i',
                                datepicker: false,
                            });
                        });
                    } else {
                        let openingHourElement = '<div class="row mb-2" id="opening_hour_1"><div class="col"><input name="name_of_day[]" type="text" class="form-control" id="name_of_day_1" placeholder="Name of Day"></div><div class="col"><input name="opening_time[]" type="text" class="form-control" id="opening_time_1" placeholder="Opening Time"></div><div class="col"><input name="closing_time[]" type="text" class="form-control" id="closing_time_1" placeholder="Closing Time"></div></div>'
                        $('#opening_hours_container').append(openingHourElement);
                        $('#opening_time_1').datetimepicker({
                            format:'H:i',
                            datepicker: false,
                        });
                        $('#closing_time_1').datetimepicker({
                            format:'H:i',
                            datepicker: false,
                        });
                    }

                    $('#add_form_submit').text('UPDATE');
                    $('#add_modal').modal('show').on('shown.bs.modal', function () {
                        $('#venue').focus();
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });


        $(document).on('click', '.delete_image', function () {
            let id = $(this).data('id');
            let imagePath = $(this).data('image_path');
            let data = new FormData();
            data.append('id', id);
            data.append('image_path', imagePath);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/configuration/venue/delete/image') }}',
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
                currentPageUrl = '{{ url('admin/configuration/venue/gets') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>
@endsection
