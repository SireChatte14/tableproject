@extends('layouts.header')

@section('content')

    <div class                   ="container-fluid">
        <div class                 ="row justify-content-md-center">
            <h1> Reservierung bearbeiten </h1>
        </div>
    </div>
    <div class                   ="container-fluid" style="padding-top: 20px ">
        <div class                 ="row justify-content-md-center ">
          @include('sweetalert::alert')
            <form>
                @csrf
                <div class="form-group">

                    <label for="entry_id"   > Reservierungs ID </label>
                    <input type="text" name="entry_id" value="{{$entry->id}}" class="form-control @if ($errors->has('name')) is-invalid @endif " id="entry_id" autocomplete="off" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('entry_id')}}</div>

                    <label for="name"   > Name </label>
                    <input type="text" name="name" value="{{$entry->name}}" class="form-control @if ($errors->has('name')) is-invalid @endif " id="name" autocomplete="off" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>

                    <label for="bookingdate"  > Ab </label>
                    <input type="text" name="bookingdate" value="{{ $entry->bookingdate }}" class="form-control col-md-auto @if ($errors->has('bookingdate')) is-invalid @endif " id="bookingdate" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('bookingdate')}}</div>

                    <label for="fromtime"  > Ab </label>
                    <input type="text" name="fromtime" value="{{ $entry->fromtime }}" class="form-control col-md-auto @if ($errors->has('fromtime')) is-invalid @endif " id="fromtime" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('fromtime')}}</div>

                    <label for="LengthOfStay"  > Dauer (min) </label>
                    <input type="text" name="LengthOfStay" value="{{ $entry->LengthOfStay }}" class="form-control col-md-auto @if ($errors->has('LengthOfStay')) is-invalid @endif " id="LengthOfStay" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('LengthOfStay')}}</div>

                    <label for="endTime"  > bis </label>
                    <input type="text" name="endTime" value="{{ $entry->endTime }}" class="form-control col-md-auto @if ($errors->has('endTime')) is-invalid @endif " id="endTime" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('endTime')}}</div>

                    <label for="NumberOfPeople"  > Personen </label>
                    <input type="text" name="NumberOfPeople" value="{{ $entry->NumberOfPeople }}" class="form-control col-md-auto @if ($errors->has('NumberOfPeople')) is-invalid @endif " id="NumberOfPeople" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('NumberOfPeople')}}</div>

                    <label for="phone"  > Telefon </label>
                    <input type="text" name="phone" value="{{ $entry->phone }}" class="form-control col-md-auto @if ($errors->has('phone')) is-invalid @endif " id="phone" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('phone')}}</div>

                    <label for="email"  > email </label>
                    <input type="email" name="email" value="{{ $entry->email }}" class="form-control col-md-auto @if ($errors->has('email')) is-invalid @endif " id="email" required></input>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>

                    <label for="table_id"  > Tisch Nummer</label>
                    <input type="text" name="table_id" value="{{ $entry->table_id }}" class="form-control col-md-auto" id="table_id" required></input>

                    <label for="message"  > Nachricht </label>
                    <textarea type="text" row="5" name="message" value="{{ $entry->message}}" class="form-control col-md-auto @if ($errors->has('message')) is-invalid @endif " id="message'"></textarea>
                </div>
                <a class="btn btn-outline-secondary" href="{{route('confirmation.entry',$entry->id)}}"><i class="fas fa-1x fa-check"></i></a>
            </form>
        </div>
    </div>



@endsection
