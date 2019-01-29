@extends('layouts.admin')
@section('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset("admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css") }}" rel="stylesheet">

@endsection
@section('title', "Liste des produits Uploadés")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des produits de {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
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
                                <th>Photo </th>
                                <th>Nom</th>
                                <th>Autheur</th>
                                <th>Prix</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Photo </th>
                                <th>Nom</th>
                                <th>Autheur</th>
                                <th>Prix</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($products as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td><img src="{{ asset('products/'.$item->filename) }}" style="width: 64px;height: 64px;" alt=""></td>

                                    <td>{{ $item->nom }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->price }}</td>
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

@endsection