<div class="animated fadeIn">

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            @if(isset($user->avatar))
                <img class="img-circle" style="width: 100%; height: 250px;"  src="{{ asset('avatar/' . $user->avatar) }}" alt="{{ $user->section }}">
            @else
                <img class="img-circle" style="width: 100%; height: 250px;"  src="{{ asset('gravatar.png') }}" alt="{{ $user->section }}">
            @endif
                <hr>
                <p class="lead font-weight-bold"><i class="material-icons">face</i> {{ $user->getNameOrUsername() }}</p>
                <strong><i class="material-icons">contact_mail</i> Email : {{ $user->email }}</strong> <br>
                <strong><i class="material-icons">contact_phone</i> Téléphone : {{ $user->phone }}</strong> <br>
                <strong><i class="material-icons">pregnant_woman</i> Genre : {{ $user->sexe }}</strong> <br>
                <strong><i class="material-icons">work</i> Profession : {{ $user->section }}</strong> <br>
                <strong><i class="material-icons">location_on</i> Pays : {{ $user->country }}</strong> <br>
                <strong><i class="material-icons">my_location</i> Latitude : {{ $user->lat }}</strong> <br>
                <strong><i class="material-icons">my_location</i> Longitude : {{ $user->lng }}</strong> <br>
                @if(isset($user->shop_name) and isset($user->address))
                    <strong><i class="material-icons">store</i> Nom de boutique : <a href="{{ route('pages.shop.show',[$user->section, $user->id]) }}" rel="tooltip" title="" data-placement="right" data-original-title="Cliquez pour afficher boutique">{{ $user->shop_name }}</a></strong> <br>
                    <strong><i class="material-icons">location_on</i> Adresse de boutique : {{ $user->address }}</strong> <br>
                @endif


                <strong><i class="material-icons">update</i> Compte création : <time class="timeago" datetime=" {{  $user->created_at }}"> {{  $user->created_at }}</time></strong>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!--Content-->
            <div class="p-4">
                <div class="mb-3">
                    <a href="">
                        <span class="badge badge-primary mr-1">{{ $user->name }}</span>
                    </a>
                    <a href="">
                        <span class="badge badge-success mr-1">{{ $user->shop_name }}</span>
                    </a>
                    <a href="">
                        <span class="badge badge-danger mr-1">{{ $user->section }}</span>
                    </a>
                </div>
                <p class="lead font-weight-bold"><i class="material-icons">face</i>{{ $user->getNameOrUsername() }}</p>
                {{--<p class="card-text">{{ $product->quantity }} {{ $product->unity->name }}(s)</p>--}}

                <strong><i class="material-icons">description</i> {{ $user->about }}.</strong>
            </div>
            <!--Content-->

        </div>
        <!--Grid column-->

    </div>
</div>