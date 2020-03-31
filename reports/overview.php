<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Overview
            </div>

            <div class="col-md-9 text-right">
                <!--                                    <a class="btn btn-secondary btn-sm" data-target="#new-agent" data-toggle="modal"><i class="zmdi zmdi-plus"></i> New Agent</a>-->

                <label class="ml-4 mr-2">Property: </label>
                <!--
                <select class="form-control tiny" id="properties">
                    <option>Clouds</option><option>Semiliki</option>
                </select>
-->
                <select class="form-control tiny" id="properties">
                                     <?php echo $propertyOptions;?>
                                </select>
                <label class="ml-4 mr-2">Period: </label>

                <!--                                    <input class="datepicker form-control tiny"/>-->
                <div class="date-widget">
                    <input class="form-control date-range-input tiny" value="This Month" readonly />

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
    <div class="c-body p-2">
        <div class="container" id="container_overall">


            <div class="row">
                <div class="col-md-4">
                    <div class="card report-item">
                        <div class="card-header p-1">
                            <h6 class="card-title p-2 m-0">
                                <i class="fa fa-bar-chart"></i> Revenue

                                <a title="save" class="fa fa-download btn-circle pull-right mb-1 tiny" onclick="saveCsv('csv_revenue')"></a>

                            </h6>
                        </div>
                        <div class="card-body p-3">
                            <h3 class="text-light"><label id="revenue_amount">$200,997</label> <small><label id="revenue_period">since 2 June 2017</label></small></h3>
                            <!--                  <hr/>-->
                            <div class="graph">
                                <canvas id="revenue-chart" width="600" height="300 "></canvas>
                            </div>
                        </div>
                        <div class="card-footer p-0 pr-3">
                            <a title="report details" class="pull-right mb-1 link  <?php echo $sbPos == 2? 'active':''?>" href="reports.php?v=revenue">More Details</a>

                        </div>


                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card report-item">
                        <div class="card-header p-1">
                            <h6 class="card-title p-2 m-0">
                                <i class="fa fa-users"></i> Guests

                                <a title="save" class="fa fa-download btn-circle pull-right mb-1 tiny" onclick="saveCsv('csv_guests')"></a>

                            </h6>
                        </div>
                        <div class="card-body p-3">
                            <h3 class="text-light"><label id="guests_number">13</label> <small><label id="guests_period">since 2 June 2017</label></small></h3>
                            <!--                  <hr/>-->
                            <div class="graph">
                                <canvas id="guests-chart" width="600" height="300 "></canvas>
                            </div>
                        </div>
                        <div class="card-footer p-0 pr-3">
                            <a title="report details" class="pull-right mb-1 link <?php echo $sbPos == 3? 'active':''?>" href="reports.php?v=guests">More Details</a>
                        </div>




                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card report-item">
                        <div class="card-header p-1">
                            <h6 class="card-title p-2 m-0">
                                <i class="fa fa-circle-o"></i> Reservations

                                <a title="save" class="fa fa-download btn-circle pull-right mb-1 tiny" onclick="saveCsv('csv_reservations')"></a>

                            </h6>
                        </div>
                        <div class="card-body p-3">
                            <h3 class="text-light"><label id="reservation_amount"></label> <small><label id="reservation_period">since 2 June 2017</label></small></h3>
                            <!--                  <hr/>-->
                            <div class="graph">
                                <canvas id="source-chart" width="600" height="300 "></canvas>
                            </div>
                        </div>
                        <div class="card-footer p-0 pr-3">
                            <a title="report details" class="pull-right mb-1 link <?php echo $sbPos == 4? 'active':''?>" href="reports.php?v=reservations">More Details</a>
                        </div>





                    </div>
                </div>

                <div class="col-md-8 mt-4">
                    <div class="card report-item">
                        <!--
             <div class="card-header p-1">
              <h6 class="card-title p-2 m-0">
                  <i class="fa fa-hotel"></i> Rooms
                  
                  <a title="save" class="fa fa-download btn-circle pull-right mb-1 tiny"></a>
                 
                 </h6>
             </div>
-->
                        <div class="card-body p-3">
                            <h5 class="text-lighted"><i class="fa fa-circle-o text-green"></i> Top Rooms <small><label id="toprooms_period">from 2 June 2017  to 30 June 2017</label></small></h5>
                            <!--                  <hr/>-->
                            <div class="graph">
                                <!--                  <canvas id="source-chart" width="600" height="300 "></canvas>-->

                                <table class="table" id="guest-accomodation-table">
                                    <thead>
                                        <tr>
                                            <th>Room type</th>
                                            <th>Total Reservations</th>
                                            <th>Total Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer p-0 pr-3">
                            <a title="report details" class="pull-right mb-1 link <?php echo $sbPos == 6? 'active':''?>" href="reports.php?v=accomodation">More Details</a>
                        </div>



                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card report-item">
                        <!--
             <div class="card-header p-1">
              <h6 class="card-title p-2 m-0">
                  <i class="fa fa-hotel"></i> Rooms
                  
                  <a title="save" class="fa fa-download btn-circle pull-right mb-1 tiny"></a>
                 
                 </h6>
             </div>
-->
                        <div class="card-body p-3">
                            <h5 class="text-lightd"><i class="fa fa-circle-o text-green"></i> Top Agents <small><label id="topagents_period">from 2 June 2017 to 30 June 2017</label></small></h5>
                            <!--                  <hr/>-->
                            <div class="graph">
                                <!--                  <canvas id="source-chart" width="600" height="300 "></canvas>-->

                                <table class="table" id="agent-reservation-table">
                                    <thead>
                                        <tr>
                                            <th>Agent</th>
                                            <th>Reservations</th>
                                            <!--                          <th>Total Revenue</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer p-0 pr-3">
                            <a title="report details" class="pull-right mb-1 link <?php echo $sbPos == 5? 'active':''?>" href="reports.php?v=agents">More Details</a>
                        </div>




                    </div>
                </div>
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

        <small class="ml-4 mt-2 mr-2">Revenue Report: <label id="footerReport1"></label><label id="footerReport2"></label></small>
        <a class="pull-right mr-4 mt-1" hidden="hidden"><i class="fa fa-print" ></i> print report</a>
        <a class="pull-right mr-4 mt-1" id="savepdf_overall" l><i class="fa fa-file-pdf-o" ></i> Export report to PDF</a>

        <!--                            <small class="ml-2 mt-2 mr-4 text-blue pull-right">2 Agents selected</small>-->
    </div>
</div>

<script>
    var period = "";
    var revenue_amount = [];
    var timelabels = [];
    //    chart
    var ctx = $("#revenue-chart").get(0);
    var ctxguests = $("#guests-chart").get(0);
    var ctxsource = $("#source-chart").get(0);
    var timeperiod = "this_month";
    var pd = "",
        startdate = "",
        enddate = "";
    $(function() {



        timerrange(timeperiod);



        //called when element with class range are clicked
        $('.range').click(function() {

            get_overview();
        });
    });

    $('.date-range .r-item').click(function() {
        try {
            $('.error-alert').remove();
        } catch (error) {

        }

    })






    var canvas1 = document.getElementById('revenue-chart');
    var canvas2 = document.getElementById('guests-chart');
    var canvas3 = document.getElementById('source-chart');

    // draw background
    var backgroundColor = 'white';
    Chart.plugins.register({
        beforeDraw: function(c) {
            var ctxa = c.chart.ctx;
            ctxa.fillStyle = backgroundColor;
            ctxa.fillRect(0, 0, c.chart.width, c.chart.height);
        }
    });

    $('#savepdf_overall').click(function() {

        var imgData1 = canvas1.toDataURL("image/jpeg", 1.0);
        var imgData2 = canvas2.toDataURL("image/jpeg", 1.0);
        var imgData3 = canvas3.toDataURL("image/jpeg", 1.0);

        var pdf = new jsPDF('p', 'pt');


        var res = pdf.autoTableHtmlToJson(document.getElementById("agent-reservation-table"));
        var res2 = pdf.autoTableHtmlToJson(document.getElementById("guest-accomodation-table"));
        pdf.text(200, 40, 'Overview Report');

        pdf.addImage(imgData1, 'JPEG', 20, 60, 200, 150);
        pdf.text(50, 75, 'Revenue Graph');


        pdf.addImage(imgData2, 'JPEG', 270, 60, 200, 150);
        pdf.text(340, 75, 'Guests Graph');


        pdf.addImage(imgData3, 'JPEG', 20, 225, 200, 150);
        pdf.text(50, 240, 'Reservations Graph');

        var html3 = $("#table-title").html();
        pdf.text(50, 435, 'Top Agent');

        pdf.autoTable(res.columns, res.data, {
            margin: {
                top: 445
            }
        });
        pdf.text(50, pdf.autoTableEndPosY() + 40, 'Top Rooms');
        pdf.autoTable(res2.columns, res2.data, {
            margin: {
                top: pdf.autoTableEndPosY() + 50
            }
        });


        //        pdf.autoTable(res.columns, res.data, options); // pdf.autoTable(res2.columns, res2.data, options2);


        pdf.save("overall.pdf");
        //        // pdf.print();
        //        var blob = pdf.output('blob');
        //        var rr = window.open(URL.createObjectURL(blob));
        //        print(rr);
        //      




        //pdf.save("revenue report.pdf");

    });


    function specific_date_function(d) {
        pd = d;
        period = "specificdate";
        timerrange(period);

    }

    function date_range_function(s, e) {
        startdate = s;
        enddate = e;
        period = "date_range";
        timerrange(period);

    }


    // called when time interval in selected
    function timerrange(timeperiod) {

        period = timeperiod;
        //        getProperties();
        get_overview();

        switch (period) {
            case "this_today":
                var now = new Date();
                $('#revenue_period,#guests_period,#reservation_period').text("Since (" + now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear() + " 00:00)");
                $('#toprooms_period,#topagents_period').text("From (00:00 to 23:59) " + now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear());
                $('#footerReport2').text("Today ( 00:00 - 23:59 )");
                break;

            case "this_month":
                var now = new Date();
                var ndays = new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();

                $('#revenue_period, #guests_period,#reservation_period').text("Since (01/ " + (now.getMonth() + 1) + "/ " + now.getFullYear() + ")");

                $('#toprooms_period,#topagents_period').text("From (01/ " + (now.getMonth() + 1) + "/ " + now.getFullYear() + " to " + ndays + "/ " + (now.getMonth() + 1) + "/ " + now.getFullYear() + ")");

                $('#footerReport2').text("( 1 - " + ndays + " (" + now.getDate() + " /" + (now.getMonth() + 1) + " /" + now.getFullYear() + ") )");

                break;

            case "this_year":
                $('#revenue_period, #guests_period,#reservation_period').text("Since January, " + new Date().getFullYear());
                $('#toprooms_period,#topagents_period').text("From January, " + new Date().getFullYear() + " - December, " + new Date().getFullYear());
                $('#footerReport2').text(" ( January, " + new Date().getFullYear() + " - December, " + new Date().getFullYear() + ") ");
                break;

            case "lifetime":
                $('#revenue_period, #guests_period,#reservation_period,#toprooms_period,#topagents_period,#footerReport2').text("Lifetime ");

                break;

            case "specificdate":
                var specdate = new Date(pd);
                $('#revenue_period, #guests_period,#reservation_period,#footerReport2').text("Since (" + specdate.getDate() + "/" + (specdate.getMonth() + 1) + "/" + specdate.getFullYear() + " 12:00 AM)");
                $('#toprooms_period,#topagents_period').text("From (00:00 to 23:59) " + specdate.getDate() + "/" + (specdate.getMonth() + 1) + "/" + specdate.getFullYear());
                break;

            case "date_range":
                var s = new Date(startdate);
                var e = new Date(enddate);
                $('#revenue_period, #guests_period,#reservation_period,#toprooms_period,#topagents_period,#footerReport2').text("From " + s.getDate() + "/" + (s.getMonth() + 1) + "/" + s.getFullYear() + "\xa0\xa0" + " to " + "\xa0\xa0" + e.getDate() + "/" + (e.getMonth() + 1) + "/" + e.getFullYear());

                break;

            default:
                var now = new Date();
                var ndays = new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();

                $('#revenue_period, #guests_period,#reservation_period').text("Since (01 /" + (now.getMonth() + 1) + " /" + now.getFullYear() + ")");

                $('#footerReport2').text("( 1 - " + ndays + " (" + now.getDate() + " /" + (now.getMonth() + 1) + " /" + now.getFullYear() + ") )");


                break;



        }


    }

    //gets all properties from the database
    //    function getProperties() {
    //        $.post('src/get_data.php', {
    //            token: "properties"
    //        }, function(data) {
    //            var o = "<option value=0> All Properties</option>";
    //
    //            var properties = JSON.parse(data);
    //            $.each(properties, function(i, property) {
    //                o += "<option value='" + property.id + "'>" + property.property_name + "</option>";
    //
    //            });
    //
    //
    //            $("#properties").html(o);
    //
    //            get_overview();
    //        })
    //
    //    }

    //happens when a property is selected
    $("#properties").on('change', function() {

        var propertyId = $("#properties option:selected").val();
        //alert(propertyId);
        get_overview();


    });

    function saveCsv(tok) {

        var propertyId = $("#properties option:selected").val();
        location.href = "reports/csv.php?period=" + period + "&pd=" + pd + "&startdate=" + startdate + "&enddate=" + enddate + "&property=" + propertyId + "&tok=" + tok;

        //passes propertyid and period to get.php 
        $.get("reports/csv.php", {
            period: period,
            pd: pd,
            startdate: startdate,
            enddate: enddate,
            property: propertyId,
            tok: "csv_revenue"
        }, function(response) {
            //alert(response);
            //console.log(response);
            data = response;
            //setOverview(data);
        });

    }

    //gets renue amount and time periods from database
    function get_overview() {
        var propertyId = $("#properties option:selected").val();



        //passes propertyid and period to get.php 
        $.get("src/get_report_data.php", {
            period: period,
            pd: pd,
            startdate: startdate,
            enddate: enddate,
            property: propertyId,
            token: "get_overview_data"
        }, function(response) {
            //alert(response);
            //console.log(response);
            data = response;
            setOverview(data);
        });

    }

    //sets details from database to html table
    function setOverview(data) {
        var datau = JSON.parse(data);



        // computing the over all total amount of checked data
        for (var i = 0; i < 100; i++) {
            var sum1 = datau.revenue_data[2].reduce(function(pv, cv) {
                return pv + parseInt(cv);
            }, 0);
        }
        $('#revenue_amount').text("$" + sum1); // displaying the sum 

        for (var i = 0; i < 100; i++) {
            var sum2 = datau.guests_data[2].reduce(function(pv, cv) {
                return pv + parseInt(cv);
            }, 0);
        }
        $('#guests_number').text(sum2 + " Guests"); // displaying the sum 

        for (var i = 0; i < 100; i++) {
            var sum3 = datau.reservations_data[2].reduce(function(pv, cv) {
                return pv + parseInt(cv);
            }, 0);
        }
        $('#reservation_amount').text(sum3 + " Reservations"); // displaying the sum 

        RevenueGraph(datau.revenue_data[0], datau.revenue_data[1]); // calls the graph function and pass data and labels
        GuestGraph(datau.guests_data[0], datau.guests_data[1]); // calls the graph function and pass data and labels
        ReservationGraph(datau.reservations_data[0], datau.reservations_data[1]); // calls the graph function and pass data and labels

        var rows_r = "";
        var table_r = $("#agent-reservation-table");
        var tableBody_r = table_r.find('tbody');
        $.each(datau.agents_data, function(i, item) {

            var rl = item.label;
            var rr = item.amount;


            rows_r += "<tr>" +

                "<td>" + rl + "</td>" +
                "<td>" + rr + "</td>" +

                "</tr>"

        })
        // alert(datau.agents_data);
        tableBody_r.html(rows_r); //display dynamically generated table rows



        var rows_a = "";
        var table_a = $("#guest-accomodation-table");
        var tableBody_a = table_a.find('tbody');
        $.each(datau.top_room_types_data.graphData, function(i, item) {
            var an = item.name;
            var ab = item.bookings;
            var aa = item.amount;

            rows_a += " <tr > " +
                "<td> " + an + " </td>" +
                " <td> " + ab + " </td>" +
                " <td> $ " + addCommas(aa) + " </td>" +
                " </tr>"
        })
        // alert(datau.agents_data);
        tableBody_a.html(rows_a);
        //        display dynamically generated table rows
        $("#propertyname").text($("#properties option:selected").text());
        $('#footerReport1').text($("#properties option:selected").text());



    }





    function RevenueGraph(revenue, label) {
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label,
                datasets: [{
                    label: "",
                    data: revenue,
                    backgroundColor: [
                        'rgba(100, 99, 22, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(100,99,22,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: ''
                },
                responsive: true
            }
        });

    }

    function GuestGraph(guests, label) {
        var guestChart = new Chart(ctxguests, {
            type: 'line',
            data: {
                labels: label,
                datasets: [{
                    label: "",
                    data: guests,
                    backgroundColor: [
                        'rgba(100, 200, 22, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(6,100,22,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: ''
                },
                responsive: true
            }
        });
    }

    function ReservationGraph(reservation, label) {
        var sourceChart = new Chart(ctxsource, {
            type: 'bar',
            data: {
                labels: label,
                datasets: [{
                    label: "",
                    data: reservation,
                    backgroundColor: [
                        'rgba(100, 200, 22, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(6,100,22,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: ''
                },
                responsive: true
            }
        });
    }

</script>
