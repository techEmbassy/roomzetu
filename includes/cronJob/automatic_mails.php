<?php
require_once '../src/meekrodb.php';
DB::$user = 'roomzetu_admin';
DB::$password = '!;AC[&sF]}GN';
DB::$dbName = 'roomzetu_data';

$now=date('Y-m-d H:i:s');
$where=new WhereClause("and");
$where->add("DATEDIFF(CURDATE(), expiry_date) >= -10");
$where->add("send_mail_on_expiry_attempts<%l",3);

$companys = DB::query("SELECT id,company_name,email,billing_plan,send_mail_on_expiry_attempts, expiry_date, DATEDIFF(CURDATE(), expiry_date) as due_days FROM company_tb WHERE  %l", $where);

foreach($companys as $company){
    $company_id=$company['id'];
    $attempt=$company['send_mail_on_expiry_attempts'];
    $expiry_date=$company['expiry_date'];
    $due_days=$company['due_days'];
    $email=$company['email'];

    if($attempt=0 && $due_days>= -10){
        makeEmail($body, $name, $email, $phone,$logo,$address);
    }elseif($attempt = 1 && $due_days>=0){

    
    }elseif($attempt = 2 && $due_days>=10){

    }else{
        continue;
    }

    DB::update("company_tb", array("send_mail_on_expiry_attempts"=>"send_mail_on_expiry_attempts + 1"), "company_id=%i", $company_id);
}
 
function makeEmail($body, $name, $email, $phone,$logo,$address){

}

?>