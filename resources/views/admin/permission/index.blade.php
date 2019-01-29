@extends('layouts.admin')
@section('css')

@endsection
@section('title', "Liste des permissions crées")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des permission de {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                    </h2>
                    <hr>
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
                    <a href="{{ url('/admin/permission') }}" title="Back"><button class="btn btn-raised btn-warning ">
                            <i class="material-icons">keyboard_backspace</i> Retour</button></a>
                    <hr>
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

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>

                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($permission as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>{{ $item->name }}</td>


                                    <td>
                                        <a href="{{ url('/admin/permission/' . $item->id . '/edit') }}" title="Edition de permission">
                                            <button  class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                        </a>

                                        {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/permission', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                        {!! Form::button('<i class="material-icons">delete</i>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-circle waves-effect waves-circle waves-float',
                                                'title' => 'Suppression de permission',
                                                'onclick'=>'return confirm("Vous voulez vraiment supprimer ce fichier?")'
                                        )) !!}
                                        {!! Form::close() !!}


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
