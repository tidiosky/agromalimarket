@extends('layouts.app',['titre' => 'Message chat'])
@section('col-12')
    <div id="app">

        <chat-message></chat-message>
        <chat-log></chat-log>
        <chat-composer></chat-composer>
    </div>
@endsection
@section('content')

@endsection
@section('sidebar')@endsection
