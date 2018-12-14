<!DOCTYPE html>
<?php 
session_start();

if(isset($_SESSION['flag']["first_time"]) ){
        
  }else{
        
        redirect_to('login.php?logout=1');
  }


function redirect_to( $location = NULL ) {
        if ($location != NULL) {
            header("Location: {$location}");
            exit;
        }
}


?>
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
    
    <link href="img/logo.png" type="image/png" rel="shortcut icon">
    
    <!-- <object type="text/html" data="includes/styles.html"></object>-->
</head>

<body>


    <div class="container">
        <br/>

        <div class="cards p-3 animated fadeIn text-center">
            <p class="text-center animated fadeIn"><img src="img/logo.png" width="100px" /></p>
            <h1 class="text-light animated fadeIn mb-4">Hi <span><?php if(isset($_SESSION['login']["user_name"])){ echo $_SESSION['login']["user_name"];}?></span>, Thank you for signing up</h1>
            <p class="text-lights animated fadeIn">You have successfully created a free account for the most effective hotel management system. <br/>You can start enjoying 14 days trial right away with all premium features activated. You can however activate your account right away to enjoy uninterrupted services</p>

            <p><br></p>
            <a class="btn btn-primary btn-lg animated fadeInLeft" href="site/billing.php">Upgrade Now</a>
            <a class="animated fadeInRight btn btn-outline-primary btn-lg" href="dashboard">Start Your Trial</a>
        </div>

    </div>







</body>


<script src="js/jquery.min.js"></script>



</html>
