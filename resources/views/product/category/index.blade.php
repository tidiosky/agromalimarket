@extends('layouts.admin')
@section('css')


    <!-- JQuery DataTable Css -->
    <link href="{{ asset("admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css") }}" rel="stylesheet">

@endsection
@section('title', "Liste des catégories crées")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des catégories de {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                    </h2>
                    <hr>
                    <a href="{{ route('admin.pro.create') }}" class="btn btn-raised btn-success btn-sm" title="Add New Product">
                        <i class="material-icons">library_add</i> Ajouter des produits
                    </a>
                    <a href="{{ route('admin.cat.create') }}" class="btn btn-raised btn-primary btn-sm" title="Add New Product">
                        <i class="material-icons">add_box</i> Ajouter des catégories
                    </a>
                    <a href="{{ route('admin.unity.create') }}" class="btn btn-raised btn-info btn-sm" title="Add New Product">
                        <i class="material-icons">add_circle</i> Ajouter des unités
                    </a>
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
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Autheur</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Autheur</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($category as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->user->name }}</td>

                                    <td>
                                        <a href="{{ url('/admin/category/' . $item->id . '/edit') }}" title="Edit categorie">
                                            <button  class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ route('admin.cat.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button  type="submit" title="Suppression de catégorie" onclick="return confirm('Vous voulez vraiment supprimer ce fichier')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
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


    <script src="{{ asset("admin/js/pages/tables/jquery-datatable.js") }}"></script>


@endsection