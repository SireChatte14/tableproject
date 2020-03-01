@extends('layouts.header')

@section('content')


    <?php



    function build_calendar($month,$year){

            if ($month == date('F')){
                $month = date('m');
            }

        //First of we'll create an array containing nams of all days in a week

        $daysOfWeek = array('Sonntag','Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag','Samstag');


        //Then we'll get the first day of the month that is in the argument of this function

        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);



        // Now getting the number of days this month contains

        $numberDays = date('t',$firstDayOfMonth);

        // Number day

        $numberDay = date("d");

        //Getting some information about the first day of this month

        $dateComponents = getdate($firstDayOfMonth);

        // Getting the name of this month
        $monthName = $dateComponents['month'];



        // Getting the index value 0-6 of the first day of this month
        $dayOfWeek = $dateComponents['wday'];

        // Create the table tag opener and day headers
        $dateToday = date('Y-m-d');

        // Now creating The HTML table
        $calendar="<table class='table table-bordered'>";
        $calendar.="<h1>$monthName $year</h1>";
        $calendar.="<br>";
        $calendar.="<a class='btn btn-sm btn-primary'href='?month=".date('m', mktime(0,0,0,$month-1,1,$year))."&year=".date('Y', mktime(0,0,0,$month-1,1,$year))."'> << zurück </a>";
        $calendar.="<a class='btn btn-sm btn-primary'href='?month=".date('m')."&year=".date('Y')."'> aktueller Monat </a>";
        $calendar.="<a class='btn btn-sm btn-primary'href='?month=".date('m', mktime(0,0,0,$month+1,1,$year))."&year=".date('Y', mktime(0,0,0,$month+1,1,$year))."'> vor >> </a></center><br>";
        $calendar.="<br>";
        $calendar.="<tr>";

        //Creating the calendar headers
        foreach($daysOfWeek as $day){
            $calendar.="<th class='header'>$day</th>";
        }

        $calendar.="</tr><tr>";

        // the variable $dayOfWeek will make sure that there must be only 7 columns on our table

        if($dayOfWeek > 0){
            for($k=0;$k<$dayOfWeek;$k++){
                $calendar.="<td></td>";
            }
        }

        // Initiating the day counter
        $currentDay = 1;

        // Getting the month number
        $month = str_pad($month, 2,"0",STR_PAD_LEFT);

        while($currentDay <= $numberDays){

//  if seventh column (Samstag) reached, start a new row
            if($dayOfWeek == 7){
                $dayOfWeek = 0;
                $calendar.="</tr><tr>";
            }

            // Initiating the day counter
            $currentDayRel=str_pad($currentDay, 2,"0",STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";

            $dayname = strtolower(date("|",strtotime($date)));
            $eventNum = 0;
            $today = $date == date('Y-m-d')?"today":"";
            if($date<date('Y-m-d')){
                $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
            }else{
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='CalendarDay?date=".$date."' class='btn btn-success btn-xs ' type='submit'>Book</button>";
            }


            $calendar.="</td>";

            //Incrementing the counters

            $currentDay++;
            $dayOfWeek++;
        }

        //Completing the row of the last week in month , if necessary

        if($dayOfWeek!=7){
            $remainingDays = 7-$dayOfWeek;
            for($i=0;$i<$remainingDays;$i++){
                $calendar.="<td></td>";
            }
        }

        $calendar.="</tr>";
        $calendar.="</table>";

        echo $calendar;
    }
    ?>

    <html>
    <head>
        <meta name="viewport" control="with=device=width, initial-scale=1.0">

        <style>
            body {
                height: auto;
                width :100%;
                background-color: rgb(245, 229, 176);
            }
            table{
                table-layout: fixed;
            }

            td{
                width: 33%;
            }

            .today{
                background: : yellow;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if(isset($_GET['month'])&&isset($_GET['year'])){
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                }else{
                    $month = $dateComponents['month'];
                    $year = $dateComponents['year'];
                }
                echo build_calendar($month,$year);
                ?>
            </div>
        </div>
    </div>
    </body>
    </html>


@endsection

