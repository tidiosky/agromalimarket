<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group input-group-lg  {{ $errors->has('categorie_id') ? 'has-error' : ''}}">
            <span class="input-group-addon">
                <i class="material-icons">keyboard_arrow_down</i>
            </span>
                    <select title="Catégorie" class="form-control show-tick"  name="categorie_id" id="categorie_id" data-live-search="true">
                        <option value="">__Votre categorie__</option>
                        @if(isset($product))
                            @foreach($categories as $category)
                                <option {{ $product->categorie->name == $category->name ? 'selected' : '' }}  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @else
                            @foreach($categories as $category)
                                <option  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>

                    {!! $errors->first('categorie_id', '<p class="help-block">:message</p>') !!}
                </div>
                <span class="input-group-addon">
              <button type="button" id="add-more-categorie" class="btn btn-primary"><i class="material-icons">add</i> Ajouter catégorie</button>
        </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group input-group-lg {{ $errors->has('nom') ? 'has-error' : ''}}">
            <span class="input-group-addon">
                <i class="material-icons">font_download</i>
            </span>
                    <select class="form-control show-tick" id="nom" name="nom"  title="Nom du produit">
                        @if(isset($product))
                            <option value="{{ $product->nom }}" selected>{{ $product->nom }}</option>
                        @endif
                    </select>
                    {{--<div class="form-line">--}}
                    {{--<input type="text" name="nom" class="form-control" autofocus aria-autocomplete="true" placeholder="Nom de votre produit" value="{{ $product->nom or ''}}">--}}
                    {{--</div>--}}
                    {{--{!! $errors->first('nom', '<p class="help-block">:message</p>') !!}--}}
                </div>
                <span class="input-group-addon">
              <button type="button" id="add-more-product_name" class="btn btn-primary"><i class="material-icons">add</i> Ajouter nom produit</button>
        </span>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-lg {{ $errors->has('quantity') ? 'has-error' : ''}}">
            <span class="input-group-addon">
                <i class="material-icons">battery_full</i>
            </span>
                    <select title="La quantité du stock disponible" class="form-control show-tick"   name="quantity" id="quantity" data-live-search="true">
                        @if(isset($product))
                            @for($i= 1 ; $i <= 10000.999 ; $i++)
                                <option {{ $product->quantity == $i ? 'selected' : '' }} value="{{ $i }}"><strong class="text-success">{{ $i }}</strong></option>
                            @endfor
                        @else
                            @for($i= 1 ; $i <= 10000.999 ; $i++)
                                <option  value="{{ $i }}"><strong class="text-success">{{ $i }}</strong></option>
                            @endfor
                        @endif
                    </select>
                    {{--<div class="form-line">--}}
                    {{--<input type="number" name="quantity" title="la quantité du stock disponible" class="form-control " value="{{ $product->quantity or ''}}" placeholder=" la quantité du stock disponible">--}}
                    {{--</div>--}}
                    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
            <div class="col-md-4">
                <div class="input-group input-group-lg  {{ $errors->has('unity_id') ? 'has-error' : ''}}">
            <span class="input-group-addon">
                <i class="material-icons">keyboard_arrow_down</i>
            </span>
                    <select title="Unité du produit" class="form-control show-tick"  name="unity_id" id="unity_id" data-live-search="true">
                        <option value="">__Votre Unitée__</option>

                        @if(isset($product))
                            @foreach($unities as $category)
                                <option {{ $product->unity->name == $category->name ? 'selected' : '' }}  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @else
                            @foreach($unities as $unity)

                                <option value="{{ $unity->id }}">{{ $unity->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    {!! $errors->first('unity_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        {{--@if(isset($product))--}}
            {{--<img src="{{ asset('products/' . $product->filename) }}" alt="" width="100" height="100">--}}
        {{--@endif--}}

        {{--<div class="input-group input-group-lg {{ $errors->has('filename') ? 'has-error' : ''}}">--}}

            {{--<span class="input-group-addon">--}}
                {{--<i class="material-icons">attach_file</i>--}}
            {{--</span>--}}
            {{--<div class="form-line">--}}
                {{--<input type="file" name="filename" id="filename" class="form-control " value="{{ $product->filename or ''}}" >--}}
            {{--</div>--}}
            {{--{!! $errors->first('filename', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}

        <div class="input-group input-group-lg {{ $errors->has('price') ? 'has-error' : ''}}">
            <span class="input-group-addon">
                <i class="material-icons">attach_money</i>
            </span>
            {{--<div class="form-line">--}}
            <select title="Prix du produit" class="form-control show-tick"   name="price" id="price" data-live-search="true">
                @if(!isset($product))
                    @for($i= 1 ; $i <= 10000.999 ; $i++)
                        <option value="{{ $i }}"><strong class="text-success">{{ $i }}</strong></option>
                    @endfor
                @else
                    @for($i= 1 ; $i <= 10000.999 ; $i++)
                        <option {{ $product->price == $i ? 'selected' : '' }} value="{{ $i }}"><strong class="text-success">{{ $i }}</strong></option>
                    @endfor
                @endif
            </select>
            {{--<input type="text" title="le montant du produit" name="price" class="form-control money-dollars" value="{{ $product->price or ''}}" placeholder="Ex: 99999999999,00 $ le montant du produit">--}}
            {{--</div>--}}
            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
        </div>



        <div class="input-group input-group-lg {{ $errors->has('about') ? 'has-error' : ''}}">
    <span class="input-group-addon">
        <i class="material-icons">description</i>
    </span>
            <div class="form-line">
                <textarea rows="4" name="about" class="form-control no-resize" placeholder="Description du produit que vous voulez mettre...">{{ $product->about or ''}}</textarea>
            </div>
            {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <table style="margin: 0 auto;">
                <thead>
                <tr class="info">
                    <td class="student-id">00000</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="photo">
                        @if(isset($product))
                            <img src="{{ asset('products/' . $product->filename) }}" alt="" class="student-photo" id="showPhoto">
                            <input type="file" name="filename" id="photo" accept="image/x-png, image/png, image/jpeg">
                            @else
                            <img src="{{ asset('mapmarket.png') }}" class="student-photo" id="showPhoto" alt="">
                            <input type="file" name="filename" id="photo" accept="image/x-png, image/png, image/jpeg">
                        @endif

                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; background: #ddd;">
                        <input type="button" value="Choisir" class="form-control btn-browse" id="browse_file" name="browse_file">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-group">
    <input class="btn btn-primary btn-lg" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
