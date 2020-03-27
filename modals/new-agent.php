<div class="modal animated bounceInDown" id="new-agent">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-user"></i> New Agent</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="form-new-agent">
                <div class="row form-group">
                    <label class="col-md-3">Name: </label>
                    <div class="col-md-9">
                        <input id="a-name" class="form-control" placeholder="" style="text-transform: capitalize;" required />

                    </div>

                </div>

                <div class="row form-group hide">
                    <label class="col-md-3">Agent Discount: </label>
                    <div class="col-md-9">

                        <div class="input-group">

                            <input class="form-control" onkeypress="return isNumber(event)" value="10" id="a-rate" class="form-control" placeholder="00" type="number" max="100" min="0" required>
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>

                </div>





                <!--
<div class="row form-group">
    <label class="col-md-3">Email: </label>
    <div class="col-md-9">
        <input id="a-email" class="form-control" placeholder="" type="email" data-input='email' data-invalid-message='invalid email' />

    </div>
</div>
-->



                <div class="row form-group">
                    <label class="col-md-3">Email(s)</label>
                    <div class="col-md-9">
                        <input class="form-control" id="a-email" type="text" data-role="tagsinput" value="">
                    </div>
                </div>








                <div class="row form-group">
                    <label class="col-md-3">Phone: </label>
                    <div class="col-md-9">
                        <input id="a-phone" class="form-control" placeholder="" type="number" required />
                    </div>

                </div>
                <!--
<div class="row form-group">

    <label class="col-md-3">Country : </label>

    <div class="col-md-9">
        <select class="form-control" id="a-country">
                        <?php include 'includes/countries.php';?>
                        </select>

    </div>

</div>
-->

                <div class="row form-group">
                    <label class="col-md-3">Address: </label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="" id="a-address" style="text-transform: capitalize;" required />
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button onclick="save_agent();" type="button" class="btn btn-primary savebtn"><i class="fa fa-check-circle"></i> Save Agent</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- tags input js -->
<script src="js/tags-input-js/tagsinput.js"></script>
<link href="js/tags-input-js/tagsinput.css" rel="stylesheet" type="text/css">



<script>
    var company_id = 1;

    function save_agent() {
        //alert("x");

        var name = $('#a-name').val()
        //        var email = $('#a-email').val()
        var phone = $('#a-phone').val()
        var country = $('#a-country').val()
        var address = $('#a-address').val()
        var rate = $('#a-rate').val()

        //        var email = JSON.stringify($("#a-email").val().split(','));
        var email = $("#a-email").val();

        var data = {
            "company_id": company_id,
            "agent_rate": 0, //rate//,
            "name": name,
            "phone": phone,
            "email": email,
            "address": address
        }

        alert(email);

        if (!(inputsEmpty("#form-new-agent"))) {
            $.post("src/save.php", {
                page: "agent_tb",
                result: JSON.stringify(data)
            }, function(response) {
                //alert(response);
                $('#new-agent').modal('hide')

                x0p('New agent saved', 'You have Sucessfully added', 'info', function() {
                    window.location.reload();
                });

            })
        }
    }

</script>
