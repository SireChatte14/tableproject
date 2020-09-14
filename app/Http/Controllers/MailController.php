<?php

namespace App\Http\Controllers;

use App\Mail\EmailDemo;
use App\Mail\ReservationConfirmation;

use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller

    /**
     * Store a newly created resource in storage.
     *V
     * @param Request $request
     * @return Application|RedirectResponse|\Illuminate\Http\Response|Redirector
     */

{
    public function sendEmail(Request $request ) {

        // $email = 'carsten.behmel@icloud.com';

        dd($request->all());

        $entry= [

            'bookingdate' => '20.08.2020',
            'fromtime' => '20:00',
            'tableName' => 'Tisch 1',
        ];

        Mail::to($email)->send(new EmailDemo($entry));

        return view('adminArea');
    }


}
