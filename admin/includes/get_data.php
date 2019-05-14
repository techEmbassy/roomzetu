<?php
require_once 'config.php';

$token = $_POST['token'];
switch($token){
   case 'companies':
   $companies = DB::query("select 
   *, IFNULL(b.title,'N/A') as bill_name,
    (select COUNT(id) from users_tb where company_id=c.id) as user_count,
    (select license from billing_tb where company_id=c.id limit 1) as license
   from company_tb c LEFT JOIN billing_plan_tb b on b.id=c.billing_plan LIMIT 20");

   $cc=array();
   foreach($companies as $c){
      $c['expiry_date'] = date('d F, Y ', strtotime($c['expiry_date']));
      $c['time_stamp'] = date('d F, Y ', strtotime($c['time_stamp']));
  array_push($cc,$c);
   }
    echo json_encode($cc);
   break;

default :
echo "error uknown token :". $token;
break;
}