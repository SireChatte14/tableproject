@component('mail::message')

    <strong>RESERVIERUNGSBESTÄTTIGUNG</strong>

    Vielen Dank für Ihre Reservierung.

    Hiermit bestättigen wir Ihre Reservierung am {{$bookingdate}} um {{$fromtime}}.
    Reserviert ist {{$tableName}}.

    Beste Grüße,
    Dein {{config('app.name')}}-Team

@endcomponent
