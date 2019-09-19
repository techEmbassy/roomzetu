<?php include 'includes/auth.php'?>
<?php if(($role==3)||$role==5||$role==6||$role==4){
     header("Location: dash.php");
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hotel Management System</title>
    <link rel="stylesheet" type="text/css" href="summernote/summernote-bs4.css"/>
   
<?php include 'includes/styles.php'?>
    <script>
        
        $("#mytextarea").summernote();
        

    </script>
    

        <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>

<body class="gray">
    <?php
    $mpos = 7;
    include 'includes/nav.php';?>

        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 mt-2">
                        <p><small>Manage and Set up your account Here.</small> </p>
                        <hr/>
                        <div class="sub-menu ">
                            <?php include 'includes/settings-menu.php';?>
                            <!--<a href="room-types.html">Room Types</a>-->
                        </div>

                    </div>
                    <div class="col-md-10 mt-2">
                        <?php     
                                $p = isset($_GET['v'])? $_GET['v'].".php": "company.php";
                                include "settings/$p";
                            ?>
                        
                    </div>
                </div>
            </div>
        </div>
</body>


<div class="modal animated FadeIn" id="booking-details">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">John Doe <br/> <small><i class="fa fa-check-circle-o text-green"></i> Reservation Confirmed</small></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rooms" role="tab">Rooms </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#people" role="tab">People (2)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#adons" role="tab">Ad-ons</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Message</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#payments" role="tab">Payments</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="col-md-12">

                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Name</label>
                                        <input class="form-control" />
                                        <label>Check in</label>
                                        <input class="form-control datepicker" value="2/4/2019" />
                                        <label>Check Out</label>
                                        <input class="form-control datepicker" value="2/4/2019" />


                                        <label>Property</label>
                                        <input class="form-control" disabled value="Semiliki" />

                                    </div>
                                    <div class="col-md-4">
                                        <label>Email</label>
                                        <input class="form-control" disabled value="ibran@gmail.com" />
                                        <label>Phone</label>
                                        <input class="form-control" disabled value="048938278" />
                                        <br>

                                        <p>Reservation Status</p>
                                        <p class="jumbotron p-2 m-0"><i class="fa fa-check-circle-o text-green"></i> Confirmed
                                            <a class="btn btn-sm btn-warning pull-right">change</a>
                                        </p>

                                    </div>
                                    <div class="col-md-4 p-3 ">

                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane" id="messages" role="tabpanel">
                                <textarea rows="10" class="form-control" disabled>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<div class="d"></div>
<?php include 'includes/footer.php'; ?>
     <script src="summernote/summernote-bs4.js"></script>

<script>
    new WOW.init();

</script>
    
    <script>
        $(document).ready(function() {
            $('textarea').summernote({
                height: 250,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
//                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
//                    ['height', ['height']]
                ],
                callbacks: {
                    mouseDown: function(e) {
                        $(".btn-save").removeClass('hid');
                    }
                }
            });
        });

        $('#editor').on('summernote.focus', function() {
            $(".btn-save").removeClass('hid');
        });

    </script>

<script>
    var coid = "<?php echo  $company_id; ?>";
    var uid = "<?php echo $user_id; ?>";

    getpolicy();


    //    $("#properties").on('change', function() {
    //
    //        var propertyId = $("#properties option:selected").val();
    //        getpolicy();
    //
    //    });


    //happens when a property is selected
    $("#save-plcy").click(function() {

        var txt = $("#plcy_txt").val();

        var hd_p = $("#id-hr").val();


        var policy_data = {
            //"user_id": uid,
            "company_id": coid,
            //"property_id": propId,
            "policy": txt,
            "holding_period": hd_p
        }


        $.post("src/policy_script.php", {
            token: "save_data",

            data: JSON.stringify(policy_data)
        }, function(data) {

            alertify.success(data);
            getpolicy();

        })


    });


    function getpolicy() {


        $.post("src/policy_script.php", {
            token: "fetch_policy",
            company_id: coid,

        }, function(response) {

            var datau = JSON.parse(response);
//            $("#plcy_txt").val(datau.policy);
            $("#plcy_txt").summernote('code',datau.policy);
            $("#id-hr").val(datau.holding_period);

        });

    }

</script>
