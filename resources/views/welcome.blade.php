@extends('layouts.app')


@section('content')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <body>
        <div class="container-fluid">
            <div class="container-">
                <div class="row>">
                    <div class="col-sm-12 text-center">
                        @include('sweetalert::alert')
                    </div>
                    <div class="text-center container col-sm container-md mt-md-5">
                        <div class="col-sm">
                            <img class="img-fluid" src="{{URL::asset('img/tisch.jpg')}}" alt="Logo" style="max-width: 100% ; height: auto">
                        </div>
                        <div class="text-md-center  mt-3 " >
                            <p style="font-size: 45px;font-family:SansSerif, cursive">Salzbuger Stub`n</p>
                            <br>
                            <p style="font-size: 25px;font-family:SansSerif, cursive">Online Tischbestellung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

