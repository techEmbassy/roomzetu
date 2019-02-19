<?php
   $html .="<section class=\" paper-size p-5 invoice\">
    <div class=\"container p-3\" style=\"background-color:#eee\">
        <div class=\"container\">
            <div class=\"row\">


                <div class=\"col-md-5\">
                    <div class=\"p-2 col-12 col-md-7\" >

                        <h6 class=\"pt-4\" style=\"font-size:15px; font-weight:600;\">$company_name</h6>
                        <p class=\"m-0\">$company_address</p>
                            <p class=\"m-0\">$company_phone <br>
                            $company_email <br>
                            $company_website </p>

                    </div>

                    <div  >
                        <br>
                        <small  style=\"font-size:12px; font-weight:900;\">INVOICE TO:</small>
                        <h6  style=\"font-size:19px; font-weight:600;\">". strip_tags($bill_address['name'])."</h6>
                        <p>{$bill_address['address']} <br>
                        {$bill_address['phone']} <br>
                        {$bill_address['email']}
                        </p>


                    </div>
                </div>


                <div class=\"col-md-2\">
                    <div class=\"text-center\">
                        

                        <img src='$company_logo' style=\"width:180px;\">


                    </div>
                </div>

                <div class=\"col-md-1\">
                </div>





                <div class=\"col-md-4\">
                    <div class=\"text-center\" >
                       
                    </div>

                    <div class=\"container\" >
                        <div class=\"row\">
                            <div class=\"col-md-4\">

                            </div>

                            <div class=\"col-md-12 text-center\">
                                <p class=\"text-center\" style=\"font-size:30px;font-weight:700\">". strtoupper($invoice_title)."</p>
                                <br>
                                <p style=\"font-size:20px;font-weight:600;color:brown\"><span >Ref:</span> $booking_number<br>
                                    <span class=\"p-0\" style=\"font-size:14px;font-weight:600;color:brown\">Booking Name: $booking_name</span><br>
                                </p>

                                <p class=\"text-center\" style=\"font-size:30px;font-weight:700\">#$invoice_number</p>

                            </div>

                        </div>


                    </div>
                </div>

            </div>


        </div>
    </div>";


?>