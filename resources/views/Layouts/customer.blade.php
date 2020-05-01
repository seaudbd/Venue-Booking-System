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
    <script src="{{ asset('js/jquery.toaster.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/jquery.datetimepicker.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/jquery.datetimepicker.full.js') }}" type="text/javascript"></script>
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
                @if ($activeNav === 'Dashboard')
                    <a href="{{ url('customer/dashboard/1') }}" class="border-bottom border-info">Dashboard</a>
                @else
                    <a href="{{ url('customer/dashboard/1') }}">Dashboard</a>
                @endif

                <a href="{{ url('customer/booking') }}">Venue Booking</a>
                <a href="{{ url('customer/contact/Assembly%20Booking') }}">Bahá’ís Booking</a>
                <a href="{{ url('customer/contact/Contact') }}">Contact</a>
            </div>
        </div>
    </div>
</div>
<div style="height: 10px;"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3">
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
                                    echo "<tr class='treegrid-" . $i . " expanded'><td><a href='" . url($url . '/' . $firstLevelMenu->id) . "' style='color: #A60A67;'>" . $firstLevelMenu->menu . "</a></td></tr>";
                                }
                            } else {
                                if ($firstLevelMenu->method == "") {
                                    echo "<tr class='treegrid-" . $i . "'><td>" . $firstLevelMenu->menu . "</td></tr>";
                                } else {
                                    echo "<tr class='treegrid-" . $i . "'><td><a href='" . url($url . '/' . $firstLevelMenu->id) . "'>" . $firstLevelMenu->menu . "</a></td></tr>";
                                }
                            }
                            $secondLevelMenus = \App\Model\CustomerMenu::where('root_id', $firstLevelMenu->id)->where('status', 'Active')->get();
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
                                                echo "<tr class='treegrid-" . $j . " treegrid-parent-" . $i . " expanded'><td><a href='" . url($url . '/' . $secondLevelMenu->id) . "' style='color: #A60A67;'>" . $secondLevelMenu->menu . "</a></td></tr>";
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
                                    $thirdLevelMenus = \App\Model\CustomerMenu::where('root_id', $secondLevelMenu->id)->where('status', 'Active')->get();
                                    if ( ! empty($thirdLevelMenus)) {
                                        $k = $j + 1;
                                        foreach ($thirdLevelMenus as $thirdLevelMenu) {
                                            $url = implode('/', array_slice(
                                                explode('/', explode(',', $thirdLevelMenu->route)[0]), 0, count(explode('/', explode(',', $thirdLevelMenu->route)[0])) - 1
                                            ));
                                            if (isset($activeSubSubMenuId)) {
                                                if ($thirdLevelMenu->id == $activeSubSubMenuId) {
                                                    echo "<tr class='treegrid-" . $k . " treegrid-parent-" . $j . "'><td><a href='" . url($url . '/' . $thirdLevelMenu->id) . "' style='color: #A60A67;'>" . $thirdLevelMenu->menu . "</a></td></tr>";
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
                <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
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
        content: "<a href='{{ url('customer/logout') }}'>Log out</a>",
        title: '<div>{{ session('name') }}</div>'
    });



</script>
</body>
</html>
