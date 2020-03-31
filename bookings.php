<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php';?>
    <!-- <srcipt src="js/vue.js"></script> -->
    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>
<style>
    .dropdown-menu .btn {
        display: block;
        text-align: left !important;
        margin-bottom: 2px;
    }

    .btn-group.btn-block {
    display: flex;
}
.btn-group.btn-block > .btn {
    flex: 1;
}

</style>

<body class="gray">
    <?php
    $mpos = 2;
    
    include 'includes/nav.php';?>

        <input type="hidden" name="c-b-i" value="0" />
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 mt-2">
                        <p><small>Manage rooms, room prices and view room availability</small></p>
                        <hr/>
                        <div class="sub-menu ">
                            <?php $sbPos =1; include 'includes/booking-menu.php';?>
                            <!--<a href="room-types.html">Room Types</a>-->
                        </div>
                        <div class="foot pt-4 pl-2 text-left">
                            <a class="btn btn-sm btn-secondary" href="#choose-booking" data-toggle="modal"  ><i class="zmdi zmdi-plus"></i> New Booking</a>
                        </div>
                        
                    </div>
                    <div class="col-10 mt-2">
                        <div class="card p-0">
                            <div class="header p-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo $title; ?>

                                    </div>


                                    <div class="col-md-9 text-right">
                                        <input class="form-control tiny" placeholder="search" oninput="searchBooking(value)" />
                                        <select class="form-control tiny" id="properties" onchange="getAllBookings()">
                                     <?php echo $propertyOptions;?>
                                </select>
                                        <!--
                                        <select class="form-control tiny" id="room-types" onchange="getAllBookings()">
    <option value="0">All room types</option>
    
                                    </select>
-->
                                    </div>
                                </div>
                            </div>
                            <div class="c-body p-0" id="bookingsprint">
                                <table class="table h table-bordered table-primary mt-0 table-hover border-bottom-0 p-3" id="tb-reservations">
                                    <thead>
                                        <tr>
                                            <th style="width:5px; padding:0"></th>
                                            <th>Res#</th>
                                            <th>Name <i class="fa fa-angle-down"></i> </th>

                                            <th>checkin</th>
                                            <th>check out</th>
                                            <th>Nights</th>
                                            <th>Guests</th>
                                            <th>Booked on </th>
                                            <!--                                            <th>Room</th>-->
                                            <th class="text-right">Total Cost</th>
                                            <!--                                            <th>Deposit</th>-->
                                            <th class="text-right" width='1px'>Bal</th>
                                            <th>Invoice#</th>
                                            <th>Source</th>

                                        </tr>
                                    </thead>
                                    <tbody>



                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="11" style="border-bottom:0;"><br><span id="bookings-pagination" class="pull-right"></span></td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>

                            <div class="c-footer">
                                <a onclick="f_bookingStatus('cancelled')"><i class="fa fa-circle text-red"></i> Cancelled</a>
                                <a onclick="f_bookingStatus('unconfirmed')"><i class="fa fa-circle-o text-disabled"></i> Un Confirmed</a>
                                <a onclick="f_bookingStatus('confirmed')"><i class="fa fa-circle-o text-green"></i> Confirmed</a>

                                <a onclick="f_bookingStatus('check-in')"><i class="fa fa-circle text-green"></i> In house</a>



                                <a class="pull-right m-1 mr-4" id="btn-print"><i class="fa fa-print text-gray"></i> Print</a>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <input name="curr-booking-satus" hidden/>
</body>


  <!-- Modal -->
  <div class="modal fade" id="choose-booking" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h6 class="modal-title">Select the type of booking</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      
        </div>
        
      
        <div class="btn-group btn-block" >
        <a class="btn btn-outline-success" href="#" onclick="openModal('#new-walk-in')">Walk In</a>
        <a class="btn btn-outline-primary" href="#" onclick="openModal('#new-booking')">Direct or Agent</a>

        </div>
          
        
      </div>
      
    </div>
  </div>




<?php include 'modals/new-booking.php'; ?>
<?php include 'modals/booking-details.php'; ?>
<?php include 'modals/preview-invoice.php';?>
<?php include 'modals/new-walk-in.php';?>




<?php include 'includes/footer.php';?>
<script>
    var yr = <?php echo date('Y');?>;
    var filter = "<?php echo isset($_GET['v']) ? $_GET['v'] : 'today'?>";

</script>
<script src="js/pages/bookings.js?v=33"></script>

<script>
    $("#tb-reservations tbody").html("<tr><td colspan=12>" + loaderBig + "</tr>");
    $('#booking-details').on('hide.bs.modal', function(e) {
        // alert("hidden")
        //if($.isFunction(getAllBookings)){
        getAllBookings();
        //}

    })

    getAllBookings();


</script>


<!-- script for printing -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  -->
<script type="text/javascript">
    $(function() {


        $("#btn-print").click(function() {
            var title = "All Reservations";
            if ($("[name=curr-booking-satus]").val() != "") {
                title = $("[name=curr-booking-satus]").val() + " Reservations";
            }

            var contents = $("#bookingsprint").html();
            printHtml(title, contents);

        });
    });

</script>
