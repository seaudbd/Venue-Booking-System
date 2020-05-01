@extends('Layouts.public')

@section('content')

    <style type="text/css">
        @media only screen and (min-device-width: 768px) {
            #personal_information {
                border-right: 1px solid #dee2e6;
            }
        }
    </style>
    <div style="height: 10px;"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-10 col-lg-8 mx-auto" style="padding: 10px 20px;">
                <div class="mb-4 text-center" style="font-size: 120%;">
                    Get Registered with Hornsby Bahá’í
                </div>
                <form id="registration_form">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6" id="personal_information">
                            <div class="mb-3 border-bottom pb-2" style="font-weight: 500;">Personal Information</div>

                            <div class="form-group">
                                <label for="login_id">Full Name</label>
                                <input name="name" type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input name="company_name" type="text" class="form-control" id="company_name">
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input name="contact_number" type="text" class="form-control" id="contact_number">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="mb-3 border-bottom pb-2" style="font-weight: 500;">Log in Information</div>
                            <div class="form-group">
                                <label for="login_id">Email</label>
                                <input name="login_id" type="text" class="form-control" id="login_id">
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input name="password" type="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                            </div>
                            <div class="row" style="margin-top: 60px;">
                                <div class="col-8 col-sm-9 pt-3">
                                    Already have an account? <a href="{{ url('login') }}">Log in</a> now.
                                </div>
                                <div class="col-4 col-sm-3 text-right">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script language="JavaScript">
        $('#registration_form').submit(function(){
            $('#registration_form').find('.text-danger').removeClass('text-danger');
            $('#registration_form').find('.is-invalid').removeClass('is-invalid');
            $('#registration_form').find('span').remove();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('registration') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    if (result === 'Authorized Access') {
                        location = '{{ url('customer/dashboard/1') }}';
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
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
            });
            return false;
        });
    </script>
@endsection
