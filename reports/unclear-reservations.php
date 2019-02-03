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
            <h6> Uncleared Bookings</h6>

            </div>

            <div class="col-md-10 text-right">
                <!--                                    <a class="btn btn-secondary btn-sm" data-target="#new-agent" data-toggle="modal"><i class="fa fa-plus"></i> New Agent</a>-->
                <input class="form-control tiny  mr-1 ml-1" placeholder="search" oninput="searchRevenue(value)" />
                <label class="ml-4 mr-2">Property: </label>
                <select class="form-control tiny" id="properties">
                                     <?php echo $propertyOptions;?>
                                </select>
                <label class="ml-4 mr-2">Period: </label>

                <!--                                    <input class="datepicker form-control tiny"/>-->
                <div class="date-widget">
                    <input class="form-control date-range-input tiny" value="This Month" readonly/>

                    <div class="date-range hide">
                        <li class="r-item range" onclick="timerrange('this_today')">Today</li>
                        <li class="r-item range" onclick="timerrange('this_month')">This Month</li>
                        <li class="r-item range" onclick="timerrange('this_year')"> This Year</li>
                        <li class="r-item range" onclick="timerrange('lifetime')">Lifetime</li>
                        <li class="separator"></li>
                        <li class="r-item" data-target='#specific-date' data-toggle="modal">Specific date</li>
                        <li class="r-item" data-target='#date-range' data-toggle="modal" onclick="timerrange()">Date Range</li>
                        <!--          <li><a>Lifetime</a></li>-->

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="c-body p-0" style="background-color:#fff; border-bottom: 1px solid #eee">
              <table class="table table-bordered table-primary mt-0 table-hover border-bottom-0 p-3" id="uncleared-reservation-tb">
                        <thead>
                            <tr>

                                <th>Res#</th>
                                <th>Booking Name</th>
                                <th>CheckIn</th>
                                <th>Checkout</th>
                                <th>Guests</th>
                                <th>Nights</th>
                                <th>Total Cost</th>
                                <th>Total Paid</th>
                                <th>Bal</th>
                                <th>Invoice#</th>
                                <th>Booked On</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10" style="border-bottom:0;"><br><span id="reservation-report-pagination" class="pull-right"></span></td>
                            </tr>
                        </tfoot>
                    </table>
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
        <small class="ml-4 mt-2 mr-2">Uncleared Reservations Report: <label id="footerReport1"></label>:-<label id="footerReport2"></label></small>
        <a class="pull-right mr-4 mt-1" hidden="hidden"><i class="fa fa-print"></i> print report</a>
        <a class="pull-right mr-4 mt-1" id="savepdf_reservation"><i class="fa fa-file-pdf-o"></i> Export report to PDF</a>
        <!--                            <small class="ml-2 mt-2 mr-4 text-blue pull-right">2 Agents selected</small>-->
    </div>
</div>

<script>
    //    chart

    var period = "";
    var timeperiod = "this_month";
    var pd = "",
        startdate = "",
        enddate = "";

    $(function() {

        $('.date-range-input').on('change', function() {
            //timeperiod = $('.date-range-input').val;
            alert("timeperiod");

        });

        timerrange(timeperiod);

        //called when element with class range are clicked
        $('.range').click(function() {

           get_uncleared_reservations();

        });
    });

    $('.date-range .r-item').click(function() {
        try {
            $('.error-alert').remove();
        } catch (error) {

        }

    })
    // get_uncleared_reservations();
 


    function specific_date_function(d) {
        pd = d;
        period = "specificdate";
        get_uncleared_reservations();

    }

    function date_range_function(s, e) {
        startdate = s;
        enddate = e;
        period = "date_range";
        get_uncleared_reservations();


    }


    // called when time interval in selected
    function timerrange(timeperiod) {

        period = timeperiod;
        //        getProperties();
        get_uncleared_reservations()

        switch (period) {
            case "this_today":
                $('#fromTodate').text("Today ( 00:00 - 23:59 )");
                $('#periodOfTime').text("1 day");
                $('#footerReport2').text("Today ( 00:00 - 23:59 )");
                break;

            case "this_month":
                var now = new Date();
                var ndays = new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();

                $('#fromTodate').text("1 - " + ndays + " (" + now.getDate() + " /" + (now.getMonth() + 1) + " /" + now.getFullYear() + ")");
                $('#periodOfTime').text(ndays + " Days");
                $('#footerReport2').text("( 1 - " + ndays + " (" + now.getDate() + " /" + (now.getMonth() + 1) + " /" + now.getFullYear() + ") )");

                break;

            case "this_year":
                $('#fromTodate').text("January, " + new Date().getFullYear() + " - December, " + new Date().getFullYear());
                $('#periodOfTime').text("12 Months");
                $('#footerReport2').text(" ( January, " + new Date().getFullYear() + " - December, " + new Date().getFullYear() + ") ");
                break;

            default:
                var now = new Date();
                var ndays = new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();

                $('#fromTodate').text("1 - " + ndays + " (" + now.getDate() + " /" + (now.getMonth() + 1) + " /" + now.getFullYear() + ")");
                $('#periodOfTime').text(ndays + " Days");
                $('#footerReport2').text("( 1 - " + ndays + " (" + now.getDate() + " /" + (now.getMonth() + 1) + " /" + now.getFullYear() + ") )");


                break;



        }

    }




    //happens when a property is selected
    $("#properties").on('change', function() {

        var propertyId = $("#properties option:selected").val();
        
        get_uncleared_reservations()




    });

    //gets renue amount and time periods from database
    function get_uncleared_reservations() {
        var propertyId = $("#properties option:selected").val();

        //passes propertyid and period to get.php 
        $.get("src/get_report_data.php", {

            period: period,
            pd: pd,
            startdate: startdate,
            enddate: enddate,
            property: propertyId,
            token: "get_uncleared_reservations"
        }, function(response) {
            // alert(response);
            //console.log(response);
            data = response;
            // setGuests(data);
            set_reservations(data)
        });

    }

    

    function set_reservations(data) {

        var bs = JSON.parse(data);
        var rows = [];
        var row = ''
        $.each(bs, function(i, b) {



            row = "<tr onclick='showDetails(" + i + ")'>";
            row += "<td><b>" + b.booking_reference + "</b></td>";
            row += "<td><b>" + b.booking_name + "</b></td>";
            row += "<td>" + b.check_in_date + "</td>";
            row += "<td>" + b.check_out_date + "</td>";
            row += "<td class='text-right'>" + b.no_guests + "</td>";
            row += "<td class='text-right'>" + b.nights + "</td>";
            row += "<td class='text-right'>$" + addCommas(b.total_cost) + "</td>";
            row += "<td class='text-right'>$" + addCommas(b.total_payment) + "</td>";
            row += "<td class='text-blue text-right'>$" + addCommas(b.balance) + "</td>";
            row += "<td><a href='#' onclick=' previewInvoice(" + b.id + ")'> " + b.invoice_no + "</a></td>";
            row += "<td>" + b.booking_date + "</td>";

            row += "</tr>";

            rows.push(row)
        });

        rows = rows == [] ? "<tr><td colspan='8'><h4 class='text-light text-center'>No Bookings</h4><td></tr>" : rows;


        var tableBody = $("#uncleared-reservation-tb tbody");

        pag(rows, tableBody, '#reservation-report-pagination', 10);

        //        $("#tb-reservations tbody").html(row)
        fixTableHead(".table-primary");


$('#footerReport1').text($("#properties option:selected").text());


    }

    function searchRevenue(s) {
        var filter = s.toUpperCase();

        $("#uncleared-reservation-tb tbody tr").each(function(i, tr) {

            var b_ref = $(tr).find("td:eq(0)").html();
            var b_name = $(tr).find("td:eq(1)").html();
            if (b_ref.toUpperCase().indexOf(filter) > -1 || b_name.toUpperCase().indexOf(filter) > -1) {
                tr.style.display = "";

            } else {
                tr.style.display = "none";

            }
        })


    }

// draw background
var backgroundColor = 'white';
    Chart.plugins.register({
        beforeDraw: function(c) {
            var ctxa = c.chart.ctx;
            ctxa.fillStyle = backgroundColor;
            ctxa.fillRect(0, 0, c.chart.width, c.chart.height);
        }
    });
   
    $('#savepdf_reservation').click(function() {

        
        var pdf = new jsPDF();

        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };
        pdf.text(70, 15, 'UNCLEARED RESERVATIONS REPORT');
       

        var res = pdf.autoTableHtmlToJson(document.getElementById("uncleared-reservation-tb"));
       

        pdf.autoTable(res.columns, res.data, {

            margin: {
                top: 20
            }
        });


        pdf.save("uncleared reservations report.pdf");

    });

</script>
