<?php
require_once 'config.php';

$token = $_POST['token'];
switch($token){
   case 'companies':
   $companies = DB::query("select 
   c.*, IFNULL(b.title,'N/A') as bill_name,
    (select COUNT(id) from users_tb where company_id=c.id) as user_count,
    (select license from billing_tb where company_id=c.id limit 1) as license
   from company_tb c LEFT JOIN billing_plan_tb b on b.id=c.billing_plan LIMIT 200");

   $cc=array();
   foreach($companies as $c){
      $c['expiry_date'] = date('dS M, Y ', strtotime($c['expiry_date']));
      $c['time_stamp'] = date('dS M, Y ', strtotime($c['time_stamp']));
  array_push($cc,$c);
   }
    echo json_encode($cc);
   break;

   case 'company_details':
   $id = $_POST['company_id'];
   $company = DB::queryFirstRow("SELECT c.*, IFNULL(b.title,'N/A') as bill_name FROM company_tb c LEFT JOIN billing_plan_tb b on b.id=c.billing_plan  WHERE c.id=%l",$id);

   $company['expiry_date'] = date('dS M, Y ', strtotime($company['expiry_date']));
  
    echo json_encode($company);
   break;

   case 'company_license_history':
      $id = $_POST['company_id'];
      $licenses = DB::query("SELECT b.*,p.title as billing_name FROM billing_tb b  JOIN billing_plan_tb p on p.id=b.billing_plan_id  WHERE company_id=%l AND used_at IS NOT NULL",$id);
   
      $ll=array();
      foreach($licenses as $l){
         $l['created_at'] = date('dS M, Y ', strtotime($l['created_at']));
         $l['used_at'] = date('dS M, Y ', strtotime($l['used_at']));
         array_push($ll,$l);
      }
      echo json_encode($ll);
   break;

default :
echo "error uknown token :". $token;
break;
}