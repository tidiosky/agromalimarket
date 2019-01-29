@guest
        @if(Session::has('info'))
            <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                 <strong>Merci !</strong>  {{ Session::get('info') }} !!.
            </div>

        @elseif(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Félécitions !  {{ Session::get('success') }} !!.
            </div>
        @elseif(Session::has('flash_message'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong> Félécitations !</strong>  {{ Session::get('flash_message') }} !!.
            </div>

        @elseif(Session::has('danger'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
               <strong> Désolé!!! </strong>  {{ Session::get('danger') }} !!.
            </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Attention! {{ Session::get('warning') }} !!.
            </div>
        @endif
    @else
        @if(Session::has('info'))
            <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Merci <strong> @if(Auth()->user()->sexe == 'Homme') Monsieur
                    @elseif(Auth()->user()->sexe == 'Démoiselle') Démoissele
                    @else Madame @endif {{ Auth()->user()->last_name }}!</strong>  {{ Session::get('info') }} !!.
            </div>

        @elseif(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Félécitions <strong> @if(Auth()->user()->sexe == 'Homme') Monsieur
                    @elseif(Auth()->user()->sexe == 'Démoiselle') Démoissele
                    @else Madame @endif {{ Auth()->user()->last_name }}!</strong>  {{ Session::get('success') }} !!.
            </div>
        @elseif(Session::has('flash_message'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Félécitation <strong> @if(Auth()->user()->sexe == 'Homme') Monsieur
                    @elseif(Auth()->user()->sexe == 'Démoiselle') Démoissele
                    @else Madame @endif {{ Auth()->user()->last_name }}!</strong>  {{ Session::get('flash_message') }} !!.
            </div>

        @elseif(Session::has('danger'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Désolé <strong> @if(Auth()->user()->sexe == 'Homme') Monsieur
                    @elseif(Auth()->user()->sexe == 'Démoiselle') Démoissele
                    @else Madame @endif {{ Auth()->user()->last_name }}!</strong>  {{ Session::get('danger') }} !!.
            </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Attention <strong> @if(Auth()->user()->sexe == 'Homme') Monsieur
                    @elseif(Auth()->user()->sexe == 'Démoiselle') Démoissele
                    @else Madame @endif {{ Auth()->user()->last_name }}!</strong>  {{ Session::get('warning') }} !!.
            </div>
        @endif
@endguest
