@extends('layouts.header')

@section('content')

<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
    <strong><h1> Neues Gericht für Speisekarte </h1></strong>
  </div>
</div>

<div class                   ="container-fluid mt-md-5">
  <div class                 ="row justify-content-md-center ">
      @if($errors->any())
          <div class="alert alert-danger" role="alert">
              <ul>
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
          <form action="{{route('admin.MenuEdit.store')}}" method="post">
                @include('admin.MenuEdit._form')

                <button type="submit" class="btn btn-dark">Gericht speichern</button>
          </form>
    </div>
</div>



@endsection
