@extends('layouts.header')

@section('content')

<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
    <h1> Speisekarte bearbeiten </h1>
  </div>
</div>

<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
          <form action="{{route('admin.TableEdit.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="uname">Nummer:</label>
                <input type="text" class="form-control" id="number" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

              <label for="uname">Beschreibung Gericht</label>
                <input type="text" class="form-control" id="menu"  required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
                <button type="submit" class="btn btn-primary">Tisch speichern</button>
          </form>

  </div>
</div>



@endsection
