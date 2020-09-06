@extends('layouts.header')



@section('content')

    <div class="container ">
        @include('sweetalert::alert')
    </div>

    <div class="container">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th> gebucht </th>
                <th> Name </th>
                <th> gebucht ab </th>
                <th> gebucht bis </th>
                <th> Personen </th>
                <th> Tisch </th>
            </tr>
            <tr>
                @foreach($events AS $event)
                    <th>{{$event->is_booked}}</th>
                    <th>{{$event->name}}</th>
                    <th>{{$event->start}}</th>
                    <th>{{$event->end}}</th>
                    <th>{{$event->NumberOfPeople}}</th>
                    <th>{{$event->title}}</th>
            </tr>
            </thead>
            @endforeach
        </table>
    </div>


@endsection
