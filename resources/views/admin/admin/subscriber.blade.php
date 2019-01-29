@extends('layouts.admin')
@section('css')
@endsection
@section('title', "Liste des inscrits à la new letter")
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des produits de {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                    </h2>
                    <hr>
                    <a href="{{ route('admin.pro.create') }}" class="btn btn-raised btn-success btn-sm" title="Add New Product">
                        <i class="material-icons">library_add</i> Ajouter des produits
                    </a>
                    <a href="{{ route('admin.cat.create') }}" class="btn btn-raised btn-primary btn-sm" title="Add New Product">
                        <i class="material-icons">add_box</i> Ajouter des catégories
                    </a>
                    <a href="{{ route('admin.unity.create') }}" class="btn btn-raised btn-info btn-sm" title="Add New Product">
                        <i class="material-icons">add_circle</i> Ajouter des unités
                    </a>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($subscribers as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="#" title="Edit Product">
                                            <button  class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                        </a>
                                        <button  type="button"  title="Suppression de produit" onclick="deleteSubscriber({{ $item->id }})" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form method="POST" id="delete-form-{{ $item->id }}" action="{{ route('subscriber.delete', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function deleteSubscriber(id) {
            swal({
                title: "Etes vous sûr ?",
                text: "Vous pouvez pas annuler après le lancement de l'opération",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Non, annulé',
                confirmButtonText: 'Oui, supprimé la',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit()
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Annulé',
                        'Votre données est saint et sauf',
                        'error'
                    )
                }
            });
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection