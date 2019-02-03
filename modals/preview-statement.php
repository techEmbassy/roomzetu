<style>
    .table-invoice tfoot tr td:first-child {
        border: solid 0px !important
    }

    .table-invoice thead tr th {
        border-color: #444;
    }

    .table-invoice {
        border: none
    }


    #invoice-template {
        padding: 4rem;
    }

    .modal-full {
        min-width: 100%;
        margin: 0;
    }

    .modal-full .modal-header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 3;
        background: #fff;
        border-bottom:1px solid #aaa;
        box-shadow:0 0 20px rgba(0,0,0,0.4)

    }

    .modal-full .modal-body {
        background: #eee;
        height: 100vh;
        overflow-y: auto;
        padding-top: 80px;
        padding-bottom: 60px;
    }

    .paper {
        max-width: 1029px;
        margin: auto;
    }

</style>

<div class="modal animated zoomIn full-screen" tabindex="-1" role="dialog" id="preview-statement">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agent Statement</h5>
                <!--                <a href="dompdf/export_pdf.php" target="_blank" class="btn btn-primary"><i class="fa fa-file-pdf-o mr-2"></i>Export PDF </a>-->

                <div class="btn-group">
                    <a type="button" class="btn btn-sm btn-outline-warning export-invoice-pdf" target="_blank" href=""><i class="fa fa-file-pdf-o"></i> Export to PDF</a>
                    <a type="button" class="btn btn-sm btn-outline-warning export-invoice-pdf" target="_blank">Print Statement</a>
                </div>
                <button type="button" class="close px-3" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">

                <section class="card paper statement-prev">
                    <?php 
                    //$preview = 1;
                    //include 'includes/invoice.php'; echo $html;
                    ?>
                </section>
            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="printInvoice()"> <i class="fa fa-print"></i> Print</button>
                <button type="button" class="btn btn-primary" onclick="saveInvoiceToPdf()"><i class="fa fa-file-pdf-o"></i> Export to PDF</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
-->
        </div>
    </div>
</div>







<script>
    //getCompanyInfo();
//
//    function saveInvoiceToPdf() {
//
//        var printContents = document.getElementById('divInv').innerHTML;
//        var originalContents = document.body.innerHTML;
//
//        document.body.innerHTML = printContents;
//
//        window.print();
//
//        document.body.innerHTML = originalContents;
//
//        location.reload(true);
//
//
//
//    }
    
    
//    $("#preview-invoice").on("show.bs.modal", function(){
//        preview
//    })
    function previewStatement(agent_id){
        $('.statement-prev').html(loaderBig);
        $("#preview-statement").modal('show');
      $.post("includes/statement.php", {agent_id:agent_id}, function(data){
          $('.statement-prev').html(data);          
          $('.export-invoice-pdf').prop('href', "invoice/"+agent_id);
      })
    }


    function printInvoice() {

        var printContents = document.getElementById('divInv').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

        location.reload(true);



    }

    
</script>
