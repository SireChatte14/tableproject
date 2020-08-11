@extends('layouts.header')

    <link href="{{ asset('css/fullcalendar/core/main.css' ) }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar/timegrid/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar/daygrid/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar/list/main.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css')}}" rel="stylesheet">



@section('content')
<body>

@include('admin.fullcalendar.modal-calendar')
@include('sweetalert::alert')

<div id='wrap'>

    <div id='external-events'>
        <h4>Reservierung</h4>
        <div id='external-events-list'>
            <div id="idtable1" class='fc-event'>Tisch 1 / 4 Pers.</div>
            <div id="idtable2" class='fc-event'>Tisch 2 / 6 Pers.</div>
            <div id="idtable3" class='fc-event'>Tisch 3</div>
            <div id="idtable4" class='fc-event'>Tisch 4</div>
            <div id="idtable5" class='fc-event'>Tisch 5</div>
            <div id="idtable6" class='fc-event'>Tisch 6</div>
            <div id="idtable7" class='fc-event'>Tisch 7</div>
            <div id="idtable8" class='fc-event'>Tisch 8</div>
        </div>
    </div>

    <div id='calendar'
         data-route-load-events="{{route('admin.routeLoadEvents')}}"
         data-route-event-update="{{route('admin.routeEventUpdate')}}"
         data-route-event-store="{{route('admin.routeEventStore')}}"
         data-route-event-delete="{{route('admin.routeEventDelete')}}"
    ></div>

    <div style='clear:both'></div>

</div>

<script src="{{ asset('js/fullcalendar/core/main.js') }}" ></script>

<script src="{{ asset('js/fullcalendar/interaction/main.js') }}" ></script>

<script src="{{ asset('css/fullcalendar/daygrid/main.js') }}" ></script>

<script src="{{ asset('css/fullcalendar/timegrid/main.js') }}"></script>

<script src="{{ asset('css/fullcalendar/list/main.js') }}" ></script>

<script src="{{ asset('js/fullcalendar/core/locales/de.js') }}" ></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="{{ asset('js/script.js') }}" ></script>

<script src="{{ asset('js/calendar.js') }}" ></script>

@endsection
