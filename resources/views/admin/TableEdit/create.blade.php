@extends('layouts.header')

@section('content')

<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
    <h1> Neuen Tisch hinzufügen </h1>
  </div>
</div>

<div class                   ="container-fluid p-4" >
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
          <form action="{{route('admin.TableEdit.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="number"   > Tischnummer </label>
                <input type="text" name="tableNumber" class="form-control" id="tableNumber" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

              <label for="numberOfSeats"  > Anzahl der Sitzplätze </label>
                <input type="text"  name="numberOfSeats" class="form-control" id="numberOfSeats'" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

                <label for="color"  > Tisch Kalenderfarbe </label>
                <input type="color"  name="color" class="form-control" id="color'" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>



            </div>
                <button type="submit" class="btn btn-primary">Tisch speichern</button>
          </form>
  </div>
</div>



@endsection
