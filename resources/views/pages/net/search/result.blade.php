<strong>{{ $users->count() }} resultat(s) de recherche du mot "{{ Request::input('q') }}"</strong>
@if(!$users->count())
    <p class="bg-info">Aucun resultat trouve</p>
@else
    <div class="row">
        <div class="col-lg-12">
            @foreach($users as $user)
                <div class="media">
                    <a class="media-left" href="{{ route('profile.index',['name' => $user->name]) }}">
                        <img src="{{ asset("gravatar.png") }}" width="40" height="40" class="media-object"  alt="{{ $user->getNameOrUsername() }}">
                    </a>
                    <div class="media-body">
                        <strong class="media-heading"><a href="{{ route('profile.index',['name' => $user->name]) }}">{{ $user->getNameOrUsername() }}</a></strong><br>
                        @if($user->country and $user->section)
                            <strong>{{ $user->country }}, {{ $user->section }}</strong>

                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif