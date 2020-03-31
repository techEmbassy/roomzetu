<style>
    #tb-free-rooms td .form-control {
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

     .data-used_as:hover {
    background: #B8B8B8;
    border-color: #a14108 !important;
    color: #fff !important;
    }

</style>

<?php include 'new-agent.php'; ?>


<div class="modal animated FadeIn" id="new-booking">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">

                    <small>New Booking</small>

                </h4>
                <div class="dropdown ">
                    <b>Rooms selected</b> <span data-toggle='dropdown' class="circle-notify  selected-rooms-count" id="selected-room-count"> 0 </span>
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
            <div class="modal-body pt-0 pb-0 steps">
                <div class=" step-item active">
                    <div class="row">
                        <div class="col-md-3 border-right pb-2" id="form-load-rooms">
                            <div class="row">
                                <div class="col-md-12 p-class">
                                    <label>Property</label>
                                    <select class="form-control" id="properties" onchange="getRoomTypes()">
                                        <?php echo $propertyOptions;?>
                                    </select>

                                </div>

                                <div class="col-md-12">
                                    <p><label>Room Type</label> <span class="" id="room-loader"></span></p>
                                    <select class="form-control" id="roomtypes">
                                        <!--                   <option value="0">All Room types</option>-->

                                    </select>

                                </div>

                                <div class="col-md-12">
                                    <label>Check In</label>
                                    <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="check-in" required data-empty-message="select check-in date" data-placement="right" />
                                </div>

                                <div class="col-md-12">
                                    <label>Check Out</label>
                                    <input class="datepicker form-control" id="check-out" placeholder="" required data-empty-message="select check-out date" data-placement="right" />
                                </div>

                                <!--
                        <div class="col-md-12">
                            <label>Price rate</label>
                            <select class="form-control">
               <option>Standard</option>
               <option>Complementary</option>
               <option>High Season</option>
               <option>Low Season</option>
       </select>


                        </div>
-->

                                <div class="col-md-12 mt-3">

                                    <button onclick="getFreeRooms(this)" class="btn btn-outline-success btn-sm "><i class="fa fa-refresh "></i> Load Rooms</button>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-9 p-1 c-body" style="height:70vh; background:#f0f0f0">


                            <table class="table table-bordered table-bookings" id="tb-free-rooms">
                                <!--                                <tr>-->

                                <!--
                            <td>
                                <div class="container-fluid">
                                    <label>Number of Rooms</label>
                                    <p><select class="form-control"><option>1</option><option>2</option><option>3</option><option>4</option></select> </p>
                                    <br>
                                    <p>Total Cost: <br><span class="text-blue">$4290</span> for 1 room for 2 nights</p>
                                    <br>

                                    <button class="btn btn-primary btn-md" onclick="gotoStep(1)"><i class="zmdi zmdi-check-circle"></i> Select</button>
                                </div>
                            </td>
-->


                                <!--                                </tr>-->
                            </table>
                        </div>
                    </div>

                    <button class="next hide" onclick="setRooms(this)">send</button>
                </div>


                <div class="step-item">
                    <div class="c-body" style="height:70vh; overflow-x:hidden">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <label>Booking Source:</label>
                                <select class="form-control" id="booking-source">
                                    <option value="Direct Booking">Direct Booking</option>
                                    <option value="2">Agent</option>
                                </select>
                            </div>









                            <div class="col-md-3 agent-stuff hide">
                                <div class="colmd-6">
                                    <label><small>Select agent or </small></label>

                                </div>


                                <select class="form-control" id="agents">

                                </select>

                            </div>

                            <div class="col-md-3">
                                <label>Booking name</label>
                                <input class="form-control" id="booking-name" onfocus="bookingNameFocus()" data-placement="right" />

                            </div>


                            <div class="col-md-3">

                                <label>Expected Guests</label>
                                <input class="form-control" data-placement="right" value="1" id='exp-num-guests' type="number" min='1' />

                                <!-- <a href="#" data-target="#addkids" data-toggle="modal" style="color:red; font-size:11px"><i class="zmdi zmdi-plus"></i> Add Kids</a> -->



                                <div class="btn-group">
                                    <button class="btn btn-link btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer">
                                        Add
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" data-target="#addkids" data-toggle="modal">Kids/Child</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#add-bed" href="#">Extra Bed</a>
                                    </div>
                                </div>

                                <p class="tag"><span class="kids-added"></span></p>
                                <p class="tag"><span class="beds-added"></span></p>

                                <!--<div class="dropdown-divider"></div>

                         <a href="#" data-target="#add-bed" data-toggle="modal" style="color:red; font-size:11px"><i class="zmdi zmdi-plus"></i> Extra Bed</a>

                        <p class="tag"><span class="added_beds"></span></p>-->

                                <!--<a class="dropdown-item" data-toggle="modal" data-target="#add-bed" href="#">Extra Bed</a>-->

                                <style>
                                    .modal-dialog {
                                        min-height: calc(90vh - 50px);
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: center;
                                        overflow: auto;
                                        @media(max-width: 768px) {
                                            min-height: calc(100vh - 20px);
                                        }
                                    }

                                </style>

                                <!--                                add kids-->
                                <div class="modal animate bounceInLeft" tabindex="-1" role="dialog" id="addkids" style="background-color:#F8F9F9; opacity:0.95;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Kids to this booking</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <!-- <th class="border-0"></th> -->
                                                            <th class="border-0" scope="col">Age (Years)</th>
                                                            <th class="border-0" scope="col">Rate/Child($)</th>
                                                            <th class="border-0" scope="col">children Number</th>
                                                            <th class="border-0" scope="col">#Nights</th>
                                                            <th class="border-0" scope="col">total ($)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="kids_rates">
                                                        <!--<tr>
                                        <td><div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        </div></td>
                                        <td scope="row">1 - 4</td>
                                        <td>100</td>
                                        <td><input class="form-control form-control-sm" type="text" style="border:2px solid #eee;" placeholder="enter kids number here">

                                        </td>
                                        <td>300</td>
                                        </tr>


                                        <tr>
                                        <td><div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        </div></td>
                                        <td scope="row">1 - 4</td>
                                        <td>100</td>
                                        <td><input class="form-control form-control-sm" type="text" style="border:2px solid #eee;" placeholder="enter kids number here"></td>
                                        <td>300</td>
                                        </tr>
                                        <tr>

                                    <td>
                                        <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        </div>
                                        </td>
                                        <td scope="row">1 - 4</td>
                                        <td>100</td>
                                        <td><input class="form-control form-control-sm" type="text" style="border:2px solid #eee;" placeholder="enter kids number here"></td>
                                        <td>300</td>
                                        </tr>-->
                                                    </tbody>
                                                </table>


                                                <p class="text-right text-info" id="child_rate_total">Total Amount : $0</p>


                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>

                                                <a href="#" data-dismiss="modal" class="btn btn-primary btn-sm">Add amount</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--                                /add kids-->


                                <!--                                edit kids rate-->
                                <!--
                        <div class="modal animate bounceInLeft" tabindex="-1" role="dialog" id="editkidsrate" style="background-color:#F8F9F9; opacity:0.95;">
                         <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Rate</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="border-0" scope="col">New Rate/Child($)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <tr>
                                                            <td class="border-0" scope="col"><input class="form-control form-control-sm" type="text" style="border:2px solid #eee;" id="newkidsrate" placeholder="enter new rate"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" data-dismiss="modal" class="btn btn-primary btn-sm" onclick="updateKidsRates()">Save</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
-->
                                <!--                                /edit kids rate-->

                            </div>

                            <div class="col-md-2 border-right agent-stuff-v hide">
                                <label>or</label>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-link dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-add"></i>Add New Agent</a>

                                    <div class="dropdown-menu" id="agent-info">
                                        <div class="p-3" style="width:250px;">

                                            <label>Agent/Company Name</label>
                                            <input class="form-control" id="a-name" />

                                            <label>Email</label>
                                            <input class="form-control" id="a-email" />
                                            <label>Phone</label>
                                            <input class="form-control" id="a-phone" />


                                            <label>Address</label>
                                            <input class="form-control" id="a-address" />

                                            <button class="btn btn-primary btn-sm mt-2" onclick="addAgent()">Save Agent</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 pt-2">
                                <hr />


                                <div class=" row">
                                    <!--
                        <div class="col-md-6">
                        <h5>Expected Guests </h5>
                        <p><input value="1" id='exp-num-guests' type="number" class="form-control tiny" style="width:60px" min='1' />
                        </p>
                        </div>
                        -->
                                    <div class="col-md-6">

                                        <h5>Guests Details</h5>
                                        <p><input value="1" id='num-guests' type="number" class="form-control tiny" style="width:60px" min='1' />
                                            <button class="btn btn-35 btn-secondary" onclick="addGuests(this)">Add Guests Details</button></p>
                                    </div>
                                </div>





                                <br />
                                <table class="table table-bordered table-editable" id="tb-guests">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th style="width:60px">Age</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Passport/Id Number</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="guest-details">
                                            <td><input value="" style="text-transform: capitalize;" /></td>
                                            <td><input value="" type="number" /></td>
                                            <td><input value="" type="email" data-input='email' data-invalid-message='invalid email' /></td>
                                            <td><input value="" type="number" /></td>
                                            <td><input value="" /></td>
                                            <td style="width:30px" title="remove row" onclick="remove(this)">
                                                <a class="fa fa-times btn-circle"></a>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <a class="btn btn-primary btn-md next hide" onclick="setGuests()">Next</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="step-item">
                    <div class="row">
                        <div class="col-md-8 p-3 scrolly" style="height:70vh">
                            <div class="">



                                <div class="col-md-12">
                                    <label><b>Message</b></label>
                                    <textarea class="form-control" placeholder="client message here" rows="3" id="s-message"></textarea><br>
                                </div>


                                <!--
                        <div class="row">
                        <label><b>Reservation email Template</b></label>
                        <select class="form-control" id="s-temp">

                        </select>
                        </div>
                        -->

                            </div>

                            <div class="col-md-12">

                                <p><b>Extras & Services</b></p>


                                <div class="scrolly" style="height:24vh">
                                    <table class="table table-bordered table-editable" id="tb-extras">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Add-on</th>
                                                <th>Price per guest</th>
                                                <th>Number of guests</th>
                                                <th>Total Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>



                                    </table>

                                </div>



                            </div>


                            <br>

                            <div class="col-md-5">
                                <div class="row">
                                    <label><b>Reservation Status</b></label>
                                    <select class="form-control" id="s-status">
                                        <option value="unconfirmed">Not Confirmed</option>
                                        <option value="confirmed">Confirmed</option>
                                    </select>
                                </div>
                            </div>



                        </div>

                        <div class="col-md-4">
                            <h5 class="mt-3"><small>Booking Summary</small></h5>
                            <table class="table table-bordered table-summary">
                                <tr>
                                    <td>Check In</td>
                                    <td id="s-check-in"></td>
                                    <td rowspan="2" class="valign-middle text-center" id="s-nights"> </td>
                                </tr>

                                <tr>
                                    <td>Check Out</td>
                                    <td id="s-check-out"></td>
                                </tr>

                                <tr>
                                    <td>Guests</td>
                                    <td colspan="2" id="s-guests"></td>
                                </tr>

                                <tr>
                                    <td>Total Rooms</td>
                                    <td colspan="2" id="s-rooms"></td>
                                </tr>

                                <tr>
                                    <td>Source</td>
                                    <td colspan="2" id="s-source"></td>
                                </tr>
                            </table>


                            <p class="mt-2"><span style="font-size:14px">Cost of extra Services:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$<span id="s-total-cost-extras">0</span></b>
                                </span>
                            </p>

                            <p class="mt-2"><span style="font-size:14px">Cost of Room(s) Booked: &nbsp;&nbsp;&nbsp;&nbsp; <b>$<span id="s-total-cost-rooms">0</span></b>
                                </span>
                            </p>

                            <p class="mt-2"><span style="font-size:14px">Cost of Extra Beds: &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>$<span id="s-total-cost-beds">0</span></b>
                                </span>
                            </p>

                            <p class="mt-2"><span style="font-size:14px">Cost of Extra Children: &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<b>$<span id="s-total-cost-kids">0</span></b>
                                </span>
                            </p>

                            <p class="mt-2"><span style="font-size:14px">Total Cost:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$<span id="s-total-cost-all">0</span></b>
                                </span>
                            </p>


                            <a class="btn btn-primary btn-md next hide" onclick="gotoStepAnother();">Create Booking</a>


                        </div>
                    </div>
                </div>


                <div class="step-item">
                    <div class="p-3 scrolly" style="height:70vh">

                        <div class="row">
                            <div class="box col-md-8">

                                <!--                                discount-->



                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label>Discount <span><small>(if any)</small></span></label>

                                    </div>

                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" onkeyup="change_discount(value,this)" onkeypress="return isNumber(event)" aria-label="Text input with dropdown button" placeholder="0">
                                            <!--                                            <div class="input-group-btn">-->
                                            <select class="form-control input-group-addon discount-type" style="width:10px!important;">
                                                <option value="1">% (Percent)</option>
                                                <option value="2">Block Amount</option>
                                            </select>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <!--payment-->
                                <?php
                                    $input_disable="";
                                    if($role ==7){
                                        $input_disable="disabled";
                                    }?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Amount paid </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control" onkeyup="change_total_paid(value)" onkeypress="return isNumber(event)" aria-label="Amount (to the nearest dollar)" placeholder="0" <?php echo $input_disable; ?> >
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    </div>

                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Payment Method </label>

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="paymemt_mtd" <?php echo $input_disable; ?>>
                                                        <option value="Cash">Select Payment Method</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="EFT">EFT</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="RTGS">RTGS</option>
                                                        <option value="Creditcard">Credit Card</option>

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control " placeholder="enter Reference #" id="reference-number" <?php echo $input_disable; ?>>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <br><br><br>


                                <style>
                                    .form-check-label {
                                        padding-left: 0px !important;
                                        /*                                        padding-right: 15px !important;*/
                                        margin-bottom: 0;
                                        font-size: 15px;
                                        font-weight: 200;
                                    }


                                    .form-check-input {
                                        position: relative !important;
                                        /* margin-top: 0.25rem; */
                                        /* margin-left: -1.25rem; */
                                    }

                                </style>


                                <hr>
                                <div class="row p-0">
                                    <div class="col-md-4">
                                        <div class="form-group form-check">

                                            <label class="form-check-label" for="exampleCheck1">Exclude Taxes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="taxes_list">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">VAT(18%)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">WHT(3%)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3">other taxes</label>
                                        </div>

                                    </div>




                                </div>



                                <!--

                        <div class="row">
                            <div class="col-md-3">
                                <label>I want to </label>

                            </div>

                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-check-input" type="checkbox" id="checkemail" value="option-email">
                                        <label class="form-check-label" for="checkemail">Send Email</label>

                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class="form-control" id="s-temp">

                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
-->
                                <!--
                        <div class="row">
                            <div class="col-md-3">
                                <label></label>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" id="checkinvoice" value="option-email">
                                        <label class="form-check-label" for="checkinvoice">Preview Invoice</label>

                                    </div>
                                </div>
                            </div>
                        </div>
-->
                            </div>

                            <style>
                                .lh-condensed {
                                    line-height: 1.25;
                                }

                            </style>


                            <div class="summary-block col-md-4">
                                <p class="mb-1">Reservation Summary</p>

                                <section class="card card-fluid">
                                    <!-- .table-responsive -->
                                    <div class="table-responsive">
                                        <!-- .table -->
                                        <table class="table table-hover" style="background-color:#f8f9fa">

                                            <!-- tbody -->
                                            <tbody>

                                                <tr>
                                                    <td> Rooms Booked </td>
                                                    <td id="ds-rooms"> </td>

                                                </tr>

                                                <tr>
                                                    <td> Total Nights </td>
                                                    <td id="ds-nights">0 </td>

                                                </tr>

                                                <tr>
                                                    <td> Guests Number </td>
                                                    <td id="ds-guests"> 0</td>

                                                </tr>

                                                <tr>
                                                    <!--                                                    <div class="col-md-10">-->
                                                    <table class="table table-bordered p-3" style="background-color:#f8f9fa">
                                                        <thead class="thead-dark">
                                                            <th class="border-right-0">Check-in Date</th>
                                                            <th>Check-out Date</th>
                                                        </thead>
                                                        <tr>
                                                            <td id="ds-check-in"></td>
                                                            <td id="ds-check-out"></td>

                                                        </tr>

                                                    </table>

                                                    <table class="table table-bordered p-3" style="background-color:#f8f9fa">
                                                        <thead class="thead-dark">
                                                            <th class="border-right-0">Total</th>
                                                            <th>Discount</th>
                                                            <th>Amount Paid</th>
                                                        </thead>
                                                        <tr>
                                                            <td id='ds-total-cost-all'>0</td>
                                                            <td id="ds-discount">0</td>
                                                            <td id="ds-total-paid">0</td>

                                                        </tr>

                                                    </table>


                                                </tr>


                                                <!-- /tr -->
                                            </tbody>
                                            <!-- /tbody -->
                                        </table>
                                        <!-- /.table -->


                                        <div class="col-md-10">
                                            <h5 style="font-size:18px; color:green">Outstanding: $ <a id="ds-balance"></a></h5>
                                        </div>


                                    </div>
                                    <!-- /.table-responsive -->
                                </section>

                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-md next hide" onclick="addReservation(this)"> Finish</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="step-item" id="done">

                    <div class="row">
                        <div class="col-6">
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="p-5">

                                <h5> <i class="zmdi zmdi-check text-success"></i> Reservation Created</h5>
                                <p class="m-4">Reservation has been created successfully. <br><b>Booking Name</b>: <span id="booking-name">---</span></p>
                            </div>
                        </div>
                        <div class="col-3">
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="buttons py-5">
                                <button class="btn btn-secondary btn-block" id="open-invoice"><i class="fa fa-file-pdf-o mr-3"></i> Preview Invoice</button>
                                <button class="btn btn-primary btn-block" id="send-email" data-trigger="focus" data-toggle="popover" data-target="popover" data-placement="top"><i class="fa fa-envelope mr-3"></i> Send Email</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-danger btn-sm " style="" id="email-not" onclick="email_not()"> email not</button>-->
                <button type="button" class="btn btn-danger btn-sm " style="" data-toggle="modal" data-target="#preview-invoice" onclick=" setInvoiceClient()" id="btn-preview-invoice"> preview invoice</button>
                <button type="button" class="btn btn-primary pull-left btn-sm" style="" onclick="gotoStep(-1)"><i class="fa fa-angle-left"></i> Back</button>
                <button type="button" class="btn btn-secondary pull-left btn-sm " style="" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-next" onclick="clickNext(1)">Next <i class="fa fa-angle-right"></i></button>
            </div>

        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<a id="select_rooms__" data-toggle='modal' data-target='#sel-rooms' class='hide d-none' hidden> </a>

<div class="modal animated bounceInDown" id="sel-rooms">

    <div class="modal-dialog modal-sm modal-center" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">
                    <small>Choose Room(s)</small>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12  ml-4 " id="room-check-grp">

                    </div>
                </div>
            </div>

            <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary btn-sm " id="changeRoom-btn"><i class="zmdi zmdi-check-circle"></i> Submit</button>
    </div>-->

        </div>
        <!-- /.modal-content -->
    </div>

</div>
<!-- /.modal -->

<!-- modal for selecting custom meal plan -->
<div class="modal fadeIn" tabindex="-1" role="dialog" id="custom-rate" style="background-color:rgba(0,0,0,0.6);">
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
                    <table class="table" id="custom_meal_plan_tb_0">
                        <thead>
                            <tr>
                                <th style="">#</th>
                                <th style="width:30%">Date</th>
                                <th style="width:20%">Meal Plan</th>
                                <th style="width:20%">Rate</th>
                                <th class="">Sub-total</th>
                            </tr>
                        </thead>
                        <tbody id="custom_meal_plan_tb">
                            <!--<tr>
                            <td>Day 1</td>
                            <td>23-06-2018</td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select</option>
                                  <option>FB</option>
                                  <option>HB</option>
                                  <option>BB</option>
                                </select>

                            </td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select Price</option>
                                  <option>Price 1</option>
                                  <option>Price 2</option>
                                  <option>Price 3</option>
                                </select>

                            </td>
                            <td class="">639</td>

                        </tr>
                        <tr>
                            <td>Day 2</td>
                            <td>15-05-2018</td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select</option>
                                  <option>FB</option>
                                  <option>HB</option>
                                  <option>BB</option>
                                </select>

                            </td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select Price</option>
                                  <option>Price 1</option>
                                  <option>Price 2</option>
                                  <option>Price 3</option>
                                </select>

                            </td>
                            <td class="">235</td>

                        </tr>

                        <tr>
                            <td>Day 2</td>
                            <td>15-05-2018</td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select</option>
                                  <option>FB</option>
                                  <option>HB</option>
                                  <option>BB</option>
                                </select>

                            </td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select Price</option>
                                  <option>Price 1</option>
                                  <option>Price 2</option>
                                  <option>Price 3</option>
                                </select>

                            </td>
                            <td class="">235</td>

                        </tr>

                        <tr>
                            <td>Day 2</td>
                            <td>15-05-2018</td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select</option>
                                  <option>FB</option>
                                  <option>HB</option>
                                  <option>BB</option>
                                </select>

                            </td>

                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select Price</option>
                                  <option>Price 1</option>
                                  <option>Price 2</option>
                                  <option>Price 3</option>
                                </select>

                            </td>
                            <td class="">235</td>

                        </tr>

                        <tr>
                            <td>Day 2</td>
                            <td>15-05-2018</td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select</option>
                                  <option>FB</option>
                                  <option>HB</option>
                                  <option>BB</option>
                                </select>

                            </td>
                            <td class="">235</td>

                        </tr>

                        <tr>
                            <td>Day 2</td>
                            <td>15-05-2018</td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select</option>
                                  <option>FB</option>
                                  <option>HB</option>
                                  <option>BB</option>
                                </select>

                            </td>
                            <td class="">235</td>

                        </tr>

                        <tr>
                            <td>Day 2</td>
                            <td>15-05-2018</td>
                            <td class="">

                                <select class="form-control form-control-sm">
                                  <option>Select</option>
                                  <option>FB</option>
                                  <option>HB</option>
                                  <option>BB</option>
                                </select>

                            </td>
                            <td class="">235</td>

                        </tr>-->


                        </tbody>
                    </table>

                </div>
                <!--<div class="row mb-1">
                    <div class="col-md-6 mt-2">
                        <label>No. of Rooms</label>
                        <input class="form-control">
                    </div>

                <div class="col-md-6 mt-2">
                 <label>Total Cost($)</label>
                        <input id="total_cost_" class="form-control" readonly>
                </div>




            </div>-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Go Back</button>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" onclick='getCustomMealCart()'>Use these Rates</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal for adding extra bed costs -->

<div class="modal fade" id="add-bed" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" style="background-color:#F8F9F9; opacity:0.95;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add an Extra Bed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Cost (USD)</th>
                            <th scope="col">Bed#</th>
                            <th scope="col">Nights</th>
                            <th scope="col">Sub-total(USD)</th>
                        </tr>
                    </thead>
                    <tbody id="extra_bed_tb">
                        <!-- <tr>
                            <td>Extra Bed</td>
                            <td>$100</td>
                            <td><input class="form-control form-control-sm" type="text" placeholder="enter number here"></td>
                            <td><input class="form-control form-control-sm" type="text" placeholder="e.g 1"></td>
                            <td>$400</td>
                        </tr>


                        <tr>
                            <td>Big Bed</td>
                            <td>$100</td>
                            <td><input class="form-control form-control-sm" type="text" placeholder="enter number here"></td>
                            <td><input class="form-control form-control-sm" type="text" placeholder="e.g 3"></td>
                            <td>$400</td>
                        </tr>
                      -->

                    </tbody>
                </table>
            </div>


            <div class="text-right">
                <a class="mr-5 text-info"><b>Sub-Total: <span id="ttl_beds_amount">$ 0</span></b></a>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Add Extra Bed</button>
            </div>
        </div>
    </div>
</div>


<style>
    .steps {
        height: 70vh;
        width: 96%;
        margin: auto;
        position: relative;
    }

    .steps .step-item {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: none;
    }

    .steps .step-item.active {
        display: block;
    }

</style>


<script>
    $('#btn-preview-invoice').hide();
    $('#email-not').hide();
    $("#reference-number").hide();
    var sr = "";
    var tr = "";
    var invo_ext_rows = "";
    var totaltax = 0;
    var booking_source_track = {};

    var manaul_room_allocation = {};
    var meal_plan_tracker = {};
    var booked_as_tracker = [];

    var meal_plan_tracker_days = {};

    var excluded_taxes = [];


    //getFreeRooms();
    getInvoice_t();
    //    getProperties();

    // alert(1);
    getRoomTypes()


    getAgents();
    getAllExtras();
    get_templates();

    getKidsRates();
    getXtraBedsRates();
    //alert(22)
    getTaxes2();

    var json_children_obj = [];

    var json_extra_bed_obj = [];

    function getTaxes2() {

        $.post("src/get_data.php", {
            token: "get_taxes_4_selection"
        }, function(response) {


            var taxes_obj = JSON.parse(response);

            var rows = "";
            $.each(taxes_obj, function(i, taxes) {

                //alert(JSON.stringify(taxes));////
                rows += '<div class="form-check form-check-inline">';
                rows += '<input id=' + taxes.taxname + ' onclick="ExcludeTax(this)" class="form-check-input" type="checkbox"  value="option1">';
                rows += '<label class="form-check-label" for="inlineCheckbox1">' + taxes.taxname + '(' + taxes.taxamount + '%)</label>';
                rows += '</div>';

            });

            $("#taxes_list").html(rows);

        });

    }


    function ExcludeTax(context) {
        var tax = $(context).attr("id");
        if ($(context).prop("checked")) {

            if (excluded_taxes.indexOf(tax) == -1) {

                excluded_taxes.push(tax);
                //                 alert(1)
                x0p('Notice', 'This tax will be excluded', 'ok', 'false');
            }


        } else {

            var index = excluded_taxes.indexOf(tax);
            excluded_taxes.splice(index, 1);
        }

        // alert(JSON.stringify(excluded_taxes))



    }

    function getXtraBedsRates() {

        $.post("src/get_data.php", {
            token: "get_extra_bed"
            // property_id: parseInt($('#properties').val())
        }, function(response) {

            var rates_obj = JSON.parse(response);


            //alert(response);////getNights()

            var rows = "";
            $.each(rates_obj, function(i, rate) {
                //alert()
                //count= i+1;
                rows += '<tr  >';
                rows += '<td id="bed_name" >' + rate.name + '</td>';

                rows += '<td data-id="' + rate.id + '"><input id="unit_cost"   onkeyup="calclateBedTotals(this)"  class="form-control form-control-sm" type="text" value="' + rate.cost + '"/></td>';

                rows += '<td><input id="no_of_beds" onkeyup="calclateBedTotals(this)"  class="form-control form-control-sm" type="text" placeholder="enter number here"/></td>';
                rows += '<td><input id="no_of_nights_" readonly onkeyup="calclateBedTotals(this)" class="form-control form-control-sm" type="text" placeholder="e.g 1"   /></td>';
                rows += '<td id="subtotal" >0</td>';
                rows += '</tr>';

            });

            $("#extra_bed_tb").html(rows);


        });

    }


    //    function updateKidsRates(){
    //        var rt = $('#newkidsrate').val();
    //        //alert(rt);
    //         $.post("src/get_data.php", {
    //            token: "update_kids_rates",
    //            newrate: rt
    //        }, function(response) {
    //            alert(response)
    ////            getKidsRates();
    //        });
    //
    //    }


    function getKidsRates() {

        $.post("src/get_data.php", {
            token: "get_kids_rates",
            // property_id: parseInt($('#properties').val())
        }, function(response) {

            var rates_obj = JSON.parse(response);


            //alert(response);////

            var rows = "";
            $.each(rates_obj, function(i, rate) {

                //alert()
                //count= i+1;
                rows += "<tr>";
                rows += "<td scope=\"row\" class='age_bracket' >" + rate.minimum_age + "-" + rate.maximum_age + "</td>";
                rows += "<td><input id='unit_price' class='form-control form-control-sm' onkeyup='calculateChildPrice(this)' type='text' style='border:2px solid #eee;' value='" + rate.amount + "'></td>";
                rows += "<td><input id='qty' onkeyup='calculateChildPrice(this)' class=\"form-control form-control-sm\" type=\"text\" style=\"border:2px solid #eee;\" placeholder=\"enter kids number here\"></td>";
                rows += "<td class='nights_number'>0";
                rows += "</td>";
                //                rows += "</td>";
                rows += "<td class='total'>0</td>";
                rows += "</tr>";


            });

            $("#kids_rates").html(rows);


        });


    }

    function calclateBedTotals(context) {

        var tr = $(context).parents("tr");



        var unit_cost = parseFloat(tr.find("#unit_cost").val());

        //        var id = tr.find("#unit_cost").attr("data-id");

        var no_of_beds = parseFloat(tr.find("#no_of_beds").val());

        tr.find("#no_of_nights_").val(getNights());

        var no_of_nights = parseFloat(tr.find("#no_of_nights_").val());


        var subtotal = unit_cost * no_of_beds * no_of_nights;

        tr.find("#subtotal").html(subtotal);


        //alert(id)


        calculateBedPrice(context);

    }


    function calculateBedPrice(context) {

        /*var qty =$(context).val();

        var unit_price =$(context).parent().parent().find(".unit_price").html();

        var total = parseFloat(unit_price)*parseInt(qty)*parseInt(getNights());

        if(total===""){

          total=0;
        }

        $(context).parent().parent().find(".total").html(total);*/
        json_extra_bed_obj = [];
        var no_of_beds_ = 0;
        var subtotal_ = 0;

        $("#extra_bed_tb").find("tr").each(function(i, tr) {


            //alert($(tr).html())

            var unit_cost = parseFloat($(tr).find("#unit_cost").val());

            //            var id = $(tr).find("#unit_cost").attr("data-id");

            var name = $(tr).find("#bed_name").html();

            var no_of_beds = parseFloat($(tr).find("#no_of_beds").val());

            $(tr).find("#no_of_nights_").val(getNights())

            var no_of_nights = parseFloat($(tr).find("#no_of_nights_").val());


            var subtotal = parseFloat($(tr).find("#subtotal").html());



            /*
             var age_bracket= $(tr).find('.age_bracket').text();
             var unit_price_ =$(tr).find('.unit_price').text();
             var qty_ =$(tr).find('#qty').val();
             var ttl= parseFloat($(tr).find('.total').text());

             */


            if (subtotal > 0 && !isNaN(subtotal)) {

                no_of_beds_ += parseFloat(no_of_beds);

                subtotal_ += subtotal;


                var data = {
                    //item_id: $('#properties').val(),
                    bed_name: name,
                    unit_price: unit_cost,
                    no_of_beds: no_of_beds,
                    amount: subtotal
                };


                json_extra_bed_obj.push(data);
            }


        });



        if (isNaN(subtotal_)) {

            $(".beds-added").html('');
        } else {
            $(".beds-added").html("<b>Beds(" + no_of_beds_ + ")</b> <i class='fa fa-angle-right text-muted mx-2'></i> $" + subtotal_ + "<b class='fa fa-times ml-4 mr-2'></b>");
        }


        $("#ttl_beds_amount").html(subtotal_);


        if (json_extra_bed_obj.length == 0) {

            $(".beds-added").html('');
        }


        // alert(JSON.stringify(json_extra_bed_obj));





    }



    function calculateChildPrice(context) {

        var qty = $(context).parent().parent().find("#qty").val(); //$(context).val();

        var unit_price = $(context).parent().parent().find("#unit_price").val();

        var nights = getNights();

        //alert(unit_price + "-" + qty + "-" + nights)

        var total = parseFloat(unit_price) * parseInt(qty) * parseInt(nights);

        if (total === "") {

            total = 0;
        }

        $(context).parent().parent().find(".total").html(total);
        json_children_obj = [];
        var childen_no = 0;
        var subtotal = 0;
        $(context).parents('tbody').find("tr").each(function(i, tr) {




            var age_bracket = $(tr).find('.age_bracket').text();
            var unit_price_ = $(tr).find('#unit_price').val();
            var qty_ = $(tr).find('#qty').val();
            var ttl = parseFloat($(tr).find('.total').text());


            if (ttl > 0 && !isNaN(ttl)) {

                childen_no += parseFloat(qty_);

                subtotal += parseFloat($(tr).find('.total').text());


                var data = {
                    //item_id: $('#properties').val(),
                    age_bracket: age_bracket,
                    unit_price: unit_price_,
                    children: qty_,
                    amount: ttl,
                    nights: nights
                };


                json_children_obj.push(data);

                if (isNaN(subtotal)) {
                    subtotal += 0;
                    $(".kids-added").html('');
                } else {
                    $(".kids-added").html("<b>Children(" + childen_no + ")</b> <i class='fa fa-angle-right text-muted mx-2'></i> $" + subtotal + "<b class='fa fa-times ml-4 mr-2'></b>");
                }

                $("#child_rate_total").html("Total Amount : $" + subtotal);



            }


            if (json_children_obj.length == 0) {

                $(".kids-added").html('');
            }

            //            alert(JSON.stringify(json_children_obj));

            //            alert(ttl);

        });




    }



    function change_discount(d, sel) {
        $('.error-alert').remove();
        d = d == "" ? 0 : d;
        var ltp = $('#ds-total-paid').text();
        var ltc = $('#ds-total-cost-all').text();

        var dt = $('.discount-type option:selected').val()

        if (dt == 1) {

            if (d <= 100) {
                d = d / 100 * parseFloat(ltc);
            } else {
                errorMSG(sel, "Percentage discount should not be greater than 100");
                d = 100;
                $(sel).val(d);
                d = d / 100 * parseFloat(ltc);
            }
            d = d.toFixed(2);
        }


        $('#ds-discount').text(d)

        var lbal = parseFloat(ltc) - d - parseFloat(ltp)
        $('#ds-balance').text(lbal.toFixed(2))

    }

    function change_total_paid(p) {
        p = p == "" ? 0 : p;
        $('#ds-total-paid').text(p)

        var dis = $('#ds-discount').text()
        var ltc = $('#ds-total-cost-all').text();
        var lbal = parseFloat(ltc) - p - parseFloat(dis)

        $('#ds-balance').text(lbal.toFixed(2))
    }

    $("#paymemt_mtd").on("change", function() {
        var option = $(this).find("option:selected").val();
        if (option == "Cheque" || option == "EFT" || option == "RTGS" || option == "Creditcard") {
            $("#reference-number").show();

            //            alert(pay)
        } else {
            $("#reference-number").hide();
        }

    });




    function gotoStepAnother() {
        $('#ds-booking-status').text($("#s-status option:selected").val());
        // $('#btn-preview-invoice').show();
        $('.btn-next').html('finish <i class="zmdi zmdi-check"></i>');
        gotoStep(1);
    }

    $("#booking-source").on("change", function() {
        var option = $(this).find("option:selected").val();
        if (option == "2") {
            $(".agent-stuff").show();
            $(".walk-in-stuff").hide();
        } else {
            $(".agent-stuff").hide();
            $(".walk-in-stuff").show();
        }
    });


    $("#tb-free-rooms,#ar_tb-free-rooms").html("<tr><td>Please Select Check-in and Check-out dates to Load Free Rooms</td></tr>");

    function gettoday() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = mm + '-' + dd + '-' + yyyy;

        return today;
    }




    function getFreeRooms(btn) {
        if (!inputsEmpty("#form-load-rooms")) {
            var checkIn = $("#check-in").val();
            var checkOut = $("#check-out").val();
            var pId = $(".p-class #properties option:selected").val();
            var rtId = $("#roomtypes option:selected").val();

            var nights = new Date(checkOut) - new Date(checkIn);
            nights = nights / 1000 / 3600 / 24;

            var ddd = new Date(checkIn) - new Date(gettoday())

            //if (ddd < 0) {
            // errorMSG("#check-in", "this date should start from today to the future");
            //} else {
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
                    $(".nights_number").text(nights);

                })
            } else {
                errorMSG("#check-out", "This date should be greater than check-in");
            }
            //}
        }

    }

    //    function getProperties() {
    //        $.post('src/get_data.php', {
    //            token: "properties"
    //        }, function(data) {
    //            var o = "";
    //            // alert(data)
    //            var properties = JSON.parse(data);
    //            $.each(properties, function(i, property) {
    //                o += "<option value='" + property.id + "'>" + property.property_name + "</option>";
    //            });
    //
    //
    //            $("#properties").html(o);
    //            $("#properties-main").html(o);
    //            //alert(1);
    //            getRoomTypes();
    //        })
    //    }

    var meal_selector_context = "";

    function changeMeal(el) {

        var meal_plan = $(el).find("option:selected").val();
        //alert(meal_plan);
        var id = $(el).attr("id");

        var _id = $(el).attr("data-room_type_id");

        // alert(id+" "+_id)

        meal_selector_context = el;

        var property_id = $(el).attr("data-propery_id");

        var checkIn = $("#check-in").val();

        var checkIn_ = checkIn.split("/");
        checkIn = checkIn_[2] + "-" + checkIn_[0] + "-" + checkIn_[1];

        var checkOut = $("#check-out").val();

        var checkOut_ = checkOut.split("/");
        checkOut = checkOut_[2] + "-" + checkOut_[0] + "-" + checkOut_[1];

        if (meal_plan != "Meals" && meal_plan != "Custom") {

            $.post('src/get_data.php', {
                meal_plan: meal_plan,
                property_id: property_id,
                roomtypeId: _id,
                checkIn: checkIn,
                checkOut: checkOut,
                token: "load_prices"
            }, function(data) {

                // alert(data)

                var data = JSON.parse(data);

                var o = "";

                $.each(data, function(i, item) {

                    if (i == 0) {

                        $("#" + id + "unit-price").val(item.amount);
                        //setSubtotal(el);
                        days = $(el).parent().parent().parent().parent().parent().find(".selected-nights").html();
                        days = parseInt(days)
                        amount = item.amount * days;
                        $(el).parent().parent().parent().parent().parent().find(".sub-total").html(amount);

                    }

                    o += "<option id='" + item.cat + "' value='" + item.amount + "'>" + item.label + "</option>";

                });

                // alert(id);
                $("#" + id + "select").html(o);

                $(".chosen").trigger("chosen:updated");



            });

        } else if (meal_plan == "Custom") {

            // $("#custom_id" + id).click();
            openMealPlanModal();


            loadCustomMealPlan(property_id, id);

            var o = "<option>Custom</option>";
            $("#" + id + "select").html(o)

            //days=  $(el).parent().parent().parent().parent().parent().find(".selected-nights").html();
            // days=parseInt(days)
            // amount= item.amount*days;
            $(el).parent().parent().parent().parent().parent().find(".sub-total").html(0);



        } else {

            var o = "<option>Select Pricing</option>";
            $("#" + id + "select").html(o)

            //days=  $(el).parent().parent().parent().parent().parent().find(".selected-nights").html();
            // days=parseInt(days)
            // amount= item.amount*days;
            $(el).parent().parent().parent().parent().parent().find(".sub-total").html(0);


        }

    }

    function openMealPlanModal() {
        if (isNewBooking()) {
            $("#custom-rate").modal('show');
        } else {
            $("#custom-rate-ar").modal('show');
        }
    }

    function get_templates() {
        $.post('src/get_data.php', {
            template_type: "0",
            token: "email_template",

        }, function(data) {
            var datau = JSON.parse(data);

            var o = "";
            $.each(datau, function(i, item) {
                o += "<option value='" + item.id + "'>" + item.template_name + "</option>";

            });

            $("#s-temp").html(o);

        })

    }




    Date.prototype.addDays = function(days) {

        var dat = new Date(this.valueOf());
        dat.setDate(dat.getDate() + days);

        return dat;
    }


    function loadCustomMealPlan(property_id, id) {
        var nights = getNights();
        var tr_html = "";
        for (i = 0; i < nights; i++) {
            var counter = i + 1;
            var dat = new Date(getCheckIn());

            //alert(dat.addDays(i))
            real_date = dat.addDays(i);
            str_month = real_date.getMonth() + 1;
            str_year = real_date.getFullYear();
            str_day = real_date.getDate();

            combined = str_month + "/" + str_day + "/" + str_year;
            tr_html += '<tr data-property_id="' + property_id + '" data-room_type_id="' + id + '"   >';
            tr_html += '<td>Day ' + counter + '</td>';
            tr_html += '<td>' + combined + '</td>';
            tr_html += '<td class="">';
            tr_html += '<select  onchange="loadCustomUnitPrice(this)" class="form-control form-control-sm meal-plan">';
            tr_html += '<option>Select</option>';
            tr_html += '<option>FB</option>';
            tr_html += '<option>HB</option>';
            tr_html += '<option>BB</option>';
            tr_html += '</select>';
            tr_html += '</td>';
            tr_html += '<td class="">';
            tr_html += '<select onchange="loadPrice(this)" class="custom_meal_prices form-control form-control-sm">';
            //tr_html+='<option>Select Price</option>';
            //tr_html+='<option>Price 1</option>';
            //tr_html+='<option>Price 2</option>';
            //tr_html+='<option>Price 3</option>';
            tr_html += '</select>';
            tr_html += '</td>';
            tr_html += '<td class="subttl"><input class="form-control text-blue " type="number"  required style="background-color : #E6E7EF !important;"></td>';
            tr_html += '</tr>';


        }
        if (isNewBooking()) {
            $("#custom_meal_plan_tb").html(tr_html);
        } else {
            $("#custom_meal_plan_tb_ar").html(tr_html);
        }


    }

    function loadCustomUnitPrice(context) {

        var tr = $(context).parents("tr");

        // alert(.html()); subttl
        subttl = tr.find(".subttl input");

        property_id = tr.attr("data-property_id");

        id = tr.attr("data-room_type_id");


        select_ = tr.find(".custom_meal_prices");
        meal_plan = $(context).val();

        if (isNewBooking()) {
            var checkIn = $("#check-in").val();
            var checkOut = $("#check-out").val();
        } else {
            var checkIn = $("#ar_check-in").val();
            var checkOut = $("#ar_check-in").val();
        }


        var checkIn_ = checkIn.split("/");
        checkIn = checkIn_[2] + "-" + checkIn_[0] + "-" + checkIn_[1];



        var checkOut_ = checkOut.split("/");
        checkOut = checkOut_[2] + "-" + checkOut_[0] + "-" + checkOut_[1];

        $.post('src/get_data.php', {
            meal_plan: meal_plan,
            property_id: property_id,
            roomtypeId: id,
            checkIn: checkIn,
            checkOut: checkOut,
            token: "load_prices"
        }, function(data) {

            //if(data==''){


            // }

            try {

                var data = JSON.parse(data);

                var o = "";

                $.each(data, function(i, item) {

                    if (i == 0) {

                        subttl.val(item.amount);
                        /* $("#"+id+"unit-price").val(item.amount);
                         //setSubtotal(el);
                         days=  $(el).parent().parent().parent().parent().parent().find(".selected-nights").html();
                          days=parseInt(days)
                          amount= item.amount*days;
                         $(el).parent().parent().parent().parent().parent().find(".sub-total").html(amount);*/

                    }

                    o += "<option id='" + item.cat + "' value='" + item.amount + "'>" + item.label + "</option>";

                });


                select_.html(o)




            } catch (error) {

                var o = "";

                select_.html(o)


            }

        });

    }

    function getCustomMealCart() {

        var total = 0;
        var pointer = 0;
        var array_temp = [];

        var room_type_id = "";
        if (isNewBooking()) {
            var tb_r = "#custom_meal_plan_tb_0 tbody tr";
        } else {
            var tb_r = "#custom_meal_plan_tb_0_ar tbody tr";
        }
        $(tb_r).each(function(i, tr) {

            day = i + 1;
            subttl = $(tr).find(".subttl input");

            property_id = $(tr).attr("data-property_id");

            // id = $(tr).attr("id");

            room_type_id = $(tr).attr("data-room_type_id");

            // alert(id+" "+room_type_id)

            select_ = $(tr).find(".meal-plan");

            meal_plan = select_.val();

            unit_price = parseFloat(subttl.val());


            total += unit_price;



            if (meal_plan != 'Select') {
                array_temp.push({
                    day: day,
                    meal_plan: meal_plan,
                    unit_price: unit_price
                });

            }



            pointer++;

            //var day = $(tr).find("td:eq(0)").text();
        });




        unit_price = total / pointer;
        if (!isNaN(unit_price)) {

            meal_plan_tracker_days[room_type_id] = array_temp;

            if (meal_plan_tracker_days[room_type_id].length > 0) {

                $("#" + room_type_id + "unit-price").val(unit_price);

                days = $(meal_selector_context).parent().parent().parent().parent().parent().find(".selected-nights").html();
                days = parseInt(days)
                amount = unit_price * days;
                $(meal_selector_context).parent().parent().parent().parent().parent().find(".sub-total").html(amount);


                var o = "";

                o += "<option id='" + 0 + "' value='" + unit_price + "'>" + "Custom" + "</option>";

                $("#" + room_type_id + "select").html(o);

                $(".chosen").trigger("chosen:updated");

            }


        }

        $('#custom-rate-ar').modal('hide')

        // $(meal_selector_context).
        // alert(unit_price);
        // alert(JSON.stringify(meal_plan_tracker[room_type_id]));
        //total_cost_


    }


    function loadPrice(context) {

        var tr = $(context).parents("tr");

        // alert(.html()); subttl
        subttl = tr.find(".subttl input");


        subttl.val($(context).val());


    }

    function addAgent() {
        var name = $("#agent-info #a-name").val();
        var phone = $("#agent-info #a-phone").val();
        var email = $("#agent-info #a-email").val();
        var address = $("#agent-info #a-address").val();

        var agent = JSON.stringify({
            name: name,
            email: email,
            phone: phone,
            email: email,
            address: address
        });

        //        alert(agent);
        $.post("src/save.php", {
            result: agent,
            page: "agent_tb"
        }, function(data) {

            // alert(data);
            // getAgents()
            var a = JSON.parse(data),
                //                aName = a.name,
                aId = a.id;

            $("#agents").append("<option value='" + aId + "' selected>" + name + "</option>");
            //$("#agents").val(aId);

            $("#agent-info #a-name").val('');
            $("#agent-info #a-phone").val('');
            $("#agent-info #a-email").val('');
            $("#agent-info #a-address").val('');
        })

    }

    ///load all extras
    function getAllExtras() {
        $.post('src/get_data.php', {
            token: "extras"
        }, function(data) {
            var rows = "";
            // alert(data)
            var extras = JSON.parse(data);
            $.each(extras, function(i, xtra) {
                rows += "<tr>";
                rows += "<td style='width:30px'><input type='checkbox' class='form-control' onchange='addToExtras(this)' /></td>";
                rows += "<td class=''>" + xtra.name + "<input type='hidden' class='id' value='" + xtra.id + "'/></td>";
                rows += "<td><select class='form-control' onchange='setExtrasSubTotal(this)'>";
                rows += "<option value='" + xtra.price + "'>$" + xtra.price + "</option><option value='0'>Complimentary</option>";
                rows += "</select></td>";
                rows += "<td></td>";
                rows += "<td>$<span id='extra-subtotal'></span></td>";
                rows += "</tr>";

            });


            $("#tb-extras tbody").html(rows);
            getRoomTypes();
        })
    }

    function getAgents() {
        $.post('src/get_data.php', {
            token: "agents"
        }, function(data) {
            var o = "";
            // alert(data)
            var agents = JSON.parse(data);
            $.each(agents, function(i, agent) {
                o += "<option value='" + agent.id + "'>" + agent.name + "</option>";
            });


            $("#agents").html(o);
            //getRoomTypes();
        })
    }



    function getRoomTypes() {

        // alert(1)
        var sel = $("#roomtypes");
        sel.prop("disabled", true);

        // alert(2);
        //tinyloader("#room-loader", "");

        var property_id = $(".p-class #properties option:selected").val();


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
            sel.prop("disabled", false);
            $("#room-loader").html("");
        })
    }

    function setFreeRooms(data) {
        //        console.log(data);
        setFreeRoomsData(data);

        // alert(data);
        $("#tb-free-rooms,#ar_tb-free-rooms").html("<tr><td>Please Select Check-in and Check-out dates to Load Free Rooms</td></tr>");

        if (isNewBooking()) {
            var table = $("#tb-free-rooms");

        } else {
            var table = $("#ar_tb-free-rooms");
        }

        table.html("<tr><td><h6><i class='fa fa-spinner fa-spin'></i> Loading available rooms...</h6></td></tr>")
        var rooms = JSON.parse(data);
        if (rooms.length > 0) {
            // console.log(rooms[0]["rooms"])
            var rows = "";

            $.each(rooms, function(i, room) {
                var subTotal = parseInt(room.prices[0]['amount']) * getNights();
                var selNights = parseInt(getNights()) == 1 ? "1 night" : getNights() + " nights";
                var freerooms = room.rooms;
                var roomCount = freerooms.length

                var alertType = roomCount >= 3 ? "alert-success" : "alert-warning";

                rows += "<tr class='room-row'>";
                rows += "<td>";
                rows += "<div class='container-fluid'>";
                rows += "<input type='hidden' value='" + i + "' class='position'>";
                rows += "<h5><b class='room-type-name'>" + room.name + " </b>";

                // console.log(room.used_as)
                if (room.used_as.length > 0) {
                    rows += "<span id='droplet_' style='font-size:9px !important; color:#D6DBDF;' class='dropdown m-0'><i class='fa fa-chevron-down m-0 btn btn-circle'  data-toggle='dropdown'></i>";

                    //alert(parseInt(room.used_as))
                    rows += "<div   class='dropdown-menu shadow pt-0 dropdown-menu-left'><p class='p-3 text-secondary'>Book as:</p>";

                    $.each(room.used_as, function(i, used_as) {
                        rows += "<a class='dropdown-item py-2 data-used_as'  data-used_as='" + used_as.id + "' onclick='usedAs(this)' >" + used_as.name + "</a>";
                    });
                    //    rows += "<a class='dropdown-item'>Tripple</a>";
                    rows += "</div>";

                }

                rows += "</span>";

                rows += "<br> <label> (" + room.property_name + ")</label></h5>";
                rows += "<p> - " + room.number_of_beds + " beds (" + room.bed_size + ")</p>";

                // $.each(JSON.parse(room.specifications), function(k, s) { //stored as json string id db
                //     rows += "<p>- " + s + "</p>";
                // })

                rows += "<hr class='mt-1 mb-2'>";
                rows += "<p> Adults: " + room.maximum_guests_adults + " ,  Children: " + room.maximum_guests_children + "</p>";
                rows += "</div>";

                rows += "<p class=\"mt-3 p-1 ml-2 hide  booked-as\"  style=\"background-color:#ECE9E9; color:red;\"> Booking this room as a single</p>";

                rows += "</td>";



                rows += "<td>";
                rows += "<div class='container-fluid'>";
                rows += "<label>Room Rate <a class='hide' id=\"custom_id" + room.id + "\" data-target=\"#custom-rate\" data-toggle=\"modal\" >custom rate</a></label>";
                rows += "<div class='row m-0'>";
                rows += "<div class='col-4 pl-0'>";
                // rows += "<label>Meal Plan</label>";
                rows += "<select id=\"" + room.id + "\"  data-room_type_id=\"" + room.id + "\"   data-propery_id=\"" + room.property_id + "\" class='form-control meal-plans chosen'   onchange='changeMeal(this)'>";
                rows += "<option class='' value='Meals'>Meals</option>";
                rows += "<option class='' value='FB'>FB</option>";
                rows += "<option class='' value='HB'>HB</option>";
                rows += "<option class='' value='BB'>BB</option>";
                rows += "<option class='' value='Custom'>Custom</option>";
                rows += "</select>";;
                rows += "</div>";
                rows += "<div  class='col-8 pl-0'>";

                rows += "<select id=\"" + room.id + "select\"  class='form-control rm-prices chosen-select chosen' onchange='changeUnitPrice(this)'>";

                rows += "<option>Select Pricing</option>";


                /*
                   $.each(room.prices, function(j, roomprice) {
                   rows += "<option id='" + roomprice.cat + "' value='" + roomprice.amount + "'>" + roomprice.label + "</option>";
                   });
                */

                rows += "</select>";
                rows += "</div>";
                rows += "</div>";
                rows += "<br><br><span><span class='price' style=\"color:#BA4A00 !important;\"><i class=\"fa fa-dollar\"></i><input class=\"silent-input border-0 room_unit_price price\" style=\"font-size:20px !important; color:#BA4A00 !important;\" id=\"" + room.id + "unit-price\" value='0' onkeyup='getUnitPrice(\"" + room.id + "\" )' /> </span> per night</span>";

                //rows += "</h6>";

                rows += "<br><br>";
                rows += "<p class='alert " + alertType + " p-1'>Available Rooms : <b class='free-room-count'>" + roomCount + "</b></p>";

                rows += "</div>";
                rows += "</td>";

                rows += "<td>";
                rows += "<div class='container-fluid'>";
                rows += "<label>Number of Rooms</label>";
                rows += "<p><select class='form-control rm-count' onchange='changeRoomCount(this);'>";

                $.each(freerooms, function(x, fr) {
                    var rms = x + 1;
                    rows += "<option value='" + rms + "'>" + rms + "</option>";
                });

                rows += "</select> </p>";
                rows += "<br>";
                rows += "<h5 style=\"font-size:16px\">Total Cost: <span class='text-orange'><i class=\"fa fa-dollar\"></i><span class='sub-total'>" + 0 /*subTotal*/ + "</span></span></h5><h6><span class='selected-rooms'>1 room</span> for <span class='selected-nights'>" + selNights + "<span></h6>";
                rows += "<input type='hidden' class='subtotal'/><br>";

                //rows += "<button class='btn btn-default btn-md' onclick='select(this)'><i class='zmdi zmdi-check-circle fa-2x'></i></button>";

                rows += "<button  type='button' onclick='select(this)' class='btn btn-labeled btn-default' data-toggle='modal' data-target='#sel-room'> <span class = 'btn-label-default'> <i class = 'zmdi zmdi-check'></i></span> Select </button>";

                rows += "</div>";
                rows += "</td>";

                rows += "</tr>";
            });

        } else {
            rows = "<tr><td><h5 class='text-light'>No Free Rooms Available for the selected dates</h5></td></tr>";

        }

        //rows = rows == "" ? "<tr><td><h5 class='text-light'>No Free Rooms Available for the selected dates</h5></td></tr>" : rows;
        // console.log(rows);
        table.html(rows);


        $(".chosen").chosen({
            width: "110%",
            disable_search_threshold: 10
        });

    }


    function usedAs(context) {


        var id = $(context).attr("data-used_as");

        id = 'u_' + id;

        var current_html = $(context).parents("tr.room-row");

        current_html.find('.chosen').chosen('destroy');

        current_html.after( /*"<tr class='room-row'>"+*/ current_html.clone() /*+'<tr>'*/ );

        current_html.find(".booked-as").removeClass('hide');

        $(context).parents("span").addClass('hide');


        //current_html.find(".booked-as").

        current_html.find(".booked-as").html("Booking this room as a <span class='room-booked-as'>" + $(context).html() + "</span>");

        $(context).parent().parent().parent().parent().parent().parent().find(".meal-plans").attr('id', id);

        // alert($(context).parent().parent().parent().parent().parent().parent().find(".meal-plans").attr('id'));

        $(context).parent().parent().parent().parent().parent().parent().find(".room_unit_price").attr('id', id + "unit-price");

        $(context).parent().parent().parent().parent().parent().parent().find(".room_unit_price").attr('onkeyup', 'getUnitPrice(' + id + ')');

        //onkeyup='getUnitPrice(\""+room.id+"\" )'

        $(context).parent().parent().parent().parent().parent().parent().find(".chosen-select").attr('id', id + "select");
        //$(context).parent().parent().parent().parent().parent().parent().find(".chosen-select").attr('id',id+"select");



        $(".chosen").chosen({
            width: "110%",
            disable_search_threshold: 10
        });

        //alert($(context).parent().parent().parent().parent().parent().parent().find(".chosen-select").attr('id'));

        // alert($(context).parent().parent().parent().parent().parent().parent().parent().html());


        setSelectedRooms(); //refresh selected rooms
    }

    function getUnitPrice(id) {

        //alert(context)

        var context = "#" + id + "select"; //.parent().parent().parent().parent().html();

        setSubtotal(context);

        //alert(p)

    }

    function select(btn) { //new  mark selected room

        var meal_plan = $(btn).parent().parent().parent().find(".meal-plans").val();

        var pricing = $(btn).parent().parent().parent().find(".rm-prices").val();

        booking_source_ = $(btn).parent().parent().parent().find(".rm-prices option:selected").text();

        alertify.dismissAll();

        var btn = $(btn),
            tr = btn.parents("tr.room-row");

        max_rooms_to_select = btn.parent().find(".rm-count").val();

        selected_room_type_id = btn.parent().parent().parent().find(".meal-plans").attr("data-room_type_id");

        room_type_id = btn.parent().parent().parent().find(".meal-plans").attr("id");

        //alert(selected_room_type_id+" "+room_type_id);

        /*if(selected_room_type_id!=room_type_id){

            selected_room_type_id=room_type_id;
        }*/



        var number_of_rooms = btn.parent().parent().parent().find(".free-room-count").html();

        if (tr.hasClass('selected')) {
            tr.removeClass('selected');
            alertify.warning("<i class='fa fa-times-circle'></i> Removed from list");
            delete meal_plan_tracker[selected_room_type_id];
            delete manaul_room_allocation[selected_room_type_id];
            setSelectedRooms();
        } else {

            if (pricing === "Select Pricing" || meal_plan === "Meals") {

                alertify.warning("<i class='fa fa-times-circle'></i> Select Meal Plan And Pricing to proceed").set("closeable", true)

            } else {
                //booking_source_track
                meal_plan_tracker[selected_room_type_id] = meal_plan;
                getRoomAllocation(btn, number_of_rooms, max_rooms_to_select, selected_room_type_id, meal_plan);

            }

        }

    }

    var btn_context = null;
    var meal_plan = "";



    function getRoomAllocation(btn, number_of_rooms, max_rooms_to_select, selected_room_type_id, meal_plan) {
        meal_plan = meal_plan;



        $.post("src/get_data.php", {
            token: "get room allocation"
        }, function(data) {


            var data = JSON.parse(data);

            if (data.room_allocation == "manual") {
                //manual
                loadRoomsForManual(btn, number_of_rooms, max_rooms_to_select, selected_room_type_id, meal_plan);

            } else {

                tr = $(btn).parents("tr.room-row");

                tr.addClass('selected');
                alertify.success("<i class='zmdi zmdi-check-circle'></i> Added to list")
                setSelectedRooms();
            }

        });
    }





    function loadRoomsForManual(btn, number_of_rooms, max_rooms_to_select, selected_room_type_id) {
        btn_context = btn;
        var html = "";
        var checkIn = $("#check-in").val();
        var checkOut = $("#check-out").val();

        $.post('src/get_data.php', {
            token: "get_rooms_",
            roomtypeId: selected_room_type_id,
            checkIn: checkIn,
            checkOut: checkOut

        }, function(data) {

            // alert(data)


            var data = JSON.parse(data)

            var html = '';
            $.each(data, function(i, room) {


                html = html + "<div class=\"mb-2 ml-3\"><input data-room_type=\"" + selected_room_type_id + "\"  onclick='manualRoomSelection(this," + max_rooms_to_select + " )' type=\"checkbox\" id=\"" + room.id + "\" value=\"" + room.id + "\" /> <label for=\"" + room.id + "\" >" + room.room_name + "</label></div>";

            })


            $("#room-check-grp").html(html)
            $("#select_rooms__").click();
        })




    }

    function manualRoomSelection(e, max_rooms_to_select) {
        var room_type_id = $(e).attr("data-room_type");
        var room = $(e).attr("value");

        tr = btn_context.parents("tr.room-row");


        if (manaul_room_allocation.hasOwnProperty(room_type_id)) {

            index = manaul_room_allocation[room_type_id].indexOf(room);

            if ($(e).is(":checked")) {

                if (index == -1) {


                    manaul_room_allocation[room_type_id].push(room);
                    //alert(JSON.stringify(manaul_room_allocation));

                    if (manaul_room_allocation[room_type_id].length == max_rooms_to_select) {

                        // alert(JSON.stringify(manaul_room_allocation));

                        tr.addClass('selected');
                        alertify.success("<i class='zmdi zmdi-check-circle'></i> Added to list")

                        $("#select_rooms__").click();

                    }

                } else {

                    manaul_room_allocation[room_type_id].splice(index, 1);

                    // alert(JSON.stringify(manaul_room_allocation));


                }

            } else {

                if (index != -1) {

                    manaul_room_allocation[room_type_id].splice(index, 1);
                    // alert(JSON.stringify(manaul_room_allocation));

                }

            }

        } else {

            if ($(e).is(":checked")) {

                temp_array = [];
                temp_array.push(room);

                manaul_room_allocation[room_type_id] = temp_array;
                if (manaul_room_allocation[room_type_id].length == max_rooms_to_select) {

                    // alert(JSON.stringify(manaul_room_allocation));
                    tr.addClass('selected');
                    alertify.success("<i class='zmdi zmdi-check-circle'></i> Added to list")
                    $("#select_rooms__").click();

                }

            }


        }

        //room_allocation
    }


    function setSubtotal(el) {


        //subtotal on amount
        var p = $(el).parents("tr"),
            subTotalBox = p.find('.sub-total'),
            subTotalInput = p.find('.subtotal'),
            px = p.find(".room_unit_price").val(),
            rooms = p.find(".rm-count option:selected").val(),
            total = parseInt(getNights()) * parseInt(rooms) * parseInt(px);

        //alert(px);
        subTotalBox.text(total);
        subTotalInput.val(total);

        var rms__ = rooms == 1 ? "1 room" : rooms + " rooms";
        p.find(".selected-rooms").text(rms__);

        sr = parseInt(getNights()) * parseInt(px);
        tr = sr * parseInt(rooms);

        setSelectedRooms();
    }

    function changeUnitPrice(sel) {

        var opt = $(sel);
        var s = opt.attr("id");
        s = s.split("s");


        var priceBox = $("#" + s[0] + "unit-price");


        var unitpx = opt.find("option:selected").val();

        //alert(unitpx);

        priceBox.val(unitpx);
        setSubtotal(sel);

        //        var setagent = sel.options[sel.selectedIndex].id;
        //        alert(setagent)




    }

    function changeRoomCount(sel) {
        setSubtotal(sel);
    }

    var gRow = $("#tb-guests tbody").html();

    function addGuests(btn) {

        var p = $(btn).parent(),
            count = p.find('input').val();
        var ag = $("#tb-guests-w tbody tr").length;
        var tg = parseInt(ag) + parseInt(count);
        var exp_guest = $('#exp-num-guests').val();



        if (tg > exp_guest) {
            alertify.error("<i class='fa fa-times-circle'></i> You Can only add " + parseInt(exp_guest) + " expected guests details");

        } else {

            var rows = "";
            // alert(gRow)
            for (var i = 0; i < count; i++) {
                rows += gRow;
            }
            $("#tb-guests tbody").append(rows);
        }


    }

    function remove(element) {
        $(element).parents("tr").remove();
    }
    getTaxes();

    function getTaxes() {

        $.post("src/get_data.php", {
            token: "get_taxes"

        }, function(data) {

            //alert(data);


        });


    }


    // alertify.alert("New Booking Recorded","Your new Booking has been recorded. Please check on top of All Bookings list or New bookings tab to open booking details and add or edit the booking.",
    // function() {
    //    // location.reload();

    // });


    function addReservation(btns) {
        var btn = $(".btn-next");
        btn.html("<i class='fa fa-spin fa-spinner'></i> Saving reservation...");
        btn.prop("disabled", true);

        var paymentMethod = $("#paymemt_mtd").val();

        paymentMethod = paymentMethod == "Cheque" ? "Cheque(" + $("#reference-number").val() + ")" : paymentMethod;

        var totalCost = parseFloat($("#s-total-cost-all").text()) - parseFloat($("#s-total-cost-extras").text()) - parseFloat($("#s-total-cost-beds").text()) - parseFloat($("#s-total-cost-kids").text()),
            totalPaid = $("#ds-total-paid").text(),
            discount = $('#ds-discount').text(),

            bookingStatus = $("#s-status option:selected").val(),
            message = $("#s-message").val();

        //alert(message)

        //        var room_type_id = $("#roomtypes").val();
        var room_type_id = getRooms()[0]['room_type_id']

        //        $('#btn-preview-invoice').click();
        var exp_guest = $('#exp-num-guests').val();

        var r = JSON.stringify({
            property_id: getPropertyId(),
            room_type_id: room_type_id,
            check_in_date: getCheckIn(),
            check_out_date: getCheckOut(),
            cost: totalCost,
            no_guests: exp_guest,
            booking_status: bookingStatus,
            description: message,
            booking_source: getBookingSource() == "2" ? "agent" : getBookingSource(),
            booking_name: $('#booking-name').val(),

            agent_id: getBookingSource() == "2" ? getAgentId() : "0",
            booking_date: "<?php echo date('Y-m-d h:m:s')?>",
            total_paid: totalPaid,
            payment_method: paymentMethod,
            discount: discount,
            invoice_payment_options: "[]"
        });
        //        alert(r)

        var g = JSON.stringify(getGuests());
        var e = JSON.stringify(getExtras());

        /*$.each(roomsArray_, function(i, room) {
           roomsArray_[i].meal_plan = meal_plan_tracker[room.room_type_id];




        });*/


        /* if(booked_as_tracker.length>0){
              $.each(roomsArray_, function(i, room) {
              //roomsArray_

               $.each(booked_as_tracker, function(j, booked_as) {

                    // alert(booked_as.room_id+"=="+room.room_type_id);



                    if(parseInt(booked_as.room_id_used_as)!=parseInt(room.room_type_id)){

                        alert(JSON.stringify( room) +" "+ JSON.stringify( booked_as) )

                        roomsArray_[i].booked_as=booked_as.room_id_used_as;
                        //return false;

                    }


                });

            } );

          }

       */

        var rms = JSON.stringify(getRooms());

        var excluded_tx = JSON.stringify(excluded_taxes);

        //alert(rms);

        var room_selection = JSON.stringify(manaul_room_allocation);


        var children_rates = JSON.stringify(json_children_obj);

        var extra_bed = JSON.stringify(json_extra_bed_obj);

        if (!(manaul_room_allocation.length === undefined)) {
            room_array = [];
            $.each(getRooms(), function(i, room) {

                if (manaul_room_allocation.hasOwnProperty(room.room_type_id)) {

                    if (manaul_room_allocation[room.room_type_id].indexOf(room.room_id) != -1) {

                        room_array.push({
                            room_type_id: room.room_type_id,
                            room_id: room.room_id,
                            price_per_night: room.price_per_night,
                            price_rate: room.price_rate,
                            meal_plan: meal_plan_tracker[room.room_type_id]
                        });

                    }

                }


            })
            rms = JSON.stringify(room_array);

        }

        meal_plan_per_day = JSON.stringify(meal_plan_tracker_days);




        $.post("src/xhr.php", {
            action: "add reservation",
            main_data: r,
            guests: g,
            extras: e,
            rooms: rms,
            children_rates: children_rates,
            meal_plan_per_day: meal_plan_per_day,
            extra_bed: extra_bed,
            excluded_taxes: excluded_tx

        }, function(data) {



            btn.html("<i class='zmdi zmdi-check'></i> Finish");
            btn.prop("disabled", false);

            //alert(data);

            x0p('Booking Saved', 'Your new Booking has been recorded.', 'ok', function() {
                location.reload();
                $("#new-booking").modal("hide");
            });

            /*//   alertify.alert("New Booking","Your new Booking has been recorded. Please check on top of All Bookings list or New bookings tab to open booking details and add or edit the booking.", // function() { // location.reload(); // });
            $("#new-booking").modal("hide");


            data = JSON.parse(data);

            gotoStep("#done");
            $("#done #booking-name").text(data.booking_name)
            $('#open-invoice').on("click", function() {
                previewInvoice(data.booking_id);

                $("#new-booking").on("hide.bs.modal", function() {
                    location.reload();
                })
            })*/

        });

    }



    //setters
    var checkIn_ = "",
        checkOut_ = "",
        nights_ = "",
        propertyId_ = "",
        totalRoomCost_ = "",
        roomsArray_ = new Array(),
        roomType_ = "",
        roomTypeId_ = "",
        priceRate_ = "",
        pricePerNight_ = "",
        bookingSource_ = "",
        agentId_ = "",
        agent = "",
        freeRooms_ = "",
        guestsArray_ = new Array(),
        extrasArray_ = new Array(),
        message_ = "",
        bookingStatus_ = "";

    function setCheckIn(c) {
        checkIn_ = c;
    }

    function setCheckOut(c) {
        checkOut_ = c;
    }

    function setNights(c) {
        nights_ = c;
    }

    function setPropertyId(c) {
        propertyId_ = c;
    }

    function setTotalRoomCost(c) {
        totalRoomCost_ = c;
    }

    function setRooms(btn) {
        //create json string of selected rooms [{room_id:xx, room_type_id:xx, room_name:xx, price_per_night:xxx}]

        var freeRms = JSON.parse(getFreeRoomsData());

        /*get the json string of all the rooms
        looop through to get all the selected rooms*/
        var c = new Array();
        //alert(getFreeRoomsData())
        booked_as_tracker = [];

        var rooms_tracker_per_property = {};

        $("#tb-free-rooms tr.selected").each(function(j, tr) {


            //$(context).parent().parent().parent().parent().parent().parent().find(".meal-plans").attr('id',id);


            // alert($(context).parent().parent().parent().parent().parent().parent().find(".meal-plans").attr('id'));

            //  $(context).parent().parent().parent().parent().parent().parent().find(".room_unit_price").attr('id',id+"unit-price");
            //alert();
            var position = parseInt($(tr).find(".position").val());
            var rms = $(tr).find(".rm-count option:selected").val();


            //alert(JSON.stringify(rms));room.id+"unit-price

            var a = new Array();
            var rtId = freeRms[position].id //roomtype id;
            var rooms = freeRms[position].rooms;
            var propid = freeRms[position].property_id;

            var room_type_id_ = $(tr).find(".meal-plans").attr('id');

            var meal_plan = $(tr).find(".meal-plans").val();
            //alert(meal_plan);
            // var price = $(tr).find("rm-prices option:selected").val();
            //var pricerate_ = $(tr).find(".rm-prices option:selected").text();
            var price = $(tr).find("#" + room_type_id_ + "unit-price").val();
            var pricerate_ = $(tr).find(".rm-prices option:selected").text();

            //alert(rtId +"---"+room_type_id_)


            //alert(JSON.stringify(booked_as_tracker))
            //alert(JSON.stringify(rooms))
            setPropertyId(propid)
            //=[];
            room_type_id_ = room_type_id_.replace('u_', '');
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
                                //alert(27);
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

                    //alert(28);
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
                        //alert(31);
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

                            //alert(33);
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

                //alert(JSON.stringify(c))

            }



            //c=rooms;


            //            alert(j)
        })

        roomsArray_ = c;

        //        alert(JSON.stringify(roomsArray_));
        if (c.length < 1) {
            alertify.error("<i class='fa fa-times-circle'></i> Select one or more rooms first");

        } else {
            gotoStep(1);
        }

    }


    function search(room_id, room_type_id, mArray) {

        var temp_array = [];
        if (mArray.length != 0) {


            for (var i = 0; i < mArray.length; i++) {

                if (mArray[i].room_id == room_id && mArray[i].room_type_id == room_type_id) {
                    temp_array.push(true)
                    temp_array.push(i)
                    return temp_array;
                } else {
                    temp_array.push(false)
                    temp_array.push(i)
                    return temp_array;
                }
            }
        } else {

            temp_array.push(false)
            //temp_array.push(i)
            return temp_array;
        }

    }

    function setFreeRoomsData(c) {
        freeRooms_ = c;
    }


    function setRoomType(c) {
        roomType_ = c;
    }

    function setRoomTypeId(c) {
        roomTypeId_ = c;
    }

    function setPriceRate(c) {
        priceRate_ = c;
    }

    function setPricePerNight(c) {
        pricePerNight_ = c;
    }

    function setBookingSource(c) {
        bookingSource_ = c;
    }

    function setAgentId(c) {
        agentId_ = c;
    }

    function setAgent(c) {
        agent_ = c;
    }

    function setGuests() {

        $('#email-not').show();

        var c = new Array();

        $("#tb-guests tbody tr").each(function(i, tr) {
            var name = $(tr).find("td:eq(0) input").val();
            var age = $(tr).find("td:eq(1) input").val(),
                yearOfBirth = <?php echo date('Y')?> - age;
            var email = $(tr).find("td:eq(2) input").val();
            var phone = $(tr).find("td:eq(3) input").val();
            var idNumber = $(tr).find("td:eq(4) input").val();

            if (name != "") {
                c[i] = {
                    name: name,
                    year_of_birth: yearOfBirth,
                    email: email,
                    phone: phone,
                    id_number: idNumber
                };
            }

        })
        guestsArray_ = c;

        if (c.length < 1) {
            alertify.error("<i class='fa fa-times-circle'></i> Add 1 or more guests to coninue");

        } else if ($("#booking-source option:selected").val() != "2" && $('#booking-name').val() == "") {
            errorMSG('#booking-name', "Can not be empty for direct booking");
        } else {
            setBookingSource($("#booking-source option:selected").val()); ///ended here
            setAgent($("#agents option:selected").text());
            setAgentId($("#agents option:selected").val());
            setSummary();
            gotoStep(1);
        }


    }

    function bookingNameFocus() {
        $('.error-alert').remove();
    }

    function setExtras(c) {
        extrasArray_ = c;
    }

    //getters
    function getCheckIn() {
        return checkIn_;
    }

    function getCheckOut() {
        return checkOut_;
    }

    function getNights() {
        return nights_;
    }

    function getPropertyId() {
        return propertyId_;
    }

    function getTotalRoomCost() {
        return totalRoomCost_;
    }

    function getRooms() {
        return roomsArray_;
    }

    function getRoomType() {
        return roomType_;
    }

    function getRoomTypeId() {
        return roomTypeId_;
    }

    function getPriceRate() {
        return priceRate_;
    }

    function getPricePerNight() {
        return pricePerNight_;
    }

    function getBookingSource() {
        return bookingSource_;
    }

    function getAgentId() {
        return agentId_;
    }

    function getAgent() {
        return agent_;
    }

    function getGuests() {
        return guestsArray_;
    }

    function getExtras() {
        $("#tb-extras tbody tr.selected").each(function(i, tr) {
            var id = $(tr).find(".id").val();
            var guests = $(tr).find("td:eq(3) select option:selected").val();
            var price = $(tr).find("td:eq(2) select option:selected").val();

            extrasArray_[i] = {
                extra_id: id,
                unit_price: price,
                total_guests: guests
            }
        })
        return extrasArray_;
    }

    function getFreeRoomsData() {
        return freeRooms_;
    }

    ////control next button

    function clickNext(i) {
        $('.steps .step-item.active .next').trigger('click');
        //gotoStep(i)
    }

    function setSummary() {
        var exp_guest = $('#exp-num-guests').val();
        var guestPrefix = "";
        var bookingSource = getBookingSource();

        if (bookingSource == "2") {

            bookingSource = getAgent();
        }

        //alert(getGuests().length)

        $("#s-check-in").html(getCheckIn())

        $("#s-check-out").html(getCheckOut())

        $("#s-source").text(bookingSource);
        $("#s-agent").text(bookingSource);
        $("#s-nights").html("<b>Nights</b> <br>" + getNights());


        if (parseInt(exp_guest) > 1) {
            guestPrefix = " + " + (parseInt(exp_guest) - 1);
        }
        $("#s-guests").html(getGuests()[0]["name"] + guestPrefix);

        $("#s-rooms").html(getRooms().length);


        $("#ds-check-in").html(getCheckIn())
        $("#ds-check-out").html(getCheckOut())
        $("#ds-nights").html(getNights());
        $("#ds-rooms").html(getRooms().length);
        $("#ds-guests").html(parseInt(exp_guest));


        //guests drop downs in extras table
        $("#tb-extras tbody tr").each(function(i, tr) {

            var select = "<select class='form-control' onchange='setExtrasSubTotal(this)'>";
            for (var i = parseInt(exp_guest); i >= 1; i--) {
                select += "<option value='" + i + "'>" + i + "</option>";
            }
            select += "</select>";

            var extraUnitPrice = parseFloat($(tr).find("td:eq(2) select option:selected").val());

            $(tr).find("td:eq(3)").html(select);
            $(tr).find("td:eq(4) #extra-subtotal").html(parseInt(exp_guest) * extraUnitPrice);

        });

        //set total rooms cost
        var roomTotalCost = 0;
        $("#tb-free-rooms tr.selected").each(function(j, tr) {

            var ttl = parseFloat($(tr).find(".sub-total").text());

            roomTotalCost = roomTotalCost + ttl;

        });
        $("#s-total-cost-rooms").text(roomTotalCost);
        setTotals();


    }

    //extras code
    function setExtrasSubTotal(el) {

        var unitpx = parseFloat($(el).parents("tr").find("td:eq(2) select option:selected").val());
        var numGuests = parseFloat($(el).parents("tr").find("td:eq(3) select option:selected").val());

        $(el).parents("tr").find("td:eq(4) #extra-subtotal, td:eq(4) #extra-subtotal-w").html(numGuests * unitpx);
        setTotals();
    }


    function addToExtras(chk) { //mark the row to seleceted
        var c = $(chk),
            tr = c.parents("tr");
        if (c.is(":checked")) {
            tr.addClass("selected");
        } else {
            tr.removeClass("selected");
        }
        setTotals();
    }




    function setTotals() { //sets extra subtotals and the  total

        var totalExtrasBox = $("#s-total-cost-extras");
        var totalAllBox = $("#s-total-cost-all");
        var totalRoomsBox = $("#s-total-cost-rooms");

        var totalExtras = 0;

        $("#tb-extras tbody tr.selected").each(function(i, tr) { //total up all selected rows
            var stotal = parseFloat($(tr).find("td:eq(4) #extra-subtotal").text());
            totalExtras = stotal + totalExtras;

        });
        totalExtrasBox.text(totalExtras);

        var total_kid_amount = 0;
        $.each(json_children_obj, function(index, item) {
            total_kid_amount += parseFloat(item.amount);

        });
        $('#s-total-cost-kids').text(total_kid_amount);

        var total_extra_bed = 0;
        $.each(json_extra_bed_obj, function(index, item) {
            total_extra_bed += parseFloat(item.amount);
        });
        $('#s-total-cost-beds').text(total_extra_bed);

        var totalAll = totalExtras + parseFloat(totalRoomsBox.text()) + total_kid_amount + total_extra_bed;

        totalAllBox.text(totalAll);
        $('#ds-total-cost-all').text(totalAll);
        setInvoiceClient();
        setTotals_w();
    }

    function getInvoice_t() {

        $.post('src/get_data.php', {
            token: "invoice_temp",
            id: "1"

        }, function(data) {

            var datau = JSON.parse(data);

            var cn = datau[0].company_name
            var cad = datau[0].address;
            var cp = datau[0].phone;
            var ce = datau[0].email
            var cw = datau[0].website;

            var tn = datau[0].title;
            var tp = datau[0].prefix;
            var td = "<?php echo date('d M Y h:m')?>"
            var dd = datau[0].due_date;
            var nd = datau[0].notes;
            var pd = datau[0].policy;
            nd = nd.replace(new RegExp('\r?\n', 'g'), '<br />');

            $("#c-table #c-details").html("<b>" + cn + "</b><br>" + cad + "<br>" + cp + "<br>" + ce + "<br>" + cw);


            $("#c-table #t-name").text(tn);
            $("#c-table #t-date").text(td);
            $("#c-table #due-date").text(dd);
            $("#c-table #t-receipt").text(tp + "001");
            $("#t-notes").html(nd);
            $("#t-h-policy").html(pd);

            settotalCost(datau);
            setprefix(tp)

        })



    }
    var datav = "";

    function settotalCost(datau) {
        datav = datau;

    }

    var prefix = '';

    function setprefix(tp) {
        prefix = tp
    }
    var newbid = 0;

    function setbid(id) {
        newbid = id
    }

    function setInvoiceClient() {
        $("#c-table #t-receipt").text(prefix + pad(newbid, 4));
        //set customer details in the invoice
        $("#c-table #p-details").html("<b> To: " + getGuests()[0]["name"] + " + " + (getGuests().length - 1) + " Guest(s)</b><br>" +
            getGuests()[0]["phone"] + "<br> " + getGuests()[0]["email"]);

        //set total rooms cost
        var roomTotalCost = 0;
        $("#tb-free-rooms tr.selected").each(function(j, tr) {
            var ttl = parseFloat($(tr).find(".sub-total").text());
            roomTotalCost = roomTotalCost + ttl;

        });

        // setting purchases details in invoice
        var rows_c = "<tr><td>Rooms Booked for<br><b>" + getNights() + " Nights</b></td>" +
            "<td>1</td><td class='hide'><input type='number' min='0' max='100' class='form-control tiny ' value=''  placeholder='Enter discount' oninput='cal_discount(value," + roomTotalCost + ",this )'/></td><td>$" + roomTotalCost + "</td><td>$<label class='Rtotalcost ' id='totalcost'>" + roomTotalCost + "</label></td></tr>";

        var table_c = $(".table-invoice");
        var tablebody_c = table_c.find('tbody');

        var totalExtras = 0;
        $("#tb-extras tbody tr.selected").each(function(i, tr) { //total up all selected rows
            var stotal = parseFloat($(tr).find("td:eq(4) #extra-subtotal").text());
            totalExtras = stotal + totalExtras;
        });
        var rows = "";
        var chx = $("#tb-extras tbody tr.selected");

        if (!chx.length == 0) {
            chx.each(function(i, tr) { //total up all selected rows
                var sname = $(tr).find("td:eq(1)").text();
                var guests = $(tr).find("td:eq(3) select option:selected").val();

                rows += "<li>" + sname + "(" + guests + " Guests)</li>";
            });

            rows_c += "<tr><td>" +
                "<b>Extra service: </b>" + rows +
                "</td><td>1</td><td class='hide'> <input type='number' min='0' max='100' class='form-control tiny '  value=''  placeholder='Enter discount' oninput='cal_discount(value," + totalExtras + ",this )'/></td><td>$" + totalExtras + "</td><td> $<label class='Etotalcost' id='totalcost'>" + totalExtras + "</label></td></tr>";
        }

        tablebody_c.html(rows_c);

        //calculating subtotal
        var subtotal_invoice = roomTotalCost + totalExtras

        gettablefoot(subtotal_invoice, 'oo');

    }

    function gettablefoot(s, d) {
        var discount = d == 'oo' ? $('#ds-discount').text() : d;
        var tax = 0;
        var subtotal_invoice = s;
        var table_b = $(".table-invoice");
        var tablefoot_b = table_b.find('tfoot');
        var rows_b = "<tr><td colspan='2'></td><td>Sub Total</td> <td><p class='pull-right' id='subtotal_invoice'>$0</p></td></tr>";


        var dataw = JSON.parse(datav[0].taxes);
        $.each(dataw, function(i, item) {
            var tn = item.taxname;
            var ta = item.taxamount;
            var st = parseFloat(subtotal_invoice) * parseFloat(ta) / 100

            rows_b += "<tr><td colspan='2'></td>" +
                "<td>" + tn + " (" + ta + "%)</td>" +
                "<td><p class='pull-right'>" + st.toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD'
                }) + "</p></td></tr>";

            tax = parseFloat(tax) + parseFloat(ta);

        })
        rows_b += "<tr><td colspan='2'></td><td>Discount</td> <td><p class='pull-right' id='discount_invoice'>" + parseFloat(discount).toLocaleString('en-US', {
            style: 'currency',
            currency: 'USD'
        }) + "</p></td></tr>";
        rows_b += "<tr><td colspan='2'></td><td><b>Grand Total</b></td> <td><b><p class='pull-right' id='grand-total-invoice'>$0</p></b></td></tr>";

        tablefoot_b.html(rows_b);

        var grandTotal_invoice = parseFloat(tax) * parseFloat(subtotal_invoice) / 100 + parseFloat(subtotal_invoice) - parseFloat(discount);

        $(".table-invoice  tfoot #subtotal_invoice").text(parseFloat(subtotal_invoice).toLocaleString('en-US', {
            style: 'currency',
            currency: 'USD'
        }));
        $(".table-invoice  tfoot #grand-total-invoice").text(grandTotal_invoice.toLocaleString('en-US', {
            style: 'currency',
            currency: 'USD'
        }));
    }

    //    function cal_discount(d, t, sel) {
    //        if (d == "" || d < 0) {
    //            d = 0;
    //        } else if (d > 100) {
    //            d = 100;
    //
    //            errorMSG($(sel), "set discount to less than 100");
    //            $(sel).val(100);
    //        } else {
    //            $('.error-alert').remove();
    //        }
    //        var tv = parseFloat(t) - parseFloat(d) * parseFloat(t) / 100;
    //
    //
    //        var p = $(sel).parents("tr"),
    //            tc = p.find('td  #totalcost');
    //        tc.text(tv);
    //
    //        var rtc = $('.Rtotalcost').text();
    //        var etc = $('.Etotalcost').text();
    //        var subtotal_invoice = parseFloat(rtc) + parseFloat(etc);
    //
    //        gettablefoot(subtotal_invoice);
    //    }

    function email_not() {

        var totalCost = $("#s-total-cost-all").text(),
            totalPaid = $("#ds-total-paid").text(),

            bookingStatus = $("#s-status option:selected").val(),
            message = $("#s-message").val(),
            guests = getGuests();

        var paymentMethod = $("#paymemt_mtd").val();
        paymentMethod = paymentMethod == "Cheque" ? "Cheque(" + $("#reference-number").val() + ")" : paymentMethod;

        var room_type = $("#roomtypes option:selected").text();
        var temp_id = $("#s-temp option:selected").val();


        $.ajax({
            url: 'src/sendmail.php',
            type: 'GET',
            data: {
                booking_status: bookingStatus,
                check_in_date: getCheckIn(),
                check_out_date: getCheckOut(),
                cost: totalCost,
                booking_date: "<?php echo date('Y-m-d h:m:s')?>",
                guest_name: guests[0]["name"],
                guest_no: guests.length,
                guest_email: guests[0]["email"],
                temp_id: temp_id,



                room_type: room_type

            },
            success: function(result) {
                console.log(result);

            },
            error: function(xhr, ajaxoptions, thrownerror) {}
        });



    }

    function setSelectedRooms() {


        var room_c = 0;
        var row = "";
        var rms = 0;

        if (isNewBooking()) {
            var bubble = $("#selected-room-count");
            var tb_r = "#tb-free-rooms tr.selected";
        } else {
            var bubble = $("#ar_selected-room-count");

            var tb_r = "#ar_tb-free-rooms tr.selected";
            $("#ar_tb-free-rooms tr.selected").each(function(j, tr) {

                var ttl = parseFloat($(tr).find(".sub-total").text());

                room_c = room_c + ttl;

            });
            $("#t-rooms-c").text('$' + room_c);
        }





        $(tb_r).each(function(i, tr) {
            row += "<tr>";
            var name = $(tr).find(".room-type-name").text();
            // var mealPlan = $(tr).find(".meal_plans option:selected").text();
            var rooms = $(tr).find(".rm-count").val();
            var index = $(tr).index();
            rms += parseInt(rooms);
            if ($(tr).find(".room-booked-as").length > 0) {
                name = $(".room-booked-as").text();
                //code
            }
            row += "<td><b>" + name + "</b></td>";
            row += "<td>" + rooms + "</td>";
            // row+="<td>"+mealPlan+"</td>";
            row += "<td class='text-right'><a class='zmdi zmdi-close btn-circle' title='remove from list' onclick='unselectRoom(" + index + ", this)'></td>";
            row += "</tr>";


        });

        bubble.addClass("ripple");
        bubble.text(rms);

        if (rms < 1) {
            //bubble.hide();
            row = "<tr><td class=text-center>No rooms selected</td></tr>";
        } else {
            //bubble.show();
        }
        setTimeout(function() {
            bubble.removeClass("ripple");
        }, 1000);

        $(".selected-rooms-modal .table").html(row);
        //console.log(row);

    }

    function unselectRoom(i, btn) {

        $(btn).parents("tr").remove();
        $("#tb-free-rooms tr:eq(" + i + ")").removeClass("selected");
        setSelectedRooms();
    }


    $('#message-box').tooltip({
        'trigger': 'hover',
        'title': 'This is where you type and save client message and notices'
    });

    $('#booking-name').tooltip({
        'trigger': 'hover',
        'title': 'Enter booking name'
    });

    $('#guest-details').tooltip({
        'trigger': 'hover',
        'title': 'Click and start entering Guest details'
    });
    $('#check-in').tooltip({
        'trigger': 'hover',
        'title': 'Enter Check-in date'
    });

    $('#check-out').tooltip({
        'trigger': 'hover',
        'title': 'Enter Check-out date'
    });

</script>
