<div class="modal " id="change-currency">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content animated fadeIn ">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-money"></i> Change Currency </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="row form-group">
                    <label class="col-md-3">Currency: </label>
                    <div class="col-md-9">
                        <input id="c-name-e" class="form-control" placeholder="" />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Symbol: </label>
                    <div class="col-md-9">
                        <input id="c-symbol-e" class="form-control" placeholder="" />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">ISO: </label>
                    <div class="col-md-9">
                        <input id="c-iso-e" class="form-control" placeholder="" />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Rate:
                        <a class="fa fa-question-circle" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"></a></label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="c-rate-e" class="form-control" placeholder="" />
                            <span class="input-group-addon"> = 1 US Dollar</span>
                        </div>
                    </div>

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary savebtn"><i class="zmdi zmdi-check-circle"></i> Save Changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
