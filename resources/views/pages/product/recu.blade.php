@extends('layouts.admin')
@section('css')
    <!-- Bootstrap Core Css -->
    <link href="{{ asset("admin/plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset("admin/plugins/node-waves/waves.css") }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset("admin/plugins/animate-css/animate.css") }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset("admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css") }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset("admin/css/style.css") }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset("admin/css/themes/all-themes.css") }}" rel="stylesheet" />
@endsection
@section('title', "Liste des produits Uploadés")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <strong>Facture de {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} </strong>
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th><strong>Product</strong></th>
                                <th class="th-description"><strong>Pays D'origine</strong></th>
                                <th class="th-description text-right"><strong>Unité de messure</strong></th>
                                <th class="text-center"><strong>Prix Unitaire</strong></th>
                                <th class="text-right"><strong>Quantité Disponible Stock</strong></th>
                                <th class="text-right"><strong>Montant</strong></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><strong>Product</strong></th>
                                <th class="th-description"><strong>Pays D'origine</strong></th>
                                <th class="th-description text-right"><strong>Unité de messure</strong></th>
                                <th class="text-center"><strong>Prix Unitaire</strong></th>
                                <th class="text-right"><strong>Quantité Disponible Stock</strong></th>
                                <th class="text-right"><strong>Montant</strong></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td><img src="{{ asset('products/'.$item->filename) }}" style="width: 64px;height: 64px;" alt=""></td>

                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->montant }}</td>
                                    <td>
                                        <a href="{{ url('admin/product/' . $item->id) }}" title="View Product">
                                            <button class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">remove_red_eye</i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin.pro.edit',$item->id) }}" title="Edit Product">
                                            <button  class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ route('admin.pro.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button  type="submit" title="Suppression de produit" onclick="return confirm('Vous voulez vraiment supprimer ce fichier')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset("admin/plugins/node-waves/waves.js") }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset("admin/plugins/jquery-datatable/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js") }}"></script>
    <script src="{{ asset("admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/jquery-datatable/extensions/export/jszip.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js") }}"></script>
    <script src="{{ asset("admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js") }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset("admin/js/admin.js") }}"></script>
    <script src="{{ asset("admin/js/pages/tables/jquery-datatable.js") }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset("admin/js/demo.js") }}"></script>
@endsection