@extends('layouts.app',['titre' => 'Profile'])
@section('title',"Profile")
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h4>Profile de {{ $user->getNameOrUsername() }}
                @if($user->id == Auth::user()->id)
                    <a href="{{ route('profile.edit',auth()->user()->name) }}"><i class="material-icons" aria-hidden="true">mode_edit</i> Modifier</a>
                @endif
            </h4>
            <div class="">
                @include('pages.net.profile.userprofile')
            </div>
        </div>
        <div class="col-md-4">
            <h4>Demande d'amis</h4>
            @if(Auth::user()->hasFriendRequestPending($user))
                <p>Attente de demande de {{ $user->getNameOrUsername() }}</p>
            @elseif(Auth::user()->hasFriendRequestReceived($user))
                <a href="{{ route('user.friend.accept',['name' => $user->name]) }}" class="btn btn-raised btn-primary" role="button">Accepter la demande d'mis</a>
            @elseif(Auth::user()->isFriendsWith($user))
                <p>Vous ête amis avec {{ $user->getFirstnameOrUsername() }}</p>
                <form action="{{ route('user.friend.delete',$user->name) }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-danger btn-raised" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</button>
                </form>
            @elseif(Auth::user()->id !== $user->id)
                <a href="{{ route('user.friend.add',['name' => $user->name]) }}" class="btn btn-raised btn-info" role="button">Ajouter a vos Amis </a>
            @endif

            <h4>Les amis de {{ $user->getFirstnameOrUsername() }}</h4>
            @if(!$user->friends()->count())
                {{ $user->getFirstnameOrUsername() }} n'a pas d' amis
            @else
                @foreach($user->friends() as $user)
                    @include('pages.net.user.userblock')
                @endforeach
            @endif
        </div>
    </div>
   <div class="row">
       <div class="col-md-12">


           @include('pages.net.user.userblock')
           <hr>
           @if(!$statuses->count())
               <p>{{ $user->getNameOrUsername() }} aucun timeline</p>
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
                           <h4 class="media-heading"><a href="{{ route('profile.index',$status->user->name) }}">{{ $status->user->getNameOrUsername() }}</a>
                               <small>· <time class="timeago" datetime=" {{  $status->created_at }}"> {{  $status->created_at }}</time></small>
                           </h4>
                           {{--<h6 class="media-heading">--}}
                               {{--<a  href="{{ route('profile.index',$status->user->name) }}">{{ $status->user->getNameOrUsername() }} &nwarrow; <time class="timeago" datetime=" {{ $status->created_at }}"> {{ $status->created_at }}</time> </a>--}}
                           {{--</h6>--}}
                           <strong class="card-body"> {{ $status->body }}</strong>
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
                                       <h4 class="media-heading"><a href="{{ route('profile.index',['name'=> $reply->user->name]) }}">{{ $reply->user->getNameOrUsername() }}</a>
                                           <small>· <time class="timeago" datetime=" {{  $reply->created_at }}"> {{  $reply->created_at }}</time></small>
                                       </h4>
                                       {{--<h4 class="media-heading">--}}
                                           {{--<a class="name" href="{{ route('profile.index',['name'=> $reply->user->name]) }}">{{ $reply->user->getNameOrUsername() }} &nwarrow; <time class="timeago" datetime=" {{ $reply->created_at }}"> {{ $reply->created_at }}</time></a>--}}
                                       {{--</h4>--}}
                                       <strong class="card-body"> {{ $reply->body }}</strong>
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
                               @csrf
                               <div class="col-auto">
                                   <label class="sr-only" for="inlineFormInputGroup">Votre réponse</label>
                                   <div class="input-group mb-2">
                                       <div class="input-group-prepend">
                                           <div class="input-group-text">
                                               @if(isset($status->user->avatar))
                                                   <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('avatar/' . auth()->user()->avatar) }}" alt="{{ $status->user->section }}">
                                               @else
                                                   <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('avatar/gravatar.png') }}" alt="{{ $status->user->section }}">
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
                   </div> <br>
               @endforeach

           @endif
       </div>
       <div class="col-md-4">

       </div>
   </div>
@endsection
@section('sidebar')

@endsection
