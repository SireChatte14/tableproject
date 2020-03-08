@extends('layouts.header')

    <link href="{{ asset('css/fullcalendar/core/main.css' ) }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar/daygrid/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar/timegrid/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar/list/main.css') }}" rel="stylesheet">
    <link href="{{asset('css/fullcalendar/style.css')}}" rel="stylesheet">


@section('content')
<body>
<div id='wrap'>

    <div id='external-events'>
        <h4>Reservierung</h4>

        <div id='external-events-list'>
            <div id="idtable1" class='fc-event'>Table 1</div>
            <div id="idtable2" class='fc-event'>Table 2</div>
            <div id="idtable3" class='fc-event'>Table 3</div>
            <div id="idtable4" class='fc-event'>Table 4</div>
            <div id="idtable5" class='fc-event'>Table 5</div>
        </div>

        <p>
            <input type='checkbox' id='drop-remove' />
            <label for='drop-remove'>remove after drop</label>
        </p>
    </div>

    <div id='calendar'
         data-route-load-events="{{route('routeloadEvents') }}"
    ></div>

    <div style='clear:both'></div>

</div>

    <script src="{{ asset('js/fullcalendar/core/main.js') }}" ></script>
    <script src="{{ asset('js/fullcalendar/interaction/main.js') }}" ></script>
    <script src="{{ asset('css/fullcalendar/daygrid/main.js') }}" ></script>
    <script src="{{ asset('css/fullcalendar/timegrid/main.js') }}"></script>
    <script src="{{ asset('css/fullcalendar/list/main.js') }}" ></script>

    <script src="{{ asset('js/fullcalendar/script.js') }}" ></script>
</body>

@endsection
