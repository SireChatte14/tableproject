@component('mail::message')

    Willkomen {{ $name }} beim {{config('app.name')}} !

    Danke für die Registrierung. Wir wünschen
    dir viel Spaß.



    Beste Grüße,
    Dein {{config('app.name')}}-Team

    @endcomponent


