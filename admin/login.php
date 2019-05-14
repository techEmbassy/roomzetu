<?php
 include 'includes/config.php';
$email = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password =sha1($_POST['password']);
        $result = DB::queryFirstRow("SELECT id, name FROM admin_users_tb WHERE email = '$email' and password = '$password'");
        
        if($result) {
           
            session_start();
            $_SESSION["authenticated"] = "TRUE";
            $_SESSION["user_name"] = $result['name'];
            $_SESSION["user_id"] = $result['id'];
            header('Location: dashboard.php');
            
        }
    }
    $msg = "Wrong Email or Password"; 
   
} 
if(isset($_GET['logout'])&& $_GET['logout']==1){
    unset($_SESSION["authenticated"]);
}

if(isset($_SESSION["authenticated"]) ){
   header('Location: dashboard.php');
   
}
else{
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <?php include 'includes/styles.php';?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="../img/logo.png" alt="Lacel Technologies" />
                            </a>
                        </div>
                        <div class="login-form">
                        
                                    <small class=" float-right text-red mb-2"><?php echo $msg; ?></small>
                           
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email"  required data-empty-message="provide email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required data-empty-message="provide password">
                                </div>
                               
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php } ?>
 <!-- Main JS-->
 <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->

<script>
  
</script>