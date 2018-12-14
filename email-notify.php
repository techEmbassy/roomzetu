<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hotel Management System</title>
    <?php include 'includes/styles.php'?>

    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>

<body class="gray">
    <?php
    $mpos = 2;
    include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2">
                    <p><small>Manage and Set up your account Here.</small> </p>
                    <hr/>
                    <div class="sub-menu ">
                        <?php $sbPos =1; include 'includes/settings-menu.php'?>
                        <!--<a href="room-types.html">Room Types</a>-->
                    </div>

                </div>
                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">
                            <div class="row">
                                <div class="col-md-3">
                                    Today's Bookings
                                </div>

                            </div>
                        </div>
                        <div class="c-body p-0">

                        hhdhdhjhdjf

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>


<?php include 'includes/footer.php'?>
