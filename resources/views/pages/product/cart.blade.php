@extends('layouts.app')
@section('title',"Panier")
@section('content')
@if(Cart::count() > 0)
    <div class="text-center">

        @if(Cart::count() == 1)
            <h4 class=" btn btn-default btn-round btn-raised">
                Vous avez <strong>{{ Cart::count() }}</strong> produit dans votre panier </h4>
        @else
            <h4 class=" btn btn-success btn-round btn-raised">
                Vous avez <strong>{{ Cart::count() }}</strong> produits dans votre panier</h4>
        @endif

    </div>


    <div class="col-md-12">
        <h4>Table de panier</h4>
     </div>
    <div class="col-lg-12 col-md-12 ml-auto mr-auto font-bold">
        <div class="table-responsive">
            <table class="table table-shopping">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th><strong>Produit</strong></th>
                    <th class="th-description"><strong>Pays D'origine</strong></th>
                    <th class="th-description text-right"><strong>Unité de messure</strong></th>
                    <th class="text-center"><strong>Prix Unitaire</strong></th>
                    <th class="text-center"><strong>Quantité Voulue</strong></th>
                    <th class="text-right"><strong>Stock Disponible </strong></th>
                    <th class="text-right"><strong>Montant</strong></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(Cart::content() as $item)
                <tr>
                    <td>
                        <div class="img-container">
                            <img src="{{ asset('products/'.$item->model->filename) }}" alt="...">
                        </div>
                    </td>
                    <td class="td-name">
                        <a href="#productName"><strong>{{ $item->model->nom }}</strong></a>
                        <br>
                        <small><strong>{{ $item->model->user->shop_name }}</strong></small>
                    </td>
                    <td>
                        <strong>{{ $item->model->user->country }}</strong>
                    </td>
                    <td class="text-center">
                       <strong>{{ $item->model->unity->name }}</strong>
                    </td>
                    <td class="td-number text-center">
                       <strong> <small>$</small>{{ $item->model->price }}</strong>
                    </td>
                    <td class="td-number">
                        <div class="form-group">
                            <select title="Quantité Voulue" class="selectpicker quantity"
                                    data-style="select-with-transition"
                                    data-size="7" tabindex="-98"  data-id="{{ $item->rowId }}" data-productQuantity = {{ $item->model->quantity }} name="" id="quantity">
                                @for($i= 1 ; $i <= $item->model->quantity ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' :'' }}><strong>{{ $i }}</strong></option>
                                @endfor
                            </select>
                        </div>
                    </td>

                    <td class="td-number ">
                        @if($item->model->quantity >= 10)
                            <div class="form-group">
                                <select disabled class="selectpicker text-success  quantity"
                                        data-style="select-with-transition"
                                        data-size="7" tabindex="-98"  data-id="{{ $item->rowId }}" data-productQuantity = {{ $item->model->quantity }} name="" id="quantity">
                                    @for($i= 1 ; $i <= $item->model->quantity ; $i++)
                                        <option class="text-success disabled" selected  aria-selected="true"><strong class="text-success">{{ $i }} {{ $item->model->unity->name }} (s)</strong></option>
                                    @endfor
                                </select>
                            </div>
                        @elseif($item->model->quantity < 4  )
                            <div class="form-group">
                                <select disabled class="selectpicker quantity"
                                        data-style="select-with-transition"
                                        data-size="7" tabindex="-98"  data-id="{{ $item->rowId }}" data-productQuantity = {{ $item->model->quantity }} name="" id="quantity">
                                    @for($i= 1 ; $i <= $item->model->quantity ; $i++)
                                        <option class="btn-success btn disabled" selected  aria-selected="true"><strong class="text-success">{{ $i }} {{ $item->model->unity->name }} (s)</strong></option>
                                    @endfor
                                </select>
                            </div>
                        @else
                            <div class="form-group">
                                <select title="Quantité" disabled class="selectpicker text-warning  quantity"
                                        data-style="select-with-transition"
                                        data-size="7" tabindex="-98"  data-id="{{ $item->rowId }}" data-productQuantity = {{ $item->model->quantity }} name="" id="quantity">
                                    @for($i= 1 ; $i <= $item->model->quantity ; $i++)
                                        <option class="text-success disabled" selected  aria-selected="true"><strong class="text-success">{{ $i }} {{ $item->model->unity->name }} (s)</strong></option>
                                    @endfor
                                </select>
                            </div>
                        @endif

                    </td>

                    <td class="td-number text-center">
                       <strong> <small>$</small>{{ ($item->model->price) * ($item->qty) }}</strong>
                    </td>
                    <td class="td-actions">
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field("DELETE") }}
                            <button rel="tooltip"  data-placement="top" data-original-title="Annuler la commande" title="Annuler la commande" type="submit" class="btn btn-default">X</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">
                    </td>
                    <td class="td-total"  style="font-size: 12px">
                       <strong> Prix HT</strong> <br>
                       <strong> Taxe</strong> <br>
                        <strong> TTC</strong>
                    </td>
                    <td class="td-price text-center" style="font-size: 20px">
                        <strong>$</strong><strong>{{ Cart::subtotal() }}</strong> <br>
                        <strong>$</strong><strong>{{ Cart::tax() }}</strong> <br>
                        <strong class="text-primary">$</strong><strong class="text-primary">{{ Cart::total() }}</strong>
                    </td>

                    <td colspan="3" class="text-right">
                        <a href="{{ route('checkout.index') }}"  class="btn btn-primary btn-round">Terminer Commande  <i class="fa fa-angle-right right"></i></a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
  @else
        <h4 class="text-center text-danger">Votre panier est vide</h4>
@endif
    <!-- Section products -->
    <section>
       <h4>Vous pouvez aussi régarder ici</h4>
        <hr class="blue mb-5">

        <!-- Grid row -->

        <!--Grid row-->


        <!--Grid row-->
        <div class="row">
            @include('pages.product.migh-also-like')
        </div>
        <!--Grid row-->

    </section>
@endsection

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script !src="">
        (function () {
            const classname = document.querySelectorAll('.quantity');
            Array.from(classname).forEach(function (element) {
                element.addEventListener('change',function () {
                    const id = element.getAttribute('data-id');
                    const productQuantity = element.getAttribute('data-productQuantity');
                    axios.patch(`cart/${id}`, {
                        quantity : this.value,
                        productQuantity : productQuantity
                    })
                        .then(function (response) {
                            // console.log(response)
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        })

                });
            });
        }) ();
    </script>
@endsection