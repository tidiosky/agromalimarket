@extends('layouts.admin',['titre' => 'Création de produit'])
@section('title',"Création de produit")
@section('content')
    {{--Content--}}
    <div class="card">
        <h3 class="card-header primary-color white-text">Création de produit</h3>
        <div class="card-body">
            <h4 class="card-title">Création de produit</h4>
            <form method="post" action="{{ route('product.create') }}" enctype="multipart/form-data">

                <input type="hidden" value="{{ Session::token() }}" name="_token">
               <div class="row">
                   <div class="col-md-12">
                       <div class="">
                           <div class="md-form form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                               <i class="fa fa-font prefix grey-text"></i>
                               <input type="text" id="materialFormRegisterNameEx" placeholder="Nom du produit" class="form-control" value="{{ old('nom') }}" name="nom">
                               @if ($errors->has('nom'))
                                   <span class="text-danger">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>
                   </div>
                   <div class="col-md-12">
                       <div class="">
                           <div class="md-form form-group{{ $errors->has('filename') ? ' has-error' : '' }}">
                               <input type="file" name="filename" class="form-control">
                               @if ($errors->has('filename'))
                                   <span class="error_text">
                                        <strong>{{ $errors->first('filename') }}</strong>
                                    </span>
                               @endif
                           </div>
                       </div>
                   </div>
               </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <i class="fa fa-table prefix grey-text"></i>
                            <input type="text" placeholder="Quantite du produit" id="materialFormRegisterEmailEx" class="form-control" value="{{ old('quantity') }}" name="quantity">
                             @if ($errors->has('quantity'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form{{ $errors->has('unity_id') ? ' has-error' : '' }} ">
                            <select class="custom-select  dropdown-primary" name="unity_id"  title="Select your unity">
                                <option value="" class="disabled">_____Selectionez Unite____</option>
                                @foreach($unities as $unity => $key)
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('unity_id'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('unity_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <label for="">Unite</label>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form{{ $errors->has('categorie_id') ? ' has-error' : '' }} ">
                            <select class="custom-select  dropdown-primary" name="categorie_id"  title="Select your unity">
                                <option value="" class="disabled">_____Selectionez Categorie____</option>
                                @foreach($categories as $categorie => $keys)
                                    <option value="{{ $keys->id }}">{{ $keys->name }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('categorie_id'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('categorie_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <label for="">Categorie</label>
                    </div>
                </div>

                <!-- Material input price -->
                <div class="md-form{{ $errors->has('prix') ? ' has-error' : '' }}">
                    <i class="fa fa-money prefix grey-text"></i>
                    <input type="number" placeholder="prix uitaire du produit" id="materialFormRegisterConfirmExp" class="form-control" value="{{ old('prix') }}" name="prix">
                    @if ($errors->has('prix'))
                        <span class="text-danger">
                                        <strong>{{ $errors->first('prix') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="md-form {{ $errors->has('about') ? ' has-error' : '' }}">
                    <i class="fa fa-edit prefix grey-text"></i>
                    <textarea type="text" placeholder="Description du produit" name="about" id="text2" class="md-textarea md-textarea-auto form-control" rows="2">{{ old('about') }}</textarea>

                    @if ($errors->has('about'))
                        <span class="text-danger">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary active" type="submit"><i class="fa fa-plus "></i> Créer le produit</button>
                </div>
            </form>
            <!-- Material form register -->
        </div>
    </div>
    <!-- Material form register -->


@endsection
@section('sidebar')
@endsection