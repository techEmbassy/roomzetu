<div class="modal animated bounceInDown" id="new-extra">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-cube"></i> New Service/Extra</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="form-new-extra">
                <div class="row form-group">
                    <label class="col-md-3">Name: </label>
                    <div class="col-md-9">
                        <input id="e-name" class="form-control" placeholder="" style="text-transform: capitalize;" required />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Description: </label>
                    <div class="col-md-9">
                        <input id="e-description" class="form-control" placeholder="" style="text-transform: capitalize;" required>
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Price Per Guest: </label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="e-amount" class="form-control" placeholder="" type="number">
                            <span class="input-group-addon">$</span>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button onclick="save_extra();" type="button" class="btn btn-primary savebtn"><i class="fa fa-check-circle"></i> Save Extra</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    //var company_id = 1;
    //var property_id = 1;

    function save_extra() {

        if (!(inputsEmpty("#form-new-extra"))) {
            $('#new-extra').modal('hide')

            var name = $('#e-name').val()
            var description = $('#e-description').val()
            var amount = $('#e-amount').val()


            var data = {
                "name": name,
                "description": description,
                "price": amount
            }


            $.post("src/save.php", {
                page: "extras",
                result: JSON.stringify(data)
            }, function(response) {
                // alert(response);
                getCompanyExtras();
                alertify
                    .success(name + " added succesfully", function() {
                        // alertify.message('OK');
                        //  window.location.reload();
                    });

            })





        }
    }

    function update_extra(id) {
        //  alert(id);

        if (!(inputsEmpty("#form-new-extra"))) {
            $('#new-extra').modal('hide')

            var name = $('#e-name').val()
            var description = $('#e-description').val()
            var amount = $('#e-amount').val()


            var data = {
                "name": name,
                "description": description,
                "price": amount
            }


            $.post("src/update.php", {
                page: "extras",
                "reference": id,
                result: JSON.stringify(data)
            }, function(response) {
                //alert(response);
                getCompanyExtras();
                alertify
                    .success(name + " Edited Succesfully", function() {


                        // alertify.message('OK');
                        //window.location.reload();
                    });

            })

        }

    }

</script>
