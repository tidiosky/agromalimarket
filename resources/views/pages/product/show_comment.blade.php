<div class="media-area">
    <div>
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
            <div class="show-comment">
                <div class="media">
                    <a class="float-left" href="#pablo">
                        <div class="">
                            @if(isset($comment->user->avatar))
                                <img class="img-circle" style="width: 40px;height: 40px; border-radius: 100%" src="{{ asset('avatar/' . $comment->user->avatar) }}" alt="{{ $comment->user->section }}">
                            @else
                                <img class="img-circle" style="width: 40px;height: 40px; border-radius: 100%"  src="{{ asset('gravatar.png') }}" alt="{{ $comment->user->section }}">
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
            </div>
        @endforeach
    </div>
</div>