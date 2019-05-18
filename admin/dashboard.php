<?php 
include 'includes/config.php';
if(!isset($_SESSION["authenticated"])){
    header('Location: login.php');
 }

 $companies = DB::query("select * from company_tb");
$count_company= DB::count();

 $users = DB::query("select * from users_tb");
$count_user= DB::count();

 $properties = DB::query("select * from property_tb");
$count_property= DB::count();

 $revenue = DB::query("select IFNULL(SUM(amount_paid),0) as amount from billing_tb where used_at IS NOT NULL");
$tot_revenue= $revenue[0]['amount'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
 
    <?php include 'includes/styles.php';?>

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
            font-size: 20px;
            font-weight: 700;
            color: #102144;
            letter-spacing: 2px;
        }
        
        .plan-selection {
            border-bottom: 2px solid #e9ebef;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a class="brand" href="#">
                    <img src="../img/logo-white.png" alt="Lacel Technologies" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="images/avatar.jpg" alt="John Doe" />
                    </div>
                    <h4 class="name"><?php echo  $user_name; ?></h4>
                    <a href="login.php?logout=1">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas  fa-credit-card"></i>Billing Plans</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="../img/logo-white.png" alt="Lacel Technologies" />
                                </a>
                            </div>


                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">

                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>User account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>Request for License Renewal</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="../img/logo-white.png" alt="Lacel Technologies" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="images/avatar.jpg" alt="John Doe" />
                        </div>
                        <h4 class="name"><?php echo  $user_name; ?></h4>
                        <a href="login?logout=1">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="dashboard.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fas  fa-credit-card"></i>Billing Plans</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->



            <!-- STATISTIC-->
            <section class="statistic m-t-25">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count_company; ?></h2>
                                                <span>Companies</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-home"></i>
                                            </div>
                                            <div class="text">
                                            <h2><?php echo $count_property; ?></h2>
                                                <span>Properties</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-accounts"></i>
                                            </div>
                                            <div class="text">
                                            <h2><?php echo $count_user; ?></h2>
                                                <span>Users</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                            <h2><?php echo $tot_revenue; ?></h2>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->


            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-7">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>Top Companies </h3>
                                        <!-- <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button> -->
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <?php
                                                 $sql = DB::queryFirstRow("SELECT COUNT(id) as company_count from company_tb where expiry_date<now()");

                                                ?>
                                                <p>You Have
                                                    <span><?php echo $sql['company_count']; ?></span> expired Lisence
                                                </p>
                                            </div>
                                            <div class="au-message-list" id="top-companies">
                                                <?php
                                                $cc = DB::query("SELECT c.*, IFNULL(b.title,'N/A') as bill_name, 
                                                IFNULL((select sum(amount_paid) from billing_tb where company_id=c.id),0) as amount_paid
                                                from company_tb c LEFT JOIN billing_plan_tb b on b.id=c.billing_plan ORDER BY amount_paid DESC ");
                                                $i=1;
                                                $imgfolder = "../img/settings/";
                                                foreach($cc as $c){
                                                    $class="";
                                                    $b_id= $c['billing_plan'];

                                                    if($b_id>0){
                                                        if($b_id % 3==0)
                                                            $class="badge badge-info";
                                                        if($b_id%3==1)
                                                            $class="badge badge-warning";
                                                        if($b_id%3==2)
                                                            $class="badge badge-secondary";
                                                    }

                                                    if($i>4)
                                                        $more="js-load-item";
                                
                                                    $online=""; 
                                                    $diff=  strtotime($c['expiry_date'])-time() ;            
                                                if($diff>0) {
                                                        $online="online";
                                                        $toolTip="License Expires in ". round($diff/(60*60*24))." Days";
                                                }else{
                                                    $toolTip="License Expired On ".date('l, d F Y H:i A',strtotime($c['expiry_date']));
                                                }

                                                $company_name=$c['company_name'];
                                                                    echo "<div class='au-message__item ".$more."' data-toggle='tooltip' data-placement='auto' title='".$toolTip."' onclick='licenseHistory(".$c['id'].",\"".$company_name."\",\"".$c['expiry_date']."\")'>".
                                                    "<div class='au-message__item-inner'>".
                                                        "<div class='au-message__item-text'>".
                                                            "<div class='avatar-wrap ".$online."'>".
                                                                "<div class='avatar'>".
                                                                    "<img src='". $imgfolder.$c['logo']."' alt='".$company_name."' />".
                                                                "</div>".
                                                            "</div>".
                                                            "<div class='text'>".
                                                                "<h5 class='name'>".$company_name."</h5>".
                                                                "<p><span class='".$class."'>".$c['bill_name']."</span></p>".
                                                            "</div>".
                                                    " </div>".
                                                        "<div class='au-message__item-time'>".
                                                            "<h4>$".number_format((float)$c['amount_paid'],2)."</h4>".
                                                        "</div>".
                                                    "</div>".
                                                "</div>";
                                                $i++;
                                            }

                                            ?>



                                            </div>
                                            <div class="au-message__footer">
                                                <button class="au-btn au-btn-load js-load-btn">load more</button>
                                            </div>
                                        </div>
                                        <div class="au-chat">
                                            <div class="au-chat__title">
                                                <div class="au-chat-info" style="display: inline;">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar avatar--small">
                                                            <img src="images/avatar.jpg" alt="John Doe" />
                                                        </div>
                                                    </div>
                                                    <span class="nick">
                                                            <a href="#" class="company_name">Gorilla Safaris</a>
                                                    </span>
                                                    <label class="float-right">
                                                        Expires On<br>
                                                    <span class="badge badge-info expiry_date"> 2019-06-08</span>
                                                </label>

                                                </div>
                                            </div>
                                            <div class="au-chat__contenth text-center mt-5">
                                                <span class="pull-right ml-3 au-message__item_lisence"> <i class="fas fa-arrow-right fa-2x text-blue"></i></span>
                                                <label class=""> Lisences Generated</label>
                                                <table class="table table-striped" style="font-size: 12px;" id="license_tb">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">period<small>(days)</small></th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Billing Plan</th>
                                                            <th scope="col">Created On</th>
                                                            <th scope="col">Used On</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                                       
                                                    </tbody>
                                                </table>



                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url( 'images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>Billing</h3>
                                        <button class="au-btn-plus">
                                                <i class="zmdi zmdi-plus"></i>
                                            </button>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <p>Top Billing Plan Subscriptions</p>
                                        </div>
                                        <div class="au-task-list js-scrollbar3">

                                        <?php 
                                            $billing_plans = DB::query("select *,
                                            (select COUNT(amount_paid)  from billing_tb where billing_plan_id= p.id and used_at IS NOT NULL) as subscriptions
                                            from  billing_plan_tb p where enabled=1 order by subscriptions DESC");
                                            $i=0;
                                            foreach($billing_plans as $b){
                                                $name=$b['title']."-".$b['code'];
                                                if($i%3==0)
                                                    $class="au-task__item--danger";
                                                if($i%3==1)
                                                    $class="au-task__item--warning";
                                                if($i%3==2)
                                                    $class="au-task__item--primary";
                                                ?>
                                            <div class="au-task__item <?php echo $class;?>">
                                                <div class="au-task__item-inner">
                                                    <label class="task">
                                                        <a href="#"><?php echo $b['title'];?> </a>
                                                        - <small href="#"><?php echo $b['code'];?> </small>
                                                    </label>
                                                    <span class="badge badge-success float-right" style="font-size: 23px;"><?php echo $b['subscriptions']; ?></span><br>
                                                    <span class="time">$<?php echo $b['price'];?>/mo</span>
                                                </div>

                                                </div>

                                            <?php $i++; }?>

                                        </div>
                                        <!-- <div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Companies</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning" id="company_tb">
                                        <thead>
                                            <tr>
                                                <th >Date Joined</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-right">Users</th>
                                                <th class="text-center">Billing Plan</th>
                                                <th class="text-right">Active Lisence</th>
                                                <th class="text-right">Expiry Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-placement="top" title="Generate License for Gollira Safaris" data-toggle="modal" data-target="#licensemodal">
                                                <td>2018-09-29 05:57</td>
                                                <td class="text-center">Gollira Safaris</td>
                                                <td class="text-center">galai@gmail.com</td>
                                                <td class="text-right">12</td>
                                                <td class="text-center">Standard</td>
                                                <td class="text-center">LI6EH6YH7HR73FFF</td>
                                                <td class="text-center">2019-09-29 05:57
                                                    <p><span class="badge badge-success">Active</span></p>
                                                </td>

                                            </tr>

                                            


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2011 Lacel. All rights reserved. <a href="">Lacel</a>.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- modal scroll -->
    <div class="modal fade" id="licensemodal" tabindex="-1" role="dialog" aria-labelledby="licensemodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="licensemodalLabel">Generate License</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>
                <div class="modal-body px-5">
                    <div class="row m-b-25">
                        <div class="col-lg-3 ">
                            <img class="md-logo  img-100" src="" alt="logo" />
                        </div>
                        <div class="col-lg-4 text-center">
                            <p class="md-company_name">Company Name</p>
                            <p class="md-email">alex@lacel.tech</p>
                            <p class="md-tel">+256700943112</p>
                        </div>
                        <div class="col-lg-5 text-right" style="font-size: 12px;">
                            <p>Billing Plan: <b class="md-bill_name">STANDARD</b></p>
                            <p>License: for <b>60 DAYS </b></p>
                            <p>EXPIRIES ON: <b class="md-expiry"> 2019-06-08</b></p>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box">
                                <h3 class="box-title">Select Billing Plan</h3>
                                <?php 
                                 foreach($billing_plans as $b){
                                     ?>
                                    <div class="plan-selection">
                                    <div class="plan-data">
                                        <input id="<?php echo $b['id'];?>" name="billing-plan" type="radio" value="<?php echo $b['price'];?>" onchange="setAmount()" checked/>
                                         <label for="<?php echo $b['id'];?>" class="ml-2"> <?php echo $b['title'];?> - <small>(<b>$<?php echo $b['price'];?>/mo</b>)</small>
                                         </label>
                                    </div>
                                </div>
                                <?php  } ?>
                                
                                

                            </div>

                        </div>
                        <div class="col-6 bottom-align-item pt-5">
                            <div class="input-group mt-5">
                                <input class="form-control" type="number" min='0' value=0 id="period-length" onkeyup="setAmount()" onchange="setAmount()">
                                <div class=" input-group-prepend rs-select2--dark rs-select2--sm rs-select2--border">
                                    <select class="js-select2 au-select-dark" id="period-interval" onchange="setAmount()">
                                        <option selected="selected" value=1>Days</option>
                                        <option value=30>Months</option>
                                        <option value=360>Years</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                            </div>



                            <h4 class="mt-5"> Total Amount : $ <b class="amount"></b>
                            </h4>

                            
                            <p class="mt-5" id="license-label"></p>
                        </div>

                        <small class="text-red">Note: The Client will loose the remaining days if you Choose a different billing plan when their current plan has not yet expired</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancel</button>
                    <input type="hidden" id="company_id" />
                    <button type="button" class="btn btn-success pull-right" onclick="getLicense(this)">Generate License</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal scroll -->

 <!-- Main JS-->
 <script src="js/main.js"></script>
    


    

</body>

</html>
<!-- end document-->

<script type="text/javascript">

$(function() {
    get_companies()
})
    function getLicense(btn) {
        
        var company_id = $('#company_id').val();
        

        if ($('input[type="radio"][name="billing-plan"]:checked').length) {
                var price = $('input[type="radio"][name="billing-plan"]:checked').val()
                var billing_plan_id = $('input[type="radio"][name="billing-plan"]:checked').attr('id');
        }else{
            x0p({
                title:'Error',
                   text: 'Invalid billing plan, Please select a period greater than one.',
                   animationType:'slideDown',
                   icon:'error',
                   autoClose:3000,
                    });
            return false;
        }
       
        var period = parseInt($('#period-length').val()) * parseInt($('#period-interval').val());
        if(isNaN(period) || period==0){
            x0p({
                title:'Error',
                   text: 'Invalid period, Please select a period greater than one.',
                   animationType:'slideDown',
                   icon:'error',
                   autoClose:3000,
                    });
            return false;
        }
        var number_of_days =period;
        var amount_paid = price * number_of_days / 30;

        var btn_html =  $(btn).html();
        $(btn).html("<i class='fa fa-spin fa-spinner'></i> Generation License...");
        $(btn).prop("disabled", true);
       
        $.post("../src/license.php", {
                action: "get_license",
                company_id_: company_id,
                billing_plan_id: billing_plan_id,
                amount_paid: amount_paid,
                number_of_days: number_of_days
            },
            function(data) {
                $(btn).html(btn_html);
                $(btn).prop("disabled", false);

                if (data.length == 16){
                    $('#license-label').html("<b>License: <FONT color='red'>"+data.substr(0,4)+"</FONT> - <FONT color='red'>"+data.substr(4,4)+"</FONT> - <FONT color='red'>"+data.substr(8,4)+"</FONT> - <FONT color='red'>"+data.substr(12)+"</FONT></b><br> <small>Please copy the above license before you exit</small>")
                    x0p('License Generated', 'You have Sucessfully Generated License.', 'ok', function() {
                //  window.location.href = "../dashboard";
                 });
                }
                else
                x0p('Error',
                    'failed to get license contact Alex.',
                    'error', false);
            });
    }

    function setAmount() {

        if ($('input[type="radio"][name="billing-plan"]:checked').length) {
                var price = $('input[type="radio"][name="billing-plan"]:checked').val()
        }else{
            var price =0;
        }
       
        var period = parseInt($('#period-length').val()) * parseInt($('#period-interval').val());
        period = (isNaN(period)) ? 0 : period;
       
        var amount = price * period / 30;
        amount = parseFloat(amount).toFixed(2);
        amount = amount.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('.amount').html(amount);

    }

    function get_companies(){
       
        $.post("includes/get_data.php", {
            token: "companies",
        }, function(data) {
            setcompanies(data)
        })
    
    }

    function setcompanies(data){
            var data = JSON.parse(data);
            var rows = "";
            var table = $("#company_tb");
            var tableBody = table.find('tbody');
            tableBody.html("<tr><td colspan=6 class='p-5'><i class='fa fa-spin fa-spinner fa-3x text-green'></i> Loading...</td></tr>");
            $.each(data, function(i, item) {
                var c_id = item.id;
                var c_name = item.company_name;
                var date = item.time_stamp;
                var email = item.email;
                var users = item.user_count;
                var bill = item.bill_name;
                var license = item.license;
                var expiry_date = item.expiry_date;
                // var rc = item.rooms.length;
             
                
                rows += "<tr data-placement='top' title='Generate License for Gollira Safaris' data-toggle='modal' data-target='#licensemodal' onclick='get_companies_details("+c_id+")'>" +
                       " <td>"+date+"</td>"+
                        "<td class='text-center'>"+c_name+"</td>"+
                        "<td class='text-center'>"+email+"</td>"+
                        "<td class='text-right'>"+users+"</td>"+
                        "<td class='text-center'>"+bill+"</td>"+
                        "<td class='text-center'><span class='badge badge-success'>Active</span></td>"+
                        "<td class='text-center'>"+expiry_date+"</td>"+
                    "</tr>";

                   
                


            })
            
            tableBody.html(rows);
            // $('#top-companies').html(div);
            // fixTableHead(".table-primary");
            
            if(rows==""){
               
            tableBody.html("<tr><td colspan='7' style='background-color:#fff'><p class='text-muted p-5'>Looks like you have not registered any companies </p></td></tr>");
           

               }
            // console.log(rows)
        


    }

    function get_companies_details(id){
        $('#license-label').html("")
        $.post("includes/get_data.php", {
            token: "company_details",
            company_id: id,
        }, function(data) {
            var data = JSON.parse(data);
            var imgfolder = "../img/settings/";
            $('.md-company_name').html("<h3>"+data.company_name+"</h3>");
            $('.md-email').html(data.email);
            $('.md-tel').html(data.phone);
            $('.md-bill_name').html(data.bill_name);
            $('.md-expiry').html(data.expiry_date);
            $(".md-logo").attr("src", imgfolder + data.logo);
            $("#company_id").val(data.id);
        })
    }

    function licenseHistory(id,company_name,expiry_date){
        $('.expiry_date').html(expiry_date);
        $('.company_name').html(company_name);
        $.post("includes/get_data.php", {
            token: "company_license_history",
            company_id: id,
        }, function(data) {
            var data = JSON.parse(data);
            var rows = "";
            var table = $("#license_tb");
            var tableBody = table.find('tbody');

            tableBody.html("<tr><td colspan=6 class='p-5'><i class='fa fa-spin fa-spinner fa-3x text-green'></i> Loading...</td></tr>");
            var k=1;
            $.each(data, function(i, item) {
                
                rows += "<tr scope='row'>" +
                       " <td class='text-left'>"+k+"</td>"+
                       " <td >"+item.number_of_days+"</td>"+
                        "<td >"+item.amount_paid+"</td>"+
                        "<td >"+item.billing_name+"</td>"+
                        "<td>"+item.created_at+"</td>"+
                        "<td>"+item.used_at+"</td>"+
                        
                    "</tr>";

                    
                
                k++;

            });
            tableBody.html(rows);
            if(rows==""){
               
            tableBody.html("<tr><td colspan='5' style='background-color:#fff'><p class='text-muted p-5'>Looks like you have not generated any licenses for this company</p></td></tr>");
           

               }
            // console.log(rows)
        })
    }

</script>
