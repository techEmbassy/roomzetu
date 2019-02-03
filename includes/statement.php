<?php
include '../src/config.php';

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
.text-center{
text-align: center !important;
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


$parent_folder = "";



$company_id = $_SESSION['login']["company_id"];

$company=DB::queryFirstRow("select * from company_tb where id = %i", $company_id);

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



$agent_id= $_POST['agent_id'] != 0  ? $_POST['agent_id']  : 0;
$agent = DB::queryFirstRow("select * from agent_tb where id=%i", $agent_id);







$html.="<title>Invoice - {$company_name }</title> <section class=\"paper-size p-5 invoice\" id=\"c-table\">
<div id=\"divInv\" class=\"card-body p-0\">
<div id=\"invoice-company-details\">
<div class=\"media-body \">
<table>
<tr>
<td width='1px' class='c-logo'>
<img src='$company_logo' />
</div>
</td>
<td  class='text-right v-b'>
<h3 class=\"m-0\">$company_name</h3>
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

<td class=\"border-bottom\" style='vertical-align:bottom !important; width:200px; border-right:1px solid #bbb; text-align:center;'>
<h1 class='invoice-title' style=\"\">CUSTOMER STATEMENT</h1>
<p class=\"m-0\"><b>".ucwords($agent['name'])."</b></p>
<p class=\"m-0\">AS AT ".date('d M Y')."</p>
</td>



</tr>
</table>


</div>

<br>
<div id=\"invoice-items-details\" class=\"pt-2\">
<div class=\"row\">
<div class=\" col-sm-12\">";



$html.="</table>
<br>";



//booking payment options
$bookings = DB::query("SELECT *,
IFNULL((select sum(amount) from booking_payment  where booking_id=b.id),0) AS total_payment, 
IFNULL((select SUM(DATEDIFF(check_out_date,check_in_date) * IFNULL(price_per_night,0)) from booked_rooms_v where booking_id=b.id),0) AS rooms_cost,
(SELECT property_name from booked_rooms_v where booking_id=b.id limit 1) AS property_name,
(SELECT COUNT(id) from booked_rooms_v where booking_id=b.id ) AS no_of_rooms,
IFNULL((select SUM(unit_price) from booked_extras_v where booking_id=b.id),0) AS extras_cost
FROM booking_tb b  where agent_id = %i order by property_name,booking_date desc", $agent_id);

$counter = DB::count();
if($counter==0){
    $html.=" <center><h3 >Agent has no bookings</h3></center>";
}
else{

$overall_cost=0;
$overall_payment=0;
$per_property='';
foreach ($bookings as $key=>$b) {


  
    $discount=$b['discount'];
    $extras_cost=$b['extras_cost'];
    $rooms_cost=$b['rooms_cost'];
    
    
    $total_kid_amount = 0;
    $kids_rates = json_decode($b['children_rates'],true);
    foreach($kids_rates as $k){
        $total_kid_amount += (float) $k['amount'];
    }
    
    $total_extra_bed = 0;
    $extra_beds = json_decode($b['extra_beds'],true);
    foreach($extra_beds as $x){
        $total_extra_bed += (float) $x['amount'];
    }
    
    $taxable_amount = $rooms_cost + $total_kid_amount + $total_extra_bed - $discount;
    $total_taxes=0;
    $taxes = json_decode($b['taxes'],true);
    foreach($taxes as $t){
        $total_taxes += ((float) $taxable_amount * (float) $t['taxamount'] /100);
    }
    $total_cost = round($rooms_cost + $total_kid_amount + $total_extra_bed + $extras_cost + $total_taxes - $discount);

    $total_payment=$b['total_payment'];
    $balance=$total_cost-$total_payment;
    $overall_cost += $total_cost ;
    $overall_payment +=$total_payment;


    
    if($per_property!=$b['property_name']){
        if($key !=0) 
            $html.="</tbody></table><br>";

        $per_property=$b['property_name'];
        $html.="<h5 style=\"font-size:14px; padding-bottom:4px;\" class=\"m-0 mb-5\"><b>Property:</b> {$b['property_name']}</h5>
        
        
        <table class=\"table-invoice\" id=\"table-inv\">
        <thead class=\"tablehead\">
        <tr>
        <th>Date</th>
        <th>Reservation No</th>
        <th>Reservation Name</th>
        <th>Arrival</th>
        <th>Departure</th>
        <th>Rooms</th>
        <th>Reservation Total</th>
        <th>Received to Date</th>
        <th class=\"text-right\">Balance</th>
        </tr>
        </thead>
        <tbody>";
    }

 
    $html.="<tr>
    <td>".date("d M Y", strtotime( $b['booking_date']))."</td>
  
    <td class=\"text-left\">{$b['booking_reference']} </td>
    <td class=\"text-left\">{$b['booking_name']} </td>
    <td class=\"text-left\">".date('d M Y', strtotime($b['check_in_date']))." </td>
    <td class=\"text-left\">".date('d M Y', strtotime($b['check_out_date']))." </td>
    <td class=\"text-left\">".$b['no_of_rooms']." </td>
    <td class=\"text-right\">".number_format($total_cost,1)."</td>
    <td class=\"text-center\">".number_format($total_payment,1)."</td>
    <td class=\"text-right\">".number_format($balance,1)."</td>

    </tr>";





}
$html.="</tbody></table>
<br>";


$html.=" <table>
<td width=\"50%\">.</td>
<td>
<table class=\"table no-border table-sm \" id=\"table-inv\">
<tbody>";





$outstanding=$overall_cost-$overall_payment;
$html.="<tr>
<td><b>Total Amount</b></td>
<td class=\"text-right\"><b>$".number_format($overall_cost,1)."</b></td>
</tr>
<tr>
<td>Total Paid:</td>
<td class=\"text-right\">$".number_format($overall_payment,1)."</td>
</tr>
<tr class=\"total-row\">
<td>Outstanding</td>
<td class=\"text-right\">$".number_format($outstanding,1)."</td>
</tr>

</tbody>

</table>

</td>
</table>


</div>
</div>";
}

$html.="<div class=\"hr\"></div>


<table>
<td width=\"50%\">
</td>
<td class=\"text-right\">
<br><br>
<p class=\"m-0\">Issued by:</p>
<h4 class=\"m-0\">".$_SESSION['login']["user_name"]."</h4>
</td>
</table>

</div>

</section>";
echo $html;


?>
