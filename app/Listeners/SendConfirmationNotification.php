<?php

namespace App\Listeners;

use App\entry;
use App\Events\confirmationEvent;
use App\Mail\ConfirmUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendConfirmationNotification


{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     public $entry_id;
     * @param confirmationEvent $event
     * @return void
     */


    public function handle(confirmationEvent $event)

    {

        Mail::to($event->entry->user->email)->send(new ConfirmUserMail(
            [

                "bookingdate" => $event->entry->related()->bookingdate,
                "fromtime"=> $event->entry->related()->fromtime,
                "tableName"=> $event->entry->related()->tableName

        ]));
    }

}
