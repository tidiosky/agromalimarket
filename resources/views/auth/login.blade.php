
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Connexion | AgroMaliMarket - vente en ligne</title>
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

<body class="login-page">
<div class="login-box">
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
            <form id="sign_in" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="msg">Connectez-vous pour commencer votre session</div>
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
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value="remember-me" id="remember-me" class="filled-in chk-col-pink">
                        <label for="remember-me">Se souvenir de moi</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-purple waves-effect" type="submit">Connexion</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="{{ route('register') }}"> <i class="material-icons">person_add</i> Inscrivez-vous!</a>
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="{{ route('password.request') }}"><i class="material-icons">hearing</i> Mot de passe oublié ?</a>
                    </div>
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
<script src="{{ asset("admin/js/pages/examples/sign-in.js") }}"></script>
</body>

</html>


