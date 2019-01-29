@extends('layouts.app',['titre' => 'Publication de status'])

@section('content')
    <header><h2>Que voulez-vous dire?</h2></header>

    <form action="{{ route('status.post') }}" method="post">

        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">

            <div class="md-form">
                <i class="fa fa-pencil prefix grey-text"></i>
                <textarea name="status" id="new-post"
                          placeholder="Quels sont les news {{ Auth::user()->getFirstnameOrUsername() }} ?" type="text"
                          class="form-control md-textarea" rows="3" title="Inserez votre commentaire"></textarea>
                <label for="form-text">Votre commentaire</label>
                @if ($errors->has('status'))
                    <span class="text-danger">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                @endif
            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-raised">Poster un Commentaire</button>
        <input type="hidden" value="{{ Session::token() }}" name="_token">
    </form>
    <hr>

    @if(!$statuses->count())
        <p>Vous n'avez  aucun timeline</p>
    @else
        @foreach($statuses as $status)
            <div class="media">
                <a class="media-left" href="{{ route('profile.index',['name' => $status->user->name]) }}">
                    <div class="input-group-text">
                        @if(isset($status->user->avatar))
                            <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('avatar/' . $status->user->avatar) }}" alt="{{ $status->user->section }}">
                        @else
                            <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('gravatar.png') }}" alt="{{ $status->user->section }}">
                        @endif
                    </div>
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        <a  href="{{ route('profile.index',$status->user->name) }}">{{ $status->user->getNameOrUsername() }} &nwarrow; <time class="timeago" datetime=" {{ $status->created_at }}"> {{ $status->created_at }}</time> </a>
                    </h4>
                    <h6> {{ $status->body }}</h6>
                    @if($status->user->id !== Auth::user()->id)
                        <a href="{{ route('status.like',['statusId' => $status->id]) }}">
                            <i class="fa fa-heart"></i></a>

                    @endif
                    <span>{{ $status->likes->count() }} {{ str_plural('j\'aime', $status->likes->count()) }}</span>
                    {{--Reply--}}
                    @foreach($status->replies as $reply)
                        <div class="media">
                            <a class="media-left" href="{{ route('profile.index',['name' => $reply->user->name]) }}">
                                <div class="input-group-text">
                                    @if(isset($reply->user->avatar))
                                        <img class="img-circle" style="border-radius: 100%;width: 40px;height: 40px;" src="{{ asset('avatar/' . $reply->user->avatar) }}" alt="{{ $reply->user->section }}">
                                    @else
                                        <img class="img-circle" style="border-radius: 100%;width: 40px;height: 40px;" src="{{ asset('gravatar.png') }}" alt="{{ $reply->user->section }}">
                                    @endif
                                </div>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a class="name" href="{{ route('profile.index',['name'=> $reply->user->name]) }}">{{ $reply->user->getNameOrUsername() }} &nwarrow; <time class="timeago" datetime=" {{ $reply->created_at }}"> {{ $reply->created_at }}</time></a>
                                </h4>
                                <h6> {{ $reply->body }}</h6>
                                @if($reply->user->id !== Auth::user()->id)
                                    <a href="{{ route('status.like',['statusId' => $reply->id]) }}">
                                        <i class="fa fa-heart"></i></a>

                                @endif
                                <span>{{ $reply->likes->count() }} {{ str_plural('j\'aime', $reply->likes->count()) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="pull-center col-md-8">
                @if(isset($authUserIsFriend) || auth()->user()->id === $status->user->id)
                    <form action="{{ route('status.reply',$status->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Votre réponse</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        @if(isset($status->user->avatar))
                                            <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('avatar/' . auth()->user()->avatar) }}" alt="{{ $status->user->section }}">
                                        @else
                                            <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('gravatar.png') }}" alt="{{ $status->user->section }}">
                                        @endif
                                    </div>
                                </div>

                                <input type="text" class="form-control" id="inlineFormInputGroup" name="reply-{{ $status->id }}" placeholder="Votre réponse {{ Auth::user()->getFirstnameOrUsername() }}">
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-sm btn-raised btn-primary">Répondre</button>
                            <button type="reset" class="btn btn-sm btn-raised btn-danger">Annuler</button>
                        </div>
                    </form>
                @endif
            </div>
        @endforeach
        <nav>
            <ul class="pagination pg-dark">
                {!! $statuses->render() !!}
            </ul>
        </nav>
    @endif
@endsection
