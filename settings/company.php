<style>
    .form-control {
        border-radius: 3px !important;
    }

    .form-control {
        background-color: #fff;

        border: 1px solid #EBF5FB;
    }

</style>

<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Account Details
            </div>
            <div class="col-md-9 text-right">
                <!--                                    <select class="form-control tiny"><option>Primary Branch</option></select>-->
                <a id="update_company" class="btn btn-secondary btn-sm animated bounceIn" href="" data-target="#new-px" data-toggle="modal"><i class="fa fa-check-circle"></i> Update Company Details</a>
            </div>
        </div>
    </div>
    <div class="c-body mt-0">
        <!--        <h5 class="pl-3"> Company Info</h5>  -->

        <div class="container-fluid" style="background-color:rgb(249, 251, 253);">

            <!--            <a class="element-white" data-target="#company-details" data-toggle="modal">Check</a>-->

            <div class="row" id="form-company">


                <div class="col-md-6 p-4" style="border-right:1px solid #F2F4F4">
                    <div class="card p-4 border-0">

                        <!--                    <div class="card p-3" style="background-color:rgb(249, 251, 253);">-->
                        <div class="form-group m-0">
                            <label for="">Company Name</label>
                            <input type="" class="form-control" style="text-transform: capitalize;" id="c-name" required>
                        </div>

                        <div class="col-md-12 p-0">
                            <div class="row">
                                <div class="form-group col-md-6 m-0">
                                    <label class="">Country</label>
                                    <div class="">
                                        <select class="form-control" id="c-country"></select>
                                    </div>
                                </div>


                                <div class="form-group col-md-6 m-0">
                                    <label class="">City</label>
                                    <div class="">
                                        <input class="form-control" id="c-city" style="text-transform: capitalize;" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 p-0">
                            <div class="row">
                                <div class="form-group col-md-6 m-0">
                                    <label class="">Email Address</label>
                                    <div class="">
                                        <input class="form-control" id="c-email" type="email" data-input='email' data-invalid-message='invalid email' required/>
                                    </div>
                                </div>


                                <div class="form-group col-md-6 m-0">
                                    <label class="">Phone Number</label>
                                    <div class="">
                                        <input class="form-control" id="c-phone" onkeypress="return isNumber(event)" maxlength="15" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-0">
                            <label for="">Address</label>
                            <input class="form-control" id="c-address" style="text-transform: capitalize;" required/>
                        </div>


                        <div class="col-md-12 p-0">
                            <div class="row">
                                <div class="form-group col-md-6 m-0">
                                    <label class="">VAT Number</label>
                                    <div class="">
                                        <input class="form-control tiny tiny-fluid" id="c-vat" />
                                    </div>
                                </div>


                                <div class="form-group col-md-6 m-0">
                                    <label class="">Website</label>
                                    <div class="">
                                        <input class="form-control tiny tiny-fluid" id="c-website" />
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row mt-2">
                            <label class="col-md-3">Logo</label>
                            <div class="col-md-9">
                                <img src="" width="85px" id="c-img-logo" />
                                <a class="btn btn-secondary btn-sm" data-toggle="file" data-target="#logo"><i class="fa fa-camera"></i> Change logo</a>
                                <input name="c-logo" type="file" id="logo" class="hide" accept="images/*" />
                            </div>
                        </div>


                    </div>
                    <!--                </div>-->


                </div>


                <div class="col-md-6">




                    <!-- Card -->
                    <div class="card bg-light border p-3 mt-3">
                        <div class="card-body">

                            <p class="mb-2">
                                Billing Information
                            </p>



                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h6 class="card-title text-uppercase text-muted mb-2" style="font-size:12px">
                                                Current Plan
                                            </h6>
                                            <!-- Heading -->
                                            <span class="h6 mb-0" style="font-size:20px"><?php echo $currentBillingPlan; ?></span>

                                        </div>

                                        <div class="col-auto">

                                            <!-- Icon -->
                                            <a class="mr-3 text-success" style="font-weight:100"><span class="h2 fa fa-check mb-0 "></span><small>Active</small></a>

                                        </div>

                                    </div>
                                    <!-- / .row -->

                                </div>
                            </div>


                            <p class="" style="font-size:50px; color:green; font-weight:100">
                                <?php echo $days_left; ?> <span class="" style="font-size:14px;">Days Remaining</span></p>

                            <!--                            <br>-->

                            <p style="color:#A93226; font-size:14px;">Plan Expires on
                                <span style="font-weight:700"><?php echo $expiry_date; ?></span>
                            </p>

                        </div>
                    </div>

                    <a class="element-white mt-3" onclick="window.location='site/billing.php'"> Change Billing Plan</a>
                    <a class="element-white mt-3" onclick="window.location='site/billing.php'"> Top Up</a>


                </div>

            </div>




            <!--
<div class="modal" id="company-details">
    <div class="modal-dialog">

        <div class="modal-content p-2">
            <div class="modal-title">
                <h6>Update Company Details</h6>
            </div>

            <div class="modal-body">







            </div>

            <div class="modal-footer">

                <a class="element-white">Update </a>
                <a class="element-white">Cancel </a>

            </div>

        </div>

    </div>
-->


            <!--        </div>-->







        </div>
    </div>
    <div class="c-footer pl-4 text-right">
        <?php echo $timeLeftFooter; ?>
    </div>


</div>

<div class="modal animated bounceInDown" id="site-booking">
    <div class="modal-dialog modal-lg">

        <div class="modal-body">






        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $('a.btn').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="true" allowtransparency="true" src="' + url + '"></iframe>');
    });
    var new_logo;
    var upload_error;
    var company_id = 1; //get from session during production

    document.getElementById('logo').onchange = function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById('c-img-logo').src = fr.result;
                uploadedFile = fr.result;
                new_logo = $('#logo').val();
                console.log(new_logo);

                $("input[name=c-logo]").upload("src/xhr.php", {
                        action: "upload_logo"
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


    var data;
    $(function() {
        getCountries();






    });

    ////

    function getCountries() {


        $.ajax({
            type: "POST",
            url: "data/static_set.php",
            data: {
                token: "get_countries"
            },
            success: function(data) {

                $('#c-country').html('<option value="">Select Country</option>' + data);

                getCompanyInfo();
                //console.log(items);
            }
        });
    }


    function getTimeZones() {


        $.ajax({
            type: "POST",
            url: "data/static_set.php",
            data: {
                token: "get_time_zones"
            },
            success: function(data) {

                $('#c-timezone').html('<option value="">Select Timezone</option>' + data);
                //console.log(items);
            }
        });



    }




    ////





    function getCompanyInfo() {

        $.get("src/get.php", {
            token: "get_company_info"
        }, function(response) {
            //alert(response);
            data = response;
            setCompanyInfo(data);
            // data = JSON.parse(response);
            // alert(data.company_name)
        });

    }


    // data = '[{"name":"Lacel Technologies", "country": "Uganda", "city":"kampala", "address":"tirupati mazima mall", "vat":"9039029","phone": "09300200", "email": "info@laceltech.com", "website":"www.laceltech.com", "bank":"Diamond Trust", "bank_account":"93902883900","logo":"logo.png"}]';


    function setCompanyInfo(d) {

        //  alert(d)
        company = JSON.parse(d);

        var imgfolder = "img/settings/";
        // alert(company.name)
        $("#c-name").val(company.company_name);
        $("#c-country").val(company.country);
        $("#c-address").val(company.address);
        $("#c-city").val(company.city);
        $("#c-vat").val(company.vat_no);
        $("#c-phone").val(company.phone);
        $("#c-email").val(company.email);
        $("#c-website").val(company.website);
        $("#c-bank").val(company.bank);
        $("#c-account").val(company.bank_account);
        $("#c-img-logo").attr("src", imgfolder + company.logo);



    }

    $('#update_company').click(function() {

        var name = $('#c-name').val();
        var country = $('#c-country').val();
        var address = $('#c-address').val();
        var city = $('#c-city').val();
        var vat = $('#c-vat').val();
        var phone = $('#c-phone').val();
        var email = $('#c-email').val();
        var website = $('#c-website').val();
        var bank = $('#c-bank').val();
        var account = $('#c-account').val();


        var data = {
            "company_name": name,
            "logo": new_logo,
            "phone": phone,
            "email": email,
            "website": website,
            "country": country,
            "address": address,
            "city": city,
            "vat_no": vat,
            "bank": bank,
            "bank_account": account
        }


        if (!(inputsEmpty("#form-company"))) {

            $.post("src/update.php", {
                page: "company",
                result: JSON.stringify(data)
            }, function(response) {
                // alert(response);
                alertify
                    .success("Company Information Updated Successfully");
                getCompanyInfo();

            })
        }
    })

</script>
