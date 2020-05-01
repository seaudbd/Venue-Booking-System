@extends('Layouts.public')

@section('content')


    <div style="height: 10px;"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto" style="padding: 10px 20px;">
                <div class="mb-4 text-center" style="font-size: 120%;">
                    Hornsby Bahá’í Account Log in
                </div>
                <div id="login_form_message" class="text-danger text-center mb-3"></div>
                <input type="hidden" id="password_show_hide_icon_status">
                <form id="login_form">
                    <div class="form-group">
                        <label for="login_id">Email</label>
                        <input name="login_id" type="text" class="form-control" id="login_id">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" id="password">
                            <div class="input-group-append">
                                <span class="input-group-text" style="cursor: pointer;" id="password_show_hide_icon_holder"><i id="password_show_hide_icon" class="fas fa-eye"></i></span>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-5">
                        <div class="col pt-3">
                            <a href="{{ url('forgot/password') }}">Forgot Password?</a>
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col text-center">
                Don't have an account? <a href="{{ url('registration') }}">Create</a> now.
            </div>
        </div>
    </div>

    <script language="JavaScript">
        $(document).ready(function () {
            $('#password_show_hide_icon_status').val(0);
        });

        $(document).on('click', '#password_show_hide_icon_holder', function () {
            let value = parseInt($('#password_show_hide_icon_status').val());
            if (value === 0) {
                $('#password').attr('type', 'text');
                $('#password_show_hide_icon_status').val(1);
                $(this).children('i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $('#password').attr('type', 'password');
                $('#password_show_hide_icon_status').val(0);
                $(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
            return false;

        });

        $('#login_form').submit(function(){
            $('#login_form_message').empty();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('login') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    if (result === 'Authorized Customer Access') {
                        location = '{{ url('customer/dashboard/1') }}';
                    } else {
                        $('#login_form_message').text(result);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        if (xhr.responseJSON.errors.hasOwnProperty('login_id') || xhr.responseJSON.errors.hasOwnProperty('password')) {
                            $('#login_form_message').text('Unauthorized Access!');
                        }
                    }
                }
            });
            return false;
        });
    </script>
@endsection
