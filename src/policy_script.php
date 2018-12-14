<?php 

require_once 'config.php';

$data = $_POST['data'];
$data_decoded = json_decode($data, TRUE);



switch($_POST['token']){

case 'save_data':
   
$table= "hotel_policy_tb";
    $q =  DB::queryFirstRow("SELECT * FROM $table WHERE  company_id = {$company_id}");
    $counter = DB::count();
    if ($counter==0) {
        echo save_data('hotel_policy_tb', $data);
    }
    else{
        $t= DB::update('hotel_policy_tb', $data_decoded, " company_id=%?",  $company_id );

         echo "Successfully Updated";
    }

  
    break;

 case 'fetch_policy':
       
    $table= "hotel_policy_tb";
    //$property_id= $_POST["property_id"];
    $company_id= $_POST["company_id"];
    $response = DB::queryFirstRow("SELECT * FROM $table WHERE company_id = {$company_id}");
        
    echo json_encode($response);

        break;   
}



    function save_data($tablname, $data){
        
        $data = json_decode($data, TRUE);
      
        $result = DB::insert($tablname, $data);
      
        echo "Hotel Policy Added";
}
