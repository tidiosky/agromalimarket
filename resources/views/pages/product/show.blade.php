@extends('layouts.app')
@section('title', $product->nom)
@section('css')
    <style>
        .mu-menu-item-nav li .media .media-body p {
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
@endsection
@section('content')
    <style>
        .mu-menu-item-nav li .media .media-body p {
            margin-top: 10px;
            font-size: 14px;
        }
    </style>

    <div class="row" >
        <div class="col-md-8">
            <img class="img-fluid"
                 src="{{ asset('products/'.$product->filename) }}"  style="float:left; width: 280px; margin-left:10px; margin-right:10px;margin-left:10px; margin-right:10px;height: 209px" width="100%" alt="{{ $product->nom }}">
            {{--<h5 class="badge badge-info">${{ $product->price }}/{{ $product->unity->name }}</h5> <br>--}}
            @if($product->quantity >= 10)
                <div class="badge badge-success">
                    <p>Stock disponible : {{ $product->quantity }} </p>
                    <p>Prix : ${{ number_format($product->price, 0, '',  ' ') }}/{{ $product->unity->name }} </p>
                </div>
                @elseif($product->quantity < 4  )
                <div class="badge badge-danger">
                    <p>Stock disponible : {{ $product->quantity }} </p>
                    <p>Prix : ${{ number_format($product->price, 0, '',  ' ') }}/{{ $product->unity->name }} </p>
                </div>
                @else
                <div class="badge badge-warning">
                    <p>Stock disponible : {{ $product->quantity }} </p>
                    <p>Prix : ${{ number_format($product->price, 0, '',  ' ') }}/{{ $product->unity->name }} </p>
                </div>
            @endif <br>
            {{--@if(isset($stockLevel))--}}
            {{--{!! $stockLevel !!}--}}
            {{--@endif--}}

            <h4 class="text-primary"><strong>{{ $product->nom }}</strong></h4>
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
        <div class="col-md-4">
            <h6 class="text-success">Les meilleurs produits de l'année</h6>
            @foreach($mostExpensiveProduct as $item)
                <div class="media">
                    <div class="media-left">
                        <a href="{{ route('pages.product.show',$item->slug) }}">
                            <img class="media-object" src="{{ asset('products/'.$item->filename) }}" height="100" width="100" alt="img">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('pages.product.show',$item->slug) }}">{{ $item->nom }}</a></h4>
                        <h4 class="text-success">${{ number_format($item->price, 0, '', ' ') }} / {{ $item->unity->name }}</h4>
                        <p>{{ str_limit($item->about, 45) }}.</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="title">
        <h3>Commentaires</h3>
    </div>
    {{--<div class="row">--}}
        {{--<div class="col-md-8 ml-auto mr-auto">--}}
            {{--<h3 class="text-center">Poster votre commentaire--}}
                {{--<br>--}}
                {{--@if(isset(auth()->user()->id))--}}
                    {{--<small class="text-primary">- Vous êtes maintenant connecté -</small>--}}
                    {{--@else--}}
                    {{--<small class="text-rose">- Vous devez vous connecté maintenant pour poster un commentaire -</small>--}}
                {{--@endif--}}
            {{--</h3>--}}
            {{--<form id="comment-form2" method="post" class="create-comment" >--}}
                {{--<div class="media media-post">--}}
                    {{--<a class="author float-left" href="#pablo">--}}
                        {{--<div class="avatar">--}}
                            {{--@if(isset(auth()->user()->avatar))--}}
                                {{--<img class="media-object" style="width: 64px;height: 64px;"  src="{{ asset('avatar/' . auth()->user()->avatar) }}" >--}}
                            {{--@else--}}
                                {{--<img class="media-object" style="width: 64px;height: 64px;"  src="{{ asset('gravatar.png') }}" >--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<div class="media-body">--}}
                        {{--<span class="bmd-form-group"><input class="form-control" id="body" name="body" required placeholder="votre commentaire"></span>--}}
                        {{--<div class="media-footer">--}}
                            {{--<button type="reset" class="btn btn-danger btn-wd float-right">Annuler</button>--}}
                            {{--<button type="submit"  class="btn btn-primary btn-wd float-right">Commenter</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- end media-post -->--}}
            {{--</form>--}}
            {{--<span id="comment-message"></span> <br>--}}
            {{--<div id="display-comment" class="display-comment"></div>--}}

        {{--</div>--}}
    {{--</div>--}}
    <h3>Comments:</h3>
    <div style="margin-bottom:50px;">
        <textarea class="form-control" rows="3" name="body" placeholder="Leave a comment" v-model="commentBox"></textarea>
        <button class="btn btn-success" style="margin-top:10px" @click.prevent="postComment">Save Comment</button>
    </div>


    <div class="media" style="margin-top:20px;" v-for="comment in comments">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="http://placeimg.com/80/80" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">@{{comment.user.name}} said...</h4>
            <p>
                @{{comment.body}}
            </p>
            <span style="color: #aaa;">on @{{comment.created_at}}</span>
        </div>
    </div>

    <div class="row">@include('pages.product.migh-also-like')</div>
@endsection
@section('js')
    <script>


        // import {Vue} from "vue/types/vue";

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })
        });
        let comment = $('.create-comment');
        let message = $('#comment-message');
        let display = $('.display-comment');

        comment.on('submit', function (e) {
            e.preventDefault();
            let form_data = $(this).serialize();
            let id = $(this).attr('id');
            urlC = "{{ route('product.comment.store', $product->id) }}";
            $.post(urlC,form_data, function (data) {
                if (data.error != '') {
                    comment[0].reset();
                    message.html(data.error);
                }

            });
            $(this).trigger('reset');
        });
        loadComment();
        function loadComment() {
            $.ajax({
                url : "{{ route('product.comment.show', $product->id) }}",
                method : "GET",
                success : function (data) {
                    console.log(data);
                    display.html(data);
                }

            })
        }
        {{--showComment();--}}
        {{--function showComment(dat) {--}}
            {{--let data = comment.serialize();--}}
            {{--$.post("{{ route('product.comment.show', $product->id) }}", data, function (data) {--}}
                {{--console.log(data);--}}
                {{--var datas = display.empty();--}}
                {{--datas.append(data);--}}
            {{--});--}}
        {{--}--}}


        let app = new Vue({
            el: '#app',
            data: {
                comments: {},
                commentBox: '',
                product: {!! $product->toJson() !!},
                {{--slug: {!! $product->toJson() !!}--}}
                user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!}
            },
            mounted() {
                this.getComments();
            },
            methods: {
                getComments() {
                    axios.get('/api/posts/'+this.product.id+'/comments')
                        .then((response) => {
                            this.comments = response.data
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                postComment() {
                    axios.post('/api/posts/'+this.product.id+'/comment', {
                        api_token: this.user.api_token,
                        body: this.commentBox
                    })
                        .then((response) => {
                            this.comments.unshift(response.data);
                            this.commentBox = '';
                        })
                        .catch((error) => {
                            console.log(error);
                        })
                }
            }
        })
    </script>
@endsection