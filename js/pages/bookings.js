//getInvoice_t()
//getProperties();
//getAllBookings();
var BOOKING_ID = 0;
var single_booking_obj = {};
var meal_plan_index = 0;

var date_diff_indays = function(date1, date2) {
    dt1 = new Date(date1);
    dt2 = new Date(date2);

    var date2_ = Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate());
    var date1_ = Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate());

    return Math.floor((date2_ - date1_) / (1000 * 60 * 60 * 24));
}

function getBooking(id) {
    //    alert(id)
    $.post("src/get_data.php", {
        token: "booking",
        booking_id: id
    }, function(data) {
        //console.log(data);
        showDetails(data);
    })
}

function showDetails(i) {
    setIsNewBooking(false)
    var b;
    if (isNaN(parseInt(i))) {
        b = JSON.parse(i);
        //        alert(99);
    } else {
        b = JSON.parse(bookings)[i];
    }
    single_booking_obj = b;

    meal_plan_index = i;

    calculateTotals();
    //console.log(JSON.stringify(b))

    var p = $('#booking-details');
    var tbGuests = $('#booking-details #d-tb-guests tbody');
    var tbPayments = $('#booking-details #d-tb-payments tbody');
    var tbRooms = $('#booking-details #d-tb-rooms tbody');
    var tbExtras = $('#booking-details #d-tb-extras tbody');
    var tbKids = $('#booking-details #d-tb-kids tbody');
    var tbBeds = $('#booking-details #d-tb-beds tbody');

    //    console.log(bookings);
    var x_room = '';
    var booking_period = b.booking_period;
    if (booking_period == 'past') {
        x_room = 'hide';
        var x = document.querySelectorAll('.b-period');
        for (var i = 0; i < x.length; i++) {
            x[i].disabled = true;
        }
        document.getElementById('b-period-message').style.display = "block";

    } else {
        var x = document.querySelectorAll('.b-period');
        for (var i = 0; i < x.length; i++) {
            x[i].disabled = false;
        }
        document.getElementById('b-period-message').style.display = "none";
    }


    getbdata(b);


    setBookingId(b.id);
    //    alert(BOOKING_ID)
    setPropertyId(b.property_id);
    $('#delete-booking').attr('onClick', 'deleteBooking(' + b.id + ')');

    p.find("#d-booking-reference").text(b.booking_reference);
    p.find("#d-name-title").text(b.booking_name);
    p.find("#d-name").val(b.source);
//     var x_email = b.agent == null || b.agent.length < 1 ? b.guests[0]['email'] : b.agent['email'];
//     var x_phone = b.agent == null || b.agent.length < 1 ? b.guests[0]['phone'] : b.agent['phone'];
    
    var x_email = "";// b.agent == null || b.agent == undefined || b.agent.length < 1 ? b.guests[0]['email'] : b.agent['email'];
    var x_phone = "";// b.agent == null || b.agent == undefined || b.agent.length < 1 ? b.guests[0]['phone'] : b.agent['phone'];
    
    if(b.agent == null || b.agent == undefined || b.agent.length < 1){
    
       if(b.guests[0] !=undefined){
        x_email = b.guests[0]['email'];
    x_phone = b.guests[0]['phone'];
       
       }
       
       
    }
    else{
    x_email = b.agent['email'];
    x_phone = b.agent['phone'];
    }
    
    p.find("#d-email").val(x_email);
    p.find("#d-discount").val(b.discount);
    p.find("#d-taxes-includes").html(b.taxes);

    p.find("#d-phone").val(x_phone);
    p.find("#d-check-in").html(b.check_in_date);
    p.find("#d-check-out").html(b.check_out_date);
    p.find("#d-message").html(b.message);
    p.find("#d-internal-comment").html(b.internal_comments);
    p.find("#d-guest-count").html("(" + b.no_guests + ")");
    p.find("#d-property-name").val(b.property_name);


    // track user and date --- added by edgar

    p.find("#track-user").text(b.property_name);
    p.find("#track-date").text(b.booking_date);
    p.find("#track-bsource").text(b.booking_source);



    $('.d-guests').text(b.no_guests)
    $('.d-rooms').text(b.rooms.length)

    //guests
    gRows = "";
    // $.each(b.guests, function (i, g) {
    //     gRows += "<tr>";
    //     gRows += "<td><input value='" + g.name + "' style='text-transform: capitalize;' /></td>";
    //     gRows += "<td><input value='" + (yr - parseInt(g.year_of_birth)) + "' /></td>";
    //     gRows += "<td><input value = '" + g.email + "' type='email' data-input= 'email' data-invalid-message='invalid email'/></td>";
    //     gRows += "<td><input value='" + g.phone + "'  </td>";
    //     gRows += "<td><input value='" + g.id_number + "'  </td>";


    //     gRows += "</tr>";

    // })


    $.each(b.guests, function(i, g) {
        // console.log("999")
        var age = (yr - parseInt(g.year_of_birth));
        if (isNaN(age) || age < 1) {
            age = "--";
        }
        gRows += "<tr>";
        gRows += "<td> " + g.name + "</td>";
        gRows += "<td>" + age + "</td>";
        gRows += "<td>" + g.email + "</td>";
        gRows += "<td>" + g.phone + "  </td>";
        gRows += "<td>" + g.id_number + "  </td>";
        gRows += "<td class='print-hide text-right' onclick='openGuestModal(" + JSON.stringify(g) + ")'><button class='fa fa-pencil btn btn-circle'></button></td>";

        gRows += "<td class='print-hide text-right' onclick='removeGuest(" + g.guest_id + ", this)'><button class='fa fa-remove btn btn-circle'></button></td>";
        gRows += "</tr>";


    })

    tbGuests.html(gRows);




    //payments
    gRows = "";


    $("#nights__").html(b.nights);
    // alert(JSON.stringify(b.internal_comments));
    //   alert(JSON.stringify(b.check_in_date));


    //alert(JSON.stringify(b.guests));

    //alert(JSON.stringify(b.agent));
    //if(b.agent.length >0){

    var temp_array_x = []
    var row_contact = "";
    try {

        temp_array_x.push(b.agent);

        //alert(temp_array_x.length)

        $.each(temp_array_x, function(k, p) {

            row_contact += '<tr>';
            row_contact += '<td class="icon"><span class="fa fa-user-o"></span></td>';
            row_contact += '<td class="item">Names</td>';
            row_contact += '<td><span id="d-name" style="color:#475B63">' + p.name + '</span></td>';
            row_contact += '</tr>';
            row_contact += '<tr>';
            row_contact += '<td class="icon"><span class="fa fa-map-pin"></span></td>';
            row_contact += '<td class="item">Address</td>';
            row_contact += '<td> <span style="color:#475B63"> &nbsp;' + p.address + '</span></td>';
            row_contact += '</tr>';
            row_contact += '<tr>';
            row_contact += '<td class="icon"><span class="fa fa-mobile-phone"></span></td>';
            row_contact += '<td class="item">Mobile</td>';
            row_contact += '<td> <span style="color:#475B63">' + p.phone + '</span></td>';
            row_contact += '</tr>';
            row_contact += '<tr>';
            row_contact += '<td class="icon"><span class="fa fa-envelope-o"></span></td>';
            row_contact += '<td class="item">Email</td>';
            row_contact += '<td> <span style="color:#475B63" id="d-email">' + p.email + '</span></td>';
            row_contact += '</tr>';


        });
    } catch (err) {
        row_contact = "";
        $.each(b.guests, function(k, p) {


            row_contact += '<tr>';
            row_contact += '<td class="icon"><span class="fa fa-user-o"></span></td>';
            row_contact += '<td class="item">Names</td>';
            row_contact += '<td><span id="d-name" style="color:#475B63">' + p.name + '</span></td>';
            row_contact += '</tr>';
            row_contact += '<tr>';
            row_contact += '<td class="icon"><span class="fa fa-map-pin"></span></td>';
            row_contact += '<td class="item">ID Number</td>';
            row_contact += '<td> <span style="color:#475B63">' + p.id_number + '</span></td>';
            row_contact += '</tr>';
            row_contact += '<tr>';
            row_contact += '<td class="icon"><span class="fa fa-mobile-phone"></span></td>';
            row_contact += '<td class="item">Mobile</td>';
            row_contact += '<td> <span style="color:#475B63">' + p.phone + '</span></td>';
            row_contact += '</tr>';
            row_contact += '<tr>';
            row_contact += '<td class="icon"><span class="fa fa-envelope-o"></span></td>';
            row_contact += '<td class="item">Email</td>';
            row_contact += '<td> <span style="color:#475B63" id="d-email">' + p.email + '</span></td>';
            row_contact += '</tr>';


            // $("#editable_contacts").html('· <a data-toggle="modal" data-target="#update-details">Edit</a>');
            return false;

        });
    }
    $("#contact_s").html(row_contact);

    // }



    $.each(b.payments, function(i, g) {
        if (g.payment_method !== "method") {

            gRows += "<tr>";
            gRows += "<td>" + g.date_paid + "</td>";
            gRows += "<td>" + g.payment_reference + "</td>";
            gRows += "<td>" + g.payment_method + "</td>";
            gRows += "<td>$" + g.amount + "</td>";
            gRows += "<td>" + g.payment_comments + "</td>";
            gRows += "<td class='text-right'>" + "<i id='edit'  onclick='openPaymentModal(" + JSON.stringify(g) + ", this)' class=\"fa fa-pencil btn-circle mr-2\"></i><i   onclick='deletePayment(\"" + g.id + "\", this)' class=\"fa fa-close btn-circle\"></i>" + "</td>";

            gRows += "</tr>";

        }

    })



    //alert(gRows);

    tbPayments.html(gRows);

    //rooms
    gRows = "";

    var properties_affected = [];
    $.each(b.rooms, function(k, g) {

        //        alert(JSON.stringify(g));

        //#ermtype_id").attr("data-room_type_id //check_in_date_
        gRows += "<tr id='etr_id' data-rt-id='" + g.room_type_id + "' data-r-id='" + g.room_id + "' data-t_id='" + g.id + "' data-b_id='" + i + "' data-price-rate='" + g.price_rate + "' data-price_per_night='" + g.price_per_night + "'>";
        gRows += "<td id='ep_id' data-property_id='" + g.property_id + "' >" + g.property_name + "</td>";
        var used_as = '';
        // alert(g.booked_as)
        if (g.booked_as != 0) {

            $.each(b.room_types, function(h, z) {

                if (z.id == g.booked_as) {

                    used_as = z.name;

                }


            });


        }

        if (used_as.length > 0) {

            gRows += "<td id='ermtype_id' data-room_type_id='" + g.room_type_id + "' >" + g.room_type_name + '(' + used_as + ')' + "</td>";

        } else {

            gRows += "<td id='ermtype_id' data-room_type_id='" + g.room_type_id + "' >" + g.room_type_name + "</td>";

        }




        gRows += "<td id='erm_name'>" + g.room_name + "</td>";
        gRows += "<td id='check_in_dateE' >" + g.check_in_date + "</td>";
        gRows += "<td id='check_out_dateE' >" + g.check_out_date + "</td>";
        gRows += "<td class=\"text-center\">" + date_diff_indays(g.check_in_date, g.check_out_date) + "</td>";

        if (g.meal_plan === "Custom") {
            //alert(g.check_in_date)
            //            alert(g.meal_plan)

            //            gRows += "<td class=\"text-center meal_plan\"><a style=\"color:#215D75\" data-toggle=\"popover\" data-target=\"#popover-content\" data-placement=\"bottom\"  onclick=\"MealBreakDown(" + meal_plan_index + ")\" >" + g.meal_plan + "</a></td>";
            gRows += "<td class=\"text-center meal_plan\"><a style=\"color:#215D75\" data-toggle=\"popover\" data-target=\"#popover-content\" data-placement=\"bottom\"  onclick='MealBreakDown(" + JSON.stringify(g) + ")' >" + g.meal_plan + "</a></td>";

        } else {

            gRows += "<td class=\"text-center meal_plan\">" + g.meal_plan + "</td>";

        }


        gRows += "<td class=\"text-right\">" + g.price_per_night + "</td>";
        gRows += "<td class=\"text-right\">" + Math.round(date_diff_indays(g.check_in_date, g.check_out_date) * parseFloat(g.price_per_night)) + "</td>";
        gRows += "<td><a class=\"fa fa-pencil btn-circle\" onclick=\"editRoom(this)\"></a></td>";
        gRows += "<td><a class=\"fa fa-times btn-circle\" onclick='removeBookedRoom(" + g.id + ")'></a></td>";
        gRows += "</tr>";

        if (properties_affected.indexOf(g.property_name) == -1) {

            properties_affected.push(g.property_name);
        }

        /* gRows += "<tr>";
         gRows += "<td>" + g.room_type_name + "</td>";
         gRows += "<td>" + g.room_name + "</td>";
         gRows += "<td class='text-center br-0 " + x_room + "'><a class='fa fa-pencil btn-circle' title='Edit Rool Allocation' onclick='change_room_allocation(\"" + g.room_id + "\", \"" + g.room_type_id + "\", \"" + g.property_id + "\")' data-toggle='modal' data-target='#edit-sel-room'></a></td>";
         gRows += "</tr>";*/

    })

    var row_p = "";
    $.each(properties_affected, function(k, g) {
        row_p += '<span class="tag">' + g + '</span>';
    })



    $("#properties-affected").html(row_p);


    tbRooms.html(gRows);

    //extras
    gRows = "";


    var extras_temp_array = [];

    cost = parseFloat(b.cost);
    $('#sub_ttl').val(cost);

    $.each(b.extras, function(i, g) {

        // alert(JSON.stringify(g));

        extras_temp_array.push(g.extra_id);
        cost += parseFloat(g.unit_price);
        gRows += "<tr>";
        gRows += "<td>" + g.extra_name + "</td>";
        gRows += "<td class='guests'>" + g.total_guests + "</td>";
        gRows += "<td class='unit_price'>" + g.unit_price + "</td>";
        gRows += "<td class='total' >" + Math.round(parseInt(g.total_guests) * parseFloat(g.unit_price)) + "</td>";
        gRows += "<td width='1px'>" + "<i id='edit'  onclick='editExtra(this,\"" + g.id + "\")' class=\"fa fa-pencil btn-circle mr-2\"></i></td><td width='1px'><i   onclick='deleteExtra(\"" + g.id + "\")' class=\"fa fa-close btn-circle text-danger\"></i></td>";
        gRows += "</tr>";

    })

    tbExtras.html(gRows);

    p.find("#d-s-total").text(cost); //d-total-cost

    p.find("#d-discount").text(b.discount); //d-total-cost


    p.find("#d-total-paid").text(b.total_paid);


    total_taxes = 0;

    taxes_array = b.taxes;

    $.each(b.taxes, function(taxes_index, tax) {
        total_taxes = total_taxes + (parseInt(cost) * (parseFloat(tax.taxamount) / 100));
        //alert(tax.taxamount);

    });


    p.find("#d-taxes").text(Math.round(total_taxes));

    p.find("#d-balance").text(Math.round((parseInt(cost) + total_taxes - parseInt(b.total_paid))));
    $('.d-balance').text(Math.round((parseInt(cost) + total_taxes - parseInt(b.total_paid))))

    p.find("#d-total-cost").text(Math.round((parseInt(cost) + total_taxes - parseInt(b.discount)))); //d-total-cost



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

    //booking status
    setStatus(b.status);

    //kids rates
    var $kRows = "";
    var kidsRates = JSON.parse(b.children_rates);
    $.each(kidsRates, function(i, rate) {

        $kRows += "<tr>";
        $kRows += "<td>" + rate.age_bracket + "</td>";
        $kRows += "<td>" + rate.children + "</td>";
        $kRows += "<td>" + rate.unit_price + "</td>";
        $kRows += "<td>" + rate.amount + "</td>";
        $kRows += "<td class='print-hide text-right' onclick='removeKidsRate(this)'><button class='fa fa-remove btn btn-circle'></button></td>";
        $kRows += "</tr>";

    });

    //alert(b.children_rates);
    tbKids.html($kRows);




    //extra beds 
    var bedRows = '';
    var extraBeds = JSON.parse(b.extra_beds);
    // var extraBeds = b.extra_beds;
    $.each(extraBeds, function(i, bed) {
        // alert(JSON.alert(bed))
        bedRows += "<tr>";
        bedRows += "<td>" + bed.bed_name + "</td>";
        bedRows += "<td>" + bed.no_of_beds + "</td>";

        nights____ = parseFloat(bed.amount) / (parseFloat(bed.no_of_beds) * parseFloat(bed.unit_price))
        bedRows += "<td>" + nights____ + "</td>";
        bedRows += "<td>" + bed.unit_price + "</td>";
        bedRows += "<td>" + bed.amount + "</td>";
        bedRows += "<td class='print-hide text-right' onclick='removeExtraBed(this)'><button class='fa fa-remove btn btn-circle'></button></td>";

        bedRows += "</tr>";
    });
    tbBeds.html(bedRows);

    p.modal('show');

    $('[data-toggle="popover"]').popover({
        html: true,
        content: function() {
            return $('#popover-content').html();
        }
    });
    getbdata(b);
}

var bookings = "[]";


function getAllBookings() {

    var payload = {};

    var pId = $("#properties option:selected").val();
    var rtId = $("#room_types option:selected").val();
    lazyload();
    $.post("src/get_data.php", {
        token: "reservations",
        filter: filter,
        property_id: pId,
        room_type_id: rtId
    }, function(data) {
        hidelazyload();

        bookings = data;

        //alert(data)
        //alert(bookings);
        setBookings(bookings);


    })

}

function setBookings(data) {

    var bs = JSON.parse(data);
    var rows = [];
    var row = ''
    $.each(bs, function(i, b) {

        var bal = parseFloat(b.cost) - parseFloat(b.total_paid);
        bal = bal < 0 ? 0 : bal;
        var status = "fa-circle-o";
        switch (b.status) {
            case "confirmed":
                status = "fa fa-circle-o text-green";
                break;

            case "unconfirmed":
                status = "fa fa-circle-o text-gray";
                break;
            case "check-in":
                status = "fa fa-circle text-green";
                break;

            case "cancelled":
                status = "fa fa-circle text-red";
                break;
        }

        row = "<tr onclick='showDetails(" + i + ")'>";
        row += "<td class='stat'><i class=\"fa " + status + "\"></i></td>";
        row += "<td><b>" + b.booking_reference + "</b></td>";
        row += "<td><b>" + b.booking_name + "</b></td>";
        row += "<td>" + b.check_in_date + "</td>";
        row += "<td>" + b.check_out_date + "</td>";
        row += "<td class='text-center'>" + b.nights + "</td>";
        row += "<td class='text-center text-blue'>" + b.no_guests + "</td>";
        row += "<td>" + b.booking_date + "</td>";
        //rows+="<td>"+b.rooms+"</td>";            
        // row += "<td>$" + addCommas(b.cost) + "</td>";
        var temp = calculateBookingTotals(b);
        row += "<td class='text-right'>" + addCommas(temp[0]) + "</td>";
        //            row += "<td>$" + b.total_paid + "</td>";
        //row += "<td>$" + addCommas(bal) + "</td>";
        if (temp[1] < 1) {

            row += "<td class='text-right' style='color:#2A9213; font-weight:700'><b>" + addCommas(temp[1]) + "</b></td>";

        } else {
            row += "<td class='text-right' style='color:#763129;font-weight:700'><b>" + addCommas(temp[1]) + "</b></td>";

        }


        row += "<td>" + b.invoice_no + "</td>";
        row += "<td>" + b.booking_source + "</td>";
        row += "</tr>";

        rows.push(row)
    });

    //    rows = rows.length < 1 ? "<tr><td colspan='10'><h4 class='text-light text-center'>No Bookings</h4><td></tr>" : rows;
    //    rows = rows == [] ? "<tr><td colspan='10'><h4 class='text-light text-center'>No Bookings</h4><td></tr>" : rows;



    var tableBody = $("#tb-reservations tbody");
    //   tableBody.html("");



    if (rows.length < 1) {
        tableBody.html("<tr><td colspan='12' style='background-color:#fff'><p class='p-5'>No Bookings</p></td></tr>");
    } else {
        pag(rows, tableBody, '#bookings-pagination', 200);

        //        $("#tb-reservations tbody").html(row)
        fixTableHead(".table-primary");
    }
}

//    function getProperties() {
//        $.post('src/get_data.php', {
//            token: "properties"
//        }, function(data) {
//            var o = "<option value=0> All Properties</option>";
//
//            var properties = JSON.parse(data);
//            $.each(properties, function(i, property) {
//                o += "<option value='" + property.id + "'>" + property.property_name + "</option>";
//            });
//
//
//            $("#properties").html(o);
//            //            alert(o);
//            getAllBookings();
//            //getRoomTypes();
//
//        })
//    }

//    function getRoomTypes() {
//        var sel = $("#roomtypes");
//        sel.prop("disabled", true);
//
//        //tinyloader("#room-loader", "");
//
//        var property_id = $("#properties option:selected").val();
//        $.post('src/get_data.php', {
//            token: "roomtypes",
//            property_id: property_id
//        }, function(data) {
//            var o = "<option value='0'>All room types</option>";
//            //alert(data)
//            var rts = JSON.parse(data);
//            $.each(rts, function(i, rt) {
//                o += "<option value='" + rt.id + "'>" + rt.name + "</option>";
//            });
//
//            //alert(o)
//            sel.html(o);
//            sel.prop("disabled", false);
//            $("#room-loader").html("");
//        })
//    }


function setStatus(status) {
    var e = $(".d-status");
    status = status.toLowerCase();



    switch (status) {
        case "confirmed":
            e.html("<i class='fa fa-circle-o text-green'></i> Confirmed");

            //alert($('#cancel_booking_btn').parent().html())
            $('#cancel_booking_btn').removeClass('btn-cancels');
            $('#cancel_booking_btn').addClass('b-btnx');
            //$(context).addClass('btn-danger');
            $('#cancel_booking_btn').html('<i class="fa fa-close"></i> Cancel Booking ');

            break;
        case "check-in":
            e.html("<i class='fa fa-circle text-green'></i> In House");
            $('#cancel_booking_btn').removeClass('btn-cancels');
            $('#cancel_booking_btn').addClass('b-btnx');
            //$(context).addClass('btn-danger');
            $('#cancel_booking_btn').html('<i class="fa fa-close"></i> Cancel Booking ');
            break;
        case "cancelled":
            e.html("<i class='fa fa-circle text-red'></i> Cancelled");


            $('.b-btnx').addClass('btn-cancels');
            //$(context).addClass('btn-danger');
            $('.b-btnx').html('<i class="fa fa-close"></i> Booking Cancelled');
            $('.b-btnx').removeClass('b-btnx');
            break;

        default:
            e.html("<i class='fa fa-circle-o text-disabled'></i> Un Confirmed");

            $('#cancel_booking_btn').removeClass('btn-cancels');
            $('#cancel_booking_btn').addClass('b-btnx');
            //$(context).addClass('btn-danger');
            $('#cancel_booking_btn').html('<i class="fa fa-close"></i> Cancel Booking ');
            break;



    }

}
//alert(1);

function setBookingId(c) {
    $("[name=c-b-i]").val(c);
    BOOKING_ID = c;
}

function getBookingId() {

    return $("[name=c-b-i]").val()
}
var ppid = 0;

function setPropertyId(c) {
    ppid = c;
}

function getPropertyId() {
    return ppid;
}



function searchBooking(s) {
    var filter = s.toUpperCase();

    $("#tb-reservations tbody tr").each(function(i, tr) {

        var b_ref = $(tr).find("td:eq(1)").html();
        var b_name = $(tr).find("td:eq(2)").html();
        var b_inv = $(tr).find("td:eq(10)").html();

        // for (i = 0; i < tr.length; i++) {
        //     // td = tr[i].getElementsByTagName("td")[1];
        //     if (td) {


        if (b_ref.toUpperCase().indexOf(filter) > -1 || b_name.toUpperCase().indexOf(filter) > -1 || b_inv.toUpperCase().indexOf(filter) > -1) {
            tr.style.display = "";

        } else {
            tr.style.display = "none";

        }

        //     }
        // }
    })


}




function f_bookingStatus(status) {

    payload = {};


    var pId = $("#properties option:selected").val();
    var rtId = $("#room_types option:selected").val();
    $.post("src/get_data.php", {
        token: "reservations",
        filter: status,
        property_id: pId,
        room_type_id: rtId
    }, function(data) {
        bookings = data;
        //            alert(bookings);
        setBookings(bookings);
        $("[name=curr-booking-satus]").val(status); //stores the current loaded satus

    })
}


// <!-- function to calculate booking amounts and totals  -->


function calculateTotals() {

    var temp = calculateBookingTotals(single_booking_obj);
    $(".d-balances").html(temp[1].toLocaleString())

}

// <!-- function to calculate booking amounts and totals ends here -->


function calculateBookingTotals(single_booking_obj) {
    var nights = single_booking_obj.nights;
    var rooms = single_booking_obj.rooms;
    var rooms = rooms.length;
    var rooms_cost = 0 //parseFloat(single_booking_obj.cost);
    $.each(single_booking_obj.rooms, function(i, g) {
            //alert(JSON.stringify(g));
            //extras_temp_array.push(g.extra_id);
            var cin = new Date(g.check_in_date);
            var cout = new Date(g.check_out_date);
            var nights = Math.ceil((cout - cin) / 1000 / 3600 / 24);
            rooms_cost += parseFloat(g.price_per_night) * nights;
        })
        // alert(rooms_cost)
    var taxable_amount = rooms_cost;
    var discount = parseFloat(single_booking_obj.discount);
    var amount_paid = parseFloat(single_booking_obj.total_paid)
    var extras_cost = 0;
    var extras_temp_array = [];
    $.each(single_booking_obj.extras, function(i, g) {
            // alert(JSON.stringify(g));
            extras_temp_array.push(g.extra_id);
            extras_cost += parseFloat(g.unit_price);

        })
        //alert(JSON.stringify(single_booking_obj.children_rates));
    var total_kid_amount = 0;
    var kids_rates = JSON.parse(single_booking_obj.children_rates);
    $.each(kids_rates, function(index, item) {
        total_kid_amount += parseFloat(item.amount);
        //alert(tax.taxamount);
    });
    taxable_amount += total_kid_amount;


    var total_extra_bed = 0;
    //   var extra_beds_obj=[];
    var extra_beds_obj = JSON.parse(single_booking_obj.extra_beds);
    $.each(extra_beds_obj, function(index, item) {
        total_extra_bed += parseFloat(item.amount);
        //alert(tax.taxamount);
    });

    //alert(total_extra_bed)
    taxable_amount += total_extra_bed;


    var total_taxes = 0;
    taxes_array = single_booking_obj.taxes;
    taxable_amount -= discount;
    $.each(single_booking_obj.taxes, function(taxes_index, tax) {
        total_taxes += ((parseFloat(taxable_amount) * (parseFloat(tax.taxamount) / 100)));

    });
    //alert(total_taxes)
    //Math.round(total_taxes)
    var total_amount_due = Math.round(rooms_cost + total_kid_amount + total_extra_bed + extras_cost + total_taxes - discount);
    var balance = total_amount_due - amount_paid;
    //   alert("ttlA:"+total_amount_due+ " BAl:"+balance)
    $(".d-balances").html(balance.toLocaleString())

    var temp = [];
    temp.push(total_amount_due);
    temp.push(balance);
    return temp;

}


function showGuestDetails(i) {
    var b = JSON.parse(bookings)[i];
    single_booking_obj = b;
}
//alert(1);
