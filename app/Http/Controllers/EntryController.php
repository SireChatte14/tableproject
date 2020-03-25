<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\entry;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $frometime = $request -> fromtime;
        $LengthOfStay = $request -> LengthOfStay;

        $entry = new Entry;
        $entry-> NumberOfPeople         = $request -> NumberOfPeople;
        $entry -> bookingdate           = $request -> bookingdate;
        $entry -> fromtime              = $this -> changefromTime($frometime);
        $entry-> LengthOfStay           = $request -> LengthOfStay;
        $entry-> endTime                = $this -> changeTime($frometime,$LengthOfStay);
        $entry -> email                 = $request -> email;
        $entry -> name                  = $request -> name;
        $entry -> phone                 = $request -> phone;
        $entry -> message               = $request -> message;
        $entry->save();

        return redirect(route('home'));
    }



    public function loadEntrys(){

        $entrys = EntryController:: all();

        return response() ->json($entrys);
    }

    public function changeTime ($fromtime,$LengthOfStay){

        $var = '+'.$LengthOfStay.'minutes';

       $end = date('H:i:s',strtotime($var,strtotime($fromtime)));

       return $end;
    }

    public function changefromTime ($fromtime) {

        $start = date('H:i:s',strtotime($fromtime));

        return $start;
    }
}
