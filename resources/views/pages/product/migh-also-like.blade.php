@if(!$mighAlsoLike->count())
    <p class="text-danger text-center">Il y a aucun produit de ce categorie</p>
@else
    @foreach($mighAlsoLike as $product)
        @if($product->quantity > 0 )
            <div class="col-md-3">
                @include('pages.product_nav')
            </div>
        @endif
    @endforeach
@endif