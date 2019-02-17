
<?php
     $html.="<section class=\" paper-size p-5 invoice\">
    <div class=\"container p-3\" style=\"border:1px solid #000;\">
        <div class=\"container\">
            <div class=\"row\">


                <div class=\"col-md-4\">
                    <div class=\"p-2 text-center col-12 col-md-7\" style=\"background-color:#000;font-size:16px;text-transform:uppercase;\">
                        <a style=\"color:#fff;font-size:20px;text-transform:uppercase;font-weight:800;\">". strtoupper($invoice_title)."</a>

                    </div>

                    <div  >
                        <br>
                        <small  style=\"font-size:12px; font-weight:900;\">Attn:</small>
                        <h6  style=\"font-size:25px; font-weight:600;\"> ". strip_tags($bill_address['name'])."</h6>
                        <p class=\"m-0\">
                             {$bill_address['address']} <br>
                             {$bill_address['phone']} <br>
                             {$bill_address['email']}

                        </p>

                        <p style=\"font-size:20px;font-weight:600;color:brown\"><span >Ref:</span> $booking_number<br>
                            <span class=\"p-0\" style=\"font-size:14px;font-weight:600;color:brown\">Booking Name: $booking_name</span><br>
                        </p>
                    </div>
                </div>


                <div class=\"col-md-4\">
                    <div class=\"text-center\">
                       
                        <img src='$company_logo' style=\"width:150px;\">

                        <p class=\"text-center\" style=\"font-size:30px;font-weight:700\">#$invoice_number</p>
                    </div>
                </div>

               





                <div class=\"col-md-4 text-right\">
                    <div class=\"text-center\" >";
                 
                    if(isset($main_company_logo) && $main_company_logo != ""){
                        $html.="<img height='90px' src='$main_company_logo' alt='' />";
                        }
                         
                        $html.="</div>

                    <div class=\"container\" >
                        <div class=\"row\">
                            <div class=\"col-md-4\">
                            </div>

                            <div class=\"col-md-12\">
                        
                                <h6 class=\"pt-4\" style=\"font-size:25px; font-weight:600;\">$company_name</h6>
                                <p class=\"m-0\">$company_address</p>
                            <p class=\"m-0\">$company_phone <br>
                            $company_email <br>
                            $company_website </p>

                            </div>

                        </div>


                    </div>
                </div>

            </div>


        </div>
    </div>";


?>