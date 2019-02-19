<?php 
    $html.="<section class=\" paper-size p-5 invoice\" >
        <div class=\"container\"  style=\"background-color:#eee\">
            <div class=\"row\">


                <div class=\"col-md-4 p-2\">
                    <div  >

                        <h6 class=\"pt-4\" style=\"font-size:15px; font-weight:600;\">$company_name</h6>
                        <p class=\"m-0\">$company_address</p>
                        <p class=\"m-0\">$company_phone <br>
                        $company_email <br>
                        $company_website </p>

                    </div>

                    <div>
                        <br>
                        <small  style=\"font-size:12px; font-weight:900;\">INVOICE TO:</small>
                        <h6  style=\"font-size:19px; font-weight:600;\">". strip_tags($bill_address['name'])."</h6>
                        
                            <p class=\"m-0\">
                             {$bill_address['address']} <br>
                             {$bill_address['phone']} <br>
                             {$bill_address['email']}

                        </p>
                        


                    </div>
                </div>


                <div class=\"col-md-4 p-2 text-center\">
                    <div class=\"text-center\">
                        
                        <img alt=\"\" src='$company_logo' style=\"width:150px;\">
                            <br>
                        <p class=\"text-center\" style=\"font-size:20px;font-weight:700\">". strtoupper($invoice_title)."</p>
                       
                    </div>
                </div>

                





                <div class=\"col-md-4 p-2\">
                    <div class=\" text-right\" >";
                        
                    if(isset($main_company_logo) && $main_company_logo != ""){
                        $html.="<img widith='130px' src='$main_company_logo' alt='' />";
                        }
                         
                        $html.="
                    </div>

                    <div class=\"container\" >
                        <div class=\"row\">
                            

                            <div class=\"col-md-12 text-right\">
                                
                                <br>
                                <p style=\"font-size:20px;font-weight:600;color:brown\">
                                <span >Invoice No: #</span>$invoice_number<br>
                                    <span class=\"p-0\" style=\"font-size:14px;font-weight:600;color:brown\">Booking Name: $booking_name</span><br>
                                </p>

                                <p style=\"font-size:20px;font-weight:700\">Booking No: $booking_number</p>

                            </div>

                        </div>


                    </div>
                </div>

            </div>


        </div>
    </div>";


?>