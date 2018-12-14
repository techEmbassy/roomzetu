<!-- <div class="l-holder"></div> -->



<!--<script src="js/bootstrap.js"></script>-->
<script src="js/wow.min.js"></script>
<script src="js/w3data.js"></script>
<script src="js/less.js"></script>
<script src="js/ajax-upload.js"></script>
<script src="js/loader.js"></script>
<!--<script src="js/bootstrap-tour-standalone.js"></script>-->



<!-- <script src="js/script.js"></script> -->




<script src="datepicker/js/bootstrap-datepicker.js"></script>

<script>

   getroomAllocationSettings();

   function toggleRoomAlloction(){
        
         if($("#someSwitchOptionSuccess_").is(":checked")){

             changeRoomAlloction('automatic');
         }else{

            changeRoomAlloction('manual');
         }
    }

     function getroomAllocationSettings() {

        $.get("src/get.php", {
            token: "get_company_info"
        }, function(data) {
            var result = JSON.parse(data)
            result = result.room_allocation;

            if (result == 'manual') {
                $('#allocation_settings').html('<a  style="font-size:12px;">Automatic Room Allocation (OFF)</a> ' );
                $("#someSwitchOptionSuccess_").prop("checked",false);
            } else {
                $('#allocation_settings').html('<a  style="font-size:12px;">Automatic Room Allocation (ON)</a> ' );
                $("#someSwitchOptionSuccess_").prop("checked",true);
            }

        });

    }


 function changeRoomAlloction(alloc) {


        var data = {
            "room_allocation": alloc

        }

        $.post("src/update.php", {
            page: "company",
            result: JSON.stringify(data)
        }, function(response) {
            //            alert(response);

            alertify
                .success("Room Allocation setting Updated Successfully");
            getroomAllocationSettings()

        })


    }

    var role = "<?php echo $role; ?>";
    $(function() {
        $(".chosen").chosen();
        $('[data-toggle="popover"]').popover();
//        var bwidth = $("body").width();
//        $("body").css({
//            width: bwidth
//        });
    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip();

    });


    startDatePicker();

    function login() {
        $(".line").toggleClass("hide");
    }


    $(document).on("click", "[data-toggle=file]", function() {
        var target = $($(this).attr("data-target"));
       // alert(target.length)
        target.click();
        exit;
    });


    function startDatePicker() {
        $('.datepicker').datepicker({
            autoclose: true,
            // format: 'dd-mm-yyyy',
            format: 'mm/dd/yyyy',
            delimeter:'-'
        });
    }

    updateOnline()
    setInterval(function() {
        /// call your function here
        updateOnline();

    }, 240000);

    function updateOnline() {
        $.post("src/update.php", {
            page: "update_online_status"

        }, function(response) {
            //            alert(response)
        })
    }

</script>
<script>
    function pag(rows, table, pnation, num) {

        var container = table;

        var options = {
            dataSource: rows,
            pageSize: num,
            autoHidePrevious: true,
            autoHideNext: true,
            callback: function(response, pagination) {
                window.console && console.log(response, pagination);
                var dataHtml = '';
                $.each(response, function(index, item) {
                    dataHtml += item;
                });

                //                var dataHtml = sources;
                container.html(dataHtml);

            }
        };
        //$.pagination(container, options);
        container.addHook('beforeInit', function() {
            window.console && console.log('beforeInit...');
        });
        $(pnation).pagination(options);
        container.addHook('beforePageOnClick', function() {
            window.console && console.log('beforePageOnClick...');
            //return false
        });
    }

</script>           




<!-- function to add commas to numbers -->

<script>
function addCommas(nStr){
 nStr += '';
 var x = nStr.split('.');
 var x1 = x[0];
 var x2 = x.length > 1 ? '.' + x[1] : '';
 var rgx = /(\d+)(\d{3})/;
 while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
 }
 return x1 + x2;
}

</script>


<!-- function to add commas to numbers ends here -->

<script>

    function openModal(mod){
   setIsNewBooking(true)
    $('#choose-booking').modal("hide");
    $(mod).modal("show");
}

    var _isNewBooking=true;
function setIsNewBooking(c){
    _isNewBooking=c;
 
    // alertify.confirm("Booking Type " , "Select the type of booking", function() {
    //     $("#new-booking").modal("show"); //data-t_id
    //     }, function() {
    //         $("#new-walk-in").modal("show");
    //     }).set('labels',
    //     {ok:'Direct or Agent',cancel:'Walk In'});

}

function isNewBooking(){
    return _isNewBooking;
}

 
</script>

