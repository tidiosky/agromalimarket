@extends('layouts.admin')
@section('css')
@endsection
@section('title','Modification '.$user->name)
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">


                <div class="mdb-map">
                    <div id="map" class="map"></div>
                </div>
                <a href="{{ url('/admin/user/create') }}" class="btn btn-raised btn-success btn-sm" title="ajouter utilisateur">
                    <i class="material-icons">library_add</i> Ajouter des comptes
                </a>
                <a href="{{ url('/admin/role/create') }}" class="btn btn-raised btn-primary btn-sm" title="Ajouter role">
                    <i class="material-icons">add_box</i> Ajouter des roles
                </a>
                <a href="{{ url('/admin/permission/create') }}" class="btn btn-raised btn-info btn-sm" title="ajouter Permission">
                    <i class="material-icons">add_circle</i> Ajouter des permission
                </a>
                <hr>

                <div class="header">
                    <h2>
                        Edition d'utlisateur #{{ $user->id }}
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-raised btn-warning ">
                                <i class="material-icons">keyboard_backspace</i> Retour</button></a>
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>
                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/user', $user->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.user.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <!-- Jquery Core Js -->
    <script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset("admin/plugins/bootstrap/js/bootstrap.js") }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset("admin/plugins/bootstrap-select/js/bootstrap-select.js") }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset("admin/plugins/jquery-slimscroll/jquery.slimscroll.js") }}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset("admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js") }}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{ asset("admin/plugins/dropzone/dropzone.js") }}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{ asset("admin/plugins/jquery-inputmask/jquery.inputmask.bundle.js") }}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ asset("admin/plugins/multi-select/js/jquery.multi-select.js") }}"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset("admin/plugins/jquery-spinner/js/jquery.spinner.js") }}"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset("admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js") }}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{ asset("admin/plugins/nouislider/nouislider.js") }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset("admin/plugins/node-waves/waves.js") }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset("admin/js/admin.js") }}"></script>
    <script src="{{ asset("admin/js/pages/forms/advanced-form-elements.js") }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset("admin/js/demo.js") }}"></script>
    <script type="text/javascript" src="{{ asset('js/country/countrySelect.js') }}"></script>
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
@endsection
