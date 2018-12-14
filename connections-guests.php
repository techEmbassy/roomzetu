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

    .table-primary td {

        padding: 8px 10px !important;
        vertical-align: middle !important;
        font-size: 9pt;
    }

</style>



<body class="gray">
    <?php  $mpos = 5; include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2 pr-0">

                    <p><small>Manage connections, agents and previous guests</small> </p>
                    <hr/>
                    <div class="sub-menu ">
                        <?php $sbPos = 2; include 'includes/connections-menu.php'; ?>
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
                                    Guests List
                                </div>


                                <div class="col-md-9 text-right">
                                    <input class="form-control tiny" placeholder="search" oninput="searchGuest(value)" />
                                    <!--                                    <a class="btn btn-secondary btn-sm" data-target="#new-agent" data-toggle="modal"><i class="fa fa-plus"></i> New Agent</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="c-body p-0 " id="dvContainer">
                            <!--                           <table class="table table-bordered table-dark mt-0 table-conn table-primary table-hover border-bottom-0" id="guests-tb">-->

                            <table class=" table table-primary table-conn table-bordered mt-0 table-hover border-bottom-0" width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px;" id="guests-tb">
                                <thead class="">
                                    <tr>
                                        <th style=" width:5px"></th>

                                        <th>Name/Company Name<i class="fa fa-angle-down"></i> </th>

                                        <th>Email</th>
                                        <th>Phone</th>
                                        <!-- <th>Country</th> -->
                                        <th>Year of birth</th>
                                        <!--                                        <th>Reservations</th>-->


                                        <!--                                        <th style=" width:50px">Delete</th>-->
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" style="border-bottom:0;"><br><span id="guests-pagination" class="pull-right"></span></td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                        <div class="c-footer">
                            <small class="ml-4 mt-2 mr-2" id="numb">0 Agents</small> <input type="checkbox" id="select-all" /> <label for="select-all">select all</label>

                            <a class="pull-right mr-4 mt-1" onclick="btnPrint()"><i class="fa fa-print"></i> print list</a>
                            <a class="pull-right mr-4 mt-1" data-toggle="modal" data-target="#mail-modal" onclick="loadMailList()"><i class="fa fa-envelope"></i> Copy mailList</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>



<?php //include 'modals/new-mail.php'?>
<?php //include 'modals/new-agent.php'?>
<?php include 'includes/footer.php'?>


<script>
    var data;
    name_guest = [];
    email_guest = [];
    phone_guest = [];
    yob_guest = [];
    $(function() {

        get_guests();


    });

    function get_guests() {


        $.get("src/get.php", {
            "table": "guests_tb",
            "reference": "1",
            "col_name": "company_id",
            token: "get_all_rows"
        }, function(response) {
            //alert(response);
            data = response;
            setGuests(data);
            //  setBranches(data);
            // data = JSON.<p>You can use the mark tag to <mark>highlight</mark> text.</p>
            //arse(response);
            // alert(data.company_name)
        });

    }
    //    var d = '[{"name":"John Doe", "email":"jd@gmail.com","phone":"039292888","country":"Ugnanda","address":"kampala","id":"4", "reservations":9}]';

    //setAgents(d);

    function setGuests(data) {
        var datau = JSON.parse(data);
        var rows = [];

        var table = $("#guests-tb");
        var tableBody = table.find('tbody');

        $.each(datau, function(i, item) {

            var an = item.name;
            var ae = item.email;
            var ap = item.phone;
            // var ac = item.country;
            var ayob = item.year_of_birth;
            var aid = item.booking_id;
            var arz = item.reservations;



            var row = "<tr onclick='showDetails(\"" + aid + "\")'>" +
                "<th><input type='checkbox' class='checkSingle' /></th>" +
                "<td>" + an + "</td>" +
                "<td>" + ae + "</td>" +
                "<td>" + ap + "</td>" +
                //                "<td>" + ac + "</td>" +
                "<td>" + ayob + "</td>" +
                //                "<td><a href='' onclick='showReservations(\"" + aid + "\")'>view (" + aid + ")</a></td>" +
                //                "<td class='text-center br-0'><a class='fa fa-close btn-circle' title='Delete " + an + "' onclick='delete_guest(\"" + aid + "\", \"" + an + "\")'></a></td>" +
                //                "</td>" +
                "</tr>";


            rows.push(row);

        })

        //        tableBody.html(row);
        pag(rows, tableBody, '#guests-pagination', 20);

        if (rows.length < 1) {
            tableBody.html("<tr><td colspan='9' style='background-color:#fff'><p class='text-muted p-5'>No Guest To Show.<br><small>All Guests that make reservations will appear here.</small></p></td></tr>");
        }

    }

    function delete_guest(id, name) {
        alertify.confirm("Delete " + name, "Are you sure you want to delete this Guest?", function() {
            $.post("src/delete.php", {
                "reference": "guest_id",
                "token": "guests_tb",
                "data": id
            }, function(response) {
                if (response == "success") {
                    window.location.reload();
                    alertify.success(name + ' Deleted');
                } else {
                    alertify.error(response);
                }
            })
        }, function() {
            alertify.error('Cancelled');
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
        $("#numb").text(checkedboxes + " Guests selected");
        get_email_address();
    });

    function get_email_address() {
        name_guest = [];
        email_guest = [];
        phone_guest = [];
        yob_guest = [];
        var tableControl = document.getElementById('agents-tb');
        $('.checkSingle:checked', tableControl).each(function() {
            name_guest.push($(this).closest('tr').find('td:eq(0)').text());
            email_guest.push($(this).closest('tr').find('td:eq(1)').text());
            phone_guest.push($(this).closest('tr').find('td:eq(2)').text());
            yob_guest.push($(this).closest('tr').find('td:eq(3)').text());
        }).get();
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

    function loadMailList() {
        if (email_guest.length == 0) {
            alert('select atleast one reciepient')

        } else {
            // Create a dummy input to copy the string array inside it
            var dummy = document.createElement("input");
            // Add it to the document
            document.body.appendChild(dummy);
            // Set its ID
            dummy.setAttribute("id", "dummy_id");
            // Output the array into it  
            document.getElementById("dummy_id").value = email_guest.join('; ');
            // Select it
            dummy.select();
            // Copy its contents
            document.execCommand("copy");
            // Remove it as its not needed anymore
            document.body.removeChild(dummy);

            alert('Email list has been copied to clipboard')
        }
    }


    function btnPrint() {

        if (email_guest.length == 0) {
            alert('select atleast one reciepient')
        } else {
            //        var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('</head><body > <center><h2>Guest List</h2></center>');
            printWindow.document.write('DATE: <?php echo date("d-m-Y")?>');
            printWindow.document.write('</br></br>COMPANY NAME:');
            printWindow.document.write('</br></br></br><table style=" text-align:center" ><thead ><tr>');
            printWindow.document.write('<th style=" width:50px"">N0</th><th style=" width:100px">NAME</th><th style=" width:200px">EMAIL</th><th style=" width:200px">PHONE</th><th style=" width:100px">YOB</th></tr></thead>');

            printWindow.document.write('<tbody>');

            for (var i = 0; i <= name_guest.length - 1; i++) {
                printWindow.document.write('<tr><td>');
                printWindow.document.write(i + 1);
                printWindow.document.write('</td><td>');
                printWindow.document.write(name_guest[i]);
                printWindow.document.write('</td><td>');


                printWindow.document.write(email_guest[i]);
                printWindow.document.write('</td><td>');
                printWindow.document.write(phone_guest[i]);
                printWindow.document.write('</td><td>');
                printWindow.document.write(yob_guest[i]);
                printWindow.document.write('</td></tr>');
            }

            printWindow.document.write('</tbody></table>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    }

    function searchGuest(s) {
        var filter = s.toUpperCase();

        $("#guests-tb tbody tr").each(function(i, tr) {

            var b_ref = $(tr).find("td:eq(0)").html();
            if (b_ref.toUpperCase().indexOf(filter) > -1) {
                tr.style.display = "";

            } else {
                tr.style.display = "none";

            }
        })


    }

</script>
