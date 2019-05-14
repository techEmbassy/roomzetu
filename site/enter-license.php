
<?php $title="Pricing";
 include('includes/header.php');

?>

<style>
 

    .form-control {
        display: inline-block;
        width: 80%;
        /* padding: 0.375rem 0.75rem; */
        font-size: 12px;
        font-family:arial;
        line-height: 1.6;
        color: red !important;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 40, 100, 0.12);
        text-transform: uppercase;
        

        border-radius: 3px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }


    .bg-white {
        background-color: #fff !important;
    }

</style>

<body style="background-color: #f5f7fb">

   
   <?php include 'includes/top-navbar.php'?>




    <?php
        $company = DB::queryFirstRow("SELECT company_name FROM company_tb WHERE id=%l", $company_id);
        $company_name=$company['company_name'];


    $query = DB::queryFirstRow("SELECT billing_plan,expiry_date FROM company_tb WHERE id=".$company_id);
//    

    $currentPlan=$query['billing_plan'];
    $expiry_date=$query['expiry_date'];
    
    
    
     $remd= floor((strtotime($expiry_date)-strtotime(date('Y-m-d H:i:s')))/86400); 
    
    $msg= $remd>=0 ?'Your plan will expire in '.$remd.' days':'Your plan expired on '.date('D, d-M-Y H:i',strtotime($expiry_date));
                        
//}
    
    
    ?>

        <!--    new cards-->
        <section class="container">

            <style>
                .pricing-tables {
                    line-height: 30px; 
                }

                .pricing-table-primary {
                    border-color: #4285f4;
                }

                .pricing-table {
                    box-shadow: 0 0 4px 0 rgba(0, 0, 0, .04);
                    border-top: 3px solid #c9c9c9;
                    padding: 35px 20px;
                    background: #FFF;
                    margin: 0 0 20px;
                }

                .be-option-button,
                .pricing-table {
                    text-align: center;
                    border-radius: 3px;
                }

                .pricing-table-image {
                    margin-bottom: 15px;
                }

                svg:not(:root) {
                    overflow: hidden;
                }

                .pricing-table-title {
                    font-size: 1.538rem;
                    font-weight: 300;
                }

                .card-divider-xl {
                    margin: 20px 0;
                }

                .card-divider {
                    margin: 10px 0;
                    border-top: 1px solid #f2f2f2;
                }

                .pricing-table-price {
                    padding: 5px 0 20px;
                }

                .pricing-table-price .currency {
                    vertical-align: top;
                }

                .pricing-table-price .value {
                    font-size: 35px;
                    line-height: 40px;
                }

                .pricing-table-price .frecuency {
                    font-size: 1.538rem;
                    font-weight: 300;
                }

                .pricing-table-features {
                    margin: 0 0 25px;
                    padding: 0;
                    list-style: none;
                }

                .pricing-table-features>li {
                    font-size: 1.077rem;
                    font-weight: 300;
                    line-height: 33px;
                }

                .pricing-table-success {
                    border-color: #34a853;
                }

                .pricing-table-warning {
                    border-color: #fbbc05;
                }

                .pricing-table-primary {
                    border-color: #4285f4;
                }

                .pricing-table-primary .pricing-table-image svg path {
                    fill: #4285f4;
                }

                .pricing-table-image svg path {
                    fill: #a6a6a6;
                }

                .pricing-table-warning .pricing-table-image svg path {
                    fill: #fbbc05;
                }

                .pricing-table-success .pricing-table-image svg path {
                    fill: #34a853;
                }

                .page-head {
                    padding: 20px 0 30px;
                }

                .page-head-heading {
                    -webkit-box-pack: center;
                    -webkit-justify-content: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
                }

                .page-head-heading h1 {
                    font-size: 2.57692rem;
                    line-height: 1;
                }

                .page-head-desc {
                    border-left: 2px solid #d9d9d9;
                    text-align: center;
                }

                .page-head-desc h3 {
                    font-size: 1.69231rem;
                    color: #919191;
                    line-height: 1;
                }

            </style>


            <div class="row page-head">
          
                <div class="col-md-4 page-head-heading">
                <br>
                    <h4 style="color:green; font-size:19px;">
                        <?php echo $msg;?>
                    </h4>
                </div>
                <div class="col-md-6 page-head-desc">
                <h5>Renew License</h5>
                    <span class="mt-0"><small>Choose a payment plan</small></span>

                     
                </div>
            </div>


            <div class="row pricing-tables p-2 ">


<div class="col-6"></div>
<div class="col-6 text-left bg-white p-2 ">
<p >Call the Lacel Help Line <b>(+256 312 175512)</b> and give them your Company name which is shown in <font color='red'>red </font> below and Billing Plan of your Choice, and Lacel in turn will give you a License Key: </p>

<center class="text-red" style='font-weight: bold;'>CLIENT NAME:<?php echo $company_name; ?></center>
<p >Enter the License Key aquired from LACEL, and click the 'Activate' button. </p>
   
							
                        <div class="row mb-2 ml-2 mb-5">
                        <div class="col-md-3 p-0"><input type='text'  maxlength='4' id='key1' name='key1' class="form-control" > &nbsp;<b>-</b>&nbsp;</div>   
                        
                        <div class="col-md-3 p-0"><input type='text'  maxlength='4' id='key2' name='key2' class="form-control" >
                        &nbsp;<b>-</b>&nbsp;</div>   
                        
                        
                        <div class="col-md-3 p-0">
                        <input type='text'  maxlength='4' id='key3' name='key3' class="form-control" >
                        &nbsp;<b>-</b>&nbsp;</div>
                        <div class="col-md-3 p-0">
                        <input type='text'  maxlength='4' id='key4' name='key4' class="form-control" >
                        </div>
                        </div>
                    <!-- <input type='submit' name='Submit' value='  Activate   ' style='background:url(img/but.gif); color:#FFFFFF'  \"> -->
                    <a type="submit" class="btn btn-outline btn-sm pull-left" name="emailForm" href="billing.php"><i class="fa fa-times" ></i> Cancel</a>
                    <button type="submit" class="btn btn-success btn-sm pull-right" name="emailForm" onclick="license()"><i class="fa fa-check" ></i> Activate</button>


</div>


            </div>


            <p class="text-center" style="color:red; font-weight:600"><b style="text-decoration:underline">Note: </b> You will loose the remaining days if you Choose a different billing plan when your current plan has not yet expired </p>

        </section>



</body>

</html>

<?php include ('includes/footer.php');?>

<script type="text/javascript">
  function license(){
      var key1 = $('#key1').val();
      var key2 = $('#key2').val();
      var key3 = $('#key3').val();
      var key4 = $('#key4').val();
      
      if (key1.length != 4 || key2.length != 4 || key3.length != 4 || key4.length != 4 ) {
		alert( "Please enter the full key." );
		return false;
	}
    $.post("../src/license.php", {
        action: "auth_license",
        key1 :key1,
        key2 :key2,
        key3 :key3,
        key4 :key4,
        },
        function(data) {
            alert(data);
        });
  }

</script>



