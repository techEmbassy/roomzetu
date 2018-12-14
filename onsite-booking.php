<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">



    <?php
require_once 'src/meekrodb.php';
DB::$user = 'root';
DB::$password = 'root';
DB::$dbName = 'reservations_db';

 

$company_id = 26;






 $p = DB::query("SELECT * FROM property_tb WHERE company_id = %i", $company_id);
 $propertyOptions = "<option value=0> All Properties</option>";

foreach($p as $o){
    
    $propertyOptions .="<option value='".$o['id']."'>".$o['property_name']."</option>";
};


?>


        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.css?v=999" rel="stylesheet" type="text/css" />
        <link href="css/custom.css?v=<?php echo time()?>" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/text-color.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="calendar/css/calendar.css?v=<?php echo time()?>" rel="stylesheet" type="text/css" />
        <link href="css/settings.css?v=<?php echo time()?>" rel="stylesheet" type="text/css" />
        <link href="css/loader.css" rel="stylesheet" type="text/css" />
        <link href="css/validate.css?v=99" rel="stylesheet" type="text/css" />
        <link href="alertifyjs/css/alertify.min.css" rel="stylesheet" type="text/css" />
        <link href="alertifyjs/css/themes/default.css" rel="stylesheet" type="text/css" />

        <style type="text/css">


        </style>
        <script src="js/jquery.min.js"></script>
        <script src="js/custom.js?v=00"></script>

        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/fixedtablehead.js?v=222"></script>
        <script src="js/validate.js?v=23"></script>
        <script src="alertifyjs/alertify.min.js"></script>





</head>


<body class="gray">


    <style>
        #tb-free-rooms td .form-control {
            border: 1px solid #eee;
        }
        
        .table tr.selected td b {
            color: green
        }
        
        tr.selected .btn {
            background: #494;
            color: #fff !important;
        }

    </style>



    <div class="modale animated FadeIn" id="new-booking">
        <div role="document">
            <div class="modal-content">

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
                                        <input class="datepicker form-control" id="check-in" required data-empty-message="select check-in date" />
                                    </div>

                                    <div class="col-md-12">
                                        <label>Check Out</label>
                                        <input class="datepicker form-control" id="check-out" placeholder="" required data-empty-message="select check-out date" />
                                    </div>


                                    <div class="col-md-12 mt-3">

                                        <button onclick="getFreeRooms()" class="btn btn-outline-success btn-sm "><i class="fa fa-refresh "></i> Load Rooms</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9 p-1 c-body" style="height:70vh; background:#f0f0f0">


                                <table class="table table-bordered table-bookings" id="tb-free-rooms">

                                </table>
                            </div>
                        </div>

                        <button class="next hide" onclick="setRooms(this)">send</button>
                    </div>
                    <div class="step-item">
                        <div class="c-body" style="height:70vh; overflow-x:hidden">
                            <div class="row">

                                <div class="col-md-12 pt-2">

                                    <h5>Guests</h5>
                                    <p><input value="1" id='num-guests' type="number" class="form-control tiny" style="width:60px" min='1' />
                                        <button class="btn btn-sm btn-secondary" onclick="addGuests(this)">Add Guests</button></p>
                                    <br/>
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
                                            <tr>
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
                                <div class="row">
                                    <div class="col-md-10">
                                        <label><b>Message</b></label>
                                        <textarea class="form-control" placeholder="client message here" rows="3" id="s-message"></textarea><br>
                                    </div>

                                    <!--
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label><b>Reservation Status</b></label>
                                            <select class="form-control" id="s-status">
                                    <option value="confirmed">Confirmed</option>
                                    <option value="unconfirmed">Not Confirmed</option>
                                    <option value="check-in">In House</option>
                                    </select>
                                        </div>

                                    </div>
-->
                                </div>

                                <p><b>Extras & Services</b></p>

                                <table class="table table-bordered table-editable" id="tb-extras">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Adon</th>
                                            <th>Price per guest</th>
                                            <th>Number of guests</th>
                                            <th>Total Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>



                                </table>
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
                                <label>Cost of extras & Services: 
                        </label><br>
                                <h6>$<span id="s-total-cost-extras">0</span></h6>


                                <label>Cost of room(s) for <span id="s-total-night">0 nights</span>: 
                        </label><br>
                                <h6>$<span id="s-total-cost-rooms">0</span></h6>

                                <label><b>Total cost</b>: 
                        </label><br>
                                <h5 class="price">$<span id="s-total-cost-all">0</span></h5>


                                <!--
                                <label><b>Total Paid</b></label><label class="pull-right"><b>Payment Method</b></label><br>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" class="form-control tiny" value="0" placeholder="enter a figure" id="s-total-paid" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select class="form-control tiny " id="paymemt_mtd">
                    <option>Cash</option><option>Cheque</option>
                </select>
                                </div>
-->
                                <a class="btn btn-primary btn-md next hide" onclick="addReservation()">Next</a>

                            </div>
                        </div>
                    </div>

                    <!--
                <div class="step-item">
                    <div class="row">
                        <div class="col-md-8 p-3">

                            <table class="table table-bordered ">
                                
                            </table>
                        </div>

                        <div class="col-md-4">
                            
                            <a class="btn btn-primary btn-md next hide" onclick="gotoStep(3)">Next</a>
                        </div>
                    </div>
                </div>
-->
                </div>
                <div class="modal-footer">


                    <button type="button" class="btn btn-primary pull-left btn-sm" style="" onclick="gotoStep(-1)"><i class="fa fa-angle-left"></i> Back</button>
                    <!--                    <button type="button" class="btn btn-secondary pull-left btn-sm " style="" data-dismiss="modal">Cancel</button>-->
                    <button type="button" class="btn btn-primary btn-next btn-sm" onclick="clickNext(1)">Next <i class="fa fa-angle-right"></i></button>
                </div>

            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
        var sr = "";
        var tr = "";
        var company_id = "<?php echo $company_id; ?>";

        //getFreeRooms();

        //    getProperties();
        getRoomTypes()

        getAllExtras()

        $(function() {
            var bsdate = "<?php echo $_GET['bsdate'];?>";
            var bedate = "<?php echo $_GET['bedate'];?>";
            $("#check-in").val(bsdate)
            $("#check-out").val(bedate);
            getFreeRooms()
        })





        $("#tb-free-rooms").html("<tr><td>Load Free Rooms</td></tr>");

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

        function getFreeRooms() {
            if (!inputsEmpty("#form-load-rooms")) {
                var checkIn = $("#check-in").val();
                var checkOut = $("#check-out").val();
                var pId = $(".p-class #properties option:selected").val();
                var rtId = $("#roomtypes option:selected").val();

                var nights = new Date(checkOut) - new Date(checkIn);
                nights = nights / 1000 / 3600 / 24;

                //            var propertyId = $("#properties option:selected").val()

                //            alert(rtId)

                var ddd = new Date(checkIn) - new Date(gettoday())

                if (ddd < 0) {
                    errorMSG("#check-in", "this date should start from today to the future");
                } else {
                    if (nights > 0) {
                        setNights(nights);
                        setPropertyId(pId);
                        setCheckIn(checkIn);
                        setCheckOut(checkOut);

                        //                alert(checkIn);


                        // alert(getNights())
                        $.post('src/onsite_get_data.php', {
                            token: "free rooms",
                            company_id: company_id,
                            property_id: pId,
                            room_type_id: rtId,
                            check_in: checkIn,
                            check_out: checkOut
                        }, function(data) {
                            //                            alert(data);
                            setFreeRooms(data);
                        })
                    } else {
                        errorMSG("#check-out", "this date should be greater than check-in");
                    }
                }
            }

        }







        ///load all extras
        function getAllExtras() {
            $.post('src/onsite_get_data.php', {
                token: "extras",
                company_id: company_id
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





        function getRoomTypes() {

            //        alert(1)
            var sel = $("#roomtypes");
            sel.prop("disabled", true);

            // alert(2);
            //tinyloader("#room-loader", "");

            var property_id = $(".p-class #properties option:selected").val();


            $.post('src/onsite_get_data.php', {
                token: "roomtypes",
                company_id: company_id,
                property_id: property_id
            }, function(data) {
                var o = "<option value='0'>All room types</option>";
                //                alert(data)
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
            var table = $("#tb-free-rooms");
            //        alert(data)
            table.html("<tr><td><h6><i class='fa fa-spinner fa-spin'></i> Loading available rooms...</h6></td></tr>")
            var rooms = JSON.parse(data);
            var rows = "";


            $.each(rooms, function(i, room) {
                var subTotal = parseInt(room.prices[0]['amount']) * getNights();
                var selNights = parseInt(getNights()) == 1 ? "1 night" : getNights() + " nights";
                var freerooms = room.rooms;

                var alertType = freerooms.length >= 3 ? "alert-success" : "alert-warning";

                rows += "<tr class='room-row'>";
                rows += "<td>";
                rows += "<div class='container-fluid'>";
                rows += "<input type='hidden' value='" + i + "' class='position'>";
                rows += "<h5><b>" + room.name + " </b> <label> (" + room.property_name + ")</label></h5>";
                rows += "<p> - " + room.number_of_beds + " beds (" + room.bed_size + ")</p>";

                $.each(JSON.parse(room.specifications), function(k, s) { //stored as json string id db
                    rows += "<p>- " + s + "</p>";
                })

                rows += "<hr class='mt-1 mb-2'>";
                rows += "<p> Adults: " + room.maximum_guests_adults + " ,  Children: " + room.maximum_guests_children + "</p>";
                rows += "</div>";
                rows += "</td>";

                rows += "<td>";
                rows += "<div class='container-fluid'>";
                rows += "<label>Price Rate</label>";
                rows += "<h6><select class='form-control rm-prices' onchange='changeUnitPrice(this)'>";

                $.each(room.prices, function(j, roomprice) {
                    rows += "<option value='" + roomprice.amount + "'>" + roomprice.label + "</option>";
                });

                rows += "</select>";
                rows += "<br><br><span><span class='price'>$<span id='unit-price'>" + room.prices[0]['amount'] + "</span></span> per night</span>";
                rows += "</h6>";
                rows += "<br><br>";
                rows += "<p class='alert " + alertType + " p-1'>Available Rooms : <b class='free-room-count'>" + freerooms.length + "</b></p>";
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
                rows += "<h5>Total Cost: <span class='text-orange'>$<span class='sub-total'>" + subTotal + "</span></span></h5><h6><span class='selected-rooms'>1 room</span> for <span class='selected-nights'>" + selNights + "<span></h6>";
                rows += "<input type='hidden' class='subtotal'/><br>";
                rows += "<button class='btn btn-default btn-md' onclick='select(this)'><i class='fa fa-check-circle fa-2x'></i></button>";
                rows += "</div>";
                rows += "</td>";

                rows += "</tr>";
            });

            rows = rows == "" ? "<tr><td><h4 class='text-light'>No Free Rooms For Selection</h4></td></tr>" : rows;
            table.html(rows);


        }

        function select(btn) { //new  mark selected room
            alertify.dismissAll();
            var btn = $(btn),
                tr = btn.parents("tr.room-row");
            if (tr.hasClass('selected')) {
                tr.removeClass('selected');
                alertify.warning("<i class='fa fa-times-circle'></i> Removed from list")
            } else {
                tr.addClass('selected');
                alertify.success("<i class='fa fa-check-circle'></i> Added to list")

            }

        }

        function setSubtotal(el) {
            //subtotal on amount
            var p = $(el).parents("tr"),
                subTotalBox = p.find('.sub-total'),
                subTotalInput = p.find('.subtotal'),


                px = p.find(".rm-prices option:selected").val(),
                rooms = p.find(".rm-count option:selected").val(),
                total = parseInt(getNights()) * parseInt(rooms) * parseInt(px);

            subTotalBox.text(total);
            subTotalInput.val(total);

            var rms__ = rooms == 1 ? "1 room" : rooms + " rooms";
            p.find(".selected-rooms").text(rms__);

            sr = parseInt(getNights()) * parseInt(px);
            tr = sr * parseInt(rooms);
        }

        function changeUnitPrice(sel) {

            var opt = $(sel);
            var priceBox = opt.parent().find("#unit-price");
            var unitpx = opt.find("option:selected").val();

            priceBox.text(unitpx);
            setSubtotal(sel);
        }

        function changeRoomCount(sel) {
            setSubtotal(sel);
        }

        var gRow = $("#tb-guests tbody").html();

        function addGuests(btn) {
            var p = $(btn).parent(),
                count = p.find('input').val();
            var rows = "";
            // alert(gRow)
            for (var i = 0; i < count; i++) {
                rows += gRow;
            }
            $("#tb-guests tbody").append(rows);

        }

        function remove(element) {
            $(element).parents("tr").remove();
        }


        function addReservation() {


            //        alert(rt_id)
            var totalCost = $("#s-total-cost-all").text(),
                totalPaid = 0,
                paymentMethod = 0,
                bookingStatus = 'unconfirmed',
                message = $("#s-message").val();

            //        var room_type_id = $("#roomtypes").val();
            var room_type_id = getRooms()[0]['room_type_id']


            var r = JSON.stringify({
                property_id: getPropertyId(),
                room_type_id: room_type_id,
                check_in_date: getCheckIn(),
                check_out_date: getCheckOut(),
                cost: totalCost,
                booking_status: bookingStatus,
                description: message,
                booking_source: 'online',
                agent_id: "0",
                booking_date: "<?php echo date('Y-m-d h:m:s')?>",
                total_paid: totalPaid,
                payment_method: paymentMethod
            });
            //        alert(r)
            var g = JSON.stringify(getGuests());
            var e = JSON.stringify(getExtras());
            var rms = JSON.stringify(getRooms());
            $.post("src/onsite_get_data.php", {
                token: "add reservation",
                company_id: company_id,
                main_data: r,
                guests: g,
                extras: e,
                rooms: rms
            }, function(data) {
                //                alert(data)
                alertify.alert('<i class="fa fa-check-circle txt-green"></i> DONE', 'Reservation created successfully',
                    function() {
                        /*load saved reservation*/
                        $("#new-booking").modal("hide")

                        location.reload();
                    });

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

            $("#tb-free-rooms tr.selected").each(function(j, tr) {
                var position = parseInt($(tr).find(".position").val());
                var rms = $(tr).find(".rm-count option:selected").val();
                var price = $(tr).find(".rm-prices option:selected").val();
                var pricerate_ = $(tr).find(".rm-prices option:selected").text();

                var a = new Array();
                var rtId = freeRms[position].id //roomtype id;
                var rooms = freeRms[position].rooms;
                var propid = freeRms[position].property_id;
                setPropertyId(propid)
                //get room equal to the selected rooms
                for (var r = 0; r < rms; r++) {
                    var id_ = rooms[r].id;
                    var name__ = rooms[r].name;
                    c[r] = {
                        room_type_id: rtId,
                        room_id: id_,
                        price_per_night: price,
                        price_rate: pricerate_
                    };
                }
                //c=rooms;



            })

            roomsArray_ = c;
            //alert(JSON.stringify(roomsArray_));
            if (c.length < 1) {
                alertify.error("<i class='fa fa-times-circle'></i> Select one or more rooms first");

            } else {
                gotoStep(1);
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






        function setGuests() {


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

            } else {

                setSummary();
                gotoStep(1);
            }
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
            var guestPrefix = "";
            var bookingSource = 'online';



            //alert(getGuests().length)

            $("#s-check-in").html(getCheckIn())
            $("#s-check-out").html(getCheckOut())
            $("#s-source").text(bookingSource);
            $("#s-agent").text(bookingSource);
            $("#s-nights").html("<b>Nights</b> <br>" + getNights());

            if (getGuests().length > 1) {
                guestPrefix = " + " + (getGuests().length - 1);
            }
            $("#s-guests").html(getGuests()[0]["name"] + guestPrefix);
            $("#s-rooms").html(getRooms().length);





            //guests drop downs in extras table
            $("#tb-extras tbody tr").each(function(i, tr) {

                var select = "<select class='form-control' onchange='setExtrasSubTotal(this)'>";
                for (var i = getGuests().length; i >= 1; i--) {
                    select += "<option value='" + i + "'>" + i + "</option>";
                }
                select += "</select>";

                var extraUnitPrice = parseFloat($(tr).find("td:eq(2) select option:selected").val());

                $(tr).find("td:eq(3)").html(select);
                $(tr).find("td:eq(4) #extra-subtotal").html(getGuests().length * extraUnitPrice);




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

            $(el).parents("tr").find("td:eq(4) #extra-subtotal").html(numGuests * unitpx);
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

            var totalAll = totalExtras + parseFloat(totalRoomsBox.text());

            totalAllBox.text(totalAll);


        }

    </script>










</body>




<?php include 'includes/footer.php';?>
