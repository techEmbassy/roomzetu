<div class="modal" id="new-user">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content animated zoomIn">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-user"></i> New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="form-new-user">
                <div class="row form-group">
                    <label class="col-md-3">Name: </label>
                    <div class="col-md-9">
                        <input id="name" class="form-control" placeholder="" style="text-transform: capitalize;" required />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Email: </label>
                    <div class="col-md-9">
                        <input id="email" class="form-control" placeholder="" type="email" data-input='email' data-invalid-message='invalid email' required />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Phone: </label>
                    <div class="col-md-9">
                        <input id="phone" class="form-control" placeholder="" type="number" required />
                    </div>

                </div>
                <div class="row form-group">

                    <label class="col-md-3">Role: </label>

                    <div class="col-md-9">
                        <select id="role" class="form-control">
                            <?php echo $roleOptions; ?>
                        </select>

                    </div>

                </div>
                <div class="row form-group">

                    <label class="col-md-3">Property : </label>

                    <div class="col-md-9">
                        <select id="property" class="form-control">
                            <?php echo $propertyOptions; ?>
                        </select>

                    </div>

                </div>


                <!--
                <div class="row form-group">
                    <label class="col-md-3">Address: </label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="" />
                    </div>

                </div>
-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="save_user()" class="btn btn-primary savebtn"><i class="zmdi zmdi-check-circle"></i> Save User</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>


</script>
