<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Locality & Currency
            </div>

        </div>
    </div>
    <div class="c-body p-0 mt-0">

        <div class="container-fluid">
            <div>
                <br>
                <p class="mb-2 text-disabled">Timezones <span id="time-zone-pagination" class="pull-right"></span></p>
                <!--
             <h4>Africa/Kampala (GMT+3)</h4>
             <h4>5:00 am <small></small></h4>
             
             <label></label>
-->

                <table class="table table-bordered" id="tb-timezones">
                    <thead>
                        <tr>
                            <th>Property</th>
                            <th>Timezone</th>
                            <th>current time</th>
                            <th style="width:100px"></th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


                <br>
                <p class="mb-2 text-disabled">Currency <span id="currency-pagination" class="pull-right"></span></p>


                <table class="table table-bordered" id="tb-currencies">
                    <thead>
                        <tr>
                            <!--                  <th>Property</th>-->
                            <th>Currency</th>
                            <th>Symbol</th>
                            <th>ISO</th>
                            <th>Rate</th>
                            <th style="width:100px"></th>
                            <!--                  <th>Property</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!--    
                            <td><i class="fa fa-check-circle text-green"></i> US Dollars - <small>(primary currency)</small></td>
                            <td>$</td>
                            <td>USD</td>
                            <td>1</td>
                            <td></td>
                        </tr>

                        <tr>
                                                 
                            <td> <i class="fa fa-circle text-gray"></i> Uganda Shillings</td>
                            <td>UGX</td>
                            <td>/=</td>
                            <td>3600</td>
                            <td><a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new-currency"><i class="fa fa-pencil"></i> change currency</a></td>
                        </tr>-->
                    </tbody>
                </table>
                <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#new-currency"><i class="fa fa-plus"></i> add currency</a>

            </div>
        </div>
    </div>
    <div class="c-footer pl-4 text-right">
        <?php echo $timeLeftFooter; ?>
    </div>


</div>

<?php include 'modals/change-timezone.php' ?>
<?php include 'modals/change-currency.php' ?>
<?php include 'modals/new-currency.php' ?>

<script>
    var timezones = null;

    var currencies_data = null;
    $(function() {
        getCurrencies();
        getTimeZones();
        getCompanyProperty();
    });




    function getTimeZones() {


        $.ajax({
            type: "POST",
            url: "data/static_set.php",
            data: {
                token: "get_time_zones"
            },
            success: function(data) {

                $('#c-timezone').html('<option value="">Select Timezone</option>' + data);
                //console.log(items);
            }
        });

    }


    function getCompanyProperty() {

        $.get("src/get.php", {
            "table": "property_tb_v",
            "col_name": "company_id",
            token: "property_timezones"
        }, function(data) {

            setTimeZones(data);

        });

    }

    function getCurrencies() {
        //alert(1);

        $.get("src/get.php", {
            token: "get_currencies"
        }, function(data) {
            //alert(data);               
            setCurrency(data);
            // data = JSON.parse(response);
            // alert(data.company_name)
        });

    }

    function save_currency() {

        $('#new-currency').modal('hide')

        var name = $('#c-name').val()
        var symbol = $('#c-symbol').val()
        var iso = $('#c-iso').val()
        var rate = $('#c-rate').val()

        var data = {
            "currency": name,
            "symbol": symbol,
            "iso": iso,
            "rate": rate
        }

        $.post("src/save.php", {
            page: "locality-currency",
            result: JSON.stringify(data)
        }, function(response) {
            alertify
                .alert("New Currency Created","Currency " + name + " Saved", function() {
                    // alertify.message('OK');
                    window.location.reload();
                });


        })
    }


    function setTimeZones(data) {
        timezones = JSON.parse(data);
        var rows = [];

        $.each(timezones, function(i, timezone) {

            var row = "<tr>";
            row += "<td>" + timezone.property_name + "</td>";
            row += "<td>" + timezone.time_zone + "</td>";
            row += "<td>" + timezone.timenow + "</td>";
            row += '<td><a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new-timezone" onclick="editTimeZone(\'' + i + '\')"><i class="fa fa-pencil"></i> change time zone</a></td>';
            row += "</tr>";

            rows.push(row)
        });


        var tableBody = $("#tb-timezones tbody");

        pag(rows, tableBody, '#time-zone-pagination', 5);
    }


    function editTimeZone(index) {

        //alert(index);
        $("#property_id_tz").val(timezones[index]['id']);
        $("#property_tz").html(timezones[index]['property_name']);

    }



    function setCurrency(data) {

        currencies = JSON.parse(data);
        var rows = [];

        try {
            $.each(currencies, function(i, currency) {
                var currCell;
                if (currency.primary == "yes") {
                    currCell = '<i class="fa fa-check-circle text-green"></i> ' + currency.currency + ' <small>(primary currency)</small>';
                } else {
                    currCell = currency.currency;
                }
                var row = "<tr>";
                row += "<td>" + currCell + "</td>";
                row += "<td>" + currency.symbol + "</td>";
                row += "<td>" + currency.iso + "</td>";
                row += "<td>" + currency.rate + "</td>";

                var hide = "";
                if (currency.iso == 'USD') {
                    hide = 'hide';

                }
                row += '<td><a class="btn btn-sm btn-secondary ' + hide + '" onclick="setCurrencyForEdit(\'' + i + '\')"><i class="fa fa-pencil"></i> Change Currency</a></td>';
                row += "</tr>";

                rows.push(row)
            });

            var tableBody = $("#tb-currencies tbody");
            pag(rows, tableBody, '#currency-pagination', 5);

        } catch (e) {

            console.log(e)
        }


    }



    function setCurrencyForEdit(index) {

        //alert(currencies);

        var currency = currencies[index];
        var m = $('#change-currency');

        var currency_id = currency.id;

        ///alert(currency.rate);

        m.find("#c-name-e").val(currency.currency);
        m.find("#c-symbol-e").val(currency.symbol);
        m.find("#c-iso-e").val(currency.iso);
        m.find("#c-rate-e").val(currency.rate);

        /** 
        m.find("#p-address").val(branch.address);
        m.find("#p-manager").val(branch.manager_id); **/

        m.find('.modal-title').html("<i class='fa fa-pencil'></i> Edit Currency");
        m.find('.savebtn').attr('onClick', 'update_currency(' + currency_id + ')');
        m.modal("show")

    }

    function update_currency(id) {
        $('#change-currency').modal('hide')

        var name = $('#c-name-e').val()
        var symbol = $('#c-symbol-e').val()
        var iso = $('#c-iso-e').val()
        var rate = $('#c-rate-e').val()

        var data = {
            "currency": name,
            "symbol": symbol,
            "iso": iso,
            "rate": rate
        }

        $.post("src/update.php", {
            page: "currency",
            "reference": id,
            result: JSON.stringify(data)
        }, function(response) {
            alertify
                .alert("Currency update","Currency " + name + " Updated", function() {
                    // alertify.message('OK');
                    window.location.reload();
                });


        })
    }


    function update_timezone() {

        $('#new-timezone').modal('hide')

        var property_id = $('#property_id_tz').val()
        var new_timezone = $('#c-timezone').val()

        //alert(new_timezone);
        var data = {
            "time_zone": new_timezone
        }

        $.post("src/update.php", {
            page: "locality",
            reference: property_id,
            result: JSON.stringify(data)
        }, function(response) {

            alertify
                .alert("Time Zone Changed","Timezone has been Updated", function() {
                    // alertify.message('OK');
                    window.location.reload();
                });


        })
    }

</script>
