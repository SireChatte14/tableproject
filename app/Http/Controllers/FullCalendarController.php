<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    /**
     * Show the application Full Calendar.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.fullcalendar.index');
    }
}
