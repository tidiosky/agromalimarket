@extends('layouts.app',['titre' => 'Liste d\'amis'])
@section('content')
  <div class="row">
      <div class="col-md-8">
          <h1>Liste d'amis</h1>
          @if(!$friends->count())
              <p>Vous n'avez pas d' amis</p>
          @else
              @foreach($friends as $user)
                  @include('pages.net.user.userblock')
              @endforeach
          @endif
      </div>
      <div class="col-md-4">
          <h4>Demande d'amis</h4>


      @if(!$requests->count())
              Vous n'avez aucune demande d'amis
          @else
              @foreach($requests as $user)
                  @include('pages.net.user.userblock')
              @endforeach
          @endif
      </div>
  </div>
@endsection
@section('sidebar')

@endsection