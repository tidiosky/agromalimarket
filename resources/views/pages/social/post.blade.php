@extends("layout.app")
@section("content")
    <div class="col-md-12">
        <h1>Blog de commentaire</h1>
        <aside class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <header><h3>Que voulez-vous dire?</h3></header>
                <form action="" method="post">
                    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                        {!! $errors->first('body','<span class="help-block" >:message</span>') !!}
                        <label for="new-post" class="control-label">Votre commentaire:</label>
                        <textarea name="body" id="new-post"  class="form-control" rows="5" placeholder="Votre post...."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Poster un Commentaire</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </aside>
        <aside class="new-posts">
            <div class="col-md-6 col-md-offset-3">
                <header><h3>Les autres disent quoi.......</h3></header>
                {{--@foreach($posts as $post)--}}
                    <article class="post" data-postid="{{ $post->id }}">
                        <p>{{ $post->body }}</p>
                        <div class="info">
                            Poster par {{ $post->user->name }} au {{ $post->created_at }}
                        </div>
                        <div class="interaction">
                            <a href="#">J'aime</a> |
                            <a href="#">J'aime Pas</a> |
                            <a href="#" class="edit">Editer</a> |
                            <a href="{{ route('blog.socials.delete',['post_id' => $post->id]) }}">Supprimer</a>
                        </div>
                    </article>
                {{--@endforeach--}}
            </div>
        </aside>
        <div class="modal fade" role="dialog" tabindex="-1" id="edit-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modifier votre poste</h4>
                    </div>
                    <div class="modal-dody">
                        <form action="">
                            <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                {!! $errors->first('body','<span class="help-block" >:message</span>') !!}
                                <label for="post-body">Editez votre post</label>
                                <textarea class="form-control" name="body" id="post-body"  rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary btn-fill btn-wd" id="modal-save">Modifier votre post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        {{--var token = '{{ Session::token() }}';--}}
        {{--var url = '{{ route('blog.socials.edit') }}'--}}
    </script>
    <div class="col-md-8 col-md-offset-2">
        <!--Grid column-->
        <div class="">

            <!--Form with header-->
            <div class="card">

                <div class="card-body">
                    <!--Header-->
                    <div class="form-header blue accent-1">
                        <h3>
                            <i class="fa fa-envelope"></i> Votre post:</h3>
                    </div>

                    <p>Vuillez poster un meilleur commentaire.</p>
                    <br>

                    <!--Body-->
                    <form action="" method="post">
                        <div class="md-form">
                            <i class="fa fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="form-text" class="form-control md-textarea" rows="3"></textarea>
                            <label for="form-text">Votre commentaire</label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-light-blue">Submit</button>
                        </div>
                    </form>
                    <div class="media">
                        <blockquote>
                            <div class="media-body">
                                <div class="media-body">
                                    <div class="media-heading">Diakaridia kante</div>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                </div>

            </div>
            <!--Form with header-->

        </div>
        <!--Grid column-->
    </div>
@endsection