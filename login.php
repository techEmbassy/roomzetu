<!DOCTYPE html>
<html>
<?php

session_start();

if(isset($_GET['logout'])&& $_GET['logout']==1){

        $_SESSION['flag']["first_time"]=null;
        $_SESSION['login']=null;


  }else{
        redirect_to('dashboard');
  }


function redirect_to( $location = NULL ) {
        if ($location != NULL) {
            header("Location: {$location}");
            exit;
        }
}

?>

<head>
    <meta charset="UTF-8">
    <title>Login | Roomzetu</title>
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css?v=999" rel="stylesheet" type="text/css" />
    <!--    <link href="css/custom.css" rel="stylesheet" type="text/css" />-->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/text-color.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet" type="text/css" />
    <link href="css/login-styles.css" rel="stylesheet" type="text/css" />

    <link href="css/validate.css?v=33" rel="stylesheet" type="text/css" />

    <link href="img/logo.png" type="image/png" rel="shortcut icon">

    <!--    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">-->

    <script src="js/validate.js"></script>
    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>

<body style="background-color:#f5f7fb">


    <?php //include 'includes/login-navbar.php'?>


    <style>


    </style>

    <div class="container-fluid pl-5 pr-5">

        <div class="row pl-5 pr-5">

            <div class="col-md-5 col-12">

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="pt-5">




                    <div class="">
                        <h5 class="">
                            <p class="font-g-b" style="font-size:23px;color:#D96403"><img src="img/logo.png" width="50px" /> Roomzetu RPM</p>
                        </h5>

                    </div>

                    <div class="fade_rule mt-3 mb-3"></div>

                    <h5 class="my-0 mr-md-auto font-g-b" style="">
                        <!--                        <small class="text-dark;" style="font-size:20px;">Haloo,</small><br>-->

                        <span class="" style="font-size:33px;color:#6F6F6F;">Tukwaniriza ku Roomzetu System</span>
                    </h5>


                    <div class="pt-2">
                        <p class="mb-0 mt-5">Not yet a customer? <small><a href="signup">Request For an account</a></small></p>
                        <p class="text-disabled">&copy; Copyright
                            <?php echo date('Y');?>. <b>Lacel Technologies LLC</b></p>
                    </div>


                </div>


            </div>

            <div class="col-md-2 col-12">

            </div>


            <div class="col-md-5 col-12">
                <br>

                <br />
                <br />
                <!--            <p class="text-center"><img src="img/logo.png" width="100px" /></p>-->


                <style>

                </style>


                <div class="card p-3" id="login-form">

                    <img class="" src="img/login-icon.svg">
                    <p class="text-center mt-4 mb-4 fs-20">Login to your Account</p>


                    <div class="pl-4 pr-4">
                        <!-- Prepended text-->
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" name="prependedtext" class="form-control" placeholder="email" type="text" required data-empty-message="provide username">
                                </div>

                            </div>
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

                        <!-- Button (Double) -->
                        <div class="form-group">

                            <div>

                            </div>

                            <div class="col-md-12 checkbox">
                                <a><input type="checkbox" class="styled" id="rem" /> <label for="rem">Remember me</label></a><br>
                                <p class="mt-4"><button id="button1id" name="button1id" class="btnx" onclick="login()">Login &nbsp;<i class="fa fa-terminal"></i></button></p>
                            </div>

                            <bR>
                            <hr class='mt-3 mb-3' />
                            <p class="text-center text-tiny"><a href="password-recovery-enter-email">Forgot password?</a></p>

                        </div>
                    </div>


                </div>
                <div class="line animated zoomIn infinite hide"></div>








            </div>


        </div>

    </div>



</body>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script>
    $(function() {

        var user_email = getCookie("reservations-user-email");
        var user_password = getCookie("reservations-user-password");
        if (user_email != "" && user_password != "") {

            $.post("src/login.php", {
                "email": user_email,
                "password": user_password,
                //                    "rememberMe": rem,
                token: "login"
            }, function(response) {
                //
                $(".line").addClass("hide");
                //alert(response);

                if (!(response == "404")) {
                    window.location.href = "dashboard"

                } else {
                    errorMSG('#login-form', "Wrong username or password!")
                    //alert(response);
                }

            });
        }

    })


    function login() {
        // $(".line").toggleClass("hide");





        if (!(inputsEmpty("#login-form"))) {
            $(".line").toggleClass("hide");

            var email = $('#email').val();
            var pwd = $('#pwd').val();

            if (document.getElementById("rem").checked) {
                setCookie("reservations-user-email", email, "reservations-user-password", pwd, 30);
            }

            //          var cred = {"email":email, "passowrd":pwd}

            $.post("src/login.php", {
                "email": email,
                "password": pwd,
                //                    "rememberMe": rem,
                token: "login"
            }, function(response) {
                //
                $(".line").addClass("hide");
                //                    alert(response);

                if (!(response == "404")) {
                    window.location.href = "dashboard"

                } else {
                    errorMSG('#login-form', "Wrong username or password!")
                    //alert(response);
                }

            });

        }
    }



    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function setCookie(cemail, cvalue, ppass, pvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cemail + "=" + cvalue + ";" + expires + ";path=/";
        document.cookie = ppass + "=" + pvalue + ";" + expires + ";path=/";
    }

</script>

</html>
