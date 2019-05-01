<?php 
require '../includes/License/SecurityRSA.php'; 
require '../includes/License/Base32.php'; 
 
ini_set('post_max_size', '60M');
require_once 'config.php';


$action = $_POST['action'];
switch ($action) {

     case 'auth_license':
        auth_license();
     break;

     default:
     # code...
    // echo 9;
     break;
}

function auth_license(){
    global $company_id;
    

    $key1 = strtoupper ($_POST['key1']);
    $key2 = strtoupper ($_POST['key2']);
    $key3 = strtoupper ($_POST['key3']);
    $key4 = strtoupper ($_POST['key4']);
        
    $sub_license =  $key1.$key2.$key3.$key4;
    // $sub_license =  generateLicense();


    echo encryptLicense($company_id,$sub_license);
}



function encryptLicense($company_id,$license){

    $client_id = base_convert ( $company_id, 10, 2 );
    $text = $client_id . $license;

    $rsa = new SecurityRSA ();
    $b32 = new Base32 ();
    $n = 69834209;
	$e = 8945;
	$keys = array (
			$n,
			$e 
	);
    $b32->setCharset ( $b->csSafe );
	$encoded = $rsa->rsa_encrypt ( $text, $keys [1], $keys [0] );
    $key = $b32->fromString ( $encoded );
    return sha1($key);
}



function generateLicense() {
    $possible = "0123456789ABCDEFGHIJ0123456789KLMNOPQRESTUVWXYZ"; // allowed chars in the license
     
    srand(time());

     $i = 0; 
     $license = "";    
     while ($i < 16) { 
      $char = substr($possible, rand(0, strlen($possible)-1), 1);
      if (!strstr($license, $char)) { 
       $license .= $char;
       $i++;
       }
      }
    
     return $license;
}