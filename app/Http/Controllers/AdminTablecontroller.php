<?php

namespace App\Http\Controllers;

use App\entry;
use App\Event;
use App\Events\confirmationEvent;
use App\Mail\ConfirmUser;
use App\Mail\ConfirmUserMail;
use App\Mail\WelcomeUser;
use App\table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminTablecontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param entry $entrys
     * @return \Illuminate\Http\Response
     */
    public function index(entry $entrys)
    {
        return view('admin.TableBook.index',compact('entrys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {

        $frometime = $request -> fromtime;
        $LengthOfStay = $request -> LengthOfStay;
        $bookingdate = $request -> bookingdate;
        $table_id = $request->table_id;

        $event = new event;
        $event -> name                  = $request->name;
        $event -> title                 = ('Tisch'.' '.$table_id);
        $event -> start                 = $this -> changefromTime($bookingdate,$frometime);
        $event-> NumberOfPeople         = $request -> NumberOfPeople;
        $event-> end                    = $this -> changeTime($bookingdate,$frometime,$LengthOfStay);
        $event-> color                  = $this ->changeColor($table_id);
        $event -> phone                 = $request -> phone;
        $event -> description           = $request -> message;
        $event->save();

        return redirect(route('admin.fullcalendar.index'));

    }

    public function changeTime ($bookingdate,$fromtime,$LengthOfStay){

        $var = '+'.$LengthOfStay.'minutes';

        $end = $bookingdate.' '.date('H:i:s',strtotime($var,strtotime($fromtime)));

        return $end;
    }

    public function changefromTime ($bookingdate,$fromtime) {

        $start = $bookingdate.date(' H:i:s',strtotime($fromtime));

        return $start;
    }

    public function changeColor ($table_id) {

        $data = table:: where('tableNumber',$table_id)->first();

        $color = $data->color;

        return $color;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $entry
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($entry) {

        $entry = entry::findOrFail($entry);

        return view('admin.TableBook.edit', compact('entry'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($entry)
    {
        entry::where('id',$entry)
            ->delete();

        $user = Auth::User();
        Mail::to('email@email.com')->send(new ConfirmUserMail($user));

        return redirect(route('admin.TableBook.index'))->withsuccess('Die Reservierung  wurde per E-mail dem Kunden bestätigt');
    }

    public function loadEntrys(){

        $entrys = EntryController:: all();

        return response() ->json($entrys);
    }



}
