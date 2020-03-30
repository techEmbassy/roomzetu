<?php include 'includes/auth.php'?>
<?php if(($role==3)){
     header("Location: dash.php");
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php'?>
</head>

<style>
    th {
        background: #fff;
        border: none !important
    }

    td input {
        color: #555;
    }

</style>



<body class="gray">
    <?php  $mpos = 5; include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2 pr-0">

                    <p><small>Manage connections, agents and previous guests</small> </p>
                    <hr />
                    <div class="sub-menu ">
                        <?php $sbPos = 1; include 'includes/connections-menu.php'; ?>
                    </div>
                    <div class="foot pt-4 pl-2 text-left">
                        <!--                             <a class="btn btn-sm btn-secondary"><i class="fa fa-plus"></i> New Room type</a>-->

                    </div>

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">
                            <div class="row">
                                <div class="col-md-3">
                                    Agents List
                                </div>

                                <div class="col-md-9 text-right">
                                    <input class="form-control tiny" placeholder="search" oninput="searchAgent(value)" />
                                    <a class="btn btn-secondary btn-35" data-target="#new-agent" data-toggle="modal" onclick="new_agent()"><i class="fa fa-plus"></i> New Agent</a>
                                </div>
                            </div>
                        </div>
                        <div class="c-body p-0">
                            <table class="table table-bordered mt-0 table-conn table-primary table-hover border-bottom-0" id="agents-tb" width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
                                <thead>
                                    <tr>
                                        <th style=" width:5px"></th>

                                        <th>Name/Company Name </th>

                                        <!--<th>Discount(%)</th>-->
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <!--                                        <th>Country</th>-->
                                        <th>Address</th>
                                        <th>Reservations</th>

                                        <th style=" width:50px">edit</th>
                                        <th style=" width:50px">Delete</th>


                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9" style="border-bottom:0;"><br><span id="agents-pagination" class="pull-right"></span></td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                        <div class="c-footer">
                            <small class="ml-4 mt-2 mr-2" id="numb">0 Agents selected</small> <input type="checkbox" id="select-all" /> <label for="select-all">select all</label>

                            <a class="pull-right mr-4 mt-1" onclick="btnPrint()"><i class="fa fa-print"></i> print list</a>
                            <a class="pull-right mr-4 mt-1" onclick="loadMailList()" data-toggle="modal" data-target="#mail-modal"><i class="fa fa-envelope"></i> copy mailList</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal animated zoomIn" id="agent-bookings">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> All Reservations by <strong class="agent-name"></strong> </h5><a class="close" data-dismiss="modal">x</a>
                </div>

                <div class="modal-body">
                    <div class="summary py-3"></div>
                    <table class="table table-bordered" id="tb-agent-bookings">



                    </table>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-secondary btn-sm">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>




<!--<?php
//include 'modals/new-mail.php'
?>-->
<?php include 'modals/new-agent.php' ?>
<?php include 'includes/footer.php' ?>
<!--<script src="js/pagination.min.js"></script>-->




<script>
    var r;
    var email_agent = [];
    var name_agent = [];
    var phone_agent = [];
    var address_agent = [];
    var reservations_agent = [];
    var data;
    $(function() {

        get_agents();

    });

    function get_agents() {


        $.get("src/get.php", {
            "table": "agent_tb",
            "reference": "1",
            "col_name": "company_id",
            token: "get_all_rows"
        }, function(response) {
            //alert(response);
            data = response;
            setAgents(data);
            //  setBranches(data);
            // data = JSON.<p>You can use the mark tag to <mark>highlight</mark> text.</p>
            //arse(response);
            // alert(data.company_name)
        });

    }

    function setAgents(data) {
        var datau = JSON.parse(data);
        var rows = [];
        var table = $("#agents-tb");
        var tableBody = table.find('tbody');



        $.each(datau, function(i, item) {
            var an = item.name;
            var ae = item.email;
            var ap = item.phone;
            //            var ac = item.country;
            var aa = item.address;
            var aid = item.id;
            var ar = item.agent_rate;


            //  var arz = item.agent_reservations;


            var row = "<tr onclick='showDetails(\"" + aid + "\")'>" +
                "<th><input type='checkbox' class='checkSingle' /></th>" +
                "<td>" + an + "</td>" +
                // "<td class='text-right'>" + ar + "</td>" +

                "<td>" + ae + "</td>" +
                "<td>" + ap + "</td>" +
                //                "<td>" + ac + "</td>" +
                "<td>" + aa + "</td>" +
                "<td><a onclick='showReservations(\"" + aid + "\", \"" + an + "\")' class='btn btn-secondary p-1 btn-sm btn-block center'>View All</a></td>" +
                "<td class='text-center br-0'><a class='zmdi zmdi-edit text-info btn-circle' style='color:#000' title='Edit " + an + "' onclick='edit_agent(\"" + i + "\")'></a></td>" +
                "<td class='text-center br-0'><a class='zmdi zmdi-delete text-danger btn-circle' title='Delete " + an + "' onclick='delete_agent(\"" + aid + "\", \"" + an + "\")'></a></td>" +
                "</td>" +
                "</tr>";

            rows.push(row);

        })

        //        tableBody.html(rows);

        pag(rows, tableBody, '#agents-pagination', 20);
        if (rows.length < 1) {
            tableBody.html("<tr><td colspan='9'><p class='text-muted p-5'>No Agents Added Yet.</p></td></tr>");
        }

    }

    function new_agent() {
        var m = $('#new-agent');
        m.find("#a-name").val("");
        // m.find("#a-rate").val("");
        m.find("#a-email").val("");
        m.find("#a-phone ").val("");
        //        m.find("#a-country").val(agent.country);
        m.find("#a-address").val("");
        m.find('.modal-title').html("<i class='zmdi zmdi-account-add'></i> New Agent");
    }

    function edit_agent(index) {
        var agent = JSON.parse(data)[index];
        var m = $('#new-agent');

        var agent_id = agent.id;


        m.find("#a-name").val(agent.name);
        m.find("#a-rate").val(agent.agent_rate);

        m.find("#a-email").tagsinput('removeAll');
        if (agent.email != "") {
            $.each(agent.email.split(","), function(i, s) {
                m.find("#a-email").tagsinput('add', s);
            })
        }




        m.find("#a-phone ").val(agent.phone);
        //        m.find("#a-country").val(agent.country);
        m.find("#a-address").val(agent.address);


        m.find('.modal-title').html("<i class='fa fa-eyedropper'></i> Edit " + agent.name);
        m.find('.savebtn').attr('onClick', 'update_agent(' + agent_id + ')');
        m.modal("show")

    }


    function update_agent(id) {
        //  alert(id);



        var name = $('#a-name').val()
        var rate = $('#a-rate').val()
        var email = $('#a-email').val()
        var phone = $('#a-phone').val()
        //        var country = $('#a-country').val()
        var address = $('#a-address').val()


        var data = {
            "name": name,
            "agent_rate": rate,
            "phone": phone,
            "email": email,
            "address": address
        }

        if (!(inputsEmpty("#form-new-agent"))) {

            $.post("src/update.php", {
                //            "token": "agent_tb",
                page: "agent",
                "reference": id,
                "col_name": "id",
                result: JSON.stringify(data)
            }, function(response) {
                //alert(response);
                $('#new-agent').modal('hide')

                x0p('Agent Info Update', name + '  Information updated Succesfully', 'ok', function() {
                    window.location.reload();
                });



                //                alertify // .alert("Agent Info Update", name + "'s Information updated Succesfully", function() { // // alertify.message('OK'); // window.location.reload(); // });


            })

        }

    }


    //    fixTableHead(".table-conn");

    function delete_agent(id, name) {

        x0p("Delete Agent", "Are you sure you want to delete this agent?", "warning",



            function(button) {

                //                alert(button)
                if (button == 'warning') {


                    $.post("src/delete.php", {
                        "reference": "id",
                        "token": "agent_tb",
                        "data": id
                    }, function(response) {
                        if (response == "success") {

                            x0p('Deleted', 'Agent has been deleted. Click okay to refresh', 'ok', function() {
                                window.location.reload();
                            });


                            //                            alertify.success(name + ' Deleted');
                        } else {
                            alertify.error(response);
                        }
                    })

                }
                if (button == 'cancel') {
                    x0p('Canceled',
                        'You canceled input.',
                        'error', false);
                }
            });

    }









    $("#select-all").change(function() {
        if (this.checked) {
            $(".checkSingle").each(function() {
                this.checked = true;
            })
        } else {
            $(".checkSingle").each(function() {
                this.checked = false;
            })
        }


    });

    $(document).on('change', '[type=checkbox]', function() {
        var checkedboxes = $('.checkSingle:checked').length;
        $("#numb").text(checkedboxes + " Agents selected");
        get_email_address();


    });

    function get_email_address() {
        name_agent = [];
        email_agent = [];
        phone_agent = [];
        address_agent = [];
        reservations_agent = [];
        var tableControl = document.getElementById('agents-tb');
        $('.checkSingle:checked', tableControl).each(function() {
            name_agent.push($(this).closest('tr').find('td:eq(0)').text());
            email_agent.push($(this).closest('tr').find('td:eq(1)').text());
            phone_agent.push($(this).closest('tr').find('td:eq(2)').text());
            address_agent.push($(this).closest('tr').find('td:eq(3)').text());
            reservations_agent.push($(this).closest('tr').find('td:eq(4)').text());
        }).get();
    }

    function showReservations(id, agentName) {
        $.post("src/get_data.php", {
            token: "get agent bookings",
            id: id
        }, function(data) {
            //alert(data);
            var reservations = JSON.parse(data);
            console.log(data);
            var rows = "";
            var cbookings = 0;
            if (reservations.length > 0) {
                $.each(reservations, function(i, item) {
                    rows += "<tr>";
                    rows += "<td class='text-muted'>" + item.beautiful_date + "</td>";
                    rows += "<td><b>" + item.booking_name + "</b></td>";
                    rows += "<td class='text-left'>$" + parseFloat(item.cost).toLocaleString() + "</td>";
                    rows += "<td><small><i class='fa fa-circle text-" + item.booking_status + "'></i> " + item.booking_status + "</small></td>";
                    rows += "</tr>";

                    if (item.booking_status == "confirmed") {
                        cbookings += parseFloat(item.cost);
                    }
                });

                $("#agent-bookings .summary").html("<i class='fa fa-circle text-confirmed'></i> confirmed bookings ($" + cbookings.toLocaleString() + ")");
                $("#tb-agent-bookings").html(rows);

            }

            if (reservations.length == 0) {
                $("#agent-bookings .summary").html("");
                $("#tb-agent-bookings").html("<tr><td><br><br><br><h4 class='text-muted'>No reservations </h4><p>There are currently no reservations by <b>" + agentName + "</b></p><br><br><br></td></tr>");
            }
            $("#agent-bookings .agent-name").text(agentName);
            $("#agent-bookings").modal("show");

        })


    }

    function loadMailList() {
        if (email_agent.length == 0) {
            alert('select atleast one reciepient')

        } else {
            // Create a dummy input to copy the string array inside it
            var dummy = document.createElement("input");
            // Add it to the document
            document.body.appendChild(dummy);
            // Set its ID
            dummy.setAttribute("id", "dummy_id");
            // Output the array into it
            document.getElementById("dummy_id").value = email_agent.join('; ');
            // Select it
            dummy.select();
            // Copy its contents
            document.execCommand("copy");
            // Remove it as its not needed anymore
            document.body.removeChild(dummy);

            //            alert('Email list has been copied to clipboard')
            x0p('Emails copied', 'Email list has been copied to clipboard!', 'info');

        }

        //        var emaillist = "";
        //        r = 0;
        //        email_agent.forEach(function(agent) {
        //            // do something with `item`
        //
        //
        //
        //            emaillist = emaillist + "<span class='tag' >" + agent + " <i class='fa fa-close ' id='" + r + "' onclick='del_receipient(\"" + r + "\")' > </i></span > ";
        //            r = r + 1;
        //

        //        $("#emails_list").html(emaillist);
        //        $("#receipients").html($('.checkSingle:checked').length + ' receipients');

    }



    $(".checkSingle").click(function() {

        if ($(this).is(":checked")) {
            var isAllChecked = 0;

            $(".checkSingle").each(function() {
                if (!this.checked)
                    isAllChecked = 1;

            })
            if (isAllChecked == 0) {
                $("#select-all").prop("checked", true);
            }
        } else {
            $("#select-all").prop("checked", false);
        }
    });



    function btnPrint() {
        if (email_agent.length == 0) {
            alert('select atleast one reciepient')
        } else {
            //        var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('</head><body > <center><h2>Agent List</h2></center>');
            printWindow.document.write('DATE: <?php echo date("d-m-Y")?>');
            printWindow.document.write('</br></br>COMPANY NAME:');
            printWindow.document.write('</br></br></br><table style=" text-align:center" ><thead ><tr>');
            printWindow.document.write('<th style=" width:50px"">N0</th><th style=" width:100px">NAME</th><th style=" width:150px">EMAIL</th><th style=" width:150px">PHONE</th><th style=" width:100px">ADDRESS</th><th style=" width:100px">RESEVATIONS</th></tr></thead>');

            printWindow.document.write('<tbody>');

            for (var i = 0; i <= name_agent.length - 1; i++) {
                printWindow.document.write('<tr><td>');
                printWindow.document.write(i + 1);
                printWindow.document.write('</td><td>');
                printWindow.document.write(name_agent[i]);
                printWindow.document.write('</td><td>');


                printWindow.document.write(email_agent[i]);
                printWindow.document.write('</td><td>');
                printWindow.document.write(phone_agent[i]);
                printWindow.document.write('</td><td>');
                printWindow.document.write(address_agent[i]);
                printWindow.document.write('</td><td>');
                printWindow.document.write(reservations_agent[i]);
                printWindow.document.write('</td></tr>');
            }

            printWindow.document.write('</tbody></table>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    }


    function searchAgent(s) {
        var filter = s.toUpperCase();

        $("#agents-tb tbody tr").each(function(i, tr) {

            var b_ref = $(tr).find("td:eq(0)").html();
            if (b_ref.toUpperCase().indexOf(filter) > -1) {
                tr.style.display = "";

            } else {
                tr.style.display = "none";

            }
        })


    }








    //    function del_receipient(r) { // // // alertify.confirm("Remove " + "alex", "Are you sure you want to delete this reciepient?", // function() { // // alertify.success(r + ' Deleted'); // // //for (var i = email_agent.length - 1; i >= 0; i--) { // email_agent.splice(r, 1); // //} // // //delete email_agent[r]; // //alert(email_agent.length) // loadMailList(); // //alert(email_agent); // $("#receipients").html(email_agent.length + ' receipients'); // // }, // function() { // alertify.error('Cancelled'); // }); // // // }


    //    var filelist = "";
    //    var j = 0;
    //    var file_array;
    //    $('#attach-file').change(function() {
    //
    //        var file = $('#attach-file')[0].files[0].name;
    //        file_array = []; //error
    //        file_array.push(file);
    //        alert(file_array); //error
    //
    //        file_array.forEach(function(item) {
    //            // do something with `item`
    //            filelist = filelist + "<span class='tag' >" + item + " <i class='fa fa-close ' id='" + j + "' onclick='del_file(\"" + j + "\")' > </i></span > ";
    //            j = j + 1;
    //        });
    //        $('#file_div').html(filelist);
    //
    //
    //
    //    });




    //    function del_file(j) {
    //        alert(file_array.length);
    //        //        email_agent.splice(r, 1);
    //
    //        $('#file_div').html("dd");
    //
    //    }

    <?php
//if(isset($_POST['emailForm'])){
//
//
//        if(  isset($_POST['emailList']) && $_POST['emailList']!=""
//             && isset($_POST['subject']) && $_POST['subject']!=""
//            &&isset($_POST['message']) && $_POST['message']!=""){
//
//
//         $emailList= $_POST['emailList'];
//         $template= $_POST['template'];
//         $subject= $_POST['subject'];
//         $attachements= $_POST['attachements'];
//         $message= $_POST['message'];
//
//           foreach ($_FILES['file']['name'] as $filename) {
//                echo $filename.'<br/>';
//                }
//
//
// $cell1='width:200px; padding:5px;font-weight:bold;border:1px solid #AAA'; $cell2='width:300px; padding:5px;border:1px solid #AAA; border-left:none'; //send mails here. //to admin $headers = 'From: $name
//<$email> '."\r\n"; $headers .= 'Reply-to: '. $name.'
//    < '.$email.'> '."\r\n"; $headers .= 'MIME-Version: 1.0' . "\r\n"; $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; $admin_body = "
//        <html>
//
//        <body>"; $subject= 'New Reservations from gorilla safari lodge website'; $admin_body .= "
//            <table>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Name</td>
//                    <td style='$cell2'>$name</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Country</td>
//                    <td style='$cell2'>$country</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Email</td>
//                    <td style='$cell2'>$email</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Phone</td>
//                    <td style='$cell2'>$phone</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Postal_address</td>
//                    <td style='$cell2'>$postal_address</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Type_of_room</td>
//                    <td style='$cell2'>$type_of_room</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Adults</td>
//                    <td style='$cell2'>$adults</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Children</td>
//                    <td style='$cell2'>$children</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Start_date</td>
//                    <td style='$cell2'>$start_date</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>End_date</td>
//                    <td style='$cell2'>$end_date</td>
//                </tr>"; $admin_body .= "
//                <tr>
//                    <td style='$cell1'>Comments</td>
//                    <td style='$cell2'>$comments</td>
//                </tr>"; $admin_body .= "</table>"; $admin_body .= "
//
//        </html>
//        </body>"; mail($main_company_email, $subject, $admin_body, $headers); //to customer if($email != ""){ } } else{ $msg = "emptyparams"; }
//}
//
?>

</script>
