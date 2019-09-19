<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Properties
            </div>


            <div class="col-md-9 text-right">
                <input class="form-control tiny" placeholder="search" oninput="searchProperty(value)" />
                <a class="btn btn-secondary btn-35" data-target="#new-property" data-toggle="modal"><i class="fa fa-plus"></i> Add Property</a>
            </div>
        </div>
    </div>
    <div class="c-body p-0">
        <table class="table table-bordered mt-0 table-conn table-primary table-hover border-bottom-0" id="tb-properties">
            <thead>
                <tr>
                    <!--                                        <th style=" width:5px"></th>-->
                    <th>Logo<i class="fa fa-angle-down"></i> </th>
                    <th>Property Name<i class="fa fa-angle-down"></i> </th>


                    <th>Country</th>
                    <th>Address</th>
                    <th>email</th>
                    <th>Contact</th>
                    <th>Manager</th>
                    <th style=" width:5px"></th>
                    <th style=" width:5px"></th>


                </tr>
            </thead>
            <tbody>

                <!-- <td><img src="img/profiles/allen.jpg" style="width:60px;"></td> -->

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" style="border-bottom:0;"><br><span id="property-pagination" class="pull-right"></span></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="c-footer pl-4 text-right">
        <?php echo $timeLeftFooter; ?>
    </div>
</div>

<?php include 'modals/new-property.php'?>
<?php include 'includes/footer.php'?>

<script>
    var data;
    $(function() {
        getCountries();
        getCompanyProperty();

        getUsers();

    });

    function getUsers() {

        $.get("src/get.php", {
            token: "get_users"
        }, function(response) {
            //alert(response);
            $('#p-manager').html(response);
            $('#p-manager-e').html(response);
        });

    }



    ////

    function getCountries() {


        $.ajax({
            type: "POST",
            url: "data/static_set.php",
            data: {
                token: "get_countries"
            },
            success: function(data) {

                $('#p-country').html('<option value="">Select Country</option>' + data);
                $('#p-country-e').html('<option value="">Select Country</option>' + data);
                //console.log(items);
            }
        });



    }



    ////



    function getCompanyProperty() {

        $.get("src/get.php", {
            "table": "property_tb_v",
            "col_name": "company_id",
            token: "get_all_rows"
        }, function(response) {
            //  alert(response);
            data = response;
           // alert(response);
            setBranches(data);
            // data = JSON.parse(response);
            // alert(data.company_name)
        });

    }




    function propertyDetails() {
        $('#new-property').modal('show')


    }


    function propertyDetails4edit() {
        $('#edit-property').modal('show')

    }

</script>

<script>
    //var pd = '[{"id":2,"name":"pineapplebay", "country":"Uganda", "address":"soroti", "email":"email@pineapplebay.com","contact":"93002882002", "manager":"John Dale", "manager_id":"2"},{"id":3,"name":"Clouds", "country":"Uganda", "address":"Kampala", "email":"email@cloudslodge.com","contact":"93002882002", "manager":"Sarah Nakato", "manager_id":"7"}]';

    //   setBranches(pd);

    function setBranches(data) {
        var branches = JSON.parse(data);
        var rows = [];
        // var img = document.createElement('img');
        // var img.src="img/profiles/allen.jpg";
        $.each(branches, function(i, branch) {
            var row = "<tr>";
            
            row += "<td>" + "<img style=\"width:40px; height:30px;\" src=\"img/settings/"+ branch.property_image +"\" style=\"width:60px;\">"+" </td>";
            row += "<td>" + branch.property_name + "</td>";
            row += "<td>" + branch.country + "</td>";
            row += "<td>" + branch.address + "</td>";
            row += "<td>" + branch.email + "</td>";
            row += "<td>" + branch.phone + "</td>";
            row += "<td>" + branch.manager + "</td>";
            row += "<td class='text-center br-0'><a class='fa fa-pencil btn-circle' title='edit " + branch.property_name + "' onclick='editProperty(\"" + i + "\")'></a></td>";



            var hide = "";
            if (branch.main == 'yes') {
                hide = 'hide';

            }
            row += "<td class='text-center br-0 " + hide + "'>";
            row += "<a class='fa fa-close btn-circle hide text-warning' title='Delete " + branch.property_name + "' onclick='deleteProperty(\"" + branch.id + "\", \"" + branch.property_name + "\")'></a>";
            row += "</td></tr>";
            rows.push(row)

        });



        var tableBody = $("#tb-properties tbody");
        pag(rows, tableBody, '#property-pagination', 20);
        //        console.log(tableBody);
        fixTableHead(".table-primary");
    }

    function editProperty(index) {
       var imgfolder = "img/settings/";

        var branch = JSON.parse(data)[index];
        var m = $('#edit-property');

        var property_id = branch.id;

        m.find("#p-id-e").val(branch.id);
        m.find("#p-name-e").val(branch.property_name);
        m.find("#p-email-e").val(branch.email);
        m.find("#p-phone-e").val(branch.phone);
        m.find("#p-country-e option:selected").text(branch.country);


        m.find("#p-address-e").val(branch.address);
        m.find("#p-manager-e").val(branch.manager_id);

         $("#p-img-logo-e").attr("src", imgfolder + branch.property_image);

        m.find('.savebtn').attr('onClick', 'update_property(' + property_id + ')');
        //m.modal("show")*/
        propertyDetails4edit();

    }

    function deleteProperty(id, name) {

        alertify.confirm("Delete " + name, "Are you sure you want to delete this property?",
            function() {
                $.post("src/delete.php", {
                    "reference": "id",
                    "token": "property_tb",
                    "data": id
                }, function(response) {
                    if (response == "success") {
                        window.location.reload();
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

    function searchProperty(s) {
        var filter = s.toUpperCase();

        $("#tb-properties tbody tr").each(function(i, tr) {

            var b_ref = $(tr).find("td:eq(1)").html();
            if (b_ref.toUpperCase().indexOf(filter) > -1) {
                tr.style.display = "";

            } else {
                tr.style.display = "none";

            }
        })


    }

</script>
