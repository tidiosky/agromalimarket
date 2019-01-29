@extends('layouts.app')
@section('title', $shop->section)
@section('content')
    <!-- Image and text -->
    {{--@include('src.shop.nav')--}}
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-pills-rose flex-column">
                <li class="nav-item"><a class="nav-link active show" href="#tab1" data-toggle="tab">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Commandes</a></li>
                <li class="nav-item"><a class="nav-link " href="#tab3" data-toggle="tab">Mes clients</a></li>
            </ul>
        </div>
        <div class="col-md-7">
            <div class="tab-content">
                <div class="tab-pane active show" id="tab1">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4">
                                @include('pages.product_nav')
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="tab2">
                    Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                    <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                </div>
                <div class="tab-pane " id="tab3">
                    Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                    <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h5>En rélation avec</h5>
            @if(!$friends->count())
                <p>Vous n'avez pas d' amis</p>
            @else
                @foreach($friends as $user)
                    <div class="media">
                        <a class="media-left" href="{{ route('pages.shop.show',[$user->section, $user->id]) }}">
                            <div class="input-group-text">
                                @if(isset($user->avatar))
                                    <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('avatar/' . $user->avatar) }}" alt="{{ $user->section }}">
                                @else
                                    <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('gravatar.png') }}" alt="{{ $user->section }}">
                                @endif
                            </div>
                        </a>
                        <div class="media-body">
                            <h6 class="media-heading"><a href="{{ route('pages.shop.show',[$user->section, $user->id]) }}">
                                    @if(isset($user->shop_name))
                                        {{ $user->shop_name }}
                                    @else
                                        {{ $user->section }}-{{ $user->name }}-{{ $user->id }}
                                    @endif
                                </a></h6>
                            <p>
                                <span><i class="fa fa-phone" aria-hidden="true"></i> {{ $user->country }} - {{ $user->phone }}</span>

                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">

        </div>
        <div class="col-md-3">


        </div>
    </div>
@endsection