
<!DOCTYPE html>
<!-- saved from url=(0081)https://fezvrasta.github.io/bootstrap-material-design/docs/4.0/examples/checkout/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>MarketPlace - Paiement</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('material/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('material/dist/css/form-validate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/country/countrySelect.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/intlTelInput.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">--}}
    <script>
        function placesSearch() {
            var input = document.getElementById('city');
            var  autocomplete = new google.maps.places.Autocomplete(input);

            console.log()

        }

    </script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6o2C-U1vXjo_xGBqJ8Z2RV5AFFpnCJHY&libraries=places&callback=placesSearch"  async defer></script>

    <script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <div id="card-errors" role="alert"
             class="text-danger {{ !Session::has('error') }} ? ' hidden' : '' ">{{ Session::get('error') }}</div>

        <a href="{{ route('product.index') }}" class="btn btn-info active"><i class="fa fa-reply-all"></i> Accueil</a>
        <hr>
        <img class="d-block mx-auto mb-4" src="./Checkout example for Bootstrap_files/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Formulaire de Contact</h2>
        <p class="lead bg-dark">Vous pouvez contacter votre fournisseur en douceur via ici.</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">

        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Contact</h4>
            <hr>
            <form class="needs-validation" novalidate="" action="#" id="payment-form" method="post">
                <div id="card-element" class="demo-masked-input">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <textarea type="text" class="form-control" name="address1" value="{{ old('address1') }}" id="address" placeholder="votre commentaire" required=""></textarea>
                        <div class="invalid-feedback">
                           Veuillez remplir ce formulaire
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg active btn-block" type="submit">Contacter  </button>

                </div>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="https://fezvrasta.github.io/bootstrap-material-design/docs/4.0/examples/checkout/#">Privacy</a></li>
            <li class="list-inline-item"><a href="https://fezvrasta.github.io/bootstrap-material-design/docs/4.0/examples/checkout/#">Terms</a></li>
            <li class="list-inline-item"><a href="https://fezvrasta.github.io/bootstrap-material-design/docs/4.0/examples/checkout/#">Support</a></li>
        </ul>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('material/dist/js/jquery.slim.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="{{ asset('material/dist/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('material/dist/js/material-design.min.js') }}"></script>
<script src="{{ asset('material/dist/js/vendor/holder.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/country/countrySelect.js') }}"></script>
<script src="{{ asset('dist/js/intlTelInput.js') }}"></script>
<script src="{{ asset('dist/js/advancedform.js') }}"></script>
<script>
    $.get("https://ipinfo.io", function(response) {
        console.log(response.ip, response.country);
        $("#city").val(response.city)
    }, "jsonp");
    $("#materialFormCardEmailExc").countrySelect({
        defaultCountry: "ml",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['ml','ca', 'gb', 'us']
    });
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
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

<script>
    $("#phone").intlTelInput({
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: "body",
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        // hiddenInput: "full_number",
        // initialCountry: "auto",
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        separateDialCode: true,
        utilsScript: "dist/js/utils.js"
    });
</script>
</body></html>