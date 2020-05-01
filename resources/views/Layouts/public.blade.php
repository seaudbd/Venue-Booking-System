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
            background-color: #fdfdfe;
            font-size: 0.9rem;
        }

        ::-webkit-input-placeholder {
            font-size: 11px!important;
        }

        :-moz-placeholder { /* Firefox 18- */
            font-size: 11px!important;
        }
        ::-moz-placeholder {  /* Firefox 19+ */
            font-size: 11px!important;
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


        #logo_wrapper {
            display: flex;


        }

        #logo {
            width: 120px;
            height: 100px;
            margin: auto;
        }

        #header_link {
            padding-top: 15px;

        }

        #header_link a {
            text-decoration: none;
            color: #6c757d;
            font-size: 1rem;

        }

        #social_link {
            padding-top: 15px;
        }
        #social_link i {
            margin-right: 20px;
            color: #6c757d;
            font-size: 1rem;
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



        @media only screen and (max-device-width: 576px) {
            #social_link_wrapper {
                text-align: center;
            }
            #header_link_wrapper {
                text-align: center;
                padding-bottom: 10px;
            }
            #top_nav a {
                font-size: 0.9rem;
            }
        }
        @media only screen and (min-device-width: 576px) {
            #header_link_wrapper {
                text-align: right;
            }
            #social_link_wrapper {
                text-align: left;
            }
        }

        @media only screen and (max-device-width: 446px) {
            #top_nav a {
                font-size: 0.8rem;
            }
        }

        @media only screen and (max-device-width: 416px) {
            #top_nav a {
                font-size: 0.7rem;
            }
        }

    </style>
</head>
<body>
    <div class="container-fluid" style="padding-top: 5px;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto">
                <div class="row">
                    <div class="col-12 col-sm-5" id="social_link_wrapper">
                        <div id="social_link">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>

                        </div>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div id="logo_wrapper">
                            <img src="{{ asset('storage/img/logo.png') }}" id="logo">
                        </div>
                    </div>
                    <div class="col-12 col-sm-5" id="header_link_wrapper">
                        <div id="header_link">
                            @if ($activeNav === 'Log in')
                                <a href="{{ url('login') }}" class="border-bottom border-info">Log in</a>
                            @else
                                <a href="{{ url('login') }}">Log in</a>
                            @endif
                            |
                            @if ($activeNav === 'Registration')
                                <a href="{{ url('registration') }}" class="border-bottom border-info">Register</a>
                            @else
                                <a href="{{ url('registration') }}">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto text-center border-top border-bottom pt-3">
                <div id="top_nav">
                    @if ($activeNav === 'Home')
                        <a href="{{ url('/') }}" class="border-bottom border-info">Home</a>
                    @else
                        <a href="{{ url('/') }}">Home</a>
                    @endif

                    @if ($activeNav === 'Venue Booking')
                        <a href="{{ url('booking') }}" class="border-bottom border-info">Venue Booking</a>
                    @else
                        <a href="{{ url('booking') }}">Venue Booking</a>
                    @endif

                    @if ($page === 'Assembly Booking')
                        <a href="{{ url('contact/Assembly%20Booking') }}" class="border-bottom border-info">Bahá’ís Booking</a>
                    @else
                        <a href="{{ url('contact/Assembly%20Booking') }}">Bahá’ís Booking</a>
                    @endif

                    @if ($page === 'Contact')
                        <a href="{{ url('contact/Contact') }}" class="border-bottom border-info">Contact</a>
                    @else
                        <a href="{{ url('contact/Contact') }}">Contact</a>
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
</body>
</html>
