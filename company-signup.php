<!DOCTYPE html>
<html>

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
    <link href="css/validate.css?v=34" rel="stylesheet" type="text/css" />

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
            <!--            <a class="p-2 text-dark" href="#">Support</a>-->
            <a class="p-2 text-dark" href="#">Pricing</a>
        </nav>
        <a class="btn btn-outline-primary" href="#">Support</a>
    </div>



    <div class="container">
        <!--        <br/>-->
        <!--        <p class="text-center animated fadeInDown"><img src="img/logo-white.png" width="60px" /></p>-->
        <fieldset style="width:600px">
            <div class="card p-3 animated fadeIn mt-2" id="form-new-company">
                <!-- Form Name -->
                <div class="col-md-12">
                    <legend class="mb-0">Provide organisation details</legend>
                    <p class="text-disabled mt-1">Please provide your hotel/lodge/company details</p>
                </div>



                <!-- Prepended text-->
                <div class="form-group mb-0 mt-3">

                    <div class="col-md-12">
                        <div class="form-group row">

                            <div class="col-md-6">
                                <b>Basic info</b><br/>
                                <label class="control-label" for="passwordinput">Company Name</label>
                                <input placeholder="" class="form-control input-md" id="c-name" style="text-transform: capitalize;" required>

                                <label class="control-label " for="passwordinput">Country</label>
                                <select class="form-control input-md" id="c-country" required>
                                     
                                 <option value="0">Select Country</option>
                                </select>

                                <label class="control-label " for="passwordinput">City</label>
                                <input placeholder="City" class="form-control input-md" id="c-city" style="text-transform: capitalize;" required>

                                <label class="control-label " for="passwordinput">TimeZone</label>
                                <select class="form-control input-md" id="c-timezone" required>
                                     
                                 <option value="0">Select Timezone</option>
                                </select>

                            </div>
                            <div class="col-md-6">
                                <b>Contact info</b><br/>
                                <label class="control-label">Address</label>
                                <input placeholder="" class="form-control input-md" id="c-address" style="text-transform: capitalize;" required>

                                <label class="control-label ">Phone</label>
                                <input placeholder="" class="form-control input-md" id="c-phone" onkeypress="return isNumber(event)" maxlength="15" required>

                                <label class="control-label ">Email</label>
                                <input placeholder="" class="form-control input-md" id="c-email" type="email" data-input='email' data-invalid-message='invalid email' required>

                                <label class="control-label">website link</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><small>www.</small></span>
                                    <input placeholder="mycompany.com" class="form-control input-md" id="c-web">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="form-group">
                    <div class="col-md-12 checkbox">
                        <button id="button1id" name="button1id" class="btn btn-primary pull-right" onclick="complete_registration()">Get Started</button>
                    </div>

                </div>
            </div>
            <div class="line animated zoomIn infinite hide"></div>

            <p class="text-center mb-0 mt-3">Already a customer? <small><a href="login">Login</a></small></p>
            <!--            <p class="text-center text-disabled">&copy; Copyright <?php echo date('Y');?>. <b>Lacel Technologies LLC</b></p>-->
        </fieldset>
    </div>







</body>
<!--<script>
 
console.log(sessionStorage.user);
 
    if (typeof module === 'object') {
        window.module = module;
        module = undefined;
    }

</script>-->

<script src="js/jquery.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validate.js"></script>

<script>
    getCountries();
    getTimeZones();

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }

    function getCountries() {


        $.ajax({
            type: "POST",
            url: "data/static_set.php",
            data: {
                token: "get_countries"
            },
            success: function(data) {

                $('#c-country').html('<option value="">Select Country</option>' + data);
                //console.log(items);
            }
        });



    }

    function getTimeZones() {


        $.ajax({
            type: "POST",
            url: "data/static_set.php",
            data: {
                token: "get_time_zones"
            },
            success: function(data) {

                $('#c-timezone').html('<option value="">Select Timezone</option>' + data);
                //console.log(items);
            }
        });



    }

    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }

    }



    function complete_registration() {

        var user_id = getQueryVariable("id");

        var name = $("#c-name").val();
        var country = $("#c-country").val();
        var city = $("#c-city").val();
        var timezone = $("#c-timezone").val();
        var address = $("#c-address").val();
        var phone = $("#c-phone").val();
        var email = $("#c-email").val();
        var web = $('#c-web').val();

        var data = {
            "company_name": name,
            "logo": "",
            "phone": phone,
            "email": email,
            "website": web,
            "country": country,
            "address": address,
            "city": city,
            "vat_no": "",
            "bank": "",
            "bank_account": ""
        }



        if (!(inputsEmpty("#form-new-company"))) {


            $.post("src/save.php", {
                page: 'company-signup',
                result: JSON.stringify(data),
                user_id: user_id,
                timezone: timezone
            }, function(response) {


                var result = parseInt(response)

                if (result) {

                    location.href = 'welcome';

                } else {

                    alert(response);

                }

            });
        }

    }

</script>
<!--<script src="js/wow.min.js"></script>
    
<script>
    if (window.module) {
       
        module =window.module;
    }

</script>
   
    <script>



$.getJSON( "countries.json", function( data ) {

    alert(1);
  //var items = [];
  //$.each( data, function( key, val ) {
   // alert(data);
    //items.push( "<li id='" + key + "'>" + val + "</li>" );
  //});
 
  
});
    
     
    //new WOW.init();

    function login() {

        var name = $("#c-name").val();
        var country = $("#c-country").val();
        var city = $("#c-city").val();
        var timezone = $("#c-timezone").val();
        var address = $("#c-address").val();
        var phone = $("#c-phone").val();
        var email = $("#c-email").val();
        var web = $('#c-web').val();

       // alert(name+country+city+timezone+address+phone+email+web)
        var data = {"company_name":name, "logo":"", "phone":phone, "email":email, "website":web, "country":country, "address":address, "city":city, "vat_no":"", "bank":"", "bank_account":""}
        
        
    $.post("src/save.php", {"token":"company_tb", result:JSON.stringify(data)}, function(response){
     // alert(response);

      sessionStorage.company = response;

       location.href = 'welcome'; 


      
   /**  alertify
  .alert("Sucessfully added "+name, function(){
    //alertify.message('OK');
    window.location.reload(); **/
  });
        
        
        $(".line").toggleClass("hide");
         setTimeout(function() {
            location.href = 'welcome.html'
        }, 2000);
        
    }




  

    // You can also require other files to run in this process
   // require('./renderer.js');
    //alert(3);

</script>-->

</html>
