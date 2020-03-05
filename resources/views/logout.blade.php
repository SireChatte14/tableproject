@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-4 text-center p-4">
                <img src="{{URL::asset('img/Logo.jpg')}}" alt="" style="height:250px; width: 250px">
            </div>
            <div class="col-sm-4 col-md-4 text-center p-4">
                <img src="{{URL::asset('img/tisch.jpg')}}" alt="" style="height:350px; width: 650px">
            </div>
            <div class="col-sm-4 col-md-4 text-center p-4">
                <img src="{{URL::asset('img/Haehnchen.jpg')}}" alt="" style="height:250px; width: 250px">
            </div>
        </div>
    </div>

@endsection
