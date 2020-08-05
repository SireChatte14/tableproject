@extends('layouts.app')

@section('content')

<body>

    <div class="container-">
        <div class="row>">
            <div class="col-sm-12 text-center">
                @include('sweetalert::alert')
            </div>
            <div class="container text-center col-sm container-md mt-md-5">
                <img class="img-fluid" src="{{URL::asset('img/tisch.jpg')}}" alt="Logo" style="max-width: 100% ; height: auto">
            </div>
            <div class="text-md-center mt-3">
                <p style="font-size: 45px;font-family:SansSerif, cursive">Salzbuger Stub`n</p>
                <br>
                <p style="font-size: 25px;font-family:SansSerif, cursive">Online Tischbestellung</p>
            </div>
        </div>
    </div>

</body>
@endsection

