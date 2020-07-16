<?php

namespace App\Http\Controllers;

use App\Confirmations;
use App\entry;
use App\Events\confirmationEvent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ConfirmationsController extends Controller
{


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function entry ( entry $entry)
    {

        if($entry->isConfirmed())
        {

            Alert::info('Die Reservierung ist bereits bestätigt !');

            return redirect()->back();

        }
        else
            {

            $confirmation = $entry->confirm();

                    event(new confirmationEvent($confirmation));

                Alert::success('Die Reservierung wurde bestätigt.');

                        return redirect()->back();
        }

    }

}
