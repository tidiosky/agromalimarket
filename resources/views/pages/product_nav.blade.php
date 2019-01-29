
<div class="card card-product card-plain no-shadow" data-colored-shadow="false" id="slug">
    <div class="card-header card-header-image" style="text-align: justify;border: 2px solid #91b868;">
        <a href="{{ route('pages.product.show',$product->slug) }}">
            <img src="{{ asset('products/'.$product->filename) }}" width="100%" height="200" alt="...">
        </a>
    </div>
    <div class="card-body" >
        <a href="{{ route('pages.product.show',$product->slug) }}" id="slug">
            <h4 class="card-title">{{ $product->nom }}</h4>
        </a>
        <div class=" justify-content-between justified ">
            <strong>{{ str_limit($product->about,62) }}</strong>
                <div class="col-lg-6 col-md-6">
                    <button class="btn btn-primary modal_pro btn-round" data-toggle="modal" id="{{ $product->id }}" data-target="#signupModal{{ $product->id }}">
                        Voire plus  <i class="material-icons" >arrow_forward</i>
                    </button>
                </div>

        </div>
        <div>
            <h6>  <span class="text-info"> Boutique</span> :
                <a href="{{ route('pages.shop.show',[$product->user->section, $product->user->id]) }}">
                    @if(isset($product->user->shop_name))
                        <i class="material-icons" aria-hidden="true">store</i> {{ $product->user->shop_name }}
                    @else
                        <i class="material-icons" aria-hidden="true">store</i> {{ $product->user->getNameOrUsername() }}
                    @endif
                </a>
            </h6>
            <h6><a href="#"><i class="material-icons" aria-hidden="true">email</i> Contactez le fournisseur</a></h6>

            <div><i class="material-icons">update</i><time class="timeago text-primary" datetime=" {{ $product->created_at }}">
                    {{ $product->created_at }}</time>
            <div class="float-right">

                <button class="btn btn-primary like btn-link btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Le nombre de vue">
                    <i class="material-icons" >remove_red_eye</i>
                </button>
                <span class="text-primary"> ({{ $product->view_count }})</span>
            </div>
            </div>

        </div>
    </div>
    <div class="card-footer justify-content-between btn " >
        <div class="price-container">
            <span class="price" data-toggle="modal" id="{{ $product->id }}" data-target="#signupModal{{ $product->id }}" > $ {{ number_format($product->price, 0, '',  ' ') }} /{{ $product->unity->name }}</span>
        </div>
        @guest
            <a href="javascript:void(0);" onclick="toastr.info('Pour ajouter au favoris, il faut vous connectez d\'abord','Info', {
                closeButton: true,
                progressBar: true
            })" rel="tooltip" title="" data-placement="left" data-original-title="Ajouter au favoris" class="btn-success btn btn-sm pull-right">
                ({{ $product->favorite_to_users->count() }}) <i class="material-icons">favorite</i>
            </a>
        @else
            <a href="#"  onclick="document.getElementById('favorite-form-{{ $product->id }}').submit();" rel="tooltip" title="" data-placement="left" data-original-title="Ajouter au favoris"
               class="pull-right btn btn-success btn-sm {{ !auth()->user()->favorite_products
               ->where('produit_id', $product->id)->count() == 0 ? 'favorite_products' : '' }}">
                ({{ $product->favorite_to_users->count() }}) <i class="material-icons">favorite</i>
            </a>
            <form id="favorite-form-{{ $product->id }}" action="{{ route('favorite.store', $product->id) }}" style="display: none;" method="post">
                @csrf

            </form>
        @endguest

    </div>
</div>
<!-- end card -->


