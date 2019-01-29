@extends('layouts.admin')
@section('css')

@endsection
@section('title', "Modification-".$product->nom)
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <a href="{{ route('admin.pro.create') }}" class="btn btn-raised btn-success btn-sm" title="Add New Product">
                    <i class="material-icons">library_add</i> Ajouter des produits
                </a>
                <a href="{{ route('admin.cat.create') }}" class="btn btn-raised btn-primary btn-sm" title="Add New Product">
                    <i class="material-icons">add_box</i> Ajouter des catégories
                </a>
                <a href="{{ route('admin.unity.create') }}" class="btn btn-raised btn-info btn-sm" title="Add New Product">
                    <i class="material-icons">add_circle</i> Ajouter des unités
                </a>
                <div class="header">
                    <h2>
                        Edition de  Produit #{{ $product->id }}
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
                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-raised btn-warning ">
                                <i class="material-icons">keyboard_backspace</i> Retour</button></a>
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" id="form-product-create" action="{{ route('admin.pro.update', $product->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            @include ('product.products.form', ['formMode' => 'edit'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection