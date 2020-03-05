@extends('layouts.header')

@section('content')

<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
    <h1> Backend Dashboard </h1>
  </div>
</div>

<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
    <h1> Speisekarte bearbeiten </h1>

    <div class="col-4">
        <ul>
            <li>GerichtID</li>
            <li>Gerichtnummer</li>
            <li>Bezeichnung</li>
            <li>Beschreibung</li>
            <li>Preis</li>
            <li>Bearbeiter</li>
            <li>Bild</li>
            <li>akti/inaktiv</li>
        </ul>
    </div>
  </div>
</div>



@endsection
