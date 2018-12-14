
<!DOCTYPE html>
<html>


<?php 
    if(isset($_GET['token']) && $_GET['token']!=""){
        $token=$_GET['token'];
    }else{
         header("Location: login.php");
    }
    
    ?>




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

    <script src="js/validate.js"></script>
    <!-- <object type="text/html" data="includes/styles.html"></object>-->
    <link href="alertifyjs/css/alertify.min.css" rel="stylesheet" type="text/css" />
    <link href="alertifyjs/css/themes/default.css" rel="stylesheet" type="text/css" />

</head>

<body>


    <div class="container">
        <br/>
        <p class="text-center"><img src="img/logo.png" width="100px" /></p>
        <fieldset>
            <div class="card p-3" id="login-form">
                <!-- Form Name -->
                <div class="col-md-12">
                    <legend class="mb-3 tile">Reset Password</legend>
                </div>

                <!-- Prepended text-->
                <div class="form-group">

                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input id="pwd" name="" class="form-control" placeholder="password" type="password" required data-empty-message="provide password">
                        </div>

                    </div>
                </div>



                <!-- Prepended text-->
                <div class="form-group">

                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input id="c-pwd" name="" class="form-control" placeholder="comfirm password" type="password" required data-empty-message="provide password">
                        </div>

                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <div class="col-md-12 checkbox">
                        <button id="button1id" name="button1id" class="btn btn-primary pull-right" onclick="Reset_password()">Reset</button>


                    </div>

                </div>
            </div>
            <div class="line animated zoomIn infinite hide"></div>

            <p class="text-center mb-0 mt-5">Not yet a customer? <small><a href="signup.php">Create account</a></small></p>
            <p class="text-center text-disabled">&copy; Copyright <?php echo date('Y');?>. <b>Lacel Technologies LLC</b></p>
        </fieldset>
    </div>



</body>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="alertifyjs/alertify.min.js"></script>


<script>
    var password_token = '<?php echo $token;?>';

    function Reset_password() {


        if (!(inputsEmpty("#login-form"))) {


            var pwd = $('#pwd').val();
            var c_pwd = $('#c-pwd').val();

            if (pwd != c_pwd) {
                errorMSG('#login-form', "passwords do not match!")
            } else {

                $.post("src/save.php", {
                    "password": pwd,
                    "password_token": password_token,

                    page: "password_update"
                }, function(response) {
                    if (response == 'success') {
                        alertify.alert('Password Reset', 'Your Password has been reset ')
                        setTimeout(function() {
                            window.location.href = "dash.php"
                        }, 5000)
                        //                        
                    } else {
                        alertify.alert('error', 'password not reset. Please request for another link to rest your password.')
                        //                       
                    }

                    // 
                    //                   

                });
            }

        }
    }

</script>

</html>
