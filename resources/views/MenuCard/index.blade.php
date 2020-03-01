@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/MenuCard.css') }}" rel="stylesheet">


    @foreach($menus->all() AS $menu)

                    <div class="row" >
                        <div class="col-md-2" ></div>


                        <div class="col-md-8">
                            <div class="menucard">
                                 <br>
                                 <p>{{$menu->title}}</p>
                                <br>
                                 <p>{{$menu->description}}</p>
                                 <br>
                                 <p>{{$menu->price}}</p>
                                 <br>
                                 <spann>----------------------------------------------------</spann>
                                 <br>
                            </div>
                        </div>

                        <div class="col-md-2"></div>
                    </div>


    @endforeach

@endsection
