<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <!--    <link rel="stylesheet" type="text/css" href="calendar/components/bootstrap3/css/bootstrap.min.css?v=99"/>-->

    <?php include 'includes/styles.php'?>
    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>

<body class="gray">

    <style>
        ul.nav-list li {
            display: block !important;
            width: 100%;
            margin: 0px;
            font-size: 10pt;
            padding: 5px 10px;
            border: 0px solid #aaa;
            margin: 8px 0;
            background: #eee;
        }

        ul.nav-list li a {
            color: #444;
        }

        .cal-week-box {
            z-index: 20;
        }

        .substrip {
            box-shadows: -6px 0 white, 6px 0 white, 0 5px 10px -3px rgba(0, 0, 0, 0.2);
            margin: 0;
            border-bottom: 1px solid #c0c0c0;
            /*            box-shadow: 0 0 10px rgba(0,0,0,0.3);*/
        }

        h3 {
            font-size: 16pt;
            vertical-align: middle;
        }

        .c-body {
            overflow-x: visible !important;
        }

        .fill-height {
            min-height: 75vh;
            position: relative;
        }

    </style>



    <?php

//    echo time();
    $mpos = 2;
    include 'includes/nav.php';?>

        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 mt-2">

                        <p><small>Manage rooms, room prices and view room availability</small> </p>
                        <hr/>
                        <div class="sub-menu ">
                            <?php $sbPos =2; include 'includes/booking-menu.php'?>
                            <!--<a href="room-types.html">Room Types</a>-->


                        </div>
                        <div class="foot pt-4 pl-2 text-left">
                            <a class="btn btn-sm btn-secondary" href="#choose-booking" data-toggle="modal"><i class="zmdi zmdi-plus"></i> New Booking</a>

                        </div>

                    </div>

                    <div class="col-md-10 mt-2">
                        <div class="card p-0">
                            <div class="header p-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        Bookings Calendar
                                    </div>

                                    <div class="col-md-9 text-right">
                                        <select class="form-control tiny" id="properties" onchange="getRoomTypes2()">

                  <?php echo $propertyOptions;?>


                                    </select>
                                        <select class="form-control tiny" id="room-types-c" onchange='print_calendar()'>
    <option>All room types</option>
    <option>Single Bed</option>
    <option>Double Bed Cottage</option>

                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="c-body p-0">
                                <div class="container-fluid fill-height">
                                    <div class="row fill-height ">
                                        <div class="col-md-12  border-right fill-height">
                                            <div class="substrip pt-2 " style="height:60px; z-index:2">
                                                <div class="page-header p-1 m-0 clearfix">

                                                    <div class="pull-right row" style="width:500px;">
                                                        <div class="calendar-control col-md-6">
                                                            <button class="btn btn-outline-warning btn-sm" data-calendar-nav="prev"><i class="fa fa-angle-left"></i> Prev</button>
                                                            <button class="btn btn-secondary btn-sm" data-calendar-nav="today">Today</button>
                                                            <button class="btn btn-outline-warning btn-sm" data-calendar-nav="next">Next <i class="fa fa-angle-right"></i></button>
                                                        </div>
                                                        <div class="calendar-control col-md-6">
                                                            <button class="btn btn-warning btn-sm" data-calendar-view="year">Year</button>
                                                            <button class="btn btn-warning btn-sm active" data-calendar-view="month">Month</button>
                                                            <!--
                                                    <button class="btn btn-warning" data-calendar-view="week">Week</button>
                                                    <button class="btn btn-warning" data-calendar-view="day">Day</button>
-->
                                                        </div>

                                                    </div>

                                                    <h3 class="p-0 m-0 pull-left text-light">June 2017</h3>
                                                    <!--                                            <small>To see example with events navigate to march 2013</small>-->
                                                </div>
                                            </div>

                                            <div id="calendar" style="margin-top:60px; padding:0 40px;">

                                            </div>
                                        </div>
                                        <!--
<div class="col-md-3">
    <br>
    <h6>All reservations</h6>

    <ul id="eventlist" class="nav-list p-0 m-0">

    </ul>
</div>
-->
                                    </div>
                                </div>

                            </div>
                            <div class="c-footer">
<!--
                                <a><i class="fa fa-circle text-red"></i> Cancelled</a>
                                <a><i class="fa fa-circle-o text-disabled"></i> Un Confirmed</a>
                                <a><i class="fa fa-circle-o text-green"></i> Confirmed</a>

                                <a><i class="fa fa-circle text-green"></i> In house</a>
-->
<!--                                <a class="pull-right m-1 mr-4"><i class="fa fa-print text-gray"></i> Print</a>-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<div class="modal hide fade" id="events-modal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Event</h3>
    </div>
    <div class="modal-body" style="height: 400px">
    </div>
    <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Close</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="choose-booking" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h6 class="modal-title">Select the type of booking</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>


        <div class="btn-group btn-block" >
        <a class="btn btn-outline-success" href="#" onclick="openModal('#new-walk-in')">Walk In</a>
        <a class="btn btn-outline-primary" href="#" onclick="openModal('#new-booking')">Direct or Agent</a>

        </div>


      </div>

    </div>
  </div>

</body>
<?php include 'modals/new-booking.php'; ?>
<?php include 'modals/booking-details.php'; ?>
<?php include 'includes/footer.php';?>

<script src="calendar/components/jquery/jquery.min.js"></script>
<script src="calendar/components/bootstrap3/js/bootstrap.min.js"></script>

<script src="calendar/js/underscore-min.js"></script>
<!--<script src="calendar/js/language/el-GR.js"></script>-->
<script src="calendar/js/calendar.js"></script>
<script src="js/pages/bookings.js"></script>
<!--<script src="calendar/js/app.js?v=889"></script>-->
<script>
    //   $(document).on('click', '[data-calendar-nav]').click(function(){
    //       //alert(333);
    //
    //   })

    fixSubStrip();

</script>

<script>
//     lazyload();
//    setTimeout(function(){
//        hidelazyload()
//    }, 1000)
//
    (function($) {
        //        getProperties2();
        getRoomTypes2()
    }(jQuery));
    function print_calendar() {


        "use strict";


        var property_id = $('#properties').val();
        var room_type_id = $('#room-types-c').val();
        var options = {
            events_source: 'src/bookings.json.php?property_id=' + property_id + '&room_type_id=' + room_type_id,
            view: 'month',
            tmpl_path: 'tmpls/',
            tmpl_cache: false,
            day: "<?php echo date('Y-m-d');?>",
            onAfterEventsLoad: function(events) {

                //alert(JSON.stringify(events));
                if (!events) {
                   return;
                }
                var list = $('#eventlist');
                list.html('');
                //alert(events);
                $.each(events, function(key, val) {
                    $(document.createElement('li'))
                        .html('<a href="' + val.url + '" >' + val.title + '</a>')
                        .appendTo(list);
                });
            },
            onAfterViewLoad: function(view) {
                $('.page-header h3').text(this.getTitle());
                $('.btn-group button').removeClass('active');
                $('button[data-calendar-view="' + view + '"]').addClass('active');
            },
            classes: {
                months: {
                    general: 'label'
                }
            }
        };

        var calendar = $('#calendar').calendar(options);

        $('.calendar-control button[data-calendar-nav]').each(function() {
            var $this = $(this);
            $this.click(function() {
                calendar.navigate($this.data('calendar-nav'));
            });
        });

        $('.calendar-control button[data-calendar-view]').each(function() {
            var $this = $(this);
            $this.click(function() {
                calendar.view($this.data('calendar-view'));
            });
        });

        $('#first_day').change(function() {
            var value = $(this).val();
            value = value.length ? parseInt(value) : null;
            calendar.setOptions({
                first_day: value
            });
            calendar.view();
        });

        $('#language').change(function() {
            calendar.setLanguage($(this).val());
            calendar.view();
        });

        $('#events-in-modal').change(function() {
            var val = $(this).is(':checked') ? $(this).val() : null;
            calendar.setOptions({
                modal: val
            });
        });
        $('#format-12-hours').change(function() {
            var val = $(this).is(':checked') ? true : false;
            calendar.setOptions({
                format12: val
            });
            calendar.view();
        });
        $('#show_wbn').change(function() {
            var val = $(this).is(':checked') ? true : false;
            calendar.setOptions({
                display_week_numbers: val
            });
            calendar.view();
        });
        $('#show_wb').change(function() {
            var val = $(this).is(':checked') ? true : false;
            calendar.setOptions({
                weekbox: val
            });
            calendar.view();
        });
        $('#events-modal .modal-header, #events-modal .modal-footer').click(function(e) {
            //e.preventDefault();
            //e.stopPropagation();
        });
    }

    //    function getProperties2() {
    //
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
    //
    //            $("#properties-c").html(o);
    //            //alert(1);
    //            getRoomTypes2();
    //        })
    //    }

    function getRoomTypes2() {


        var sel = $("#room-types-c");
        sel.prop("disabled", true);

        //alert(2);
        //tinyloader("#room-loader", "");

        var property_id = $("#properties-c option:selected").val();

        //alert(property_id);

        $.post('src/get_data.php', {
            token: "roomtypes",
            property_id: property_id
        }, function(data) {
            var o = "<option value='0'>All room types</option>";
            //alert(data)
            var rts = JSON.parse(data);
            $.each(rts, function(i, rt) {
                o += "<option value='" + rt.id + "'>" + rt.name + "</option>";
            });

            //alert(o)
            sel.html(o);
            sel.prop("disabled", false);
            $("#room-loader").html("");

            print_calendar();

        })
    }

</script>
