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
                            <th> Buchungstag </th>
                            <th> Begin </th>
                            <th> Ende </th>
                            <th> Email </th>
                            <th> Telefonnummer</th>
                            <th> Personenanzahl </th>
                            <th> Tisch </th>
                            <th> Nachricht</th>
                            <th> Eingang </th>
                            <th> Optionen </th>
                         </tr>
                         <tr>
                            @foreach($entrys->all() AS $entry)
                                    <th>{{$entry->id}}</th>
                                    <td>{{$entry->name}}</td>
                                    <td>{{$entry->bookingdate}}</td>
                                    <td>{{$entry->fromtime}}</td>
                                    <td>{{$entry->endTime}} </td>
                                    <td>{{$entry->email}}</td>
                                    <td>{{$entry->phone}}</td>
                                    <td>{{$entry->NumberOfPeople}}</td>
                                    <td>{{$entry->tableName}}</td>
                                    <td>{{$entry->message}}</td>
                                    <td>{{$entry->created_at}}</td>
                            <td>
                                <form action="{{route('confirmation.entry',$entry->id)}}" method="post">
                                    @csrf
                                        <div class="btn-group">
                                            <a class="btn btn-outline-secondary" type="submit"><i class="fas fa-1x fa-mail-bulk" ></i></a>
                                            <a class="btn btn-outline-secondary" href="{{route('admin.TableBook.edit',$entry->id)}}"><i class="fas fa-1x fa-edit"></i></a>
                                            <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#deleteModal_{{$entry->id}}"><i class="fas fa-1x fa-trash" ></i></a>
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
                    {{ $entrys->links() }}
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="deleteModal_{{$entry->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal_{{$entry->id}}">Datensatz von "{{$entry->name}}" löschen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Wollen Sie diesen Datensatz tatsächlich löschen ?
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('admin.TableBook.destroy',$entry->id)}}" method="post">
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


