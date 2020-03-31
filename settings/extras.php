<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Extra Services
            </div>


            <div class="col-md-9 text-right">
                <input class="form-control tiny" placeholder="search" oninput="searchExtra(value)" />
                <a class="btn btn-secondary btn-35" data-target="#new-extra" data-toggle="modal" onclick="New_extra()"><i class="zmdi zmdi-plus"></i> Add Extra</a>
            </div>
        </div>
    </div>
    <div class="c-body p-0">
        <table class="table table-bordered mt-0 table-conn table-primary table-hover border-bottom-0" id="tb-extras">
            <thead>
                <tr onclick="showDetails()">
                    <!--                    <th style=" width:5px"></th>-->

                    <th>Extra Name<i class="fa fa-angle-down"></i> </th>


                    <th>Description</th>
                    <th>Price Per Guest</th>
                    <th style="width: 3px;"></th>
                    <th style="width: 3px;"></th>


                </tr>
            </thead>
            <tbody>



            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11" style="border-bottom:0;"><br><span id="extras-pagination" class="pull-right"></span></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="c-footer pl-4 text-right">
        <?php echo $timeLeftFooter; ?>
    </div>
</div>

<?php //include 'modals/new-mail.php' ?>
<?php include 'modals/new-extra.php' ?>
<?php include 'includes/footer.php' ?>

<script>
    var id = 1;
    var data;
    var prop_id = "<?php echo $prop_id;?>"

    $(function() {
        getCompanyExtras();
        // alert(prop_id)


    });





    function getCompanyExtras() {

        $.get("src/get.php", {
            token: "get_extras"
        }, function(response) {
            //alert(response);
            data = response;
            setExtras(response);
            // data = JSON.parse(response);
            // alert(data.company_name)
        });

    }




    function propertyDetails() {
        $('#new-extras').modal('show')


    }


    //var pd = '[{"id":2,"name":"pineapplebay", "country":"Uganda", "address":"soroti", "email":"email@pineapplebay.com","contact":"93002882002", "manager":"John Dale", "manager_id":"2"},{"id":3,"name":"Clouds", "country":"Uganda", "address":"Kampala", "email":"email@cloudslodge.com","contact":"93002882002", "manager":"Sarah Nakato", "manager_id":"7"}]';

    //   setBranches(pd);

    function setExtras(data) {
        var extras = JSON.parse(data);
        var rows = [];
        $.each(extras, function(i, extra) {
            var row = "<tr>";
            //            row += "<td></td>";
            row += "<td>" + extra.name + "</td>";
            row += "<td>" + extra.description + "</td>";
            row += "<td>" + extra.price + "</td>";

            row += "<td class='text-center br-0'><a class='zmdi zmdi-edit btn-circle' title='edit " + extra.name + "' onclick='editExtra(\"" + i + "\")'></a></td>";
            row += "<td class='text-center br-0'><a class='zmdi zmdi-close btn-circle' title='delete " + extra.name + "' onclick='deleteExtra(\"" + extra.id + "\", \"" + extra.name + "\")'></a></td>";
            row += "</tr>";

            rows.push(row)
        });



        var tableBody = $("#tb-extras tbody");
        pag(rows, tableBody, '#extras-pagination', 20);
        if(rows.length < 1){
           tableBody.html("<tr><td colspan='5' style='background-color:white'><p class='p-4'>No Extras Added yet</p></td></tr>");

           }
        //fixTableHead(".table-primary");
    }

    function New_extra() {
        var m = $('#new-extra');
        m.find("#e-name").val("");
        m.find("#e-description").val("");
        m.find("#e-amount").val("");
        m.find('.modal-title').html("<i class='fa fa-cube'></i> New Service");
        m.find('.savebtn').attr('onClick', 'save_extra()');

    }

    function editExtra(index) {
        var extra = JSON.parse(data)[index];
        var m = $('#new-extra');

        var extra_id = extra.id;

        // m.find("#p-id").val(branch.id);
        m.find("#e-name").val(extra.name);
        m.find("#e-description").val(extra.description);
        m.find("#e-amount").val(extra.price);


        m.find('.modal-title').html("<i class='zmdi zmdi-edit'></i> Edit " + extra.name);
        m.find('.savebtn').attr('onClick', 'update_extra(' + extra_id + ')');
        m.modal("show")

    }

    function deleteExtra(id, name) {

        alertify.confirm("Delete " + name, "Are you sure you want to delete this service?",
            function() {
                $.post("src/delete.php", {
                    "reference": "id",
                    "token": "extras_tb",
                    "data": id
                }, function(response) {
                    if (response == "success") {
                        // window.location.reload();
                        getCompanyExtras();
                        alertify.success(name + ' Deleted');
                    } else {
                        alertify.error(response);
                    }
                })

            },
            function() {
                alertify.error('Cancelled');
            });
    }

    function searchExtra(s) {
        var filter = s.toUpperCase();

        $("#tb-extras tbody tr").each(function(i, tr) {

            var b_ref = $(tr).find("td:eq(0)").html();
            if (b_ref.toUpperCase().indexOf(filter) > -1) {
                tr.style.display = "";

            } else {
                tr.style.display = "none";

            }
        })


    }

</script>
