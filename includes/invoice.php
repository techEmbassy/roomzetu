<?php
if(isset($_POST['preview'])){
include '../src/config.php';
}


$html="<style>
@page {
margin: 1.2cm;
}
.invoice {
font-family: 'DejaVu Sans', 'Helvetica', sans-serif;
}
.invoice table {
width: 100%;
margin-bottom: 5px;
border-spacing: 0 !important
}
.invoice-title {

font-weight: 400;

text-transform: uppercase;
font-size: 18pt;
}
.number-label{
background: #eee;
padding: 10px;
color: #fff;
font-weight: 900;
text-align: center;
vertical-align:middle;
font-size: 12pt;
}
.invoice-number span {

text-align: center;
color: #666;
font-size: 20pt;
margin: 10px;
}
.bg-gray {
background: #f6f6f6;
}

table.no-borders td {
border: none;
padding-left: 0 !important;
}

.m-0 {
margin: 0 !important;
}
.invoice p {
font-size: 10pt;
color: #444;

}

.c-logo{

vertical-align:bottom !important;

}

.c-logo img{
max-width:200px;


}

table{
border-spacing:0px !important;
border:collapse;
}
.tablehead th {
background: #FAEFEB;
background: rgba(49,04,8,0.1);
color: #000;
padding: 7px 5px;
font-weight: 800;
text-transform: uppercase;
font-size: 7pt;
border-left:1px solid #aaa !important;
border-top:1px solid #aaa !important;
border-bottom:1px solid #aaa !important;

text-align: left;
}

.tablehead tr th:last-child{
border-right:1px solid #aaa !important;
}
.text-right {
text-align: right !important;
}
table td {
vertical-align: top !important;
}
table{width:100%}
table td,
table th {
border-spacing: 0 !important;
}
.table-invoice td {
padding: 5px 10px;
font-size: 9pt;
color: #222;
background: #fff;
vertical-align: middle !important;
border-left: 0.5px solid #aaa;
border-bottom: 1px solid #aaa !important;

}
.table-invoice tr td:last-child {
border-right: 0.5px solid #aaa;
}
.table-sm td {
font-size: 10pt;
padding: 5px 5px;
background: #f8f8f8;
margin: 0;
vertical-align: middle !important
}
.total-row td {
background: #1c5690;
color: #fff;
}

.total-row td {
background: #fff;
color: #000;
border-top:2px solid #555;
border-bottom:2px solid #555;
} .total-row td:first-child {

border-left:2px solid #555;

}
.total-row td:last-child {

border-right:2px solid #555;

}


.total-row td:last-child {
font-weight: 900 !important;
font-size: 16pt;
}
.hr {
height: 3px;
background: #347fca;
background: #bbb;
}
h5 {

}
.text-muted {
color: #888;
}
.text-justify{
text-align: justify !important;
}
.tb-summary{

}
.tb-summary td{
height:40px;

vertical-align:middle !important;
font-size:10pt !important;
background-color:#eee;
text-align:center;
border-left:1px solid #888;
border-top:1px solid #888;
border-bottom:1px solid #888;

}
.tb-summary td:last-child{
border-right:1px solid #888;
;
}
.notes{
font-size:10pt;
}
.v-b{ vertical-align:bottom !important}
</style>";

session_start();

$parent_folder = "../";
//if(isset($preview)){
if(isset($_POST['preview'])){
$parent_folder = "";
}


$company_id = $_SESSION['login']["company_id"];

$company=DB::queryFirstRow("select company_tb.*,hotel_policy_tb.policy as hotel_policy from company_tb join hotel_policy_tb on hotel_policy_tb.company_id = $company_id AND company_tb.id=$company_id");

//company particulars;
$company_name = $company['company_name'];
$company_address = $company['address'];
$company_phone = $company['phone'] !=""? " <b>T:</b> ".$company['phone'] : "" ;
$company_email = $company['email'] !=""? " | <b>E:</b> ".$company['email'] : "" ;
$company_website = $company['website'] !=""? " | <b>W:</b> ".$company['website'] : "" ;
//$company_logo = $company['logo'] !=""? "<img src='{$parent_folder}img/settings/".$company['logo']."' class='logo'/>" : "" ;
$company_logo = $company['logo'] !=""? $parent_folder."img/settings/".$company['logo'] : "" ;
$company_bank_name = $company['bank'] !=""? $company['bank'] : "Not Added Yet" ;
$company_bank_account_name = $company['bank_account_name'] !=""? $company['bank_account_name'] : "Not Added Yet" ;
$company_bank_account_number = $company['bank_account'] !=""? $company['bank_account'] : "Not Added Yet" ;

//hotel policy
$policy = $company['hotel_policy'];
$hotel_policy = $policy !="" ? "<br/><div class=\"hr\"></div><div class=\"text-justify notes\"><br><br><h4><b>Hotel policy</b></h4><small>". $policy."</small></div>" : "";

//company invoice attributes
$invoice = DB::queryFirstRow("select * from invoice_template_tb where company_id=%s", $company_id);
$notes = $invoice['notes'] !="" ? "<br/><div class=\"hr\"></div><div class=\"text-justify notes\"><br><br><h4><b>Terms &amp; Notes</b></h4>". $invoice['notes']."</div>" : "";
//$taxes = $invoice['taxes'] !="" ? json_decode($invoice['taxes'], true) : array();
$prefix = $invoice['prefix'] !="" ? $invoice['prefix']."-" : "";
$due_days = $invoice['due_date'] !="" ? $invoice['due_date'] : 0;
$invoice_title = $invoice['title'] !="" ? $invoice['title'] : "INVOICE";


$main_company_logo = "";

//invoice variables
/*booking*/
$id = 0;

if(!isset($_POST['booking_id'])){
// $logo = "../img/logo.png";
$id = $_GET['id'];
// echo $id;
}


else{
$id = $_POST['booking_id'] != 0  ? $_POST['booking_id']  : 0;
//$id = $_POST['booking_id'];
}


//echo "bid = ". $_POST['booking_id'] ;
$booking =  DB::queryFirstRow("select * from booking_tb where id=%i", $id);

$total_guests = 1;
$booking_date = $booking['booking_date'];
$invoice_number = $booking['invoice_no'];
$total_guests = $booking['no_guests'];
$booking_name = $booking['booking_name'];
$agent_id = $booking['agent_id'];
$discount = $booking['discount'];
$tcost = $booking['cost'];
$booking_number = $booking['booking_reference'];
$taxes =  $booking['taxes'] !="" ? json_decode($booking['taxes'], true) : array();
$beds =  $booking['extra_beds'] !="" ? json_decode($booking['extra_beds'], true) : array();
$kids = $booking['children_rates'];

if($booking['prepared_by'] !=0){
    $user =  DB::queryFirstRow("select name from users_tb where id=%i", $booking['prepared_by']);
    $prepared_by=$user['name'];
}else{
    $prepared_by='--'; 
}


//booking payment options
$invoice_payments = array();
//payment option not specified for booking
if($booking['invoice_payment_options'] !="" && $booking['invoice_payment_options'] !="[]"){    
  
        $invoice_payments = json_decode($booking['invoice_payment_options'], true);


}
else{
  $invp = $invoice['payments'];
  $invp = str_replace('\\',"", $invp);
  $invp = str_replace('"[',"[", $invp);
  $invp = str_replace(']"',"]", $invp);
  $invoice_payments = json_decode($invp, true)[0];
}




if($kids ==""){
    $kids = array();
}
else{
    
    $kids = json_decode($kids, true);
}
//print_r($beds);
$email = "";
$phone = "";



$due_date =  date("d/m/Y", (strtotime($booking_date) + $due_days * 24 * 3600));
$issue_date = date('d/m/Y', strtotime($booking_date));


///get all rooms booked as other rooms
$w = new WhereClause('and'); 
$w ->add("booked_as =%i", 0); 
$w->negateLast(); 
$w ->add("booked_as =%s", ""); 
$w->negateLast();
$w->add("booking_id=%i", $id); 
$booked_rooms_as = DB::query("select property_id, booked_as as room_type_id, property_name, booking_id, room_type_name, count(id) as units, check_in_date, check_out_date, price_per_night, meal_plan, meal_plan_per_day ,booked_as from booked_rooms_v where %l group by room_type_id,check_in_date, check_out_date", $w);
// $booked_rooms_as = DB::query("select property_id, booked_as as room_type_id, property_name, booking_id, room_type_name, check_in_date, check_out_date, price_per_night, meal_plan, meal_plan_per_day ,booked_as from booked_rooms_v where %l", $w);


//get all rooms booked normally
$w  = new WhereClause('and');
$s = $w -> addClause('or');
$s ->add("booked_as = %i", 0);
$s ->add("booked_as = %s", "");
$s ->add("booked_as is NULL");
$w->add("booking_id=%i", $id);
//$w=1;
$booked_rooms_normal = DB::query("select property_id, room_type_id, property_name, booking_id, room_type_name, count(id) as units, check_in_date, check_out_date, price_per_night, meal_plan, meal_plan_per_day ,booked_as from booked_rooms_v where %l group by   room_type_id,check_in_date, check_out_date", $w);

// $booked_rooms_normal = DB::query("select property_id, room_type_id, property_name, booking_id, room_type_name, check_in_date, check_out_date, price_per_night, meal_plan, meal_plan_per_day ,booked_as from booked_rooms_v where %l", $w);


//join the two arrays together

$booked_rooms =  array_merge($booked_rooms_normal, $booked_rooms_as);
//var_dump($booked_rooms_as);



//var_dump($booked_rooms);
/**check if rooms are booked from same property*/
$prop_id = $booked_rooms[0]['property_id'];

$same_property = true;
foreach($booked_rooms as $rms){
  // echo "hello";
  if($prop_id != $rms['property_id']){
    $same_property = false;

    break;
  }
  //echo "hello";
}
if($same_property == true){

 $property=DB::queryFirstRow("select property_image, property_name from property_tb where id = %i", $prop_id);
 $property_logo ="{$parent_folder}img/settings/{$property['property_image']}";
 //print_r("hhh".$property_logo);

if($property['property_image'] != ""){
  //echo" 00000888";
  $company_logo = $property_logo;
 $company_name = "<b style='font-size:12pt;'>".$company_name."</b><br>".$property['property_name'];
 $main_company_logo ="{$parent_folder}img/settings/{$company['logo']}";
}

}
//extras
$extras = DB::query("select * from booked_extras_v where booking_id = %i", $id);

//print_r($extras);

//echo "agent id = ". $agent_id;
//billing address
$bill_address = array();
if($agent_id == "0"){///if booking not made by agent
//    $bill_address['name'] = "clients name";
//    $bill_address['phone'] = "client phone";
//    $bill_address['email'] = "client email";// $agent['email'];
//    $bill_address['address'] = "client address";// $agent['address'];

$guest = DB::queryFirstRow("select * from guests_tb where booking_id=%i order by guest_id desc", $id);
//    foreach($guests as $guest){
// if($guest['phone']!="" || $guest['email'] !="" ){
$bill_address['name'] =  ucwords($guest['name']) ;
$bill_address['email'] = $guest['email'] ;
$bill_address['phone'] = $guest['phone'] ;
$bill_address['address'] = '';

//}
//}
}


else{//if booking by agent
// $bill_address
$agent = DB::queryFirstRow("select * from agent_tb where id=%i", $agent_id);
// print_r($agent);
$bill_address['name'] = ucwords($agent['name']);
$bill_address['phone'] = $agent['phone'];
$bill_address['email'] = $agent['email'];
$bill_address['address'] = $agent['address'];
}


$html.="<title>Invoice - ". strip_tags($bill_address['name'])."</title> <section class=\"paper-size p-5 invoice\" id=\"c-table\">
<div id=\"divInv\" class=\"card-body p-0\">
<!-- Invoice Company Details -->
<div id=\"invoice-company-details\">
<div class=\"media-body \">
<table>
<tr>
<td width='1px' class='c-logo'>
<img src='$company_logo' height='80px' alt='' />

</td>
<td  class='text-right v-b'>";

if(isset($main_company_logo) && $main_company_logo != ""){
$html.="<img height='50px' src='$main_company_logo' alt='' />";
}
$html.="<h3 class=\"m-0\">$company_name</h3>
<p class=\"m-0\">$company_address</p>
<p class=\"m-0\">$company_phone $company_email $company_website </p>

</td>
</tr>
</table>
<br>

</div>

<div class=\"hr\"></div>
<br>
</div>
</div>
<div id=\"invoice-customer-details\" class=\"\">

<table>
<tr>
<td class=\"border-bottom\" style='vertical-align:middle !important; width:200px; border-right:1px solid #bbb; padding-right:20px '>
<h1 class='invoice-title' style=\"\">". strtoupper($invoice_title)."</h1>
<p class=\"m-0\">Invoice Number: #<span style=\"font-size:15px\" id=\"t-receipt\">$invoice_number</span></p>
<p class=\"m-0\"><b>Booking Name:</b> $booking_name</p>
<p class='m-0'><b>Booking Reference:</b> $booking_number</p>
</td>


<td class=\"border-bottom\" width=\"150px\" style='padding-left:20px'>
<p class=\"text-muted \">INVOICE TO:</p>
<h5 class=\"m-0\"><b>". strip_tags($bill_address['name'])."</b>
</h5>
<p class=\"m-0\">
{$bill_address['address']}
<br>{$bill_address['phone']}
<br>{$bill_address['email']}

</p>
</td>

<td style='width:1px; text-align:right; vertical-align:bottom !important'>
<img src='{$parent_folder}img/qrcode.png' />
</td>

</tr>
</table>
<br>
<table class='tb-summary'>
<td>
<b>Issue Date: </b> $issue_date</td>
<td><b>Due Date</b>:
$due_date</td>
<td><b>Currency: </b> USD</td>
<td><b>#Guests: </b>
$total_guests</td>
</table>

</div>

<br>
<div id=\"invoice-items-details\" class=\"pt-2\">
<div class=\"row\">
<div class=\" col-sm-12\">
<h5 style=\"font-size:14px; padding-bottom:4px;\" class=\"m-0 mb-5\"><b>Accommodation</b></h5>
<table class=\"table-invoice\" id=\"table-inv\">
<thead class=\"tablehead\">
<tr>
<th>Property</th>
<th>Room Type</th>

<th>Check-in</th>
<th>Check-out</th>
<th>Nights</th>
<th>Units</th>

<th>Meals</th>
<th>Room/Night</th>
<th class=\"text-right\">Sub Total</th>
</tr>
</thead>
<tbody>";

$roomcost = 0;
$extracost = 0;
$totalcost = 0;
$kidscost = 0;
$bedcost = 0;

$totaltax;
 // print_r($booked_rooms);
 //$booked_rooms = array();
foreach($booked_rooms as $room){


$booked_as = DB::queryFirstRow("select * from room_types_tb where id=%i ", $room['booked_as']);


//print_r($booked_as);
$nights = 0;

$diff = strtotime($room['check_out_date']) - strtotime($room['check_in_date']);
$nights = floor($diff/3600/24);
$units =$room['units'];
$subtotal = $nights * $units * $room['price_per_night'];
$roomcost += $subtotal;
$meal_plan = $room['meal_plan'];
$room_type_id = $room['room_type_id'];
if(strtolower($meal_plan) == "custom"){
 $meal_plan = array();
 $meal_plan_per_day = json_decode($room['meal_plan_per_day'], true);
 
 foreach($meal_plan_per_day as $m){
   array_push($meal_plan, $m['meal_plan']);
 }

if(sizeof($meal_plan)>3){
   $meal_plan = "FB & HB";
}else{

	$meal_plan = implode(" + ", $meal_plan);

}

// print_r($room);

}
if(sizeof($booked_as)>0){
    $room['room_type_name'] = $booked_as['name'];

}

$html.="<tr>
<!--<td></td>-->
<td>{$room['property_name']}</td>
<td>{$room['room_type_name']}</td>
<td>".date('d/m/Y', strtotime($room['check_in_date']))."</td>
<td>".date('d/m/Y', strtotime($room['check_out_date']))."</td>

<td>$nights</td>

<td>{$units}</td>
<td>{$meal_plan}</td>
<td>".number_format($room['price_per_night'],1)."</td>
<td class=\"text-right\">".number_format($subtotal,1)."</td>
</tr>";
}

$totalcost += $roomcost;
$html.="<tfoot>";
$html.="<tr><td colspan='8' class='text-right'>TOTAL</td><td class='text-right'>".number_format($roomcost,1)."</td></tr>";
$html.="</tfoot>
</table>
<br>";



if(count($kids) > 0){
    //print_r($kids);
$html.=" <h5 style=\"font-size:14px; padding-bottom:4px;\" class=\"m-0\"><b>Children costs</b></h5>
<table class=\"table-invoice\" id=\"table-inv\">
<thead class=\"tablehead\">
<tr>
<th>Age Group</th>

<th>Cost per child</th>
<th>#</th>
<th>Nights</th>


<th class='text-right'>Sub Total</th>
</tr>
</thead>
<tbody>";
  
foreach($kids as $kid){

$kidscost += $kid['amount'];
$html.="<tr> <td>{$kid['age_bracket']}</td>
<td>".number_format($kid['unit_price'],1)."</td>
<td>{$kid['children']}</td>
<td>{$kid['nights']}</td>

<td class=\"text-right\">". number_format($kid['amount'],1)."</td>
</tr>";
}

$html.="</tbody>";
$html.="<tfoot>";
$html.="<tr><td colspan='4' class='text-right'>TOTAL</td><td class='text-right'>".number_format($kidscost,1)."</td></tr>";
$html.="</tfoot></table>"; 
    
    $totalcost += $kidscost;
}


if(count($beds) > 0){
    //print_r($kids);
$html.=" <h5 style=\"font-size:14px; padding-bottom:4px;\" class=\"m-0\"><b>Extra Bed costs</b></h5>
<table class=\"table-invoice\" id=\"table-inv\">
<thead class=\"tablehead\">
<tr>
<th>Rate Code</th>

<th>Cost per Night</th>
<th>No. Of Beds</th>
<th>Nights</th>


<th class='text-right'>Sub Total</th>
</tr>
</thead>
<tbody>";
  
foreach($beds as $bed){

$bedscost += $bed['amount'];
$html.="<tr> <td>{$bed['bed_name']}</td>
<td>".number_format($bed['unit_price'],1)."</td>
<td>{$bed['no_of_beds']}</td>
<td>{$nights}</td>

<td class=\"text-right\">". number_format($bed['amount'],1)."</td>
</tr>";
}

$html.="</tbody>";
$html.="<tfoot>";
$html.="<tr><td colspan='4' class='text-right'>TOTAL</td><td class='text-right'>".number_format($bedscost,1)."</td></tr>";
$html.="</tfoot></table>"; 
    
    $totalcost += $bedscost;
}




if(count($extras) > 0){

$html.=" <h5 style=\"font-size:14px; padding-bottom:4px;\" class=\"m-0\"><b>Extra Services</b></h5>
<table class=\"table-invoice\" id=\"table-inv\">
<thead class=\"tablehead\">
<tr>
<th>Service</th>

<th>Guests</th>
<th>Rate/Person</th>
<th class='text-right'>Sub Total</th>
</tr>
</thead>
<tbody>";


foreach($extras as $extra){
$etotal =  $extra['total_guests'] * $extra['unit_price'];
$extracost +=$etotal;
$html.="<tr> <td>{$extra['extra_name']}</td>
<td>{$extra['total_guests']}</td>
<td>".number_format($extra['unit_price'],1)."</td>
<td class=\"text-right\">". number_format($etotal,1)."</td>
</tr>";
}
$html.="</tbody>";
$html.="<tfoot>";
$html.="<tr><td colspan='3' class='text-right'>TOTAL</td><td class='text-right'>".number_format($extracost,1)."</td></tr>";
$html.="</tfoot>
</table>";
}

$totalcost += $extracost;

$disco  = round(($discount/$totalcost) *100,3);

$html.=" <table>
<td width=\"50%\">.</td>
<td>
<table class=\"table no-border table-sm \" id=\"table-inv\">
<tbody>

<!--<tr>
<td>Sub Total</td>
<td class=\"text-right\">$".number_format($totalcost,1)."</td>
</tr>-->

";
// $discount = 0;
if($discount > 0){
$html.="<tr>


<td><b>Discount (".round($disco,1)."%)</b></td>
 <td class=\"text-right\">$".number_format($discount,1)."</td>

</tr>";
$totalcost  = $totalcost - $discount;

}

$taxabale_amount=$totalcost-$extracost;
foreach($taxes as $t){
$totaltax+= $taxabale_amount * $t['taxamount']/100;
$html.="<tr><td>{$t['taxname']}({$t['taxamount']}%)</td><td class=\"text-right\">$". number_format($taxabale_amount * $t['taxamount']/100,1)."</td></tr>";
}


//get total paid

$payments = DB::query("select * from booking_payment where booking_id=%i", $id);
$totalpaid =  0;
foreach($payments as $payment){
$totalpaid +=$payment['amount'];
}

$grandtotal = $totalcost + $totaltax;
$outstanding = $grandtotal - $totalpaid;
$html.="<tr>
<td><b>Total Amount</b></td>
<td class=\"text-right\"><b>$".number_format($grandtotal,1)."</b></td>
</tr>
<tr>
<td>Paid:</td>
<td class=\"text-right\">$".number_format($totalpaid,1)."</td>
</tr>
<tr><th><br></th></tr>
<tr class=\"total-row\">
<td>Outstanding</td>
<td class=\"text-right\">$".number_format($outstanding,1)."</td>
</tr>

</tbody>

</table>

</td>
</table>


</div>
</div>

<div class=\"hr\"></div>


<table>
<td width=\"50%\">
<div class=\" p-3\">
<p class=\"lead\">Payment Details:</p>
<table class=\"table-sm\">";
//$html.= "<tr><td><b>Bank</b></td><td>".$invoice_payments."</td></tr>";
$tdstyle = "padding:1px 10px";
if($invoice_payments['bank_name'] !=""){
    $html.= "<tr><td style='$tdstyle'><b>Bank</b></td><td style='$tdstyle'>".$invoice_payments['bank_name']."</td></tr>";
}
if($invoice_payments['account_name'] !=""){
$html.= "<tr><td style='$tdstyle'><b>Account Name</b></td><td style='$tdstyle'>".$invoice_payments['account_name']."</td></tr>";
}

if($invoice_payments['account_number'] !=""){
$html.= "<tr><td style='$tdstyle'><b>Account Number</b></td><td style='$tdstyle'>".$invoice_payments['account_number']."</td></tr>";
}

if($invoice_payments['swift_code'] !=""){
$html.= "<tr><td style='$tdstyle'><b>SwiftCode</b></td><td style='$tdstyle'>".$invoice_payments['swift_code']."</td></tr>";
}
if($invoice_payments['bank_currency'] !=""){
$html.= "<tr><td style='$tdstyle'><b>Currency</b></td><td style='$tdstyle'>".$invoice_payments['bank_currency']."</td></tr>";
}
//foreach($invoice_payments as $ip){
//    
//$html.="<tr>
//<td><b>".strtoupper(str_replace('_',' ',key($ip)))."</b></td>
//<td>{$ip[key($ip)]}</td>
//</tr>";
//    
//}

$html.="</table>
</div>
</td>
<td class=\"text-right\">
<br><br>
<p class=\"m-0\">Prepared by:</p>
<h4 class=\"m-0\">".$prepared_by."</h4>
</td>
</td>
</table>

</div>


$notes<br>
$hotel_policy<br>
</section>";

if(isset($_POST['preview'])){
echo $html;
    //print_r($company);
}

?>
