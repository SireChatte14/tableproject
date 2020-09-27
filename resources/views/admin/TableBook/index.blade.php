@extends('layouts.header')

@section('content')
        <div class="card-header ">
            Reservierungsanfragen    @include('sweetalert::alert')
        </div>
        <div class="card-body">
                <table id="tableBook" class="table">
                    <thead>
                        <tr>
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
                    </thead>
                    <tbody>
                            @foreach($entrys->all() AS $entry)
                                <tr id="{{$entry->id}}">
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
                                        <form>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info" href="javascript:void(0)" onclick="emailConfirm({{$entry->id}})"><i class="fas fa-1x fa-envelope"></i></a>
                                                <a class="btn btn-outline-secondary" href=""><i class="fas fa-1x fa-check"></i></a>
                                                <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#deleteModal_{{$entry->id}}"><i class="fas fa-1x fa-trash" ></i></a>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
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

        <!-- Delete Modal -->
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

        <!-- Email Modal -->
        <div class="modal" id="emailConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="emailonfirm">Reservierung per Email bestätigen </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="emailform">
                            @csrf
                            <input type="hidden" id="id" name="id"/>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Personen</label>
                                <input type="text" class="form-control" id="NumberOfPeople"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Buchungstag</label>
                                <input type="text" class="form-control" id="bookingdate"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Uhrzeit</label>
                                <input type="text" class="form-control" id="fromtime"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Tischnummer</label>
                                <input type="text" class="form-control" id="tableName"/>
                            </div>
                            <div class="form-group">
                                <label for="name">email</label>
                                <input type="text" class="form-control" id="email"/>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <form action="{{route('EventSend',$entry->id)}}" method="post">
                            @csrf

                            <div class="btn-group">
                                <button type="submit" class="btn btn-outline-success"  > send </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>

        <script>
            function emailConfirm(id)
            {
                $.get('/entry/' +id,function(entry)
                {
                    $("#id").val(entry.id);
                    $("#name").val(entry.name);
                    $('#NumberOfPeople').val(entry.NumberOfPeople);
                    $("#bookingdate").val(entry.bookingdate);
                    $("#fromtime").val(entry.fromtime);
                    $("#tableName").val(entry.tableName);
                    $("#email").val(entry.email);
                    $("#emailConfirm").modal('toggle');
                })
            }


        </script>

@endsection


