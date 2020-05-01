@extends('Layouts.public')

@section('content')

    <div style="height: 10px;"></div>
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto" style="padding: 10px 20px;">
                <div class="mb-4 text-center" style="font-size: 120%;">
                    Reset Forgotten Password
                </div>
                <div id="forgot_password_form_message" class="text-danger text-center mb-3"></div>
                <form id="forgot_password_form">
                    <div class="row">
                        <div class="col">
                            <input name="login_id" type="text" class="form-control" id="login_id" placeholder="Enter Your Email Address Here" style="text-align: center;">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary btn-block" id="forgot_password_form_submit">Go for Resetting</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <div class="modal" id="verification_code_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Verification Code</h4>
                    <button type="button" class="close verification_code_modal_close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" style="padding: 30px 20px 30px 20px;">
                    <div id="verification_code_form_content">
                        <div class="row mb-3">
                            <div class="col text-center">
                                A Verification Code has been sent to Your Email Address. Please Enter that Code Below and Submit for Verification.
                            </div>
                        </div>
                        <div id="verification_code_form_message" class="text-danger text-center mb-3"></div>
                        <div class="row">
                            <div class="col-sm-8 mx-auto">
                                <form id="verification_code_form">
                                    <input type="hidden" id="login_id_for_verification" name="login_id">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            Verification Code
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="verification_code" id="verification_code" class="form-control" placeholder="Verification Code">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary" id="verification_code_form_submit">Verify</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="verification_code_success_content" class="sr-only">
                        <div class="row">
                            <div class="col-sm-8 mx-auto">
                                <form id="reset_password_form">
                                    <input type="hidden" id="login_id_for_reset_password" name="login_id">
                                    <input type="hidden" id="verification_code_for_reset_password" name="verification_code">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary" id="reset_password_form_submit">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="reset_password_success_content" class="sr-only text-center">
                        <div class="row">
                            <div class="col">
                                Your Password has been Reset Successfully.
                            </div>
                        </div>

                        <div class="row" style="margin-top: 30px;">
                            <div class="col">
                                <a href="{{ url('login') }}" class="btn btn-primary">Go to Log in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript">

        $(document).on('submit', '#reset_password_form', function() {
            $('#reset_password_form_submit').attr('disabled', 'disabled');
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('reset/password') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    $('#reset_password_form_submit').removeAttr('disabled');
                    if (result === 'Resetting Password Successful') {
                        $('#reset_password_form').trigger('reset');
                        $('#verification_code_form').trigger('reset');
                        $('#forgot_password_form').trigger('reset');
                        $('#verification_code_form_content').addClass('sr-only');
                        $('#verification_code_success_content').addClass('sr-only');
                        $('#reset_password_success_content').removeClass('sr-only');
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#reset_password_form_submit').removeAttr('disabled');
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


        $(document).on('submit', '#verification_code_form', function() {
            $('#verification_code_form_submit').attr('disabled', 'disabled');
            $('#verification_code_form_message').empty();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('verify/verification/code') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    $('#verification_code_form_submit').removeAttr('disabled');
                    if (result.message === 'Verification Code Verified Successfully') {
                        $('#login_id_for_reset_password').val(result.customer.login_id);
                        $('#verification_code_for_reset_password').val($('#verification_code').val());
                        $('#verification_code_form_content').addClass('sr-only');
                        $('#reset_password_success_content').addClass('sr-only');
                        $('#verification_code_success_content').removeClass('sr-only');
                    } else {
                        $('#verification_code_form_message').text(result.message);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#verification_code_form_submit').removeAttr('disabled');
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        if (xhr.responseJSON.errors.hasOwnProperty('verification_code') || xhr.responseJSON.errors.hasOwnProperty('login_id')) {
                            $('#verification_code_form_message').text('Invalid Verification Code Found!');
                        }
                    }
                }
            });
            return false;
        });


        $(document).on('submit', '#forgot_password_form', function() {
            $('#forgot_password_form_submit').attr('disabled', 'disabled');
            $('#forgot_password_form_message').empty();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('send/verification/code') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    $('#forgot_password_form_submit').removeAttr('disabled');
                    if (result.message === 'Verification Code Sent Successfully') {
                        $('#login_id_for_verification').val(result.customer.login_id);
                        $('#verification_code_form_content').removeClass('sr-only');
                        $('#verification_code_success_content').addClass('sr-only');
                        $('#reset_password_success_content').addClass('sr-only');
                        $('#verification_code_modal').modal('show');
                    } else {
                        $('#forgot_password_form_message').text(result.message);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#forgot_password_form_submit').removeAttr('disabled');
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        if (xhr.responseJSON.errors.hasOwnProperty('login_id')) {
                            $('#forgot_password_form_message').text('Invalid User Name Found!');
                        }
                    }
                }
            });
            return false;
        });
    </script>
@endsection
