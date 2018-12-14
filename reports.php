<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php';?>
</head>

<style>
    th {
        background: #fff;
        border: none !important
    }

    td input {
        color: #555;
    }

    td {
        border-color: #ccc !important;
    }

</style>


<style>
    .date-widget {
        position: relative;
        height: auto;
        width: 200px;
        display: inline-block;
        text-align: right;
    }

    .date-widget input.tiny {
        width: 100%;
    }

    div.date-range {
        border: 1px solid #ccc;
        position: absolute;
        top: 100%;
        width: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 100;
        background: #fff;
        /*        display: none;*/
    }

    .date-range li {
        list-style: none;
        padding: 5px 10px;
        margin: 2px;
    }

    .date-range li:hover {
        background: #eee;
        cursor: pointer;
    }

    .date-range li.separator {
        border-bottom: 1px solid #aaa;
        background: none !important;
        cursor: default !important;
        margin: 10px 0;
        padding: 0
    }

    .report-item small {
        font-size: 50%;
        color: #888;
        display: inline-block;
        float: right;
        vertical-align: middle
    }

    .report-item small span {
        font-size: 90%;
        color: #666;
        font-weight: bold !important;
        display: block;
        float: right;
        margin-bottom: 4px
    }

    .fa.tiny {
        font-size: 10pt
    }

    .report-item .btn-circle {}

    .report-item .card-body h5 {
        font-size: 13pt;
        margin-bottom: 10px;
        color: cadetblue
    }

    .report-item .card-body h3 {
        color: cadetblue
    }

    .report-item .card-body h5 small {
        font-size: 10pt;
        max-width: 50%;
        padding-bottom: 10px;
    }

    .report-item .card-body {
        min-height: 240px;
    }

    a.link {
        color: #822;
        font-size: 10pt;
    }

    a.link:hover {
        text-decoration: underline;
        color: #822;
        font-size: 10pt;
    }

</style>
<script src="chart/jspdf.min.js"></script>
<script src="chart/filesaver.min.js"></script>
<script src="chart/Chart.js"></script>
<script src="chart/jspdf.debug.js"></script>
<script src="chart/jspdf.plugin.autotable.js"></script>





<body class="gray">
    <?php  $mpos = 6; include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2 pr-0">
                    <p><small>Reports on rooms, guests, reservations, agents and Revenue</small> </p>
                    <hr/>
                    <div class="sub-menu ">
                        <?php $sbPos = 1; include 'includes/reports-menu.php'; ?>
                    </div>
                    <div class="foot pt-4 pl-2 text-left">
                        <!-- <a class="btn btn-sm btn-secondary"><i class="fa fa-plus"></i> New Room type</a>-->

                    </div>

                </div>

                <div class="col-md-10 mt-2">
                    <?php $page = isset($_GET['v'])? $_GET['v'].'.php' : 'overview.php'; include "reports/".$page;?>
                </div>
            </div>
        </div>
    </div>
</body>



<?php include 'modals/new-mail.php'?>
<?php include 'modals/new-agent.php'?>
<?php include 'modals/preview-invoice.php';?>

<?php include 'includes/footer.php'?>

<script>
    $('.datepicker').datepicker({
        autoclose: true
    })
    $(document).on('click', '.date-range .r-item.range', function(e) {
        //e.stopPropagation();
        $('input.date-range-input').val($(this).text());
        $('.date-range').toggleClass('hide');

    });


    $(document).on('click', '.date-range li, .start-date, .end-date', function(e) {
        e.stopPropagation();


    });

    $(document).on('click', '.date-range-input', function(e) {
        e.stopPropagation();
        $('.date-range').toggleClass('hide')

    });

    $(document).click(function(e) {

        if (!($('.date-range').hasClass('hide'))) {
            $('.date-range').toggleClass('hide')
        }

    });

    function setDateRange() {
        var dRange = "",
            s = $('.start-date').val(),
            e = $('.end-date').val();


        var sd = new Date(s);
        var ed = new Date(e);

        if (sd <= ed) {

            if (s != "" && e != "") {
                dRange = s + " - " + e;
                $('input.date-range-input').val(dRange);
            } else if (s == "" && e != "") {
                dRange = "until " + e;
                $('input.date-range-input').val(dRange);
            } else if (s != "" && e == "") {
                dRange = "since " + s;
                $('input.date-range-input').val(dRange);
            }

            $('.modal#date-range').modal('hide');
            $('.date-range').toggleClass('hide');

            date_range_function(s, e);
        } else {
            errorMSG('.end-date', 'Enddate must be greater than startdate ');

        }

    }

    function setDate() {

        var d = $('.setdate').val();

        if (d != "") {
            $('input.date-range-input').val(d);
        }
        $('.modal#specific-date').modal('hide');
        $('.specific-date').toggleClass('hide');
        specific_date_function(d);

    }

</script>

<script>
    fixTableHead(".table-conn");

</script>
