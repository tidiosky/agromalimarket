@extends('layouts.admin')
@section('css')

@endsection
@section('title', $category->name)
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Produit {{ $category->id }}
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
                        <a href="{{ route('admin.pro.create') }}" class="btn btn-raised btn-success btn-sm" title="Add New Product">
                            <i class="material-icons">library_add</i> Ajouter des produits
                        </a>
                        <a href="{{ route('admin.cat.create') }}" class="btn btn-raised btn-primary btn-sm" title="Add New Product">
                            <i class="material-icons">add_box</i> Ajouter des catégories
                        </a>
                        <a href="{{ route('admin.unity.create') }}" class="btn btn-raised btn-info btn-sm" title="Add New Product">
                            <i class="material-icons">add_circle</i> Ajouter des unités
                        </a>
                        <hr>
                        <a href="{{ url('/admin/category') }}" title="Back"><button class="btn btn-raised btn-warning ">
                                <i class="material-icons">keyboard_backspace</i> Retour</button></a>
                        <a href="{{ url('/admin/category/' . $category->id . '/edit') }}" title="Edit Categorie">
                            <button  class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">mode_edit</i>
                            </button>
                        </a>

                        <form method="POST" action="{{ route('admin.cat.destroy',$category->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ csrf_field() }}
                            <button  type="submit" title="Suppression de produit" onclick="return confirm('Vous voulez vraiment supprimer ce fichier')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                        <hr>
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

                                <tr>
                                    <td>{{ $loop->iteration or $category->id }}</td>

                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->user->name }}</td>

                                    <td>
                                        <a href="{{ url('/admin/category/' . $category->id . '/edit') }}" title="Edit categorie">
                                            <button  class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ route('admin.pro.destroy',$category->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button  type="submit" title="Suppression de produit" onclick="return confirm('Vous voulez vraiment supprimer ce fichier')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection