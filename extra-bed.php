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
    <?php
    //echo makeEmail("Hello, thank you for booking with us", "Awesome lodges Uganda", "al@gmai.com","0783928773","", "4th street, some building");
?>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2">

                    <p><small>Manage, room rates, agent rates and kids rates</small> </p>
                    <hr />
                    <div class="sub-menu">
                        <?php $sbPos=5; include 'includes/rates-menu.php';?>


                    </div>
                    <div class="foot pt-4 pl-2 text-left ">
                        <a class="btn btn-sm btn-secondary" data-target="#add-extra-bed" data-toggle="modal"><i class="zmdi zmdi-plus"></i> New Extra Bed</a>
                    </div>

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">

                            <div class="row">
                                <div class="col-md-3">
                                    Extra Bed
                                </div>

                                <div class="col-md-9 text-right">

                                    <input class="form-control tiny" placeholder="search" oninput="" />

                                    <!--
                                    <div class="btn-group">
                                        <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Small button
                                      </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Children</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#add-bed" href="#">Extra Bed</a>
                                        </div>
                                    </div>
-->


                                    <select class="form-control tiny hide" id="properties" onchange="getExtraBed()">
                                        <?php echo $propertyOptions0; ?>
                                    </select>


                                    <a class="btn btn-secondary btn-35" href="" data-target="#add-extra-bed" data-toggle="modal"><i class="zmdi zmdi-plus"></i> New Extra Bed</a>

                                </div>
                            </div>
                        </div>




                        <div class="c-body p-2" style="background-color:#f9f9f9" id="">


                            <div class="">

                                <style>
                                    .table thead th {
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #eceeef;
                                    line-height:2;
                                    background-color:#e9ecef;
                                    color: #000;
                                }

                                .table th, .table td {
                                    padding: 0.5rem;
                                    vertical-align: top;
                                    border-top: 1px solid #eceeef;
                                    font-size:13px;
                                }
                                </style>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Cost (USD)/Person/night</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="extrabeds">
                                        <!--
                                        <tr>
                                            <td scope="row">Extra Bed</td>
                                            <td>$100</td>
                                            <td class="text-right"><a href="#" class="btn btn-secondary btn-sm">Edit</a> <a href="#" class="btn btn-danger text-white btn-sm">Delete</a></td>

                                        </tr>
-->


                                    </tbody>
                                </table>

                            </div>




                            <!--modal to add extra bed-->
                            <div class="modal" tabindex="-1" id="add-extra-bed" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content animated zoomIn">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Extra bed</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>

                                                <div class="form-group row">
                                                    <label for="colFormLabel" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" id="ename" placeholder="Enter bed extra name e.g Bed Extra">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="colFormLabel" class="col-sm-4 col-form-label">Cost(Per person)</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" id="ecost" placeholder="enter cost">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="addExtraBed()" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!--modal to edit-->
                            <div class="modal" tabindex="-1" id="edit-modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content animated zoomIn">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Extra bed</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>

                                                <div class="form-group row">
                                                    <label for="colFormLabel" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" id="new_name" placeholder="Enter new name e.g Bed Extra">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="colFormLabel" class="col-sm-4 col-form-label">Cost(Per person)</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" id="new_cost" placeholder="enter new cost">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="updateBed()">Save changes</button>
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

    getExtraBed();

    function getExtraBed() {
        $.post("src/get_data.php", {
            token: "get_extra_bed" //,
            // property_id: $('#properties').val()
        }, function(response) {

            var extbds = JSON.parse(response);
            json_obj = extbds;
            var rows = "";

            $.each(extbds, function(i, data) {

                rows += "<tr>";
                rows += "<td>" + data.name + "</td>";
                rows += "<td>" + data.cost + "</td>";
                rows += "<td class=\"text-right\"><a  onclick='editBed(" + i + ")' class=\"btn btn-secondary btn-sm\">Edit</a> <a                     href=\"#\" class=\"btn btn-danger text-white btn-sm\" onclick='deleteBed(" + data.id + ")' >Delete</a></td>";
                rows += "</tr>";

            });

            $("#extrabeds").html(rows);

        });



    }

    function addExtraBed() {


        if (!inputsEmpty("#add-extra-bed")) {

            var data = JSON.stringify({
                //property_id: $('#properties').val(),
                name: $('#ename').val(),
                cost: $('#ecost').val()
            });

            $.post("src/xhr.php", {
                action: "add_bed",
                data: data
            }, function(response) {
                if (parseInt(response) == 1) {
                    $("#add-extra-bed").modal("hide");
                    alertify.success("<i class='zmdi zmdi-check-circle'></i> Extra Bed  successfully saved");
                    $('#ename').val("");
                    $('#ecost').val("");

                    getExtraBed();
                }
            });



        }


    }
    //
    //
    function updateBed() {
        //phone =$(context).val();
        if (!inputsEmpty("#edit-modal")) {

            //                    property_id: $('#properties').val(),
            var data = JSON.stringify({
                name: $('#new_name').val(),
                cost: $('#new_cost').val()
            });

            $.post("src/update.php", {
                    "col_id": "id",
                    "reference": edit_id,
                    "page": "native",
                    "result": data,
                    "table": "extra_beds_tb"
                }, function(response) {
                    //                alert(response)
                    if (response === "success") {
                        $("#edit-modal").modal("hide");
                        alertify.success("<i class='zmdi zmdi-check-circle'></i>Value successfully updated");
                        getExtraBed();
                    }

                }

            );
        }

    }
    //
    function editBed(index) {
        //phone =$(context).val();

        edit_id = json_obj[index].id;

        $("#edit-modal").modal("show");

        $('#new_name').val(json_obj[index].name);
        $('#new_cost').val(json_obj[index].cost);

    }


    function deleteBed(id) {


        x0p("Delete Bed Rate?", "This, action can not be undone.", "warning", function(choice) {
            if (choice == "warning") {
                var data = JSON.stringify({
                    status: "deleted"
                });

                $.post("src/update.php", {
                        "col_id": "id",
                        "reference": id,
                        "page": "native",
                        "result": data,
                        "table": "extra_beds_tb"
                    }, function(response) {

                        if (response === "success") {
                            location.reload();
                        }

                    }

                );
            }
        })
    }

</script>
