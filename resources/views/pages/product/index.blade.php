@extends('layouts.app')
@section('title', "Accueil des produits")

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-refine card-plain card-rose">
                <div class="card-body">
                    <div id="accordion" role="tablist">
                        {{--<div class="card card-collapse">--}}
                            {{--<div class="card-header" role="tab" id="headingOne">--}}
                                {{--<h5 class="mb-0">--}}
                                    {{--<a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
                                        {{--Price Range--}}
                                        {{--<i class="fa fa-k" aria-hidden="true"></i>--}}
                                    {{--</a>--}}
                                {{--</h5>--}}
                            {{--</div>--}}
                            {{--<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">--}}
                                {{--<div class="card-body card-refine">--}}
                                    {{--<span id="price-left" class="price-left pull-left" data-currency="€">€101</span>--}}
                                    {{--<span id="price-right" class="price-right pull-right" data-currency="€">€790</span>--}}
                                    {{--<div class="clearfix"></div>--}}
                                    {{--<div id="sliderRefine" class="slider slider-rose noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-origin" style="left: 8.16092%;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" style="z-index: 5;" aria-valuemin="0.0" aria-valuemax="87.4" aria-valuenow="8.2" aria-valuetext="101.00"></div></div><div class="noUi-connect" style="left: 8.16092%; right: 12.6437%;"></div><div class="noUi-origin" style="left: 87.3563%;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" style="z-index: 4;" aria-valuemin="8.2" aria-valuemax="100.0" aria-valuenow="87.4" aria-valuetext="790.00"></div></div></div><div class="noUi-base"><div class="noUi-origin" style="left: 8.16092%;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" style="z-index: 5;" aria-valuemin="0.0" aria-valuemax="87.4" aria-valuenow="8.2" aria-valuetext="101.00"></div></div><div class="noUi-connect" style="left: 8.16092%; right: 12.6437%;"></div><div class="noUi-origin" style="left: 87.3563%;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" style="z-index: 4;" aria-valuemin="8.2" aria-valuemax="100.0" aria-valuenow="87.4" aria-valuetext="790.00"></div></div></div></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Catégories
                                        <i class="material-icons" aria-hidden="true">keyboard_arrow_down</i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-body">

                                    @foreach($categories as $category)
                                        <a href="{{ route('product.indexCat',[$category->id,$category->name]) }}"><strong>{{ $category->name }} @if(isset($produit)) ({{ $produit->categorie()->count() }}) @endif</strong><br></a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree2" aria-expanded="false" aria-controls="collapseThree">
                                        Unité de Mésures
                                        <i class="material-icons" aria-hidden="true">keyboard_arrow_down</i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree2" class="collapse show" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-body">
                                    @foreach($unities as $unity)
                                        <a href="{{ route('product.indexUnit',[$unity->id,$unity->name]) }}"><strong>{{ $unity->name }}</strong><br></a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-9">
            @if(!$products->count())
               <h3 class="text-rose">Aucun produit disponible</h3>
            @else
                <div class="">
                    <section class="well6">
                        <div class="container text-center">
                            {{--@if(isset($categories) and isset($products))--}}
                                {{--<h3>{{ $products->categories->name }}</h3>--}}
                            {{--@endif--}}
                            @if(isset(request()->categorie))
                                <h3>Les {{ request()->categorie }}(s)</h3>
                            @else
                                <h3>Liste des produits</h3>
                            @endif
                            <div class="row">
                                @foreach($products as $product)

                                        <div class="col-md-4">
                                            @include('pages.product_nav')
                                        </div>

                                @endforeach

                                {{--<div class="col-md-3 ml-auto mr-auto">--}}
                                    {{--<button rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="">Load more...</button>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                    </section>

                </div>
                <div class="text-center">
                    {!! $products->render() !!}
                </div>
            @endif
        </div>
    </div>

@endsection
