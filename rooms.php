<?php include 'includes/auth.php'?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php'?>
</head>

<style>


</style>

<body class="gray">
    <?php $mpos=3; include 'includes/nav.php';?>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2">

                    <p><small>Manage rooms, room prices and view room availability</small> </p>

                    <hr>

                    <div class="sub-menu ">
                        <?php $sbPos=1; include 'includes/rooms-menu.php';?>


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
                                    Room Status
                                </div>

                                <div class="col-md-9 text-right">
                                    <!--                                    <input class="tiny form-control" placeholder="search room"/>-->
                                    <select class="form-control tiny" id="properties" onchange="getRooms()">
                                        <?php echo $propertyOptions; ?>

                                    </select>
                                    <select class="form-control tiny hide" disabled id="roomtypes">
                                        <option value="0">All room types</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="c-body p-0">
                            <table class="table table-bordered table-primary mt-0" id="rooms-tb">
                                <thead>
                                    <tr>
                                        <th>Room type <i class="fa fa-angle-down"></i> </th>
                                        <th>Room Name</th>
                                        <th>Occupied?</th>
                                        <th>Next occupying date <i class="fa fa-angle-up"></i></th>
                                        <th>Status</th>
                                        <th style="width:40px"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<div class="modal" id="edit-room-status">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content animated zoomIn">

            <div class="modal-header">
                <h4 class="title"><small>Change Room Status</small> </h4>
                <!--                <a class="close" data-dismiss="modal">x</a>-->
            </div>
            <div class="modal-body">

                <h5 id="r-name-"></h5>
                <label id="label-">Change status</label>


                <div class="jumbotron  dropdown p-0 clearfix mb-0">
                    <span class="d-status ml-2"><i class="fa fa-square text-green"></i> Ready</span>
                    <button class="btn btn-sm btn-warning pull-right " data-toggle='dropdown'>change</button>
                    <div class="dropdown-menu p-0 dropdown-menu-right r-status">
                        <!--                        <a class="dropdown-item" onclick="" data-status="unconfirmed"><i class="fa fa-circle-o text-disabled"></i> Unconfirmed</a>-->
                        <a class="dropdown-item" onclick="hidePeriod()" data-status="ready">
                            <i class="fa fa-square text-green"></i> Ready</a>
                        <a class="dropdown-item" onclick="showPeriod()" data-status="dirty"><i class="fa fa-square text-orange"></i> Dirty</a>
                        <a class="dropdown-item" onclick="showPeriod()" data-status="broken"><i class="fa fa-square text-red"></i> Renovation</a>
                    </div>
                </div>

                <div id="period_" class="col-md-12 p-0 m-0 mt-1">

                    <label>Period</label>
                    <div class="input-group">
                        <input class="datepicker form-control" id="start_date" required data-empty-message="select start date" data-placement="right" />

                        <span class="input-group-append" id="basic-addon2">
                            <span class="input-group-text px-2" style="background-color:#fafafa">to</span>
                        </span>

                        <input class="datepicker form-control" id="end_date" placeholder="" required data-empty-message="select end date" data-placement="right" />
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal"><i class="zmdi zmdi-close"></i> Close</a>
                <a id="change_status" href="#" class="btn btn-primary"><i class="zmdi zmdi-check"></i> Save</a>
            </div>
        </div>
    </div>

</div>


<?php include 'includes/footer.php'?>

<script>
    var roomId__ = 0,
        DATA = "[]",
        STATUS = {
            ready: "<i class='zmdi zmdi-check-circle text-green'></i> Ready</a>",
            dirty: "<i class='zmdi zmdi-alert-triangle text-orange'></i> Dirty</a>",
            broken: "<i class='zmdi zmdi-circle text-red'></i> Renovation</a>"
        };
    var room_status = "";


    $(function() {

        getRooms();
    });

    $(document).on("click", ".dropdown-item[data-status]", function() {
        var status = $(this).attr('data-status');
        var statusBox = $(".d-status");
        var roomId = getRoomId();
        var label = $("#label-").text();
        //  $("#label-").html("<i class='fa fa-spin fa-spinner'></i> Changing status...");

        //alert(status)
        room_status = status;
        statusBox.html(STATUS[status]);

        /*
        $.post("src/xhr.php", {
            action: "change room status",
            room_id: roomId,
            status: status
        }, function(data) {

            if (data == 1) {
                $("#label-").html(label);

                statusBox.html(STATUS[status]);
                getRooms();
            } else {
                alertify.error("Something went wrong");
            }
        })*/

    });

    $(document).on("click", "#change_status", function() {
        var status = room_status;
        // var statusBox = $(".d-status");
        var roomId = getRoomId();
        var label = $("#label-").text();


        var x = document.getElementById("period_");

        if (x.style.display != "none") {


            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            if (start_date.length != 0 && end_date != 0) {
                $("#label-").html("<i class='fa fa-spin fa-spinner'></i> Changing status...");

                end_date_ = end_date.split("/");
                end_date = end_date_[2] + "-" + end_date_[0] + "-" + end_date_[1];


                start_date_ = start_date.split("/");

                start_date = start_date_[2] + "-" + start_date_[0] + "-" + start_date_[1];


                var period = JSON.stringify({
                    start_date: start_date,
                    end_date: end_date
                });

                $.post("src/xhr.php", {
                    action: "change room status",
                    room_id: roomId,
                    status: status,
                    period: period
                }, function(data) {

                    if (data == 1) {
                        $("#label-").html(label);
                        // alert(data);
                        //statusBox.html(STATUS[status]);
                        getRooms();
                    } else {
                        alertify.error("Something went wrong");
                    }
                })

            } else {

                $("#label-").html("Please spacify the period");
            }



        } else {

            $("#label-").html("<i class='fa fa-spin fa-spinner'></i> Changing status...");

            $.post("src/xhr.php", {
                action: "change room status",
                room_id: roomId,
                status: status
            }, function(data) {

                if (data == 1) {
                    $("#label-").html(label);

                    //statusBox.html(STATUS[status]);
                    getRooms();
                } else {
                    alertify.error("Something went wrong");
                }
            })
        }





        //alert(status)
        //statusBox.html(STATUS[status]);




    });

    function getRooms() {
        var pId = $("#properties option:selected").val();
        var rtId = $("#roomtypes option:selected").val();

        $.post('src/get_data.php', {
            token: "all rooms",
            property_id: pId,
            room_type_id: rtId
        }, function(data) {

            //alert(data);
            DATA = data;

            refreshTable(data);

        })
    }

    function hidePeriod() {


        var x = document.getElementById("period_");
        x.style.display = "none";

    }

    function showPeriod() {


        var x = document.getElementById("period_");
        x.style.display = "block";

    }

    function refreshTable(data) {


        try {
            var data = JSON.parse(data);
            var rows = "";
            var table = $("#rooms-tb");
            var tableBody = table.find('tbody');
            //tableBody.html("<tr><td colspan=6>"+loaderBig+"</td></tr>")
            $.each(data, function(i, item) {

                //room type
                var rtn = item.room_type_name;
                var rtid = item.room_type_id;
                var rooms = item.rooms;
                var rc = item.rooms.length;

                var firstcell = "<td rowspan='" + rc + "'>" + rtn + "</td>";
                //looping all rooms for room type
                $.each(rooms, function(pos, room) {
                    var rname = room.name;
                    var rstatus = room.status == null ? "---" : STATUS[room.status];
                    var occupiedIcon = room.occupied == "yes" ? "<i class='fa fa-circle on'></i> " + room.occupied : "";
                    rows += "<tr>" +
                        firstcell +
                        "<td>" + rname + "</td>" +
                        "<td>" + occupiedIcon + "</td>" +
                        "<td>" + room.next_date + "</td>" +
                        "<td>" + rstatus + "</td>" +
                        "<td><i class='zmdi zmdi-edit btn-circle' data-toggle='modal' data-target='#edit-room-status' onclick='setRoomId(" + i + ", " + pos + ")'></i></td>" +
                        "</tr>";
                    firstcell = "";
                });


            })

            tableBody.html(rows);
            fixTableHead(".table-primary");

            if (rows == "") {

                tableBody.html("<tr><td colspan='7' style='background-color:#fff'><p class='text-muted p-5'>Looks like you have no rooms set up. Go to <br><b>manage rooms</b> to set up. </p></td></tr>");


            }
            console.log(rows)
        } catch (e) {
            console.log(e)
        }


    }



    function setRoomId(i, j) {
        /*edit clicke, set room id, status & name */
        var rt = JSON.parse(DATA)[i];

        // alert(JSON.stringify(rt));
        var rms = rt.rooms[j];

        var rtName = rt.room_type_name,
            rName = rms.name,
            c = rms.id,
            s = rms.status;
        $("#r-name-").text(rtName + " : " + rName);

        end_date = rms.end_date;



        end_date_ = end_date.split("-");

        end_date = end_date_[1] + "/" + end_date_[2] + "/" + end_date_[0];

        start_date = rms.start_date;
        start_date_ = start_date.split("-");

        start_date = start_date_[1] + "/" + start_date_[2] + "/" + start_date_[0];

        if (rms.end_date === '0000-00-00') {
            $("#start_date").val("");
            $("#end_date").val("");

        } else {
            $("#start_date").val(start_date);
            $("#end_date").val(end_date);

        }


        roomId__ = c;
        //alert(STATUS[s])
        room_status = s;
        if (STATUS[s] === "<i class='fa fa-square text-green'></i> Ready</a>") {

            hidePeriod();
        } else {

            showPeriod();
        }
        $(".d-status").html(STATUS[s])
    }

    function getRoomId() {
        return roomId__;
    }

</script>
