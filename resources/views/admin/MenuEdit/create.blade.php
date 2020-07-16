@extends('layouts.header')

@section('content')

<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
    <strong><h1> Neues Gericht für Speisekarte </h1></strong>
  </div>
</div>

<div class                   ="container-fluid mt-md-5">
  <div class                 ="row justify-content-md-center ">
  @include('sweetalert::alert')
          <form action="{{route('admin.MenuEdit.store')}}" method="post">
                @include('admin.MenuEdit._form')

                <button type="submit" class="btn btn-dark">Gericht speichern</button>
          </form>
    </div>
</div>

@endsection
