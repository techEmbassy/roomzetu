<style>
    .mail-table td{
        border:none;
    }
    
    .mail-table td .form-control{
        border: 1px solid #eee;
    }
</style>
<div class="modal animated fadeIn" id="mail-template">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"><small><i class="fa fa-file-o"></i> Title: <span contenteditable="true">New Email Template</span></small></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <table class="mail-table table">
                        <tr>
                            <td colspan="4">
                                <b>Subject</b><br/>
                                <input value="" class="form-control" />
                            </td>
                        </tr>
                        <!--
                   <tr>
                    <td colspan="4"><img src="img/logo.png" height="50px"/></td>
                    </tr>
-->
                        <tr>
                            <td colspan="4">
                                <br>
                                <span contenteditable="true">Hello</span> <b>{name}</b>,<br>
                                <textarea rows="5" class="form-control"></textarea>
                            </td>
                        </tr>

<!--
                        <tr>
                            <td><img src="img/acc4.jpg" height="100px" /></td>
                            <td><img src="img/acc4.jpg" height="100px" /></td>
                            <td><img src="img/acc4.jpg" height="100px" /></td>
                            <td><img src="img/acc4.jpg" height="100px" /></td>
                        </tr>
-->

                        <tr>
                            <td style="width:100px"><img src="img/logo.png" width="100px"/></td>
                            <td colspan="4">
                                
                                <b contenteditable>Safari Company LTD</b>,<br>
                                <p>Some adress, building 10, Kampala Uganda.</p>
                                <a href="http//:www.site.com"> www.site.com </a> |
                                <a> 078376772</a>
                                <br>
                                

                            </td>
                        </tr>
                        <tr><td colspan="2">
                            <p style="padding:10px; background-color:#f6ecdf; color:#b9740c;">
                                <small contenteditable="">Thank you. </small>
                            </p>
                            </td></tr>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i> Save Template</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
