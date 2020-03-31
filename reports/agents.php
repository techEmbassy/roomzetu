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
            <div class="col-md-3">
                Agents' reservations
            </div>

            <div class="col-md-9 text-right">
                <!--                                    <a class="btn btn-secondary btn-sm" data-target="#new-agent" data-toggle="modal"><i class="zmdi zmdi-plus"></i> New Agent</a>-->



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
    <div class="c-body p-0" style="background-color:#fff; border-bottom: 1px solid #eee">
        <div class="container p-0">


            <div class="row m-0">
                <div class="col-md-12 pt-3">

                    <h3 class="text-light">
                        <lable id="total_amount"></lable><small class="pull-right" style="font-size:12pt;" id="timecollection">
                        <b></b><br><label id="fromTodate"></label><br><label id="periodOfTime" class="pull-right"></label></small></h3>
                    <!--                  <hr/>-->
                    <div class="graph">
                        <canvas id="agents-chart" width="600" height="200 "></canvas>
                    </div>
                </div>



            </div>
            <br/>

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
        <small class="ml-4 mt-2 mr-2">Agents Report: <label id="footerReport2"></label></small>
        <a class="pull-right mr-4 mt-1" hidden="hidden"><i class="fa fa-print"></i> print report</a>
        <a class="pull-right mr-4 mt-1" id="savepdf_agents"><i class="fa fa-file-pdf-o"></i> Export report to PDF</a>
        <!--                            <small class="ml-2 mt-2 mr-4 text-blue pull-right">2 Agents selected</small>-->
    </div>
</div>

<script>
    //    chart

    var period = "";
    //    chart
    var ctxagents = $("#agents-chart").get(0);
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

            get_agents();
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
    var canvasr = document.getElementById('agents-chart');
    $('#savepdf_agents').click(function() {

        var imgData = canvasr.toDataURL("image/jpeg", 1.0);

        var pdf = new jsPDF();

        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };
        pdf.text(70, 15, 'AGENTS BOOKING REPORT');
        var html1 = $("#total_amount").html();
        pdf.fromHTML(html1, 20, 30, {
            'width': 50,
            'elementHandlers': specialElementHandlers
        });

        var html = $("#timecollection").html();
        pdf.fromHTML(html, 150, 25, {
            'width': 150,
            'elementHandlers': specialElementHandlers
        });

        pdf.addImage(imgData, 'JPEG', 10, 50, 170, 60);
        pdf.save("agents booking report.pdf");

    });

    function specific_date_function(d) {
        pd = d;
        period = "specificdate";
        get_agents();
    }

    function date_range_function(s, e) {
        startdate = s;
        enddate = e;
        period = "date_range";
        get_agents();

    }


    // called when time interval in selected
    function timerrange(timeperiod) {

        period = timeperiod;
        get_agents();
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




    //gets renue amount and time periods from database
    function get_agents() {

        //passes propertyid and period to get.php 
        $.get("src/get_report_data.php", {

            period: period,
            pd: pd,
            startdate: startdate,
            enddate: enddate,

            token: "get_agents_data"
        }, function(response) {
            //alert(response);
            //console.log(response);
            data = response;
            setAgents(data);
        });

    }

    //sets details from database to html table
    function setAgents(data) {
        var datau = JSON.parse(data);

        // computing the over all total amount of checked data
        for (var i = 0; i < 100000; i++) {
            var sum = datau.graphData.amount.reduce(function(pv, cv) {
                return pv + parseInt(cv);
            }, 0);
        }

        $('#total_amount').text(sum + " Reservations"); // displaying the sum 

        graphs(datau.graphData.amount, datau.graphData.labels); // calls the graph function and pass data and labels


    }





    function graphs(agents, label) {
        var agentChart = new Chart(ctxagents, {
            type: 'bar',
            data: {
                labels: label,
                datasets: [{
                    label: "",
                    data: agents,
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
