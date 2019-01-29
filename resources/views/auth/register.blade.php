<!DOCTYPE html>
<!-- saved from url=(0081)https://fezvrasta.github.io/bootstrap-material-design/docs/4.0/examples/checkout/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/logo-img-small.png') }}" type="image/x-icon">

    <title>Agromalimarket | Inscription</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset("admin/plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset("admin/plugins/node-waves/waves.css") }}" rel="stylesheet"/>
    <!-- Bootstrap Select Css -->
    <link href="{{ asset("admin/plugins/bootstrap-select/css/bootstrap-select.css") }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset("admin/plugins/animate-css/animate.css") }}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{ asset("admin/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset('css/country/countrySelect.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mfonts.css') }}">
</head>


<body class="signup-page">
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6o2C-U1vXjo_xGBqJ8Z2RV5AFFpnCJHY&libraries=places"></script>
<script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>

<div class="mdb-map">
    <div id="map" class="map"></div>
</div>
<div class="signup-box">
    <div class="logo">
        <a href="javascript:void(0);">AgroMaliMarket <b>(AMM)</b></a>
        <small>Agromalimarket est basé sur la vente des produits agricoles en ligne</small>
    </div>
    <div class="card">
        <div class="body">
            <a href="{{ route('product.index') }}" class="btn btn-block btn-lg bg-purple waves-effect">
                <i class="material-icons">home</i>
            Accueil</a>
            <hr>
            @if (session('confirmation-success'))
                <div class="alert alert-success">
                    {{ session('confirmation-success') }}
                </div>
            @endif
            @if (session('confirmation-danger'))
                <div class="alert alert-danger">
                    {!! session('confirmation-danger') !!}
                </div>
            @endif
            <form id="sign_up" method="POST" action="{{ route('register') }}">
                <script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>
                @csrf
                <div class="msg">Enregistrer une nouvelle adhésion</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Votre nom d'utilisateur"
                                       required autofocus>
                            </div>
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">email</i>
                            </span>
                            <div class="form-line">
                                <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Votre adresse mail"
                                       required>
                            </div>
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                {{--FirstName and lastName--}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">face</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" placeholder="Votre nom prénom"
                                       required >
                            </div>
                            {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">face</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" placeholder="Votre nom"
                                       required>
                            </div>
                            {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                {{--end firstname and lastname--}}
                {{--Sexe and Section--}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group {{ $errors->has('sexe') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">accessibility</i>
                            </span>
                            <select class="form-control show-tick" data-live-search="true" name="sexe" id="sexe" required="">
                                <option value="" selected>___Votre sexe___</option>
                                <option {{ Request::old('sexe') == "Homme" ? 'selected' :'' }} value="Homme">Homme
                                </option>
                                <option {{ Request::old('sexe') == "Femme" ? 'selected' :'' }} value="Femme">Femme
                                </option>
                                <option {{ Request::old('sexe') == "Démoiselle" ? 'selected' :'' }} value="Démoiselle">
                                    Démoiselle
                                </option>
                            </select>
                            {!! $errors->first('sexe', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group {{ $errors->has('section') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">work</i>
                            </span>
                            <select class="form-control show-tick" data-live-search="true" name="section" id="section" required="">
                                <option value="" selected>___Votre section____</option>
                                <option {{ Request::old('section') == "Revendeur" ? 'selected' :'' }} value="Revendeur">
                                    Revendeur
                                </option>
                                <option {{ Request::old('section') == "Producteur" ? 'selected' :'' }} value="Producteur">
                                    Producteur
                                </option>
                                <option {{ Request::old('section') == "Tranformateur" ? 'selected' :'' }} value="Tranformateur">
                                    Tranformateur
                                </option>
                                <option {{ Request::old('section') == "Acheteur" ? 'selected' :'' }} value="Acheteur">
                                    Acheteur
                                </option>
                            </select>
                            {!! $errors->first('section', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                {{--end Sexe Section--}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                        <i class="material-icons">location_on</i>
                                        </span>
                            <div class="form-line">
                                <input type="text" data-live-search="true" class="form-control" name="country" id="country"
                                       placeholder="Votre pays" value="{{ old('country') }}" required >
                            </div>
                            {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group {{ $errors->has('lat') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                        <i class="material-icons">my_location</i>
                                        </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="lat" id="lat" readonly
                                       placeholder="Votre position" value="{{ old('lat') }}"  >
                            </div>
                            {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group {{ $errors->has('lng') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                        <i class="material-icons">my_location</i>
                                        </span>
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ old('lng') }}" name="lng" id="lng" readonly
                                       placeholder="Votre position" >
                            </div>
                            {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="input-group  {{ $errors->has('about') ? 'has-error' : ''}}">
                            <span class="input-group-addon">
                                <i class="material-icons">description</i>
                            </span>
                            <div class="form-line">
                                <textarea rows="4" name="about" class="form-control no-resize" placeholder="Description de vous que vous voulez mettre...">{{ old('about')}}</textarea>
                            </div>
                            {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" minlength="6" placeholder="Votre mot de passe"
                                       required>
                            </div>
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password_confirmation" minlength="6"
                                       placeholder="Confirmez votre mot de passe " required>
                            </div>
                            {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                    <label for="terms">Je lis et accepte les <a href="javascript:void(0);">conditions d'utilisation</a>.</label>
                </div>

                <button class="btn btn-block btn-lg bg-purple waves-effect" type="submit">INSCRIPTION</button>

                <div class="m-t-25 m-b--5 align-center">
                    <a href="{{ route('login') }}">  <i class="material-icons">lock_open</i> Vous avez déjà un abonnement?</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

 <!-- Bootstrap Core Js -->
    <script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset("admin/plugins/bootstrap/js/bootstrap.js") }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset("admin/plugins/node-waves/waves.js") }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset("admin/plugins/jquery-validation/jquery.validate.js") }}"></script>
    <script src="{{ asset("admin/js/admin.js") }}"></script>
    <script src="{{ asset("admin/js/pages/examples/sign-up.js") }}"></script>

    {{--<script type="text/javascript" src="{{ asset('js/mb.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/social.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/ajaxSearch.min.js') }}"></script>--}}

    <script type="text/javascript" src="{{ asset('js/country/countrySelect.js') }}"></script>

    <script src="{{ asset('js/E/bootstrap-selectpicker.js') }}"></script>
    <script>

        $.get("https://ipinfo.io", function (response) {
            console.log(response.ip, response.country);
        }, "jsonp");
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $("#country").countrySelect({
            //defaultCountry: "jp",
            //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            preferredCountries: ['ml', 'ca', 'gb', 'us']
        });



    </script>




</html>





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Placed at the end of the document so the pages load faster -->
{{--<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>--}}

<!-- Tooltips -->
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>

<!-- Bootstrap core JavaScript -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/js/bootstrap.min.js"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>--}}

{{--<script type="text/javascript" src="{{ asset('js/country/countrySelect.js') }}"></script>--}}
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('js/mb.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('js/social.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/ajaxSearch.min.js') }}"></script>--}}
<!-- Validation Plugin Js -->
{{--<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>--}}


{{--<script async defer--}}
{{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6o2C-U1vXjo_xGBqJ8Z2RV5AFFpnCJHY&callback=initMap">--}}
{{--</script>--}}

<script>

    $.get("https://ipinfo.io", function(response) {
        console.log(response.ip, response.country);
    }, "jsonp");
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    $("#country").countrySelect({
        //defaultCountry: "jp",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['ml', 'ca', 'gb', 'us']
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
    })
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


</body>
</html>