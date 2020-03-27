<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css?v=999" rel="stylesheet" type="text/css" />
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/text-color.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet" type="text/css" />
    <link href="css/validate.css?v=34" rel="stylesheet" type="text/css" />
    <link href="css/login-styles.css" rel="stylesheet" type="text/css" />

    <link href="img/logo.png" type="image/png" rel="shortcut icon">



    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>


<style>

</style>


<body style="background-color:#f5f7fb">



    <!--        login navbar-->

    <?php //include 'includes/login-navbar.php'?>



    <div class="container-fluid">



        <div class="row pl-5 pr-5">

            <div class="col-md-5 col-12 pl-5">

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

                        <span class="" style="font-size:33px;color:#6F6F6F;">Sign up your Property</span>
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
                <br>

                <div class="card p-3 animated fadeIn" id="form-new-user">
                    <!-- Form Name --><br>
                    <div class="col-md-12">
                        <legend class="mb-5" style="font-size:25px;">Request For an account</legend>
                    </div>

                    <!-- Prepended text-->
                    <div class="form-group mb-0">

                        <div class="col-md-12">
                            <div class="form-group row">
                                <!--                                <label class="col-md-12 control-label" for="passwordinput">Your Name</label>-->
                                <div class="col-md-6">
                                    <input placeholder="first name" name="fname" id="fname" class="form-control input-md" style="text-transform: capitalize;" required>

                                </div>
                                <div class="col-md-6">
                                    <input placeholder="last name" name="lname" id="lname" class="form-control input-md" style="text-transform: capitalize;" required>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control" id="email" name="email" placeholder="email" type="email" data-input='email' data-invalid-message='invalid email' required>
                            </div>

                        </div>
                    </div>



                    <!-- Prepended text-->
                    <div class="form-group">

                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input id="pwd1" name="pwd" class="form-control" placeholder="password" type="password" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-12 ppp">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input id="pwd2" name="pwd" class="form-control" placeholder="confirm password" type="password" required>
                            </div>

                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <div class="col-md-12 ">
                            <a><input type="checkbox" class="styled mt-3" id="rem" onchange="checkbtn()" /></a> <label for="rem">
                                <h6>I agree to the <a href="#tms" data-toggle="modal">Terms and Conditions</a></h6>
                            </label>
                            <p class="mt-4"><button id="button1id" name="button1id" class="btnx" onclick="login()">Create Account</button></p>
                        </div>

                    </div>
                </div>
                <div class="line animated zoomIn infinite hide"></div>

            </div>


        </div>










    </div>


    <?php include 'modals/terms-conditions.php'; ?>




</body>
<script>
    if (typeof module === 'object') {
        window.module = module;
        module = undefined;
    }

</script>

<script src="js/jquery.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validate.js?v=2"></script>


<script>
    $(function() {
        document.getElementById('button1id').disabled = true;

    })

    function checkbtn() {
        if (document.getElementById('rem').checked) {
            document.getElementById('button1id').disabled = false;

        } else {
            document.getElementById('button1id').disabled = true;
        }
    }

    function login() {
        /**  $(".line").toggleClass("hide");
          setTimeout(function() {
              location.href = 'company-signup.html'
          }, 2000); **/

        if (!(inputsEmpty("#form-new-user"))) {
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var name = fname + " " + lname;
            var email = $('#email').val();
            var pwd = $('#pwd1').val();
            var pwd2 = $('#pwd2').val();



            if (pwd == pwd2) {

                var user = {
                    "name": name,
                    "email": email,
                    "phone": "",
                    "password": pwd,
                    "role": 1
                }


                $(".line").toggleClass("hide");

                $.post("src/save.php", {
                    page: 'signup',
                    result: JSON.stringify(user)
                }, function(response) {


                    var result = parseInt(response)

                    if (result) {

                        location.href = 'company-signup?id=' + response;
                    } else {

                        alert(response);

                    }

                });

            } else {
                //            alert("passwords do not match!")
                errorMSG('.ppp', "passwords do not match!")
            }
        }
        // })

        /** if(!(inputsEmpty("#form-new-user"))){
            $(".line").toggleClass("hide");
         setTimeout(function() {
             location.href = 'company-signup.html'
         }, 2000);
         } **/


    }
    // You can also require other files to run in this process
    //    require('./renderer.js');
    //alert(3);

</script>

</html>
