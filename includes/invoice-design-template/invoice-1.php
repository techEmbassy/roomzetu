<?php 

$html.="<section class=\"paper-size p-5 invoice\" id=\"c-table\">
<div id=\"divInv\" class=\"card-body p-0\">
<!-- Invoice Company Details -->
<div id=\"invoice-company-details\">
<div class=\"media-body \">";

$html.="<table>
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
<p class=\"m-0\">$company_phone | $company_email | $company_website </p>

</td>
</tr>
</table><br>

</div>

<div class=\"hr\"></div>
<br>
</div>
</div>
<div id=\"invoice-customer-details\" class=\"\">";


$html.="<table>
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
</div>";


?>