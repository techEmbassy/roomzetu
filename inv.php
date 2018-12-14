<div class="modal animated FadeIn" id="preview-invoice">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"><small>Preview</small></h4>
                <button type="button" class="btn btn-primary pull-right mr-4 mt-1 btn-sm" onclick="saveInvoiceToPdf()"><i class="fa fa-file-pdf-o"></i> Export to pdf</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body gray-bg" id="divInv">
                <div class="row p-4">
                    <div class="card p-2 m-auto" style="box-shadow: 0 0 5px rgba(0,0,0,0.2)">
                        <table class="table" id="c-table">

                            <tr>
                                <td>
                                    <p id="p-details">
                                        <b>To: Client's Name</b><br> At Client's Address<br> Client's Contact
                                        <br> Client's Email
                                    </p>

                                </td>
                                <td></td>
                                <td style="width:80px"><img class="img-fluid" id="comp_logo" src="img/logo.png" /></td>
                                <td>
                                    <p id="c-details">

                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <h5 class="text-light"><label id="t-name">Reservation Invoice: </label>&nbsp;&nbsp;
                                        <label id="t-receipt"><b>GL0399</b></label></h5>
                                </td>
                                <td>Issue Date: <label id="t-date"> 3/09/2018</label></td>
                                <td colspan="2" class="text-right">Due Date: <label id="due-date">3/09/2018</label></td>
                                                         <td></td>
                            </tr>
                        </table>
                        <br/>
                        <table class="table table-bordered table-invoice" id="table-inv">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Qty</th>

                                    <th>Unit Price</th>
                                    <th>Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="height:140px;"></td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                </tr>


                            </tbody>
                            <tfoot>
                                <tr>

                                    <td colspan="2"></td>
                                    <td>Sub Total</td>
                                    <td>$8900</td>
                                </tr>
                                <tr>

                                    <td colspan="2"></td>
                                    <td>VAT(12%)</td>
                                    <td>$300</td>
                                </tr>

                                <tr>

                                    <td colspan="2"></td>
                                    <td>Grand Total</td>
                                    <td>$12900</td>
                                </tr>
                            </tfoot>
                        </table>

                        <label><b>NOTES AND PAYMENT TERMS</b> </label>
                        <p id="t-notes"></p>
                        <label><b>HOTEL POLICY</b> </label>
                        <p id="t-h-policy"></p>

                    </div>


                </div>
            </div>


            <div class="c-footer">
                <button type="button" class="btn btn-secondary pull-right btn-sm mr-4 mt-1 " style="" data-dismiss="modal">Cancel</button>

                <button type="button" class="btn btn-primary pull-right mr-4 mt-1 btn-sm" onclick="saveInvoiceToPdf()"><i class="fa fa-file-pdf-o"></i> Export to pdf</button>
            </div>
        </div>

    </div>

</div>