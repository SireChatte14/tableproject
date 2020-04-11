@extends('layouts.header')

@section('content')
    <div class="container mt-120">
        <div class="row>">
            <div class="col-12">
              @include('partials.messages')
        </div>

            @include('sweetalert::alert')

        <div class="col-12 mb-3">
            <h1> Speisekarte </h1>
            <a role="button" href="{{route('admin.MenuEdit.create')}}" class="btn btn-sm btn-outline-primary my-2">Gericht hinzufügen</a>
        </div>

            <div class="col-12 ">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th> Titel </th>
                            <th> Beschreibung</th>
                            <th> Preis </th>
                            <th> Optionen </th>
                         </tr>
                         <tr>
                            @foreach($menus->all() AS $menu)
                            <td>{{$menu->title}}</td>
                            <td>{{$menu->description}}</td>
                            <td>{{$menu->price}}</td>
                            <td>
                                <form action="{{route('admin.MenuEdit.destroy',$menu->id)}}" method="post">
                                <div class="btn-group">
                                    <button type="submit" class="btn-outline-secondary"><i class="fas fa*4 fa-trash-alt"></i></button>
                                    <a class="btn btn-outline-secondary" href="{{route('admin.MenuEdit.edit',$menu->id)}}"><i class="fas fa*3 fa-edit"></i></a>
                                </div>
                                @method('delete')
                                @csrf
                                </form>
                            </td>
                         </tr>
                    </thead>
                        @endforeach
                </table>
            </div>
        </div>

        </div>
@endsection
