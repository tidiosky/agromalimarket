

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Mot de passe oublier |Agromamalimarket</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('images/logo-img-small.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mfonts.css') }}">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset("admin/plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset("admin/plugins/node-waves/waves.css") }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset("admin/plugins/animate-css/animate.css") }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset("admin/css/style.css") }}" rel="stylesheet">
</head>

<body class="fp-page">
<div class="fp-box">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="logo">
        <a href="javascript:void(0);">AgroMaliMarket <b>(AMM)</b></a>
        <small>Agromalimarket est basé sur la vente des produits agricoles en ligne</small>
    </div>
    <div class="card">
        <div class="body">
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
            <form id="forgot_password" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="msg">
                    Entrez votre adresse email que vous avez utilisé pour vous inscrire. Nous vous enverrons un email avec votre nom d'utilisateur et un lien pour réinitialiser votre mot de passe.
                </div>
                <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">email</i>
                            </span>
                    <div class="form-line">
                        <input type="email" class="form-control" value="{{ old('email') }}" autofocus name="email" placeholder="Votre adresse mail"
                               required>
                    </div>
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>

                <button class="btn btn-block btn-lg bg-purple waves-effect" type="submit">REINITIALISE MON MOT DE PASSE</button>

                <div class="row m-t-20 m-b--5 align-center">
                    <a href="{{ route('register') }}"><i class="material-icons">person_add</i> Inscrivez-vous!</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset("admin/plugins/bootstrap/js/bootstrap.js") }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset("admin/plugins/node-waves/waves.js") }}"></script>

<!-- Validation Plugin Js -->
<script src="{{ asset("admin/plugins/jquery-validation/jquery.validate.js") }}"></script>

<!-- Custom Js -->
<script src="{{ asset("admin/js/admin.js") }}"></script>
<script src="{{ asset("admin/js/pages/examples/forgot-password.js") }}"></script>
</body>

</html>