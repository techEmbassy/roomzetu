<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>
<?php //echo makeGenericEmail("<p>Hello John</p><p>After all one's victory is another's victory, just more of the same. I love taking \"Malwa\" for togetherness we end up exchanging straws while in drink up!</p>");?>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php';?>

    <style>
        td small {
            color: #999;
        }

        .card.fill-parent {
            position: relative;
            overflow-x: hidden;
        }

        .card.fill-parent .foot {
            position: absolute;
            bottom: 0;
            padding: 4px;
            border-top: 1px solid #edf2f9;
            left: 0;
            right: 0;
            background: #f5f7fb;
        }

        .circle {
            height: 30px;
            width: 30px;
            border-radius: 30px !important;
            line-height: 30px;
            text-align: center;
            border: 0px solid #ddd;
            background: orange;
            color: #fff;
        }

        p span {
            display: inline-block;
            vertical-align: middle;
        }

        .purple {
            background: purple;
        }

        .green {
            background: cadetblue;
        }

        .available {
            font-size: 15px !important;
            color: #00796B;
        }

        .black-bg {
            background-color: #f9fbfd;
        }



        .metric-flush {
            margin: .5rem -1px .5rem 1px;
        }

        .metric-row {
            margin-bottom: 1.25rem;
            border-radius: .25rem;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -10px;
            margin-left: -10px;
        }

        .metric-flush>.col,
        .metric-flush>[class="col-*"] {
            margin-left: -1px;
            padding-right: 0;
            padding-left: 0;
        }

        @media (min-width: 576px) {
            .metric-flush>.col:first-child>.metric,
            .metric-flush>[class="col-*"]:first-child>.metric {
                border-top-right-radius: 0;
                border-top-left-radius: .25rem;
                border-bottom-left-radius: .25rem;
            }

            .metric-flush>.col:first-child>.metric,
            .metric-flush>[class="col-*"]:first-child>.metric {
                border-top-left-radius: .25rem;
                border-top-right-radius: .25rem;
            }

            .metric-flush .metric {
                margin: 0;
                border-radius: 0;
            }

            .metric-row .metric {
                margin: .5rem 0;
                min-height: 8.5rem;
            }

            .metric-hoverable,
            a.metric {
                color: inherit;
                outline: 0;
                cursor: pointer;
            }

            .metric-bordered {
                border: 1px solid #d4d5d7;
            }
        }

        @media (min-width: 576px) {
            .metric {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
            }

            .metric {
                position: relative;
                padding: 1rem;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%;
                border-radius: .25rem;
                cursor: default;
            }

            .metric-label:first-child {
                margin-bottom: .5rem;
            }

            .metric-label {
                font-size: .875rem;
                font-weight: 500;
                color: #686f76;
                white-space: nowrap;
            }

            .metric-value {
                margin-bottom: 0;
                line-height: 1;
                white-space: nowrap;
            }

            .metric-value>sub {
                bottom: 0;
            }

            .metric-value>sub,
            .metric-value>sup {
                color: #a9acb0;
                font-size: .5em;
            }

            .metric-value .value {
                vertical-align: middle;
            }
        }

        .home-card .card-header {
            position: absolute;
            width: 100%;
            z-index: 3;
        }

        .home-card .card-body {
            overflow-y: auto;
            padding-top: 63px;
            padding-bottom: 63px;

        }

        .home-card {
            overflow: hidden;
        }

        .home-card tr:first-child td {
            border-top: none !important;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            border: 1px solid #edf2f9;
            border-radius: .5rem !important;
            background-color: #fff;
            background-clip: border-box;
        }

        .text-muted {
            color: #95aac9!important;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: center;
            border-top: 1px solid #edf2f9;
        }

    </style>

</head>
<?php
//    $pr_id = $_SESSION['login']["property_id"];



    ?>


<body class="gray">
    <?php $mpos=1; include 'includes/nav.php';?>
    <div class="main-content">
        <div class="container-fluid pt-1">
            <div class="card p-0 ">
                <!--                    <div class="header p-3">-->
                <div class="" style="background-color:#f9fbfd; border-bottom:1px solid #edf2f9; padding:.5rem">
                    <div class="row">
                        <div class="col-md-12">

                            <a class="p-4" style="color:#34495E; padding-top:4px !important"> Dashboard <span class="load"></span></a>
                            <!--                                                            &raquo;&nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="javascript:void(0);" onclick="javascript:introJs().start();"> Take A Tour</a>-->
                            <div class="pull-right text-light">


                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="button" value="Check Room Availability" class="btn-secondary tiny" style="cursor:pointer" href="#room-availability" data-toggle="modal" />
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="properties" onchange="dosomething()">
                                            <?php echo $propertyOptions;?>
                                        </select>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>



                <div class="c-body p-2 black-bg">
                    <div class="row fill-parent m-0">










                        <div class="col-md-6 fill-parent pt-2">
                            <div class="p-0 fill-parent bg-transparent">



                                <div class="row">
                                    <div class="col-12 col-lg-6 col-xl" style="">
                                        <!-- Card -->
                                        <div class="card" style="margin-bottom: 1.5rem;box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03);">
                                            <div class="card-body" style="padding: 1.2rem;flex: 1 1 auto;">
                                                <div class="row align-items-center">
                                                    <div class="col">

                                                        <!-- Title -->
                                                        <h6 class="card-title text-uppercase text-muted mb-2" style="color: #95aac9!important; font-size:.625rem;">
                                                            Total Rooms
                                                        </h6>

                                                        <!-- Heading -->
                                                        <span class="h2 mb-0" style="font-size:20px" id="count">

                                                        </span>

                                                    </div>
                                                    <div class="col-auto mr-2">

                                                        <!-- Icon -->
                                                        <span class="h2 fa fa-hotel text-muted mb-0"></span>

                                                    </div>
                                                </div>
                                                <!-- / .row -->

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-6 col-xl m-0 p-0" style="">
                                        <!-- Card -->
                                        <div class="card" style="margin-bottom: 1.5rem;box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03);">
                                            <div class="card-body" style="padding: 1.2rem;flex: 1 1 auto;">
                                                <div class="row align-items-center">
                                                    <div class="col">

                                                        <!-- Title -->
                                                        <h6 class="card-title text-uppercase text-muted mb-2" style="color: #95aac9!important; font-size:.625rem;">
                                                            Occupancy
                                                        </h6>

                                                        <!-- Heading -->
                                                        <span class="h2 mb-0" style="font-size:20px" id="p_rooms">

                                                        </span>

                                                    </div>
                                                    <div class="col-auto mr-2">

                                                        <!-- Icon -->
                                                        <span class="h2 fa fa-check text-muted mb-0"></span>

                                                    </div>
                                                </div>
                                                <!-- / .row -->

                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-12 col-lg-6 col-xl" style="">
                                        <!-- Card -->
                                        <div class="card" style="margin-bottom: 1.2rem;box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03);">
                                            <div class="card-body" style="padding: 1.2rem;flex: 1 1 auto;">
                                                <div class="row align-items-center">
                                                    <div class="col">

                                                        <!-- Title -->
                                                        <h6 class="card-title text-uppercase text-muted mb-2" style="color: #95aac9!important; font-size:.625rem;">
                                                            Free Rooms
                                                        </h6>

                                                        <!-- Heading -->
                                                        <span class="h2 mb-0" style="font-size:20px" id="Available_Rooms">

                                                        </span>

                                                    </div>
                                                    <div class="col-auto mr-2">

                                                        <!-- Icon -->
                                                        <span class="h2 fa fa-circle-o-notch text-muted mb-0"></span>

                                                    </div>
                                                </div>
                                                <!-- / .row -->

                                            </div>
                                        </div>

                                    </div>
                                </div>







                                <!--notifications-->
                                <div class="parent-7">
                                    <div class="card p-2 fill-parent">
                                        <p class="mb-2" style="color:#34495E"><span><i class="fa fa-bell text-green"></i> Notifications</span> <span class="circle pull-right green" id="numnoticea"></span></p>
                                        <table class="nttable table">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!--checkin today-->
                        <div class="col-md-3 fill-parent  p-2">
                            <div class="card p-0 fill-parent home-card" id="card-checkins-today">
                                <div class="card-header" style="background-color: transparent; border-bottom: 1px solid #edf2f9;">
                                    <p class="mb-2" style="color:#1A5276"><span><i class="fa fa-sign-in text-green"></i> Check-ins Today</span> <span class="circle pull-right" id="rvs"></span></p>
                                </div>
                                <div class="card-body fill-parent">

                                    <table class="table" id="check-ins-table">


                                    </table>
                                </div>

                                <div class="foot">
                                    <a class="btn btn-secondary btn-sm pull-right" href="reservations?v=all"> <i class="fa fa-circle-o"></i> All Reservations</a>
                                </div>

                            </div>
                        </div>




                        <!--inhouse guests-->
                        <div class="col-md-3 fill-parent p-2" style="color:#5D6D7E">
                            <div class="card p-0 fill-parent home-card" id="card-inhouse">
                                <div class="card-header" style="background-color: transparent; border-bottom: 1px solid #edf2f9;">
                                    <p class="mb-2" style="color:#117864"><span><i class="fa fa-circle text-green"></i> In House Guests</span> <span class="circle pull-right purple" id="in_house_guests"></span></p>
                                </div>
                                <div class="card-body fill-parent">

                                    <table class="table table-hover" id="in-house-guests-tb">



                                    </table>
                                </div>

                                <div class="foot">
                                    <a class="btn btn-secondary btn-sm pull-right" href="room-availability"> <i class="fa fa-circle-o"></i> Room chart</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="c-footer pl-4 text-right border-0">
                <?php echo $timeLeftFooter; ?>
            </div>


        </div>



    </div>
</body>
<?php include 'includes/footer.php';?>
<?php include 'modals/check-availablity.php'; ?>
<?php include 'modals/booking-details.php'; ?>
<?php include 'modals/preview-invoice.php' ?>

<script src="js/pages/bookings.js?v=<?php echo time();?>"></script>
<script>
    function startLoader() {
        $('.load').html("<i class='fa fa-spin fa-spinner'></i>");
    }

    function stopLoader() {
        $('.load').html("");
    }

    var checkinstoday = "[]",
        inhouse = "[]";
    $(function() {
        startDatePicker();
        $(document).on("mouseover", "#card-checkins-today", function() {
            bookings = checkinstoday;
        })

        $(document).on("mouseover", "#card-inhouse", function() {
            bookings = inhouse;
        })
    })

    var data;
    var welcome = <?php echo $_SESSION['welcome']; ?>;
    <?php $_SESSION['welcome'] = 0; ?>;


    var bookings = "[]";
    if (welcome == 1) {
        alertify.success("<i class='fa fa-check-circle'></i> Welcome to Roomzetu");

    }

    // alertify.success("<i class='fa fa-check-circle'></i> Welcome to Reservations System");

    // $(document).one('ready', function(){
    //      alertify.success("<i class='fa fa-check-circle'></i> Welcome to Reservations System")
    //  });

    $(function() {

        getAllNotices();
        allRoomsCount();
        check_in_today();
        in_house_guests();
        holding()
    });

    var allRooms;

    //happens when a property is selected
    $("#properties").on('change', function() {

        var propertyId = $("#properties option:selected").val();
        getAllNotices();
        allRoomsCount();
        check_in_today();
        in_house_guests();

    });

    function allRoomsCount() {
        startLoader();
        var propertyId = $("#properties option:selected").val();
        $.get("src/get_dash.php", {
            property: propertyId,
            token: "allRoomsCount"
        }, function(response) {
            stopLoader()
            var datau = JSON.parse(response);
            $p_rooms = parseInt(datau.o_rooms) / parseInt(datau.rooms) * 100;
            $p_rooms = $p_rooms.toFixed(1);
            $p_rooms = isNaN($p_rooms) ? 0.0 : $p_rooms;
            $('#count').text(datau.rooms);
            $('#occupied_rooms').html(datau.o_rooms + "<small style='font-size:10px; !important'>rooms</small>");
            $('#p_rooms').text($p_rooms + "%");
            $('#Available_Rooms').text(datau.av_rooms);


        });


    }



    function check_in_today() {
        startLoader();
        var propertyId = $("#properties option:selected").val();
        $.post("src/get_data.php", {
            property: propertyId,
            "token": "reservations",
            filter: "check_in_today"
        }, function(response) {
            data = response;
            //console.log(data);
            checkinstoday = data;
            set_check_in_today(data);
            stopLoader();
        });

    }


    function set_check_in_today(data) {
        var datau = JSON.parse(data);
        //$('#rvs').text(datau.ct);
        $('#rvs').text(datau.length);
        var table = $("#check-ins-table");

        var rows = "";
        $.each(datau, function(i, item) {
            //                console.log(item.name)
            var nights = parseInt(item.nights) == 1 ? item.nights + " Night" : item.nights + " Nights";
            var guests = item.guests.length == 1 ? item.guests.length + " Guest" : item.guests.length + " Guests";
            var name = item.source;
            var subtitle = nights + ", " + guests;
            rows += "<tr onclick='showDetails(" + i + ")'><td><a>" + name + "</a><br><small>" + subtitle + "</small></td></tr>";
        });

        if (datau.length < 1) {
            rows = "<tr><td><p class='text-muted mt-4'>No check-ins today</h5></td></tr>";
        }

        table.html(rows);


    }


    function in_house_guests() {
        startLoader();
        var propertyId = $("#properties option:selected").val();
        $.post("src/get_data.php", {
            property: propertyId,
            token: "reservations",
            filter: "in_house_guests"
        }, function(response) {
            data = response;
            //                bookings = JSON.parse(response)['guests_data'];
            //                bookings = JSON.stringify(bookings);
            //console.log(bookings)
            inhouse = response;
            set_in_house_guests(data);
            stopLoader();
        });

    }

    //        function in_house_guests() {
    //            var propertyId = $("#properties option:selected").val();
    //            $.get("src/get_data.php", {
    //                property: propertyId,
    //
    //                token: "reservations"
    //            }, function(response) {
    //                console.log(response)
    // data = response;
    // bookings = JSON.parse(response)['guests_data'];
    //bookings = JSON.stringify(bookings);
    //console.log(bookings)
    //set_in_house_guests(data);
    //});

    // }

    function set_in_house_guests(data) {
        var datau = JSON.parse(data);
        $('#in_house_guests').text(datau.length);

        var rows = "";
        var table = $("#in-house-guests-tb");

        $.each(datau, function(i, item) {


            var b_id = item.id;
            var a_id = item.agent_id;

            var s = item.booking_source;

            var d1 = item.check_out_date;
            var d2 = item.check_out_date;
            var name = item.source;

            //                var nights = parseInt(item.nights) == 1 ? item.nights +" Night" : item.nights+" Nights";
            var guests = item.guests.length == 1 ? item.guests.length + " Guest" : item.guests.length + " Guests";


            rows += "<tr data-toggle='tooltip' title='Checkout on " + d1 + ", Morning'>" +
                "<td onclick='showDetails(" + i + ")'><b>" + name + "</b><p><span>" + guests + "</span><small class='ml-auto pull-right'><i class='fa fa-arrow-left' style='font-size:11px; color:orange'></i> " + d1 + "</small> </p></td>";


        })
        if (datau.length < 1) {
            rows = "<tr><td><p class='text-muted mt-4'>No Guest In-House</h5></td></tr>";
        }

        table.html(rows);
        $('[data-toggle="tooltip"]').tooltip()

    }

    //setTimeout(getAllNotices, 6000);

    function getAllNotices() {
        startLoader();
        var propertyId = $("#properties option:selected").val();
        $.get("src/get.php", {
            property: propertyId,
            "table": "notice_v",
            "reference": "1",
            "col_name": "company_id",
            token: "dash notices"
        }, function(response) {
            //                alert(response);
            data = response;
            setAllNotices(data);
            stopLoader();
            // data = JSON.parse(response);
            // alert(data.company_name)
        });

    }

    function setAllNotices(data) {
        var notices = JSON.parse(data);
        console.log(notices.length);
        $('#numnoticea').text(notices.length);
        var rows = "";
        var today = new Date();

        $.each(notices, function(i, notice) {


            //                rows += " <tr><td><a>" + notice.note + "</a><br><small>" + notice.name + ", " + notice.created + "</small></td></a></tr><hr>";

            var d = today - new Date(notice.created);
            d = d / 1000 / 3600 / 24;
            d = Math.floor(d);
            d = d == 0 ? 'today' : d + ' days Ago';


            rows += '<tr><td><div class="row " style="border-bottom:1px# FAFAFA solid;">' +
                '<div class="col-md-8" style="font-size:12px "><a>' + notice.note + ' <br><small>Pinned by<span>~ ' + notice.name + '</span></small></a></div>' +
                '<div class="col-md-3 pull-right "><small><a>' + d + '</a></small></div>' +
                '<div class="col-md-1 pull-right "><a onclick="removeNotice(' + notice.id + ')"><i class="fa fa-close "></i></a></div></div></td></tr>';



        });



        $(".nttable").html(rows);
        if (rows == "") {
            $(".nttable").html("<tr><td><p class='text-muted py-5 my-3'>No new Notifications</p></td></tr>")
        }
        //fixTableHead(".table-primary");
    }

    function holding() {

        $.get("src/get_dash.php", {

            token: "holding period"
        }, function(response) {
            //             alert(response);

        });

    }

    function removeNotice(id) {
        $.post("src/update.php", {
            page: "notice",
            result: 1,
            notice_id: id,
        }, function(response) {
            //                alert(response);
            alertify.success("Notice Successfully removed from your Notice Board");
            getAllNotices()

        })
    }




    function viewBooking(id) {
        $.post("src/get_data.php", {
            token: "one_reservations",
            booking_id: id
        }, function(data) {
            bookings = data;
            showDetails(bookings)
        })
    }

</script>
