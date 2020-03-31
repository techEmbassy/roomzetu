<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php'?>
</head>


<body class="gray">
    <?php $mpos=3; include 'includes/nav.php';?>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2">

                    <p><small>Manage rooms, room prices and view room availability</small> </p>
                    <hr/>
                    <div class="sub-menu ">
                        <?php $sbPos=4; include 'includes/rooms-menu.php';?>


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
                                    Room Allocation
                                </div>


                            </div>
                        </div>
                        <div class="c-body p-3 text-center">


                            <div class="jumbotron p-2 m-0 dropdown clearfix col-md-6">
                                <span id="d-alloc"><i class="fa fa-square text-green"></i> Ready</span>
                                <button class="btn btn-sm btn-warning pull-right " data-toggle='dropdown'>change</button>
                                <div class="dropdown-menu p-0 dropdown-menu-right r-status">

                                    <a class="dropdown-item" onclick="changeRoomAlloction('automatic')"><i class="fa fa-square text-green"></i> Automatic</a>
                                    <a class="dropdown-item" onclick="changeRoomAlloction('manual')"><i class="fa fa-square text-red"></i> Manual</a>

                                </div>
                            </div>
                            

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>



<!-- /.modal -->
<script>


</script>



<?php include 'includes/footer.php'?>

<script>
    $(function() {
        getroomAllocationSettings()
    })

    function getroomAllocationSettings() {
        //alert(1);

        $.get("src/get.php", {
            token: "get_company_info"
        }, function(data) {
            var result = JSON.parse(data)
            result = result.room_allocation;

            if (result == 'manual') {
                $('#d-alloc').html(' <i class="fa fa-square text-red"></i> ' + result);
            } else {
                $('#d-alloc').html(' <i class="fa fa-square text-green"></i> ' + result);
            }

        });

    }



    function changeRoomAlloction(alloc) {


        var data = {
            "room_allocation": alloc

        }

        $.post("src/update.php", {
            page: "company",
            result: JSON.stringify(data)
        }, function(response) {
            //            alert(response);
            alertify
                .success("Room Allocation setting Updated Successfully");
            getroomAllocationSettings()

        })


    }

</script>
