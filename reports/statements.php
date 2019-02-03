
<style>
    .table th {
        background-color: #f0f0f0
    }

    .table td {
        vertical-align: middle;
    }
    .statement-item :hover{
        background-color:  #999999;
    }

</style> 
<div class="card p-0">
    <div class="header p-2">
        <div class="row">
            <div class="col-md-4">
                Customer Statements
            </div>

            <div class="col-md-8 text-right">
                <input class="form-control tiny" placeholder="search customer" oninput="searchBooking(value)">
                <!-- <label class="ml-0 mr-0">Property: </label>
                <select class="form-control tiny" id="properties">
                                     <?php echo $propertyOptions;?>
                                </select> -->
                
                </div>

            </div>
        </div>
    </div>


    

            <div class="c-body p-0" style="background-color:#fff; border-bottom: 1px solid #eee">
              <table class="table table-bordered table-primary mt-0 table-hover border-bottom-0 p-3" id="agents_tb">
                        <thead>
                            <tr>

                                <th>N0</th>
                                <th>Agent Name</th>
                                <th>Number of bookings</th>
                                <th>Total Cost</th>
                                <th>Total Paid</th>
                                <th>Balance</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" style="border-bottom:0;"><br><span id="agents_tb-pagination" class="pull-right"></span></td>
                            </tr>
                        </tfoot>
                    </table>
            </div>      



    
    <!-- </div> -->
    <div class="c-footer">
        <small class="ml-4 mt-2 mr-2">Credit - Debit Statements for Customers: <label id="footerReport1"></label><label id="footerReport2"></label></small>
        <!--<a class="pull-right mr-4 mt-1" hidden="hidden"><i class="fa fa-print"></i> print report</a>
        <a class="pull-right mr-4 mt-1" id="savepdf_reservation"><i class="fa fa-file-pdf-o"></i> Export report to PDF</a>
        <!--                            <small class="ml-2 mt-2 mr-4 text-blue pull-right">2 Agents selected</small>-->
    </div>
    </div>

</div>


<!-- <script src="js/pages/bookings.js"></script> -->
<?php include 'modals/preview-statement.php'?>
<script>


var bookings = [];
var filter="";

function searchBooking(s) {
    filter = s.toUpperCase();

    $("#agents_tb tbody tr").each(function(i, tr) {

       
       var b_name = $(tr).find("td:eq(1)").html();

        if ( b_name.toUpperCase().indexOf(filter) > -1 ) {
            tr.style.display = "";

        } else {
            tr.style.display = "none";

        }

        
    })


}

getAgents();


function getAgents() {

    var payload = {};


    lazyload();
    $.get("src/get_report_data.php", {

    token: "get_agent_balances"
    }, function (data) {

        hidelazyload();

        // alert(data)
        //alert(bookings);
        setAgents(data);
    })

}




function setAgents(data) {

    var ag = JSON.parse(data);
    var rows = [];
    var row = ''
    $.each(ag, function (i, a) {

    var name = a.name.length > 20? a.name.substring(0, 20) +'...' :a.name ;

       var color= a.balance<=0 ? 'text-green':'text-red' ;
    var k=parseInt(i)+1 ;
        row = "<tr onclick='previewStatement(" + a.id + ")'>";
        row += "<td><b>" + k+ "</b></td>";
        row += "<td><b>" + name + "</b></td>";
        row += "<td><b>" + a.no_bookings + "</b></td>";
        row += "<td class='text-right'>$" + addCommas(a.overall_cost) + "</td>";
        row += "<td class='text-right'>$" + addCommas(a.overall_payment) + "</td>";
        row += "<td class='text-right "+color+"'>$" + addCommas(a.balance) + "</td>";

        row += "</tr>";

        rows.push(row)
    });

        rows = rows == [] ? "<tr><td colspan='8'><h4 class='text-light text-center'>No Agents with Bookings </h4><td></tr>" : rows;


        var tableBody = $("#agents_tb tbody");

        pag(rows, tableBody, '#agents_tb-pagination', 15);

        //        $("#tb-reservations tbody").html(row)
        fixTableHead(".table-primary");

   
}


</script>



<script>
    



    //happens when a property is selected
    $("#properties").on('change', function() {

        var propertyId = $("#properties option:selected").val();
        //alert(propertyId);
        getAgents();



    });

   
   



   
   

</script>
