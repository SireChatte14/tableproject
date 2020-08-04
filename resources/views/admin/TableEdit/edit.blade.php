@extends('layouts.header')

@section('content')

    <div class                   ="container-fluid">
        <div class               ="row justify-content-md-center">
            <h1> Tisch bearbeiten </h1>
        </div>
    </div>

    <div class                   ="container-fluid">
        <div class                 ="row justify-content-md-center ">
          @include('sweetalert::alert')
            <form action="/admin/TableEdit/{{$table->id}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="tableNumber"   > Tischnummer</label>
                    <input type="text" name="tableNumber" value="{{$table->tableNumber}}" class="form-control @if ($errors->has('tableNumber')) is-invalid @endif " id="tableNumber" autocomplete="off" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('tableNumber')}}</div>

                    <label for="numberOfSeats"  > Anzahl Sitzplätze </label>
                    <label for="numberOfSeats'"></label><input type="text" name="numberOfSeats" value="{{ $table->numberOfSeats }}" class="form-control col-md-auto @if ($errors->has('numberOfSeats')) is-invalid @endif " id="numberOfSeats'" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('numberOfSeats')}}</div>

                    <label for="color" > Farbe </label>
                    <label for="color'"></label><input type="color" name="color" value="{{ $table->color }}" class="form-control @if ($errors->has('color')) is-invalid @endif " id="color'" autocomplete="off">
                </div>

                <button type="submit" class="btn btn-primary"> ändern </button>
            </form>
        </div>
    </div>


@endsection
