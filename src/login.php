<?php

require_once 'config.php';


login();

function login(){
    $email = $_POST['email'];
    $password =sha1($_POST['password']);
    
    $rememberMe = $_POST['rememberMe'];

    $sql = "SELECT id, name,company_id,role,property_id FROM users_tb WHERE email = '$email' and password = '$password'";
    $result = DB::query($sql);
    print_r($result);
    if($result){
        echo $name;

        $_SESSION['login']["user_id"]= $result[0]['id'];
        $_SESSION['login']["company_id"]= $result[0]['company_id'];
        $_SESSION['login']["user_name"]= $result[0]['name'];
        $_SESSION['login']["role"]= $result[0]['role'];
        $_SESSION['login']["property_id"]= $result[0]['property_id'];
        $_SESSION['welcome'] = 1;
        
//        if($rememberMe=='checked'){
//				setcookie("email", $email, time()+(7 * 24 * 60 * 60));
//				setcookie("password", $password, time()+(7 * 24 * 60 * 60));
//			}else{
//				if(ISSET($_COOKIE['email'])){
//					setcookie("email", "");
//				}
//				if(ISSET($_COOKIE['password'])){
//					setcookie("password", "");
//				}
//			}
        
        
        
        
    }else{
        echo "404";
    }
}

?>
