<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php'?>

    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>

<body class="gray">
    <?php
    $mpos = 2;
    include 'includes/nav.php';?>

        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 mt-2">

                        <p><small>Manage rooms, room prices and view room availability</small> </p>
                        <hr/>
                        <div class="sub-menu ">
                            <?php $sbPos =3; include 'includes/booking-menu.php'?>
                            <!--<a href="room-types.html">Room Types</a>-->


                        </div>
                        <div class="foot pt-4 pl-2 text-left">
                            <a class="btn btn-sm btn-secondary" href="#new-booking" data-toggle="modal" onclick="setIsNewBooking(true)"><i class="fa fa-plus"></i> New Booking</a>

                        </div>

                    </div>

                    <div class="col-md-10 mt-2">
                        <div class="card p-0">
                            <div class="header p-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        Today's Bookings
                                    </div>

                                    <div class="col-md-9 text-right">
                                        <select class="form-control tiny">
    <option>Primary property</option>
    
                                    </select>
                                        <select class="form-control tiny">
    <option>All room types</option>
    <option>Single Bed</option>
    <option>Double Bed Cottage</option>
    
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="c-body p-0" id="print">
                                <table class="table table-bordered table-primary mt-0 table-hover" id="tb-reservations">
                                    <thead>
                                        <tr>
                                            <th style="width:5px; padding:0"></th>
                                            <th>Name <i class="fa fa-angle-down"></i> </th>

                                            <th>checkin</th>
                                            <th>check out</th>
                                            <th>Nights</th>
                                            <th>Guests</th>
                                            <th>Booked on </th>
                                            <!--                                    <th>Room</th>-->
                                            <th>Total Cost</th>
                                            <th>Deposit</th>
                                            <th>Bal</th>
                                            <th>Source</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>

                                </table>
                            </div>
                            <div class="c-footer">
                                <a><i class="fa fa-circle text-red"></i> Cancelled</a>
                                <a><i class="fa fa-circle-o text-disabled"></i> Un Confirmed</a>
                                <a><i class="fa fa-circle-o text-green"></i> Confirmed</a>

                                <a><i class="fa fa-circle text-green"></i> In house</a>
                                <a class="pull-right m-1 mr-4" onclick="printContent('print')"><i class="fa fa-print text-gray"></i> Print</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</body>

<?php include 'modals/new-booking.php'; ?>
<?php include 'modals/booking-details.php'; ?>



<?php include 'includes/footer.php'?>
<script src="js/pages/bookings.js"></script>
<script>
    getAllBookings();


    
</script>


<!-- printing function -->
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>







 