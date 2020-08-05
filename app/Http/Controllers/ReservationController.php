<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmation;
use Illuminate\Support\Facades\Mail;


class ReservationController extends Controller
{
   public function send(){

      Mail::send(New ReservationConfirmation);
       return redirect()->back();
   }
}
