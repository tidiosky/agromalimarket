<nav class="navbar navbar-color-on-scroll bg-success fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href=""><img class="img-circle" style="width: 60px;" src="{{ asset('images/logo-img-small.png') }}" alt="">AgroMaliMarket </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item {{ set_active_route('product.index') }} ? {{ set_active_route('pages.shop.index') }} ? {{ set_active_route('pages.shop.show') }} ? {{ set_active_route('pages.product.show') }} ">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">home</i> Accueil
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="{{ route('product.index') }}" class="dropdown-item {{ set_active_route('product.index') }} ? {{ set_active_route('pages.product.show') }}">
                            <i class="material-icons">view_module</i> Produits
                        </a>
                        <a href="{{ route('pages.shop.index') }}" class="dropdown-item {{ set_active_route('pages.shop.index') }} ? {{ set_active_route('pages.shop.show') }}">
                            <i class="material-icons">store</i> Boutiques
                        </a>
                    </div>
                </li>
                {{--<li class="dropdown nav-item {{ set_active_route('cart.index') }} ? {{ set_active_route('cart.store') }} ? {{ set_active_route('cart.destroy') }} ? {{ set_active_route('cart.update') }}">--}}
                    {{--<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">--}}
                        {{--<i class="material-icons">payment</i> Paiement--}}
                        {{--@if(Cart::instance('default')->count() > 0 )--}}
                            {{--<sup class="badge badge-warning badge-pill">--}}
                                {{--{{ Cart::instance('default')->count() }}--}}
                            {{--</sup>--}}
                        {{--@endif--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu dropdown-with-icons">--}}
                        {{--<a href="{{ route('cart.index') }}" class="dropdown-item {{ set_active_route('cart.index') }} ? {{ set_active_route('cart.store') }} ? {{ set_active_route('cart.destroy') }} ? {{ set_active_route('cart.update') }}">--}}
                            {{--<i class="material-icons">shopping_cart</i> Panier--}}
                            {{--@if(Cart::instance('default')->count() > 0 )--}}
                                {{--<sup class="badge badge-warning badge-pill">--}}
                                    {{--{{ Cart::instance('default')->count() }}--}}
                                {{--</sup>--}}
                            {{--@endif--}}
                        {{--</a>--}}
                        {{--<a href="http://demos.creative-tim.com/material-kit-pro/docs/2.0/getting-started/introduction.html" class="dropdown-item">--}}
                            {{--<i class="material-icons">store</i> Factures--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</li>--}}
                <li class="dropdown nav-item {{ set_active_route('location') }}">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">map</i> Carte Client
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="{{ route('location') }}" class="dropdown-item {{ set_active_route('location') }}">
                            <i class="material-icons">location_city</i> Localiser Boutique
                        </a>
                        <a href="http://demos.creative-tim.com/material-kit-pro/sections.html#features" class="dropdown-item">
                            <i class="material-icons">location_on</i> Contactez-nous
                        </a>
                        <a href="http://demos.creative-tim.com/material-kit-pro/sections.html#blogs" class="dropdown-item">
                            <i class="material-icons">list</i> Blogs
                        </a>
                        <a href="http://demos.creative-tim.com/material-kit-pro/sections.html#teams" class="dropdown-item">
                            <i class="material-icons">people</i> Teams
                        </a>
                        <a href="http://demos.creative-tim.com/material-kit-pro/sections.html#projects" class="dropdown-item">
                            <i class="material-icons">assignment</i> Projects
                        </a>
                        <a href="http://demos.creative-tim.com/material-kit-pro/sections.html#pricing" class="dropdown-item">
                            <i class="material-icons">monetization_on</i> Pricing
                        </a>
                        <a href="http://demos.creative-tim.com/material-kit-pro/sections.html#testimonials" class="dropdown-item">
                            <i class="material-icons">chat</i> Testimonials
                        </a>
                        <a href="http://demos.creative-tim.com/material-kit-pro/sections.html#contactus" class="dropdown-item">
                            <i class="material-icons">call</i> Contacts
                        </a>
                    </div>
                </li>
                <li class="button-container nav-item iframe-extern {{ set_active_route('cart.index') }} ? {{ set_active_route('cart.store') }} ? {{ set_active_route('cart.destroy') }} ? {{ set_active_route('cart.update') }}">
                    <a href="{{ route('cart.index') }}"  class="btn  btn-default   btn-round btn-block">
                        <i class="material-icons">shopping_cart</i> Payer
                        @if(Cart::instance('default')->count() > 0 )
                            ({{ Cart::instance('default')->count() }})
                        @endif

                    </a>
                </li>
                @guest
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">person_outline</i> Compte
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="{{ route('register') }}" class="dropdown-item">
                                <i class="material-icons">person_add</i> Inscription
                            </a>
                            <a href="{{ route('login') }}" class="dropdown-item">
                                <i class="material-icons">lock</i> Connexion
                            </a>
                        </div>
                    </li>
                    @else
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">dashboard</i> Tableau de bord
                            {{--<sup class="badge badge-rose badge-pill">--}}
                                {{--{{ auth()->user()->friends()->count() }}--}}
                            {{--</sup>--}}
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="{{ url('admin/product') }}" class="dropdown-item">
                                <i class="material-icons">pan_tool</i> Gestion des produits

                            </a>
                            <a href="{{ route('user.friend.index') }}" class="dropdown-item">
                                <i class="material-icons">people</i> Mes amis
                                <sup class="badge badge-warning badge-pill">
                                    {{ auth()->user()->friends()->count() }}
                                </sup>
                            </a>
                            @hasanyrole('admin')
                            <a href="{{ url('admin/user') }}" class="dropdown-item">
                                <i class="material-icons">lock</i> Gestion des utilisateurs
                            </a>
                            @endhasanyrole

                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#"  class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                            @if(isset(auth()->user()->avatar))
                                <img class="rounded-circle img-fluid" style="border-radius: 100%;width: 40px;height: 40px;" src="{{ asset('avatar/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->section }}">
                                  @else
                                <img class="rounded-circle img-fluid" style="border-radius: 100%;width: 40px;height: 40px;" src="{{ asset('gravatar.png') }}" alt="{{ auth()->user()->section }}">
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="{{ url('admin/product') }}" class="dropdown-item">
                                <i class="material-icons">file_upload</i>  Gestion {{ auth()->user()->section }}
                            </a>
                            <a href="{{ route('profile.index',auth()->user()->name) }}" class="dropdown-item">
                                <i class="material-icons">account_circle</i> Mon profile
                            </a>
                            <a href="{{ route('profile.edit',auth()->user()->name) }}" class="dropdown-item">
                                <i class="material-icons">mode_edit</i> Mondifier profile
                            </a>
                            <a onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" href="{{ route('logout') }}" class="dropdown-item">
                                <i class="material-icons">power_settings_new</i> Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>