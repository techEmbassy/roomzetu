<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Notice Board
            </div>

        </div>
    </div>
    <div class="c-body p-3" mt-3>

        <p class="text-disabled mb-3">Create a New Notice</p>
        <textarea rows="10" class="form-control mb-3" id="notice"></textarea>
        <a class="btn btn-primary btn-sm mt-2" onclick="pin();"><i class="fa fa-map-pin"></i> Pin To Notice Board</a>


        <div class="parent-7 pt-3">
            <div class="card p-2 fill-parent">
                <p class="mb-2"><span><i class="fa fa-bell text-green"></i>My Previous Notices</span> <span class="circle pull-right green" id="numnotice"></span></p>

                <div class="scrollit">

                <style>
                .scrollit {
                    overflow:scroll;
                    height:260px !important;
                }
                </style>
                <table class="table" id="noticetb">


                </table>

                </div>
                <!--
                                
                                <div class="foot">
                                <a class="btn btn-secondary btn-sm pull-right" href="./bookings.php"> <i class="fa fa-circle-o"></i> All Reservations</a>
                                </div>
-->
            </div>
        </div>


    </div>


    <div class="c-footer pl-4 text-right">
        <?php echo $timeLeftFooter; ?>
    </div>


</div>

<script>
    var data;
    var notice = "";
    var user_id = <?php echo $user_id;?>; //start from here
    var company_id = <?php echo $company_id;?>;

    $(function() {
        getMyNotices();



    });

    function pin() {
        var notice = $('#notice').val();
        //        var user_id = <?php echo $user_id;?>; //start from here
        //        var company_id = <?php echo $company_id;?>;
        //  var amount = $('#e-amount').val()


        var data = {
            "company_id": company_id,
            "user_id": user_id,
            "note": notice
        }



        $.post("src/save.php", {
            page: "notice_tb",
            result: JSON.stringify(data)
        }, function(response) {
            //alert(response);
            getMyNotices();
            alertify
                .success("Notice Pinned to Board");
            // alertify.message('OK');
            //  window.location.reload();
        });


    }

    function getMyNotices() {

        $.get("src/get.php", {
            "table": "notice_tb",
            "reference": "1",
            "user_id": user_id,
            token: "get_notices"
        }, function(response) {
            //alert(response);
            data = response;
            setNotices(data);
            // data = JSON.parse(response);
            // alert(data.company_name)
        });

    }

    function setNotices(data) {
        var notices = JSON.parse(data);
        //        console.log(notices.length);
        $('#numnotice').text(notices.length);
        var rows = "";
        $.each(notices, function(i, notice) {


            rows += " <tr><td><a>" + notice.note + "</a><br><small>" + notice.created + "</small></td><td><span class='circle pull-left red' onClick='delete_notice(\"" + notice.id + "\")'><i class='fa fa-close text-red btn-circle'></span></td></tr>";
        });



        $("#noticetb").html(rows);
        //fixTableHead(".table-primary");
    }

    function delete_notice(id) {
        $.post("src/delete.php", {
            token: "notice_tb",
            reference: "id",
            data: id,

        }, function(response) {

            getMyNotices();
            alertify
                .success("succefully deleted");

        });


    }

</script>


<?php

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month', 
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

    $time = "2017-07-12 10:36:09";
	//echo time_elapsed_string($time, true).PHP_EOL;

    ?>
