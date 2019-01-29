
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <div class="media">
            <a class="media-left" href="{{ route('profile.index',['name' => $shop->name]) }}">
                <div class="input-group-text">
                    @if(isset($shop->avatar))
                        <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('avatar/' . $shop->avatar) }}" alt="{{ $shop->section }}">
                    @else
                        <img class="img-circle" style="border-radius: 100%;width: 50px;height: 50px;" src="{{ asset('gravatar.png') }}" alt="{{ $shop->section }}">
                    @endif
                </div>
            </a>
        </div>
        {{--@if(isset($shop->avatar))--}}
            {{--<img class="align-self-start mr-3" style="width:40px;height: 40px;" src="{{ asset('avatar/' . $shop->avatar) }}" alt="{{ $shop->section_id }}">--}}
        {{--@else--}}
            {{--<img class="align-self-start mr-3" style="width:40px;height: 40px;" src="{{ asset('gravatar.png') }}" alt="{{ $shop->section_id }}">--}}
        {{--@endif--}}
        @if(isset($shop->shop_name))
            {{ $shop->shop_name }}
        @else
            {{ $shop->section }}-{{ $shop->name }}-{{ $shop->id }}
        @endif</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Commandes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mes clients</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gestion
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>