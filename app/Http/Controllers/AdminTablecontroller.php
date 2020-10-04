<?php

namespace App\Http\Controllers;

use App\entry;
use App\Event;
use App\Mail\Email;
use App\Mail\ReservationConfirmation;
use App\table;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;


class AdminTablecontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param entry $entrys
     * @return Application|Factory|Response|View
     */
    public function index(entry $entrys)
    {

        $count = entry::count();

       if ($count > 0) {

           $entrys = entry::paginate(10);

           return view('admin.TableBook.index',compact('entrys'));

       }else{

           Alert::error('Der Datensatz wurde gelöscht');

           return redirect(route('admin.Event.index'));
       }
    }

    /**
     * Store a newly created resource in storage.
     *V
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store (Request $request)

    {
        $frometime = $request -> fromtime;
        $LengthOfStay = $request -> LengthOfStay;
        $bookingdate = $request -> bookingdate;
        $table_id = $request->table_id;

        $event = new event;
        $event -> name                  = $request->name;
        $event -> is_booked             = 1;
        $event -> entry_id              = $request -> entry_id;
        $event -> title                 = ('Tisch'.' '.$table_id);
        $event -> start                 = $this -> changefromTime($bookingdate,$frometime);
        $event -> NumberOfPeople        = $request -> NumberOfPeople;
        $event -> end                   = $this -> changeTime($bookingdate,$frometime,$LengthOfStay);
        $event -> email                 = $request -> email;
        $event -> phone                 = $request -> phone;
        $event -> description           = $request -> message;
        $event -> save();

        $title = ('Tisch'.' '.$table_id);
        $entry_id =$request->entry_id;

        $this->tableupdate($entry_id,$title);

        return redirect(route('admin.Event.index'));

    }

    public function changeTime ($bookingdate,$fromtime,$LengthOfStay){

        $var = '+'.$LengthOfStay.'minutes';

        return $bookingdate.' '.date('H:i:s',strtotime($var,strtotime($fromtime)));
    }

    public function changefromTime ($bookingdate,$fromtime) {

        return $bookingdate.date(' H:i:s',strtotime($fromtime));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $entry
     * @return Factory|View
     */
    public function edit($entry) {

        $entry = entry::findOrFail($entry);

        return view('admin.TableBook.edit', compact('entry'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param $entry_id
     * @param $title
     * @return void
     */
    public function tableupdate ($entry_id,$title)
    {
        entry::where('id',$entry_id)
            ->update([ 'tableName'=> ($title)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $entry
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($entry)
    {

        entry::where('id', $entry)
            ->delete();

        Alert::error('Der Datensatz wurde gelöscht');
        return redirect(route('admin.TableBook.index'));
    }

    public function getEntryByID($id)
    {

        $entry = Entry::find($id);

        return response()->json($entry);
    }



}
