
<style>
    .table th {
        background-color: #f0f0f0
    }

    .table td {
        vertical-align: middle;
    }

</style> 
<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-2">
                All Invoices
            </div>

            <div class="col-md-10 text-right">
                <input class="form-control tiny" placeholder="search" oninput="searchBooking(value)">
                <label class="ml-0 mr-0">Property: </label>
                <select class="form-control tiny" id="properties">
                                     <?php echo $propertyOptions;?>
                                </select>
                
                </div>

            </div>
        </div>
    </div>


    <div class=" p-0" style="background-color:#fff; border-bottom: 1px solid #eee">
        <div class="container pl-3 pr-3">

            <div class="row p-2 pl-3" id="invoices_tb">

                
            </div>
        </div>


        <div class="modal animated FadeIn" id="date-range">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <label>Start Date</label>
                        <input class="datepicker form-control start-date" />

                        <label>End Date</label>
                        <input class="datepicker form-control end-date" />

                        <div class="mt-2">
                            <button class="btn btn-secondary btn-sm" data-dismiss="modal">cancel</button>
                            <button class="btn btn-primary btn-sm" onclick="setDateRange()">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal animated FadeIn" id="specific-date">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <label>specific-date</label>
                        <input class="datepicker form-control setdate" />



                        <div class="mt-2">
                            <button class="btn btn-secondary btn-sm" data-dismiss="modal">cancel</button>
                            <button class="btn btn-primary btn-sm" onclick="setDate()">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-footer">
        <small class="ml-4 mt-2 mr-2">Invoices For Confirmed Reservations: <label id="footerReport1"></label><label id="footerReport2"></label></small>
        <!--<a class="pull-right mr-4 mt-1" hidden="hidden"><i class="fa fa-print"></i> print report</a>
        <a class="pull-right mr-4 mt-1" id="savepdf_reservation"><i class="fa fa-file-pdf-o"></i> Export report to PDF</a>
        <!--                            <small class="ml-2 mt-2 mr-4 text-blue pull-right">2 Agents selected</small>-->
    </div>
</div>


<!-- <script src="js/pages/bookings.js"></script> -->

<script>


var bookings = [];
var filter="";

function searchBooking(s) {
    filter = s.toUpperCase();

    $("#invoices_tb .item").each(function (i, item) {

        var b_name = $(item).find(".invoice_name").html();

        var b_ref = $(item).find(".invoice_no").html();

        if (b_ref.toUpperCase().indexOf(filter) > -1 || b_name.toUpperCase().indexOf(filter) > -1 ) {
            item.style.display = "";

        } else {
            item.style.display = "none";

        }

        
    })


}

getAllBookings();


function getAllBookings() {

    var payload = {};

    var pId = $("#properties option:selected").val();
    var rtId = 'all';//$("#room_types option:selected").val();
    lazyload();
    $.post("src/get_data.php", {
        token: "get_all_invoicess",
        filter: filter,
        property_id: pId,
        room_type_id: rtId
    }, function (data) {

        hidelazyload();

        bookings = data;
        //alert(data)
        //alert(bookings);
        setInvoices(bookings);
    })

}

function calculateBookingTotals(single_booking_obj) {
    var nights = single_booking_obj.nights;
    var rooms = single_booking_obj.rooms;
    //var rooms = rooms.length;
    var rooms_cost = 0 //parseFloat(single_booking_obj.cost);
    $.each(single_booking_obj.rooms, function (i, g) {
        //alert(JSON.stringify(g));
        //extras_temp_array.push(g.extra_id);
        var cin = new Date(g.check_in_date);
        var cout = new Date(g.check_out_date);
        var nights = Math.ceil((cout-cin)/1000/3600/24);
        rooms_cost += parseFloat(g.price_per_night) * nights;
    })
    // alert(rooms_cost)
    var taxable_amount = rooms_cost;
    var discount = parseFloat(single_booking_obj.discount);
    var amount_paid = parseFloat(single_booking_obj.total_paid)
    var extras_cost = 0;
    var extras_temp_array = [];
    $.each(single_booking_obj.extras, function (i, g) {
        // alert(JSON.stringify(g));
        extras_temp_array.push(g.extra_id);
        extras_cost += parseFloat(g.unit_price);

    })
    //alert(JSON.stringify(single_booking_obj.children_rates));
    var total_kid_amount = 0;
    var kids_rates = JSON.parse(single_booking_obj.children_rates);
    $.each(kids_rates, function (index, item) {
        total_kid_amount += parseFloat(item.amount);
        //alert(tax.taxamount);
    });
    taxable_amount += total_kid_amount;


    var total_extra_bed = 0;
    //   var extra_beds_obj=[];
    var extra_beds_obj = JSON.parse(single_booking_obj.extra_beds);
    $.each(extra_beds_obj, function (index, item) {
        total_extra_bed += parseFloat(item.amount);
        //alert(tax.taxamount);
    });

    //alert(total_extra_bed)
    taxable_amount += total_extra_bed;


    var total_taxes = 0;
    taxes_array = single_booking_obj.taxes;
    taxable_amount -= discount;
    $.each(single_booking_obj.taxes, function (taxes_index, tax) {
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


function setInvoices(data) {

    var bs = JSON.parse(data);
    var rows = [];
    var row = ''
    $.each(bs, function (i, b) {

        var bal = parseFloat(b.cost) - parseFloat(b.total_paid);
        bal = bal < 0 ? 0 : bal;

        //alert(JSON.stringify(b))
        //invoices_tb
        var temp = calculateBookingTotals(b);

        row +='<div class="col-3 p-2 item"  onclick="previewInvoice(' + b.id + ')"">';
                   row +='<div class="invoice-name clear-fix w-100 payment-item" data-bank-name="DFCU" data-account-name="98398923" data-account-number="040902092039203" data-swift-code="" data-currency="">';
                        row +='<span class="p-2 pull-left text-left">';
                            row +='<b class="invoice_name">'+ b.source +'</b><br>';
                            row +='<b class="invoice_no">'+ b.invoice_no +'</b><br>';
                            row +='<small> USD '+ addCommas(temp[0])+'</small>';
                            row +='</span>';

                    row +='</div>';
                row +='</div>';

     
    });

   

   $("#invoices_tb").html(row)

   
}


</script>



<script>
    



    //happens when a property is selected
    $("#properties").on('change', function() {

        var propertyId = $("#properties option:selected").val();
        //alert(propertyId);
        getAllBookings();



    });

   
   



   
   

</script>
