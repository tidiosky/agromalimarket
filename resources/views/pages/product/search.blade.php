@if($products->count() <= 1)
    <strong class="text-info">{{ $products->count() }} produit trouvé du mot "{{ Request::input('q') }}"</strong>
    @else
    <strong class="text-info">{{ $products->count() }} produits trouvés du mot "{{ Request::input('q') }}"</strong>
@endif

<div class="row">
    @if(!$products->count())
        <strong class="text-danger">Aucun resultat du mot "{{ Request::input('q') }}"</strong>
    @else
        @foreach($products as $product)
            @if($product->quantity > 0 )
                <div class="col-md-2">
                    <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                        <div class="card-header card-header-image">
                            <a href="{{ route('pages.product.show',$product->slug) }}">
                                <img src="{{ asset('products/'.$product->filename) }}" style="width: 100%;height: 100px;" alt="...">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('pages.product.show',$product->slug) }}">
                                <h4 class="card-title">{{ $product->nom }}</h4>
                            </a>
                            {{--<p class="description">--}}
                                {{--{{ str_limit($product->about,30) }}--}}
                            {{--</p>--}}
                            <span> Boutique : <a href="{{ route('profile.index',['name' => $product->user->name]) }}">
                                    @if(isset($product->user->shop_name))
                                        {{ $product->user->shop_name }}
                                    @else
                                        {{ $product->user->getNameOrUsername() }}
                                    @endif

                                </a>
                            </span>
                        </div>
                        <div class="card-footer justify-content-between">
                            <div class="price-container">
                                <span class="price"> $ {{ $product->price }} /{{ $product->unity->name }}</span>
                            </div>
                            <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Remove from wishlist">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
</div>
<hr class="text-danger">
@if($users->count() <= 1)
    <strong>{{ $users->count() }} utilisateur trouvé du mot "{{ Request::input('q') }}" </strong>
    @else
    <strong>{{ $users->count() }} utilisateurs trouvés du mot "{{ Request::input('q') }}" </strong>
@endif
    <div class="row">
        @if(!$users->count())
            <strong class="text-danger">Aucun resultat trouvé du mot "{{ Request::input('q') }}"</strong>
        @else
            @foreach($users as $user)
                <div class="media">
                    <a class="media-left" href="{{ route('profile.index',['name' => $user->name]) }}">
                        @if(isset($user->avatar))
                            <img class="media-object" style="width: 40px;height:  40px;" src="{{ asset('avatar/' . $user->avatar) }}" alt="{{ $user->section }}">
                        @else
                            <img class="media-object" style="width: 40px;height:  40px;" src="{{ asset('gravatar.png') }}" alt="{{ $user->section }}">
                        @endif

                    </a>
                    <div class="media-body">
                        <strong class="media-heading"><a href="{{ route('profile.index',['name' => $user->name]) }}">{{ $user->getNameOrUsername() }}</a></strong><br>
                        @if($user->country and $user->section)
                            <strong>{{ $user->country }}, {{ $user->section }}</strong>

                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>

