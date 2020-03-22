@extends('layouts.header')

@section('content')

    <div class                   ="container-fluid">
        <div class                 ="row justify-content-md-center">
            <h1> Tisch bearbeiten </h1>
        </div>
    </div>

    <div class                   ="container-fluid">
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
            <form action="/admin/TableEdit/{{$table->id}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title"   > Titel </label>
                    <input type="text" name="title" value="{{$table->tableNumber}}" class="form-control @if ($errors->has('tableNumber')) is-invalid @endif " id="title" autocomplete="off" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('tableNumber)}}</div>

                    <label for="discription"  > Gericht </label>
                    <input type="text" rows="5"  name="description" value="{{ $table->numberOfSeats }}" class="form-control col-md-auto @if ($errors->has('numberOfSeats')) is-invalid @endif " id="description'" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('numberOfSeats')}}</div>

                </div>

                <button type="submit" class="btn btn-primary">Tisch ändern</button>
            </form>
        </div>
    </div>



@endsection
