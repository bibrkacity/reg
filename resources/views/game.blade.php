@extends('layouts.default')

@section('title','Game')

@section('css')
@parent
    <link rel="stylesheet" type="text/css" href="/css/game.css" />
@endsection

@section('js')
    @parent
    <script type="text/javascript">
        function lucky()
        {
            let iframe = frames[0];
            iframe.location.href='{{ route('lucky',['token'=>$data['token']])  }}';
        }
        function GameHistory()
        {
            let iframe = frames[0];
            iframe.location.href='{{ route('history',['token'=>$data['token']])  }}';
        }
    </script>
@endsection

@section('content')
    <h1>Hello, {{ $data['user']->name }}</h1>

    <p><input type="button" value="Im feeling lucky" onclick="lucky()" /></p>
    <p><input type="button" value="History" onclick="GameHistory()" /></p>

    <iframe style="border:none;width:300px;height:150px"></iframe>

@endsection
