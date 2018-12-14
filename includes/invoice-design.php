
    <style>
        @page {
            margin: 1.2cm;
        }

        

        body {
            font-family: "DejaVu Sans", "Helvetica", "Helvetica-Neue", "Ubuntu", font, sans-serif;
        }

        table {
            width: 100%;
            margin-bottom: 5px;
            border-spacing: 0 !important
        }

        .invoice-label {
            background: #1c5690;
            padding: 10px;
            color: #fff;
            font-weight: 900;
            text-align: center;
            text-transform: uppercase;
            font-size: 14pt;

        }

        .invoice-number {

            text-align: center;
            color: #666;
            font-size: 20pt;
            margin: 10px;
        }

        /*
        .bg-gray {
            background: #f6f6f6;
        }
*/

        .paper-size {}


        table.no-borders td {
            border: none;
            padding-left: 0 !important;
        }

        .border-bottom {
            border-bottom: 1px solid #bbb;
        }

        .m-0 {
            margin: 0 !important;
        }

        p {
            font-size: 10pt;
            color: #444;
            /*            line-height: 25px;*/
        }

        .tablehead th {
            background: #aaa;
            color: #fff;
            padding: 7px 5px;
            font-weight: 400;
            text-transform: uppercase;
            font-size: 7pt;
            text-align: left;
        }

        .text-right {
            text-align: right !important;
        }

        table td {
            vertical-align: top !important;
        }

        table td,
        table th {
            border-spacing: 0 !important;

            /*            cell-spacing:0;*/
        }

        .table-invoice td {
            padding: 5px 10px;
            font-size: 9pt;
            color: #222;
            background: #f9f9f9;
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
            /*            color: #347fca;*/
        }

        .text-muted {
            color: #888;
        }
        
        .text-justify{
            text-align: justify !important;
        }

    </style>
</head>

<body>

    <section class="paper-size m-auto p-5" id="c-table">
        <div id="divInv" class="card-body p-0">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details">
                <div class="media-body ">
                    <table>
                        <tr>
                            <td><?php echo "Godt"; ?>
                                <img src="../img/logo.png" height="50px" id="comp_logo" alt="company logo">

                                <table id="c-details">

                                    <td width="350px">
                                        <h3 class="m-0">Wildplaces Africa</h3>
                                        <p class="m-0">3rd street kira road, some building </p>
                                        <p class="m-0"><b>T:</b> 02993992 | <b>E:</b> info@swamphotel.com | <b>W:</b> swamphotel.com </p>
                                    </td>


                                </table>


                            </td>
                            <td>
                                <div class="invoice-label">Invoice</div>
                                <p class="invoice-number">#<span id="t-receipt">000</span></p>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="hr"></div>

            </div>
        </div>

        <div id="invoice-customer-details" class="">

            <p class="text-muted my-4 ">Bill To:</p>
            <table>
                <tr>
                    <td class="border-bottom">
                        <h5 class="m-0"><b>Go Explore Safaris</b>
                        </h5>
                    </td>
                    <td class="border-bottom" width="150px">
                        <b>Issue Date:</b>
                    </td>

                    <td class="border-bottom" width="100px">
                        22/08/2018
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="p-details" class="m-0">
                            <b>Booking Name:</b> Big Mike
                        </p>
                    </td>
                    <td width="150px">
                        <b>Due date :</b>
                    </td>

                    <td width="100px" id="due-date">
                        30/08/2018
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="m-0" id="p-address">
                            3rd Street, some road Uganda<br> 09389939
                            <br> ww@gmail.com
                        </p>
                    </td>
                    <td width="100px" class="border-0 py-0"><b>Currency :</b></td>
                    <td class="border-0 py-0"><span id="currency">USD</span></td>
                </tr>
            </table>

        </div>

        <br>
        <div id="invoice-items-details" class="pt-2">
            <div class="row">
                <div class=" col-sm-12">



                    <h5 style="font-size:15px;" class="m-0"><b>Accommodation/Rooms</b></h5>
                    <table class="table-invoice" id="table-inv">
                        <thead class="tablehead">
                            <tr>
                                <th>Property</th>
                                <th>Room Type</th>

                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Nights</th>
                                <th>Units</th>

                                <th>Meals</th>
                                <th>Room/Night</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!--                                                <td></td>-->
                                <td>Main property</td>
                                <td>Double Standard</td>
                                <td>02/04/2018</td>
                                <td>04/04/2018</td>
                                <td>3</td>
                                <td>1</td>

                                <td>FB</td>
                                <td>50</td>
                                <td class="text-right">150</td>

                            </tr>
                            <tr>
                                <!--                                                <td></td>-->
                                <td>Main property</td>
                                <td>Double Standard</td>
                                <td>02/04/2018</td>
                                <td>04/04/2018</td>
                                <td>3</td>
                                <td>1</td>

                                <td>FB</td>
                                <td>50</td>
                                <td class="text-right">150</td>

                            </tr>
                            <tr>
                                <!--                                                <td></td>-->
                                <td>Main property</td>
                                <td>Double Standard</td>
                                <td>02/04/2018</td>
                                <td>04/04/2018</td>
                                <td>3</td>
                                <td>1</td>

                                <td>FB</td>
                                <td>50</td>
                                <td class="text-right">150</td>

                            </tr>


                        </tbody>

                    </table>
                    <br>


                    <h5 style="font-size:15px;" class="m-0"><b>Extra Services</b></h5>
                    <table class="table-invoice" id="table-inv">
                        <thead class="tablehead">
                            <tr>
                                <th>Service</th>

                                <th>Guests</th>
                                <th>Rate/Person</th>
                                <th class='text-right'>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>Massage</td>
                                <td>1</td>
                                <td>20</td>

                                <td class="text-right">20</td>
                            </tr>


                        </tbody>
                    </table>




                    <table>
                        <td width="50%">.</td>
                        <td>
                            <table class="table no-border table-sm " id="table-inv">
                                <tbody>

                                    <tr>


                                        <td>Sub Total</td>
                                        <td class="text-right">$8900</td>
                                    </tr>
                                    <tr>


                                        <td>VAT(18%)</td>
                                        <td class="text-right">$300</td>
                                    </tr>

                                    <tr>


                                        <td><b>Total Amount</b></td>
                                        <td class="text-right"><b>$12900</b></td>
                                    </tr>



                                    <tr>


                                        <td>Paid:</td>
                                        <td class="text-right">$12900</td>
                                    </tr>
                                    <tr class="total-row">
                                        <td>Outstanding</td>
                                        <td class="text-right">$12900</td>
                                    </tr>

                                </tbody>

                            </table>

                        </td>
                    </table>


                </div>
            </div>

            <div class="hr"></div>
            <br>

            <table>
                <td width="50%">
                    <div class=" p-3">
                        <p class="lead">Payment Details:</p>
                        <table class="table-sm">
                            <tr>
                                <td><b>Bank name:</b></td>
                                <td>ABC Bank, USA</td>
                            </tr>
                            <tr>
                                <td><b>Account name:</b></td>
                                <td>Gorilla Safari Experts</td>
                            </tr>
                            <tr>
                                <td><b>Account Number:</b></td>
                                <td>9308280020</td>
                            </tr>
                        </table>

                    </div>
                </td>
                <td class="text-right">
                    <p class="m-0">Authorized by:</p>
                    <h4 class="m-0">Jane Doe</h4>
                </td>
            </table>

        </div><br/>

        <div class="hr"></div>


        <div class="text-justify">
            <br>
            <br>
            <h4><b>Terms &amp; Notes</b></h4>
            <p id="t-notes"></p>
            <p  >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales diam sed justo sollicitudin tincidunt sed pellentesque sapien. Nam sed ultrices felis, nec sagittis turpis. Suspendisse nec orci neque. Nam maximus justo id mi porttitor, ac porta quam fringilla. Nam et venenatis neque, vel eleifend sapien. Donec in ultricies tellus. Phasellus vel nulla erat. Curabitur sit amet faucibus ipsum, in dignissim nunc. Phasellus dignissim, magna in pulvinar accumsan, ex eros luctus quam, ut viverra lectus purus et risus. Aliquam nisl augue, varius at ornare nec, ullamcorper sed tortor. Quisque eu augue sed dolor rutrum rhoncus. Integer commodo, purus eu ullamcorper pulvinar, dui sem eleifend risus, nec hendrerit ante neque sit amet arcu. Nulla vel maximus justo, commodo consequat urna.</p>
            <p>Proin ut diam ac dui pellentesque luctus. Aliquam non turpis lacinia, dapibus felis vitae, ultrices arcu. Phasellus maximus massa sed metus varius viverra. Curabitur odio massa, faucibus at dictum quis, mollis sed tortor. Suspendisse potenti. Nullam lacinia auctor magna, at dignissim neque vulputate eu. Aenean id nisi nec sapien maximus porttitor a ut purus. Etiam et elit id magna hendrerit malesuada.</p>
            <p>Phasellus hendrerit a mi vitae pellentesque. Maecenas fermentum gravida rhoncus. Nullam purus ante, bibendum id neque pharetra, egestas venenatis ex. Phasellus ligula metus, pretium vel ultrices id, feugiat ac mi. Morbi lorem diam, iaculis a ipsum sit amet, venenatis maximus nulla. Nam blandit imperdiet elementum. Quisque vulputate sapien massa. Nam sollicitudin metus eget purus pulvinar venenatis. Aliquam gravida metus non vehicula efficitur. Integer ac facilisis ante. Etiam vestibulum lobortis felis at finibus. Proin in lectus nibh. Sed lorem felis, dapibus vel est et, aliquet vehicula neque. Sed sed orci eu dolor cursus pharetra. Suspendisse pulvinar dictum sodales. Nullam lectus enim, mollis non neque quis, malesuada vulputate justo.</p>
            <p>Vivamus at dui consectetur, rutrum metus nec, gravida quam. Vestibulum et lorem a est posuere posuere vel ut leo. Sed congue tincidunt elit non vestibulum. Nam id ullamcorper magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In nisl turpis, luctus pulvinar luctus eget, imperdiet semper magna. Maecenas rutrum vehicula enim, nec sodales lorem rutrum ullamcorper. Phasellus vestibulum risus vel mauris gravida, eu faucibus nibh mattis. Mauris rutrum dui libero, a euismod dui aliquet consequat. Phasellus accumsan tortor nisi, nec placerat odio porta ac. Aliquam posuere lectus eget nisi interdum, id vehicula sapien scelerisque. Mauris euismod elementum est, posuere dictum libero pharetra non. Integer vel nibh sem. Vivamus sem diam, condimentum eget eros et, congue fringilla metus. Aenean et tellus quis purus maximus elementum.</p>
        </div>
    </section>
</body>

</html>
