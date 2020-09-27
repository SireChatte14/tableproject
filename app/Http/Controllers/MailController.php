<?php

namespace App\Http\Controllers;

use App\entry;
use App\Mail\ReservationsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {

        $data = entry::find($request->id);

        $email = $data->email;

        Mail::to($email)->send(new ReservationsMail($data));

        return view('adminArea');
    }
}
