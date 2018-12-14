<?php $title="payment method"; 
include('includes/header.php');

$v=$_GET['v'];
?>

<style>
    .btn {
        border-radius: 0px;
    }

    .card {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        position: relative;
        margin-bottom: 1.5rem;
        width: 100%;
        border: 1px solid rgba(0, 40, 100, 0.12);
        border-radius: 3px !important;
        background-color: #fff;
        background-clip: border-box;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 0.9375rem;
        line-height: 1.6;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 40, 100, 0.12);

        border-radius: 3px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .input-group-addon {
        border: 1px solid rgba(0, 40, 100, 0.12);
    }

    .box-shadow {
        box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, .05);
    }

    .border-bottom {
        border-bottom: 1px solid rgba(112, 182, 236, 0.3);
    }

    .bg-white {
        background-color: #fff !important;
    }

</style>

<body style="background-color:#f5f7fb">

    <!--        login navbar-->
    
    <?php include 'includes/top-navbar.php'?>


    <section>
        <?php  if($v=="success"){?>
        <div class="container">
            <br/>

            <div class="cards p-3 animated fadeIn text-center">
                <!--               <p class="text-center animated fadeIn"><img src="../img/logo.png" width="100px" /></p>-->



                <div class="card border-0 p-4">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <br>
                            <i class="fa fa-check-circle mt-5" style="font-size:100px;color:green"></i>
                            <P style="color:green">Success ):</P>
                        </div>

                        <div class="col-md-10">
                            <h1 class="animated fadeIn mb-4" style="color:orange">Hi <span><?php if(isset($_SESSION['login']["user_name"])){ echo $_SESSION['login']["user_name"];}?></span>, Thank you for subscribing</h1>
                            <p class="text-lights animated fadeIn">You have successfully sent in a request for <b>
                    <?php echo $_GET['p'];?> months</b> subscription to the Roomzetu Team. Please wait for comfirmation through the registered email before you can access your account. Enjoy Roomzetu Exciting advanced features.<br/> <br>Contact us via our support email - <b>support@laceltech.com</b> or call-us <b>+256 312 175512</b> and we will be available to assist you in case of any issues.</p>

                            <p><br></p>
                            <a class="btn btn-primary btn-lg animated fadeInLeft" href="billing.php">Upgrade Now</a>
                            <a class="animated fadeInRight btn btn-outline-success btn-lg" href="../dashboard">Login to your Account</a>

                        </div>


                    </div>


                </div>




            </div>

        </div>



        <?php }else{?>
        <div class="container">
            <div class="row p-6 text-center justify-content-center">


                <div class="col-sm-7">

                    <div class="jumbotron">
                        <h3><i class="fa fa-times text-red"></i> Your subscription of has failed, please contact admin for assistance</h3>
                        <!--                        <a class="btn btn-primary">See my orders</a>-->
                    </div>

                </div>

            </div>
        </div>
        <?php }?>

    </section>


</body>
<?php include ('includes/footer.php');?>

</html>
