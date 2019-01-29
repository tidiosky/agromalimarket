<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ page_title($titre ?? '') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo-img-small.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
{{--    <link href="{{ asset('material/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/materia.css') }}" rel="stylesheet">

    {{--<!-- Bootstrap core CSS -->--}}
    {{--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/country/bootstrap-select.min.css') }}" rel="stylesheet">--}}


    {{--<!-- Material Design Bootstrap -->--}}
    {{--<link href="{{ asset('css/mb.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/country/countrySelect.css') }}" rel="stylesheet">

    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery-validation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/country/bootstrap-select.min.js') }}"></script>

    <style>

        #map {
            height: 100%;
        }

    </style>
@yield('css')
</head>

<body class="contact-page sidebar-collapse">
@yield("map")
@include('layouts.navbar')

<div class="main main-raised">
    <div class="section"><br> <br>
        <div class="container">
            <div class="text-center">
                <h3 class="text-primary"><i class="fa fa-search" aria-hidden="true"></i> Recherche</h3>
                <div class="text-primary">
                    <div class="input-group">
                        <span class="input-group-addon"><button class="btn btn-primary "><i class="fa fa-search"></i></button></span>
                        <input type="text" class="form-control" id="q" name="q" placeholder="Search..." value="{{ request('q') }}">
                    </div>
                </div>
                <span class="fa fa-spinner fa-spin" style="display: none;"  id="spinner"></span>
                <div id="searchList" class="text-info"></div>
            </div>
        </div>
        <div class="container">
            @include('alert_flash_message')
            @yield('content')
        </div>
    </div>
</div>
@yield('js')
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<!-- Tooltips -->
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/country/countrySelect.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('js/mb.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/social.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ajaxSearch.min.js') }}"></script>

@yield('js')


{{--<script async defer--}}
{{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6o2C-U1vXjo_xGBqJ8Z2RV5AFFpnCJHY&callback=initMap">--}}
{{--</script>--}}

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('.mdb-select').material_select();
        toastr.options = {
            "closeButton": true, // true/false
            "debug": false, // true/false
            "newestOnTop": false, // true/false
            "progressBar": false, // true/false
            "positionClass": "toast-top-right",
            "preventDuplicates": false, "onclick": null,
            "showDuration": "300", // in milliseconds
            "hideDuration": "1000", // in milliseconds
            "timeOut": "5000", // in milliseconds
            "extendedTimeOut": "1000", // in milliseconds
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

    });
    $("#materialFormCardEmailExc").countrySelect({
        //defaultCountry: "jp",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['ml','ca', 'gb', 'us']
    });
    // SideNav Initialization
    $(".button-collapse").sideNav();
    geoLocationInit();


</script>
<script>
    var slider = $("#calculatorSlider");
    var developerBtn = $("#developerBtn");
    var corporateBtn = $("#corporateBtn");
    var privateBtn = $("#privateBtn");
    var reseller = $("#resellerEarnings");
    var client = $("#clientPrice");
    // var percentageBonus = 30; // = 30%
    var license = {
        corpo: {
            active: true,
            price: 319,
        },
        dev: {
            active: false,
            price: 149,
        },
        priv: {
            active: false,
            price: 79,
        }
    }

    function calculate(price, value) {
        client.text((Math.round((price - (value / 100 * price)))) + '$');
        reseller.text((Math.round(((percentageBonus - value) / 100 * price))) + '$')
    }

    function reset(price) {
        slider.val(0);
        client.text(price + '$');
        reseller.text((Math.round((percentageBonus / 100 * price))) + '$');
    }
    developerBtn.on('click', function (e) {
        license.dev.active = true;
        license.corpo.active = false;
        license.priv.active = false;
        reset(license.dev.price)
    });
    privateBtn.on('click', function (e) {
        license.dev.active = false;
        license.corpo.active = false;
        license.priv.active = true;
        reset(license.priv.price);
    });
    corporateBtn.on('click', function (e) {
        license.dev.active = false;
        license.corpo.active = true;
        license.priv.active = false;
        reset(license.corpo.price);
    });
    slider.on("input change", function (e) {
        if (license.priv.active) {
            calculate(license.priv.price, $(this).val());
        } else if (license.corpo.active) {
            calculate(license.corpo.price, $(this).val());
        } else if (license.dev.active) {
            calculate(license.dev.price, $(this).val());
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>