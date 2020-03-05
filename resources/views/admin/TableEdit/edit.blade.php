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
            <form action="/admin/MenuEdit/{{$table->id}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title"   > Titel </label>
                    <input type="text" name="title" value="{{$table->title}}" class="form-control @if ($errors->has('title')) is-invalid @endif " id="title" autocomplete="off" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('title')}}</div>

                    <label for="discription"  > Gericht </label>
                    <input type="text" rows="5"  name="description" value="{{ $table->description }}" class="form-control col-md-auto @if ($errors->has('description')) is-invalid @endif " id="description'" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('description')}}</div>

                    <label for="price"  > Preis </label>
                    <input type="text" name="price" value="{{ $table->price }}" class="form-control @if ($errors->has('price')) is-invalid @endif " id="price'" autocomplete="off" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('price')}}</div>
                </div>


                <button type="submit" class="btn btn-primary">Tisch ändern</button>
            </form>
        </div>
    </div>



@endsection
