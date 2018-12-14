<?php 
require_once 'src/config.php';
if(isset($_SESSION['login']["user_id"]) ){
        
        $_SESSION['flag']["first_time"]=null;
  }else{
        
        redirect_to('login?logout=1');
  }


function redirect_to( $location = NULL ) {
        if ($location != NULL) {
            header("Location: {$location}");
            exit;
        }
}

 
$exp = DB::queryFirstRow("SELECT billing_plan,expiry_date FROM company_tb WHERE id=".$company_id);

    
$BP=DB::queryFirstRow("SELECT title FROM billing_plan_tb WHERE id=".$exp['billing_plan']);
$currentBillingPlan=$BP['title'];

    $expiry_date=$exp['expiry_date'];
  
     $days_left= (strtotime($expiry_date)-strtotime(date('Y-m-d H:i:s')))/86400; 
                   if(!($days_left >0)) {
                          redirect_to('site/billing.php');
 }

$expiry_date=date('l, d M Y ', strtotime($expiry_date));
$days_left=floor($days_left);

$timeLeftFooter='<small>Your '.$currentBillingPlan.' plan expires in ' .$days_left.' days</small> <button class="btn btn-primary btn-sm" onclick="window.location=\'./site/billing.php\'">upgrade now!</button>';



 $p = DB::query("SELECT * FROM property_tb WHERE company_id = %i", $company_id);
 $propertyOptions = "<option value=0> All Properties</option>";
 $propertyOptions0 = "";

foreach($p as $o){
    
    $propertyOptions .="<option value='".$o['id']."'>".$o['property_name']."</option>";
    $propertyOptions0 .="<option value='".$o['id']."'>".$o['property_name']."</option>";
};

if($role==3){
    global $prop_id;
  $p = DB::queryFirstRow("SELECT * FROM property_tb WHERE company_id = %i AND id=%i", $company_id,$prop_id);
    $propertyOptions ="<option value='".$p['id']."'>".$p['property_name']."</option>";

    
}
 
$r = DB::query("SELECT * FROM roles_tb WHERE %i", 1);
 $rolesOptions ="";

if($role==2){
    foreach($r as $s){
    if(!($s['id']==1)){
        $roleOptions .="<option value='".$s['id']."'>".$s['role_name']."</option>";
    }
    }
}else{
foreach($r as $s){  
    
    $roleOptions .="<option value='".$s['id']."'>".$s['role_name']."</option>";
};
}


//property_name
$propertyName = $sn['property_name'];

?>