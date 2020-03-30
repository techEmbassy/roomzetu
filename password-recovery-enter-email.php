<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hotel Management System</title>
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css?v=999" rel="stylesheet" type="text/css" />
    <!--    <link href="css/custom.css" rel="stylesheet" type="text/css" />-->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/text-color.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet" type="text/css" />

    <link href="css/validate.css?v=33" rel="stylesheet" type="text/css" />
    <link href="css/login-styles.css" rel="stylesheet" type="text/css" />

    <link href="alertifyjs/css/alertify.min.css" rel="stylesheet" type="text/css" />
    <link href="alertifyjs/css/themes/default.css" rel="stylesheet" type="text/css" />

    <script src="js/validate.js"></script>
    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>


<style>

</style>



<body style="background-color:#f5f7fb">

    <!--        login navbar-->
    <div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 mb-1 ">
        <h5 class="my-0 mr-md-auto font-weight-normal">
            <p class="text-center font-g-b" style=" font-weight:900"><img src="img/logo.png" width="40px" /> Roomzetu RPM</p>
        </h5>

    </div>
    <br><br>

    <div class="container mt-5">
        <br />

        <div class="row">

            <div class="col-md-2">

            </div>

            <div class="col-md-8 d-flex justify-content-center">

                <fieldset style="width:650px;">

                    <div class="card p-4" id="login-form">
                        <!-- Form Name -->
                        <div class="col-md-12 pt-3">
                            <legend class="mb-3 tile">Enter Your Email</legend>
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
                            <div class="col-md-12">
                                <button class="btnx" onclick="pass_recovery()">Submit</button>
                            </div>

                        </div>
                    </div>
                    <!--            </form>-->

                    <br>
                    <p class="text-center mb-0 mt-5">Not yet a customer? <small><a href="signup">Create account</a></small></p>
                    <p class="text-center text-disabled">&copy; Copyright
                        <?php echo date('Y');?>. <b>Lacel Technologies LLC</b></p>


                </fieldset>



            </div>

            <div class="col-md-2">

            </div>

        </div>


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
