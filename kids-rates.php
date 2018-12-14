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

                    <p><small>Manage room rates, agent rates and kids rates</small> </p>
                    <hr/>
                    <div class="sub-menu">
                        <?php $sbPos=4; include 'includes/rates-menu.php';?>


                    </div>
                    <div class="foot pt-4 pl-2 text-left ">
                        <a class="btn btn-sm btn-secondary" data-target="#newkidsrate-modal" data-toggle="modal"><i class="fa fa-plus"></i> New Kids rate</a>
                    </div>

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">

                            <div class="row">
                                <div class="col-md-3">
                                    Kids Rates
                                </div>

                                <div class="col-md-9 text-right">

                                    <input class="form-control tiny" placeholder="search" oninput="searchPrice(this)" />



                                    <!--<select class="form-control tiny hide" id="properties" onchange="getKidsRates()">
                                         <?php echo $propertyOptions0; ?>
    
                                     </select>-->


                                    <a class="btn btn-secondary btn-35" href="" data-target="#newkidsrate-modal" data-toggle="modal"><i class="fa fa-plus"></i> New Kids rates</a>



                                </div>
                            </div>
                        </div>
                        <div class="c-body p-2" style="background-color:#f9f9f9" id="">





                            <div class="">

                                <style>
                                    .table thead th {
                                        vertical-align: bottom;
                                        border-bottom: 2px solid #eceeef;
                                        line-height: 2;
                                        background-color: #6C4117;
                                        color: #fff;
                                    }

                                    .table th,
                                    .table td {
                                        padding: 0.5rem;
                                        vertical-align: top;
                                        border-top: 1px solid #eceeef;
                                        font-size: 13px;
                                    }

                                </style>

                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>

                                            <th scope="col">Rate Name</th>
                                            <th scope="col">Minimum Age</th>
                                            <th scope="col">Maximum Age</th>
                                            <th scope="col">Amount (USD)</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody id="kids_rates">
                                        <!-- <tr>
      <td scope="row">12-14</td>
      <td>10</td>
      <td>12</td>
      <td>140</td>
     
      <td class="text-right"><a href="#" class="btn btn-secondary btn-sm">Edit</a> <a href="#" class="btn btn-danger text-white btn-sm">Delete</a></td>
    </tr>

    <tr>
      <td scope="row">12-14</td>
      <td>10</td>
      <td>12</td>
      <td>140</td>
     
      <td class="text-right"><a href="#" class="btn btn-secondary btn-sm">Edit</a> <a href="#" class="btn btn-danger text-white btn-sm">Delete</a></td>
    </tr>
    <tr>
    <td scope="row">12-14</td>
      <td>10</td>
      <td>12</td>
      <td>140</td>
     
      <td class="text-right"><a href="#" class="btn btn-secondary btn-sm">Edit</a> <a href="#" class="btn btn-danger text-white btn-sm">Delete</a></td>
    </tr>-->
                                    </tbody>
                                </table>

                            </div>



                            <!-- Modal -->
                            <div class="modal fadeIn" id="newkidsrate-modal" tabindex="-1" role="dialog" aria-labelledby="newkidsrate-modal" aria-hidden="true">
                                <div class="modal-dialog vertical-align-center" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newkidsrate-modal">New Kids Rate</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                                        </div>
                                        <div class="modal-body">




                                            <form>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Rate Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="rate_name" required placeholder="E.g infant rate">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Minimum Years</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="rate_minimum" required placeholder="E.g 10">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Maximum Years</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="rate_maxmum" required placeholder="E.g 13">
                                                    </div>
                                                </div>




                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="amount" required placeholder="E.g 300">
                                                    </div>
                                                </div>


                                            </form>





                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="addKidRate()" class="btn btn-primary">Save Rate</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fadeIn" id="editkidsrate-modal" tabindex="-1" role="dialog" aria-labelledby="editkidsrate-modal" aria-hidden="true">
                                <div class="modal-dialog vertical-align-center" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editkidsrate-modal">Edit Kids Rate</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                                        </div>
                                        <div class="modal-body">




                                            <form>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Rate Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="rate_name_e" required placeholder="E.g infant rate">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Minimum Years</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="rate_minimum_e" required placeholder="E.g 10">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Maximum Years</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="rate_maxmum_e" required placeholder="E.g 13">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="amount_e" required placeholder="E.g 300">
                                                    </div>
                                                </div>


                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="updateKidsRate()" class="btn btn-primary">Save Changes</button>
                                        </div>

                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>




<?php include 'includes/footer.php';?>


<script type="text/javascript">
    var json_obj = {};
    var edit_id = "";

    getKidsRates();

    function getKidsRates() {

        $.post("src/get_data.php", {
            token: "get_kids_rates",
            // property_id: parseInt($('#properties').val())
        }, function(response) {

            var rates_obj = JSON.parse(response);
            json_obj = rates_obj;

            //alert(response);//// 

            var rows = "";
            $.each(rates_obj, function(i, rate) {
                count = i + 1;
                rows += "<tr >";
                rows += "<td scope=\"row\">" + rate.rate_name + "</td>";
                rows += "<td>" + rate.minimum_age + "</td>";
                rows += "<td>" + rate.maximum_age + "</td>";


                // rows+="<td>"+'$'+ +rate.amount+"</td>";
                rows += "<td>" + '$' + addCommas(rate.amount) + "</td>";

                rows += "<td class=\"text-right\"><a onclick='editKidsRate(" + i + ")' class=\"btn btn-secondary btn-sm\">Edit</a> <a href=\"#\" class=\"btn btn-danger text-white btn-sm\" onclick='deleteKidRate(" + rate.id + ")'>Delete</a></td>";
                rows += "</tr>";


            });

            $("#kids_rates").html(rows);


        });


    }

    function updateKidsRate() {
        //phone =$(context).val();
        if (!inputsEmpty("#editkidsrate-modal")) {

            var data = JSON.stringify({
                //property_id: $('#properties').val(),
                rate_name: $('#rate_name_e').val(),
                minimum_age: $('#rate_minimum_e').val(),
                maximum_age: $('#rate_maxmum_e').val(),
                amount: $('#amount_e').val()
            });

            $.post("src/update.php", {
                    "col_id": "id",
                    "reference": edit_id,
                    "page": "native",
                    "result": data,
                    "table": "kids_rates_tb"
                }, function(response) {

                    if (response === "success") {
                        $("#editkidsrate-modal").modal("hide");
                        alertify.success("<i class='fa fa-check-circle'></i> Kids Rate  successfully updated");
                        getKidsRates();
                    }

                }

            );
        }

    }

    function editKidsRate(index) {
        //phone =$(context).val();

        edit_id = json_obj[index].id;

        $("#editkidsrate-modal").modal("show");

        $('#rate_name_e').val(json_obj[index].rate_name);
        $('#rate_minimum_e').val(json_obj[index].minimum_age);
        $('#rate_maxmum_e').val(json_obj[index].maximum_age);
        $('#amount_e').val(json_obj[index].amount);

    }


    function deleteKidRate(id) {
        //phone =$(context).val();
        x0p("Delete Rate?", "are you sure?", "warning", function(choice) {
            if (choice == "warning") {
                var data = JSON.stringify({
                    status: "deleted"
                });

                $.post("src/update.php", {
                    "col_id": "id",
                    "reference": id,
                    "page": "native",
                    "result": data,
                    "table": "kids_rates_tb"
                }, function(response) {

                    if (response === "success") {
                        x0p("", "Rate Deleted", "ok", function() {
                            location.reload();
                        });
                    }
                });
            }
        });
    }






    function addKidRate() {

        if (!inputsEmpty("#newkidsrate-modal")) {

            var data = JSON.stringify({
                // property_id: $('#properties').val(),
                rate_name: $('#rate_name').val(),
                minimum_age: $('#rate_minimum').val(),
                maximum_age: $('#rate_maxmum').val(),
                amount: $('#amount').val()
            });

            $.post("src/xhr.php", {
                action: "add_kid_rate",
                data: data
            }, function(response) {
                alert(response);

                if (parseInt(response) == 1) {
                    // alertify.success("<i class='fa fa-check-circle'></i> Agent Rate saved successfully");
                    //getAgentRates();

                    $("#newkidsrate-modal").modal("hide");
                    alertify.success("<i class='fa fa-check-circle'></i> Kid Rate  successfully saved");

                    $('#rate_name').val("");
                    $('#rate_minimum').val("");
                    $('#rate_maxmum').val("");
                    $('#amount').val("");

                    getKidsRates();

                    //location.reload();
                }
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

</script>
