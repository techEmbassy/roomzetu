<?php include('../src/config.php');

if(!isset($_SESSION['login']["user_id"]) ){        
    header("Location: ../login?logout=1");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>

    <?php $title = isset($title) ? $title :"Hotel management system";?>
    <title>
        <?php echo $title;?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css?v=244">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/text-color.css" rel="stylesheet" type="text/css" />
    <link href="../css/animate.css" rel="stylesheet" type="text/css" />
    <link href="../img/logo.png" type="image/png" rel="shortcut icon">
    <!--//beautiful alert-->
    <link href="../css/x0popup.min.css" rel="stylesheet" type="text/css" />


</head>
