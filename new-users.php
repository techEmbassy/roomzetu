<?php include 'includes/auth.php'?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hotel Management System</title>
<!--     <link href="css/settings.css?v=677" rel="stylesheet" type="text/css" />
 -->    <?php include 'includes/styles.php'?>
   
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
                                    Users
                                </div>

                            </div>
                        </div>
                        <div class="c-body p-0 mt-2">

                        <!--users details here-->


                        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-box center-version">

                    <a href="profile.html">

                        <img alt="image" class="img-circle" src="img/7.jpg">


                        <h3 class="m-b-xs"><strong>John Smith</strong></h3>

                        <div class="font-bold">Graphics designer</div>
                        <address class="m-t-md">
                            <strong>Twitter, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                    </a>
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="contact-box center-version">

                    <a href="profile.html">

                        <img alt="image" class="img-circle" src="img/a1.jpg">


                        <h3 class="m-b-xs"><strong>Alex Johnatan</strong></h3>

                        <div class="font-bold">CEO</div>
                        <address class="m-t-md">
                            <strong>Twitter, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                    </a>
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="contact-box center-version">

                    <a href="profile.html">

                        <img alt="image" class="img-circle" src="img/a3.jpg">


                        <h3 class="m-b-xs"><strong>Monica Smith</strong></h3>

                        <div class="font-bold">Marketing manager</div>
                        <address class="m-t-md">
                            <strong>Twitter, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                    </a>
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="contact-box center-version">

                    <a href="profile.html">

                        <img alt="image" class="img-circle" src="img/a4.jpg">


                        <h3 class="m-b-xs"><strong>Michael Zimber</strong></h3>

                        <div class="font-bold">Sales manager</div>
                        <address class="m-t-md">
                            <strong>Twitter, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                    </a>
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                    </div>

                </div>
            </div>
            

            

            

            
            
            
            
            


        </div>
        </div>


                    
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>


<?php include 'includes/footer.php'?>
