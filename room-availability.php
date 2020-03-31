<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php';?>
</head>
<style>
    .table-calendar tr td.confirmed {
        background-color: #009688 !important;
        color: #fff;
        font-weight: bold;
        cursor: pointer !important;
        
    }
    
    .table-calendar tr td.unconfirmed {
        background-color: #aaa !important;
        color: #fff;
        cursor: pointer !important;
    }
    
    .table-calendar tr td {
        overflow: hidden;
        padding: 4px 0 !important;
        /*     width: 50px;*/

    }
    
    .table-calendar tr td:nth-child(1),
    .table-calendar tr td:nth-child(2) {
        padding: 4px !important;
        /*     width: 50px;*/
    }

</style>


<body class="gray">
    <?php $mpos=3; include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2 pr-0">

                    <p><small>Manage rooms, room prices and view room availability</small> </p>
                    <hr/>
                    <div class="sub-menu ">
                        <?php $sbPos=2;include 'includes/rooms-menu.php';?>


                    </div>
                    <div class="foot pt-4 pl-2 text-left hide">
                        <a class="btn btn-sm btn-secondary"><i class="zmdi zmdi-plus"></i> New Room type</a>

                    </div>

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">
                            <div class="row">
                                <div class="col-md-3">
                                    Room Chart
                                </div>

                                <div class="col-md-9 text-right">
                                    <select class="form-control tiny" id="properties" onchange="getChart()">
                                     <?php echo $propertyOptions;?>
                                    </select>
                                    <!--
                                    <select class="form-control tiny">
    <option>All room types</option>
    <option>Single Bed</option>
    <option>Double Bed Cottage</option>
    
                                    </select>
-->
                                </div>
                            </div>
                        </div>
                        <div class="c-body p-0 pl-3 pr-3">

                            <div class="substrip pt-2 ">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="m-0"><span id="date-title"></span> <i class="fa fa-calendar btn-icon datepicker" id="monthpicker" data-provide="datepicker"></i> <span class="d"></span></h4>
                                    </div>

                                    <div class="col-md-4 text-center">
                                        <a class="btn-circle" onclick="getHeader('left')"><i class="fa fa-angle-left"></i></a>

                                        <a class="btn-circle ml-3 mr-2" onclick="getHeader('right')"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                    <div class="col-md-4 text-right">

                                        <a class="btn btn-secondary btn-sm" onclick="resetChart();">
                                            This Month</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered table-calendar table-primary mt-5" id="calendar-tb">
                                <thead>

                                </thead>

                                <tbody>

                                    <tr>
                                        <td colspan="17"><b class="p-2">Loading Chart...</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="c-footer">

                            <a><i class="fa fa-circle text-green"></i> Confirmed</a>

                            <a><i class="fa fa-circle text-disabled"></i> Un Confirmed</a>
                            <a><i class="fa fa-circle text-red"></i> Cancelled</a>


                            <a class="pull-right m-1 mr-4"><i class="fa fa-print text-gray"></i> Print</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<?php include 'modals/booking-details.php'; ?>

<?php include 'modals/preview-invoice.php';?>
<?php include 'includes/footer.php';?>
<script src="js/pages/bookings.js"></script>

<script>
    var d = "[]";
    var b = 0;
    
    var month_ = <?php echo date('m')?>;
    var year_ = <?php echo date('Y')?>;
    var day_ = <?php echo date('d')?>;
 

    b = day_ > 15 ? 1 : 0;
    getHeader(0);


    $('#monthpicker').datepicker().on('changeDate', function() {
        var sdate = $(this).datepicker('getDate');
        year_ = sdate.getFullYear()
        month_ = sdate.getMonth() + 1;
        day_ = sdate.getDate()

        b = day_ > 15 ? 1 : 0;
        getHeader(0);

    });

    function resetChart() {
        month_ = <?php echo date('m')?>;
        year_ = <?php echo date('Y')?>;
        day_ = <?php echo date('d')?>;
        b = day_ > 15 ? 1 : 0;
        getHeader(0);

    }





    function getHeader(i) {
        b = i == "left" ? b - 1 : b + 1;



        if (b > 2) {
            b = 1;
            month_++;
        } else if (b < 1) {
            month_--;
            b = 2;
        }
        if (month_ == 0) {
            month_ = 12;
            year_--;
        }
        if (month_ == 13) {
            month_ = 1;
            year_++;
        }

        //        alert(month_);

        $.post("src/get_header.php", {
            year: year_,
            month: month_,
            batch: b
        }, function(data) {
            //            alert(data)
            data = JSON.parse(data);

            $("#date-title").html(data.date);
            $("#calendar-tb thead").html(data.header);
            getChart();



        })
    }

    function getChart() {
        var pId = $("#properties option:selected").val();
        var rtId = $("#room-types option:selected").val();
        $.post("src/get_data.php", {
            token: "chart",
            property_id: pId,
            room_type_id: rtId
        }, function(data) {
            refreshTable(data);
            fixTableHeader("#calendar-tb");
        })
    }

    function refreshTable(data) {

        try {
            var data = JSON.parse(data);
            var rows = "";
            var table = $("#calendar-tb");
            var tableBody = table.find('tbody');
            var count = table.find("thead tr th").length - 2;
            $.each(data, function(i, item) {

                //room type
                var rtn = item.room_type_name;
                var rtid = item.room_type_id;
                var rooms = item.rooms;
                var rc = item.rooms.length;

                var firstcell = "<td style='background-color:white !important' rowspan='" + rc + "'>" + rtn + "</td>";

                //looping all rooms for agents type
                $.each(rooms, function(pos, room) {
                    var rname = room.room;
                    var occupied = room.dates;


                    rows += "<tr>" + firstcell +
                        "<td style='background-color:white !important'>" + rname + "</td>";
                    for (var j = 0; j < count; j++) {
                        var cell = "";
                        $.each(occupied, function(index, item) {
                            //if ($("thead tr th[data-date]:eq("+j+")").attr("data-date") == item.checkIn) {

                            var currDate = $("thead tr th[data-date]:eq(" + j + ")").attr("data-date");
                            var mCurrDate = new Date(currDate);
                            var mCheckIn = new Date(item.checkIn);
                            var mCheckOut = new Date(item.checkOut);
                            var name_ = item.name;
                            var nights_ = item.nights + 1;

                            var mCurrDate = new Date(currDate);
                            if (currDate == item.checkIn) {

                                if (nights_ < 3) {
                                     name_ = name_.length>6?name_.substring(0, 6) + "..":name_;
                                }
                                
                                var colspan = nights_;
                                cell += "<td colspan='" + colspan + "' class='on text-center " + item.status + "' title='" + item.name + "' onclick='viewBooking(" + item.booking_id + ")'> " + name_ + "</td>";
                                j = j + colspan -1;//(parseInt(nights_) - 1);

                            } else if (mCurrDate < mCheckOut && mCurrDate > mCheckIn) {
                                var colspan = (mCheckOut - mCurrDate) / 1000 / 3600 / 24;

                                if (colspan < 3) {
                                    name_ = name_.length>6?name_.substring(0, 6) + "..":name_;
                                }
                                ///colspan = colspan+1;
                                cell += "<td colspan='" + colspan + "' class='on text-center " + item.status + "' title='" + item.name + "' onclick='viewBooking(" + item.booking_id + ")'> " + name_ + "</td>";
                                j = j + colspan;


                            }

                        });

                        cell = cell == "" ? "<td></td>" : cell;
                        rows += cell;
                    }


                    rows += "</tr>";

                    firstcell = "";

                });

            });

            rows = data.length < 1 ? "<tr><td colspan = '17' class='text-center'><h6 class='p-3'><i class='fa fa-exclamation-triangle'></i> No rooms for selected property</h6></td></tr>" : rows;
            tableBody.html(rows);

            //            console.log(rows)
        } catch (e) {
            console.log(e)
        }


    }

    function viewBooking(id) {


        $.post("src/get_data.php", {
            token: "booking",
            booking_id: id,

        }, function(data) {
        
           showDetails(data)

        });

    }

</script>


<script>
    fixSubStrip();
//    fixTableHead(".table-primary");
    
 

   
    var ppid = 0;

    function setPropertyId(c) {
        ppid = c;
    }

    function getPropertyId() {
        return ppid;
    }

</script>
