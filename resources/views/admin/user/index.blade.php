@extends('layouts.admin')
@section('css')

@endsection
@section('title', "Liste des produits Uploadés")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       Bonjour {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}, <br>
                        Vous avez la main de faire tout ce dont vous voulez :)
                    </h2>
                    <hr>
                    <a href="{{ url('/admin/user/create') }}" class="btn btn-raised btn-success btn-sm" title="ajouter utilisateur">
                        <i class="fa fa-plus"></i> Ajouter des comptes
                    </a>
                    <a href="{{ url('/admin/role/create') }}" class="btn btn-raised btn-primary btn-sm" title="Ajouter role">
                        <i class="fa fa-plus"></i> Ajouter des roles
                    </a>
                    <a href="{{ url('/admin/permission/create') }}" class="btn btn-raised btn-info btn-sm" title="ajouter Permission">
                        <i class="fa fa-plus"></i> Ajouter des permission
                    </a>
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
                                <th>Photo </th>
                                <th>Nom d'utilisateur</th>
                                <th>Email</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Section</th>
                                <th>Sexe</th>
                                <th>Pays</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Photo </th>
                                <th>Nom d'utilisateur</th>
                                <th>Email</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Section</th>
                                <th>Sexe</th>
                                <th>Pays</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>@if(isset($item->avatar))
                                            <img class="img-circle" style="width: 64px;height: 64px;" src="{{ asset('avatar/' . $item->avatar) }}" >
                                        @else
                                            <img class="img-circle" style="width: 64px;height: 64px;" src="{{ asset('avatar/gravatar.png') }}" >
                                        @endif</td>

                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->section }}</td>
                                    <td>{{ $item->sexe }}</td>
                                    <td>{{ $item->country }}</td>
                                    <td>{{ $item->getRoleNames() }}</td>
                                    <td>
                                        <a href="{{ url('/admin/user/' . $item->id) }}" title="Affiche utilisateur">
                                            <button class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">remove_red_eye</i>
                                            </button>
                                        </a>
                                        <a href="{{url('/admin/user/' . $item->id . '/edit') }}" title="Editer utilisateur">
                                            <button  class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                        </a>


                                        {!! Form::open([
                                               'method'=>'DELETE',
                                               'url' => ['/admin/user', $item->id],
                                               'style' => 'display:inline'
                                           ]) !!}
                                        {!! Form::button(' <i class="material-icons">delete</i>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => 'Delete user',
                                                'onclick'=>'return confirm("Confirm delete?")'
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

