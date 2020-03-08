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
        $entry = new Entry;
        $entry-> NumberOfPeople   = $request -> NumberOfPeople;
        $entry -> bookingdate           = $request -> bookingdate;
        $entry -> fromtime              = $request -> fromtime;
        $entry-> LengthOfStay           = $request -> LengthOfStay;
        $entry -> sms                   = $request -> sms;
        $entry -> FirstName             = $request -> FirstName;
        $entry-> SecondName             = $request -> SecondName;
        $entry -> phone                 = $request -> phone;
        $entry -> message               = $request -> message;
        $entry->save();

        return redirect(route('home'));
    }

    public function loadEntrys(){

        $entrys = EntryController:: all();

        return response() ->json($entrys);
    }
}
