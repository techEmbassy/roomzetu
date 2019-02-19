<?php
  
  $html.="<section class=\" paper-size p-5 invoice\">
        <div class=\"container\" style=\"background-color:#eee\">

            <table class=\"table\">
                <tbody class=\"\">
                    <tr>
                        <td class=\"text-center  pt-3\">
                            <img alt=\"\" src='$company_logo' style=\"width:170px;\">
                        </td>

                        <td class=\"pl-5 pt-0\" style=\"border-top:0px; border-left:1px solid #dee2e6;line-height:22pt;\">
                            <h6 class=\"pt-4\" style=\"font-size:23px; font-weight:600;\">$company_name</h6>
                            <p class=\"m-0\">$company_address</p>
                            <p class=\"m-0\">$company_phone <br>
                            $company_email <br>
                            $company_website </p>
                        </td>


                    </tr>
                    <tr>


                        <td style=\"border-top:0px;  solid #dee2e6;line-height:22pt;\">
                            <p class=\"text-center\" style=\"font-size:20px;font-weight:700\">". strtoupper($invoice_title)."</p>

                            <p class=\"text-center\" style=\"font-size:20px;font-weight:600;color:brown\"><span style=\"\">Invoice No: #</span> $invoice_number<br>
                                <span class=\"p-0\" style=\"font-size:14px;font-weight:600;color:brown\">Booking Name: $booking_name</span><br>
                            </p>

                            <p class=\"text-center\" style=\"font-size:20px;font-weight:700\">Booking No: $booking_number</p>
                        </td>
                        <td class=\"pl-5 pt-0\" style=\" border-top:0px !important; border-left:1px; solid #dee2e6;line-height:22pt;\">


                            <br>
                            <small class=\"\" style=\" font-size:15px; font-weight:900;\">INVOICE TO:</small>
                            <h6 class=\"\" style=\"font-size:24px; font-weight:600;\">". strip_tags($bill_address['name'])."</h6>
                            <p class=\"m-0\">
                             {$bill_address['address']} <br>
                             {$bill_address['phone']} <br>
                             {$bill_address['email']}

                        </p>



                        </td>
                    </tr>

                </tbody>


            </table>

            <hr>


        </div>";
        ?>
    


