<!-- Register Modal -->
<div class="modal fade" id="signupModal{{ $product->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-signup" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <h4 class="modal-title card-title">{{ $product->nom }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <!--Grid row-->
                    <div class="">
                        <img class="img-fluid"
                             src="{{ asset('products/'.$product->filename) }}"  style="float:left; width: 280px; margin-left:10px; margin-right:10px;margin-left:10px; margin-right:10px;height: 209px" width="100%" alt="{{ $product->nom }}">
                        {{--<h5 class="badge badge-info">${{ $product->price }}/{{ $product->unity->name }}</h5> <br>--}}
                        @if($product->quantity >= 10)
                            <div class="badge badge-success">
                                <p>Stock disponible : {{ $product->quantity }} </p>
                                <p>Prix : ${{ $product->price }}/{{ $product->unity->name }} </p>
                            </div>
                        @elseif($product->quantity < 4  )
                            <div class="badge badge-danger">
                                <p>Stock disponible : {{ $product->quantity }} </p>
                                <p>Prix : ${{ $product->price }}/{{ $product->unity->name }} </p>
                            </div>
                        @else
                            <div class="badge badge-warning">
                                <p>Stock disponible : {{ $product->quantity }} </p>
                                <p>Prix : ${{ $product->price }}/{{ $product->unity->name }} </p>
                            </div>
                        @endif <br>
                        {{--@if(isset($stockLevel))--}}
                        {{--{!! $stockLevel !!}--}}
                        {{--@endif--}}


                        <strong class="card-body">{{ $product->about }}.</strong>
                        @if($product->quantity > 0 )
                            <form class="d-flex justify-content-left" method="post" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="nom" value="{{ $product->nom }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <!-- Default input -->
                                {{--<input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">--}}
                                <button class="btn btn-primary btn-lg btn-raised my-0 p" type="submit">${{ $product->price }}
                                    <i class="material-icons">add_shopping_cart</i>
                                </button>

                            </form>
                        @endif
                    </div>
                    <!--Grid row-->
              
                    <hr>
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h3 class="text-center">Poster votre commentaire
                                <br>
                                @if(isset(auth()->user()->id))
                                    <small class="text-primary">- Vous êtes maintenant connecté -</small>
                                @else
                                    <small class="text-rose">- Vous devez vous connecté maintenant pour poster un commentaire -</small>
                                @endif
                            </h3>
                            <form  role="form"  id="comment_form" method="post" action="{{ route('product.comment.store',$product->id) }}">
                                {{ csrf_field() }}
                                <div class="media media-post">
                                    <a class="author float-left" href="#pablo">
                                        <div class="avatar">
                                            @if(isset(auth()->user()->avatar))
                                                <img class="media-object" style="width: 64px;height: 64px;"  src="{{ asset('avatar/' . auth()->user()->avatar) }}" >
                                            @else
                                                <img class="media-object" style="width: 64px;height: 64px;"  src="{{ asset('gravatar.png') }}" >
                                            @endif
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <span class="bmd-form-group"><textarea class="form-control" name="body" required placeholder="votre commentaire" rows="6"></textarea></span>
                                        <div class="media-footer">
                                            <button type="reset" class="btn btn-danger btn-wd float-right">Annuler</button>
                                            <button type="submit" class="btn btn-primary btn-wd float-right">Commenter</button>

                                        </div>
                                    </div>
                                </div>
                                <!-- end media-post -->
                            </form>
                            <div class="media-area">
                                <h3 class="title text-center">
                                    @if($product->comments->count() <= 0)
                                        <span class="text-warning">Pas de commentaire</span>
                                    @elseif($product->comments->count() == 1)
                                        <span class="text-info">#1 commentaire</span>
                                    @else
                                        <span class="text-success">#{{ $product->comments->count() }} commentaires</span>
                                    @endif
                                </h3>
                                @foreach($product->comments as $comment)
                                    <div class="media">
                                        <a class="float-left" href="#pablo">
                                            <div class="avatar">
                                                @if(isset($comment->user->avatar))
                                                    <img class="img-circle" style="width: 64px;height: 64px;" src="{{ asset('avatar/' . $comment->user->avatar) }}" alt="{{ $comment->user->section }}">
                                                @else
                                                    <img class="img-circle" style="width: 64px;height: 64px;"  src="{{ asset('gravatar.png') }}" alt="{{ $comment->user->section }}">
                                                @endif
                                            </div>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="{{ route('profile.index',['name' => $comment->user->name]) }}">{{ $comment->user->name }}</a>
                                                <small>· <time class="timeago" datetime=" {{ $comment->created_at }}"> {{ $comment->created_at }}</time></small>
                                            </h4>
                                            <p> {{ $comment->body }}.</p>

                                            <div class="media-footer">
                                                <a href="#pablo" class="btn btn-primary btn-link float-right" rel="tooltip" title="" data-original-title="Reply to Comment">
                                                    <i class="material-icons">reply</i> Répondre
                                                </a>
                                                <a href="#pablo" class="btn btn-danger btn-link float-right">
                                                    <i class="material-icons">favorite</i> 243
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->