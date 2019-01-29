@extends('layouts.admin')
@section('css')

@endsection
@section('title', "Modification-".$permission->name)

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
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
                <div class="header">
                    <h2>
                        Edition de  Produit #{{ $permission->id }}
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
                        <a href="{{ url('/admin/permission') }}" title="Back"><button class="btn btn-raised btn-warning ">
                                <i class="material-icons">keyboard_backspace</i> Retour</button></a>
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($permission, [
                            'method' => 'PATCH',
                            'url' => ['/admin/permission', $permission->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.permission.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
