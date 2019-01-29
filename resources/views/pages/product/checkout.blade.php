
{{--<!DOCTYPE html>--}}
{{--<!-- saved from url=(0081)https://fezvrasta.github.io/bootstrap-material-design/docs/4.0/examples/checkout/ -->--}}
{{--<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">--}}

    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
    {{--<meta name="description" content="">--}}
    {{--<meta name="author" content="">--}}
    {{--<link rel="icon" href="#">--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--<link rel="icon" href="{{ asset('images/logo-img-small.png') }}" type="image/x-icon">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"--}}
          {{--type="text/css">--}}
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">--}}
    {{--<title>Agromalimarket | Paiement</title>--}}
    {{--<!--     Fonts and icons     -->--}}

    {{--<style>--}}
        {{--body {--}}
            {{--font-family: 'Roboto', sans-serif;--}}
            {{--background-color: #eeeeee;--}}
        {{--}--}}
    {{--</style>--}}
    {{--<!-- CSS Files -->--}}
    {{--<!-- Bootstrap core CSS -->--}}
    {{--<link rel="stylesheet" href="{{ asset('css/materia.css') }}">--}}
{{--    <link href="{{ asset('material/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">--}}
    {{--<link href="{{ asset('material/dist/css/stripe.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/country/countrySelect.css') }}" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="{{ asset('dist/css/intlTelInput.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">--}}
    {{--<script src="https://js.stripe.com/v3/"></script>--}}
    {{--<script>--}}
        {{--function placesSearch() {--}}
            {{--var input = document.getElementById('city');--}}
            {{--var  autocomplete = new google.maps.places.Autocomplete(input);--}}

            {{--var input1 = document.getElementById('address');--}}
            {{--var  autocomplete = new google.maps.places.Autocomplete(input1);--}}

            {{--console.log()--}}

        {{--}--}}

    {{--</script>--}}
    {{--<style>--}}
        {{--.StripeElement {--}}
            {{--background-color: white;--}}

            {{--padding: 16px 16px;--}}

            {{--border: 1px solid transparent;--}}
            {{--box-shadow: 0 1px 3px 0 #e6ebf1;--}}
            {{---webkit-transition: box-shadow 150ms ease;--}}

        {{--}--}}
        {{--#card-errors{--}}
            {{--color: #fa755a;--}}
        {{--}--}}

        {{--.StripeElement--focus {--}}
            {{--box-shadow: 0 1px 3px 0 #cfd7df;--}}
        {{--}--}}

        {{--.StripeElement--invalid {--}}
            {{--border-color: #fa755a;--}}
        {{--}--}}

        {{--.StripeElement--webkit-autofill {--}}
            {{--background-color: #fefde5 !important;--}}
        {{--}--}}
    {{--</style>--}}
    {{--<script type="text/javascript"--}}
            {{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6o2C-U1vXjo_xGBqJ8Z2RV5AFFpnCJHY&libraries=places&callback=placesSearch"  async defer></script>--}}

    {{--<script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>--}}
{{--</head>--}}
{{--<style>--}}
    {{--/*body{*/--}}
        {{--/*background-color: #eeeeee;*/--}}
    {{--/*}*/--}}
{{--</style>--}}
{{--<body class="index-page" >--}}
{{--@include('layouts.navbar')--}}
{{--<div class="">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="card card-signup">--}}
                    {{--<h2 class="card-title text-center">Paiement</h2>--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6 mr-auto">--}}
                                {{--<form novalidate class="form" id="payment-form" action="{{ route('checkout.store') }}" method="POST">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<div class="form-group">--}}
                                        {{--<div class="input-group">--}}
                                            {{--<div class="input-group-prepend">--}}
											{{--<span class="input-group-text">--}}
													{{--<i class="material-icons" aria-hidden="true">face</i>--}}
											{{--</span>--}}
                                            {{--</div>--}}
                                            {{--<input type="text" name="name" id="name" class="form-control" placeholder="Votre nom...">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group">--}}
                                        {{--<div class="input-group">--}}
                                            {{--<div class="input-group-prepend">--}}
											{{--<span class="input-group-text">--}}
													{{--<i class="material-icons" aria-hidden="true">email</i>--}}
											{{--</span>--}}
                                            {{--</div>--}}
                                            {{--<input type="email" id="email" name="email" class="form-control" placeholder="Email...">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                        {{--<div class="input-group">--}}
                                            {{--<div class="input-group-prepend">--}}
											{{--<span class="input-group-text">--}}
													{{--<i class="material-icons" aria-hidden="true">location_on</i>--}}
											{{--</span>--}}
                                            {{--</div>--}}
                                            {{--<input type="text" class="form-control" name="address"  id="address" placeholder="Votre adresse de livraison ex : 123 Saitn rue 12" required="">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row">--}}
                                       {{--<div class="col-md-6">--}}
                                           {{--<div class="form-group">--}}

                                               {{--<input type="text" class="form-control" name="phone"  id="phone" placeholder="EX:74-74-91-31" required="">--}}
                                           {{--</div>--}}
                                       {{--</div>--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<input type="text" class="form-control" readonly name="country" id="country" placeholder="Nom de votre carte" required>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                        {{--<div class="input-group">--}}
                                            {{--<div class="input-group-prepend">--}}
											{{--<span class="input-group-text">--}}
													{{--<i class="material-icons" aria-hidden="true">credit_card</i>--}}
											{{--</span>--}}
                                            {{--</div>--}}
                                            {{--<input type="text" class="form-control" name="name_on_card" id="name_on_card" placeholder="Nom de votre carte" required>                                        </div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group">--}}
                                        {{--<div id="card-element">--}}
                                            {{--<!-- A Stripe Element will be inserted here. -->--}}
                                        {{--</div>--}}

                                        {{--<!-- Used to display form errors. -->--}}
                                        {{--<div id="card-errors" role="alert"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-check">--}}
                                        {{--<label class="form-check-label">--}}
                                            {{--<input class="form-check-input" type="checkbox" value="" checked>--}}
                                            {{--<span class="form-check-sign">--}}
											{{--<span class="check"></span>--}}
										{{--</span>--}}
                                            {{--J'accepte les <a href="#something">termes et condition conditions</a>.--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="text-center">--}}
                                        {{--<button class="btn btn-success btn-round" type="submit">Passer la commande</button>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6 ml-auto">--}}
                                {{--<h4 class="d-flex justify-content-between align-items-center mb-3">--}}
                                    {{--<span class="text-muted">Votre panier</span>--}}
                                    {{--<span class="text-muted">Quantité</span>--}}
                                    {{--<span class="badge badge-secondary badge-pill">{{ Cart::instance('default')->count() }}</span>--}}
                                {{--</h4>--}}
                                {{--<hr>--}}
                                {{--<ul class="list-group mb-3">--}}
                                    {{--@foreach(Cart::content() as $item)--}}
                                        {{--<li class="list-group-item d-flex justify-content-between lh-condensed">--}}
                                            {{--<div>--}}
                                                {{--<div class="img-container">--}}
                                                    {{--<img src="{{ asset('products/'.$item->model->filename) }}" style="width: 100px;" alt="...">--}}
                                                {{--</div>--}}
                                                {{--<p class="my-0">{{ $item->model->nom }}</p>--}}

                                                {{--<small class="text-muted">{{ $item->model->description }}</small>--}}
                                            {{--</div>--}}
                                            {{--<h6 class="my-0">X{{ $item->qty }}</h6>--}}
                                            {{--<span class="text-muted">${{ $item->model->price }}</span>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                    {{--<li class="list-group-item d-flex justify-content-between bg-light">--}}
                                    {{--<div class="text-success">--}}
                                    {{--<h6 class="my-0">Promo code</h6>--}}
                                    {{--<small>EXAMPLECODE</small>--}}
                                    {{--</div>--}}
                                    {{--<span class="text-success">-${{ Cart::total() }}</span>--}}
                                    {{--</li>--}}
                                        {{--<hr>--}}
                                    {{--<li class="list-group-item d-flex justify-content-between">--}}
                                        {{--<span>Prix Ht (USD)</span>--}}
                                        {{--<span>${{ Cart::subtotal() }}</span>--}}
                                    {{--</li>--}}
                                    {{--<li class="list-group-item d-flex justify-content-between">--}}
                                       {{--<span> Taxe (USD)</span>--}}
                                       {{--<span> ${{ Cart::tax() }}</span>--}}
                                    {{--</li>--}}
                                    {{--<li class="list-group-item d-flex justify-content-between">--}}
                                        {{--<span>Total ttc(USD)</span>--}}
                                        {{--<span>${{ Cart::total() }}</span>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</div>--}}
{{--<script>--}}

    {{--$(function () {--}}
        {{--$('#payment-form').validate({--}}
            {{--// highlight: function (input) {--}}
            {{--//     console.log(input);--}}
            {{--//     $(input).parents('.form-line').addClass('error');--}}
            {{--// },--}}
            {{--// unhighlight: function (input) {--}}
            {{--//     $(input).parents('.form-line').removeClass('error');--}}
            {{--// },--}}
            {{--// errorPlacement: function (error, element) {--}}
            {{--//     $(element).parents('.mb-form').append(error);--}}
            {{--// }--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
{{--<!-- Bootstrap core JavaScript--}}
{{--================================================== -->--}}
{{--<!-- Placed at the end of the document so the pages load faster -->--}}
{{--<!-- Placed at the end of the document so the pages load faster -->--}}
{{--<script src="{{ asset('material/dist/js/jquery.slim.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
{{--<script src="{{ asset('material/dist/js/vendor/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('material/dist/js/material-design.min.js') }}"></script>--}}
{{--<script src="{{ asset('material/dist/js/vendor/holder.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/country/countrySelect.js') }}"></script>--}}
{{--<script src="{{ asset('dist/js/intlTelInput.js') }}"></script>--}}
{{--<script src="{{ asset('js/stripeJS.js') }}"></script>--}}
{{--<script>--}}
    {{--$.get("https://ipinfo.io", function(response) {--}}
        {{--console.log(response.ip, response.country);--}}
        {{--$("#city").val(response.city)--}}
    {{--}, "jsonp");--}}

    {{--$.getJSON('http://gd.geobytes.com/GetCityDetails?callback=?', function(data) {--}}
        {{--console.log(JSON.stringify(data, null, 3));--}}

        {{--$('#country').val(data.geobytescountry);--}}
        {{--// $("#country").countrySelect({--}}
        {{--//     defaultCountry: data.geobytestitle,--}}
        {{--//     //initialCountry: "auto",--}}
        {{--//     //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],--}}
        {{--//     preferredCountries: [data.geobytestitle]--}}
        {{--// });--}}
    {{--});--}}
{{--</script>--}}
{{--<script>--}}
    {{--// Example starter JavaScript for disabling form submissions if there are invalid fields--}}
    {{--(function() {--}}
        {{--'use strict';--}}

        {{--window.addEventListener('load', function() {--}}
            {{--// Fetch all the forms we want to apply custom Bootstrap validation styles to--}}
            {{--var forms = document.getElementsByClassName('needs-validation');--}}

            {{--// Loop over them and prevent submission--}}
            {{--var validation = Array.prototype.filter.call(forms, function(form) {--}}
                {{--form.addEventListener('submit', function(event) {--}}
                    {{--if (form.checkValidity() === false) {--}}
                        {{--event.preventDefault();--}}
                        {{--event.stopPropagation();--}}
                    {{--}--}}
                    {{--form.classList.add('was-validated');--}}
                {{--}, false);--}}
            {{--});--}}
        {{--}, false);--}}
    {{--})();--}}
{{--</script>--}}

{{--<script>--}}
    {{--$("#phone").intlTelInput({--}}
        {{--// allowDropdown: false,--}}
        {{--// autoHideDialCode: false,--}}
         {{--autoPlaceholder: "true",--}}
        {{--// dropdownContainer: "body",--}}
        {{--// excludeCountries: ["us"],--}}
        {{--// formatOnDisplay: false,--}}
        {{--geoIpLookup: function(callback) {--}}
          {{--$.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {--}}
            {{--var countryCode = (resp && resp.country) ? resp.country : "";--}}
            {{--callback(countryCode);--}}
          {{--});--}}
        {{--},--}}
        {{--// hiddenInput: "full_number",--}}
        {{--//initialCountry: "auto",--}}
        {{--// nationalMode: false,--}}
        {{--// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],--}}
        {{--placeholderNumberType: "MOBILE",--}}
         {{--preferredCountries: ['ml','cn', 'jp'],--}}
        {{--separateDialCode: true,--}}
        {{--utilsScript: "dist/js/utils.js"--}}
    {{--});--}}
    {{--$.ajaxSetup({--}}
        {{--headers: {--}}
            {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}

@extends('layouts.app')
@section('title', "Paiement de produit")
@section('content')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        function placesSearch() {
            var input = document.getElementById('city');
            var autocomplete = new google.maps.places.Autocomplete(input);

            var input1 = document.getElementById('address');
            var autocomplete = new google.maps.places.Autocomplete(input1);

            console.log()

        }

    </script>
    <style>
        .StripeElement {
            background-color: white;

            padding: 16px 16px;

            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;

        }

        #card-errors {
            color: #fa755a;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6o2C-U1vXjo_xGBqJ8Z2RV5AFFpnCJHY&libraries=places&callback=placesSearch"
            async defer></script>

    <script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-12">
                <div class="">
                    <h2 class="card-title text-center">Paiement</h2>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 mr-auto">
                                <form novalidate class="form" id="payment-form" action="{{ route('checkout.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
											<span class="input-group-text">
													<i class="material-icons" aria-hidden="true">face</i>
											</span>
                                            </div>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Votre nom...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
											<span class="input-group-text">
													<i class="material-icons" aria-hidden="true">email</i>
											</span>
                                            </div>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
											<span class="input-group-text">
													<i class="material-icons" aria-hidden="true">location_on</i>
											</span>
                                            </div>
                                            <input type="text" class="form-control" name="address"  id="address" placeholder="Votre adresse de livraison ex : 123 Saitn rue 12" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            <i class="material-icons" aria-hidden="true">phone</i>
                                                    </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="phone" id="phone"
                                                           placeholder="EX:74-74-91-31" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            <i class="material-icons" aria-hidden="true">location_on</i>
                                                    </span>
                                                    </div>
                                                <input type="text" class="form-control" readonly name="country" id="country" placeholder="Nom de votre carte" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
											<span class="input-group-text">
													<i class="material-icons" aria-hidden="true">credit_card</i>
											</span>
                                            </div>
                                            <input type="text" class="form-control" name="name_on_card" id="name_on_card" placeholder="Nom de votre carte" required>                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" required type="checkbox" value="" checked>
                                            <span class="form-check-sign">
											<span class="check"></span>
										</span>
                                            J'accepte les <a href="#something">termes et condition conditions</a>.
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-success btn-round" type="submit">Passer la commande</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <strong class="text-success">Votre panier</strong>
                                    <strong class="text-success">Quantité</strong>
                                    <strong class="badge badge-success badge-pill">{{ Cart::instance('default')->count() }}</strong>
                                </h4>
                                <hr>
                                <ul class="list-group mb-3">
                                    @foreach(Cart::content() as $item)
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <div class="img-container">
                                                    <img src="{{ asset('products/'.$item->model->filename) }}" style="width: 50px;" alt="...">
                                                </div>
                                                <small class="text-primary">{{ $item->model->nom }}</small>

                                                <strong class="text-muted">{{ $item->model->description }}</strong>
                                            </div>
                                            <h6 class="text-success">X{{ $item->qty }}</h6>
                                            <strong class="text-success">${{ $item->model->price }}</strong>
                                        </li>
                                    @endforeach
                                    {{--<li class="list-group-item d-flex justify-content-between bg-light">--}}
                                    {{--<div class="text-success">--}}
                                    {{--<h6 class="my-0">Promo code</h6>--}}
                                    {{--<small>EXAMPLECODE</small>--}}
                                    {{--</div>--}}
                                    {{--<span class="text-success">-${{ Cart::total() }}</span>--}}
                                    {{--</li>--}}
                                    {{--<hr>--}}
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Prix Ht (USD)</strong>
                                        <strong>${{ Cart::subtotal() }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong> Taxe (USD)</strong>
                                        <strong> ${{ Cart::tax() }}</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Total ttc(USD)</strong>
                                        <strong class="text-success">${{ Cart::total() }}</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/stripeJS.js') }}"></script>
    <script>
        $.getJSON('http://gd.geobytes.com/GetCityDetails?callback=?', function(data) {
            console.log(JSON.stringify(data, null, 3));

            $('#country').val(data.geobytescountry);
            // $("#country").countrySelect({
            //     defaultCountry: data.geobytestitle,
            //     //initialCountry: "auto",
            //     //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            //     preferredCountries: [data.geobytestitle]
            // });
        });
    </script>
@endsection

