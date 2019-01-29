<div id="response">
    @foreach($product->comments as $comment)
        <div class="media">
            <img class="mr-3" src="{{ asset('gravatar.png') }}" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                {{ $comment->body }}
                <div class="pull-right">
                    <i class="fa fa-refresh"></i>
                    <time class="timeago" datetime=" {{ $comment->created_at }}"> {{ $comment->created_at }}</time>
                </div>
                <div class="media mt-3">
                    <a class="pr-3" href="#">
                        <img src="{{ asset('gravatar.png') }}" alt="Generic placeholder image">
                    </a>
                    <div class="media-body">
                        <h5 class="mt-0">Media heading</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>