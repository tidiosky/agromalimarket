@extends('layouts.app',['titre' => 'Panier'])
@section('content')
    @if(Session::has('cart'))


    <!-- Main Container -->
    <div class="container">

        <section class="section my-5 pb-5">

            <!-- Shopping Cart table -->
            <div class="table-responsive">

                <table class="table product-table">

                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th></th>
                        <th class="font-weight-bold">
                            <strong>Produit</strong>
                        </th>
                        <th></th>
                        <th class="font-weight-bold">
                            <strong>Prix unitaire</strong>
                        </th>
                        <th class="font-weight-bold">
                            <strong>Quantité</strong>
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <!-- /.Table head -->

                    <!-- Table body -->
                    <tbody>

                    <!-- First row -->


                    <!-- Third row -->
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">

                            <img src="{{ asset('products/'.$product['item']['filename']) }}" width="125px" height="100px" alt="" class="img-fluid z-depth-0">
                        </th>
                        <td>
                            <h5 class="mt-3">
                                <strong>{{ $product['item']['nom'] }}</strong>
                            </h5>
                            <p class="">source : {{ $product['item']['user']['country'] }}</p>
                        </td>
                        <td></td>
                        <td><strong>
                                <div>&nbsp;</div>
                                <button class="" data-toggle="tooltip" data-placement="top" title="Prix unitaire du produit">${{ $product['item']['prix']}}</button></strong></td>
                        <td class="text-center text-md-left">
                            <span class="qty">{{ $product['quantity'] }} </span>
                            <div class="btn-group radio-group ml-2">
                                <a href="{{ route('article.reduce',['id' => $product['item']['id']]) }}"
                                   data-toggle="tooltip" data-placement="top" title="Dimunuer d'une quantité"
                                   class="btn btn-raised btn-primary">&mdash;</a>
                                <a href="{{ route('article.AddItem',['id' => $product['item']['id']]) }}"
                                   data-toggle="tooltip" data-placement="top" title="Augmenter d'une quantité"
                                   class="btn btn-raised btn-primary">+</a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group radio-group ml-2">
                                <a href="{{ route('article.removeItem',['id' => $product['item']['id']]) }}" class="btn btn-success btn-raised"
                                   data-toggle="tooltip" data-placement="top" title="Annuler cette commande">X</a>
                            </div>

                        </td>
                    </tr>
                    <!-- /.Third row -->
                    @endforeach
                    <!-- Fourth row -->
                    <tr>
                        <td colspan="3"></td>
                        <td>
                            <h4 class="mt-2">
                                <strong>Total</strong>
                            </h4>
                        </td>
                        <td class="text-right">
                            <h4 class="mt-2">
                                <strong>${{ $totalPrice}} </strong>
                            </h4>
                        </td>
                        <td colspan="3" class="text-right">
                            <a href="{{ route('article.checkout') }}"  class="btn btn-primary btn-raised btn-lg">Terminer le payement
                                <i class="fa fa-angle-right right"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- Fourth row -->

                    </tbody>
                    <!-- /.Table body -->

                </table>

            </div>
            <!-- Shopping Cart table -->

        </section>

        <div class="row">
            @include('pages.product.migh-also-like')
        </div>

    </div>
    <!-- /Main Container -->


    @else
       <div class="text-center">
           <h3>Panier vide</h3>
           <a href="{{ route('shop.index') }}" class="btn btn-primary btn-raised btn-lg">
               <i class="fa fa-fighter-jet"></i> Aller dans E-Shop
           </a>
       </div>
    @endif
@endsection
@section('content')

@endsection
@section('sidebar')@endsection
