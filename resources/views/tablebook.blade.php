@extends('layouts.app')


@section('content')


<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
      <form class="contact-form" action="submit" method="post">
                @csrf
                <br>
                <label> Sie möchten für </label>
                <input type  ="text" name="NumberOfPeople" placeholder="" style="width: 25px" required />
                <label> Personen reservieren ? </label><br>
                <br>

                <label> Am </label>
                <input type  ="date" style="border-radius: 5px; width: 150px ; height: 25px " name="bookingdate" placeholder="Datum" required>
                <label> Datum </label><br>
                <br>

                <label> ab </label>
                <input  type  ="time" style="border-radius: 5px; width: 80px ; height: 25px " name="fromtime" placeholder="Uhrzeit" required>
                <label> Uhr </label><br>
                <br>
                <label> Wie lange denken Sie, wollen Sie bleiben ? </label><br>

                <br>
                <input type="radio" name="LengthOfStay" value="60"> 60min  <input type="radio" name="LengthOfStay" value="90">   90min <br>
                <br>
                <input type="radio" name="LengthOfStay" value="120">  120min   <input type="radio" name="LengthOfStay" value="150">   150min <br>
                <br>
                <input type="radio" name="LengthOfStay" value="180">  180min   <input type="radio" name="LengthOfStay" value="240">   240min <br>
                <br>

                  <label> Mit dem Absenden der Reservierung erkläre ich mich  </label><br>
                  <label> mit den Datenschutzrechtlinien einverstanden. </label><br>
                <br>
                  <input type="text" placeholder="Name" name="name" value="{{auth()->user()->name ?? 'Name'}}" required readonly><br>

                <br>
                  <input type="text" placeholder="Telefon" name="phone" value="{{auth()->user()->phone??'phone'}}" required readonly><br>
                <br>
                  <input type="email" style="border-radius: 5px; width: 335px ; height : 25px;" placeholder="Email" name="email" value="{{auth()->user()->email??'email'}}" required readonly><br>

                <br>
                <textarea name="message"  style="border-radius: 5px; width: 335px ; height : 100px;" placeholder="Nachricht"></textarea>
                <br>
                <br>
                <button type ="submit" style="border-radius: 5px; width: 335px ; height : 50px; background-color: green " name="submit"> Reservierung absenden </button><br>
                <input type="hidden" style="border-radius: 5px; width: 35px ; height : 25px;" placeholder="id" name="user_id" value="{{auth()->user()->id??'id'}}" required readonly><br>
                <br>
        </form>
    </div>

@endsection
