<!--
 <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css?v=999" rel="stylesheet" type="text/css" />
    <link href="css/custom.css?v=<?php //echo time()?>" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/text-color.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet" type="text/css" />
    <link href="datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
-->

<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css?v=999" rel="stylesheet" type="text/css" />
<link href="css/custom.css?v=<?php echo time()?>" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/text-color.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<!--<link href="introjs.css" rel="stylesheet">-->
<!--    <link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet" type="text/css" />-->
<link href="datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="calendar/css/calendar.css" rel="stylesheet" type="text/css" />
<link href="css/settings.css?v=<?php echo time()?>" rel="stylesheet" type="text/css" />
<link href="css/loader.css" rel="stylesheet" type="text/css" />
<link href="css/validate.css?v=99" rel="stylesheet" type="text/css" />
<link href="alertifyjs/css/alertify.min.css?v=345789" rel="stylesheet" type="text/css" />
<!-- <link href="css/alerts-styles.css" rel="stylesheet" type="text/css" /> -->
<link href="alertifyjs/css/themes/default.css" rel="stylesheet" type="text/css" />
<link href="css/pagination.css" rel="stylesheet" type="text/css">
<link href="css/chosen.min.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.min.css" rel="stylesheet" type="text/css">
<link href="img/logo.png" type="image/png" rel="shortcut icon">

<!--//beautiful alert-->
<link href="css/x0popup.min.css" rel="stylesheet" type="text/css" />



<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet">

<style type="text/css">
    /*
 h3.popover-title { background: rgb(27, 147, 165); color: rgb(255, 255, 255); font-weight: 400; }
*/

</style>
<script src="js/jquery.min.js"></script>
<script src="js/custom.js?v=<?php echo time()?>"></script>

<!--<script src="js/loader.js?v=7777"></script>-->
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/fixedtablehead.js?v=24"></script>
<script src="js/validate.js?v=23"></script>
<script src="alertifyjs/alertify.min.js"></script>
<script src="js/pagination.js?v=<?php echo time()?>"></script>
<script src="js/chosen.jquery.min.js"></script>
<script src="js/dropdown.min.js"></script>

<script src="js/x0popup.min.js"></script>

<script>
    //moment().format();

    // Extend existing 'alert' dialog
    if (!alertify.doneAlert) {
        //define a new errorAlert base on alert
        alertify.dialog('doneAlert', function factory() {
            return {
                build: function() {
                    var h = '<span class="fa fa-check-circle fa-2x" ' +
                        'style="vertical-align:middle;color:#009900;">' +
                        '</span> DONE'
                    this.setHeader(h);
                }
            };
        }, true, 'alert');
    }

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }

</script>
