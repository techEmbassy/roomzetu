<style>
    .table-calendar tr td.confirmed {
        background-color: #383 !important;
        color: #fff;
        font-weight: bold;
    }

    .table-calendar tr td.unconfirmed {
        background-color: #aaa !important;
        color: #fff;
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


<div class="modal " id="room-availability">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">

                <h4 class="modal-title">

                    <small>Room Availability</small>
                </h4>
                <!--
                <select class="form-control tiny" id="roomsproperties" onchange="chosenProperty()">
                                        <?php //echo $propertyOptions; ?>

                                    </select>
-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0 pb-0 ">

                <div class="c-body pt-2 pl-3 pr-3">

                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="m-0"><span id="date-title"></span> <i class="fa fa-calendar btn-icon datepicker" id="monthpicker" data-provide="datepicker"></i> <span class="d"></span></h4>
                        </div>

                        <div class="col-md-4 text-center">
                            <a class="btn-circle" onclick="getHeader('left')"><i class="fa fa-angle-left"></i></a>

                            <a class="btn-circle ml-3 mr-2" onclick="getHeader('right')"><i class="fa fa-angle-right"></i></a>
                        </div>
                        <div class="col-md-5 text-right">
                            <select class="form-control tiny" id="roomsproperties" onchange="chosenProperty()">
                                <?php echo $propertyOptions; ?>

                            </select>

                            <a class="btn btn-secondary btn-35" onclick="resetChart();">
                                This Month</a>

                        </div>
                    </div>


                    <table class="table table-bordered table-calendar table-primary" id="calendar-tb">
                        <thead>

                        </thead>

                        <tbody>

                            <tr>
                                <td colspan="17"><b class="p-2">Nothing to show</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left btn-sm" style="" data-dismiss="modal">Cancel</button>

            </div>

        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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

    function chosenProperty() {
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
            getChart(data.dates);



        })
    }

    function getChart(dates) {

        var pId = $("#roomsproperties option:selected").val();

        var rtId = $("#room-types option:selected").val();
        $.post("src/get_data.php", {
            token: "chart free rooms",
            property_id: pId,
            room_type_id: rtId,
            dates: JSON.stringify(dates)
        }, function(data) {
            // alert(data)
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
                var rtn = item.name;



                rows += "<tr><td colspan='2'>" + rtn + "</td>";

                var rooms = item.rooms;
                //                alert(rooms)
                $.each(rooms, function(i, r) {


                    rows += "<td class='text-center'><span class='available'>" + r + "</span></td>"
                })
                rows += "</tr>";

            })



            //            $.each(data, function(i, item) {

            //room type
            //                var rtn = item.room_type_name;
            //                var rtid = item.room_type_id;
            //                var rooms = item.rooms;
            //                var rc = item.rooms.length;
            //
            //                var firstcell = "<td rowspan='" + rc + "'>" + rtn + "</td>";
            //
            //                //looping all rooms for agents type
            //                $.each(rooms, function(pos, room) {
            //                    var rname = room.room;
            //                    var occupied = room.dates;


            //                    rows += "<tr>" + firstcell +
            //                        "<td>" + rname + "</td>";
            //                    for (var j = 0; j < count; j++) {
            //                        var cell = "";
            //                        $.each(occupied, function(index, item) {
            //                            //if ($("thead tr th[data-date]:eq("+j+")").attr("data-date") == item.checkIn) {
            //
            //                            var currDate = $("thead tr th[data-date]:eq(" + j + ")").attr("data-date");
            //                            var mCurrDate = new Date(currDate);
            //                            var mCheckIn = new Date(item.checkIn);
            //                            var mCheckOut = new Date(item.checkOut);
            //                            var name_ = item.name;
            //                            var nights_ = item.nights + 1;
            //
            //                            var mCurrDate = new Date(currDate);
            //                            if (currDate == item.checkIn) {
            //
            //                                if (nights_ < 3) {
            //                                    name_ = name_.substring(0, 4) + "..";
            //                                }
            //                                cell += "<td colspan='" + nights_ + "' class='on text-center " + item.status + "' title='" + item.name + "'> " + name_ + "</td>";
            //                                j = j + (parseInt(nights_) - 1);
            //
            //                            } else if (mCurrDate <= mCheckOut && mCurrDate > mCheckIn) {
            //                                var colspan = (mCheckOut - mCurrDate) / 1000 / 3600 / 24;
            //
            //                                if (colspan < 3) {
            //                                    name_ = name_.substring(0, 4) + "..";
            //                                }
            //                                ///colspan = colspan+1;
            //                                cell += "<td colspan='" + colspan + "' class='on text-center " + item.status + " ' title='" + item.name + "'> " + name_ + "</td>";
            //                                j = j + colspan;
            //
            //
            //                            }
            //
            //                        });
            //
            //                        cell = cell == "" ? "<td></td>" : cell;
            //                        rows += cell;
            //                    }
            //
            //
            //                    rows += "</tr>";
            //
            //                    firstcell = "";
            //
            //                });

            //            });

            rows = data.length < 1 ? "<tr><td colspan = '17' class='text-center'><h6 class='p-3'><i class='fa fa-exclamation-triangle'></i> No rooms for selected property</h6></td></tr>" : rows;
            tableBody.html(rows);

            console.log(rows)
        } catch (e) {
            console.log(e)
        }


    }

</script>


<script>
    fixSubStrip();
    //fixTableHead(".table-primary");

</script>
