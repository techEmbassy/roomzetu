<?php
require_once 'meekrodb.php';
DB::$user = 'root';
DB::$password = 'root';
DB::$dbName = 'roomzetu_db';


//some constants
session_start();


$company_id = $_SESSION['login']["company_id"];
$manager_id = 1;
$property_id = 1;

$user_id = $_SESSION['login']["user_id"];
$role = $_SESSION['login']["role"];

$prop_id = $_SESSION['login']["property_id"];


$sn = array("property_name"=>"Piratebay");

//company_id
//proper id
//user id
//cname
//clogo
//pname
//namesofs


function get_booking_source($b_id,$s, $a_id){
    //if agent  returns agent name else returns guestname
        if(strtolower($a_id)!="0"){
            $a = DB::query("select * from agent_tb where id=%i", $a_id);
            return $a[0]['name'];
        }

        else{
          $a = DB::query("select * from guests_tb where booking_id=%s", $b_id);
            $names = array();

            foreach($a as $g){
                $fname = explode(" ",$g['name'])[0];
                array_push($names, $fname);

            }
            return implode(',',$names);
        }

    }
//echo makeEmail("Hello, thank you for booking with us", "Awesome lodges Uganda", "al@gmai.com","0783928773","", "4th street, some building");

function makeEmail($body, $name, $email, $phone,$logo,$address){

    $border_bottom = 'border-bottom:1px solid #ddd';
    $border_top = 'border-top:1px solid #ddd';
    $font = "";//'font-family:"Catamaran",Helvetica, Arial,sans-serif !important';
    $html ="<html><head><link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet' type='text/css'></head><body>";

    $html .= "<br><div style='background-color:#fff; border:1px solid #aaa; width:100%; max-width:688px; margin:auto;'>";
    //$html .='<span style="">';
    $html .= "<table style='border-spacing:0 !important; width:100%'>";
    $html .= "<tr>";
    $html .= "<td style='color:#999; $border_bottom; padding:30px;'>";
    $html .= "<img src='https://app.roomzetu.com/img/settings/$logo' height='50px' style='max-height:100px'>";

//    $html .= "<p>Online RPM System</p>";
    $html .= "</td>";

    $html .= "</tr>";
    $html .= "<tr>";
    $html .= "<td style='padding:30px;'>";
    $html .= $body;
    $html .= "</td>";

    //company contacts
   //$company = DB::query("select * from company wher")

    $html .= "</tr>";

    $html .= "</table>";

    $html .="<table style='width:100%'>";
    $html.="<tr>";
    $html.="<td style='padding:30px; $border_top;' >";
     $html .= "<p style='color:#777;  padding-bottom:20px; font-size:14pt;'><b>". strtoupper($name)."</b></p>";
    $html .= "<p style='color:#999;  opacity:0.8; font-size:12pt'><b>Tel:</b> $phone</p>";
    $html .= "<p style='color:#999;  opacity:0.8; font-size:12pt'><b>Email:</b> $email</p>";
    $html .= "<p style='color:#999;  opacity:0.8; font-size:12pt'><b>Address:</b> $address</p>";
        $html.="</td>";
        $html.="</tr>";

    $html .="</table>";

   // $html .="</span>";
    $html .= "</div>";
        $html .= "<br><div style='width:100%; max-width:688px; margin:auto;'>";

       $html .= "<table style='width:100%'>";


    $html .= "<td style='width:1px; padding:30px 0px; '>";
    $html .= "<img src='https://app.roomzetu.com/img/logo.png' height='50px'>";
//    $html .= "<img src='http://192.168.88.2/reservation/img/logo.png' height='50px'>";
    $html .= "</td>";


    $html .= "<td style='color:#999; padding:30px;'>";
    $html .= "<p style='color:#555;  font-size:10pt'>info@laceltech.com.</p>";
    $html .= "<p style='font-size:10pt'><a href='http://roomzetu.com' style='color:#d73'>Roomzetu</a>. Hotel reservation assitant.</p>";
    $html .= "<p>&copy;".date('Y')." Lacel Technologies</p>";
    $html .= "</td>";
    $html .= "</tr>";
    $html .= "</table>";
    $html .= "</div>";
    $html .= "</body></html>";


    return $html;
}

function makeGenericEmail($body){

    $border_bottom = 'border-bottom:1px solid #ddd';
    $border_top = 'border-top:1px solid #ddd';
    $font = "";//'font-family:"Catamaran",Helvetica, Arial,sans-serif !important';
    $html ="<html><head><link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet' type='text/css'></head><body>";

    $html .= "<br><div style='background-color:#fff; border:1px solid #aaa; width:100%; max-width:688px; margin:auto;'>";
    //$html .='<span style="">';
    $html .= "<table style='border-spacing:0 !important; width:100%'>";
    $html .= "<tr>";
    $html .= "<td style='color:#999; $border_bottom; padding:30px;'>";
    $html .= "<h4><b>Roomzetu</b></h4>";
    $html .= "<p>Online RPM System</p>";
    $html .= "</td>";


    $html .= "</tr>";
    $html .= "<tr>";
    $html .= "<td style='padding:30px;'>";
    $html .= $body;
    $html .= "</td>";

    //company contacts
//    $company = DB::query("select * from company wher")

    $html .= "</tr>";

    $html .= "</table>";
    $html .= "<table style='width:100%'>";
    $html.="<tr>";
    $html .= "<td colspan='2' style='background:#d73; padding:40px;'>";
    $html .= "<p style='color:#fff;  padding-bottom:20px; font-size:16pt;  $font;'>Easiest Solution for Managing Reservations at your Hotel or Lodge.</p><br>";
    $html .= "<a href='http://roomzetu.com'>";
    //$html .= "<table style='width:100%'>";
    $html .= "<div style='background:#fff;  padding-top:10px; padding-bottom:10px; text-align:center; font-weight:bold; text-decoration:none; color:#d73; font-size:14pt'>Get Started</div>";
//    $html .= "</td>";
   // $html .= "</table>";
    $html .= "</a>";

    $html .= "</td>";
    $html .= "</tr>";
    $html .= "<tr>";


    $html .= "<td style='width:1px; $border_top; padding:30px;'>";
    $html .= "<img src='https://app.roomzetu.com/img/logo.png' height='50px'>";
//    $html .= "<img src='http://192.168.88.2/reservation/img/logo.png' height='50px'>";
    $html .= "</td>";


    $html .= "<td style='color:#999; $border_top; padding:30px;'>";
    $html .= "<p style='color:#555'>support@laceltech.com.</p>";
    $html .= "<p><a href='http://roomzetu.com' style='color:#d73'>Roomzetu</a>. Hotel reservation assitant.</p>";
    $html .= "<p>&copy;".date('Y')." Lacel Technologies</p>";
    $html .= "</td>";
    $html .= "</tr>";
    $html .= "</table>";
   // $html .="</span>";
    $html .= "</div><br>";

    $html .= "</body></html>";


    return $html;

}
