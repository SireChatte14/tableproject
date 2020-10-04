<?php

namespace App\Http\Controllers;

use App\entry;
use App\Mail\ReservationsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function send(Request $data)
    {

        Mail::to($data->email)->send(new ReservationsMail($data));

    }
}
