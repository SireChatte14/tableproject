@component('mail::message')

Hallo,

hiermit bestättigen wir Ihre Reservierung für {{$data['NumberOfPeople']}} Personen <br>
am {{$data['bookingdate']}} um {{$data['fromtime']}}.



Thanks,<br>
{{ config('app.name') }}
@endcomponent
