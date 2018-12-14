

<?php
foreach(timezone_abbreviations_list() as $abbr => $timezone){
        foreach($timezone as $val){

        	   //echo $abbr;
                if(isset($val['timezone_id'])){
                        //var_dump($abbr,$val['timezone_id']);
                	echo $abbr;
                }
        }
}
?>


