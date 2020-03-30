<style>
    .steps-w {
            height: 70vh;
            width: 96%;
            margin: auto;
            position: relative;
        }

        .steps-w .step-item {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: none;
        }

        .steps-w .step-item.active {
            display: block;
        }

    </style>

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

</style>

<?php include 'new-agent.php'; ?>


<div class="modal animated FadeIn" id="new-walk-in">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">

                    <small>New Booking- Walk In</small>

                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0 pb-0 steps-w">
                <div class=" step-item active">
                    <div class="row">
                        <div class="col-md-3 border-right pb-2" id="form-load-rooms-w">
                            <div class="row">
                                <div class="col-md-12 p-class">
                                    <label>Property</label>
                                    <select class="form-control" id="properties-w">
                                        <?php echo $propertyOptions;?>
                                    </select>

                                </div>



                                <div class="col-md-12">
                                    <label>Check In</label>
                                    <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="check-in-w" required data-empty-message="select check-in date" data-placement="right" />
                                </div>

                                <div class="col-md-12">
                                    <label>Check Out</label>
                                    <input class="datepicker form-control" id="check-out-w" placeholder="" required data-empty-message="select check-out date" data-placement="right" />
                                </div>



                            </div>
                        </div>

                        <div class="col-md-9 p-3 c-body" style="height:70vh; overflow-x:hidden">
                            <div class="row">


                                <div class="col-md-3">
                                    <label>Booking name</label>
                                    <input class="form-control" id="booking-name-w" onfocus="bookingNameFocus()" data-placement="right" />

                                </div>


                                <div class="col-md-3">

                                    <label>Expected Guests</label>
                                    <input class="form-control" data-placement="right" value="1" id='exp-num-guests-w' type="number" min='1' />






                                </div>



                                <div class="col-md-12 pt-2">
                                    <hr />


                                    <div class=" row">

                                        <div class="col-md-6">

                                            <h5>Guests Details</h5>
                                            <p><input value="1" id='num-guests-w' type="number" class="form-control tiny" style="width:60px" min='1' />
                                                <button class="btn btn-35 btn-secondary" onclick="addGuests_w(this)">Add Guests Details</button></p>
                                        </div>
                                    </div>





                                    <br />
                                    <table class="table table-bordered table-editable" id="tb-guests-w">
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
                                            <tr id="guest-details-w">
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
                                    <a class="btn btn-primary btn-md next hide " onclick="setGuests_w()">Next</a>
                                </div>
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
                                    <textarea class="form-control" placeholder="client message here" rows="3" id="s-message-w"></textarea><br>
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
                                    <table class="table table-bordered table-editable" id="tb-extras-w">
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
                                    <select class="form-control" id="s-status-w">
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
                                    <td id="s-check-in-w"></td>
                                    <td rowspan="2" class="valign-middle text-center" id="s-nights-w"> </td>
                                </tr>

                                <tr>
                                    <td>Check Out</td>
                                    <td id="s-check-out-w"></td>
                                </tr>

                                <tr>
                                    <td>Guests</td>
                                    <td colspan="2" id="s-guests-w"></td>
                                </tr>


                                <tr>
                                    <td>Source</td>
                                    <td colspan="2">walk in</td>
                                </tr>
                            </table>


                            <p class="mt-2"><span style="font-size:14px">Cost of extra Services:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$<span id="s-total-cost-extras-w">0</span></b>
                                </span>
                            </p>

                            <p class="mt-2"><span style="font-size:14px">Cost of Room(s) Booked: &nbsp;&nbsp;&nbsp;&nbsp; <b>$<span id="s-total-cost-rooms-w">0</span></b>
                                </span>
                            </p>

                            <p class="mt-2"><span style="font-size:14px">Total Cost:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$<span id="s-total-cost-all-w">0</span></b>
                                </span>
                            </p>


                            <a class="btn btn-primary btn-md next hide" onclick="gotoStepAnother_w();">Create Booking</a>


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
                                            <input type="text" class="form-control" onkeyup="change_discount_w(value,this)" onkeypress="return isNumber(event)" aria-label="Text input with dropdown button" placeholder="0">
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

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Amount paid </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control" onkeyup="change_total_paid_w(value)" onkeypress="return isNumber(event)" aria-label="Amount (to the nearest dollar)" placeholder="0">
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
                                                    <select class="form-control" id="paymemt_mtd-w">
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
                                                <input type="text" class="form-control " placeholder="enter Reference #" id="reference-number-w">
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
                                    <div class="col-md-8" id="taxes_list-w">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1-w" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1-w">VAT(18%)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2-w" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2-w">WHT(3%)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3-w" value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3-w">other taxes</label>
                                        </div>

                                    </div>




                                </div>


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
                                                    <td id="ds-rooms-w"> 0</td>

                                                </tr>

                                                <tr>
                                                    <td> Total Nights </td>
                                                    <td id="ds-nights-w">0 </td>

                                                </tr>

                                                <tr>
                                                    <td> Guests Number </td>
                                                    <td id="ds-guests-w"> 0</td>

                                                </tr>

                                                <tr>
                                                    <!--                                                    <div class="col-md-10">-->
                                                    <table class="table table-bordered p-3" style="background-color:#f8f9fa">
                                                        <thead class="thead-dark">
                                                            <th class="border-right-0">Check-in Date</th>
                                                            <th>Check-out Date</th>
                                                        </thead>
                                                        <tr>
                                                            <td id="ds-check-in-w"></td>
                                                            <td id="ds-check-out-w"></td>

                                                        </tr>

                                                    </table>

                                                    <table class="table table-bordered p-3" style="background-color:#f8f9fa">
                                                        <thead class="thead-dark">
                                                            <th class="border-right-0">Total</th>
                                                            <th>Discount</th>
                                                            <th>Amount Paid</th>
                                                        </thead>
                                                        <tr>
                                                            <td id='ds-total-cost-all-w'>0</td>
                                                            <td id="ds-discount-w">0</td>
                                                            <td id="ds-total-paid-w">0</td>

                                                        </tr>

                                                    </table>


                                                </tr>


                                                <!-- /tr -->
                                            </tbody>
                                            <!-- /tbody -->
                                        </table>
                                        <!-- /.table -->


                                        <div class="col-md-10">
                                            <h5 style="font-size:18px; color:green">Outstanding: $ <a id="ds-balance-w"></a></h5>
                                        </div>


                                    </div>
                                    <!-- /.table-responsive -->
                                </section>

                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-md next hide" onclick="addReservation_w(this)"> Finish</button>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-danger btn-sm " style="" id="email-not" onclick="email_not()"> email not</button>-->
                <button type="button" class="btn btn-danger " style="" data-toggle="modal" data-target="#preview-invoice-w" onclick=" setInvoiceClient()" id="btn-preview-invoice-w"> preview invoice</button>
                <button type="button" class="btn btn-primary pull-left" style="" onclick="gotoStep_w(-1)"><i class="fa fa-angle-left"></i> Back</button>
                <button type="button" class="btn btn-secondary pull-left  " style="" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-next-w " onclick="clickNext_w(1)">Next <i class="fa fa-angle-right"></i></button>
            </div>

        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





<script>
    $('#btn-preview-invoice-w').hide();
    $('#email-not-w').hide();
    $("#reference-number-w").hide();
    getAllExtras_w();


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

    function gotoStep_w(num) {
        //    alert(num)

        if (!isNaN(num)) {
            var targetNext = $('.steps-w .step-item.active').next();
            var targetPrev = $('.steps-w .step-item.active').prev();

            var nextB = $('.steps-w .step-control.next');
            var prevB = $('.steps-w .step-control.prev');

            if (num == -1) {
                $('#btn-preview-invoice-w').hide();
                $('.btn-next-w').html('Next <i class="fa fa-angle-right"></i>');
            }

            currStep = currStep + num;

            if (currStep < 0) {
                currStep = 0;
            } else if (currStep > 3) {
                currStep = 3
            }
            if ($('.steps-w .step-item:eq(' + currStep + ')').length > 0) {
                //alert(currStep)
                $('.steps-w .step-item').removeClass('active');
                $('.steps-w .step-item:eq(' + currStep + ')').addClass('active');
            }



            var i = $('.steps-w .step-item.active').index();

            var title = "";

            switch (i) {
                case 0:
                    title = "Select Room"
                    break;
                case 1:
                    title = "Guest Info"


                    break;
                case 2:
                    title = "Reservation Summary"
                    break;
                case 3:
                    title = "Finish Reservation"
                    break;


            }

        } else {
            $('.steps-w .step-item').removeClass('active');
            $('.steps-w .step-item' + num).addClass('active');

            if (num == "#done-w") {
                $("#new-walk-in .modal-footer *").hide();
            }
        }

    }


    function clickNext_w(i) {
        $('.steps-w .step-item.active .next').trigger('click');
        //gotoStep(i)
    }

    guestsArray_ = new Array();

    function getGuests() {
        return guestsArray_;
    }

    function setGuests_w() {

        // $('#email-not').show();
        if (!inputsEmpty("#form-load-rooms-w")) {
            var checkIn = $("#check-in-w").val();
            var checkOut = $("#check-out-w").val();
            var pId = $("#properties-w option:selected").val();



            var nights = new Date(checkOut) - new Date(checkIn);
            nights = nights / 1000 / 3600 / 24;

            var ddd = new Date(checkIn) - new Date(gettoday())

            if (ddd < 0) {
                errorMSG("#check-in-w", "this date should start from today to the future");

            } else if (nights <= 0) {
                errorMSG("#check-out-w", "This date should be greater than check-in");

            } else {



                setNights(nights);
                setPropertyId(pId);
                setCheckIn(checkIn);
                setCheckOut(checkOut);


                var c = new Array();

                $("#tb-guests-w tbody tr").each(function(i, tr) {
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

                if ($('#booking-name-w').val() == "") {
                    errorMSG('#booking-name-w', "Can not be empty for Walk in booking");
                } else if (pId == '0') {
                    errorMSG('#properties-w', "Please choose a property");
                } else if (c.length < 1) {
                    alertify.error("<i class='fa fa-times-circle'></i> Add 1 or more guests to coninue");

                } else {
                    setSummary_w();
                    gotoStep_w(1);
                }
            }
        }
    }


    var gRow = $("#tb-guests-w tbody").html();

    function addGuests_w(btn) {

        var p = $(btn).parent(),
            count = p.find('input').val();
        var ag = $("#tb-guests-w tbody tr").length;
        var tg = parseInt(ag) + parseInt(count);
        var exp_guest = $('#exp-num-guests-w').val();



        if (tg > exp_guest) {
            alertify.error("<i class='fa fa-times-circle'></i> You Can only add " + parseInt(exp_guest) + " expected guests details");

        } else {

            var rows = "";
            // alert(gRow)
            for (var i = 0; i < count; i++) {
                rows += gRow;
            }
            $("#tb-guests-w tbody").append(rows);
        }


    }

    function setSummary_w() {
        var exp_guest = $('#exp-num-guests-w').val();
        var guestPrefix = "";


        $("#s-check-in-w").html(getCheckIn())

        $("#s-check-out-w").html(getCheckOut())

        $("#s-nights-w").html("<b>Nights</b> <br>" + getNights());


        if (parseInt(exp_guest) > 1) {
            guestPrefix = " + " + (parseInt(exp_guest) - 1);
        }
        $("#s-guests-w").html(getGuests()[0]["name"] + guestPrefix);



        $("#ds-check-in-w").html(getCheckIn())
        $("#ds-check-out-w").html(getCheckOut())
        $("#ds-nights-w").html(getNights());
        $("#ds-guests-w").html(parseInt(exp_guest));


        //guests drop downs in extras table
        $("#tb-extras-w tbody tr").each(function(i, tr) {

            var select = "<select class='form-control' onchange='setExtrasSubTotal(this)'>";
            for (var i = parseInt(exp_guest); i >= 1; i--) {
                select += "<option value='" + i + "'>" + i + "</option>";
            }
            select += "</select>";

            var extraUnitPrice = parseFloat($(tr).find("td:eq(2) select option:selected").val());

            $(tr).find("td:eq(3)").html(select);
            $(tr).find("td:eq(4) #extra-subtotal-w").html(parseInt(exp_guest) * extraUnitPrice);

        });




    }


    ///load all extras
    function getAllExtras_w() {
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
                rows += "<td>$<span id='extra-subtotal-w'></span></td>";
                rows += "</tr>";

            });


            $("#tb-extras-w tbody").html(rows);
        })
    }

    function setTotals_w() { //sets extra subtotals and the  total

        var totalExtrasBox = $("#s-total-cost-extras-w");
        var totalAllBox = $("#s-total-cost-all-w");
        var totalRoomsBox = $("#s-total-cost-rooms-w");

        var totalExtras = 0;

        $("#tb-extras-w tbody tr.selected").each(function(i, tr) { //total up all selected rows
            var stotal = parseFloat($(tr).find("td:eq(4) #extra-subtotal-w").text());
            totalExtras = stotal + totalExtras;

        });

        totalExtrasBox.text(totalExtras);

        var totalAll = totalExtras + parseFloat(totalRoomsBox.text());

        totalAllBox.text(totalAll);
        $('#ds-total-cost-all-w').text(totalAll);


    }


    function gotoStepAnother_w() {
        $('#ds-booking-status-w').text($("#s-status option:selected").val());
        // $('#btn-preview-invoice').show();
        $('.btn-next-w').html('finish <i class="fa fa-check"></i>');
        gotoStep_w(1);
    }

    function change_discount_w(d, sel) {
        $('.error-alert').remove();
        d = d == "" ? 0 : d;
        var ltp = $('#ds-total-paid-w').text();
        var ltc = $('#ds-total-cost-all-w').text();

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


        $('#ds-discount-w').text(d)

        var lbal = parseFloat(ltc) - d - parseFloat(ltp)
        $('#ds-balance-w').text(lbal.toFixed(2))

    }

    function change_total_paid_w(p) {
        p = p == "" ? 0 : p;
        $('#ds-total-paid-w').text(p)

        var dis = $('#ds-discount-w').text()
        var ltc = $('#ds-total-cost-all-w').text();
        var lbal = parseFloat(ltc) - p - parseFloat(dis)

        $('#ds-balance-w').text(lbal.toFixed(2))
    }

    $("#paymemt_mtd-w").on("change", function() {
        var option = $(this).find("option:selected").val();
        if (option == "Cheque") {
            $("#reference-number-w").show();

            //            alert(pay)
        } else {
            $("#reference-number-w").hide();
        }

    });

    getTaxes2_w();

    function getTaxes2_w() {

        $.post("src/get_data.php", {
            token: "get_taxes_4_selection"
        }, function(response) {


            var taxes_obj = JSON.parse(response);

            var rows = "";
            $.each(taxes_obj, function(i, taxes) {

                //alert(JSON.stringify(taxes));////
                rows += '<div class="form-check form-check-inline">';
                rows += '<input id=' + taxes.taxname + ' onclick="ExcludeTax_w(this)" class="form-check-input" type="checkbox"  value="option1">';
                rows += '<label class="form-check-label" for="inlineCheckbox1">' + taxes.taxname + '(' + taxes.taxamount + '%)</label>';
                rows += '</div>';

            });

            $("#taxes_list-w").html(rows);

        });

    }

    var excluded_taxes_w = [];

    function ExcludeTax_w(context) {

        var tax = $(context).attr("id");
        if ($(context).prop("checked")) {

            if (excluded_taxes_w.indexOf(tax) == -1) {

                excluded_taxes_w.push(tax);
                //                 alert(1)
                x0p('Notice', 'This tax will be excluded', 'ok', 'false');
            }


        } else {

            var index = excluded_taxes_w.indexOf(tax);
            excluded_taxes_w.splice(index, 1);
        }



    }

    function getExtras_w() {
        extrasArray_ = new Array();
        $("#tb-extras-w tbody tr.selected").each(function(i, tr) {
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

    function addReservation_w(btns) {
        var btn = $(".btn-next");
        btn.html("<i class='fa fa-spin fa-spinner'></i> Saving reservation...");
        btn.prop("disabled", true);

        var paymentMethod = $("#paymemt_mtd-w").val();
        paymentMethod = paymentMethod == "Cheque" ? "Cheque(" + $("#reference-number-w").val() + ")" : paymentMethod;

        var totalCost = parseFloat($("#s-total-cost-all-w").text()) - parseFloat($("#s-total-cost-extras-w").text()),
            totalPaid = $("#ds-total-paid-w").text(),
            discount = $('#ds-discount-w').text(),

            bookingStatus = $("#s-status-w option:selected").val(),
            message = $("#s-message-w").val();


        //        $('#btn-preview-invoice').click();
        var exp_guest = $('#exp-num-guests-w').val();

        var r = JSON.stringify({
            property_id: getPropertyId(),
            room_type_id: 0,
            check_in_date: getCheckIn(),
            check_out_date: getCheckOut(),
            cost: totalCost,
            no_guests: exp_guest,
            booking_status: bookingStatus,
            description: message,
            booking_source: "Walk in",
            booking_name: $('#booking-name-w').val(),

            agent_id: "0",
            booking_date: "<?php echo date('Y-m-d h:m:s')?>",
            total_paid: totalPaid,
            payment_method: paymentMethod,
            discount: discount,
            invoice_payment_options: "[]"
        });
        //        alert(r)

        var g = JSON.stringify(getGuests());
        var e = JSON.stringify(getExtras_w());


        var excluded_tx = JSON.stringify(excluded_taxes_w);



        $.post("src/xhr.php", {
            action: "add reservation",
            main_data: r,
            guests: g,
            extras: e,
            rooms: JSON.stringify(new Array()),
            children_rates: JSON.stringify(new Array()),
            meal_plan_per_day: JSON.stringify(new Array()),
            extra_bed: JSON.stringify(new Array()),
            excluded_taxes: excluded_tx

        }, function(data) {



            btn.html("<i class='fa fa-check'></i> Finish");
            btn.prop("disabled", false);



            x0p('Booking Saved', 'Your new Booking has been recorded.', 'ok', function() {
                location.reload();
                $("#new-walk-in").modal("hide");
            });



        });

    }

</script>
