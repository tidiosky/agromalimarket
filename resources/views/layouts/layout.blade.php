<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@GroMalimarket | @yield('title')</title>
<link rel="icon" href="{{ asset('images/logo-img-small.png') }}" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
      type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="{{ asset('css/materia.css') }}" rel="stylesheet">
{{--<link href="{{ asset('css/materialdashbord.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('ECommerce/material/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">--}}
<link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
<link rel="stylesheet" href="{{ asset('css/mfonts.css') }}">
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>
<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
<link href="{{ asset('css/country/countrySelect.css') }}" rel="stylesheet">
@section('css') @endsection
@toastr_css
<body class="index-page ">
@include('layouts.navbar')
@yield("map")
<div class="main main-raised">
    <div class="section"><br> <br>
        <div class="container">
            <div class="text-center">

                <h3 class="text-primary"><i class="fa fa-search" aria-hidden="true"></i> Recherche</h3>
                <div class="text-primary">
                    <div class="input-group">
                        <span class="input-group-addon"><button class="btn btn-primary "><i class="material-icons">search</i></button></span>
                        <input type="text" class="form-control" id="q" name="q" placeholder="Recherche..." value="{{ request('q') }}">
                    </div>
                </div>
                <span class="fa fa-spinner fa-spin" style="display: none;"  id="spinner"></span>
                <div id="searchList" class="text-info"></div>
            </div>
        </div>
        <div class="container">
            {{--            @include('alert_flash_message')--}}
            @yield('content')
        </div>
    </div>
</div>
@if(isset($mighAlsoLike) and isset($product))
    @foreach($mighAlsoLike as $product)
        @include('pages.product_modal') @endforeach
    <script>
        const path_product = '{{ route('pages.product.show',$product->slug) }}'
    </script>
@endif
@if(isset($products) and isset($product))
    @foreach($products as $product)
        @include('pages.product_modal') @endforeach
    <script>
        const path_url_comment = '{{ route('product.comment.store',$product->id) }}';
        const path_product = '{{ route('pages.product.show',$product->slug) }}'
    </script>
@endif
<footer class="footer footer-black footer-big">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <h5>À propos de nous</h5>
                    <p>Le Mali regorge de potentiel agricole important. Acheteur et vendeur se rencontrent peu, sauf à l’occasion de salon nationaux et internationaux Cette approche revient cher et ne garantit pas forcément des échanges commerciaux. Lorsque les contacts se nouent, ils ne se transforment pas en business réel et leur suivi est faible.</p>
                </div>
                <div class="col-md-4">
                    <h5>Social Feed</h5>
                    <div class="social-feed">
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>How to handle ethical disagreements with your clients.</p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>The tangible benefits of designing at 1x pixel density.</p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-facebook-square"></i>
                            <p>A collection of 25 stunning sites that you can use for inspiration.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Instagram Feed</h5>
                    <div class="gallery-feed">
                        <img  src="{{ asset('images/2.png') }}" class="img img-raised rounded" alt="">
                        <img  src="{{ asset('images/2.png') }}" class="img img-raised rounded" alt="">
                        <img  src="{{ asset('images/2.png') }}" class="img img-raised rounded" alt="">
                        <img  src="{{ asset('images/2.png') }}" class="img img-raised rounded" alt="">
                        <img  src="{{ asset('images/2.png') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('images/2.png') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('images/1.png') }}" class="img img-raised rounded" alt="">
                        <img src="{{ asset('gravatar.png') }}" class="img img-raised rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <ul class="float-left">
            <li>
                <a href="#pablo">
                    Blog
                </a>
            </li>
            <li>
                <a href="#pablo">
                    Presentation
                </a>
            </li>
            <li>
                <a href="#pablo">
                    Discover
                </a>
            </li>
            <li>
                <a href="#pablo">
                    Payment
                </a>
            </li>
            <li>
                <a href="#pablo">
                    Contact Us
                </a>
            </li>
        </ul>
        <div class="copyright float-right">
            Copyright ©
            2018
        </div>
    </div>
</footer>
@jquery
@toastr_js
@toastr_render
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/E/popper.js') }}"></script>
<script src="{{ asset('js/E/bootstrap-material-design.min.js') }}"></script>
<!-- Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('js/E/moment.min.js') }}"></script>
<!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('js/E/bootstrap-selectpicker.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/E/jasny-bootstrap.min.js') }}"></script>

<!-- Plugin for Small Gallery in Product Page -->
<script src="{{ asset('js/E/jquery.flixel.js') }}"></script>

<!-- Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset('js/E/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/E/nouislider.min.js') }}"></script>

<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{ asset('js/E/material-kit.min.js') }}"></script>
<!--   Core JS Files   -->
<script src="{{ asset('js/jquery.timeago.js') }}"></script>
<script src="{{ asset('js/jquery.timeago.fr.js') }}"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/E/jasny.js') }}"></script>
<!--	Plugin for Small Gallery in Product Page -->
<script src="{{ asset('js/E/jquery.flixel.js') }}"></script>

<!-- Plugins for presentation and navigation  -->
<script src="{{ asset('js/E/modernizn.js') }}"></script>

<script src="{{ asset('js/like.js') }}"></script>
@section('js')@endsection
<script>
    (function () {

    })();
    (function () {
        $("time.timeago").timeago();
    })();

</script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="{{ asset('js/country/countrySelect.js') }}"></script>
<script src="{{ asset('js/models.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>
<script>
    $(document).ready(function() {

        var slider2 = document.getElementById('sliderRefine');

        noUiSlider.create(slider2, {
            start: [101, 790],
            connect: true,
            range: {
                'min': [30],
                'max': [900]
            }
        });

        var limitFieldMin = document.getElementById('price-left');
        var limitFieldMax = document.getElementById('price-right');

        slider2.noUiSlider.on('update', function(values, handle) {
            if (handle) {
                limitFieldMax.innerHTML = $('#price-right').data('currency') + Math.round(values[handle]);
            } else {
                limitFieldMin.innerHTML = $('#price-left').data('currency') + Math.round(values[handle]);
            }
        });
    });
</script>
@yield('js')



<script>

    $("#materialFormCardEmailExc").countrySelect({
        //defaultCountry: "jp",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['ml','ca', 'gb', 'us']
    });


    //Search for article

</script>
<script>
    const path_url_search_prod = '{{ route('search_pro') }}';
    const path_url_search_user = '{{ route('search_path') }}';
    {{--const urlLike = '{{ route('like') }}';--}}
</script>
</body></html>