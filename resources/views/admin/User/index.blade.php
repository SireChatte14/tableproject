@extends('layouts.header')

@section('content')
        <div class="container ">
                @include('sweetalert::alert')
        </div>
        <div class="container-fluid">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th> Name</th>
                            <th> Email </th>
                            <th> Telefon</th>
                            <th> Angemeldet seit</th>
                         </tr>
                         <tr>
                            @foreach($users->all() AS $user)
                                    <th>{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <th></th>
                            <td>
                                <form>
                                    @csrf
                                        <div class="btn-group">
                                            <a class="btn btn-outline-secondary" href="{{route('admin.User.edit',$user->id)}}"><i class="fas fa-1x fa-edit"></i></a>
                                            <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#deleteModal_{{$user->id}}"><i class="fas fa-1x fa-trash" ></i></a>
                                        </div>
                                </form>
                            </td>
                         </tr>
                    </thead>
                        @endforeach
                </table>
            </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    {{ $users->links() }}
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="deleteModal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal_{{$user->id}}">Datensatz von "{{$user->name}}" löschen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Wollen Sie diesen Datensatz tatsächlich löschen ?
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('admin.User.destroy',$user->id)}}" method="post">
                            @method('delete')
                            @csrf
                        <div class="btn-group">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" > Abbrechen </button>
                          <button type="submit" class="btn btn-danger" > Löschen </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
@endsection


