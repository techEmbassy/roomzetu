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

                    <p><small>Manage, room rates, agent rates and kids rates</small> </p>
                    <hr/>
                    <div class="sub-menu">
                        <?php $sbPos=3; include 'includes/rates-menu.php';?>


                    </div>
                    <div class="foot pt-4 pl-2 text-left ">
                        <a class="btn btn-sm btn-secondary" data-target="#newagent-modal" data-toggle="modal"><i class="fa fa-plus"></i> New Agent Rate</a>
                    </div>

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">

                            <div class="row">
                                <div class="col-md-3">
                                    Agent Rates
                                </div>

                                <div class="col-md-9 text-right">

                                    <input class="form-control tiny" placeholder="search" oninput="" />



                                    <select class="form-control tiny" id="properties" onchange="getAgentRates()">
                                        <?php echo $propertyOptions0; ?>
    
                                    </select>


                                    <a class="btn btn-secondary btn-35" href="" data-target="#newagent-modal" data-toggle="modal"><i class="fa fa-plus"></i> New Agent Rate</a>



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
                                            <th scope="col">#</th>
                                            <th scope="col">Rate Name</th>
                                            <th scope="col">Rate Code</th>
                                            <th scope="col">Discount (%)</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody id="agent_rates">
                                        <!-- <tr>
      <td scope="row">1</td>
      <td>STO Agent Rate</td>
      <td>STO-25</td>
      <td>27</td>
     
      <td class="text-right"><a href="#" class="btn btn-secondary btn-sm">Edit</a> <a href="#" class="btn btn-danger text-white btn-sm">Delete</a></td>
    </tr>
    <tr>
      <td scope="row">2</td>
      <td>STO Agent Rate</td>
      <td>STO-25</td>
      <td>27</td>
      
      <td class="text-right"><a href="#" class="btn btn-secondary btn-sm">Edit</a> <a href="#" class="btn btn-danger text-white btn-sm">Delete</a></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td>STO Agent Rate</td>
      <td>STO-25</td>
      <td>27</td>
  
      <td class="text-right"><a href="#" class="btn btn-secondary btn-sm">Edit</a> <a href="#" class="btn btn-danger text-white btn-sm">Delete</a></td>
    </tr>-->
                                    </tbody>
                                </table>

                            </div>



                            <!-- Modal -->
                            <div class="modal fadeIn" id="newagent-modal" tabindex="-1" role="dialog" aria-labelledby="newagent-modal" aria-hidden="true">
                                <div class="modal-dialog modal-sm vertical-align-center" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newagent-modal">New Agent Rate</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                                        </div>
                                        <div class="modal-body">




                                            <form>
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">Rate Name</label>
                                                    <input type="text" class="form-control" required id="agent_rate_name" placeholder="Enter rate Name e.g STO - Agent Rate">
                                                </div>
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Rate Code</label>
                                                    <input type="text" class="form-control" required id="agent_rate_code" placeholder="Enter rate code e.g STO-20 ">
                                                </div>

                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Discount (%)</label>
                                                    <input type="text" class="form-control" required id="agent_discount" placeholder="Enter discount percentage e.g 20">
                                                </div>

                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" id="close_" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="addAgentRate()" class="btn btn-primary">Save Rate</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fadeIn" id="editagent-modal" tabindex="-1" role="dialog" aria-labelledby="editagent-modal" aria-hidden="true">
                                <div class="modal-dialog modal-sm vertical-align-center" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editagent-modal">Edit Agent Rate</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                                        </div>
                                        <div class="modal-body">




                                            <form>
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">Rate Name</label>
                                                    <input type="text" class="form-control" required id="agent_rate_name_e" placeholder="Enter rate Name e.g STO - Agent Rate">
                                                </div>
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Rate Code</label>
                                                    <input type="text" class="form-control" required id="agent_rate_code_e" placeholder="Enter rate code e.g STO-20 ">
                                                </div>

                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Discount (%)</label>
                                                    <input type="text" class="form-control" required id="agent_discount_e" placeholder="Enter discount percentage e.g 20">
                                                </div>

                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" id="close_e" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="updateAgentRate()" class="btn btn-primary">Save Changes</button>
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

    getAgentRates();

    function getAgentRates() {

        $.post("src/get_data.php", {
            token: "get_agent_rates",
            property_id: $('#properties').val()
        }, function(response) {

            var rates_obj = JSON.parse(response);
            json_obj = rates_obj;
            //alert( response);
            var rows = "";
            $.each(rates_obj, function(i, rate) {
                count = i + 1;
                rows += "<tr>";
                rows += "<td scope=\"row\">" + count + "</td>";
                rows += "<td>" + rate.rate_name + "</td>";
                rows += "<td>" + rate.rate_code + "</td>";
                rows += "<td>" + rate.discount + "</td>";
                rows += "<td class=\"text-right\"><a  onclick='editAgentRate(" + i + ")' class=\"btn btn-secondary btn-sm\">Edit</a> <a href=\"#\" class=\"btn btn-danger text-white btn-sm\" onclick='deleteAgentRate(" + rate.id + ")' >Delete</a></td>";
                rows += "</tr>";


            });

            $("#agent_rates").html(rows);


        });


    }

    function addAgentRate() {

        if (!inputsEmpty("#newagent-modal")) {

            var data = JSON.stringify({
                property_id: $('#properties').val(),
                rate_name: $('#agent_rate_name').val(),
                rate_code: $('#agent_rate_code').val(),
                discount: $('#agent_discount').val()
            });

            $.post("src/xhr.php", {
                action: "add_agent_rate",
                data: data
            }, function(response) {
                // alert( response);

                if (parseInt(response) == 1) {
                    // alertify.success("<i class='fa fa-check-circle'></i> Agent Rate saved successfully");
                    //getAgentRates();

                    $("#newagent-modal").modal("hide");
                    alertify.success("<i class='fa fa-check-circle'></i> Agent Rate  successfully saved");

                    $('#agent_rate_name').val("");
                    $('#agent_rate_code').val("");
                    $('#agent_discount').val("");
                    getAgentRates();

                    //location.reload();
                }
            });



        }


    }


    function updateAgentRate() {
        //phone =$(context).val();
        if (!inputsEmpty("#editagent-modal")) {

            var data = JSON.stringify({
                property_id: $('#properties').val(),
                rate_name: $('#agent_rate_name_e').val(),
                rate_code: $('#agent_rate_code_e').val(),
                discount: $('#agent_discount_e').val()
            });

            $.post("src/update.php", {
                    "col_id": "id",
                    "reference": edit_id,
                    "page": "native",
                    "result": data,
                    "table": "agent_rates_tb"
                }, function(response) {

                    if (response === "success") {
                        $("#editagent-modal").modal("hide");
                        alertify.success("<i class='fa fa-check-circle'></i> Agent Rate  successfully updated");
                        getAgentRates();
                    }

                }

            );
        }

    }

    function editAgentRate(index) {
        //phone =$(context).val();

        edit_id = json_obj[index].id;

        $("#editagent-modal").modal("show");

        $('#agent_rate_name_e').val(json_obj[index].rate_name);
        $('#agent_rate_code_e').val(json_obj[index].rate_code);
        $('#agent_discount_e').val(json_obj[index].discount);

    }


    function deleteAgentRate(id) {
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
                        "table": "agent_rates_tb"
                    },


                    function(response) {
                        x0p("", "Rate Deleted", "ok", function() {
                            location.reload();
                        });
                    }

                );
            }
        });



    }

</script>
