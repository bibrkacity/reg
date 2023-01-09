@extends('layouts.default')

@section('title','A')

@section('css')
@parent
    <link rel="stylesheet" type="text/css" href="/css/a.css" />
@endsection

@section('content')
    <h1>Hello, {{ $data['user']->name }}</h1>

    <p>You can use unique links for game:</p>
    <ul>
    @foreach( $data['tokens'] as $one )
            <li><a  href="{{ route('game', ['zero'=>rand(1,99), 'token'=>$one['token']]) }}">{{ route('game', ['zero'=>rand(1,99), 'token'=>$one['token']]) }}</a> <a class="deactivate" href="{{ route('deactivate',['id'=>$one['id']]) }}">Deactivate</a></li>
    @endforeach
    </ul>

    <a id="new_link" href="{{ route('new_link') }}">Add new unique link</a>



@endsection
