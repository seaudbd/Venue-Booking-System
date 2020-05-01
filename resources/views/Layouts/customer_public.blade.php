<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <script src="{{ asset('js/jquery.toaster.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/jquery.datetimepicker.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/jquery.datetimepicker.full.js') }}" type="text/javascript"></script>


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

        ::-webkit-input-placeholder {
            font-size: 13px!important;
        }

        :-moz-placeholder { /* Firefox 18- */
            font-size: 13px!important;
        }
        ::-moz-placeholder {  /* Firefox 19+ */
            font-size: 13px!important;
        }

        .form-control {
            font-size: 0.8rem;
            height: calc(1.75em + .95rem + 2px);
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

        #top_nav {
            margin-bottom: 10px;
            margin-top: -5px;
        }

        #top_nav a {
            text-decoration: none;
            color: #6c757d;
            font-size: 1rem;
            padding-left: 15px;
            padding-right: 15px;

        }


        ul {
            margin:0;
            padding:0;
        }

        ul li {
            list-style-type: none;
            margin-bottom: 20px;
            font-weight: bold;
        }

        ol li {
            list-style-type: decimal-leading-zero;
            margin-bottom: 5px;
            font-weight: normal;
        }

        ol li:first-child {
            margin-top: 10px;
        }

        @media only screen and (min-device-width: 768px) {
            #user_icon_container {
                padding-top: 25px;
                text-align: right;
            }
            #logo_text {
                display: inline;
            }
        }


        @media only screen and (max-device-width: 768px) {
            #user_icon_container {
                text-align: center;
                padding-top: 15px;
                padding-bottom: 10px;
            }
            #logo_wrapper {
                text-align: center;
            }
        }

        @media only screen and (max-device-width: 512px) {
            #top_nav a {
                font-size: 0.9rem;
            }
        }

        @media only screen and (max-device-width: 482px) {
            #top_nav a {
                font-size: 0.8rem;
            }
        }

        @media only screen and (max-device-width: 442px) {
            #top_nav a {
                font-size: 0.7rem;
            }
        }

    </style>
</head>
<body>
<div class="container-fluid" style="padding-top: 5px; padding-bottom: 5px;">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-7" id="logo_wrapper">
                    <img src="{{ asset('storage/img/logo.png') }}" width="70px" height="70px"> <div style="font-size: 120%;" id="logo_text">Hornsby Baha’i Centre of Learning</div>
                </div>
                <div class="col-12 col-sm-12 col-md-5" id="user_icon_container">
                    Welcome! {{ session('name') }} <sup>{{ session('user_status') }}</sup>&emsp;
                    <a href="#" id="user_icon" data-toggle="popover" data-trigger="focus" onclick="return false;">
                        <img src="@if(session('photo') === '---') {{ asset('storage/customer/photo/photo.png') }} @else {{ asset('storage') }}/{{ session('photo') }} @endif" width="25" height="25" class="rounded-circle">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto text-center border-top border-bottom pt-3">
            <div id="top_nav">
                <a href="{{ url('customer/dashboard/1') }}">Dashboard</a>
                @if ($activeNav === 'Venue Booking')
                    <a href="{{ url('customer/booking') }}" class="border-bottom border-info">Venue Booking</a>
                @else
                    <a href="{{ url('customer/booking') }}">Venue Booking</a>
                @endif
                @if ($page === 'Assembly Booking')
                    <a href="{{ url('customer/contact/Assembly%20Booking') }}" class="border-bottom border-info">Bahá’ís Booking</a>
                @else
                    <a href="{{ url('customer/contact/Assembly%20Booking') }}">Bahá’ís Booking</a>
                @endif
                @if ($page === 'Contact')
                    <a href="{{ url('customer/contact/Contact') }}" class="border-bottom border-info">Contact</a>
                @else
                    <a href="{{ url('customer/contact/Contact') }}">Contact</a>
                @endif
            </div>
        </div>
    </div>
</div>
@yield('content')
<div style="height: 30px;"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto text-center" style="padding-top: 15px; padding-bottom: 15px;">
            <div style="font-size: 0.7rem;">19 Dural St, Hornsby NSW 2077, Australia. Phone: +61 2 9475 1110 | Email: hbcl@hornsbybahais.org.au</div>
            <div>All Rights Reserved. Hornsby Bahá’í Centre of Learning &copy; {{ date('Y') }}</div>
        </div>

    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $(document).tooltip({ selector: '[data-toggle=tooltip]' });


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
        content: "<a href='{{ url('customer/logout') }}'>Log out</a>",
        title: '<div>{{ session('name') }}</div>'
    });



</script>
</body>
</html>
