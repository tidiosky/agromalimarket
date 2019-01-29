

<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            @if(auth()->user()->section_id == "Electronique")
                <a href="{{ url('product/products') }}">
                    Gestion de produit
                </a>
                <hr>
                <a href="{{ url('product/category-electronique') }}">
                    Gestion de catégories Electroniques
                </a>
                <hr>
                <a href="{{ url('product/unity-electronique') }}">
                    Gestion des Unités Electroniques
                </a>
                <hr>
                @elseif(auth()->user()->section_id == "Quincallerie")
                <a href="{{ url('product/products') }}">
                    Gestion de produit
                </a>
                <hr>
                <a href="{{ url('product/category-quincallerie') }}">
                    Gestion de catégories Quincalleries
                </a>
                <hr>
                <a href="{{ url('product/unity-quincallerie') }}">
                    Gestion des Unités Quincalleries
                </a>
                <hr>
                @elseif(auth()->user()->section_id == "Alimentation")
                <a href="{{ url('product/products') }}">
                    Gestion de produit
                </a>
                <hr>
                <a href="{{ url('product/category-alimentation') }}">
                    Gestion de catégories Alimentations
                </a>
                <hr>
                <a href="{{ url('product/unity-alimentation') }}">
                    Gestion des Unités Alimentations
                </a>
                <hr>
                @elseif(auth()->user()->section_id == "Chaussures")
                <a href="{{ url('product/products') }}">
                    Gestion de produit
                </a>
                <hr>
            @endif
            @hasanyrole('super-admin')
                <a href="{{ url('/admin') }}">
                    Dashboard
                </a>
                <hr>
                <a href="{{ url('admin/section') }}">
                    Section des USERS
                </a>
                <hr>
                <a href="{{ url('/admin/role') }}">
                    Role
                </a>
                <hr>
                <a href="{{ url('/admin/permission') }}">
                    Permission
                </a>
                <hr>
                <a href="{{ url('/admin/user') }}">
                    Gestion des Users
                </a>
                <a href="{{ url('pub/pub') }}">
                    Gestion de pub
                </a>
                <hr>
            @endhasanyrole


        </div>
    </div>
</div>
