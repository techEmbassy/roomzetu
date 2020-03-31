<?php include 'includes/auth.php'?>

<?php if(($role==3)||$role==5){
     header("Location: rooms.php");
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>

    <?php include 'includes/styles.php'?>
</head>
<style>


</style>

<body class="gray">
    <?php $mpos=4; include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2">

                    <p><small>Manage seasons, rates, agent rates and kids rates</small> </p>
                    <hr />
                    <div class="sub-menu">
                        <?php $sbPos=2; include 'includes/rates-menu.php';?>


                    </div>
                    <div class="foot pt-4 pl-2 text-left ">
                        <a class="btn btn-sm btn-secondary" data-target="#new-px" data-toggle="modal"><i class="zmdi zmdi-plus"></i> New room price</a>
                    </div>

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">

                            <div class="row">
                                <div class="col-md-3">
                                    Room Price Rates
                                </div>

                                <div class="col-md-9 text-right">

                                    <input class="form-control tiny" placeholder="search" oninput="searchPrice(this)" />



                                    <select class="form-control tiny" id="properties" onchange="getStandardRoomPrices()">
                                        <?php echo $propertyOptions0; ?>

                                    </select>


                                    <a class="btn btn-secondary btn-35" href="" data-target="#new-px" data-toggle="modal"><i class="zmdi zmdi-plus"></i> New room price</a>



                                </div>
                            </div>
                        </div>
                        <div class="c-body p-2" style="background-color:#f9f9f9" id="price-container">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<div class="modal " id="new-px">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content animated zoomIn">
            <div class="modal-header">

                <h4 class="modal-title">New Room Price</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Price Label</label>
                        <input class="form-control" placeholder="e.g weekend special" name="label" required data-empty-message="Provide price name" style="text-transform: capitalize;" />
                        <input type="hidden" name="id" value="0" />
                        <input type="hidden" value="" name="position" />
                    </div>

                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="e.g weekend special" rows="4" name="desc"></textarea>
                    </div>

                    <div class="col-md-12 ">

                        <label>Period</label>
                        <div class="input-group">
                            <input class="datepicker form-control" id="start_date" required data-empty-message="select start date" data-placement="right" />

                            <span class="input-group-append" id="basic-addon2">
                                <span class="input-group-text px-2" style="background-color:#fafafa">to</span>
                            </span>

                            <input class="datepicker form-control" id="end_date" placeholder="" required data-empty-message="select end date" data-placement="right" />
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">


                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="createPriceRate()">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->





<?php include 'includes/footer.php';?>

<script>
    var PRICES = "";
    //fixTableHead(".table-primary");
    //new WOW.init();
    var d = [{
        id: "3",
        price_name: "Rack rates",
        description: "Standard Room Prices",
        date_created: "4 May 2017",
        prices: [{
            room_type_id: 2,
            room_type_name: "Delux",
            price: "300"
        }, {
            room_type_id: 3,
            room_type_name: "Domitory",
            price: "300"
        }]
    }, {
        id: "4",
        price_name: "Christmas Price",
        description: "Christmas Holiday Discounted price",
        date_created: "4 May 2017",
        prices: [{
            room_type_id: 2,
            room_type_name: "Delux",
            price: "300"
        }]
    }];

    //setRoomPrices(JSON.stringify(d));

    getStandardRoomPrices()

    function getStandardRoomPrices() {
        var pid = $("#properties").val();
        //alert(pid);

        $.post("src/get_data.php", {
            token: "standardprices",
            property_id: pid
        }, function(data) {
            console.log(data);
            setStandardRoomPrices(data);
        })
    }

    function setStandardRoomPrices(data) {

        var rows = "";

        var prices = JSON.parse(data);





        var pxrows = "<tr><th>Room Type</th><th>Amount ($)</th></tr>";

        rows += "<div class=\"card price-item mb-4 mt-4\">";
        rows += "<div class=\"row m-0\">";
        rows += "<div class=\"col-md-3\">";
        rows += "<div class=\"p-2\">";
        rows += "<h6><b class=\"price-rate-name\">Rack rates</b></h6>";
        rows += "<p style=\"font-size:12px;\">Standard Room Prices</p><small style=\"color:#888 font-size:9pt\"> <!--Valid: 12th APril - 23rd June 2018--></small><br><br>";


        /* rows +="<div class=\"btn-group\">";
             rows +="<button type=\"button\" class=\"btn btn-sm btn-outline-danger\">Delete</button>";
            rows +="<button type=\"button\" class=\"btn btn-sm btn-outline-success\">Edit</button>";
        rows +="</div>";*/





        rows += "</div>";
        rows += "</div>";
        rows += "<div class=\"col-md-9 text-right\"><button class=\"btn btn-secondary btn-sm my-2 ml-auto\" data-toggle=\"collapse\" data-target=\"#collapse-standard-px\" aria-expanded=\"false\" aria-controls=\"collapseExample\">Manage Prices <i class=\"fa fa-angle-down\"></i></button><br>";
        rows += "<div class=\" mt-0 mb-3\">";
        rows += "<div class=\"collapse\" id=\"collapse-standard-px\">";
        rows += "<div class=\"card card-body border-0\">";

        rows += "<table class=\"table table-bordered table-editable table-sm\" >";

        rows += "<thead>";
        rows += "<tr>";
        rows += "<th class=\"cellspan-2\">Roomtype Name</th>";
        rows += "<th colspan='3'>High Season</th>";
        rows += "<th colspan='3'>Low Season</th>";
        rows += "</tr>";
        rows += "<tr>";
        rows += "<th class=\"cellspan-2\"></th>";

        rows += "<th width='80px'>FB</th>";
        rows += "<th  width='80px'>HB</th>";
        rows += "<th  width='80px'>BB</th>";

        rows += "<th  width='80px'>FB</th>";
        rows += "<th  width='80px'>HB</th>";

        rows += "<th width='80px'>BB</th>";

        rows += "</tr>";
        rows += "</thead>";



        rows += "<tbody>";


        $.each(prices, function(i, p) {
            var amount = p.price_per_night == null ? "" : p.price_per_night;
            var amount_h_hb = p.amount_H_HB == null ? "" : p.amount_H_HB;
            var amount_h_bb = p.amount_H_BB == null ? "" : p.amount_H_BB;
            var amount_l_fb = p.amount_L_FB == null ? "" : p.amount_L_FB;
            var amount_l_hb = p.amount_L_HB == null ? "" : p.amount_L_HB;
            var amount_l_bb = p.amount_L_BB == null ? "" : p.amount_L_BB;
            var rpriceId = p.id == null ? "0" : p.id;

            rows += "<tr>";

            rows += "<td scope=\"row\"><b>" + p.name + "</b></td>";
            //rows += "<td>";

            // rows += "<table class=\"table table-bordered\">";

            //rows += "<tbody>";
            //rows += "<tr>";
            rows += "<td scope=\"row\"><input class=\"high_fb\" data-rt-id='" + rpriceId + "' value='" + amount + "' placeholder='add amount' onchange='updateStandardPrice(this)' type='number' min='0' /></td>";
            rows += "<td><input class=\"high_hb\" data-rt-id='" + rpriceId + "' value='" + amount_h_hb + "' placeholder='add amount' onchange='updateStandardPrice(this)' type='number' min='0' /></td>";
            rows += "<td><input class=\"high_bb\" data-rt-id='" + rpriceId + "' value='" + amount_h_bb + "' placeholder='add amount' onchange='updateStandardPrice(this)' type='number' min='0' /></td>";
            //            rows += "</tr>";
            //
            //
            //            rows += "</tbody>";
            //            rows += "</table>";
            //
            //
            //            rows += "</td>";
            //            rows += "<td>";

            //            rows += "<table class=\"table table-bordered\">";
            //
            //            rows += "<tbody>";
            //            rows += "<tr>";
            rows += "<td scope=\"row\"><input class=\"low_fb\" data-rt-id='" + rpriceId + "' value='" + amount_l_fb + "' placeholder='add amount' onchange='updateStandardPrice(this)' type='number' min='0' /></td>";
            rows += "<td><input class=\"low_hb\" data-rt-id='" + rpriceId + "' value='" + amount_l_hb + "' placeholder='add amount' onchange='updateStandardPrice(this)' type='number' min='0' /></td>";
            rows += "<td><input class=\"low_bb\" data-rt-id='" + rpriceId + "' value='" + amount_l_bb + "' placeholder='add amount' onchange='updateStandardPrice(this)' type='number' min='0' /></td>";
            rows += "</tr>";


            //          rows += "</tbody>"; // rows += "</table>"; // // // rows += "</td>"; // // rows += "</tr>";
        });




        rows += "</tbody>";

        rows += "</table>";



        rows += "</div>";
        rows += "</div>";
        rows += "</div>";
        rows += "</div>";
        rows += "</div>";
        rows += "</div>";



        $("#price-container").html(rows);
        getRoomPrices();



    }


    function getRoomPrices() {
        var pid = $("#properties").val();
        $.post("src/get_data.php", {
            token: "prices",
            property_id: pid
        }, function(data) {
            //            console.log(data);

            // alert(pid)
            PRICES = data;
            setRoomPrices(data);
        })
    }

    function setRoomPrices(data) {

        var rows = "";


        var prices = JSON.parse(data);



        $.each(prices, function(i, price) {
            var pxrows = "<tr><th>Room Type</th><th>Amount ($)</th></tr>";

            rows += "<div class=\"card price-item mb-4 mt-4\">";
            rows += "<div class=\"row m-0\">";
            rows += "<div class=\"col-md-3\">";
            rows += "<div class=\"p-2\">";
            rows += "<h6><b class=\"price-rate-name\">" + price.price_name + "</b></h6>";
            rows += "<p style=\"font-size:12px;\">" + price.description + "</p><small style=\"color:#888 font-size:9pt\"> Period : " + formatDate(new Date(price.start_date)) + " to " + formatDate(new Date(price.end_date)) + "</small><br><br>";


            rows += "<div class=\"btn-group\">";
            rows += "<button type=\"button\" class=\"btn btn-sm btn-outline-danger\" onclick='deletePrice(" + i + ")'>Delete</button>";
            rows += "<button type=\"button\" class=\"btn btn-sm btn-outline-success\" onclick='showDetails(" + i + ")'>Edit</button>";
            rows += "</div>";



            rows += "</div>";
            rows += "</div>";
            rows += "<div class=\"col-md-9 text-right\"><button class=\"btn btn-secondary btn-sm my-2 ml-auto\" data-toggle=\"collapse\" data-target=\"#collapse-px-" + i + "\" aria-expanded=\"false\" aria-controls=\"collapseExample\">Manage Prices <i class=\"fa fa-angle-down\"></i></button><br>";



            rows += "<div class=\" mt-0 mb-3\">";
            rows += "<div class=\"collapse\" id=\"collapse-px-" + i + "\">";
            rows += "<div class=\"card card-body border-0\">";

            rows += "<table class=\"table table-bordered table-editable table-sm\">";

            rows += "<thead>";
            rows += "<tr>";
            rows += "<th class=\"cellspan-2\">Roomtype Name</th>";
            rows += "<th colspan='3'>High Season</th>";
            rows += "<th colspan='3'>Low Season</th>";
            rows += "</tr>";
            rows += "<tr>";
            rows += "<th class=\"cellspan-2\"></th>";

            rows += "<th width='80px'>FB</th>";
            rows += "<th  width='80px'>HB</th>";
            rows += "<th  width='80px'>BB</th>";

            rows += "<th  width='80px'>FB</th>";
            rows += "<th  width='80px'>HB</th>";

            rows += "<th width='80px'>BB</th>";


            rows += "</tr>";
            rows += "</thead>";



            rows += "<tbody>";


            $.each(price.prices, function(i, p) {
                var amount = p.amount == null ? "" : p.amount;
                var amount_h_hb = p.amount_H_HB == null ? "" : p.amount_H_HB;
                var amount_h_bb = p.amount_H_BB == null ? "" : p.amount_H_BB;
                var amount_l_fb = p.amount_L_FB == null ? "" : p.amount_L_FB;
                var amount_l_hb = p.amount_L_HB == null ? "" : p.amount_L_HB;
                var amount_l_bb = p.amount_L_BB == null ? "" : p.amount_L_BB;
                var priceId = p.price_id == null ? "0" : p.price_id;

                rows += "<tr>";

                rows += "<td scope=\"row\"><b>" + p.room_type_name + "</b></td>";
                //rows += "<td>";

                //                rows += "<table class=\"table table-bordered\">";
                //
                //                rows += "<tbody>";
                //                rows += "<tr>";
                rows += "<td scope=\"row\"><input class=\"high_fb\" data-p-id='" + priceId + "' data-pr-id='" + p.price_rate_id + "' data-rt-id='" + p.room_type_id + "' value='" + amount + "' placeholder='add amount' onchange='updatePrice(this)' type='number' min='0' /></td>";
                rows += "<td><input class=\"high_hb\" data-p-id='" + priceId + "' data-pr-id='" + p.price_rate_id + "' data-rt-id='" + p.room_type_id + "' value='" + amount_h_hb + "' placeholder='add amount' onchange='updatePrice(this)' type='number' min='0' /></td>";
                rows += "<td><input class=\"high_bb\" data-p-id='" + priceId + "' data-pr-id='" + p.price_rate_id + "' data-rt-id='" + p.room_type_id + "' value='" + amount_h_bb + "' placeholder='add amount' onchange='updatePrice(this)' type='number' min='0' /></td>";

                rows += "<td scope=\"row\"><input class=\"low_fb\" data-p-id='" + priceId + "' data-pr-id='" + p.price_rate_id + "' data-rt-id='" + p.room_type_id + "' value='" + amount_l_fb + "' placeholder='add amount' onchange='updatePrice(this)' type='number' min='0' /></th>";
                rows += "<td><input class=\"low_hb\" data-p-id='" + priceId + "' data-pr-id='" + p.price_rate_id + "' data-rt-id='" + p.room_type_id + "' value='" + amount_l_hb + "' placeholder='add amount' onchange='updatePrice(this)' type='number' min='0'  /></td>";
                rows += "<td><input class=\"low_bb\" data-p-id='" + priceId + "' data-pr-id='" + p.price_rate_id + "' data-rt-id='" + p.room_type_id + "' value='" + amount_l_bb + "' placeholder='add amount' onchange='updatePrice(this)' type='number' min='0' /></td>";
                rows += "</tr>";



                rows += "</tr>";

            });



            rows += "</tbody>";

            rows += "</table>";



            rows += "</div>";
            rows += "</div>";
            rows += "</div>";
            rows += "</div>";
            rows += "</div>";
            rows += "</div>";

        });


        /* $.each(prices, function(i, price) {
            var pxrows = "<tr><th>Room Type</th><th>Amount ($)</th></tr>";

            rows += "<div class=\"card bg-dark price-item mb-4 mt-4\">";
            rows += "<div class=\"row m-0\">";
            rows += "<div class=\"col-md-5\">";
            rows += "<div class=\"p-2\">";
            rows += "<h6><b class='price-rate-name'>" + price.price_name + "</b></h6>";
            rows += "<p>" + price.description + "</p>";
            rows += "<small style='color:#888; font-size:9pt'>Period : " + price.start_date + " to " + price.end_date + "</small><br><br>";

            rows += "<button class=\"btn btn-circle fa fa-times\" onclick='deletePrice(" + i + ")'></button>";
            rows += "<button class=\"btn btn-circle ml-2 zmdi zmdi-edit\"  onclick='showDetails(" + i + ")'></button>";
            rows += "</div>";
            rows += "</div>";
            rows += "<div class=\"col-md-7 \">";
            rows += "<div class=\"text-right\">";
            rows += "<button class=\"btn btn-secondary btn-sm my-2 ml-auto\" data-toggle=\"collapse\" data-target=\"#collapse-px-" + i + "\" aria-expanded=\"false\" aria-controls=\"collapseExample\">Manage Prices <i class='fa fa-angle-down'></i></button></div>";
            rows += "<div class=\"\">";
            rows += "<div class=\"collapse\" id=\"collapse-px-" + i + "\">";
            rows += "<div class=\"card card-body\">";
            rows += "<table class=\"table table-prices table-bordered\">";

            $.each(price.prices, function(i, p) {
                var amount = p.amount == null ? "" : p.amount;
                var priceId = p.price_id == null ? "0" : p.price_id;

                pxrows += "<tr><td><b class='text-disabled'>" + p.room_type_name + "</b></td><td><input data-p-id='" + priceId + "' data-pr-id='" + p.price_rate_id + "' data-rt-id='" + p.room_type_id + "' value='" + amount + "' placeholder='add amount' onchange='updatePrice(this)' type='number' min='0'/></td></tr>";

                //                pxrows += "<tr><td>" + p.room_type_name + "</td><td><div class='input-group'> <span class='input-group-addon' >$</span><input value='" + p.amount + "'/></div></td></tr>";

            });
            rows += pxrows;
            rows += "</table></div></div></div></div></div></div>";
        });
       */

        $("#price-container").append(rows);



    }

    function deletePrice(position) {
        var name = "",
            id = "";
        var p = JSON.parse(PRICES)[position];
        id = p.id;
        name = p.price_name;


        alertify.confirm("Delete " + name + "?", name + " will be deleted!",
            function() {
                $.post("src/delete.php", {
                    token: "price_rates_tb",
                    data: id,
                    reference: "id"

                }, function(response) {
                    //getRoomPrices();
                    getStandardRoomPrices();
                });


            },
            function() {

            }).set('labels', {
            ok: 'DELETE',
            cancel: 'CANCEL'
        });

    }

    function showDetails(position) {
        var name = "",
            id = "",
            desc = "";
        var p = JSON.parse(PRICES)[position];
        id = p.id;
        name = p.price_name;
        desc = p.description;
        start_date = p.start_date;
        end_date = p.end_date;

        end_date_ = end_date.split("-");

        end_date = end_date_[1] + "/" + end_date_[2] + "/" + end_date_[0];

        start_date_ = start_date.split("-");

        start_date = start_date_[1] + "/" + start_date_[2] + "/" + start_date_[0];

        $("#new-px [name=label]").val(name)
        $("#new-px [name=desc]").val(desc);
        $("#new-px [name=id]").val(id);
        $("#new-px [name=position]").val(position);

        $("#start_date").val(start_date);
        $("#end_date").val(end_date);



        $("#new-px").modal('show');

    }

    function createPriceRate() {
        var pid = $("#properties").val();
        if (!(inputsEmpty("#new-px"))) {
            var name = $("#new-px [name=label]").val()
            var desc = $("#new-px [name=desc]").val();
            var id = $("#new-px [name=id]").val();
            var pos = $("#new-px [name=position]").val();

            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            end_date_ = end_date.split("/");
            end_date = end_date_[2] + "-" + end_date_[0] + "-" + end_date_[1];


            start_date_ = start_date.split("/");

            start_date = start_date_[2] + "-" + start_date_[0] + "-" + start_date_[1];



            var pr = JSON.stringify({
                price_name: name,
                description: desc
            });

            var period = JSON.stringify({
                start_date: start_date,
                end_date: end_date
            });

            //alert(JSON.stringify(period));

            $.post("src/xhr.php", {
                action: "price rate",
                price_rate: pr,
                period: period,
                id: id,
                property_id: pid
            }, function(data) {

                //alert(data)

                $("#new-px").modal("hide");
                location.reload();
            })
        }
    }



    function updateStandardPrice(t) {
        var input = $(t),
            amount_ = input.val(),

            rtId = input.attr("data-rt-id");
        var amount = {};

        switch (input.attr("class")) {

            case "high_fb":
                amount = JSON.stringify({
                    price_per_night: amount_
                });
                break;
            case "high_hb":
                amount = JSON.stringify({
                    amount_H_HB: amount_
                });
                break;
            case "high_bb":
                amount = JSON.stringify({
                    amount_H_BB: amount_
                });
                break;
            case "low_fb":
                amount = JSON.stringify({
                    amount_L_FB: amount_
                });
                break;
            case "low_hb":
                amount = JSON.stringify({
                    amount_L_HB: amount_
                });
                break;
            case "low_bb":
                amount = JSON.stringify({
                    amount_L_BB: amount_
                });
                break;

        }

        update_standard_price(amount_, amount, rtId);


    }


    function update_standard_price(amount_, amount, rtId) {

        if (!(amount_.isNaN || amount_ == "")) {
            $.post("src/xhr.php", {
                action: "update standard prices",
                amount: amount,

                room_type_id: rtId,

            }, function(data) {
                //alert(data);
                alertify.success("<i class='zmdi zmdi-check-circle'></i> price updated");
                //getRoomPrices();
                //getStandardRoomPrices();

            });
        }

    }



    function updatePrice(t) {

        var input = $(t),
            amount_ = input.val(),
            rtId = input.attr("data-rt-id"),
            prId = input.attr("data-pr-id"),
            pId = input.attr("data-p-id");

        var amount = {};

        // alert(input.attr("class"));

        switch (input.attr("class")) {

            case "high_fb":
                amount = JSON.stringify({
                    amount: amount_
                });
                break;
            case "high_hb":
                amount = JSON.stringify({
                    amount_H_HB: amount_
                });
                break;
            case "high_bb":
                amount = JSON.stringify({
                    amount_H_BB: amount_
                });
                break;
            case "low_fb":
                amount = JSON.stringify({
                    amount_L_FB: amount_
                });
                break;
            case "low_hb":
                amount = JSON.stringify({
                    amount_L_HB: amount_
                });
                break;
            case "low_bb":
                amount = JSON.stringify({
                    amount_L_BB: amount_
                });
                break;

        }
        //alert(JSON.stringify(amount));

        update_custom_price(amount_, amount, pId, rtId, prId);



    }


    function update_custom_price(amount_, amount, pId, rtId, prId) {

        var property_id = $("#properties").val();

        if (!(amount_.isNaN || amount_ == "")) {
            $.post("src/xhr.php", {
                action: "update prices",
                amount: amount,
                price_id: pId,
                room_type_id: rtId,
                price_rate_id: prId,
                property_id: property_id
            }, function(data) {
                //alert(data);
                alertify.success("<i class='zmdi zmdi-check-circle'></i> price updated");
                //getRoomPrices();
                //getStandardRoomPrices();

            });
        }

    }



    function searchPrice(input) {
        var query = $(input).val().toLowerCase();
        if (query == "") {
            $(".card.price-item").fadeIn();
        } else {
            $(".card.price-item").each(function(i, pi) {
                var name = $(pi).find('.price-rate-name').text();

                if (name.toLowerCase().indexOf(query) < 0) {
                    //                $(pi).css("display","none");
                    $(pi).fadeOut(100);
                } else {
                    $(pi).fadeIn(100);

                    //                    $(pi).css("display","block");

                }


            })

        }
    }


    function formatDate(date) {

        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + " " + monthNames[monthIndex] + " " + year;

    }

</script>
