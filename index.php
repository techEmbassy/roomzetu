<?php
session_start();
if(!isset($_SESSION[id])){
 header("location:login");
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php'?>
   
</head>

<body class="gray">
    <?php include 'includes/nav.php'?>    
</body>

<?php include 'includes/footer.php'?>