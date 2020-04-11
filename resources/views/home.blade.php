@extends('layouts.app')

@section('content')

<body>
<div class="row>">
    <div class="col-12 text-center">
        @include('sweetalert::alert')
    </div>
    <div class="container container-md mt-md-5">
        <div>
            <img class="img-fluid" src="{{URL::asset('img/tisch.jpg')}}" alt="Logo" style="max-width: 100% ; height: auto">
        </div>
    </div>
</div>
</body>
@endsection

