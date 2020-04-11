@extends('layouts.app')


@section('content')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <body>
    <div class="row>">
        <div class="col-12 text-center">
            @include('partials.messages')
        </div>
        <div class="container container-md mt-md-5">
            <div style="text-align: center">
                <img class="img-fluid" src="{{URL::asset('img/tisch.jpg')}}" alt="Logo" style="max-width: 100% ; height: auto">
                    <div id="einblenden">Grüß Gott in der Salzburger Stub'n</div>
            </div>
        </div>
    </div>
    </body>
@endsection

