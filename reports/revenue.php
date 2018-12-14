<style>
    .table th {
        background-color: #f0f0f0
    }
    
    .table td {
        vertical-align: middle;
    }
    
    .q,
    .w,
    .z,
    .e,
    .v,
    .r,
    .t,
    .y {
        background-color: #FF4500;
    }
    
    .u,
    .i,
    .x,
    .o,
    .b,
    .p,
    .a,
    .m,
    .s {
        background-color: #00BFFF;
    }
    
    .d,
    .f,
    .c,
    .g,
    .h,
    .n,
    .j,
    .k,
    .l {
        background-color: #228B22;
    }

</style>
<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Revenue
            </div>

            <div class="col-md-9 text-right">
                <!--                                    <a class="btn btn-secondary btn-sm" data-target="#new-agent" data-toggle="modal"><i class="fa fa-plus"></i> New Agent</a>-->

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
        <div class="container p-0">


            <div class="row m-0">
                <div class="col-md-12 pt-3">

                    <h3 class="text-light">
                        <lable id="total_amount"> </lable><small class="pull-right" style="font-size:12pt;" id="timecollection">
                        <b><label class="pull-right" id="propertyname"></label></b><br><label id="fromTodate"> </label><br><label id="periodOfTime" class="pull-right"></label></small></h3>
                    <!--                  <hr/>-->
                    <div class="graph">
                        <canvas id="revenue-chart" width="600" height="200 "></canvas>
                    </div>
                </div>



            </div>
            <br/>
            <div class="row m-0" style="background-color:#f9f9f9; border-top:1px solid #eee">
                <div class="col-md-12 p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="m-3" id="table-title">Revenue Details</h5>
                        </div>
                        <div class="col-md-8 text-right">
                            <input class="form-control tiny m-3" placeholder="search" oninput="searchRevenue(value)" />
                        </div>
                    </div>
                    <table class="table" id="revenue-tb">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Client</th>
                                <th>Total Amount</th>
                                <th>Payment Method</th>
                                <th>Receipt</th>
                                <th>Recorded By</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" style="border-bottom:0;"><br><span id="revenue-pagination" class="pull-right"></span></td>
                            </tr>
                        </tfoot>
                    </table>
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
        <a class="pull-right mr-4 mt-1" hidden="hidden"><i class="fa fa-print"></i> print report</a>
        <a class="pull-right mr-4 mt-1" id="savepdf_revenue"><i class="fa fa-file-pdf-o"></i> Export report to PDF</a>
        <a title="Export to Report Excel " class=" pull-right mb-1  mr-4 mt-1" onclick="saveCsv('csv_revenue')"><i class="fa fa-download"></i> Export CSV</a>

        <!--                            <small class="ml-2 mt-2 mr-4 text-blue pull-right">2 Agents selected</small>-->
    </div>
</div>

<script>
    var period = "";
    var revenue_amount = [];
    var timelabels = [];
    //    chart
    var ctx = $("#revenue-chart").get(0);

    var timeperiod = "this_month";
    var pd = "",
        startdate = "",
        enddate = "";

    //primary function, loads as soon as the page finishes loading
    $(function() {

        $('.date-range-input').on('change', function() {
            //timeperiod = $('.date-range-input').val;
            alert("timeperiod");

        });

        timerrange(timeperiod);

        //called when element with class range are clicked
        $('.range').click(function() {

            get_revenue();
        });
    });

    $('.date-range .r-item').click(function() {
        try {
            $('.error-alert').remove();
        } catch (error) {

        }

    })



    // draw background
    var backgroundColor = 'white';
    Chart.plugins.register({
        beforeDraw: function(c) {
            var ctxa = c.chart.ctx;
            ctxa.fillStyle = backgroundColor;
            ctxa.fillRect(0, 0, c.chart.width, c.chart.height);
        }
    });
    var canvasr = document.getElementById('revenue-chart');
    $('#savepdf_revenue').click(function() {

        var imgData = canvasr.toDataURL("image/jpeg", 1.0);



        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };



        var tbl = $('#revenue-tb').clone();


        tbl.find('tr th:nth-child(1), tr td:nth-child(1)').remove();

        var cellWidth = 45,
            rowCount = 0,
            cellContents,
            leftMargin = 20,
            topMargin = 135,
            topMarginTable = 55,
            headerRowHeight = 13,
            rowHeight = 13,

            l = {
                orientation: 'l',
                unit: 'mm',
                format: 'a4',
                compress: true,
                fontSize: 10,
                lineHeight: 1,
                autoSize: false,
                printHeaders: true
            };
        var pdf = new jsPDF(l, '', '', '');
        //        var doc = new jsPDF(l, '', '', '');

        var tbl = $('#revenue-tb').clone();


        tbl.find('tr th:nth-child(1), tr td:nth-child(1)').remove();

        pdf.setProperties({
            title: 'Revenue Report',
            subject: 'Auto Generated Revenue Reports',
            author: 'roomzetu',
            keywords: 'roomzetu reports',
            creator: 'roomzetu'
        });
        pdf.text(80, 15, 'REVENUE REPORT');
        var html1 = $("#total_amount").html();
        pdf.fromHTML(html1, 20, 30, {
            'width': 50,
            'elementHandlers': specialElementHandlers
        });

        var html = $("#timecollection").html();
        pdf.fromHTML(html, 200, 25, {
            'width': 150,
            'elementHandlers': specialElementHandlers
        });

        pdf.addImage(imgData, 'JPEG', 10, 50, 250, 90);

        //        var html3 = $("#table-title").html();
        //        pdf.fromHTML(html3, 20, 145, {
        //            'width': 100,
        //            'elementHandlers': specialElementHandlers
        //        });


        var res = pdf.autoTableHtmlToJson(document.getElementById("revenue-tb"));

        pdf.addPage();
        pdf.text(30, 15, 'PAYMENTS');

        pdf.autoTable(res.columns, res.data, {

            margin: {
                top: 20
            }
        });


        pdf.save("revenue report.pdf");

    });

    function tableToJson(table) {
        var data = [];

        // first row needs to be headers
        var headers = [];
        for (var i = 0; i < table.rows[0].cells.length; i++) {
            headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi, '');
        }


        // go through cells
        for (var i = 0; i < table.rows.length; i++) {

            var tableRow = table.rows[i];
            var rowData = {};

            for (var j = 0; j < tableRow.cells.length; j++) {

                rowData[headers[j]] = tableRow.cells[j].innerHTML;

            }

            data.push(rowData);
        }

        return data;
    }


    function specific_date_function(d) {
        pd = d;
        period = "specificdate";
        get_revenue();
    }

    function date_range_function(s, e) {
        startdate = s;
        enddate = e;
        period = "date_range";
        get_revenue();

    }


    // called when time interval in selected
    function timerrange(timeperiod) {

        period = timeperiod;
        //        getProperties();
        get_revenue()
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

    //gets all properties from the database
    //    function getProperties() {
    //        $.post('src/get_data.php', {
    //            token: "properties"
    //        }, function(data) {
    //            var o = "<option value=0> All Properties</option>";
    //
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
    //            get_revenue();
    //        })
    //
    //    }

    //happens when a property is selected
    $("#properties").on('change', function() {

        var propertyId = $("#properties option:selected").val();
        //alert(propertyId);
        get_revenue();




    });



    //gets renue amount and time periods from database
    function get_revenue() {
        var propertyId = $("#properties option:selected").val();


        //passes propertyid and period to get.php 
        $.get("src/get_report_data.php", {
            period: period,
            pd: pd,
            startdate: startdate,
            enddate: enddate,
            property: propertyId,
            token: "get_revenue_data"
        }, function(response) {
            //alert(response);
            console.log(response);
            data = response;
            setRevenue(data);
        });

    }

    //sets details from database to html table
    function setRevenue(data) {
        var datau = JSON.parse(data);
        revenue_amount = []; //setting array to zero
        timelabels = [];
        var rows = [];
        var table = $("#revenue-tb");
        var tableBody = table.find('tbody');
        $.each(datau.tableData, function(i, item) {

            var bd = item.guest_id;
            var bn = item.NAME;

            var bta = item.AMOUNT;
            var pm = item.payment_method;

            var btp = item.DATE_PAID;
            var rb = item.Recorded_By;
            //            var brd = item.recordedby;


            if(pm!=="method"){

                 var row = "<tr>" +
                "<td><span class='circle " + bn.charAt(0).toLowerCase() + "'>" + bn.charAt(0).toUpperCase() + "</span></td>" +
                "<td>" + bn + "</td>" +
                "<td>" + bta + "</td>" +
                "<td>" + pm + "</td>" +
                "<td>---</td>" +
                "<td>" + rb + "</td>" +
                "<td>" + btp + "</td>" +

                "</tr>"

            rows.push(row);
            }

            

        })

        //        tableBody.html(rows);



        // computing the over all total amount of checked data
        for (var i = 0; i < 100000; i++) {
            var sum = datau.graphData.amount.reduce(function(pv, cv) {
                return pv + parseInt(cv);
            }, 0);
        }

        $('#total_amount').text("Total Revenue: $" + sum); // displaying the sum 

        graphs(datau.graphData.amount, datau.graphData.labels); // calls the graph function and pass data and labels
        pag(rows, tableBody, '#revenue-pagination', 10);

        $("#propertyname").text($("#properties option:selected").text());
        $('#footerReport1').text($("#properties option:selected").text());

    }









    function graphs(revenue, label) {
        //myChart.destroy();

        var myChart = new Chart(ctx, {

            type: 'line',
            data: {
                labels: label,
                datasets: [{
                        label: "",
                        data: revenue,
                        backgroundColor: [
                            'rgba(255, 55, 0, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(200,0,0,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }

                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        type: 'linear',
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

    function searchRevenue(s) {
        var filter = s.toUpperCase();

        $("#revenue-tb tbody tr").each(function(i, tr) {

            var b_ref = $(tr).find("td:eq(1)").html();
            if (b_ref.toUpperCase().indexOf(filter) > -1) {
                tr.style.display = "";

            } else {
                tr.style.display = "none";

            }
        })


    }

    function saveCsv(tok) {

        var propertyId = $("#properties option:selected").val();
        location.href = "reports/csv.php?period=" + period + "&pd=" + pd + "&startdate=" + startdate + "&enddate=" + enddate + "&property=" + propertyId + "&tok=" + tok;

        //passes propertyid and period to get.php 
        //        $.get("reports/csv.php", {
        //            period: period,
        //            pd: pd,
        //            startdate: startdate,
        //            enddate: enddate,
        //            property: propertyId,
        //            tok: "csv_revenue"
        //        }, function(response) {
        //            alert(response);
        //            //console.log(response);
        //            data = response;
        //            //setOverview(data);
        //        });

    }

</script>
