<style>
    .modal-full {
        min-width: 100%;
        margin: 0;
    }

    .side {

        font-style: normal;
        color: #606060;
        font-size: 14px;
        background: #fff;
        line-height: 1.5;
        padding: 20px 20px 30px;
        border-radius: 4px !important;
        box-shadow: 0 2px 0 rgba(0, 0, 0, .06);
    }


    .sided {

        font-style: normal;
        color: #606060;
        font-size: 14px;
        background: #fff;
        line-height: 1.5;
        /* padding: 10px 10px 20px; */
        border-radius: 4px !important;
        box-shadow: 0 2px 0 rgba(0, 0, 0, .06);
    }

    table tr td.icon {
        font-size: 1.03846rem;
        width: 28px;
        line-height: 1;
    }

    table tr td {
        padding: .615385rem 0;
        font-size: 9pt;
    }


    table tr td.item {
        font-size: 0.977rem;
        width: 34%;
    }

    .b-head {
        margin: 0 0 2px 0;
        font-size: 12pt;
        font-weight: 700;
        color: #555e5f;
    }


    .b-btn {
        background: #fff;
        font-size: 9pt;
        padding: 6px 10px 7px 8px;
        margin: 0 10px 5px 0;
        text-decoration: none;
        display: block;
        float: left;
        white-space: nowrap;
        border-radius: 4px !important;
        text-transform: uppercase;
        border: 1px solid #5f8398;
        color: #5f8398;
        line-height: 1.2;
        transition: all .2s ease;
    }

    .b-btn:hover {
        background: #601442;
        font-size: 9pt;
        padding: 6px 10px 7px 8px;
        margin: 0 10px 5px 0;
        text-decoration: none;
        display: block;
        float: left;
        white-space: nowrap;
        border-radius: 4px;
        text-transform: uppercase;
        border: 1px solid #5f8398;
        color: #fff !important;
        line-height: 1.2;
        transition: all .2s ease;
    }

    .b-btnx {
        background: #fff;
        font-size: 9pt;
        padding: 6px 10px 7px 8px;
        margin: 0 10px 5px 0;
        text-decoration: none;
        display: block;
        float: left;
        white-space: nowrap;
        border-radius: 4px !important;
        text-transform: uppercase;
        border: 1px solid firebrick;
        color: firebrick !important;
        line-height: 1.2;
        transition: all .2s ease;
    }

    .b-btnx:hover {
        background: firebrick;
        font-size: 9pt;
        padding: 6px 10px 7px 8px;
        margin: 0 10px 5px 0;
        text-decoration: none;
        display: block;
        float: left;
        white-space: nowrap;
        border-radius: 4px;
        text-transform: uppercase;
        border: 1px solid firebrick;
        color: #fff !important;
        line-height: 1.2;
        transition: all .2s ease;
    }

    .badge-light {
        color: grey;
        background-color: #DFF3FA;
    }

    .badge {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem !important;
    }

    .badge-light:hover {
        color: aliceblue;
        background-color: #45575D;
    }

    .form-check-label {
        /* padding-left:3px; */
    }

    .form-check-input {
        /* margin-top:0px; */
        margin-left: 0px;
    }

    .btn-e {
        background: transparent;
        height: 25px;
        width: 25px;
        border-radius: 25px;
        line-height: 25px;
        border-radius: 25px !important;
        display: inline-block;
        padding: 0;
        border: solid 0px #aaa;
        text-align: center;
        opacity: 1;
    }

    .btn-e:hover {

        background: rgba(0, 0, 0, 0.2);
        height: 25px;
        width: 25px;
        border-radius: 25px;
        line-height: 25px;
        border-radius: 25px !important;
        display: inline-block;
        padding: 0;
        border: solid 0px #aaa;
        text-align: center;
        opacity: 1;
    }

    .btn-cancels {

        background: red;
        font-size: 9pt;
        padding: 6px 10px 7px 8px;
        margin: 0 10px 5px 0;
        text-decoration: none;
        display: block;
        float: left;
        white-space: nowrap;
        border-radius: 4px !important;
        text-transform: uppercase;
        border: 1px solid red;
        color: #fff !important;
        line-height: 1.2;
        transition: all .2s ease;
    }



    .modal-footer {
        padding: 15px;
        text-align: right;
        border-top: 1px solid #FAF9F8;
        /* border-top:0px !important; */
    }

    .sided table {
        background: #f9f9f9;
    }

    .dropdown-menu.invoice-opt {
        border-radius: 5px !important;
        overflow: hidden;
        width: 250px;
        top: -100% !important;
    }

    .dropdown-menu.invoice-opt .header {
        padding: 10px;
        background: #f0f0f0;
    }

    .dropdown-menu.invoice-opt .body {
        padding: 10px;
    }

    .dropdown-menu.invoice-opt .foot {
        padding: 5px;
    }

    .simple-menu {
        border-radius: 4px !important;
    }

    .simple-menu .menu-item {
        padding: 10px 10px;
        border-radius: 4px !important;
        display: block;
        opacity: 0.8;
    }

    .simple-menu .menu-item:hover {
        background: #eee;
    }

    .table-editable select {
        border: none !important;
        width: 100%;
        padding: 6px;

    }

    .table-editable td {
        padding: 0 !important;
        opacity: 0.7;

    }


    #ar_tb-free-rooms td .form-control {
        border: 1px solid #eee;
    }

    .table tr.selected td b {
        color: green;
    }

    tr.selected .btn {
        background: #494;
        color: #fff !important;
    }

    tr.selected .btn-label-default {
        background: #004D40;
        color: #fff !important;
    }

    .chosen-container {
        position: relative;
    }

    .chosen-container:after {
        position: absolute;
        content: "\f0d7";
        font-family: "Font Awesome 5 solid", "FontAwesome";
        z-index: 2;
        right: 5px;
        top: 7px;
        width: 10px;
        height: 10px;
    }


</style>

<link rel="stylesheet" type="text/css" href="summernote/summernote-bs4.css" />


<?php
/*load settings*/
//    1.email templates
    $templates = DB::query("select * from email_notification_template_tb where company_id = %i",$company_id);
//    var_dump($templates);
    
//   2.kids rates
    $w = new WhereClause('and');
    $w->add("company_id = %i",$company_id);
    $w->add("status = %s","deleted");
    $w->negateLast();
    
    $kids_rates = DB::query("select * from kids_rates_tb where %l",$w);
    //var_dump($kids_rates);
    
// 2.Bed rates
    $w = new WhereClause('and');
    $w->add("company_id = %i",$company_id);
    $w->add("status = %s","1");
    $bed_rates = DB::query("select * from extra_beds_tb where %l",$w);
//    var_dump($bed_rates);

    

$po = DB::queryFirstRow("select * from invoice_template_tb where company_id=%i", $company_id);
//$po = json_decode($po['payments'], true);
$payment_options="<option>Select</option>";

$p = json_decode($po['payments'], true);
//echo "<script>console.log(".$po.");alert(".print_r($p[0]).")</script>";

foreach($p as $o){
    $payment_options.="<option>". $o['bank_name']."</option>";
}

    ?>




    <!-- modal for details -->

    <div class="modal animated zoomIn" id="booking-details" role="dialog">


        <div class="modal-dialog modal-full" role="document">

            <div class="modal-content">

                <div class="modal-header p-0">
                    <h5 class="pl-5"><span id="d-booking-reference"></span> - <span id="d-name-title"></span></h5> <span style="font-size:10px; color:#0D3F0C">This booking was made on <b><span id="track-date">25th jan 2018</span></b> (<span style="color:#220D61" id="track-bsource"></span>)<a class="btn-link ml-4" onclick="printBooking()"><i class="fa fa-print"></i> Print</a>
                    </span>

                    <!-- by <span id="track-user">Username</span></b></span> -->

                    <button type="button" class="close  py-3 px-4 text-danger btn btn-secondary" data-dismiss="modal" aria-label="Close">
             <i class="fa fa-close"></i>
            </button>
                </div>


                <div class="modal-body p-0 pt-2">
                    <br> <br>

                    <div class="" style="background-color:#faf7f3;">

                        <div class="row m-0">




                            <div class="col-md-4 mt-3">

                                <div class="side">

                                    <div class="p-3" style="background-color:#F5F8FC">

                                        <h6 class="b-head">Reservation Status</h6>

                                        <div class="jumbotron p-2 m-0 dropdown clearfix">
                                            <span class="d-status" id="d-status"><i class="fa fa-circle-o text-disabled"></i> Un Confirmed</span>
                                            <a class="btn btn-sm btn-warning pull-right b-period" data-toggle="dropdown">change</a>
                                            <div class="dropdown-menu p-0 dropdown-menu-right r-status">
                                                <a class="dropdown-item" onclick="" data-status="unconfirmed"><i class="fa fa-circle-o text-disabled"></i> Unconfirmed</a>
                                                <a class="dropdown-item" data-status="confirmed"><i class="fa fa-circle-o text-green"></i> Confirmed</a>
                                                <a class="dropdown-item" data-status="check-in"><i class="fa fa-circle text-green"></i> In House</a>
                                                <a class="dropdown-item" data-status="cancelled"><i class="fa fa-circle text-red"></i> Cancelled</a>
                                            </div>
                                        </div>

                                        <div class="row mt-3 hide">
                                            <div class="col-md-6">

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label mt-0" for="inlineCheckbox1">Checked-In</label>
                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label mt-0" for="inlineCheckbox2">Checked-Out</label>
                                                </div>
                                            </div>

                                        </div>






                                    </div>





                                    <div class="mt-3 p-2" style="background-color:#f5f5f5">
                                        <h6 class="afh b-head">Contact Details <small style="font-size:11px;" id="editable_contacts"></small></h6>

                                        <div id="booking-contacts">
                                            <table class="no-border no-strip skills p-0">
                                                <tbody class="no-border-x no-border-y" id="contact_s">
                                                    <!--<tr>
                                                        <td class="icon"><span class="fa fa-user-o"></span></td>
                                                        <td class="item">Names</td>
                                                        <td><span id="d-name" style="color:#475B63">jjgjgjjg</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="icon"><span class="fa fa-map-pin"></span></td>
                                                        <td class="item">Address</td>
                                                        <td> <span style="color:#475B63">16 September 1989</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="icon"><span class="fa fa-mobile-phone"></span></td>
                                                        <td class="item">Mobile</td>
                                                        <td> <span style="color:#475B63">92838381989</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="icon"><span class="fa fa-envelope-o"></span></td>
                                                        <td class="item">Email</td>
                                                        <td> <span style="color:#475B63" id="d-email">always@nbs.com</span></td>
                                                    </tr>-->
                                                    <!-- <tr>
                        <td class="icon"><span class="icon s7-map-marker"></span></td>
                        <td class="item">Location</td>
                        <td> <a href="#">Montreal, Canada</a></td>
                      </tr> -->
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>


                                    <div class="mt-2 p-3" style="background-color:#e6efee;">

                                        <div class="row" id="booking-dates">
                                            <div class="col-md-6">

                                                <p style="font-size:14px;"><i class="fa fa-calendar"></i> Check-in</p>
                                                <p style="font-size:13px; font-weight:700; color:green " id="d-check-in"><b></b></p>
                                            </div>

                                            <div class="col-md-6">
                                                <p style="font-size:14px;"><i class="fa fa-calendar"></i> Check-out</p>
                                                <p style="font-size:13px; font-weight:700; color:firebrick" id="d-check-out"><b></b></p>

                                            </div>
                                        </div>

                                        <div class="text-right hide">
                                            <a class="btn-e" data-toggle="modal" data-target="#update-dates" style="color:#BDD4DC"><i class=" fa fa-pencil"></i></a>
                                        </div>


                                    </div>


                                    <div class="mt-2 p-2" style="background-color:#f5f5f5;">

                                        <h6 class="b-head mt-1"><i class=" fa fa-bell-o"></i> Front Desk</h6>

                                        <div class="row" id="booking-front-desk">
                                            <div class="col-md-4">
                                                <p style="font-size:14px;"> Nights</p>
                                                <p class="ml-3" style="font-size:13px;"><b id="nights__">0</b></p>
                                            </div>

                                            <div class="col-md-4">
                                                <p style="font-size:14px;"> Guests</p>
                                                <p class="ml-3" style="font-size:13px;"><b class="d-guests"></b></p>
                                            </div>

                                            <div class="col-md-4">
                                                <p style="font-size:14px;"> Rooms</p>
                                                <p class="ml-3 " style="font-size:13px;"><b class="d-rooms"></b></p>
                                            </div>


                                        </div>

                                    </div>



                                    <!-- guests message -->

                                    <div class="mt-2 p-2" style="background-color:#ffeece;">

                                        <h6 class="b-head mt-1"><i class=" fa fa-whatsapp"></i> Guest's Message</h6>

                                        <div class="label">

                                            <p id="d-message"></p>

                                        </div>

                                        <div class="text-right">
                                            <a class="btn-e" data-toggle="modal" data-target="#guest-message" onclick="takeMessage()" style="color:#BDD4DC"><i class=" fa fa-pencil"></i></a>
                                        </div>


                                    </div>


                                    <!-- internal comment -->

                                    <div class="mt-2 p-2" style="background-color:#ffe8e8;">

                                        <h6 class="b-head mt-1">
                                            <i class=" fa fa-file-o"></i> Internal Comment</h6>
                                        <div class="label" id="d-internal-comment">
                                            <p class="m-0 p-2">No comment</p>
                                        </div>


                                        <div class="text-right">
                                            <a id="com" class="btn-e" style="color:#BDD4DC" data-toggle="modal" data-target="#internal-comments" onclick="takeComments()"><i class=" fa fa-pencil"></i></a>
                                        </div>

                                    </div>


                                    <!-- promotional code -->

                                    <!--
                                <div class="mt-2 p-2" style="background-color:#f5f5f5">

                                    <h6 class="b-head mt-1"><i class=" fa fa-gift"></i> Promotional Code</h6>

                                    <div class="label">

                                        <span class="badge badge-success p-2">EDGYT7</span>

                                    </div>


                                    <div class="text-right">
                                        <a class="btn-e" style="color:#BDD4DC" data-toggle="modal" data-target="#promo-codes"><i class=" fa fa-pencil"></i></a>
                                    </div>


                                </div>
-->


                                </div>

                            </div>
                            <div class="col-md-8 mt-3 pl-2 pr-3">
                                <div class="sided p-2 ">

                                    <div class="">
                                        <div class="row">

                                            <div class="col-md-7">




                                                <a class="b-btn" data-toggle="modal" title="Send Email" data-target="#send-email-modal" onclick='takeEmail()'><i class="fa fa-envelope-open-o" ></i> Send Email</a>

                                                <a class="b-btn open-invoice"><i class="fa fa-bullseye"></i> Preview Invoice</a>
                                                <a id="cancel_booking_btn" class="b-btnx" onclick='cancelBooking(this)'><i class="fa fa-close"></i> Cancel Booking</a>

                                            </div>


                                            <div class="col-md-3 text-right">
                                                <span class="b-head">Balance: <span style="font-size:20px; color:red; font-weight:900; font-family: 'Lato', sans-serif;"><i class="fa fa-dollar"></i><a class="d-balances"></a></span></span>

                                            </div>

                                            <div class="col-md-2 ">
                                                <div class="dropdown">
                                                    <button class="btn-link" data-toggle="dropdown" onclick="getInvoiceOptions()" style="font-size:14px;color:#717D7E;">Inv. Options <i class="fa fa-angle-down"></i></button>

                                                    <div class="dropdown-menu p-0 dropdown-menu-right shadow invoice-opt">
                                                        <div class="header">
                                                            <h5>Invoice Options</h5>
                                                        </div>
                                                        <div class="body">
                                                            <label class="control-label"><b>Discount</b></label>
                                                            <div class="input-group">
                                                                <input class="form-control" id="d-discount" />
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                            <hr>

                                                            <label class="control-label"><b>Tax Included</b></label>
                                                            <!--                                                            <small class="text-muted"><br>The selected taxes will also appear on the invoice.</small>-->
                                                            <!--                                                           <p>No taxes</p>-->
                                                            <div id="d-taxes-included">

                                                            </div>
                                                            <hr>
                                                            <label class="control-label"><b>Payment Option</b></label>

                                                            <div class="panel" id="d-payments-options">

                                                            </div>

                                                        </div>
                                                        <div class="foot">
                                                            <button class="btn btn-primary " onclick="saveInvoiceOptions()"><i class="fa fa-check"></i> Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>



                                    <!-- accommodation table -->
                                    <div class=" m-0" id="rooms-selected">
                                        <br>

                                        <p class="b-head">Accommodation <span class="badge badge-light" style="border-radius:4 !important;" onclick="createNewRoom(this)"><a>Add new</a></span></p>

                                        <!--<a class="btn btn-success btn-lg" id="meal_plan_custom" data-toggle="popover" data-target="#popover-content" data-placement="bottom">Toggle Me</a>-->



                                        <table class="table table-xs" id="d-tb-rooms" border="0" cellpadding="0" cellspacing="0" style="background:#f7f7f7;">
                                            <thead>
                                                <tr>
                                                    <th style="border-top:0px">Property</th>
                                                    <th style="border-top:0px">Room type</th>
                                                    <th style="border-top:0px">Room</th>
                                                    <th style="border-top:0px">Check-in </th>
                                                    <th style="border-top:0px">Check-out</th>
                                                    <th style="border-top:0px" class="text-center">Nights</th>
                                                    <th style="border-top:0px" class="text-center">Meal Plan</th>
                                                    <th style="border-top:0px" class="text-right">Price Per Night</th>
                                                    <th style="border-top:0px" class="text-right">Total</th>
                                                    <th style="width:50px; border-top:0px" colspan="2" class="print-hide"></th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>

                                        </table>

                                    </div>
                                    <!-- extras table -->

                                    <div class=" m-0" id="extras-selected">
                                        <br>

                                        <p class="b-head">Extra Services </p>

                                        <div class="jumbotron p-2 m-0 dropdown clearfix print-hide">
                                            <!-- <span class="d-status" id="d-status"></span> -->
                                            <a class="btn btn-sm btn-outline-secondary pull-right b-period" data-toggle="dropdown" aria-expanded="false">Add Extra Services</a>

                                            <div class="dropdown-menu p-0 dropdown-menu-right extra" id="extras_drop"> </div>
                                        </div>


                                        <table class="table print-mt-10" id="d-tb-extras" border="0" cellpadding="0" cellspacing="0" style="background:#f7f7f7;">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Add on</th>
                                                    <th class="border-top-0">No. of Guests</th>
                                                    <th class="border-top-0">Cost P/P</th>
                                                    <th class="border-top-0">Total Cost</th>
                                                    <th class="border-top-0 print-hide"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>


                                        </table>



                                    </div>



                                    <!-- table for payments -->
                                    <div class=" m-0" id="payments-added">
                                        <br>

                                        <p class="b-head">Payments 
                                        <?php if($role !=7){ ?>
                                            <span class="badge badge-light print-hide" style="border-radius:4 !important;" onclick="openPaymentModal('0','')"><a>Add payment</a></span>
                                        <?php }?>
                                            </p>


                                        <div class="" style="">
                                            <table class="table table-hover" id="d-tb-payments" border="0" cellpadding="0" cellspacing="0" style="background:#f7f7f7;">
                                                <thead>
                                                    <tr>
                                                        <th>Payment Date</th>
                                                        <th>Ref#</th>
                                                        <th>Payment Method</th>
                                                        <th>Amount</th>
                                                        <th>Comment</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>21 Jun 2018</td>
                                                        <td>Credit Card</td>
                                                        <td>$12</td>
                                                    </tr>


                                                </tbody>


                                            </table>
                                        </div>

                                    </div>


                                    <!-- table for Guests -->
                                    <div class=" m-0" id="guests-added">
                                        <br>

                                        <p class="b-head">Guests

                                            <span class="badge badge-light print-hide" style="border-radius:4 !important;" onclick="openGuestModal('0')"><a>Add Guest</a></span></p>


                                        <table class="table print-mt-10 table-hover" id="d-tb-guests" border="0" cellpadding="0" cellspacing="0" style="">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Passport Number</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>Jumbwe Isaac</td>
                                                    <td>34</td>
                                                    <td>tukole@ugandashecranes.com</td>
                                                    <td>+35677163787</td>
                                                    <td>HGT564R</td>
                                                </tr>


                                            </tbody>

                                        </table>


                                    </div>

                                    <div class="" id="kids-added">
                                        <br>

                                        <p class="b-head">Children

                                            <span class="badge badge-light print-hide" style="border-radius:4px !important;" data-toggle="modal" data-target="#add-child"><a>Add Child</a></span></p>

                                        <table class="table mt-10" id="d-tb-kids">
                                            <thead>
                                                <tr>
                                                    <th>age bracket</th>
                                                    <th>Number</th>
                                                    <th>price per child</th>
                                                    <th>Total Charge</th>
                                                    <th class="print-hide" colspan="1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>



                                    <div class="" id="beds-added">
                                        <br>

                                        <p class="b-head">Extra Beds

                                            <span class="badge badge-light print-hide" style="border-radius:4 !important;" data-toggle="modal" data-target="#add-extra-bed-"><a>Add an extra bed</a></span></p>

                                        <table class="table mt-10" id="d-tb-beds">
                                            <thead>
                                                <tr>
                                                    <th>Bed name</th>
                                                    <th>Number</th>
                                                    <th>Nights</th>
                                                    <th>bed per night</th>
                                                    <th>Total Charge</th>
                                                    <th colspan=""></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>


                                    <br><br>
                                    <br><br>



                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>







    <!-- modals  -->

    <div class="modal" tabindex="-1" id="add-child" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog px-5" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">

                    <h4 class="modal-title">

                        <small>Add Child</small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <label class="control-label">Age Group</label>
                    <select class="form-control" name="age-group" id="age-grp" onchange="updateChildrenModal(1)" required data-empty-message="select age bracket">
                        <option value="">Select</option>
                   <?php foreach($kids_rates as $key=>$kid){ ?>
                    <option value="<?php echo $kid['amount'];?>"><?php echo $kid['rate_name']." (".$kid['minimum_age']." - ". $kid['maximum_age'].")";?></option>
                    <?php }?>
<!--                    <option value="">14-18</option>-->
                </select>

                    <label class="control-label">price per child</label>
                    <input class="form-control" id="price-perkid" name="unit-price" oninput="updateChildrenModal(0)" />

                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Number of children</label>
                            <input class="form-control" type="number" id="noc" name="no-of-children" required data-empty-message="add number of children" oninput="updateChildrenModal(0)" />
                        </div>


                        <div class="col-md-6">
                            <label class="control-label">Number of nights</label>
                            <input class="form-control" type="number" id="ngts" name="no-of-nights" oninput="updateChildrenModal(0)" required data-empty-message="input number of nights" />
                        </div>

                    </div>

                    <label class="control-label">Total</label>
                    <input class="form-control" id="tT_amount" readonly name="total" />


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm " onclick="updateKids(this)"><i class="fa fa-check-circle"></i> Add</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal" tabindex="-1" id="send-email-modal" style="background-color:rgba(0,0,0,0.8);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-header">

                    <h4 class="modal-title">
                        <small>Send Email</small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>



                <div class="modal-body">
                    <!-- <label>Receipient</label>
                    <input readonly class="form-control" placeholder="johndoe@gmail.com"/> -->
                    <label class="control-label">Send to:</label>
                    <select class="ml-1 form-control py-0" id="booking-email" style="color:#227B9E"></select>
                    <label class="control-label">Template</label>
                    <select class="form-control select-email-template" required data-empty-message="receipient required" onchange="setEmailTemplate(this)">
                    <option value="">None</option>
                     <?php foreach($templates as $key=>$template){ ?>
                    <option value="<?php echo $key;?>"><?php echo $template['template_name'];?></option>
                    <?php }?>
                </select>
                    <label class="control-label">Subject</label>
                    <input class="form-control" name="subject" id="em-subject" required/>

                    <label class="control-label">Message</label>
                    <textarea class="form-control" rows="5" id="e-temp-textarea" name="message" required></textarea>

                    <div class="form-check form-check-inline custom-checkbox">
                        <input class="form-check-input" type="checkbox" id="email_select" value="option1">
                        <label class="form-check-label mt-0" for="email_select">Send/Attach Invoice</label>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm " id="sendemailbtn" onclick="send_mail()"><i class="fa fa-send"></i> Send Email</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!---->
    <div class="modal" tabindex="-1" id="add-extra-bed-" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">

                        <small>Add Extra Bed</small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <label class="control-label">Bed Name</label>
                    <select class="form-control" name="bed-type" onchange="updateBedsModal(1)" required data-empty-message="select a bed type">
                    <option value="" >Select</option>
                    <?php foreach($bed_rates as $bed_rate){ ?>
                    <option value="<?php echo $bed_rate['cost'];?>"><?php echo $bed_rate['name'];?></option>
                    <?php }?>
                </select>
                    <label class="control-label">Price per night</label>
                    <input class="form-control" name="unit-price" oninput="updateBedsModal(0)" />

                    <label class="control-label">Number of beds</label>
                    <input class="form-control" name="no-of-beds" oninput="updateBedsModal(0)" required data-empty-message="input number of beds" />

                    <label class="control-label">Nights</label>
                    <input class="form-control" name="nights" required oninput="updateBedsModal(0)" />

                    <label class="control-label">Total Cost</label>
                    <input class="form-control" name="total" readonly/>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm" id="changeRoom-btn" onclick="updateBeds(this)"><i class="fa fa-plus"></i> Add Extra Bed</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- modal for editing guests message -->
    <div class="modal" id="guest-message" role="dialog" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Guest's Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Enter Guest's Message</label>
                        <textarea class="form-control" id="guest-msg" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" onclick="changeMessage(this)">Save changes</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- modal for adding internal Comments -->
    <div class="modal" id="internal-comments" role="dialodg" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Internal Comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Enter Comments</label>
                        <textarea class="form-control" id="edit-internal-comments" rows="6"></textarea>
                    </div>
                    <br>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">close</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="changeComment(this)">Update Comment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal for promo-codes -->
    <div class="modal" id="promo-codes" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Promo Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Select Promo Code</label>
                        <select class="form-control" id="">
                      <option>code 1</option>
                      <option>code 3</option>
                      <option>code 5</option>
                      <option>code 6</option>
                      <option>code 67</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm">Apply Promo Code</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- modal for new guest -->
    <div class="modal" id="new-guest" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add guests (Adults)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input value="" id="g-id" hidden type="hidden" />
                                <input type="text" class="form-control" id="g-name" placeholder="enter name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Age</label>
                                <input type="text" class="form-control" id="g-age" placeholder="enter age">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="g-email" placeholder="enter email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="g-phone" placeholder="enter phone number">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Passport Number</label>
                            <input type="text" class="form-control" id="g-passportno" placeholder="enter passport no#">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm btn-save" onclick="addGuest(this)" id="">Add Guest</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- modal for editing guest -->
    <div class="modal" id="edit-guest" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add guests (Adults)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="g-name" placeholder="enter name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Age</label>
                                <input type="text" class="form-control" id="g-age" placeholder="enter age">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="g-email" placeholder="enter email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="g-phone" placeholder="enter phone number">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Passport Number</label>
                            <input type="text" class="form-control" id="g-passportno" placeholder="enter passport no#">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteGuest(this)" id="">Remove from Booking</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="updateGuest(this)" id="">Update Guest Details</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <!-- modal for new payments -->
    <div class="modal" id="new-pay" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register New Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Date</label>
                                <input id='p-id' hidden type="hidden" />
                                <input type="text" class="form-control datepicker" id="p-date" placeholder="enter payment date">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="">Amount</label>
                                <input type="number" class="form-control" id="p-amount" placeholder="enter amount paid">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Payment Method</label>
                                <select class="form-control" id="p-method">
                                <option>Select Payment Method</option>
                      <option>Cash</option>
                      <option>Cheque</option>
                      <option>EFT</option>
                      <option>Bank Deposit</option>
                      <option>Credit Card</option>
                      <option>RTGS</option>
                      <option>PayPal</option>
                      
                    </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Reference #</label>
                                <input type="text" id="p-ref" class="form-control" id="" placeholder="enter ref#">
                            </div>


                        </div>


                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea class="form-control" id="p-comment" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm btn-save" onclick="addPayment(this)">Add Payment</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- modal for new guest -->
    <div class="modal" id="update-details" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Names</label>
                                <input type="text" class="form-control" id="" placeholder="enter name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Mobile</label>
                                <input type="text" class="form-control" id="" placeholder="enter age">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="" placeholder="enter email">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea class="form-control" id="" rows="3"></textarea>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm">Update Details</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- modal to update check-in and check-out dates -->
    <div class="modal" id="update-dates" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Arrival dates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Check-in Date</label>
                                <input type="text" class="datepicker form-control" id="" placeholder="enter check-out date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Check-Out Date</label>
                                <input type="text" class="datepicker form-control" id="" placeholder="enter check-out date">
                            </div>
                        </div>

                        <div>
                            <p class="alert alert-success p-1"><b>Nights:</b> <span><b>6</b></span></p>
                        </div>



                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="" value="option1">
                            <label class="form-check-label mt-0" for="">Update/Refresh Prices after changing dates </label>
                        </div>


                    </form>
                    <br>

                    <div style="color: #c14514; padding-bottom: 5px; font-size:12px">
                        If the number of nights is changed and extra options that are charged per night exist in this booking, these must be updated manually. </div>

                    <div style="color: gray; padding-bottom: 5px; font-size:12px">
                        Select new dates and number of nights. If price update is checked, any season or day prices for the new dates will be applied to the unit prices in the booking. </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm">Change dates</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>






    <!-- rooms modals start here-->
    <div class="modal animated zoomIn" id="edit-sel-room">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">

                        <small>Change Room</small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12  ml-4 " id="room-btn-grp">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm " id="changeRoom-btn"><i class="fa fa-check-circle"></i> Change</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <div class="modal" id="edit-room" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog " role="document">
            <div class="modal-content shadow">
                <div class="modal-header">

                    <h4 class="modal-title">
                        <small>Edit Room Details</small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>



                <div class="modal-body" id="form-room">
                    <div class="row">
                        <input type="hidden" id="record_id" />
                        <input type="hidden" id="b_id" />

                        <div class="col-md-12 " id="">

                            <div class="section-for-edit py-3">
                                <h5 class="m-0" id="room-type-name_">Self-contained rooms</h5>
                                <p><small class="text-muted" id="property-name_">Main property</small></p>
                            </div>
                            <div class="section-for-new">
                                <label>Property</label>
                                <select class="form-control" id="properties_edit" onchange="getRoomTypesForEdit_()" required data-empty-message="Select a property">
                           <option value="">Select</option>
                            <?php echo $propertyOptions0;?>
                              
                        </select>

                                <div class="room-div">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Room type</label>
                                            <select onchange="some_change()" class="form-control " id="roomtypes_" required data-empty-message="select a room type">
                                        <!--<option>Select</option>
                                        <option>Property 1</option>
                                        <option>Property 2</option>-->
                                    </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label>Check-in</label>
                                    <input id="check_in_date_" onblur="some_change()" class="form-control datepicker" required data-empty-message="select check-in date" />
                                </div>
                                <div class="col-6">
                                    <label>Check-out</label>
                                    <input id="check_out_date_" onblur="some_change()" class="form-control datepicker" required data-empty-message="select check-out date" />
                                </div>
                            </div>
                            <hr/>

                            <div class="row">
                                <div class="col-6">
                                    <label>Room</label>
                                    <select class="form-control" id="free_rooms" required data-empty-message="select a room"> 
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Meal Plan</label> <a style='font-size:10pt' id="view-edit-meal-plan" class="pull-right pt-2" data-toggle='modal' href='#custom-rate'>View/Edit</a>
                                    <select onchange="loadprices()" class="form-control " id="meal_plan_">
                                    <option>Select</option>
                                    <option value="FB">FB</option>
                                    <option value="HB">HB</option>
                                    <option value="BB">BB</option>
                                    <option value="Custom">Custom</option>
                                </select>
                                </div>
                                <div class="col-6">
                                    <label>Price Rate</label>
                                    <select class="form-control" id="price_rate" required data-empty-message="select price rate">
                                <!-- <option>Select</option> -->
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm " onclick="update_booked_rooms(this)" id="changRoom"><i class="fa fa-check-circle"></i> Save</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal" id="add-room" style="background-color:rgba(0,0,0,0.8)">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">

                    <h4 class="modal-title">
                        <small>Add a room</small>
                    </h4>
                    <div class="dropdown ">
                    <b>Rooms selected</b> <span data-toggle='dropdown' class="circle-notify  selected-rooms-count" id="ar_selected-room-count"> 0 </span>
                    <div class="dropdown-menu p-0 selected-rooms-modal dropdown-menu-left">
                        <div class="inner">

                            <table class="table table-striped">
                                <tr>
                                    <td class=text-center>No rooms selected</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>



                <div class="modal-body" id="ar_form-room">
                    <div class="row">
                        <div class="col-md-3 border-right pb-2 bg-gray">
                            <label class="control-label">Property</label>
                            <select  id="properties_add_rooms" onchange="getRoomTypes_addRooms()" class="form-control" required data-empty-message="choose a property"><?php echo $propertyOptions;?></select>
                            <label class="control-label">Room type</label>
                            <select id="roomtypes_add"  onchange="setRoomTypes()" class="form-control" required data-empty-message="select room type"><option value="all" >All</option></select>
                            
                            <label class="control-label">Check-in date</label>
                            <input class="datepicker form-control" data-date-format="dd-mm-yyyy" placeholder="select a date" id="ar_check-in" required data-empty-message="Checkin date is required" />
                            
                            <label class="control-label">Check out date</label>
                            <input class="datepicker form-control" data-date-format="dd-mm-yyyy" placeholder="select date" id="ar_check-out" required data-empty-message="Checkout date is required" />

                            <button class="btn btn-outline-success mt-2 btn-sm" onclick="ar_getFreeRooms(this)" >Load free rooms</button>
                        </div>

                        <div class="col-md-9 p-1 c-body" style="height:70vh; background:#f0f0f0">
                            <table class="table table-bordered table-bookings" id="ar_tb-free-rooms">
                            </table>
                        </div>
                  


                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="text-left">
                                <p>Total Rooms: <b class="text-info selected-rooms-count">0</b><span class="mx-3"></span>Total Cost: <b class="text-warning" id="t-rooms-c">$0</b></p>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary btn-sm " onclick="add_room_book(this)" ><i class="fa fa-check-circle"></i> Save</button>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
    </div>

<!-- modal for selecting custom meal plan -->
<div class="modal fadeIn" tabindex="-1" role="dialog" id="custom-rate-ar" style="background-color:rgba(0,0,0,0.6);">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2cc185;">
                <h5 class="modal-title text-white">Create custom Meal plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">

                <div class="scrolly" style="height:250px !important">
                    <table class="table" id="custom_meal_plan_tb_0_ar">
                        <thead>
                            <tr>
                                <th style="">#</th>
                                <th style="width:30%">Date</th>
                                <th style="width:20%">Meal Plan</th>
                                <th style="width:20%">Rate</th>
                                <th class="">Sub-total</th>
                            </tr>
                        </thead>
                        <tbody id="custom_meal_plan_tb_ar">
                    


                        </tbody>
                    </table>

                </div>
              
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Go Back</button>
                    <button type="button" class="btn btn-primary btn-sm"  onclick='getCustomMealCart()'>Use these Ratesm</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal for adding extra bed costs -->

    <!-- poppover for the custom meal plans -->

    <div id="popover-content" style="display: none" class="p-0">
        <style>
            .popover {
                /* background:#F5F9FA; */
                max-width: 390px !important;
                border: 0px !important;
                box-shadow: 5px 5px 5px #eee !important;
            }

        </style>

        <h6 class="h5 text-center" style="font-size:12px">Meal Plan Break-down</h6>

        <table class="table table-bordered table-light">
            <thead>

                <th>Night</th>
                <th>Date</th>
                <th>Meal Plan</th>

            </thead>

            <tbody id="meal_break_down">
                <!-- <tr>
                    <td>Night 2</td>
                    <td>4/12/2018</td>
                    <td>FullBoard</td>
                </tr>

                <tr>
                    <td>Night 2</td>
                    <td>4/12/2018</td>
                    <td>FullBoard</td>
                </tr>

                <tr>
                    <td>Night 2</td>
                    <td>4/12/2018</td>
                    <td>FullBoard</td>
                </tr>-->

            </tbody>

        </table>


    </div>

    <script src="summernote/summernote-bs4.js"></script>

    <script>
        $(document).ready(function() {
            // alertify.set("notifier","position","top-right");
            // alertify.success('<i class="fa fa-check mr-2"></i> New Guest Added');

            $('[data-toggle="popover"]').popover({
                html: true,
                content: function() {
                    return $('#popover-content').html();
                }
            });


            $('.invoice-opt.dropdown-menu').click(function(e) {
                e.stopPropagation();
            });

        });

    </script>

    <script>
        $('.popover-dismiss').popover({
            trigger: 'focus'
        })

    </script>




    <script>
        $(".modal#booking-details").mouseover(
            function() {
                if (!$('body').hasClass("modal-open")) {
                    $('body').addClass("modal-open");
                }
            })

    </script>








    <!-- javascript for functions -->

    <script>
        var taxes_array = {};
        get_templates();
        var BOOKING_ID;
        $(document).on('click', '.open-invoice', function() {
            previewInvoice(BOOKING_ID);
        })

        function toggleInputs() {
            $(".input-price").toggleClass('hide');

        }

        function takeMessage() {
            $("#guest-msg").html($("#d-message").html());
        }


        function takeComments() {
            $("#edit-internal-comments").html($("#d-internal-comment").html());
        }

        function takeEmail() {
            //            var emailopt = "<option value='" + $("#d-email").html() + "'>" + $("#d-email").html() + "</option>";

            //            if ($("#track-bsource").text().toLowerCase() == "agent") {
            var emailopt = "";

            var emails = $("#d-email").text().split(",");
            $.each(emails, function(i, mail) {
                emailopt += "<option value='" + mail + "'>" + mail + "</option>";

            });



            $("#booking-email").html(emailopt);
        }

        Date.prototype.addDays = function(days) {

            var dat = new Date(this.valueOf());
            dat.setDate(dat.getDate() + days);

            return dat;
        }

getRoomTypes_addRooms();


function getRoomTypes_addRooms() {

        // alert(1)
        var sel = $("#roomtypes_add");
       // sel.prop("disabled", true);

        // alert(2);
        //tinyloader("#room-loader", "");

        var property_id = $("#properties_add_rooms option:selected").val();


        $.post('src/get_data.php', {
            token: "roomtypes",
            property_id: property_id
        }, function(data) {
            var o = "<option value='0'>All room types</option>";
            //            alert(data)
            var rts = JSON.parse(data);
            $.each(rts, function(i, rt) {
                o += "<option value='" + rt.id + "'>" + rt.name + "</option>";
            });

            //alert(o)
            sel.html(o);
            //sel.prop("disabled", false);
           // $("#room-loader").html("");
        })
    }

 function setRoomTypes(){

                    var selected_room = $("#roomtypes_add option:selected").text();

                       $("#room_title").html(selected_room);
 }




        function MealBreakDown(b) {
            //alert(b)
            //          b= JSON.parse(b);
            var rows = "";

            var check_in_date = b.check_in_date;
            var check_out_date = b.check_out_date;

            var dat = new Date(check_in_date);

            var x = JSON.parse(b.meal_plan_per_day);
            $.each(x, function(i, g) {

                real_date = dat.addDays(i);
                str_month = real_date.getMonth() + 1;
                str_year = real_date.getFullYear();
                str_day = real_date.getDate();

                if (str_day < 10) {
                    str_day = "0" + str_day;
                }
                if (str_month < 10) {
                    str_month = "0" + str_month;
                }

                combined = str_day + "-" + str_month + "-" + str_year;

                rows += '<tr>';
                rows += '<td>Night ' + g.day + '</td>';
                rows += '<td>' + combined + '</td>';
                rows += '<td>' + g.meal_plan + '</td>';
                rows += '</tr>';

            })

            $("#meal_break_down").html(rows);

        }


        function addPayment(btn) {
            //    alert(0)

            if (!($(btn).hasClass("loading"))) {
                var btnHtml = $(btn).html();
                $(btn).addClass("loading");
                $(btn).html("<i class='fa fa-spin fa-spinner'></i> Adding Payment...");

                var amt = $("#p-amount").val();
                var date = $("#p-date").val();
                var ptm = $("#p-method").val();
                var pay_comment = $("#p-comment").val();


                if (amt == "") {
                    errorMSG(".input-group", "Input Amount")
                } else if (ptm == "") {
                    errorMSG("#p-method", "choose payment method")

                } else {

                    var amount = $("#new-pay #p-amount").val()
                    var date = $("#new-pay #p-date").val()
                    var payment_method = $("#new-pay #p-method").val()
                    var p_reference = $("#new-pay #p-ref").val()
                    var payment_comment = $("#new-pay #p-comment").val();
                    var payment_id = $("#new-pay #p-id").val();

                    $.post("src/xhr.php", {
                            action: "add payment",
                            amount: amount,
                            booking_id: getBookingId(),
                            date: date,
                            payment_reference: p_reference,
                            payment_method: payment_method,
                            payment_comments: payment_comment,
                            payment_id: payment_id
                        },

                        function(data) {

                            // $("#guest-message").modal("hide");
                            // alert(data);

                            //                            var p = JSON.parse(data);
                            //                            var newrow = "";
                            //                            newrow += "<tr>";
                            //                            newrow += "<td>" + p.date_paid + "</td>";
                            //                            newrow += "<td>" + p.payment_reference + "</td>";
                            //                            newrow += "<td>" + p.payment_method + "</td>";
                            //                            newrow += "<td>$" + p.amount + "</td>";
                            //                            newrow += "<td>" + p.payment_comments + "</td>";
                            //                            newrow += "<td class='text-right'>" + "<i id='edit'  onclick='openPaymentModal(" + JSON.stringify(p) + ", this)' class=\"fa fa-pencil btn-circle mr-2\"></i><i   onclick='deletePayment(\"" + p.id + "\", this)' class=\"fa fa-close btn-circle\"></i>" + "</td>";
                            //
                            //                            newrow += "</tr>";
                            //
                            //                            $(btn).removeClass("loading");
                            //                            $(btn).html(btnHtml);
                            //                            $("#new-pay").modal("hide");
                            //                            if (payment_id == "0") {
                            //                                alertify.success('<i class="fa fa-check mr-2"></i> Payment Registered');
                            //
                            //                                $("#d-tb-payments tbody").append(newrow);
                            //
                            //                            } else {
                            //                                $("#d-tb-payments .being-edited").replaceWith(newrow);
                            //                                alertify.success('<i class="fa fa-check mr-2"></i> Changes Saved');
                            //
                            //
                            //
                            //                            }
                            $(btn).removeClass("loading");
                            $(btn).html(btnHtml);
                            $("#new-pay").modal("hide");
                            x0p("Done", "Booking has been upadted", "ok", false);
                            getBooking(BOOKING_ID);
                        })
                }
            }
        }



        // function to add guests
        function addGuest(btn) {
            var gname = $("#new-guest #g-name").val();
            if (!($(btn).hasClass("loading"))) {

                if (gname == "") {
                    errorMSG("#g-name", "Enter Guest's Name")
                } else {
                    var btnHtml = $(btn).html();
                    $(btn).addClass("loading");
                    $(btn).html("<i class='fa fa-spin fa-spinner'></i> Updating reservation...");

                    var gname = $("#new-guest #g-name").val();
                    var gage = yr - parseInt($("#new-guest #g-age").val());
                    var gemail = $("#new-guest #g-email").val();
                    var gphone = $("#new-guest #g-phone").val();
                    var gpassport = $("#new-guest #g-passportno").val();
                    var id = $("#new-guest #g-id").val();
                    // alert(id)
                    $.post("src/xhr.php", {
                        action: "add guest",
                        name: gname,
                        booking_id: getBookingId(),
                        year_of_birth: gage,
                        email: gemail,
                        phone: gphone,
                        id_number: gpassport,
                        guest_id: id


                    }, function(data) {

                        // alert(data)



                        //                        $("#new-guest").modal("hide");
                        //                        $(btn).removeClass("loading");
                        //                        $(btn).html(btnHtml);
                        //                        // alertify.set("notifier","position","top-right");
                        //                        if (id != "0") {
                        //                            alertify.success('<i class="fa fa-check mr-2"></i> Reservation updated');
                        //
                        //                        } else {
                        //                            alertify.success('<i class="fa fa-check mr-2"></i> New Guest Added');
                        //                        }
                        $("#new-guest").modal("hide");
                        $(btn).removeClass("loading");
                        $(btn).html(btnHtml);
                        x0p("Done", "Booking has been upadted", "ok", false);
                        getBooking(BOOKING_ID);
                    })
                }
            }
        }




        // function getBalance() {
        //     var p = $('#booking-details');

        //     cost = p.find("#d-s-total").text();
        //     discount = p.find("#d-discount").text();
        //     total_paid = p.find("#d-total-paid").text();
        //     total_taxes = 0;
        //     total_taxes = p.find("#d-taxes").text();

        //     p.find("#d-total-cost").html(Math.round(parseInt(cost) + parseFloat(total_taxes) - parseInt(discount)));

        //     var bal = parseInt(cost) + parseFloat(total_taxes) - parseInt(total_paid);
        //     p.find("#d-balance").text(bal);



        //     $('.d-balance').text(bal);
        //     return bal;
        // }


        function setTotalPaid(c) {
            $("#d-total-paid").text(c);
        }

        function getTotalPaid() {
            return parseFloat($("#d-total-paid").text());
        }




        $(document).on("click", ".r-status a", function(e) {
            var htm = $(this).html();
            var s = $(this).attr("data-status");
            //alert(s)
            changeStatus(htm, s);
        });

        function changeStatus(h, s) {
            var sb = $(".d-status");
            var sbh = sb.html();
            sb.html("<i class='fa fa-spin fa-spinner'></i> updating status...");
            //            alert(s)
            $.post("src/xhr.php", {
                action: "change status",
                booking_id: getBookingId(),
                status: s
            }, function(data) {

                if (data == 1) {
                    sb.html(h);
                } else {
                    sb.html(sbh);

                }
            })
        }


        function cancelBooking(context) {

            s = 'cancelled';
            $.post("src/xhr.php", {
                action: "change status",
                booking_id: getBookingId(),
                status: s
            }, function(data) {

                //                if (data == 1) {
                //
                //                    setStatus(s)
                //                } else {
                //
                //
                //                }

                x0p("Done", "Booking has been upadted", "ok", false);
                getBooking(BOOKING_ID);
            })
        }


        var extras_drop_box = {};
        get_extras();



        function get_extras() {
            $.post('src/get_data.php', {
                token: "get_extras",

            }, function(data) {
                //alert(data)
                try {

                    extras_drop_box = JSON.parse(data);

                } catch (error) {


                }

            })

        }


        function get_freerooms() {

            $.post('src/get_data.php', {
                token: "free rooms",
                property_id: $("#properties_edit").val(),
                check_in: $("#check_in_date_").val(),
                check_out: $("#check_out_date_").val(),
                room_type_id: $("#roomtypes_").val()

            }, function(data) {
                // alert(data)
                var rooms_ = JSON.parse(data)
                //alert(rooms_[0].rooms.length);
                var opt = '<option>Select</option>';

                //alert(JSON.stringify(rooms_[0].rooms));
                $.each(rooms_[0].rooms, function(i, item) {
                    //"id":"50","name":"G1
                    opt += "<option value=\"" + item.id + "\">" + item.name + "</option>";

                });

                $('#free_rooms').html(opt);


            })

            //$(".chosen").trigger("chosen:updated");;

        }


        function calculateTotal(context) {

            guests = $(context).val();
            unit_price = $(context).parent().parent().find(".unit_price").html()

            edit_btn = $(context).parent().parent().find("#edit");

            value_ = edit_btn.attr("id");



            if (value_ !== undefined) {

                //alert(value_);

                edit_btn.removeClass("fa-pencil");
                edit_btn.addClass("fa-check text-success");

            }




            totalbox = $(context).parent().parent().find(".total");

            if (guests !== "Set Guests") {

                totalbox.html(Math.round(parseInt(guests) * parseFloat(unit_price)));
            } else {
                totalbox.html(0);

            }


        }

        function saveExtra(context) {

            var tbExtras = $('#booking-details #d-tb-extras tbody');
            tr = $(context).parents("tbody").parent().parent().find(".new_row");



            guests = tr.find(".guests").val();
            name = tr.find(".name").html();

            id = tr.find(".guests").attr("id");

            unit_price = tr.find(".unit_price").html();

            booking_id = getBookingId();

            // alert(guests)

            if (guests !== "Set Guests") {

                $.post('src/xhr.php', {
                    action: "add_extras",
                    id: id,
                    guests: guests,
                    unit_price: unit_price,
                    booking_id: booking_id

                }, function(data) {


                    if (parseInt(JSON.parse(data).length) != 0) {

                        //                        total = 0;
                        //
                        //                        gRows = "";
                        //                        extras_temp_array = [];
                        //
                        //                        $.each(JSON.parse(data), function(i, g) {
                        //
                        //
                        //                            extras_temp_array.push(g.extra_id);
                        //
                        //                            gRows += "<tr>";
                        //                            gRows += "<td>" + g.extra_name + "</td>";
                        //                            gRows += "<td class='guests'>" + g.total_guests + "</td>";
                        //                            gRows += "<td class='unit_price' >" + g.unit_price + "</td>";
                        //                            gRows += "<td class='total' >" + Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price)) + "</td>";
                        //                            gRows += "<td class='text-right'>" + "<i  id='edit' onclick='editExtra(this,\"" + g.id + "\")' class=\"fa fa-pencil btn-circle mr-2\"></i><i onclick='deleteExtra(\"" + g.id + "\")' class=\"fa fa-close btn-circle text-danger\"></i>" + "</td>";
                        //
                        //                            gRows += "</tr>";
                        //
                        //                            total += Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price));
                        //
                        //                        })
                        //
                        //
                        //                        sub_total = parseFloat($('#sub_ttl').val()) + total;
                        //
                        //                        $('#booking-details').find("#d-s-total").text(Math.round(sub_total));
                        //
                        //
                        //                        booking_id = getBookingId();
                        //
                        //
                        //                        taxable_amount = sub_total - total;
                        //
                        //                        $.post('src/get_data.php', {
                        //                            token: "get_taxes_by_bid",
                        //
                        //                            booking_id: booking_id
                        //
                        //                        }, function(data) {
                        //                            total_taxes = 0;
                        //
                        //                            $.each(JSON.parse(data), function(taxes_index, tax) {
                        //                                total_taxes = total_taxes + (parseInt(taxable_amount) * (parseFloat(tax.taxamount) / 100));
                        //
                        //
                        //                            });
                        //
                        //                            total_taxes = $('#booking-details').find("#d-taxes").html(Math.round(total_taxes));
                        //                            getBalance();
                        //
                        //
                        //                        });
                        //
                        //
                        //
                        //
                        //                        tbExtras.html(gRows);

                        x0p("Done", "Booking has been upadted", "ok", false);
                        getBooking(BOOKING_ID);

                        var opt = "";

                        $.each(extras_drop_box, function(i, item) {

                            var id = item.id;
                            if (extras_temp_array.indexOf(id) == -1) {


                                var name = item.name;
                                var price = item.price;
                                opt += " <a class=\"dropdown-item\" onclick='addSelectedExtra(this,\"" + id + "\")' data-price=\"" + price + "\" >" + name + "</a>";

                            }


                        })

                        $('#extras_drop').html(opt);

                    }


                })

            } else {


                booking_id = getBookingId();
                $.post("src/get_data.php", {

                    "token": "get_extras_by_bid",
                    booking_id: booking_id


                }, function(data) {


                    if (parseInt(JSON.parse(data).length) != 0) {

                        gRows = "";
                        extras_temp_array = [];

                        $.each(JSON.parse(data), function(i, g) {

                            // alert(JSON.stringify(g));

                            extras_temp_array.push(g.extra_id);

                            gRows += "<tr>";
                            gRows += "<td>" + g.extra_name + "</td>";
                            gRows += "<td class='guests' >" + g.total_guests + "</td>";
                            gRows += "<td class='unit_price'>" + g.unit_price + "</td>";
                            gRows += "<td class='total' >" + Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price)) + "</td>";
                            gRows += "<td>" + "<i id='edit'  onclick='editExtra(this,\"" + g.id + "\")' class=\"fa fa-pencil btn-circle\"></i><i onclick='deleteExtra(\"" + g.id + "\")' class=\"fa fa-close btn-circle text-danger\"></i>" + "</td>";

                            gRows += "</tr>";

                        })

                        tbExtras.html(gRows);

                        var opt = "";

                        $.each(extras_drop_box, function(i, item) {

                            var id = item.id;
                            if (extras_temp_array.indexOf(id) == -1) {

                                var name = item.name;
                                var price = item.price;
                                opt += " <a class=\"dropdown-item\" onclick='addSelectedExtra(this,\"" + id + "\")' data-price=\"" + price + "\" >" + name + "</a>";

                            }


                        })

                        $('#extras_drop').html(opt);

                    }



                })









            }



        }


        function deleteExtra(id) {
            var tbExtras = $('#booking-details #d-tb-extras tbody');
            x0p("Delete Extra", "Are you sure you want to delete this extra?", "warning",
                function(c) {
                    if (c == "warning") {
                        $.post("src/delete.php", {
                            "reference": "id",
                            "token": "booking_extras_tb",
                            "data": id
                        }, function(response) {

                            if (response == "success") {

                                booking_id = getBookingId();
                                $.post("src/get_data.php", {

                                    "token": "get_extras_by_bid",
                                    booking_id: booking_id


                                }, function(data) {


                                    // if(parseInt(JSON.parse(data).length)!=0){

                                    gRows = "";
                                    extras_temp_array = [];
                                    total = 0;

                                    $.each(JSON.parse(data), function(i, g) {

                                        // alert(JSON.stringify(g));

                                        extras_temp_array.push(g.extra_id);

                                        gRows += "<tr>";
                                        gRows += "<td>" + g.extra_name + "</td>";
                                        gRows += "<td class='guests' >" + g.total_guests + "</td>";
                                        gRows += "<td class='unit_price'>" + g.unit_price + "</td>";
                                        gRows += "<td class='total' >" + Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price)) + "</td>";
                                        gRows += "<td class='text-right'>" + "<i id='edit'  onclick='editExtra(this,\"" + g.id + "\")' class=\"fa fa-pencil btn-circle\"></i><i onclick='deleteExtra(\"" + g.id + "\")' class=\"fa fa-close btn-circle text-danger\"></i>" + "</td>";
                                        gRows += "</tr>";

                                        total += Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price));

                                    })

                                    sub_total = parseFloat($('#sub_ttl').val()) + total;
                                    $('#booking-details').find("#d-s-total").text(Math.round(sub_total));

                                    taxable_amount = sub_total - total;
                                    //alert(sub_total)
                                    booking_id = getBookingId();
                                    $.post('src/get_data.php', {
                                        token: "get_taxes_by_bid",

                                        booking_id: booking_id

                                    }, function(data) {
                                        var total_taxes = 0;

                                        //alert(data);
                                        var x = JSON.parse(data);
                                        //alert(JSON.stringify(x));


                                        $.each(x, function(taxes_index, tax) {



                                            total_taxes = total_taxes + (parseInt(taxable_amount) * (parseFloat(tax.taxamount) / 100));


                                        });


                                        $('#booking-details').find("#d-taxes").html(Math.round(total_taxes));
                                        getBalance();


                                    });


                                    tbExtras.html(gRows);

                                    var opt = "";

                                    $.each(extras_drop_box, function(i, item) {

                                        var id = item.id;
                                        if (extras_temp_array.indexOf(id) == -1) {

                                            var name = item.name;
                                            var price = item.price;
                                            opt += " <a class=\"dropdown-item\" onclick='addSelectedExtra(this,\"" + id + "\")' data-price=\"" + price + "\" >" + name + "</a>";

                                        }


                                    })

                                    $('#extras_drop').html(opt);

                                    // }



                                })
                                //window.location.reload();
                                alertify.success('Extra Deleted');
                            } else {
                                alertify.error(response);
                            }
                        })
                    }
                }
            );
        }


        function updatePhone(context) {
            phone = $(context).val();
            if (phone.length != 0) {

                var data = JSON.stringify({
                    phone: phone
                });

                $.post("src/update.php", {
                        "col_id": "booking_id",
                        "reference": getBookingId(),
                        "page": "native",
                        "result": data,
                        "table": "guests_tb"
                    }, function(response) {


                        if (response === "success") {
                            alertify.success('Phone successfully  updated!');

                        }

                    }

                );
            }

        }



        function updateEmail(context) {

            email = $(context).val();

            if (email.length != 0) {

                var data = JSON.stringify({
                    email: email
                });

                $.post("src/update.php", {
                        "col_id": "booking_id",
                        "reference": getBookingId(),
                        "page": "native",
                        "result": data,
                        "table": "guests_tb"
                    }, function(response) {


                        if (response === "success") {

                            alertify.success('Email successfully  updated!');

                        }

                    }

                );

            }



        }

        function updateName(context) {
            name = $(context).val();
            if (name.length != 0) {

                var data = JSON.stringify({
                    name: name
                });

                $.post("src/update.php", {
                        "col_id": "booking_id",
                        "reference": getBookingId(),
                        "page": "native",
                        "result": data,
                        "table": "guests_tb"
                    }, function(response) {


                        if (response === "success") {

                            alertify.success('Name successfully  updated!');

                        }

                    }

                );
            }



        }

        function editExtra(context, id) {
            var tbExtras = $('#booking-details #d-tb-extras tbody');
            tr = $(context).parent().parent();

            edit_btn = $(context).parent().parent().find("#edit");

            value_ = edit_btn.attr("id");



            if (value_ === "edit" && edit_btn.hasClass("text-success")) {


                guests = tr.find("td .guests").val();
                name = tr.find(".name").html();

                id = tr.find("td .guests").attr("id");

                unit_price = tr.find(".unit_price").html();

                booking_id = getBookingId();



                if (guests !== "Set Guests") {

                    $.post("src/xhr.php", {

                        "action": "extras_update_by_booking_id",
                        booking_id: booking_id,
                        guests: guests,
                        id: id

                    }, function(data) {
                        // alert(unit_price +" "+id+" "+booking_id+ " "+guests )  
                        //alert(data)

                        if (parseInt(JSON.parse(data).length) != 0) {

                            gRows = "";
                            extras_temp_array = [];
                            total = 0;

                            $.each(JSON.parse(data), function(i, g) {

                                // alert(JSON.stringify(g));

                                extras_temp_array.push(g.extra_id);

                                gRows += "<tr>";
                                gRows += "<td>" + g.extra_name + "</td>";
                                gRows += "<td class='guests' >" + g.total_guests + "</td>";
                                gRows += "<td class='unit_price'>" + g.unit_price + "</td>";
                                gRows += "<td class='total' >" + Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price)) + "</td>";
                                gRows += "<td class='text-right'>" + "<i id='edit'  onclick='editExtra(this,\"" + g.id + "\")' class=\"fa fa-pencil btn-circle\"></i><i onclick='deleteExtra(\"" + g.id + "\")' class=\"fa fa-close btn-circle text-danger\"></i>" + "</td>";

                                gRows += "</tr>";

                                total += Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price));

                            })

                            sub_total = parseFloat($('#sub_ttl').val()) + total;

                            $('#booking-details').find("#d-s-total").text(Math.round(sub_total));

                            taxable_amount = sub_total - total;

                            $.post('src/get_data.php', {
                                token: "get_taxes_by_bid",

                                booking_id: booking_id

                            }, function(data) {


                                total_taxes = 0;
                                $.each(JSON.parse(data), function(taxes_index, tax) {
                                    total_taxes = total_taxes + (parseInt(taxable_amount) * (parseFloat(tax.taxamount) / 100));


                                });

                                total_taxes = $('#booking-details').find("#d-taxes").html(Math.round(total_taxes));
                                getBalance();


                            });


                            tbExtras.html(gRows);

                            var opt = "";

                            $.each(extras_drop_box, function(i, item) {

                                var id = item.id;
                                if (extras_temp_array.indexOf(id) == -1) {

                                    var name = item.name;
                                    var price = item.price;
                                    opt += " <a class=\"dropdown-item\" onclick='addSelectedExtra(this,\"" + id + "\")' data-price=\"" + price + "\" >" + name + "</a>";

                                }


                            })

                            $('#extras_drop').html(opt);

                        }

                    });

                } else {




                }



            } else {

                var p = $('#booking-details');
                guest_html = tr.find(".guests");
                guests = p.find("#d-guest-count").html();
                guests = guests.replace("(", "");
                guests = guests.replace(")", "");
                select_html = "<select  class='guests tiny' id=\"" + id + "\" onchange=\"calculateTotal(this)\" >";
                select_html += "<option>Set Guests</option>";
                for (km = 1; km < (parseInt(guests) + 1); km++) {

                    select_html += "<option>" + km + "</option>";
                }

                select_html += "</select>";
                guest_html.html(select_html)

            }






        }

        function addSelectedExtra(context, id) {


            if ($(".new_row").html() === undefined) {

                var tbExtras = $('#booking-details #d-tb-extras tbody');
                //alert(id)

                var name = $(context).text();
                var price = $(context).attr("data-price");
                gRows = "";
                gRows += "<tr class='new_row'>";
                gRows += "<td class='name' >" + name + "</td>";

                select_html = "<select  class='guests tiny' id=\"" + id + "\" onchange=\"calculateTotal(this)\" >";
                var p = $('#booking-details');
                guests = $("#d-tb-guests tbody tr").length;

                select_html += "<option>Set Guests</option>";
                for (km = 1; km < (parseInt(guests) + 1); km++) {

                    select_html += "<option>" + km + "</option>";
                }

                select_html += "</select>";


                gRows += "<td  >" + select_html + "</td>";
                gRows += "<td class='unit_price'>" + price + "</td>";
                gRows += "<td class='total'>" + 0 + "</td>";
                gRows += "<td>" + '<i onclick="saveExtra(this)" class="fa fa-check btn-circle text-success"></i>' + "</td>";

                gRows += "</tr>";

                // alert(guests);

                tbExtras.append(gRows);

            } else {

                alertify.error("<i class='fa fa-times-circle'></i> Click check button for the unsaved extra service to proceed ");


            }




        }

        function get_templates() {
            $.post('src/get_data.php', {
                token: "email_template",

            }, function(data) {
                //            alert(data)
                var datau = JSON.parse(data);

                var opt = "";
                $.each(datau, function(i, item) {
                    var id = item.id;
                    var name = item.template_name;
                    //                opt += "<li value='" + id + "'>" + name + "</option>";
                    opt += "<li class='list-group-item' onclick='send_mail(\"" + id + "\")'> <a data-value='" + id + "'>" + name + "</a></li>";

                })
                $('#sel-email-template').html(opt);

            })
        }

        function send_mail(btn) {
            var subject = $("#send-email-modal #em-subject").val(),
                guest_email = $("#send-email-modal #booking-email option:selected").val(),
                body = $("#send-email-modal #e-temp-textarea").val(),
                s = $("#send-email-modal #email_select").is(":checked") ? "yes" : "no",
                bId = BOOKING_ID;

            //alert(bId);


            $.ajax({
                url: 'src/send_client_emails.php',
                type: 'POST',
                data: {
                    subject: subject,
                    receiver_email: guest_email,
                    body: body,
                    should_attach_invoice: s,
                    booking_id: bId
                },




                success: function(result) {
                    alertify.success('Your Email has been sent!');

                    $('#send-email-modal').modal("hide");
                    //                    $('#send-email-modal').append(result);

                    //	alert(result);

                },
                error: function(xhr, ajaxoptions, thrownerror) {

                }
            });
        }









        function deleteBooking(id) {

            alertify.confirm('Confirm Delete', 'Delete  this Booking?', function() {

                    $.post("src/update.php", {
                        page: "booking",
                        "reference": id,
                        result: JSON.stringify({
                            'booking_status': 'deleted'

                        })
                    }, function(response) {
                        if (response == "success") {
                            window.location.reload();
                            alertify.success('Booking Deleted');
                        } else {
                            alertify.error(response);
                        }
                    })

                    // alertify.success('Ok')
                },
                function() {
                    alertify.error('Canceled')
                }).set('labels', {
                ok: 'DELETE',
                cancel: 'CANCEL'
            });
        }

        function getbdata(b) {
            setInvoiceForClient(b)

            var g = b.no_guests
            if (b.guests.length >= parseInt(g)) {
                $('#addnewguest').hide()

            }
        }

        //    var prefix = '';
        //
        //    function setprefix(tp) {
        //        prefix = tp
        //    }

        function pad(number, length) {
            var str = '' + number;
            while (str.length < length) {
                str = '0' + str;
            }
            return str;
        }

        function setInvoiceForClient(b) {
            console.log(b)
            $("#c-table #t-date").text(b.booking_date);
            $("#c-table #t-receipt").text(b.invoice_no);
            //set customer details in the invoice
            //        $("#c-table #p-details").html("<b> Booking Name: " + $("#d-name").val()+"</b><br>" + $("#d-phone").val() + "<br> " + $("#d-email").val());
            $("#c-table #p-details").html("<b> Booking Name: " + b.booking_name + "</b><br>" + $("#d-phone").val() + "<br> " + $("#d-email").val());


            //set total rooms cost
            var roomTotalCost = 0;
            $.each(b.rooms, function(i, tr) { //total up all selected rows
                roomTotalCost += parseFloat(tr.price_per_night) * parseFloat(b.nights);


            });

            // setting purchases details in invoice
            var rows_c = "<tr><td>Rooms Booked for<br><b>" + b.nights + " Nights</b></td>" +
                "<td>1</td><td>" + roomTotalCost + "</td><td>$<label class='Rtotalcost ' id='totalcost'>" + roomTotalCost + "</label></td></tr>";

            var table_c = $(".table-invoice");
            var tablebody_c = table_c.find('tbody');

            var totalExtras = 0;

            var rows = "";
            if (!b.extras.length == 0) {
                $.each(b.extras, function(i, tr) { //total up all selected rows
                    totalExtras += parseFloat(tr.unit_price) * parseFloat(tr.total_guests);

                    rows += "<li>" + tr.extra_name + "(" + tr.total_guests + " Guests)</li>";
                });

                rows_c += "<tr><td>" +
                    "<b>Extra service: </b>" + rows +
                    "</td><td>1</td><td>" + totalExtras + "</td><td> $<label class='Etotalcost' id='totalcost'>" + totalExtras + "</label></td></tr>";
            }

            tablebody_c.html(rows_c);

            //calculating subtotal


            // gettablefoot(b.cost, b.discount);

        }




        function changeMessage(btn) {
            $(btn).html('<i class="fa fa-spin fa-spinner"></i> updating...')
            var v = $('#guest-message #guest-msg').val();

            var data = {
                description: v
            }
            $.post("src/update.php", {
                page: "booking",
                "reference": getBookingId(),
                result: JSON.stringify(data)
            }, function(response) {
                //alert(response);
                $(btn).html('Save changes');


                x0p('Updated', 'Guest Message has been updated', 'ok');

                //                alertify
                //                    .alert("Guest Message  Edited Succesfully", function() {});

                $("#guest-message").modal("hide");

            })

        }



        // for comments updating
        function changeComment(btn) {
            $(btn).html('<i class="fa fa-spin fa-spinner"></i> Updating...')
            var v = $('#internal-comments #edit-internal-comments').val();

            var data = {
                comments: v
            }

            $.post("src/update.php", {
                page: "booking",
                "reference": getBookingId(),
                result: JSON.stringify(data)
            }, function(response) {
                //alert(response);
                $(btn).html('Update Comment');


                x0p('Success', 'Internal Comments  have been updated', 'ok');


                //                alertify
                //                    .alert("Internal Comments  Edited Succesfully", function() {});

                $("#internal-comments").modal("hide");

            })

        }




        function change_room_allocation(room_id, rtId, pId) {
            $('#changeRoom-btn').attr('onClick', 'updateRoom(' + room_id + ')');
            document.getElementById('changeRoom-btn').disabled = true;

            $.post('src/get_data.php', {
                token: "change free rooms",
                property_id: pId,
                room_type_id: rtId,
                booking_id: getBookingId()
            }, function(data) {

                var opt = "";
                try {

                    var dataq = JSON.parse(data)[0]


                    $.each(dataq.rooms, function(i, g) {

                        opt += '<div class="form-check">' +
                            '<input class="form-check-input" onchange="radioChange()" name="roomgroup" type="radio" id="' + g.id + '" value="' + g.id + '">' +
                            '<label class="form-check-label" for="' + g.id + '">' + g.name + '</label>' +
                            '</div>'

                    })


                } catch (error) {



                }
                if (opt == "") {

                    opt = '<label class="form-check-label" ">No Rooms Available !!!</label>';
                }

                $('#room-btn-grp').html(opt)
            })

        }

        function updateRoom(c_room_id) {
            if ($('input[type="radio"][name="roomgroup"]:checked').length) {
                var nroom = $('input[type="radio"][name="roomgroup"]:checked').val()

                var data = {
                    "room_id": nroom
                }


                $.post("src/update.php", {
                    page: "booked room",
                    "reference": 1,
                    result: JSON.stringify(data),
                    booking_id: getBookingId(),
                    c_room_id: c_room_id
                }, function(response) {
                    if (response == 'success') {
                        alertify
                            .success("Booked room Succesfully changed", function() {

                            });
                        $('#edit-sel-room').modal('hide')
                    }


                })
            }
        }

        function radioChange() {
            if ($('input[type="radio"][name="roomgroup"]:checked').length) {
                document.getElementById('changeRoom-btn').disabled = false;
            }
        }


        function changeCheck_in_out() {


            if (!inputsEmpty("#check-in-out-form")) {
                var checkin = $("#d-check-in").val()
                var checkout = $("#d-check-out").val()
                var bookingId = getBookingId();
                var pppid = getPropertyId()
                var nights = new Date(checkout) - new Date(checkin);
                nights = nights / 1000 / 3600 / 24;

                // alert(bookingId );

                var ddd = new Date(checkin) - new Date(gettoday())

                if (ddd < 0) {
                    errorMSG("#d-check-in", "this date should start from today to the future");
                } else {
                    if (nights > 0) {


                        $.post('src/get_data.php', {
                            token: "change free check-in-out",
                            booking_id: getBookingId(),
                            check_in: checkin,
                            check_out: checkout
                        }, function(result) {

                            //alert(result)

                            if (parseInt(result) == 1) {
                                alertify
                                    .success("Check-in and Check-out dates Succesfully changed", function() {

                                    });
                            } else {
                                errorMSG("#d-check-out", "Booked rooms are not free for this  period");
                            }

                        })


                    } else {
                        errorMSG("#d-check-out", "this date should be greater than check-in");
                    }
                }

            }
        }



        function some_change() {

            get_freerooms();
            loadprices();
        }


        function loadprices() {

            var property_id = $("#properties_edit").val();

            var room_type_id = $("#roomtypes_").val();

            var check_in = $("#check_in_date_").val();
            var check_out = $("#check_out_date_").val();

            var meal_plan = $('#meal_plan_').val();

            $.post('src/get_data.php', {

                token: "load_prices",
                property_id: property_id,
                checkIn: check_in,
                checkOut: check_out,
                roomtypeId: room_type_id,
                meal_plan: meal_plan

            }, function(data) {
                // alert(data)
                var prices = JSON.parse(data);

                var opt = "<option value=''>Select</option>";

                $.each(prices, function(i, item) {

                    opt = opt + "<option value='" + item.amount + "' >" + item.label + "</option>";

                });

                $('#price_rate').html(opt);


            })

            //$(".chosen").trigger("chosen:updated");



        }

        /*editing Rooms*/
        function editRoom(btn) {
            //            alert(btn)
            $("#edit-room .modal-title small").text("Change Room Details");
            $("#edit-room .section-for-edit").show();
            $("#edit-room .section-for-new").hide();
            $("#properties_edit").val(property_id);

            $("#properties_edit").prop("required", false);
            $("#roomtypes_").prop("required", false);

            $("#edit-room").modal("show"); //data-t_id


            var tr = $(btn).parents('tr');

            var tr_id = tr.attr("data-t_id");
            var i = tr.attr("data-b_id");

            $("#b_id").val(i);

            $("#record_id").val(tr_id);

            var property_id = tr.find("#ep_id").attr("data-property_id");

            var room_type_id = tr.find("#ermtype_id").attr("data-room_type_id");
            var room_type_name = tr.find("#ermtype_id").html();
            var property_name = tr.find("#ep_id").text();

            var check_in = tr.find("#check_in_dateE").html();
            var check_out = tr.find("#check_out_dateE").html();

            var meal_plan = tr.find(".meal_plan").text();
            var price_rate = tr.attr("data-price-rate");
            var room_type_id = tr.attr("data-rt-id");
            var room_id = tr.attr("data-r-id");
            var room_name = tr.find("#erm_name").text();

            $("#edit-room .section-for-edit #room-type-name_").html(room_type_name);
            $("#edit-room .section-for-edit #property-name_").text(property_name);

            //            $("#properties_edit").val(property_id);

            getRoomTypesForEdit(property_id, room_type_id);

            $("#check_in_date_").val(check_in);
            $("#check_out_date_").val(check_out);

            $("#meal_plan_").val(meal_plan);
            if (meal_plan == "Custom") {
                $("#view-edit-meal-plan").show();
            } else {
                $("#view-edit-meal-plan").hide();

            }
            //            $("#price_rate_").val(price_rate);

            //            $("#price_rate_").val(meal_plan);

            // $('#meal_plan_').val(meal_plan);
            //            alert(room_type_id);


            $.post('src/get_data.php', {
                token: "free rooms",
                property_id: property_id,
                check_in: check_in,
                check_out: check_out,
                room_type_id: room_type_id

            }, function(data) {
                //alert(data)
                var rooms_ = JSON.parse(data)

                var opt = "<option value=''>Select</option>";

                var rsm = false;
                $.each(rooms_[0].rooms, function(i, item) {
                    if (item.id == room_id) {
                        rsm = true;
                    }
                    opt += "<option value='" + item.id + "' >" + item.name + "</option>";

                });

                if (rsm == false) {
                    opt += "<option value='" + room_id + "' >" + room_name + "</option>";

                }
                $('#free_rooms').html(opt);
                $('#free_rooms').val(room_id); //set selected room id


            });

            $.post('src/get_data.php', {

                token: "load_prices",
                property_id: property_id,
                checkIn: check_in,
                checkOut: check_out,
                roomtypeId: room_type_id,
                meal_plan: meal_plan

            }, function(data) {
                //alert(data)
                var prices = JSON.parse(data);

                var opt = "<option>Select</option>";

                $.each(prices, function(i, item) {

                    opt += "<option value='" + item.amount + "' >" + item.label + "</option>";

                });

                $('#price_rate').html(opt);

            });
            //$(".chosen").chosen({ width:"110%", disable_search_threshold:10 });

            ///set the form elements with data
        }


        function update_booked_rooms(btn) {

            if (!inputsEmpty("#form-room")) {
                var record_id = $("#record_id").val();

                var b_id = $("#b_id").val();
                //                alert(b_id)
                var property_id = $("#properties_edit").val();

                var room_type_id = $("#roomtypes_ option:selected").val();

                var room_id = $("#free_rooms").val();

                var check_in = $("#check_in_date_").val();
                var check_out = $("#check_out_date_").val();

                var meal_plan = $('#meal_plan_').val();

                var price_rate = $('#price_rate').val();

                var price_name = $('#price_rate option:selected').text();

                var booking_id = getBookingId();
                //alert(booking_id)


                if (meal_plan !== 'Select' && price_rate !== 'Select' && room_id !== "Select" && check_in.length != 0 && check_out.length != 0) {


                    $.post('src/xhr.php', {

                        action: "change_room_",
                        record_id: record_id,
                        booking_id: booking_id,
                        property_id: property_id,
                        check_in: check_in,
                        check_out: check_out,
                        room_type_id: room_type_id,
                        room_id: room_id,
                        price_rate: price_rate,
                        price_name: price_name,
                        meal_plan: meal_plan

                    }, function(data) {

                        //location.reload();
                        //                    alert(data)
                        $("#edit-room").modal("hide")
                        x0p("Done", "Booking has been upadted", "ok", false);
                        getBooking(BOOKING_ID);
                        //                        alert(BOOKING_ID)
                        //showDetails(b_id);

                        // alert(b_id);




                    });

                } else {


                    alertify.error("<i class='fa fa-times-circle'></i> Provide all the required information ");


                }

                /*
                alert(record_id+" "+booking_id+" "+property_id+" "+room_type_id+" "+room_id+" "+check_in+" "+check_out+" "+meal_plan+" "+price_rate +" "+price_name );
                */




                //$(".chosen").trigger("chosen:updated");

            }
        }

        function getRoomTypesForEdit_() {
            var property_id = $("#properties_edit").val();
            // alert(1)
            var sel = $("#roomtypes_");
            sel.prop("disabled", true);

            $.post('src/get_data.php', {
                token: "roomtypes",
                property_id: property_id
            }, function(data) {
                var o = "<option value=''>Select</option>";
                //            alert(data)
                var rts = JSON.parse(data);
                $.each(rts, function(i, rt) {
                    o += "<option value='" + rt.id + "'>" + rt.name + "</option>";
                });


                sel.html(o);
                //sel.val(room_type_id);
                sel.prop("disabled", false);

            })
        }

        function getRoomTypesForEdit(property_id, room_type_id) {

            // alert(1)
            var sel = $("#roomtypes_");
            sel.prop("disabled", true);

            $.post('src/get_data.php', {
                token: "roomtypes",
                property_id: property_id
            }, function(data) {
                var o = "<option value=''>Select</option>";
                //            alert(data)
                var rts = JSON.parse(data);
                $.each(rts, function(i, rt) {
                    o += "<option value='" + rt.id + "'>" + rt.name + "</option>";
                });


                sel.html(o);
                //sel.val(room_type_id);
                sel.prop("disabled", false);

            })
        }

        function createNewRoom(btn) {
            //
            //            $("#edit-room .modal-title small").text("Add Accomodation");
            //            $("#edit-room .form-control").val("");
            //            $("#edit-room #record_id").val("0");
            //            $("#edit-room .section-for-edit").hide();
            //            $("#edit-room .section-for-new").show();
            $("#add-room").modal("show");
            //            $("#properties_edit").prop("required", true);
            //            $("#roomtypes_").prop("required", true);
        }



        function printBooking() {

            var title = "Booking details";
            var content = "";

            var contacts = $("#booking-contacts").html();
            var frontDesk = $("#booking-front-desk").html();
            var bookingDates = $("#booking-dates").html();
            var rooms = $("#rooms-selected").html();
            var guests = $("#guests-added").html();
            var extras = $("#extras-selected").html();
            var payments = $("#payments-added").html();
            var kids = $("#kids-added").html();
            var beds = $("#beds-added").html();
            var balance = $(".d-balance").text();


            var message = $("#d-message").html();
            message = "<h4>CLIENT'S MESSAGE:</h4><p>" + message + "</p>";



            content += "<table>";
            content += "<tr>";
            content += "<td>" + contacts + "</td>";
            content += "<td>" + bookingDates + "</td>";
            content += "<td>" + frontDesk + "</td>";
            content += "<td><b>Outstanding: <br>USD</b> " + balance + "</td>";
            content += "</tr>";
            content += "</table>";
            content += rooms;
            content += extras;
            content += payments;
            content += guests;
            content += kids;
            content += beds;
            content += message;
            printHtml(title, content);
        }

        //mon 6/25
        function updateChildrenModal(i) {
            var modal = $("#add-child");
            var total = modal.find('[name=total]');
            var unitPrice = modal.find('[name=unit-price]');
            var noOfChildren = modal.find('[name=no-of-children]');
            var ageGroup = modal.find('[name=age-group]');
            var Nights_k = modal.find('[name=no-of-nights]');
            var up;
            if (i == 1) {
                up = ageGroup.find("option:selected").val();
                unitPrice.val(up);
            } else {

                up = unitPrice.val();
            }
            var t = 0,

                ngt = Nights_k.val(),
                ngt = ngt == "" ? 0 : parseInt(ngt),

                upx = up == "" ? 0 : parseFloat(up),
                noc = noOfChildren.val() == "" ? 0 : parseInt(noOfChildren.val()),
                ttl = Math.round(noc * upx * ngt);

            if (noc > 0 && upx > 0) {

                total.val(ttl);
            }


        }



        //        function updateVal(me, target){
        //            $(target).val($(me).val())
        //        }
        function updateBedsModal(i) {
            var modal = $("#add-extra-bed-");

            var total = modal.find('[name=total]');
            var unitPrice = modal.find('[name=unit-price]');
            var noOfBeds = modal.find('[name=no-of-beds]');
            var bedType = modal.find('[name=bed-type]');
            var nights = modal.find('[name=nights]');

            var up;

            if (i == 1) {
                up = bedType.find("option:selected").val().replace('$', '');
                unitPrice.val(up);
            } else {
                up = unitPrice.val().replace('$', '');
            }

            var t = 0,

                upx = up == "" ? 0 : parseFloat(up),
                nob = noOfBeds.val() == "" ? 0 : parseInt(noOfBeds.val()),
                n = nights.val() == "" ? 0 : parseInt(nights.val()),
                ttl = Math.round(nob * upx * n);


            // alert(nob)
            if (nob > 0 && upx > 0 && n > 0) {

                total.val(ttl);
            }


        }

        function getKids() {
            var kids = new Array();
            $("#d-tb-kids tbody tr").each(function(i, tr) {
                var age_bracket = $(tr).find('td:eq(0)').text();
                var children = $(tr).find('td:eq(1)').text();
                var unit_price = $(tr).find('td:eq(2)').text();
                var amount = $(tr).find('td:eq(3)').text();


                kids[i] = {
                    age_bracket: age_bracket,
                    children: children,
                    unit_price: unit_price,
                    amount: amount
                };

            });

            return kids;
        }

        function updateKids(btn) {
            var kids = new Array();
            if (!inputsEmpty("#add-child")) {
                $(btn).html("<i class='fa fa-spin fa-spinner'></i> updating...");


                var age = $("#age-grp option:selected").text();
                var number_ofkids = $("#noc").val();
                var price_perkid = $("#price-perkid").val();
                var ttl_nights = $("#ngts").val();
                var amount_total = $("#tT_amount").val();


                kids = getKids();
                var newKid = {
                    age_bracket: age,
                    children: number_ofkids,
                    unit_price: price_perkid,
                    amount: amount_total,
                    nights: ttl_nights
                }

                kids.push(newKid);

                kids = JSON.stringify(kids);
                var bookingId = BOOKING_ID;
                $.post("src/xhr.php", {
                    action: 'update booking kids',
                    booking_id: bookingId,
                    kids: kids
                }, function(data) {
                    $(btn).html("<i class='fa fa-check-circle'></i> Add");
                    $("#add-child").modal('hide');
                    //                    alertify.success("Booking has been updated");
                    //
                    //                    var newrow = "<tr>";
                    //                    newrow += "<td>" + newKid.age_bracket + "</td>";
                    //                    newrow += "<td>" + newKid.children + "</td>";
                    //                    newrow += "<td>" + newKid.unit_price + "</td>";
                    //                    newrow += "<td>" + newKid.amount + "</td>";
                    //                    newrow += "<td class='print-hide text-right' onclick='removeKidsRate(this)'><button class='fa fa-remove btn btn-circle'></button></td>";
                    //                    newrow += "</tr>";
                    //                    $("#d-tb-kids tbody").append(newrow);

                    x0p("Done", "Booking has been upadted", "ok", false);
                    getBooking(BOOKING_ID);
                })
            }
        }


        function removeKidsRate(btn) {
            // alert($(btn).html());
            x0p("Delete Item?", "Are you sure you want to delete this item?", "warning",
                function(cc) {
                    if (cc = "warning") {
                        //alertify.confirm().close(); 
                        $(btn).parents('tr').remove();
                        var kids = getKids();
                        kids = JSON.stringify(kids);
                        var bookingId = BOOKING_ID;
                        $.post("src/xhr.php", {
                            action: 'update booking kids',
                            booking_id: bookingId,
                            kids: kids
                        }, function(data) {
                            x0p("Done", "Booking has been upadted", "ok", false);
                            getBooking(BOOKING_ID);
                        });
                    }
                });
        }


        function getBeds() {
            var beds = new Array();
            $("#d-tb-beds tbody tr").each(function(i, tr) {
                var bed_name = $(tr).find('td:eq(0)').text();
                var unitPrice = $(tr).find('td:eq(3)').text();
                var totalbeds = $(tr).find('td:eq(1)').text();
                var amount = $(tr).find('td:eq(4)').text();
                var t_nights = $(tr).find('td:eq(2)').text();
                // console.log(bed_name)
                beds[i] = {
                    bed_name: bed_name,
                    unit_price: unitPrice,
                    no_of_beds: totalbeds,
                    amount: amount,
                    nights: t_nights
                };

            });

            // alert(JSON.stringify(beds));
            return beds;
        }

        function updateBeds(btn) {
            var btnHtml = $(btn).html();
            if (!inputsEmpty("#add-extra-bed-")) {
                $(btn).prop("disabled", true);
                $(btn).html("<i class='fa fa-spin fa-spinner'></i> Saving...")
                var modal = $("#add-extra-bed-");

                var total = modal.find('[name=total]').val();
                var unitPrice = modal.find('[name=unit-price]').val();
                var totalbeds = modal.find('[name=no-of-beds]').val();
                var bedType = modal.find('[name=bed-type] option:selected').text();
                var nights = modal.find('[name=nights]').val();
                // alert(nights)

                var beds = getBeds();
                beds.push({
                    bed_name: bedType,
                    unit_price: unitPrice,
                    no_of_beds: totalbeds,
                    amount: total,
                    nights: nights
                });

                beds = JSON.stringify(beds);
                // alert(beds)
                $.post("src/xhr.php", {
                    action: "update beds",
                    beds: beds,
                    booking_id: BOOKING_ID
                }, function(data) {
                    $(btn).prop("disabled", false);
                    $(btn).html(btnHtml);
                    modal.modal('hide');
                    //                  alertify.success("Booking has been updated");

                    //                    var newrow = '';
                    //                    newrow += "<tr>";
                    //                    newrow += "<td>" + bedType + "</td>";
                    //                    newrow += "<td>" + totalbeds + "</td>";
                    //                    newrow += "<td>" + nights + "</td>";
                    //                    newrow += "<td>" + unitPrice + "</td>";
                    //                    newrow += "<td>" + total + "</td>";
                    //                    newrow += "<td class='print-hide text-right' onclick='removeExtraBed(this)'><button class='fa fa-remove btn btn-circle'></button></td>";
                    //
                    //                    newrow += "</tr>";
                    //                    $("#d-tb-beds tbody").append(newrow);

                    x0p("Done", "Booking has been upadted", "ok", false);
                    getBooking(BOOKING_ID);
                });



            }
        }


        function removeExtraBed(btn) {
            // alert($(btn).html());
            x0p("Remove Bed(s)?", "Are you sure you want to remove this item from the booking?", "warning",
                function(cc) {
                    if (cc == "warning") {
                        //alertify.confirm().close(); 
                        $(btn).parents('tr').remove();
                        var beds = getBeds();
                        beds = JSON.stringify(beds);
                        var bookingId = BOOKING_ID;
                        $.post("src/xhr.php", {
                            action: 'update beds',
                            booking_id: bookingId,
                            beds: beds
                        }, function(data) {
                            // alertify.success("Booking has been updated");
                            x0p("Done", "Booking has been upadted", "ok", false);
                            getBooking(BOOKING_ID);
                        });
                    }

                });
        }

        function setEmailTemplate(sel) {
            var pos = parseInt($(sel).find("option:selected").val());
            var templates = <?php echo (json_encode($templates));?>;
            console.log(templates)
            //                alert(templates[pos].template_name);
            $('.modal#send-email-modal [name=subject]').val(templates[pos].template_name);
            $('.modal#send-email-modal #e-temp-textarea').summernote('code', templates[pos].template_body);


        }
        var yr = <?php echo date('Y');?>;

        function openGuestModal(guest) {
            //   console.log(guest)
            var modal = $("#new-guest"),
                name = modal.find("#g-name"),
                age = modal.find("#g-age"),
                email = modal.find("#g-email"),
                phone = modal.find("#g-phone"),
                ID = modal.find("#g-passportno"),
                guestId = modal.find("#g-id"),
                title = modal.find(".modal-title"),
                btn = modal.find('.btn-save');
            if (guest != "0") {

                var myage = yr - parseInt(guest.year_of_birth);
                myage = isNaN(myage) ? "" : myage;
                name.val(guest.name);
                age.val(myage);
                email.val(guest.email);
                phone.val(guest.phone);
                ID.val(guest.id_number);
                guestId.val(guest.guest_id);
                btn.val(guest.phone);
                title.val(guest.phone);

                title.text("Edit Guest");
                btn.html("Save changes");
            } else {
                modal.find("input").val("");
                guestId.val(0);
                title.text("Add guests (Adults)");
                btn.html("Add guest");
            }
            modal.modal("show")

        }

        function openPaymentModal(payment, editbtn) {
            $(".being-edited").removeClass("being-edited");
            console.log(payment)
            var modal = $("#new-pay"),
                date = modal.find("#p-date"),
                amount = modal.find("#p-amount"),
                method = modal.find("#p-method"),
                ref = modal.find("#p-ref"),
                id = modal.find("#p-id"),
                comment = modal.find("#p-comment"),
                title = modal.find(".modal-title"),
                btn = modal.find(".btn-save");
            if (payment == "0") {
                modal.find('input').val('');
                id.val("0");
                btn.html("Add Payment");
                title.text("Register New payment");


            } else {
                id.val(payment.id);
                //  alert(payment.id)
                date.val(payment.date_paid)
                amount.val(payment.amount)
                method.val(payment.payment_method)
                ref.val(payment.payment_reference);
                comment.val(payment.payment_comments);
                btn.html("Save changes");
                title.text("Edit payment");
                $(editbtn).parents("tr").addClass("being-edited");
                // alert($(btn).html())
            }

            modal.modal("show")
        }

        function deletePayment(id, btn) {
            x0p("Remove Payment", "Are you sure you want to delete this payment? This can't be undone.", "warning", function(cc) {
                if (cc == "warning") {


                    $.post("src/xhr.php", {
                        action: 'delete payment',
                        id: id,
                        booking_id: BOOKING_ID
                    }, function(data) {
                        $(btn).parents("tr").remove();
                        //                    alertify.success("Booking has been updated");
                        x0p("Done", "Booking has been upadted", "ok", false);
                        getBooking(BOOKING_ID);
                    });

                }
            });
        }

        function removeGuest(id, btn) {

            if ($(btn).parents("tbody").find('tr').length <= 1) {
                x0p("Can't Remove Guest", "There has to be atleast one guest.", "info", false);
            } else {
                x0p("Remove Guest?", "Are you sure you want to remove this guest from reservation? This can't be undone.", "warning", function(choice) {
                    if (choice == "warning") {
                        $.post("src/xhr.php", {
                            action: 'delete guest',
                            id: id,
                            booking_id: BOOKING_ID
                        }, function(data) {
                            x0p("Done", "Booking has been upadted", "ok", false);
                            getBooking(BOOKING_ID);
                            //                            alert(data);
                            //$(btn).parents("tr").remove();
                            //alertify.success("Booking has been updated");


                        })
                    }
                });
            }
        }

        function removeBookedRoom(i) {
            if ($("#d-tb-rooms tbody tr").length <= 1) {
                x0p("Can't be removed", "There has to be atleast one room for this reservation.", "info", false);

            } else {
                x0p("Confirm", "Remove this room from reservation?", "warning", function(choice) {
                    if (choice == "warning") {
                        $.post("src/xhr.php", {
                            action: "delete booked room",
                            id: i
                        }, function(data) {
                            x0p("Done", "Booking has been updated", "ok", false);
                            getBooking(BOOKING_ID);
                        });
                    }
                });
            }
        }

        function saveInvoiceOptions() {
            var discount = $("#d-discount").val();
            var taxes = JSON.stringify(getIncludedTaxes());
            var payment_options = JSON.stringify(getPaymentOption());

            //            alert(payment_options)
            $.post("src/xhr.php", {
                action: "save invoice options",
                id: BOOKING_ID,
                discount: discount,
                taxes: taxes,
                po: payment_options
            }, function(data) {
                x0p("Done", "Booking has been updated", "ok", false);
            })
        }

        function getIncludedTaxes() {
            var taxes = new Array();

            $("#d-taxes-included .tax-item").each(function(i, t) {
                var input = $(t).find("input[type=checkbox]");
                if (input.is(":checked")) {
                    taxes.push({
                        taxname: input.attr("data-taxname"),
                        taxamount: input.attr("data-taxamount")

                    });
                }
            });

            return taxes;
        }

        function getPaymentOption() {
            var pos = new Array();

            var input = $(".po-item input:checked");
            if (input.length > 0) {
                pos = {
                    bank_name: input.attr("data-bankname"),
                    account_name: input.attr("data-accountname"),
                    account_number: input.attr("data-account_number"),
                    swift_code: input.attr("data-swiftcode"),
                    bank_currency: input.attr("data-currency")

                };

            }

            return pos;
        }

        function getInvoiceOptions() {
            $(".invoice-opt .btn").prop("disabled", true);
            $.post("src/xhr.php", {
                action: "get invoice options",
                id: BOOKING_ID
            }, function(data) {

                var d = JSON.parse(data);
                var po = d.b_payment_options;
                //                po = po == null ? new Array() : po;
                //                alert(d.b_payment_options.bank_name)
                $("#d-discount").val(d.discount);
                var bTaxes = "";

                //                alert(po.bank_name);

                $.each(d.taxes, function(i, tax) {
                    var checked = "";
                    $.each(d.b_taxes, function(j, t) {
                        if (JSON.stringify(t) == JSON.stringify(tax)) {
                            checked = 'checked';
                        }
                    });
                    bTaxes += "<div class='tax-item'><input " + checked + " type='checkbox' id='tx-" + i + "' data-taxname='" + tax.taxname + "' data-taxamount='" + tax.taxamount + "'/> <label for='tx-" + i + "'>" + tax.taxname + "(" + tax.taxamount + "%)</label></div>";
                });

                if (bTaxes == "") {
                    bTaxes = "<span class='text-muted'>No Taxes Included</span>";
                }


                $("#d-taxes-included").html(bTaxes);
                $(".invoice-opt .btn").prop("disabled", false);
                var pms = "";
                //alert(JSON.stringify(d.payments));
                $.each(d.payments, function(i, p) {
                    var selected = "";
                    //alert(JSON.stringify(p) + " = " + JSON.stringify(po));
                    if (JSON.stringify(p) == JSON.stringify(po)) {

                        selected = "checked";


                    }
                    pms += "<div class='po-item'><input type='radio' name='payment' " + selected + " id='po-" + i + "' data-bankname='" + p.bank_name + "' data-accountname='" + p.account_name + "' data-account_number='" + p.account_number + "' data-swiftcode='" + p.swift_code + "' data-currency='" + p.bank_currency + "'/> <label for='po-" + i + "'>" + p.bank_name + "</label></div>";


                });

                $("#d-payments-options").html(pms);
            })
        }

    </script>

    <script>
        // $("#mytextarea").summernote();
        $(document).ready(function() {
            $('#e-temp-textarea').summernote({
                height: 200,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    //                    ['fontsize', ['fontsize']],
                    //                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    //                    ['height', ['height']]
                ],
                // callbacks: {
                //     mouseDown: function(e) {
                //         $(".btn-save").removeClass('hid');
                //     }
                // }
            });
        });

        // $('#editor').on('summernote.focus', function() {
        //     $(".btn-save").removeClass('hid');
        // });

    </script>

    <script>
        function ar_getFreeRooms(btn){
            if (!inputsEmpty("#ar_form-room")) {
                var checkIn = $("#ar_check-in").val();
                var checkOut = $("#ar_check-out").val();
                var pId = $("#properties_add_rooms option:selected").val();
                var rtId = $("#roomtypes_add option:selected").val();

                var nights = new Date(checkOut) - new Date(checkIn);
                nights = nights / 1000 / 3600 / 24;

                var ddd = new Date(checkIn) - new Date(gettoday())

                if (ddd < 0) {
                    errorMSG("#ar_check-in", "this date should start from today to the future");
                } else {
                    if (nights > 0) {
                        $(btn).html("<i class='fa fa-spin fa-spinner'></i> Checking free rooms...");

                        setNights(nights);
                        setPropertyId(pId);
                        setCheckIn(checkIn);
                        setCheckOut(checkOut);

                        //                alert(checkIn);

                        // alert(getNights())
                        $.post('src/get_data.php', {
                            token: "free rooms",
                            property_id: pId,
                            room_type_id: rtId,
                            check_in: checkIn,
                            check_out: checkOut
                        }, function(data) {
                            //  alert(data);
                            $(btn).html("<i class='fa fa-refresh'></i> Load Rooms")

                            setFreeRooms(data);
                            $(".nights_number").html("<b>"+nights+"</b>");
                            $(".checkIn-checkOut").text(checkIn+" to "+ checkOut);
                            

                        })
                    } else {
                        errorMSG("#check-out", "This date should be greater than check-in");
                    }
                }
            }
        }

        var freeRooms_ = "";
        var manaul_room_allocation = {};
        var meal_plan_tracker = {};
        var booked_as_tracker = [];

        var meal_plan_tracker_days = {};
        function setFreeRoomsData(c) {
            freeRooms_ = c;
        }
        function getFreeRoomsData() {
            return freeRooms_;
        }




    function add_room_book(btn){

        var freeRms = JSON.parse(getFreeRoomsData());

           var c = new Array();
        //alert(getFreeRoomsData())
        booked_as_tracker = [];

        var rooms_tracker_per_property = {};
        $("#ar_tb-free-rooms tr.selected").each(function(j, tr) {
            var position = parseInt($(tr).find(".position").val());
            var rms = $(tr).find(".rm-count option:selected").val();
            
            var a = new Array();
            var rtId = freeRms[position].id //roomtype id;
            var rooms = freeRms[position].rooms;
            var propid = freeRms[position].property_id;

            var room_type_id_ = $(tr).find(".meal-plans").attr('id');

            var meal_plan = $(tr).find(".meal-plans").val();
            
            var price = $(tr).find("#" + room_type_id_ + "unit-price").val();
            var pricerate_ = $(tr).find(".rm-prices option:selected").text();
            room_type_id_=room_type_id_.replace('u_','');
           //get room equal to the selected rooms
           for (var r = 0; r < rms; r++) {

            var id_ = rooms[r].id;
            var name__ = rooms[r].name;
           
            if (rooms_tracker_per_property.hasOwnProperty(rtId)) {
                    // alert(21)

                    if (rooms_tracker_per_property[rtId].indexOf(id_) == -1) {

                        // alert(22)

                        if (rtId != room_type_id_) {
                            // alert(23)

                            booked_as_tracker.push({
                                room_type_id: rtId,
                                room_id: id_,
                                room_id_used_as: room_type_id_
                            });

                            c.push({
                                room_type_id: rtId,
                                room_id: id_,
                                price_per_night: price,
                                price_rate: pricerate_,
                                booked_as: room_type_id_,
                                meal_plan: meal_plan


                            });

                        } else {
                            // alert(24)
                            /* booked_as_tracker.push({
                                 room_type_id: rtId,
                                 room_id: id_,
                                 room_id_used_as: room_type_id_
                             });*/

                            c.push({
                                room_type_id: rtId,
                                room_id: id_,
                                price_per_night: price,
                                price_rate: pricerate_,
                                meal_plan: meal_plan

                            });

                        }


                    } else {

                        // alert(25);


                        // alert(rooms_tracker_per_property[rtId].length)

                        try {
                            var next_index = rooms_tracker_per_property[rtId].length;


                            if (rtId != room_type_id_) {
                                // alert(26);
                                booked_as_tracker.push({
                                    room_type_id: rtId,
                                    room_id: rooms[next_index].id,
                                    room_id_used_as: room_type_id_
                                });
                                c.push({
                                    room_type_id: rtId,
                                    room_id: rooms[next_index].id,
                                    price_per_night: price,
                                    price_rate: pricerate_,
                                    booked_as: room_type_id_,
                                    meal_plan: meal_plan


                                });
                            } else {
                                // alert(27);
                                var next_index = rooms_tracker_per_property[rtId].length;


                                if (search(id_, rtId, c)[0] == false) {

                                    c.push({
                                        room_type_id: rtId,
                                        room_id: rooms[next_index].id,
                                        price_per_night: price,
                                        price_rate: pricerate_,
                                        meal_plan: meal_plan
                                    });
                                } else {

                                    // alert(JSON.stringify(rooms[next_index].id))
                                    c.push({
                                        room_type_id: rtId,
                                        room_id: rooms[next_index].id,
                                        price_per_night: price,
                                        price_rate: pricerate_,
                                        meal_plan: meal_plan
                                    });

                                }


                            }
                        } catch (err) {



                        }


                    }

                } else {

                    rooms_tracker_per_property[rtId] = id_;

                    // alert(28);
                    if (rtId != room_type_id_) {

                        //alert(29);
                        if (search(id_, rtId, c)[0] == false) {
                            // alert(30);
                            booked_as_tracker.push({
                                room_type_id: rtId,
                                room_id: id_,
                                room_id_used_as: room_type_id_
                            });

                            c.push({
                                room_type_id: rtId,
                                room_id: id_,
                                price_per_night: price,
                                price_rate: pricerate_,
                                booked_as: room_type_id_,
                                meal_plan: meal_plan

                            });
                        }

                    } else {
                        // alert(31);
                        /*flag=search(id_,rtId, c);
                         booked_as_tracker.push({
                             room_type_id: rtId,
                             room_id: id_,
                             room_id_used_as: room_type_id_
                         });*/

                        if (search(id_, rtId, c)[0] == false) {
                            // alert(32);
                            c.push({
                                room_type_id: rtId,
                                room_id: id_,
                                price_per_night: price,
                                price_rate: pricerate_,
                                meal_plan: meal_plan

                            });

                        } else {

                            // alert(33);
                            var next_index = rooms_tracker_per_property[rtId].length;
                            try {

                                c.push({
                                    room_type_id: rtId,
                                    room_id: rooms[next_index].id,
                                    price_per_night: price,
                                    price_rate: pricerate_,
                                    meal_plan: meal_plan

                                });



                            } catch (error) {



                            }




                        }


                    }
                }

               

            }


        
        })
        if (c.length < 1) {
            alertify.error("<i class='fa fa-times-circle'></i> Select one or more rooms first");
            return false
        }
        rooms=c
        var booking_id = getBookingId();
        var meal_plan_per_day = JSON.stringify(meal_plan_tracker_days);
        var check_in_date = $("#ar_check-in").val();
         var check_out_date = $("#ar_check-out").val();
        

        if (!($(btn).hasClass("loading"))) {
            var btnHtml = $(btn).html();
            $(btn).addClass("loading");
            $(btn).html("<i class='fa fa-spin fa-spinner'></i> Adding Room...");

            $.post("src/xhr.php", {
                action: "add rooms",
                rooms: JSON.stringify(rooms),
                meal_plan_per_day: meal_plan_per_day,
                booking_id:booking_id,
                check_in_date:check_in_date,
                check_out_date:check_out_date

            }, function(data) {

                x0p("Done", "New room has been added to booking.", "ok", false);

                $(btn).removeClass("loading");
                $(btn).html(btnHtml);
                getBooking(BOOKING_ID);
                $("#add-room").modal("hide");
                
            });

        }
      
       
    }


    </script>