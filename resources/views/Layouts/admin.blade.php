<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Asraf Ud Duha">
    <meta name="author-email" content="seaudbd@gmail.com">
    <meta name="author-contact-number" content="+8801558141557">
    <meta name="author-contact-address" content="Dhaka, Bangladesh">
    <link rel="shortcut icon" href="{{ asset('storage/img/favicon.ico') }}" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <link href="{{ asset('css/font-awesome.all.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('css/jquery.treegrid.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/jquery.treegrid.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.toaster.js') }}" type="text/javascript"></script>


    <link href="{{ asset('css/jquery.datetimepicker.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/jquery.datetimepicker.full.js') }}" type="text/javascript"></script>


    <link href="{{ asset('css/bootstrap-clockpicker.min.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-clockpicker.min.js') }}" type="text/javascript"></script>


    <link href="{{ asset('css/main.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/daygrid/main.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/timegrid/main.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/main.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/daygrid/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/timegrid/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap/main.js') }}" type="text/javascript"></script>

    <style type="text/css">

        body {
            font-size: .9rem;
            background-color: #fdfdfe;
        }

        .table td, .table th {
            padding: .25rem;
        }

        ::-webkit-input-placeholder {
            font-size: 13px!important;
        }

        :-moz-placeholder { /* Firefox 18- */
            font-size: 13px!important;
        }
        ::-moz-placeholder {  /* Firefox 19+ */
            font-size: 13px!important;
        }

        .btn-sm {
            padding: .5rem .5rem;
            line-height: 1;
            font-size: .75rem;
        }

        .form-control {
            height: calc(1.5em + .75rem + 2px);
            padding: .35rem .5rem;
            font-size: .75rem;
        }
        .form-group label {
            font-size: .75rem;
        }

        .btn-outline-secondary {
            height: calc(2rem + 0.0625rem);
            padding: 0.5rem .75rem;
            font-size: .65rem;
            margin-top: -0.0525rem;
        }

        .input-group-text {
            padding: .175rem .75rem;
        }

        .fc-toolbar h2 {
            font-size: 1rem;
        }

        .fc-event {
            font-size: 0.7rem;
            line-height: 1;
        }

        .fc-time-grid-event .fc-time, .fc-time-grid-event .fc-title {
            padding: 1px;
        }

        .fc-time {
            text-align: right;
        }

        .fc-title {
            margin-top: -10px;
        }

        .btn_default {
            background-color: #A60A67;
            color: white;
        }

        .text_default {
            color: #A60A67;
        }

        .text_blue {
            color: blue;
        }

        .modal_95 {
            max-width: 95% !important;
        }

        .modal_ninety {
            max-width: 90% !important;
        }

        .modal_eighty {
            max-width: 80% !important;
        }
        .modal_seventy {
            max-width: 70% !important;
        }
        .modal_sixty {
            max-width: 60% !important;
        }
        .modal_fifty {
            max-width: 50% !important;
        }
        .pagination_active {
            background-color: #A60A00;
        }

        .wrapper {
            position: relative;
            width: 50px;
            max-width: 50px;
            height: 50px;
            display: inline-block;
        }

        .image {
            display: block;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            width: 50px;
            opacity: 0;
            transition: .3s ease;
            background-color: red;
        }

        .wrapper:hover .overlay {
            opacity: 1;
        }

        .icon {
            color: white;
            font-size: 32px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .fa-user:hover {
            color: #eee;
        }

        .ajax_loading_modal {
            display:    none;
            position:   fixed;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            z-index: 9999;
            background: rgba( 255, 255, 255, .8 )
            url('{{ asset('storage/img/ajax-loader.gif') }}')
            50% 50%
            no-repeat;
        }

        @media only screen and (min-device-width: 768px) {
            #user_icon_container {
                padding-top: 25px;
            }
        }


    </style>
</head>
<body>
<div class="container-fluid" style="background-color: #ffffff; padding-top: 5px; padding-bottom: 5px;">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6">
            <img src="{{ asset('storage/img/logo.png') }}" width="70px" height="70px"> <span style="font-size: 120%;">Hornsby Baha’i Centre of Learning</span>
        </div>
        <div class="col-12 col-sm-12 col-md-6 text-right" id="user_icon_container">
            <a href="#" id="user_icon" data-toggle="popover" data-trigger="focus" onclick="return false;">
                <img src="@if(session('photo') === '---') {{ asset('storage/user/photo/photo.png') }} @else {{ asset('storage') }}/{{ session('photo') }} @endif" width="25" height="25" class="rounded-circle">
            </a>
        </div>
    </div>
</div>
<div style="height: 10px;"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">

            <table class="table table-bordered tree-basic" id="left_navigation">
                <tbody>
                <?php
                $i = 1;
                foreach ($firstLevelMenus as $firstLevelMenu) {
                    $url = implode('/', array_slice(
                        explode('/', explode(',', $firstLevelMenu->route)[0]), 0, count(explode('/', explode(',', $firstLevelMenu->route)[0])) - 1
                    ));
                    if ($firstLevelMenu->id == $activeMenuId) {
                        if ($firstLevelMenu->method == "") {
                            echo "<tr class='treegrid-" . $i . " expanded'><td>" . $firstLevelMenu->menu . "</td></tr>";
                        } else {
                            echo "<tr class='treegrid-" . $i . " expanded' style='background-color: #A60A67;'><td><a href='" . url($url . '/' . $firstLevelMenu->id) . "' style='color: #ffffff;'>" . $firstLevelMenu->menu . "</a></td></tr>";
                        }
                    } else {
                        if ($firstLevelMenu->method == "") {
                            echo "<tr class='treegrid-" . $i . "'><td>" . $firstLevelMenu->menu . "</td></tr>";
                        } else {
                            echo "<tr class='treegrid-" . $i . "'><td><a href='" . url($url . '/' . $firstLevelMenu->id) . "'>" . $firstLevelMenu->menu . "</a></td></tr>";
                        }
                    }
                    $secondLevelMenus = \App\Model\Menu::where('root_id', $firstLevelMenu->id)->where('status', 'Active')->get();
                    if ( ! empty($secondLevelMenus)) {
                        $j = $i + 1;
                        foreach ($secondLevelMenus as $secondLevelMenu) {
                            $url = implode('/', array_slice(
                                explode('/', explode(',', $secondLevelMenu->route)[0]), 0, count(explode('/', explode(',', $secondLevelMenu->route)[0])) - 1
                            ));
                            if (isset($activeSubMenuId)) {
                                if ($secondLevelMenu->id == $activeSubMenuId) {
                                    if ($secondLevelMenu->method == "") {
                                        echo "<tr class='treegrid-" . $j . " treegrid-parent-" . $i . " expanded'><td>" . $secondLevelMenu->menu . "</td></tr>";
                                    } else {
                                        echo "<tr class='treegrid-" . $j . " treegrid-parent-" . $i . " expanded' style='background-color: #A60A67;'><td><a href='" . url($url . '/' . $secondLevelMenu->id) . "' style='color: #ffffff;'>" . $secondLevelMenu->menu . "</a></td></tr>";
                                    }
                                } else {
                                    if ($secondLevelMenu->method == "") {
                                        echo "<tr class='treegrid-" . $j . " treegrid-parent-" . $i . "'><td>" . $secondLevelMenu->menu . "</td></tr>";
                                    } else {
                                        echo "<tr class='treegrid-" . $j . " treegrid-parent-" . $i . "'><td><a href='" . url($url . '/' . $secondLevelMenu->id) . "'>" . $secondLevelMenu->menu . "</a></td></tr>";
                                    }
                                }
                            } else {
                                if ($secondLevelMenu->method == "") {
                                    echo "<tr class='treegrid-" . $j . " treegrid-parent-" . $i . "'><td>" . $secondLevelMenu->menu . "</td></tr>";
                                } else {
                                    echo "<tr class='treegrid-" . $j . " treegrid-parent-" . $i . "'><td><a href='" . url($url . '/' . $secondLevelMenu->id) . "'>" . $secondLevelMenu->menu . "</a></td></tr>";
                                }
                            }
                            $thirdLevelMenus = \App\Model\Menu::where('root_id', $secondLevelMenu->id)->where('status', 'Active')->get();
                            if ( ! empty($thirdLevelMenus)) {
                                $k = $j + 1;
                                foreach ($thirdLevelMenus as $thirdLevelMenu) {
                                    $url = implode('/', array_slice(
                                        explode('/', explode(',', $thirdLevelMenu->route)[0]), 0, count(explode('/', explode(',', $thirdLevelMenu->route)[0])) - 1
                                    ));
                                    if (isset($activeSubSubMenuId)) {
                                        if ($thirdLevelMenu->id == $activeSubSubMenuId) {
                                            echo "<tr class='treegrid-" . $k . " treegrid-parent-" . $j . "' style='background-color: #A60A67;'><td><a href='" . url($url . '/' . $thirdLevelMenu->id) . "' style='color: #ffffff;'>" . $thirdLevelMenu->menu . "</a></td></tr>";
                                        } else {
                                            echo "<tr class='treegrid-" . $k . " treegrid-parent-" . $j . "'><td><a href='" . url($url . '/' . $thirdLevelMenu->id) . "'>" . $thirdLevelMenu->menu . "</a></td></tr>";
                                        }
                                    } else {
                                        echo "<tr class='treegrid-" . $k . " treegrid-parent-" . $j . "'><td><a href='" . url($url . '/' . $thirdLevelMenu->id) . "'>" . $thirdLevelMenu->menu . "</a></td></tr>";
                                    }
                                    $k++;
                                }
                            }
                            if ( ! isset($k)) {
                                $j++;
                            } else {
                                $j = $k;
                                unset($k);
                            }
                        }
                    }
                    if ( ! isset($j)) {
                        $i++;
                    } else {
                        $i = $j + 1;
                        unset($j);
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="col-sm-9">
            @yield('content')
        </div>
    </div>
</div>
<div style="margin-bottom: 150px;"></div>
<div class="container-fluid fixed-bottom" style="padding-top: 15px; padding-bottom: 15px;">
    <div class="row">
        <div class="col text-center">
            Hornsby Baha’i Centre of Learning &copy; {{ date('Y') }}
        </div>
    </div>
</div>

<div class="modal" id="change_password_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close change_password_modal_close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" style="padding: 30px 50px 30px 50px;">
                <div class="row">
                    <div class="col">
                        <div id="change_password_form_message" class="text-center"></div>
                        <form id="change_password_form">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input name="current_password" type="password" class="form-control" id="current_password" placeholder="Current Password">
                            </div>
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
                                    <button type="submit" class="btn btn-primary" id="change_password_form_submit">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ajax_loading_modal">

</div>

<script type="text/javascript">

    $body = $("body");
    $(document).on({
        ajaxStart: function() {
            $body.addClass("loading");
            $('body.loading .ajax_loading_modal').css({
                'overflow': 'hidden',
                'display': 'block'
            });
        },
        ajaxStop: function() {
            $('body.loading .ajax_loading_modal').css({
                'overflow': 'visible',
                'display': 'none'
            });
            $body.removeClass("loading");
        }
    });

    $(document).ready(function () {

        $(document).tooltip({ selector: '[data-toggle=tooltip]' });

        $('#left_navigation').treegrid();
        $('#left_navigation').find('td').attr('style', 'cursor:pointer;');

        $('.modal').modal({
            backdrop: 'static',
            keyboard: true,
            show: false
        });

        $.datepicker.setDefaults({
            dateFormat: 'dd-MM-yy',
            changeMonth: true,
            changeYear: true
        });


        $('.modal').on("hidden.bs.modal", function (e) {
            if ($('.modal:visible').length) {
                $('body').addClass('modal-open');
            }
        });
    });

    $('#user_icon').popover({
        html: true,
        placement: 'bottom',
        content: "<a href='{{ url('admin/logout') }}'>Log out</a><br><a href='#' id='change_password'>Change Password</a>",
        title: '<div>{{ session('name') }}</div>'
    });

    $(document).on('click', '#change_password', function () {
        $('#change_password_modal').modal('show');
        return false;
    });

    $(document).on('submit', '#change_password_form', function () {
        $('#change_password_form_message').empty();
        $('#change_password_form').find('.text-danger').removeClass('text-danger');
        $('#change_password_form').find('.is-invalid').removeClass('is-invalid');
        $('#change_password_form').find('span').remove();
        $('#change_password_form_submit').attr('disabled', 'disabled');
        let formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            method: 'post',
            url: '{{ url('admin/change/password') }}',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (result) {
                console.log(result);
                $('#change_password_form_submit').removeAttr('disabled');
                if (result === 'Password Changed Successfully') {
                    $('#change_password_form').trigger('reset');
                    $('.change_password_modal_close').trigger('click')
                    $.toaster({ title: 'Success', priority : 'success', message : result });
                } else {
                    $('#change_password_form_message').removeClass('text-success').addClass('text-danger').text(result);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                $('#change_password_form_submit').removeAttr('disabled');
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
</body>
</html>
