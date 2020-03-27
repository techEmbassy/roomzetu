<div class="modal animated bounceInDown" id="new-timezone">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-clock"></i> Change Timezone - <small id="property_tz" class="text-disabled"></small></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row form-group">
                    <input id="property_id_tz" type="hidden" />

                    <label class="col-md-3">Select Timeone: </label>

                    <div class="col-md-9">
                        <select class="form-control" id="c-timezone">

                        </select>

                    </div>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="update_timezone()" class="btn btn-primary "><i class="fa fa-check-circle"></i> Update Timezone</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
