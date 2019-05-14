<?php
require_once 'config.php';

$token = $_POST['token'];
switch($token){
   case 'companies':
   $companies = DB::query("select id,  from company_tb LIMIT 2");
    echo json_encode($companies);
   break;

default :
echo "error uknown token :". $token;
break;
}