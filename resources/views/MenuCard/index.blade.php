@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/MenuCard.css') }}" rel="stylesheet">

    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th> Gericht</th>
                    <th> Beschreibung</th>
                    <th> Preis</th>
                </tr>
                <tr>
                    @foreach($menus->all() AS $menu)
                        <th>{{$menu->title}}</th>
                        <td>{{$menu->description}}</td>
                        <td>{{$menu->price}}</td>
                </tr>
            </thead>
            @endforeach
        </table>
    </div>

@endsection
