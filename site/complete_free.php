<?php $title="payment method"; 
include('includes/header.php');

//$id=$_GET['billingplan_id'];
//                    $bp = DB::queryFirstRow("SELECT * FROM billing_plan_tb WHERE id=%l", $id);
//$amount=$bp['price'];

?>

<body>

    <?php include ('includes/nav.php');?>

    <?php
 $table='company_tb';
    
           
//  
    $data=array("billing_plan"=>1);
    
     $result = DB::update($table, $data, "id=%l", $company_id);
    if($result){
?>
        <section>
            <!--form-->
            <br><br>
            <div class="container">
                <div class="row p-6 text-center justify-content-center">


                    <div class="col-sm-7">

                        <div class="jumbotron">
                            <h3><i class="fa fa-check-circle text-green"></i> Your have successfully extended your free subscription
                            </h3>
                            <!--                        <a class="btn btn-primary">See my orders</a>-->
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <?php }?>
</body>
<?php include ('includes/footer.php');?>

</html>
