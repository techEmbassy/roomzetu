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

    <link href="img/logo.png" type="image/png" rel="shortcut icon">



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
   
    <?php include 'includes/login-navbar.php'?>



    <div class="container">
        <br/>
        <!--        <p class="text-center animated fadeInDown"><img src="img/logo-white.png" width="100px" /></p>-->
        <fieldset>
            <div class="card p-3 animated fadeIn" id="form-new-user">
                <!-- Form Name -->
                <div class="col-md-12">
                    <legend class="mb-3">Request For an account</legend>
                </div>

                <!-- Prepended text-->
                <div class="form-group mb-0">

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-12 control-label" for="passwordinput">Your Name</label>
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
                        <a><input type="checkbox" class="styled mt-3" id="rem" onchange="checkbtn()" /></a> <label for="rem"><h6>I agree to the <a href="#tms" data-toggle="modal">Terms and Conditions</a></h6></label> <button id="button1id" name="button1id" class="btn btn-primary pull-right" onclick="login()">Create Account</button>
                    </div>

                </div>
            </div>
            <div class="line animated zoomIn infinite hide"></div>

            <p class="text-center mb-0 mt-3">Already a customer? <small><a href="login">Login</a></small></p>
            <p class="text-center text-disabled">&copy; Copyright
                <?php echo date('Y');?>. <b>Lacel Technologies LLC</b></p>
        </fieldset>
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
