@extends('layouts.app')
@section('title', "Liste des boutiques")
@section('content')
    <div class="row">
        @foreach($userShop as $user)
            <div class="col-md-4">
                <div class="media">
                    <a class="media-left" href="{{ route('pages.shop.show',[$user->section, $user->id]) }}">
                        <div class="input-group-text">
                            @if(isset($user->avatar))
                                <img class="img-circle" style="border-radius: 100%;width: 100px;height: 110px;" src="{{ asset('avatar/' . $user->avatar) }}" alt="{{ $user->section }}">
                            @else
                                <img class="img-circle" style="border-radius: 100%;width: 100px;height: 110px;" src="{{ asset('gravatar.png') }}" alt="{{ $user->section }}">
                            @endif
                        </div>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('pages.shop.show',[$user->section, $user->id]) }}">
                                @if(isset($user->shop_name))
                                    {{ $user->shop_name }}
                                @else
                                    {{ $user->section }}-{{ $user->name }}-{{ $user->id }}
                                @endif
                            </a></h4>
                        <p>
                            <span><i class="fa fa-phone" aria-hidden="true"></i> {{ $user->country }} - {{ $user->phone }}</span>
                            <br>
                            @if(isset($user->address))
                              <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user->address }}</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection