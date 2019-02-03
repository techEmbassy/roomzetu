<style>
    .table-xs td {
        font-size: 10pt;
        color: #555;
        vertical-align: middle;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    
    .table-xs th{
        padding: 8px 0 !importamt;
        text-align: left;
    }
    
    .tag{
        display: inline-block;
        font-size: 10pt;
        background: #eee;
        border-radius: 10px !important;
        padding: 3px 15px;
        color: #777;
        text-transform: capitalize;
        margin-bottom: 10px;
    }

    #d-tb-extras .btn-circle{
        margin-left: 20px !important;
        display: inline-block;
        background: #eee;
    } #d-tb-extras .btn-circle:hover{
        
        background: #999;
    }
</style>



<div class="modal animated FadeIn" id="booking-details">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <div class="row col-md-12">

                    <div class="col-md-4">
                        <h4 class="modal-title"><span id="d-name-title"></span></h4>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body p-1 text-center">
                                <div class="h6 m-0 mt-2"><a class="d-status" style="font-size:11px;"></a></div>
                                <div class="text-muted mb-2" style="font-size:12px;">Status</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body p-1 text-center">
                                <div class="h4 m-0"><a class="d-guests"></a></div>
                                <div class="text-muted mb-2" style="font-size:12px;">Guests</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body p-1 text-center">
                                <div class="h4 m-0"><a class="d-rooms"></a></div>
                                <div class="text-muted mb-2" style="font-size:12px;">Rooms</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body p-1 text-center">
                                <div class="h4 m-0"><a class="d-balance"></a></div>
                                <div class="text-muted mb-2" style="font-size:12px;">Balance</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rooms" role="tab">Rooms </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#people" role="tab">Guests <span id="d-guest-count"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#adons" role="tab">Extras</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Message</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#payments" role="tab">Payments</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="col-md-12">

                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="row mt-2">


                                    <div class="col-md-4">
                                        <label>Name</label>
                                        <input class="form-control b-period"  onblur="updateName(this)" id="d-name" style="text-transform: capitalize;" />
                                        <label>Email</label>
                                        <input onblur="updateEmail(this)" class="form-control" value="" id="d-email" />
                                        <label>Phone</label>
                                        <input onblur="updatePhone(this)" class="form-control" value="" id="d-phone" />
                                        <br>
                                        <br>


                                        <!--
                                        <div id="check-in-out-form">
                                            <label>Check in</label>
                                            <input class="form-control datepicker b-period " value="" id="d-check-in" required data-empty-message="select check-in date" />
                                            <label>Check Out</label>
                                            <input class="form-control datepicker b-period" value="" id="d-check-out" required data-empty-message="select check-out date" />
                                            <button class="btn btn-sm btn-outline-success mt-2 b-period" onclick="changeCheck_in_out()">Change dates</button><br>
                                        </div>
-->


                                    </div>



                                    <div class="col-md-4">
                                        <label>Reservation Status</label>
                                        <div class="jumbotron p-2 m-0 dropdown clearfix">
                                            <span class="d-status" id="d-status"></span>
                                            <a class="btn btn-sm btn-warning pull-right b-period" data-toggle='dropdown'>change</a>
                                            <div class="dropdown-menu p-0 dropdown-menu-right r-status">
                                                <a class="dropdown-item" onclick="" data-status="unconfirmed"><i class="fa fa-circle-o text-disabled"></i> Unconfirmed</a>
                                                <a class="dropdown-item" data-status="confirmed"><i class="fa fa-circle-o text-green"></i> Confirmed</a>
                                                <a class="dropdown-item" data-status="check-in"><i class="fa fa-circle text-green"></i> In House</a>
                                                <a class="dropdown-item" data-status="cancelled"><i class="fa fa-circle text-red"></i> Cancelled</a>
                                            </div>
                                        </div>
                                        <br>
                                        <label>Properties</label>
                                        <div id="properties-affected">
                                       <!--<span class="tag">property one</span>
                                       <span class="tag">property two</span>-->

                                        </div>
<!--                                        <input class="form-control" disabled value="" id="d-property-name" />-->

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane mt-3" id="rooms" role="tabpanel">
                                <!--

                                <table class="table" id="d-tb-rooms">
                                    <thead>
                                        <tr>
                                            <th style="border-top:0px">Room type</th>
                                            <th style="border-top:0px">Room</th>
                                          
                                            <th style="width:50px; border-top:0px"></th>
                                        </tr>
                                    </thead> 
                                    <tbody>

                                    </tbody>
                                </table>
-->

                                <table class="table table-xs" id="d-tb-rooms">
                                    <thead>
                                        <tr>
                                            <th style="border-top:0px">Property</th>
                                            <th style="border-top:0px">Room type</th>
                                            <th style="border-top:0px" >Room</th>
                                            <th style="border-top:0px">Check-in </th>
                                            <th style="border-top:0px">Check-out</th>
                                            <th style="border-top:0px" class="text-center">Nights</th>
                                            <th style="border-top:0px" class="text-center">Meal Plan</th>
                                            <th style="border-top:0px" class="text-right">Price Per Night</th>
                                            <th style="border-top:0px" class="text-right">Total</th>
                                            <th style="width:50px; border-top:0px" colspan="2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <!--<tr>
                                            <td>Main Primary</td>
                                            <td>Double Dummy</td>
                                            <td>A9</td>
                                            <td>2/06/2017</td>
                                            <td>5/06/2017</td>
                                          <td class="text-center">2</td>
                                            <td class="text-center">HB</td>
                                            <td class="text-right">78</td>
                                            <td class="text-right">78</td>
                                            <td><a class="fa fa-pencil btn-circle" onclick="editRoom(this)"></a></td>
                                            <td><a class="fa fa-times btn-circle"></a></td>
                                            <!--                                            <td><a>Delete</a></td>-->
                                        <!--</tr>

                                        <tr>
                                            <td>Apoka Safari Logde</td>
                                            <td>Single Dummy</td>
                                            <td>A6</td>
                                            <td>5/06/2017</td>
                                            <td>6/06/2017</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">HB</td>
                                            <td class="text-right">78</td>
                                            <td class="text-right">78</td>
                                            <td><a class="fa fa-pencil btn-circle" onclick="editRoom(this)"></a></td>

                                            <td><a class="fa fa-times btn-circle"></a></td>
                                            <!--                                            <td><a>Delete</a></td>-->
                                        <!--</tr>-->

                                    </tbody>


                                </table>

                                <hr/>
                                <button class='btn btn-sm btn-light hide' onclick="createNewRoom(this)"><i class="fa fa-plus"></i> Add Accomodation</button>
                            </div>
                            <div class="tab-pane" id="people" role="tabpanel">
                                <br>

                                <button class="btn btn-sm btn-secondary b-period" id="addnewguest" onclick="addGuests_d(this)">Add Guests</button>
                                <button class="btn btn-sm btn-success pull-right hide" id="savebtnGuests">Save</button><br>



                                <table class="table mt-2" id="d-tb-guests" border="1">
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
                                    </tbody>

                                </table>
                            </div>
                            <div class="tab-pane mt-3" id="adons" role="tabpanel" id="d-tb-extras">

                                <div class="jumbotron p-2 m-0 dropdown clearfix">
                                    <!-- <span class="d-status" id="d-status"></span> -->
                                    <a class="btn btn-sm btn-warning pull-right b-period" data-toggle='dropdown'>Add Extra Services</a>
                                    <div class="dropdown-menu p-0 dropdown-menu-right extra" id="extras_drop">
                                        <!--<a class="dropdown-item" onclick="" data-status="unconfirmed"> Extra 1</a>
                                                <a class="dropdown-item" data-status="confirmed"> Extra 2</a>
                                                <a class="dropdown-item" data-status="check-in"> Extra 3</a>
                                                <a class="dropdown-item" data-status="cancelled"> Extra 4</a>-->
                                    </div>
                                </div>


                                <table class="table" id="d-tb-extras">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Add on</th>
                                            <th class="border-top-0">No. of Guests</th>
                                            <th class="border-top-0">Cost P/P</th>
                                            <th class="border-top-0">Total Cost</th>
                                            <th class="border-top-0" class='text-left'></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>


                                </table>



                            </div>


                            <div class="tab-pane" id="messages" role="tabpanel">
                                <label class="mt-3">Please note the following :-</label>
                                <textarea rows="10" class="form-control p-3 b-period mt-1" style="height:200px !important" id="d-message" onchange="changeMessage(value)"></textarea>
                            </div>
                            <div class="tab-pane" id="payments" role="tabpanel">
                                <br><input id="sub_ttl" type="hidden" />
                                <div class="row">
                                    <style>
                                        .text-sml {
                                            font-size: 13px !important;
                                        }

                                    </style>

                                    <div class="col-md-2 text-sml">
                                        <h5 class="text-sml"><small>Sub-Total:</small> $<span id="d-s-total">0</span></h5>
                                    </div>

                                    <div class="col-md-2">
                                        <h5 class="text-sml"><small>Discount:</small> $<span id="d-discount">0</span></h5>
                                    </div>

                                    <div class="col-md-2">
                                        <h5 class="text-sml"><small>Taxes:</small> $<span id="d-taxes">0</span></h5>
                                    </div>

                                    <div class="col-md-2">
                                        <h5 class="text-sml"><small>Total Cost:</small> $<span id="d-total-cost">0</span></h5>
                                    </div>


                                    <div class="col-md-2">
                                        <h5 class="text-sml"><small>Total Paid:</small> $<span id="d-total-paid">0</span></h5>
                                    </div>

                                    <div class="col-md-2">
                                        <h5 class="text-sml"><small>Balance:</small> $<span id="d-balance">0</span></h5>
                                    </div>
                                </div>


                                <hr>

                                <div class="pt-3 pb-3 ">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button class="btn btn-sm btn-secondary b-period" onclick="toggleInputs()"><i class="fa fa-plus"></i> Add Payment</button>
                                        </div>

                                        <div class="col-md-3 input-price hide ">
                                            <input placeholder="Date" class="datepicker ml-3 form-control tiny" name="date" />
                                        </div>

                                        <div class="col-md-3 input-price hide">
                                            <div class="input-group" style="">
                                                <span class="input-group-addon">$</span>
                                                <input placeholder="amount paid" type="number" class="form-control" name="amount" required/>

                                            </div>
                                        </div>
                                        <div class="col-md-2 input-price hide">

                                            <select class="form-control" id="paymemt_mtd" required>
                                                   <option value="Cash" >Payment Method</option> 
                                                <option value="Cash">Cash</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="EFT">EFT</option>
                                                 <option value="RTJTS">RTGS</option>
                                                </select>
                                        </div>
                                        <div class="col-md-1 input-price hide ">
                                            <button class="btn btn-sm btn-primary ml-3" onclick="addPayment()"><i class="fa fa-check-circle"></i> Save</button>
                                        </div>

                                    </div>
                                </div>

                                <div class="scrolly" style="height:30vh">
                                    <table class="table" id="d-tb-payments">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Payment Method</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>


                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <div class="container">

                    <div class="row">
                        <div class="col-md-10">
                            <button class="btn btn-sm btn-danger " hidden="hidden" href="#" id="delete-booking"><i class="fa fa-eye"></i> Delete Booking</button>





                            <a class="btn btn-sm btn-outline-primary open-invoice" href="#" data-target="#preview-invoice"><i class="fa fa-eye"></i> Preview Invoice</a>
                            <!--<a class="btn btn-sm btn-outline-secondary" href="#" data-toggle="modal" data-target="#email-modal" onclick="setInvoiceClient()"><i class="fa fa-envelope-o"></i> Send Email</a>-->



                            <a class="btn btn-sm btn-outline-info" href="#" data-trigger="focus" data-toggle="popover" data-target="popover" data-placement="top" onclick=""><i class="fa fa-envelope-o"></i> Send Email</a>

                            <!-- <button class="btn btn-sm btn-info dropdown-toggle" type="button" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o"></i> Send Emai</button>
                            <div class="dropdown-menu border-0">
                                <div class="card" style="background-color:#fafafa">
                                    <p class="p-2">Select Template</p>
                                    <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            
                            <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                            </div> -->

                            <!-- loaded popover content -->
                            <div id="popover-content" style="display: none" class="p-0">

                                <style>
                                    .popper {
                                        padding: 0;
                                    }

                                    .custom-popover {
                                        border: none !important;
                                        margin: 0px !important;
                                        padding: 4px;
                                    }

                                    .popover-title {
                                        text-align: left;
                                    }

                                    .custom-popover li {
                                        border: none !important;
                                        text-align: center;

                                    }

                                </style>
                                <h6 class="popover-title">Select Email Template</h6>
                                <ul class="list-group custom-popover text-left" id="sel-email-template">

                                </ul>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('[data-toggle="popover"]').popover({
                                        html: true,
                                        content: function() {
                                            return $('#popover-content').html();
                                        }
                                    });
                                });

                            </script>


                        </div>

                        <div class="col-md-2 text-right">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"> <i class="fa fa-close"></i> Close</button>
                        </div>

                    </div>

                </div>





                <!--                <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>-->
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->








<div class="modal animated bounceInDown" id="email-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-info"></i> Choose Email Template</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body" id="form-new-user">
                <div class="row form-group">
                    <label class="col-md-3">Email Template: </label>
                    <div class="col-md-6">
                        <select class="form-control" id="sel-email-template"><option>Reservation template</option></select>

                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="send_mail()" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i> Send Email</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



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
<div class="modal" id="edit-room">
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



            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="record_id" />
                    <input type="hidden" id="b_id" />

                    <div class="col-md-12 " id="">

                        <label>Property</label>
                        <select class="form-control" id="properties_edit"  onchange="getRoomTypesForEdit_()">
                           
                            <?php echo $propertyOptions0;?>
                              
                        </select>
                        <div class="row">
                            <div class="col-6">
                                <label>Check-in</label>
                                <input id="check_in_date_"  onblur="some_change()" class="form-control datepicker" />
                            </div>
                            <div class="col-6">
                                <label>Check-out</label>
                                <input id="check_out_date_" onblur="some_change()" class="form-control datepicker" />
                            </div>
                        </div>
                        <div class="room-div">
                            <div class="row">
                                <div class="col-6">
                                    <label>Room type</label>
                                    <select  onchange="some_change()" class="form-control " id="roomtypes_">
                                        <!--<option>Select</option>
                                        <option>Property 1</option>
                                        <option>Property 2</option>-->
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Free Rooms</label>
                                    <select  class="form-control" id="free_rooms">
                                        
                                    </select>
                                </div>
                            </div>

                        </div>
                        <hr/>

                        <div class="row">
                            <div class="col-6">
                                <label>Meal Plan</label>
                                <select  onchange="loadprices()" class="form-control " id="meal_plan_">
                                    <option>Select</option>
                                    <option>FB</option>
                                    <option>HB</option>
                                    <option>BB</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Price Rate</label>
                                <select class="form-control"  id="price_rate">
                                <!-- <option>Select</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm "  onclick="update_booked_rooms()" id="changRoom"><i class="fa fa-check-circle"></i> Save</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


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

    function addGuests_d(btn) {
        $('#savebtnGuests').show()


        gRows = "<tr class='new-guest'>";
        gRows += "<td><input value='' style='text-transform: capitalize;' /></td>";
        gRows += "<td><input value='' /></td>";

        gRows += "<td><input value = '' type='email' data-input= 'email' data-invalid-message='invalid email'/></td>";
        gRows += "<td><input value=''  </td>";
        gRows += "<td><input value=''  </td>";

        gRows += "<td style='width:30px' title='remove row' onclick='remove_r(this)'><a class='fa fa-times btn-circle'></a></td>"

        gRows += "</tr>";






        $("#d-tb-guests tbody").append(gRows);

        var f = $("#d-tb-guests tbody tr").length;
        var g = $('.d-guests').text()
        if (f >= parseInt(g)) {
            $('#addnewguest').hide()


        }

    }

    function remove_r(element) {
        $(element).parents("tr").remove();
        var f = $("#d-tb-guests tbody tr").length;
        var g = $('.d-guests').text()
        if (f < parseInt(g)) {
            $('#addnewguest').show()
            $('#savebtnGuests').hide()
        }
    }




    $('#savebtnGuests').on('click', function() {


        var c = new Array();

        $("#d-tb-guests tbody tr").each(function(i, tr) {

            if ($(tr).hasClass('new-guest')) {
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
                        id_number: idNumber,
                        booking_id: getBookingId(),

                    };

                }
            }

        })


        if (c.length < 1) {
            alertify.error("<i class='fa fa-times-circle'></i> Add 1 or more guests to save");

        } else {
            $.post("src/xhr.php", {
                action: "add guest",
                guests: JSON.stringify(c)
            }, function(data) {
                alertify.alert('<i class="fa fa-check-circle txt-green"></i> New Guests', 'Your new Guests have been added ',
                    function() {

                    });

            });
        }

    })


    function addPayment(btn) {
        //    alert(0)

        if (!($(btn).hasClass("loading"))) {
            var btnHtml = $(btn).html();
            $(btn).addClass("loading");
            $(btn).html("<i class='fa fa-spin fa-spinner'></i> Saving...");

            var amt = $(".input-price [name=amount]").val();
            var date = $(".input-price [name=date]").val();
            var ptm = $(".input-price #paymemt_mtd option:selected").val();
            if (amt == "") {
                errorMSG(".input-price .input-group", "Input Amount")
            } else if (ptm == "") {
                errorMSG(".input-price #paymemt_mtd", "choose payment method")

            } else {

                var amount = $(".input-price [name=amount]").val()
                var date = $(".input-price [name=date]").val()
                var payment_method = $(".input-price #paymemt_mtd").val()
                $.post("src/xhr.php", {
                    action: "add payment",
                    amount: amount,
                    booking_id: getBookingId(),
                    date: date,
                    payment_method: payment_method
                }, function(data) {
                    //                    alert(data);
                    $(btn).removeClass("loading");
                    $(btn).html(btnHtml);
                    $(".input-price [name=amount]").val("");
                    $(".input-price [name=date]").val("");
                    $(".input-price").toggleClass('hide');
                    var p = JSON.parse(data);
                    setTotalPaid(getTotalPaid() + parseFloat(p.amount));
                    getBalance();

                    var r = "<tr><td>" + p.date + "</td><td>" + p.payment_method + "</td><td>$" + p.amount + "</td></tr>";
                    //alert(p.payment_method)
                    //if(p.payment_method!="method"){

                    $("#d-tb-payments").append(r);
                    //}

                })
            }
        }
    }



    





    function getBalance() {
        var p = $('#booking-details');
        /* var bal = (parseFloat($("#d-total-cost").text()) + parseFloat($("#d-taxes").text()) -parseFloat($("#d-total-paid").text()));
         $("#d-balance").text(bal);*/


        cost = p.find("#d-s-total").text(); //d-total-cost
        discount = p.find("#d-discount").text(); //d-total-cost



        total_paid = p.find("#d-total-paid").text();

        total_taxes = 0;

        total_taxes = p.find("#d-taxes").text();


        p.find("#d-total-cost").html(Math.round(parseInt(cost) + parseFloat(total_taxes) - parseInt(discount))); //d-total-cost
        //alert(discount);

        var bal = parseInt(cost) + parseFloat(total_taxes) - parseInt(total_paid)
        p.find("#d-balance").text(bal);



        $('.d-balance').text(bal);

        // p.find("#d-balance").text(parseInt(b.cost) + total_taxes - parseInt(b.total_paid));
        return bal;
    }

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
            var opt='<option>Select</option>';

            //alert(JSON.stringify(rooms_[0].rooms));
            $.each(rooms_[0].rooms, function(i, item) {
            //"id":"50","name":"G1
            opt+="<option value=\""+item.id+ "\">"+item.name+"</option>";

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
        tr = $(context).parent().parent().parent().find(".new_row");



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

                    total = 0;

                    gRows = "";
                    extras_temp_array = [];

                    $.each(JSON.parse(data), function(i, g) {


                        extras_temp_array.push(g.extra_id);

                        gRows += "<tr>";
                        gRows += "<td>" + g.extra_name + "</td>";
                        gRows += "<td class='guests'>" + g.total_guests + "</td>";
                        gRows += "<td class='unit_price' >" + g.unit_price + "</td>";
                        gRows += "<td class='total' >" + Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price)) + "</td>";
                        gRows += "<td>" + "<i  id='edit' onclick='editExtra(this,\"" + g.id + "\")' class=\"fa fa-pencil btn-circle\"></i><i onclick='deleteExtra(\"" + g.id + "\")' class=\"fa fa-close btn-circle text-danger\"></i>" + "</td>";

                        gRows += "</tr>";

                        total += Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price));

                    })


                    sub_total = parseFloat($('#sub_ttl').val()) + total;

                    $('#booking-details').find("#d-s-total").text(Math.round(sub_total));


                    booking_id = getBookingId();


                    taxable_amount= sub_total-total;

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
        alertify.confirm("Delete Extra", "Are you sure you want to delete this extra?",
            function() {
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
                                gRows += "<td>" + "<i id='edit'  onclick='editExtra(this,\"" + g.id + "\")' class=\"fa fa-pencil btn-circle\"></i><i onclick='deleteExtra(\"" + g.id + "\")' class=\"fa fa-close btn-circle text-danger\"></i>" + "</td>";
                                gRows += "</tr>";

                                total += Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price));

                            })

                            sub_total = parseFloat($('#sub_ttl').val()) + total;
                            $('#booking-details').find("#d-s-total").text(Math.round(sub_total));

                            taxable_amount = sub_total- total;
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

            },
            function() {
                alertify.error('Cancelled');
            });
    }


     function updatePhone(context){
            phone =$(context).val();
            if(phone.length!=0){

            var data = JSON.stringify({
            phone: phone   
            });
            
            $.post("src/update.php", {
                     "col_id":  "booking_id",
                    "reference":  getBookingId(),
                    "page": "native",
                    "result": data,
                     "table": "guests_tb"
                }, function(response) {
                

                    if(response==="success"){
                          alertify.success('Phone successfully  updated!');
                        
                    }

                }

                );
            }
             
    }



    function updateEmail(context){
             
            email =$(context).val();

            if(email.length!=0){
               
                var data = JSON.stringify({
                email: email   
                });
            
                $.post("src/update.php", {
                     "col_id":  "booking_id",
                    "reference":  getBookingId(),
                    "page": "native",
                    "result": data,
                     "table": "guests_tb"
                }, function(response) {
                

                    if(response==="success"){

                         alertify.success('Email successfully  updated!');

                    }

                }

                );

            }
           


    }

    function updateName(context){
              name =$(context).val();
             if(name.length!=0){   
              
               var data = JSON.stringify({
                 name: name   
               });
            
               $.post("src/update.php", {
                     "col_id":  "booking_id",
                    "reference":  getBookingId(),
                    "page": "native",
                    "result": data,
                     "table": "guests_tb"
                }, function(response) {
                

                    if(response==="success"){

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
                            gRows += "<td>" + "<i id='edit'  onclick='editExtra(this,\"" + g.id + "\")' class=\"fa fa-pencil btn-circle\"></i><i onclick='deleteExtra(\"" + g.id + "\")' class=\"fa fa-close btn-circle text-danger\"></i>" + "</td>";

                            gRows += "</tr>";

                            total += Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price));

                        })

                        sub_total = parseFloat($('#sub_ttl').val()) + total;

                        $('#booking-details').find("#d-s-total").text(Math.round(sub_total));
                        
                        taxable_amount= sub_total-total;

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

            var name = $(context).html();
            var price = $(context).attr("data-price");
            gRows = "";
            gRows += "<tr class='new_row'>";
            gRows += "<td class='name' >" + name + "</td>";

            select_html = "<select  class='guests tiny' id=\"" + id + "\" onchange=\"calculateTotal(this)\" >";
            var p = $('#booking-details');
            guests = p.find("#d-guest-count").html();
            guests = guests.replace("(", "");
            guests = guests.replace(")", "");
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

    function send_mail(template_id) {


        var balance = $("#d-balance").text();
        var room_type = "";

        $('#booking-details #d-tb-rooms tbody').each(function(i, tr) {
            room_type = $(tr).find("td:eq(0)").text();

        });

        var guest_no = $('#d-guest-count').text();
        guest_no = guest_no.match(/\d+/)[0];


        var totalCost = $("#d-total-cost").text(),
            totalPaid = $("#d-total-paid").text(),
            //paymentMethod = $("#paymemt_mtd").val(),
            bookingStatus = $("#d-status").text(),
            checkin = $("#d-check-in").val(),
            checkout = $("#d-check-out").val(),
            temp_id = template_id; //$('#sel-email-template option:selected').val(),
        guest_email = $("#d-email").val(),
            guest_name = $("#d-name").val();







        $.ajax({
            url: 'src/sendmail.php',
            type: 'GET',
            data: {
                'email_type': "later",
                booking_status: bookingStatus,
                check_in_date: checkin,
                check_out_date: checkout,
                cost: totalCost,
                totalPaid: totalPaid,
                balance: balance,
                booking_date: "<?php echo date('Y-m-d h:m:s')?>",
                guest_name: guest_name,
                guest_no: guest_no,
                guest_email: guest_email,
                temp_id: temp_id,
                room_type: room_type

            },
            success: function(result) {
                alertify.success('Email successfully sent!');
                $('#email-modal').hide();
            },
            error: function(xhr, ajaxoptions, thrownerror) {}
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




    function changeMessage(v) {

        var data = {
            description: v
        }

        $.post("src/update.php", {
            page: "booking",
            "reference": getBookingId(),
            result: JSON.stringify(data)
        }, function(response) {
            //alert(response);
            alertify
                .alert("Description  Edited Succesfully", function() {
                    // alertify.message('OK');
                    //                        window.location.reload();
                });

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



    function some_change(){

        get_freerooms();
        loadprices();
    }


    function loadprices(){


        
        var property_id =$("#properties_edit").val();

        var room_type_id =  $("#roomtypes_").val();

        var check_in =$("#check_in_date_").val();
        var check_out= $("#check_out_date_").val();

        var meal_plan= $('#meal_plan_').val();

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

        var opt="<option>Select</option>";

        $.each(prices, function(i, item) {
    
        opt= opt + "<option value='"+item.amount+ "' >"+item.label+"</option>";

        });

        $('#price_rate').html(opt);


        })

        //$(".chosen").trigger("chosen:updated");



    }

    /*editing Rooms*/
    function editRoom(btn) {
        $("#edit-room .modal-title small").text("Edit Room Details");
       
        $("#edit-room").modal("show"); //data-t_id

        var tr_id= $(btn).parent().parent().parent().find("#etr_id").attr("data-t_id");
         var i= $(btn).parent().parent().parent().find("#etr_id").attr("data-b_id");

        //alert(tr_id);//data-b_id
         $("#b_id").val(i);

        $("#record_id").val(tr_id);

         var property_id= $(btn).parent().parent().find("#ep_id").attr("data-property_id");

        var room_type_id= $(btn).parent().parent().find("#ermtype_id").attr("data-room_type_id");

        var check_in= $(btn).parent().parent().find("#check_in_dateE").html();
        var check_out= $(btn).parent().parent().find("#check_out_dateE").html();

        var meal_plan=$(btn).parent().parent().find(".meal_plan").html();

        $("#properties_edit").val(property_id);

        getRoomTypesForEdit(property_id,room_type_id);

        $("#check_in_date_").val(check_in);
        $("#check_out_date_").val(check_out);

       // $('#meal_plan_').val(meal_plan);


          $.post('src/get_data.php', {
            token: "free rooms",
            property_id: property_id,
            check_in: check_in,
            check_out: check_out,
            room_type_id: room_type_id

        }, function(data) {
            //alert(data)
            var rooms_ = JSON.parse(data)

            var opt="<option>Select</option>";

           
            $.each(rooms_[0].rooms, function(i, item) {
            //"id":"50","name":"G1

             //alert(JSON.stringify(item));
            opt+= "<option value='"+item.id+ "' >"+item.name+"<option>";

            });

            $('#free_rooms').html(opt);


        })

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

            var opt="<option>Select</option>";

            $.each(prices, function(i, item) {
        
            opt+="<option value='"+item.amount+ "' >"+item.label+"<option>";

            });

            $('#price_rate').html(opt);
         
             });
           //$(".chosen").chosen({ width:"110%", disable_search_threshold:10 });
            
        ///set the form elements with data
    }


   function update_booked_rooms(){

         var b_id= $("#b_id").val()
        var property_id =$("#properties_edit").val();

        var room_type_id =  $("#roomtypes_").val();

        var room_id =  $("#free_rooms").val();

        var check_in =$("#check_in_date_").val();
        var check_out= $("#check_out_date_").val();

        var meal_plan= $('#meal_plan_').val();

        var price_rate=$('#price_rate').val();

        var price_name=$('#price_rate option:selected').text();

        var booking_id= getBookingId();

        var record_id= $("#record_id").val();

        
        if(meal_plan!=='Select' && price_rate !=='Select' && room_id !=="Select" && check_in.length!=0 && check_out.length!=0 ){

          
           $.post('src/xhr.php', {

        action: "change_room_",
        record_id :record_id,
        booking_id: booking_id,
        property_id: property_id,
        check_in: check_in,
        check_out: check_out,
        room_type_id: room_type_id,
        room_id: room_id,
        price_rate: price_rate,
        price_name:price_name,
        meal_plan: meal_plan

        }, function(data) {
       
         location.reload();
       // alert(data)

        
        //showDetails(b_id);

       // alert(b_id);
        
       


        });

        }else{
        

        alertify.error("<i class='fa fa-times-circle'></i> Provide all the required information ");


        }

        /*
        alert(record_id+" "+booking_id+" "+property_id+" "+room_type_id+" "+room_id+" "+check_in+" "+check_out+" "+meal_plan+" "+price_rate +" "+price_name );
        */
       

       

   //$(".chosen").trigger("chosen:updated");


   }

    function getRoomTypesForEdit_() {
        var property_id =$("#properties_edit").val();
    // alert(1)
        var sel = $("#roomtypes_");
        sel.prop("disabled", true);

        $.post('src/get_data.php', {
        token: "roomtypes",
        property_id: property_id
        }, function(data) {
        var o = "<option>Select</option>";
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

    function getRoomTypesForEdit(property_id,room_type_id) {

    // alert(1)
        var sel = $("#roomtypes_");
        sel.prop("disabled", true);

        $.post('src/get_data.php', {
        token: "roomtypes",
        property_id: property_id
        }, function(data) {
        var o = "<option>Select</option>";
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
        
        $("#edit-room .modal-title small").text("Add Accomodation");
        $("#edit-room .modal-title .form-control").val("");
        $("#edit-room").modal("show");
    }

</script>
