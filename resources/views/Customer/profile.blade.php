@extends('Layouts.customer')

@section('content')
    <style type="text/css">
        @media only screen and (min-device-width: 1200px) {
            #profile_information {
                border-right: 1px solid #dee2e6;
            }
        }
    </style>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8" id="profile_information">
            <div class="card border-0">
                <div class="mb-4 text-center" style="font-size: 120%;">Profile Information</div>
                <div class="card-body">
                    <form id="profile_information_form">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <img style="width: 100%; height:175px;" id="photo">
                                    <input type="file" name="photo" onchange="readImageURL(this);" style="width:97%; position: absolute; left: 0; margin-left: 0px; height:235px; opacity: 0;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-8">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="Contact Number">
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-primary" id="profile_information_form_submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
            <div class="card border-0">
                <div class="mb-4 text-center" style="font-size: 120%;">Update Password</div>
                <div class="card-body">
                    <form id="password_update_from">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-primary" id="password_update_form_submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function readImageURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#photo').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            let photo = '{{ $customer->photo }}';
            let name = '{{ $customer->name }}';
            let email = '{{ $customer->email }}';
            let contactNumber = '{{ $customer->contact_number }}';
            if (photo === '---') {
                photo = '{{ asset('storage/customer/photo/photo.png') }}';
            } else  {
                photo = '{{ asset('storage') }}/' + photo;
            }
            $('#photo').attr('src', photo);
            $('#name').val(name);
            $('#email').val(email);
            if (contactNumber !== '---') {
                $('#contact_number').val(contactNumber);
            }

        });

        $(document).on('submit', '#profile_information_form', function () {

            $('#profile_information_form_submit').attr('disabled', 'disabled');
            $('#profile_information_form').find('.text-danger').removeClass('text-danger');
            $('#profile_information_form').find('.is-invalid').removeClass('is-invalid');
            $('#profile_information_form').find('span').remove();

            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('customer/update/profile/information') }}',
                data: data,
                processData: false,
                contentType: false,
                success: function (result) {
                    console.log(result);
                    $('#profile_information_form_submit').removeAttr('disabled');
                    $.toaster({ title: 'Success', priority : 'success', message : result });
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#profile_information_form_submit').removeAttr('disabled');
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                $('#' + key).after('<span></span>');
                                $('#' + key).parent().find('label').addClass('text-danger');
                                $('#' + key).addClass('is-invalid');
                                $.each(value, function (k, v) {
                                    $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                });

                            });
                        }
                    }

                }
            });
            return false;
        });

        $(document).on('submit', '#password_update_from', function () {

            $('#password_update_form_submit').attr('disabled', 'disabled');
            $('#password_update_from').find('.text-danger').removeClass('text-danger');
            $('#password_update_from').find('.is-invalid').removeClass('is-invalid');
            $('#password_update_from').find('span').remove();

            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('customer/update/password') }}',
                data: data,
                processData: false,
                contentType: false,
                success: function (result) {
                    console.log(result);
                    $('#password_update_form_submit').removeAttr('disabled');
                    $('#password_update_from').trigger('reset');
                    $.toaster({ title: 'Success', priority : 'success', message : result });
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#password_update_form_submit').removeAttr('disabled');
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                $('#' + key).after('<span></span>');
                                $('#' + key).parent().find('label').addClass('text-danger');
                                $('#' + key).addClass('is-invalid');
                                $.each(value, function (k, v) {
                                    $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                });

                            });
                        }
                    }

                }
            });
            return false;
        });
    </script>
@endsection
