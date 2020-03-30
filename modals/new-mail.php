<!--
<?php
//   if(isset($_FILES['image'])){
//      $errors= array();
//      $file_name = $_FILES['image']['name'];
//      $file_size = $_FILES['image']['size'];
//      $file_tmp = $_FILES['image']['tmp_name'];
//      $file_type = $_FILES['image']['type'];
//      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
//
//      $expensions= array("jpeg","jpg","png");
//
//      if(in_array($file_ext,$expensions)=== false){
//         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
//      }
//
//      if($file_size > 2097152) {
//         $errors[]='File size must be excately 2 MB';
//      }
//
//      if(empty($errors)==true) {
//         move_uploaded_file($file_tmp,"images/".$file_name);
//         echo "Success";
//      }else{
//         print_r($errors);
//      }
//   }
?>
-->



<div class="modal" id="mail-modal">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-envelope"></i> Send Mail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row form-group">

                        <label class="col-md-3">Send To:<span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <div class="jumbotron p-2 m-0 dropdown advance ">
                                <label id="receipients">
                                    0 receipients
                                </label>
                                <a class="dropdown-toggle pull-right" href="#" data-toggle="dropdown">View all</a>
                                <div class="dropdown-menu" id="reloadmenu">
                                    <div class="attachement-holder p-2 m-0">
                                        <div id="emails_list">

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row form-group">

                        <label class="col-md-3">Template : </label>

                        <div class="col-md-9">
                            <select class="form-control" name="template">
                                <option>Simba</option>
                                <option>Primate</option>
                            </select>

                        </div>

                    </div>

                    <div class="row form-group">

                        <label class="col-md-3">Subject: <span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" placeholder="subject" name="subject" required="required" />
                        </div>

                    </div>
                    <div class="row form-group ">

                        <label class="col-md-3 ">Attachements: </label>
                        <div class="col-md-7">
                            <div class="jumbotron attachement-holder p-1 m-0">
                                <div id="file_div">
                                    <span class='tag'>No files chosen</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                            <!--                            <form action="" method="POST" enctype="multipart/form-data">-->
                            <a class="btn-circle fa fa-paperclip" data-toggle='file' data-target="#attach-file"></a>
                            <input type="file" name="file[]" id="attach-file" class="hide" multiple="multiple" />

                            <!--                            </form>-->
                        </div>

                    </div>

                    <div class="row form-group">

                        <label class="col-md-3">Message: <span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <textarea class="form-control p-3" rows="5" name="message" required="required"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="emailForm"><i class="fa fa-send"></i> Send Mail</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

</div>
<!-- /.modal -->
<script>


</script>
