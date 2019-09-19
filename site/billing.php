<?php $title="Pricing"; include('includes/header.php');
?>

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

<body style="background-color: #f5f7fb">

   
   <?php $pos=2; include 'includes/top-navbar.php'?>




    <?php
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
                    margin: 30px 0 20px;
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
                <!--
<div class="col-md-1">
    <img style="width:70px;" src="../img/logo.png">
</div>
-->
                <div class="col-md-4 page-head-heading">
                    <h5>Products &amp; Pricing</h5>
                    <span class="mt-0"><small>Choose a payment plan</small></span>
                </div>
                <div class="col-md-6 page-head-desc">
                    <br>
                    <h4 style="color:green; font-size:19px;">
                        <?php echo $msg;?>
                    </h4>
                </div>
            </div>


            <div class="row pricing-tables">




                <?php
                 $color=['plan-bronze','plan-silver','plan-gold'];
                    $billing_plans = DB::query("SELECT * FROM billing_plan_tb WHERE %l", 1);
//                print_r($billing_plans);
                $i=0;
                foreach($billing_plans as $b){
                    
                
                ?>




                    <div class="col-lg-4">
                        <div class="pricing-table pricing-table-warning">
                            <div class="pricing-table-image">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="85" height="70" viewBox="0 35 470 400" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 35 470 400">
                    <g>
                      <path d="m215.419,235c0-11.028-8.972-20-20-20s-20,8.972-20,20 8.972,20 20,20 20-8.972 20-20zm-25,0c0-2.757 2.243-5 5-5s5,2.243 5,5-2.243,5-5,5-5-2.243-5-5z"></path>
                      <path d="M312.415,118.004c-31.227-31.226-72.776-48.423-116.996-48.423s-85.77,17.197-116.995,48.423   C47.197,149.231,30,190.781,30,235c0,44.22,17.197,85.77,48.424,116.996c31.226,31.227,72.775,48.424,116.995,48.424   s85.77-17.197,116.996-48.423c31.227-31.227,48.424-72.777,48.424-116.996S343.642,149.231,312.415,118.004z M195.419,385.419   C112.478,385.419,45,317.941,45,235S112.478,84.581,195.419,84.581S345.839,152.058,345.839,235S278.36,385.419,195.419,385.419z"></path>
                      <path d="m321.895,227.5c-4.143,0-7.5,3.358-7.5,7.5 0,65.604-53.372,118.976-118.976,118.976-4.143,0-7.5,3.358-7.5,7.5s3.357,7.5 7.5,7.5c73.874,0 133.976-60.102 133.976-133.976 0-4.142-3.358-7.5-7.5-7.5z"></path>
                      <path d="m195.419,147.468c4.143,0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5c-56.536,0-102.532,45.996-102.532,102.532 0,4.142 3.357,7.5 7.5,7.5s7.5-3.358 7.5-7.5c-1.42109e-14-48.266 39.266-87.532 87.532-87.532z"></path>
                      <path d="m195.419,322.532c-4.143,0-7.5,3.358-7.5,7.5s3.357,7.5 7.5,7.5c56.536,0 102.532-45.996 102.532-102.533 0-4.142-3.357-7.5-7.5-7.5s-7.5,3.358-7.5,7.5c0,48.266-39.266,87.533-87.532,87.533z"></path>
                      <path d="m266.508,235c0-39.198-31.891-71.088-71.089-71.088s-71.089,31.89-71.089,71.088c0,39.199 31.891,71.089 71.089,71.089s71.089-31.891 71.089-71.089zm-127.178,0c0-30.927 25.161-56.088 56.089-56.088s56.089,25.161 56.089,56.088c0,30.928-25.161,56.089-56.089,56.089s-56.089-25.162-56.089-56.089z"></path>
                      <path d="m432.5,69.581c-4.143,0-7.5,3.358-7.5,7.5v42.5h-35v-42.5c0-4.142-3.357-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v50c0,4.142 3.357,7.5 7.5,7.5h17.5v129.298c0,4.563-1.476,12.29-3.157,16.533l-18.203,45.933-6.971-2.763c-1.85-0.731-3.914-0.701-5.74,0.088-1.825,0.79-3.263,2.272-3.996,4.121l-16.579,41.834c-2.214,5.587-2.12,11.703 0.265,17.219 2.385,5.516 6.775,9.773 12.363,11.988 2.656,1.052 5.443,1.586 8.284,1.586 9.289,0 17.501-5.58 20.923-14.214l16.579-41.834c1.525-3.851-0.358-8.209-4.21-9.736l-6.972-2.763 18.203-45.933c2.361-5.96 4.212-15.65 4.212-22.06v-129.297h17.5c4.143,0 7.5-3.358 7.5-7.5v-50c-0.001-4.142-3.358-7.5-7.501-7.5zm-59.258,311.098c-1.141,2.88-3.879,4.74-6.976,4.74-0.941,0-1.87-0.179-2.76-0.531-1.862-0.738-3.326-2.158-4.121-3.996-0.795-1.839-0.826-3.877-0.088-5.74l13.815-34.862 6.969,2.762c0.005,0.002 6.976,2.764 6.976,2.764l-13.815,34.863z"></path>
                      <path d="m432.5,39.581h-395c-20.678,0-37.5,16.822-37.5,37.5v315.838c0,20.678 16.822,37.5 37.5,37.5h395c20.678,0 37.5-16.822 37.5-37.5v-315.838c0-20.678-16.822-37.5-37.5-37.5zm22.5,353.338c0,12.407-10.094,22.5-22.5,22.5h-395c-12.406,0-22.5-10.093-22.5-22.5v-315.838c0-12.407 10.094-22.5 22.5-22.5h395c12.406,0 22.5,10.093 22.5,22.5v315.838z"></path>
                      <path d="m117.207,143.07c1.624,0 3.26-0.525 4.635-1.608 21.135-16.642 46.577-25.438 73.577-25.438 4.143,0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5c-30.4,0-59.052,9.908-82.856,28.653-3.255,2.563-3.815,7.278-1.253,10.532 1.48,1.88 3.677,2.861 5.897,2.861z"></path>
                      <path d="m100.628,150.89c-3.254-2.562-7.971-2.001-10.532,1.253-18.744,23.806-28.653,52.457-28.653,82.857 0,4.142 3.357,7.5 7.5,7.5s7.5-3.358 7.5-7.5c0-27 8.796-52.442 25.438-73.577 2.562-3.255 2.002-7.97-1.253-10.533z"></path>
                    </g>
                  </svg>
                            </div>
                            <div class="pricing-table-title">
                                <?php echo $b['title'];?>
                            </div>
                            <div class="card-divider card-divider-xl"></div>
                            <div class="pricing-table-price"><span class="currency">$</span><span class="value"><?php echo $b['price'];  ?></span><span class="frecuency">/mo</span></div>
                            <ul class="pricing-table-features">

                                <?php  $op=(json_decode($b['options'], TRUE));
                            foreach($op as $o){
                                
                             ?>

                                <li>
                                    <?php echo $o;?>
                                </li>
                                <?php }?>
                            </ul>

                            <?php 
                        $cl="pay_method.php?billingplan_id={$b[ 'id']} ";
                                  if($b['id']<$currentPlan){
                      echo '<a class="btn btn-danger btn-md " href='.$cl.'><li class="fa fa-arrow-down "></li> Downgrade</a>';
                }else if($b['id']==$currentPlan){
                    echo '<a class="btn btn-outline-secondary btn-md text-blue "  href='.$cl.'><li class="fa fa-check "></li> Your current Plan</a>';
                    
                }else if($b['id']>$currentPlan){
                    echo '<a class="btn btn-success btn-md " href='.$cl.'><li class="fa fa-arrow-up "></li> Upgrade</a>';
                }       
                                      
                                      
                             ?>

                            <!--                            <a href="#" class="btn btn-primary">Get Started</a>-->
                        </div>
                    </div>

                    <?php  $i++;} ?>








                    <!--
                    <div class="col-lg-4">
                        <div class="pricing-table pricing-table-warning">
                            <div class="pricing-table-image">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="85" height="70" viewBox="0 35 430 360" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 35 430 360">
                    <g>
                      <path d="m371.967,36.248h-322.454c-27.302,0-49.513,22.211-49.513,49.513v247.571c0,15.816 12.244,28.817 27.749,30.046v14.353c0,4.142 3.357,7.5 7.5,7.5h47.997c4.143,0 7.5-3.358 7.5-7.5v-14.249h239.987v14.249c0,4.142 3.357,7.5 7.5,7.5h47.998c4.143,0 7.5-3.358 7.5-7.5v-14.353c15.505-1.229 27.748-14.23 27.748-30.046v-247.571c0-27.302-22.21-49.513-49.512-49.513zm-296.221,333.983h-32.997v-6.749h32.997v6.749zm302.985,0h-32.998v-6.749h32.998v6.749zm27.748-36.899c0,8.354-6.796,15.15-15.149,15.15h-361.18c-8.354,0-15.15-6.796-15.15-15.15v-247.571c0-19.03 15.482-34.513 34.513-34.513h322.454c19.03,0 34.513,15.482 34.513,34.513v247.571z"></path>
                      <path d="m343.395,71.376h-265.309c-19.075,0-34.594,15.519-34.594,34.594v146.542c0,19.075 15.519,34.594 34.594,34.594h32.272c13.626,0 26.023-8.038 31.583-20.478l6.725-15.048c3.15-7.046 10.172-11.599 17.89-11.599h88.369c7.718,0 14.739,4.553 17.888,11.599l6.727,15.048c5.561,12.439 17.958,20.477 31.583,20.477h32.272c19.075,0 34.594-15.519 34.594-34.594v-146.541c-0.001-19.075-15.519-34.594-34.594-34.594zm-284.903,100.365v-18.455h304.496v18.455h-304.496zm304.496,15v18.455h-304.496v-18.455h304.496zm-304.496-48.455v-18.455h304.496v18.455h-304.496zm19.594-51.91h265.309c10.419,0 18.941,8.182 19.536,18.455h-304.381c0.595-10.273 9.117-18.455 19.536-18.455zm32.272,185.73h-32.272c-10.42,0-18.942-8.183-19.536-18.457h72.762l-3.065,6.859c-3.149,7.046-10.171,11.598-17.889,11.598zm144.567-47.124h-88.369c-10.939,0-21.076,5.188-27.53,13.667h-80.534v-18.453h304.496v18.453h-80.533c-6.453-8.479-16.592-13.667-27.53-13.667zm88.47,47.124h-32.272c-7.718,0-14.739-4.553-17.889-11.599l-3.065-6.858h72.763c-0.595,10.275-9.117,18.457-19.537,18.457z"></path>
                      <path d="m90.595,293.624c-12.437,0-22.555,10.118-22.555,22.555 0,12.437 10.118,22.555 22.555,22.555s22.555-10.118 22.555-22.555c-0.001-12.437-10.119-22.555-22.555-22.555zm0,30.11c-4.166,0-7.555-3.389-7.555-7.555 0-4.166 3.389-7.555 7.555-7.555s7.555,3.389 7.555,7.555c-0.001,4.166-3.389,7.555-7.555,7.555z"></path>
                      <path d="m330.886,293.624c-12.438,0-22.556,10.118-22.556,22.555 0,12.437 10.118,22.555 22.556,22.555 12.437,0 22.555-10.118 22.555-22.555-0.001-12.437-10.119-22.555-22.555-22.555zm0,30.11c-4.166,0-7.556-3.389-7.556-7.555 0-4.166 3.39-7.555 7.556-7.555s7.555,3.389 7.555,7.555c-0.001,4.166-3.389,7.555-7.555,7.555z"></path>
                      <path d="m259.995,295.985h-98.51c-4.143,0-7.5,3.358-7.5,7.5s3.357,7.5 7.5,7.5h98.51c4.143,0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z"></path>
                      <path d="m242.084,289.236c4.143,0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-62.688c-4.143,0-7.5,3.358-7.5,7.5s3.357,7.5 7.5,7.5h62.688z"></path>
                      <path d="m242.084,317.734h-62.688c-4.143,0-7.5,3.358-7.5,7.5s3.357,7.5 7.5,7.5h62.688c4.143,0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z"></path>
                    </g>
                  </svg>
                            </div>
                            <div class="pricing-table-title">
                                <?php echo $b['title'];?>
                            </div>
                            <div class="card-divider card-divider-xl"></div>
                            <div class="pricing-table-price"><span class="currency">$</span><span class="value">12</span><span class="frecuency">/mo</span></div>
                            <ul class="pricing-table-features">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Pellentesque sit amet odio elit</li>
                                <li>Integer felis odio</li>
                            </ul><a href="#" class="btn btn-warning">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pricing-table pricing-table-success">
                            <div class="pricing-table-image">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="120" height="70" viewBox="0 90 460 280" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 90 460 280">
                    <g>
                      <path d="m450.5,132h-116.93v-29.5c0-4.142-3.358-7.5-7.5-7.5h-194.14c-4.142,0-7.5,3.358-7.5,7.5v29.5h-116.93c-4.142,0-7.5,3.358-7.5,7.5v216c0,4.142 3.358,7.5 7.5,7.5h443c4.142,0 7.5-3.358 7.5-7.5v-216c0-4.142-3.358-7.5-7.5-7.5zm-311.07-22h179.14v22h-179.14v-22zm303.57,238h-428v-201h428v201z"></path>
                      <path d="m131.93,154.5h-104.43c-2.761,0-5,2.239-5,5v176c0,2.761 2.239,5 5,5h104.43c2.761,0 5-2.239 5-5v-176c0-2.761-2.239-5-5-5zm-5,176h-94.43v-166h94.43v166z"></path>
                      <path d="m321.07,159.5v176c0,2.761 2.239,5 5,5h104.43c2.761,0 5-2.239 5-5v-176c0-2.761-2.239-5-5-5h-104.43c-2.761,0-5,2.239-5,5zm10,5h94.43v166h-94.43v-166z"></path>
                      <path d="m79.715,326.5c24.813,0 45-20.187 45-45s-20.187-45-45-45-45,20.187-45,45 20.187,45 45,45zm0-80c19.299,0 35,15.701 35,35s-15.701,35-35,35-35-15.701-35-35 15.701-35 35-35z"></path>
                      <path d="m79.715,297.539c8.844,0 16.039-7.195 16.039-16.039s-7.195-16.039-16.039-16.039-16.039,7.195-16.039,16.039 7.195,16.039 16.039,16.039zm0-22.078c3.33,0 6.039,2.709 6.039,6.039s-2.709,6.039-6.039,6.039c-3.33,0-6.039-2.709-6.039-6.039s2.709-6.039 6.039-6.039z"></path>
                      <path d="m66.215,231.997c17.369,0 31.5-14.131 31.5-31.5s-14.131-31.5-31.5-31.5-31.5,14.131-31.5,31.5 14.131,31.5 31.5,31.5zm0-53c11.855,0 21.5,9.645 21.5,21.5s-9.645,21.5-21.5,21.5-21.5-9.645-21.5-21.5 9.645-21.5 21.5-21.5z"></path>
                      <path d="m66.215,215.454c8.248,0 14.957-6.709 14.957-14.957s-6.709-14.957-14.957-14.957-14.958,6.709-14.958,14.957 6.71,14.957 14.958,14.957zm0-19.914c2.733,0 4.957,2.224 4.957,4.957s-2.224,4.957-4.957,4.957-4.958-2.224-4.958-4.957 2.224-4.957 4.958-4.957z"></path>
                      <path d="m378.285,236.5c-24.813,0-45,20.187-45,45s20.187,45 45,45 45-20.187 45-45-20.187-45-45-45zm0,80c-19.299,0-35-15.701-35-35s15.701-35 35-35 35,15.701 35,35-15.702,35-35,35z"></path>
                      <path d="m378.285,265.461c-8.844,0-16.039,7.195-16.039,16.039s7.195,16.039 16.039,16.039 16.039-7.195 16.039-16.039-7.196-16.039-16.039-16.039zm0,22.078c-3.33,0-6.039-2.709-6.039-6.039s2.709-6.039 6.039-6.039c3.33,0 6.039,2.709 6.039,6.039s-2.709,6.039-6.039,6.039z"></path>
                      <path d="m391.785,168.997c-17.369,0-31.5,14.131-31.5,31.5s14.131,31.5 31.5,31.5 31.5-14.131 31.5-31.5-14.131-31.5-31.5-31.5zm0,53c-11.855,0-21.5-9.645-21.5-21.5s9.645-21.5 21.5-21.5 21.5,9.645 21.5,21.5-9.645,21.5-21.5,21.5z"></path>
                      <path d="m391.785,185.54c-8.248,0-14.957,6.709-14.957,14.957s6.709,14.957 14.957,14.957 14.958-6.709 14.958-14.957-6.711-14.957-14.958-14.957zm0,19.914c-2.733,0-4.957-2.224-4.957-4.957s2.224-4.957 4.957-4.957 4.958,2.224 4.958,4.957-2.225,4.957-4.958,4.957z"></path>
                      <path d="m220.602,264.5h-71.602c-2.761,0-5,2.239-5,5v66c0,2.761 2.239,5 5,5h71.602c2.761,0 5-2.239 5-5v-66c0-2.761-2.239-5-5-5zm-5,10v36h-61.602v-36h61.602zm-35.801,46v10h-7.5v-10h7.5zm10,0h7.5v10h-7.5v-10zm-35.801,0h8.301v10h-8.301v-10zm53.301,10v-10h8.301v10h-8.301z"></path>
                      <path d="m309,264.5h-71.603c-2.761,0-5,2.239-5,5v66c0,2.761 2.239,5 5,5h71.603c2.761,0 5-2.239 5-5v-66c0-2.761-2.239-5-5-5zm-5,10v36h-61.603v-36h61.603zm-35.8,46v10h-7.5v-10h7.5zm10,0h7.5v10h-7.5v-10zm-35.803,0h8.302v10h-8.302v-10zm53.303,10v-10h8.3v10h-8.3z"></path>
                      <path d="m171.803,298.499c1.32,0 2.6-0.53 3.53-1.46 0.93-0.93 1.47-2.22 1.47-3.54 0-1.32-0.54-2.6-1.47-3.53-0.93-0.93-2.21-1.47-3.53-1.47s-2.61,0.54-3.54,1.47c-0.93,0.92-1.46,2.21-1.46,3.53 0,1.32 0.53,2.61 1.46,3.54 0.93,0.93 2.22,1.46 3.54,1.46z"></path>
                      <path d="m197.803,298.499c1.31,0 2.6-0.53 3.53-1.46 0.93-0.93 1.47-2.22 1.47-3.54 0-1.32-0.54-2.61-1.47-3.54-0.93-0.93-2.22-1.46-3.53-1.46-1.32,0-2.61,0.53-3.54,1.46-0.93,0.93-1.46,2.22-1.46,3.54 0,1.32 0.53,2.61 1.46,3.54 0.93,0.93 2.22,1.46 3.54,1.46z"></path>
                      <path d="m260.203,298.499c1.31,0 2.6-0.53 3.53-1.46 0.93-0.93 1.47-2.22 1.47-3.54 0-1.32-0.54-2.6-1.47-3.53-0.93-0.94-2.22-1.47-3.53-1.47-1.32,0-2.61,0.53-3.54,1.47-0.93,0.93-1.46,2.21-1.46,3.53 0,1.32 0.53,2.61 1.46,3.54 0.93,0.93 2.22,1.46 3.54,1.46z"></path>
                      <path d="m286.203,298.499c1.31,0 2.6-0.53 3.53-1.46 0.93-0.94 1.47-2.22 1.47-3.54 0-1.32-0.54-2.6-1.47-3.53-0.93-0.93-2.22-1.47-3.53-1.47-1.32,0-2.61,0.54-3.54,1.47-0.93,0.93-1.46,2.21-1.46,3.53 0,1.32 0.53,2.6 1.46,3.54 0.93,0.93 2.22,1.46 3.54,1.46z"></path>
                      <path d="m309,154.5h-160c-2.761,0-5,2.239-5,5v15c0,2.761 2.239,5 5,5h160c2.761,0 5-2.239 5-5v-15c0-2.761-2.239-5-5-5zm-5,15h-150v-5h150v5z"></path>
                      <path d="m276.754,185.5h-95.508c-2.761,0-5,2.239-5,5v15c0,2.761 2.239,5 5,5h95.508c2.761,0 5-2.239 5-5v-15c0-2.761-2.239-5-5-5zm-5,15h-85.508v-5h85.508v5z"></path>
                      <path d="m164.267,236.5c0,9.098 7.402,16.5 16.5,16.5s16.5-7.402 16.5-16.5-7.402-16.5-16.5-16.5-16.5,7.402-16.5,16.5zm16.5-6.5c3.584,0 6.5,2.916 6.5,6.5s-2.916,6.5-6.5,6.5-6.5-2.916-6.5-6.5 2.916-6.5 6.5-6.5z"></path>
                      <path d="m245.5,236.5c0-9.098-7.402-16.5-16.5-16.5s-16.5,7.402-16.5,16.5 7.402,16.5 16.5,16.5 16.5-7.402 16.5-16.5zm-16.5,6.5c-3.584,0-6.5-2.916-6.5-6.5s2.916-6.5 6.5-6.5 6.5,2.916 6.5,6.5-2.916,6.5-6.5,6.5z"></path>
                      <path d="m260.732,236.5c0,9.098 7.402,16.5 16.5,16.5s16.5-7.402 16.5-16.5-7.402-16.5-16.5-16.5-16.5,7.402-16.5,16.5zm23,0c0,3.584-2.916,6.5-6.5,6.5s-6.5-2.916-6.5-6.5 2.916-6.5 6.5-6.5 6.5,2.916 6.5,6.5z"></path>
                    </g>
                  </svg>
                            </div>
                            <div class="pricing-table-title">Pro</div>
                            <div class="card-divider card-divider-xl"></div>
                            <div class="pricing-table-price"><span class="currency">$</span><span class="value">18</span><span class="frecuency">/mo</span></div>
                            <ul class="pricing-table-features">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Pellentesque sit amet odio elit</li>
                                <li>Integer felis odio</li>
                            </ul><a href="#" class="btn btn-success">Get Started</a>
                        </div>
                    </div>
            
-->
            </div>


            <p class="text-center" style="color:red; font-weight:600"><b style="text-decoration:underline">Note: </b> You will loose the remaining days if you Choose a different billing plan when your current plan has not yet expired </p>

        </section>



</body>
<?php include ('includes/footer.php');?>

</html>
