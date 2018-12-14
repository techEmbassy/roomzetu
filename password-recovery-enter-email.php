<!DOCTYPE html>
<html>
<!--
<!--
<!--
<!--

-->



<head>
    <meta charset="UTF-8">
    <title>Hotel Management System</title>
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css?v=999" rel="stylesheet" type="text/css" />
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/text-color.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet" type="text/css" />

    <link href="css/validate.css?v=33" rel="stylesheet" type="text/css" />

    <link href="alertifyjs/css/alertify.min.css" rel="stylesheet" type="text/css" />
    <link href="alertifyjs/css/themes/default.css" rel="stylesheet" type="text/css" />

    <script src="js/validate.js"></script>
    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>


<style>
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
 <div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 mb-1 bg-white border-bottom">
        <h5 class="my-0 mr-md-auto font-weight-normal">
            <p class="text-center" style="font-family: 'Ubuntu', sans-serif; font-weight:900"><img src="img/logo.png" width="40px" /> roomzetu RPM</p>
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Features</a>
            <a class="p-2 text-dark" href="#">Support</a>
            <a class="p-2 text-dark" href="#">Pricing</a>
        </nav>
        <a class="btn btn-outline-primary" href="#">Sign up</a>
    </div>
<br><br>

    <div class="container mt-5">
        <br/>
        <!-- <p class="text-center"><img src="img/logo.png" width="100px" /></p> -->
        <fieldset>
            <!--            <form action="">-->
            <div class="card p-3" id="login-form">
                <!-- Form Name -->
                <div class="col-md-12">
                    <legend class="mb-3 tile">Enter Password</legend>
                </div>

                <!-- Prepended text-->
                <div class="form-group">

                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                            <input id="email" name="email" class="form-control" placeholder="email" type="text" required data-empty-message="provide email">
                        </div>

                    </div>
                </div>





                <!-- Button (Double) -->
                <div class="form-group">
                    <div class="col-md-12 checkbox">
                        <button class="btn btn-primary pull-right" onclick="pass_recovery()">Submit</button>


                    </div>

                </div>
            </div>
            <!--            </form>-->


            <p class="text-center mb-0 mt-5">Not yet a customer? <small><a href="signup">Create account</a></small></p>
            <p class="text-center text-disabled">&copy; Copyright <?php echo date('Y');?>. <b>Lacel Technologies LLC</b></p>
        </fieldset>
    </div>



</body>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="alertifyjs/alertify.min.js"></script>
<script>
    function pass_recovery() {
        if (!(inputsEmpty("#login-form"))) {


            var email = $('#email').val();


            $.post("src/save.php", {
                "email": email,

                page: "password_recovery"
            }, function(response) {
               console.log(response)
                if (parseInt(response) === 1) {
                   alertify.alert('Reset Email Sent', ' Your Password Reset email has been sent. Please check your Email and follow the instructions to reset the password');
                    $('#email').val('')
                } else {
                    alertify.alert('Email not found!', 'Account Not Found for this Email, Please Check Email');
                    $('#email').val('')
                }

            });

        }
    }

</script>


</html>
