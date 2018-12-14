<?php 

require_once 'config.php';

  $data = $_POST['data'];
        $tablname = $_POST['token'];
           $reference = $_POST['reference'];


delete_data($data, $tablname, $reference);

function delete_data($data, $table, $ref){
    
      $cond = "$ref=%s";

     
      $result = DB::delete($table, $cond, $data);

        if($result){
            echo "success";
        }else{
          echo "failed";
        }

      
}  







?>