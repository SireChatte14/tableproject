@extends('layouts.header')

@section('content')
    <div class="container mt-120">
        <div class="row>">
            <div class="col-12">
              @include('partials.messages')
        </div>

        <div class="col-12 mb-3">
            <h1> Anfragen bearbeiten </h1>
        </div>

            <div class="col-12 ">
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
                                            <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-1x fa-mail-bulk"></i></button>
                                            <a class="btn btn-outline-secondary" href="{{route('admin.TableBook.edit',$entry->id)}}"><i class="fas fa-1x fa-edit"></i></a>
                                        </div>
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


