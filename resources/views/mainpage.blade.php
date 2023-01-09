@extends('layouts.default')

@section('title','Main page')

@section('css')
@parent
    <link rel="stylesheet" type="text/css" href="/css/mainpage.css" />
@endsection

@section('content')
    <div id="form">
        <form method="post" action="{{ route('link') }}">
            {!! csrf_field() !!}
          <div>
            <div>
                <div>
                    Username
                </div>
                <div>
                    <input type="text" name="name" required="required" />
                </div>
            </div>
            <div>
                <div>
                    Phone number
                </div>
                <div>
                    <input type="tel" name="phone" required="required" />
                </div>
            </div>
            <div>
                <div>
                    <input type="submit" value="Register" />
                </div>
            </div>
          </div>
        </form>
    </div>


@endsection
