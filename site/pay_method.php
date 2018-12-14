<?php $title="payment method"; 
include('includes/header.php');

$id=$_GET['billingplan_id'];
                    $bp = DB::queryFirstRow("SELECT * FROM billing_plan_tb WHERE id=%l", $id);
$amount=$bp['price'];
$bname=$bp['title'];

?>

<body>

    <div class="row page-head mt-0 mb-0" style="background-color:#f4f6f7">
        <div class="col-md-1">
            <img style="width:70px;" src="../img/logo.png">
        </div>
        <div class="col-md-7 page-head-heading">
            <h3 class="mt-3 mb-3">Choose a Subscription Plan</h3>
            <!--            <span class="mt-0"><small>Choose a payment plan</small></span>-->
        </div>
        <div class="col-md-4 page-head-desc">
            <br>
            <h3>
                <!--                Hello-->
            </h3>
        </div>
    </div>

    <hr class="mt-0">
    <br>




    <!--    for checkout-->
    <section class="container">

        <style>
            .box {
                background-color: #fff;
                border-radius: 8px;
                border: 2px solid #e9ebef;
                padding: 30px;
                margin-bottom: 40px;
            }

            .box-title {
                margin-bottom: 30px;
                text-transform: uppercase;
                font-size: 23px;
                font-weight: 700;
                color: #094bde;
                letter-spacing: 2px;
            }

            .plan-selection {
                border-bottom: 2px solid #e9ebef;
                padding-bottom: 20px;
                margin-bottom: 20px;
            }

            .plan-selection:last-child {
                border-bottom: 0px;
                margin-bottom: 0px;
                padding-bottom: 0px;
            }

        </style>
        <div class="row">
            <div class="col-md-7 col-12">
                <div class="box">
                    <h3 class="box-title">Your Roomzetu Plan</h3>


                    <div class="plan-selection">
                        <div class="plan-data">

                            <label for="question3"><b><?php echo $bname ?></b></label>
                            <p class="plan-text">This is the Billing Plan which will be applied to your account after payment and will be activated according your period of preference selected.</p>
                            <b><span class="plan-price">$<?php echo $amount ?> / mo</span></b>
                        </div>
                    </div>
                </div>

                <a class="btn btn-link text-warning">Terms & Conditions</a>

            </div>


            <div class="col-md-5 col-12">
                <div class="box">
                    <h3 class="box-title">Select Period</h3>
                    <form class="left-left" method="post" action="complete_payment.php">
                        <div class="plan-selection">
                            <div class="plan-data">
                                <input id="opt-1" name="period" type="radio" value=1 onchange="calamount(value)" checked/> <label for="opt-1" class="ml-2">1 Month Subscription</label>
                            </div>
                        </div>
                        <div class="plan-selection">
                            <div class="plan-data">
                                <input id="opt-6" name="period" type="radio" class="with-font" value=6 onchange="calamount(value)" /> <label for="opt-12" class="ml-2"><label for="opt-6" class="ml-2">6 Months Subscription</label>
                            </div>
                        </div>
                        <div class="plan-selection">
                            <div class="plan-data">
                                <input id="opt-12" name="period" type="radio" class="with-font" value=12 onchange="calamount(value)" /> <label for="opt-12" class="ml-2"> Annual Subscription</label>
                            </div>
                        </div>

                        <input type="" name="amount" id="i-amount" value="" hidden="hidden">
                        <input type="" name="bill_id" value="<?php echo $id;?>" hidden="hidden">

                        <h4>Total Amount : $<b id="amount-total"></b></h4>
                        <!--                        <label>Total Amount:<b id="amount"></b></label>-->
                        <!--                        <br>-->
                        <!--                        <label><a href="#"><small>Terms & Conditions</small></a></label>-->
                        <!--                        <a type="submit" value="submit" class="btn btn-outline-success mt-3">Continue & Subscribe</a>-->
                        <input class="btn btn-success mt-2" style="width:40%" type="submit" value="Submit">

                    </form>

                </div>
            </div>


            <!--            <a href="#" class="btn btn-primary btn-lg mb30">Continue With Plans</a>-->
        </div>


    </section>


</body>
<?php// include ('includes/footer.php');?>
    <script src="../js/jquery.min.js"></script>

    </html>
    <script>
        var amount = '<?php echo $amount;?>';

        $(function() {
            calamount(1);
        });

        function calamount(v) {
            var total = parseFloat(amount) * parseInt(v);
            $('#amount-total').text(total)
            $('#i-amount').val(total)
        }

    </script>
