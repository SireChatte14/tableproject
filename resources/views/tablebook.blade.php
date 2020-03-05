@extends('layouts.app')


@section('content')


<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">

  </div>
</div>
<div class                   ="container-fluid">
  <div class                 ="row justify-content-md-center">
    <div class               ="col md-4"></div>
      <form class="contact-form" action="submit" method="post">
                @csrf
                <br>
                <label> Sie möchten für </label>
                <input type  ="text" name="NumberOfPeople" placeholder="" required />
                <label> Personen reservieren ? </label><br>
                <br>

                <label> Am </label>
                <input type  ="date" style="border-radius: 5px; width: 150px ; height: 25px " name="bookingdate" placeholder="Datum" required>
                <label> Datum </label><br>
                <br>

                <label> um </label>
                <input type  ="time" style="border-radius: 5px; width: 150px ; height: 25px " name="fromtime" placeholder="Uhrzeit" required>
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

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck" name="sms" value="ja">
                  <label class="custom-control-label" for="customCheck"> Ja, ich möchte die Bestätigung per e-Mail erhalten. </label><br>
                </div>
                  <label> Mit dem Absenden der Reservierung erkläre ich mich mit den Datenschutzrechtlinien einverstanden. </label><br>
                <br>
                  <input type="text" placeholder="Vorname" name="FirstName" required ><br>
                </br>
                  <input type="text" placeholder="Nachname" name="SecondName" required ><br>
                </br>
                  <input type="text" placeholder="Telefon" name="phone" required ><br>
                <br>
                  <input type="email" style="border-radius: 5px; width: 335px ; height : 25px;" placeholder="Email" name="mail" required ><br>
                <br>
                <textarea name="message"  style="border-radius: 5px; width: 335px ; height : 100px;" placeholder="Nachricht"></textarea><br>
                <button type ="submit" style="border-radius: 5px; width: 335px ; height : 50px; background-color: green " name="submit"> Reservierung absenden </button><br>
        </form>
        <div class               ="col md-4"></div>
      </div>
    </div>

@endsection
