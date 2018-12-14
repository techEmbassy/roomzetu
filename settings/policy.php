<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Hotel Policy
            </div>


        </div>
    </div>
    <div class="c-body p-3">
        <p class="text-disabled mb-3">Hotel policy on payment refund and reservation cancellation</p>
        <textarea rows="10" class="form-control mb-3" id="plcy_txt"></textarea>

        <br>
        <label class="ml-2 mr-4">Holding period: </label>
        <input class="form-control tiny" type="number" id="id-hr" />


        <label class="ml-2 mr-2">Days </label>
        <a id="save-plcy" class="btn btn-primary btn-sm pull-right"><i class="fa fa-check-circle"></i> Save</a>
    </div>
    <div class="c-footer pl-4 text-right">
        <?php echo $timeLeftFooter; ?>
    </div>


</div>
