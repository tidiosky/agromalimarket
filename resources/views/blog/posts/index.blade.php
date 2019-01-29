@extends("layouts.app")
@section('content')
    <h1>Liste d'article</h1>
    @foreach($posts as $post)
        <a href="{{ route('blog.post.show',$post->slug) }}">
            <h4>{{ $post->name }}</h4>
        </a>
    @endforeach
@stop