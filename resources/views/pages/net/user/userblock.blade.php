<div class="media">
    <a class="media-left" href="{{ route('profile.index',['name' => $user->name]) }}">
        <div class="input-group-text">
            @if(isset($user->avatar))
                <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('avatar/' . $user->avatar) }}" alt="{{ $user->section }}">
            @else
                <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('gravatar.png') }}" alt="{{ $user->section }}">
            @endif
        </div>
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="{{ route('profile.index',['name' => $user->name]) }}">{{ $user->getNameOrUsername() }}</a></h4>
        @if($user->country and $user->section)
            <h6>{{ $user->country }}, {{ $user->section }}</h6>

        @endif
    </div>
</div>