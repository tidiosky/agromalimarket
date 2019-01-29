@extends('layouts.app',['Affiche' => 'Blog'])
@section('content')
    <div class="panel panel-info">
        <div class="panel panel-header"><h1>Affiche d'article</h1></div>
        <div class="panel panel-body">
            <h2>{{ $post->name }}</h2> <br>
            {{--<p>Poster par {{ $author->name }} </p>--}}
            <p>
                @if($post->count_comment == 0)
                    Pas de commentaire <br>
                @elseif($post->count_comment == 1)
                    1 commentaire <br>
                @else
                    {{ $post->count_comment }} commentaires
                @endif
            </p>
            <p>{{ $post->content }}</p>
            <h3>Les commentaires</h3>
            @if($post->count_comment == 0)
                Pas encore de commentaire <br>
            @else
                @foreach($comments as $comment)
                    <p>Commentaire poste par {{ $comment->user->name }}</p> <br>
                    {{ $comment->content }}
                @endforeach
            @endif
        </div>
    </div>
@stop