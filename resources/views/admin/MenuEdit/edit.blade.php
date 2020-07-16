@extends('layouts.header')

@section('content')

    <div class                   ="container-fluid">
        <div class                 ="row justify-content-md-center">
            <h1> </h1>
        </div>
    </div>
    <div class                   ="container-fluid">
        <div class                 ="row justify-content-md-center ">
            @include('sweetalert::alert')
            <form action="/admin/MenuEdit/{{$menu->id}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title"   > Titel </label>
                    <input type="text" name="title" value="{{$menu->title}}" class="form-control @if ($errors->has('title')) is-invalid @endif " id="title" autocomplete="off" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('title')}}</div>

                    <label for="discription"  > Gericht </label>
                    <input type="text" rows="5"  name="description" value="{{ $menu->description }}" class="form-control col-md-auto @if ($errors->has('description')) is-invalid @endif " id="description'" autocomplete="off" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('description')}}</div>

                    <label for="price"  > Preis </label>
                    <input type="text" row="5" name="price" value="{{ $menu->price }}" class="form-control @if ($errors->has('price')) is-invalid @endif " id="price'" autocomplete="off">

                    <label for="categorieID"  > Categorie_id </label>
                    <input type="text" name="categorieID" value="{{ $menu->categorieID }}" class="form-control col-md-auto @if ($errors->has('categorieID')) is-invalid @endif " id="categorieID'" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('categorieID')}}</div>
                </div>
                <button type="submit" class="btn btn-primary">Gericht ändern</button>
            </form>

        </div>
    </div>

@endsection
