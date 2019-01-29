@extends('layouts.app',['titre' => 'Reseau social'])

@section('content')

   <div class="col-md-12">
       <aside class="row new-post">
           <div class="col-md-6 col-md-offset-3">
               <header><h2>Que voulez-vous dire?</h2></header>

               <form action="{{ route('post.create') }}" method="post">

                   <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">

                       <div class="md-form">
                           <i class="fa fa-pencil prefix grey-text"></i>
                           <textarea name="body" id="new-post" type="text"  class="form-control md-textarea" rows="3" title="Inserez votre commentaire"></textarea>
                           <label for="form-text">Votre commentaire</label>
                       </div>
                   </div>
                   <button type="submit" class="btn btn-primary">Poster un Commentaire</button>
                   <input type="hidden" value="{{ Session::token() }}" name="_token">
               </form>
           </div>
       </aside>
       <aside class="new-posts">
           <div class="col-md-6 col-md-offset-3">
               <blockquote>
                   <header><h3>Les autres disent quoi.......</h3></header>
                   @foreach($posts as $post)
                   <article class="post" data-postid="{{ $post->id }}">
                       <p>
                           {{ $post->body }}
                       </p>  <div class="info">
                           Poster <time class="timeago" title="{{ $post->created_at }}"
                                 datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
                             par {{ $post->user->name }}
                       </div>
                       <div class="interaction">
                           <a href="#" class="like">Like</a> |
                           <a href="#" class="like">J'aime Pas</a> |
                           <a href="#" class="edit">Editer</a> |
                           <a href="{{ route('blog.delete',['post_id' => $post->id]) }}" onclick="return confirm('Vous voulez vraiment supprimer')">Supprimer</a>
                       </div>
                   </article>
                   @endforeach
               </blockquote>
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
                               <div class="md-form">
                                   {!! $errors->first('body','<span class="help-block" >:message</span>') !!}
                                   <i class="fa fa-pencil prefix grey-text"></i>
                                   <textarea name="body" id="post-body" type="text"  class="form-control md-textarea" rows="3" title="Inserez votre commentaire"></textarea>
                                   <label for="form-text">Votre commentaire</label>
                               </div>

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
       $(document).ready(function () {
           $("time.timeago").timeago();
       });
       var token = '{{ Session::token() }}';
       var url = '{{ route('blog.edit') }}';
       var urlLike = '{{ route('like_path') }}';
   </script>
@stop