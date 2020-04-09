<?php

namespace App\Http\Controllers;

use App\entry;
use App\Event;
use App\table;
use Illuminate\Http\Request;


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

        $count = entry::count();

       if ($count > 0) {

           $entrys = entry::paginate(10);

           return view('admin.TableBook.index',compact('entrys'));

       }else{

           return redirect(route('admin.fullcalendar.index'));
       }


    }

    /**
     * Store a newly created resource in storage.
     *V
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
        $event -> is_booked             = 1;
        $event -> entry_id              = $request -> entry_id;
        $event -> title                 = ('Tisch'.' '.$table_id);
        $event -> start                 = $this -> changefromTime($bookingdate,$frometime);
        $event -> NumberOfPeople        = $request -> NumberOfPeople;
        $event -> end                   = $this -> changeTime($bookingdate,$frometime,$LengthOfStay);
        $event -> color                 = $this ->changeColor($table_id);
        $event -> email                 = $request -> email;
        $event -> phone                 = $request -> phone;
        $event -> description           = $request -> message;
        $event -> save();

        $title = ('Tisch'.' '.$table_id);
        $entry_id =$request->entry_id;

        $this->tableupdate($entry_id,$title);

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
     * @param \Illuminate\Http\Request $request
     * @param $entry
     * @return \Illuminate\Http\Response
     */
    public function tableupdate ($entry_id,$title)
    {
        entry::where('id',$entry_id)
            ->update([ 'tableName'=> ($title)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($entry)
    {

        entry::where('id', $entry)
            ->delete();

        return redirect(route('admin.TableBook.index'))->withsuccess('Der Datensatz ist gelöscht');
    }




}
