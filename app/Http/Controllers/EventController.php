<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use App\Mail\ReservationConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{

    public function loadEvents (){

        $events = Event:: all();

        return response()->json($events);
    }

    public function index()
    {
        $events = DB::table('events')->get();

        return view('admin.Event.index', ['events' => $events]);

    }

    public function store(EventRequest $request){

        Event::create($request->all());

        return response()->json(true);
    }


    public function update(EventRequest $request) {

       $event = Event::where('id',$request->id)->first();

       $event->fill($request->all());

       $event->save();

       return response()->json(true);

    }

    public function destroy (Request $request) {

        Event::where('id',$request->id)->delete();

        return response()->json(true);
    }


}
