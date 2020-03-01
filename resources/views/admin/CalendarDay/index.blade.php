@extends('layouts.header')

@section('content')
    <?php



    $duration = 15;
    $cleanup = 0;
    $start = "09:00";
    $end = "22:30";
    $date = $_GET['date'];


    function timeslots($duration,$cleanup,$start,$end) {

        $start = new DateTime($start);
        $end = new DateTime($end);
        $interval = new DateInterval("PT".$duration."M");
        $cleanupInterval = new DateInterval("PT".$cleanup."M");
        $slots = array();


        for($intStart = $start; $intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
            $endPeriod = clone $intStart;
            $endPeriod -> add($interval);
            if ($endPeriod>$end) {
                break;
            }
            $slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
        }
        return $slots;
    }

    ?>

    <head>
        <meta name="viewport" control="with=device=width, initial-scale=1.0">


    <style>
        body {
            height: auto;
            width :100%;
            background-color: rgb(245, 229, 176);
        }
    </style>

    </head>

    <body>
    <div class="container">
        <h1 class="text-center">Tischreservierung für den  <?php echo date('m/d/Y',strtotime ($date)); ?> </h1><hr>
        <div class="row">
            @csrf
            <?php $timeslots = timeslots($duration,$cleanup,$start,$end);

            foreach ($timeslots as $ts) {


            ?>
            <div class="col-md-2">
                <div class="form-group">
                <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Booking: <span id="slot"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <form action="" method="post">
                                <div class="form-group">
                                    <lable for="">Timslot</lable>
                                    <input class="input-lg"  required type="text" readonly name="tomeslot" id="timeslot" class="form-control">
                                </div>
                                <div class="form-group">
                                    <lable for="">Name</lable>
                                    <input class="input-lg" required type="text"  name="name"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <lable for="">Email</lable>
                                    <input class="input-lg" required type="text"  name="email"  class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"  name="submit">Reservieren</button>
                    <button class="btn btn-danger"  data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrap.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

    <script>
        $(".book").click(function () {
            var timeslot=$(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        })


    </script>

    </body>

@endsection
