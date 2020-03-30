<div class="modal " id="new-property">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content animated zoomIn">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-plus"></i> New Property</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="form-new-property">
                <div class="row form-group">
                    <label class="col-md-3">Name: </label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="" id="p-name" style="text-transform: capitalize;" required />
                        <input id="p-name" type="hidden" placeholder="" id="p-id" style="text-transform: capitalize;" />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Email: </label>
                    <div class="col-md-9">
                        <input id="p-email" class="form-control" placeholder="" id="p-email" type="email" data-input='email' data-invalid-message='invalid email' required />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Phone: </label>
                    <div class="col-md-9">
                        <input id="p-phone" class="form-control" placeholder="" type="number" />
                    </div>

                </div>
                <div class="row form-group">
                    <label class="col-md-3">Address: </label>
                    <div class="col-md-9">
                        <input id="p-address" class="form-control" placeholder="" id="p-address" style="text-transform: capitalize;" />
                    </div>

                </div>
                <div class="row form-group">

                    <label class="col-md-3">Country : </label>

                    <div class="col-md-9">
                        <select class="form-control" id="p-country" required>
                            <!--<option value="">Select</option>
                         <option id="ug">Uganda</option>
                         <option id="ky">Kenya</option>
                         <option id="tz">Tanzania</option>-->
                        </select>

                    </div>

                </div>
                <div class="row form-group">

                    <label class="col-md-3">Manager : </label>

                    <div class="col-md-9">
                        <select class="form-control" id="p-manager">

                        </select>

                    </div>

                </div>


                <div class="row mt-2">
                    <label class="col-md-3">Logo</label>
                    <div class="col-md-9">
                        <img src="" width="85px" id="p-img-logo">
                        <a class="btn btn-secondary btn-sm ml-5" data-toggle="file" data-target="#plogo"><i class="fa fa-camera"></i> Change logo</a>
                        <input name="p-logo" type="file" id="plogo" class="hide" accept="images/*" />
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button onclick="save_property();" type="button" class="btn btn-primary savebtn"><i class="fa fa-check-circle"></i> Save Property</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal" id="edit-property">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated zoomIn">
            <div class="modal-header">

                <h4 class="modal-title"><i class="fa fa-plus"></i> Edit Property</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="form-edit-property">
                <div class="row form-group">
                    <label class="col-md-3">Name: </label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="" id="p-name-e" style="text-transform: capitalize;" required />
                        <input type="hidden" placeholder="" id="p-id-e" style="text-transform: capitalize;" />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Email: </label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="" id="p-email-e" type="email" data-input='email' data-invalid-message='invalid email' required />
                    </div>

                </div>

                <div class="row form-group">
                    <label class="col-md-3">Phone: </label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="" id="p-phone-e" type="number" />
                    </div>

                </div>
                <div class="row form-group">
                    <label class="col-md-3">Address: </label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="" id="p-address-e" style="text-transform: capitalize;" />
                    </div>

                </div>
                <div class="row form-group">

                    <label class="col-md-3">Country : </label>

                    <div class="col-md-9">
                        <select class="form-control" id="p-country-e">
                            <!--<option value="">Select</option>
                         <option id="ug">Uganda</option>
                         <option id="ky">Kenya</option>
                         <option id="tz">Tanzania</option>-->
                        </select>

                    </div>

                </div>
                <div class="row form-group">

                    <label class="col-md-3">Manager : </label>

                    <div class="col-md-9">
                        <select class="form-control" id="p-manager-e">

                        </select>

                    </div>

                </div>

                <div class="row mt-2">
                    <label class="col-md-3">Logo</label>
                    <div class="col-md-9">
                        <img src="" width="85px" id="p-img-logo-e">
                        <a class="btn btn-secondary btn-sm ml-5" data-toggle="file" data-target="#plogo-e"><i class="fa fa-camera"></i> Change logo</a>
                        <input name="p-logo-e" type="file" id="plogo-e" class="hide" accept="images/*" />
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button onclick="update_property()" type="button" class="btn btn-primary savebtn"><i class="fa fa-check-circle"></i> Edit Property</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    var company_id = 1; //get from session during production
    var new_logo;


    document.getElementById('plogo').onchange = function(evt) {

        // alert()
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById('p-img-logo').src = fr.result;
                uploadedFile = fr.result;
                new_logo = $('#plogo').val();
                console.log(new_logo);

                $("input[name=p-logo]").upload("src/xhr.php", {
                        action: "upload_plogo"
                    },
                    function(response) {
                        // location.reload();

                        if (response != "failed") {
                            new_logo = response;
                            console.log(new_logo);
                        } else {
                            upload_error = 1;
                        }
                        // alert(response);
                    },
                    function(progress, value) {
                        // $("#response").text("Saving " + value + "%");
                    });
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    }
    var edited_logo = "";
    document.getElementById('plogo-e').onchange = function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById('p-img-logo-e').src = fr.result;
                uploadedFile = fr.result;
                edited_logo = $('#plogo-e').val();
                console.log(edited_logo);

                $("input[name=p-logo-e]").upload("src/xhr.php", {
                        action: "upload_plogo_e"
                    },
                    function(response) {
                        // location.reload();

                        if (response != "failed") {
                            edited_logo = response;
                            console.log(edited_logo);
                            // alert(edited_logo)
                        } else {
                            upload_error = 1;
                        }
                        // alert(response);
                    },
                    function(progress, value) {
                        // $("#response").text("Saving " + value + "%");
                    });
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    }

    function save_property() {

        if (!(inputsEmpty("#form-new-property"))) {
            $('#new-property').modal('hide')

            var name = $('#p-name').val()
            var email = $('#p-email').val()
            var phone = $('#p-phone').val()
            var country = $('#p-country option:selected').text()
            var address = $('#p-address').val()
            var manager_id = $('#p-manager').val();

            var data = {
                "property_name": name,
                "phone": phone,
                "email": email,
                "country": country,
                "address": address,
                "manager_id": manager_id,
                "property_image": new_logo
            }


            $.post("src/save.php", {
                "page": "properties-add",
                result: JSON.stringify(data)
            }, function(response) {
                // alert(response);
                alertify
                    .alert("New Property Created", name + " property has been created succesfully", function() {
                        // alertify.message('OK');
                        window.location.reload();
                    });

            })





        }
    }

    function update_property() {

        if (!(inputsEmpty("#form-edit-property"))) {
            $('#edit-property').modal('hide')

            var name = $('#p-name-e').val()
            var email = $('#p-email-e').val()
            var phone = $('#p-phone-e').val()
            var country = $('#p-country-e option:selected').text()
            var address = $('#p-address-e').val()
            var manager_id = parseInt($('#p-manager-e').val())

            var property_id = parseInt($("#p-id-e").val());
            // alert(property_id);
            var data;
            if (edited_logo != "") {



                data = {
                    "property_name": name,
                    "phone": phone,
                    "email": email,
                    "country": country,
                    "address": address,
                    "manager_id": manager_id,
                    "property_image": edited_logo
                }


            } else {

                data = {
                    "property_name": name,
                    "phone": phone,
                    "email": email,
                    "country": country,
                    "address": address,
                    "manager_id": manager_id
                }
            }
            //alert(JSON.stringify(data));


            $.post("src/update.php", {
                page: "new-property",
                reference: property_id,
                "col_name": "id",
                result: JSON.stringify(data)
            }, function(response) {
                // alert(response);
                alertify
                    .alert("Property Updated", name + " Property Details updated Succesfully", function() {
                        // alertify.message('OK');
                        window.location.reload();
                    });

            })

        }

    }

</script>
