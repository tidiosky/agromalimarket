@extends('layouts.app',['titre' => 'Modification du produit'])
@section('title',"Modification du produit")
@section('content')
    {{--Content--}}
    <div class="card">
        <h3 class="card-header primary-color white-text">Modification du produit</h3>
        <div class="card-body">
            <h4 class="card-title">Modification du produit</h4>
            <form method="post" action="{{ route('product.edit',['id' => $product->id]) }}" enctype="multipart/form-data">

                <input type="hidden" value="{{ Session::token() }}" name="_token">
                <div class="row">
                    <!-- Material input text -->
                    <div class="col-md-12">
                        <div class="md-form {{ $errors->has('nom') ? ' has-error' : '' }}">
                            <i class="fa fa-font prefix grey-text"></i>
                            <input type="text" id="materialFormRegisterNameEx" value="{{ old($product->nom) ?? $product->nom }}" class="form-control"  name="nom">
                            <label for="materialFormRegisterNameEx">Nom produit</label>
                            @if ($errors->has('nom'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form {{ $errors->has('filename') ? ' has-error' : '' }}">
                            <div class="file-field">
                                <div class="btn btn-primary btn-sm float-left">
                                    <span>Choisir votre fichier</span>
                                    <input type="file" name="filename" class="form-control">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" value="{{ old($product->filename) ?? $product->filename }}" type="text"
                                           placeholder="Uploader votre fichier">
                                </div>
                            </div>
                            @if ($errors->has('filename'))
                                <span class="error_text">
                                        <strong>{{ $errors->first('filename') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <!-- Material input quantity -->
                        <div class="md-form{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <i class="fa fa-table prefix grey-text"></i>
                            <input type="text" id="materialFormRegisterEmailEx" class="form-control" value="{{ old($product->quantity) ?? $product->quantity }}" name="quantity">
                            <label for="materialFormRegisterEmailEx">Quantité de production</label>

                            @if ($errors->has('quantity'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form{{ $errors->has('unity') ? ' has-error' : '' }} ">
                            <select class="mdb-select colorful-select dropdown-primary" name="unity"  title="Select your unity">
                                <option value="{{ old($product->unity) ?? $product->unity }}"  selected>{{ old($product->unity) ?? $product->unity }}</option>
                                <option value="Kg">Kg </option>
                                <option value="Tonne">Tonnes </option>
                                <option value="Litre">Litre </option>
                            </select>
                        </div>
                        @if ($errors->has('unity'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('unity') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <!-- Material input price -->
                <div class="md-form{{ $errors->has('prix') ? ' has-error' : '' }}">
                    <i class="fa fa-money prefix grey-text"></i>
                    <input type="number" id="materialFormRegisterConfirmExp" class="form-control" value="{{ old($product->prix) ?? $product->prix }}" name="prix">
                    <label for="materialFormRegisterConfirmEx">prix du produit</label>
                    @if ($errors->has('prix'))
                        <span class="text-danger">
                                        <strong>{{ $errors->first('prix') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="md-form {{ $errors->has('about') ? ' has-error' : '' }}">
                    <i class="fa fa-edit prefix grey-text"></i>
                    <textarea type="text" name="about" id="text2" class="md-textarea md-textarea-auto form-control" rows="2">{{ old($product->about) ?? $product->about }}</textarea>
                    <label for="text2">Description du produit</label>
                    @if ($errors->has('about'))
                        <span class="text-danger">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus "></i> Créer le produit</button>
                </div>
            </form>
            <!-- Material form register -->
        </div>
    </div>
    <!-- Material form register -->


@endsection
@section('sidebar')
@endsection