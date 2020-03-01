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
                            <th> Buchungstag </th>
                            <th> Uhrzeit</th>
                            <th> Dauer</th>
                            <th> Email</th>
                            <th> Vorname</th>
                            <th> Nachname</th>
                            <th> Telefonnummer</th>
                            <th> Nachricht</th>
                            <th> Eingang </th>
                            <th> Optionen </th>
                         </tr>
                         <tr>
                            @foreach($entrys->all() AS $entry)
                                    <td>{{$entry->bookingdate}}</td>
                                    <td>{{$entry->fromtime}}</td>
                                    <td>{{$entry->LengthOfStay}}</td>
                                     <td>{{$entry->sms}}</td>
                                    <td>{{$entry->FirstName}}</td>
                                    <td>{{$entry->SecondName}}</td>
                                    <td>{{$entry->phone}}</td>
                                    <td>{{$entry->message}}</td>
                                    <td>{{$entry->created_at}}</td>
                            <td>
                                <form action="#" method="post">
                                <div class="btn-group">
                                    <button type="submit" class="btn-outline-secondary"><i class="fas fa*4 fa-trash-alt"></i></button>
                                    <a class="btn btn-outline-secondary" href="#"><i class="fas fa*3 fa-edit"></i></a>
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
