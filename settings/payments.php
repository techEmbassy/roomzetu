<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Invoicing

            </div>
            <div class="col-md-9">
                <a title="preview" class="btn btn-sm btn-secondary pull-right mb-1" onclick="previewInvoice(0)">
                        <i class="fa fa-eye"></i> preview sample
                    </a>
                <a title="save" class="btn btn-sm btn-primary pull-right mr-2 " onclick="saveInvoince()">
                    <i class="fa fa-check-circle"></i> save changes
                </a>
            </div>

        </div>
    </div>
    <div class="c-body p-3" id="tt">


        <div class="row">


            <div class="col-md-12">

                <div class="row">



                    <div class="col-md-6">
                        <label class="h6" style="color: #154360">Invoice Details </label>
                        <div class="row mb-2">
                            <label class="col-md-3">Title</label>
                            <div class="col-md-7">
                                <input class="form-control tiny tiny-fluid" id="title" style="text-transform: capitalize;" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-md-3">Number Prefix</label>
                            <div class="col-md-7">
                                <input class="form-control tiny tiny-fluid" id="prefix" style="text-transform: capitalize;" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-md-3">Due date</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input class="form-control tiny" id="due_date" type="number" />
                                    <span class="input-group-addon tiny">days</span>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-6">

                        <div class="row mb-2 p-2">
                            <label class="h6" style="color: #154360">Taxes  <span><a class="btn btn-sm btn-rounded-circle element-white" onclick="addTax()">
                    +
                  </a></span></label>
                            <!--                                    <div class="col-md-12">-->
                            <table class="table table-bordered table-editable" id="tb-tax">
                                <thead>
                                    <tr>
                                        <th>Tax</th>
                                        <th>%</th>
                                        <th style="width:30px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input value="" style="text-transform: capitalize;" required/></td>
                                        <td><input value="" required/></td>
                                        <td><i class="btn btn-circle fa fa-remove" title="delete this tax" onclick="remove(this)"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--                                    </div>-->
                            <!--
<div class="col-md-3">
    <a class="btn btn-sm btn-secondary" onclick="addTax()"><i class="fa  fa-plus"></i> add a tax</a>
</div>
-->

                        </div>



                    </div>


                </div>


                <!--                <hr>-->

                <h6 class="pt-4" style="color: #154360">Payment Options <span><a onclick="newBank()" class="btn btn-sm btn-rounded-circle element-white">
                    +
                  </a></span></h6>

                <style>
                    .btn-rounded-circle {
                        padding-right: 0px;
                        padding-left: 0px;
                        padding: 10px;
                        line-height: .6;
                        border-radius: 50% !important;
                    }

                    .payment-item .fa {
                        visibility: hidden;
                    }

                    .payment-item:hover .fa {
                        visibility: visible;
                    }

                </style>

                <div class="row" id="payment-options">

                    <!--
                    <div class="col-3">
                        <div class="element-white clear-fix w-100 payment-item" onclick="editBank(this)" data-bank-name="" data-account-name="" data-acount-id="" data-acount-number="" data-swift-code="" data-currency="">
                            <span class="p-2 pull-left text-left">
                            <b>Equity bank</b><br>
                            <small>Main Branch</small>
                            </span>

                            <span class="fa fa-pencil px-2 close" onclick="editBank(this)"></span>
                            <span class="fa fa-remove px-2 close" onclick="deleteBank(this)"></span>
                        </div>
                    </div>
-->

                </div>







                <!--
<div class="row mt-2">
    <label class="col-md-3">Bank Name</label>
    <div class="col-md-9">
        <input class="form-control tiny tiny-fluid" id="c-bank" />
    </div>
</div>
<div class="row mt-2">
    <label class="col-md-3">Account Name</label>
    <div class="col-md-9">
        <input class="form-control tiny tiny-fluid" id="c-account-name" />
    </div>
</div>
<div class="row mt-2">
    <label class="col-md-3">Account No.</label>
    <div class="col-md-9">
        <input class="form-control tiny tiny-fluid" id="c-account-number" placeholder="Bank Account Number" />
    </div>
</div>
<div class="row mt-2">
    <label class="col-md-3">Swift Code</label>
    <div class="col-md-9">
        <input class="form-control tiny tiny-fluid" placeholder="" id="c-swift-code" maxlength="20" />
    </div>
</div>
-->


                <div class="modal" id="add-bankaccount">

                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <div class="modal-title">
                                    Add Bank Account
                                </div>

                                <button type="button" class="close" data-dismiss="modal" aria-label="close" aria-hidden="true">&times;<span></span></button>

                            </div>
                            <div class="modal-body">

                                <!--
                                <div class="row mt-2">
                                    <label class="col-md-3">Bank Account Identifier</label>
                                    <div class="col-md-9">
                                        <input class="form-control tiny tiny-fluid" id="unique-name" />
                                    </div>
                                </div>
-->


                                <div class="row mt-2">
                                    <label class="col-md-3">Bank Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control tiny tiny-fluid" id="c-bank" required data-empty-message="Provide bank name" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-md-3">Account Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control tiny tiny-fluid" id="c-account-name" required data-empty-message="Provide account name" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-md-3">Account No.</label>
                                    <div class="col-md-9">
                                        <input class="form-control tiny tiny-fluid" id="c-account-number" placeholder="Bank Account Number" required data-empty-message="account number" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-md-3">Swift Code</label>
                                    <div class="col-md-9">
                                        <input class="form-control tiny tiny-fluid" placeholder="" id="c-swift-code" maxlength="20" />
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-md-3">Currency</label>
                                    <div class="col-md-9">
                                        <input class="form-control tiny tiny-fluid" placeholder="" id="c-currency" maxlength="20" />
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <a class="element-white btn-sm" onclick="addTempPayment()">Add bank Account</a>
                                <a class="btn element-white btn-sm" data-dismiss="modal">Cancel</a>
                            </div>


                        </div>
                    </div>


                </div>


            </div>



            <div class="col-md-12 pt-3">
                <label><b>TERMS & NOTES</b> </label><br>
                <textarea rows="5" cols="120" id="notes" placeholder="Add terms and conditions of sale">
                            </textarea>
            </div>
        </div>
    </div>

    <!-- <div class="card-footer p-2">
                <a title="save" class="btn btn-sm btn-primary pull-right " onclick="saveInvoince()">
                    <i class="fa fa-check-circle"></i> save
                </a>

            </div> -->




    <div class="c-footer pl-4 text-right">
        <?php echo $timeLeftFooter; ?>
    </div>


</div>

<?php include 'modals/preview-invoice.php'?>

<script>
    getInvoice();

    var gRow = $("#tb-tax tbody").html();

    function addTax() {

        var rows = "";
        // alert(gRow)
        for (var i = 0; i < 1; i++) {
            rows += gRow;
        }
        $("#tb-tax tbody").append(rows);

    }

    function remove(element) {
        $(element).parents("tr").remove();
    }

    function saveInvoince() {

        //alert(1)
        var title = $("#tt #title").val();
        var prefix = $("#tt #prefix").val();
        var due_date = $("#tt #due_date").val();
        var notes = $("#tt #notes").val();
        var bankIdentifier = $("#tt #unique-name").val();
        var bankName = $("#tt #c-bank").val();
        var accountName = $("#tt #c-account-name").val();
        var accountNumber = $("#tt #c-account-number").val();
        var swiftCode = $("#tt #c-swift-code").val();
        var bankCurrency = $("#tt #c-currency").val();

        var payments = JSON.stringify(getPayments());


        var c = new Array();

        $("#tb-tax tbody tr").each(function(i, tr) {
            var taxname = $(tr).find("td:eq(0) input").val();
            var taxamount = $(tr).find("td:eq(1) input").val();

            if (taxname != "") {
                c[i] = {
                    taxname: taxname,
                    taxamount: taxamount
                };

            }

        })
        var temp = JSON.stringify({
            title: title,
            prefix: prefix,
            due_date: due_date,
            notes: notes,
            payments: JSON.stringify(payments),
            taxes: JSON.stringify(c)
        });


        $.post("src/update.php", {
            result: temp,
            id: "1",
            page: "invoice_template_tb"
        }, function(data) {
            getInvoice();
            x0p("", "Invoice details updated", "ok", false);
        })

    }

    function newBank() {
        $(".payment-item").removeClass("--edit");

        $("#add-bankaccount input").val("");
        $("#add-bankaccount").modal("show");

    }

    function deleteBank(btn) {
        x0p("", "Do you want to remove this payment option?", "warning", function(cc) {
            if (cc == "warning") {
                $(btn).parents('.payment-item').remove();
                saveInvoince();
            } else {

            }
        })
    }



    function editBank(btn) {
        $(".payment-item").removeClass("--edit");
        var item = $(btn).parents(".payment-item");
        item.addClass("--edit");

        var bankName = item.attr("data-bank-name");
        var accountName = item.attr("data-account-name");
        var accountNumber = item.attr("data-account-number");

        var swiftCode = item.attr("data-swift-code");
        var bankCurrency = item.attr("data-currency");


        $("#c-bank").val(bankName);
        $("#c-account-name").val(accountName);
        $("#c-account-number").val(accountNumber);
        $("#c-swift-code").val(swiftCode);
        $("#c-currency").val(bankCurrency);

        $("#add-bankaccount").modal("show");

    }

    function addTempPayment() {

        if (!inputsEmpty("#add-bankaccount")) {
            var accountId = $("#unique-name").val();
            var bankName = $("#c-bank").val();
            var accountName = $("#c-account-name").val();
            var accountNumber = $("#c-account-number").val();
            var swiftCode = $("#c-swift-code").val();
            var currency = $("#c-currency").val();

            var opt = `<div class="element-white clear-fix w-100 payment-item" data-bank-name="` + bankName + `" data-account-name="` + accountName + `" data-account-number="` + accountNumber + `" data-swift-code="` + swiftCode + `" data-currency="` + currency + `">
                            <span class="p-2 pull-left text-left">
                            <b>` + bankName + `</b><br>
                            <small>` + accountName + `</small>
                            </span>

                            <span class="fa fa-pencil px-2 close" onclick="editBank(this)"></span>
                            <span class="fa fa-remove px-2 close" onclick="deleteBank(this)"></span>
                        </div>
                    </div>`;

            if ($(".--edit").length > 0) {
                $(".--edit").replaceWith(opt);


            } else {
                $("#payment-options").append('<div class="col-4">' + opt + '</div>');

            }
            $("#add-bankaccount input").val("");
            $("#add-bankaccount").modal("hide");
            saveInvoince();

        }
    }

    function getPayments() {
        var p = new Array();
        $("#payment-options .payment-item").each(function(i, item) {
            var bankName = $(item).attr("data-bank-name");
            var accountName = $(item).attr("data-account-name");
            var accountNumber = $(item).attr("data-account-number");
            //            var bankIdentifier = $(item).attr("data-bank-id");
            var swiftCode = $(item).attr("data-swift-code");
            var bankCurrency = $(item).attr("data-currency");
            p[i] = {
                bank_name: bankName,
                account_name: accountName,
                account_number: accountNumber,
                swift_code: swiftCode,
                bank_currency: bankCurrency
            };
        })
        return p;

    }

    function setPayments(p) {
        var pp = JSON.parse(JSON.parse(p));
        var opt = '';

        $.each(pp, function(i, item) {
            //            var accountId = item.bank_identifier;
            var bankName = item.bank_name;
            var accountName = item.account_name; //$("#c-account-name").val();
            var accountNumber = item.account_number; //$("#c-account-number").val();
            var swiftCode = item.swift_code; //$("#c-swift-code").val();
            var currency = item.bank_currency; //$("#c-currency").val();

            opt += `<div class="col-4">
                        <div class="element-white clear-fix w-100 payment-item" data-bank-name="` + bankName + `" data-account-name="` + accountName + `" data-account-number="` + accountNumber + `" data-swift-code="` + swiftCode + `" data-currency="` + currency + `">
                            <span class="p-2 pull-left text-left">
                            <b>` + bankName + `</b><br>
                            <small>` + accountName + `</small>
                            </span>

                            <span class="fa fa-pencil px-2 close" onclick="editBank(this)"></span>
                            <span class="fa fa-remove px-2 close" onclick="deleteBank(this)"></span>
                        </div>
                    </div>`;
        });
        $("#payment-options").html(opt);

    }

    function getInvoice() {
        $.post('src/get_data.php', {
            token: "invoice"
            //            id: "1"

        }, function(data) {
            console.log(data)
            var datau = JSON.parse(data);

            var title = datau[0].title
            var prefix = datau[0].prefix;
            var due_date = datau[0].due_date;
            var notes = datau[0].notes;
            //            var payments = JSON.parse(datau[0].payments);


            $("#tt #title").val(title);
            $("#tt #prefix").val(prefix);
            $("#tt #due_date").val(due_date);
        //    $("#tt #notes").val(notes);
            $("#tt #notes").summernote('code',notes);

            //            $("#tt #c-bank").val(payments.bank_name);
            //            $("#tt #c-account-name").val(payments.account_name);
            //            $("#tt #c-account-number").val(payments.account_number);
            //            $("#tt #c-swift-code").val(payments.swift_code);



            var rows_a = "";
            var table_a = $("#tb-tax");
            var tableBody_a = table_a.find('tbody');


            var dataw = JSON.parse(datau[0].taxes);
            $.each(dataw, function(i, item) {
                var tn = item.taxname;
                var ta = item.taxamount;


                rows_a += " <tr > " +
                    "<td> <input value='" + tn + "'/></td>" +
                    "<td> <input value='" + ta + "'/></td>" +
                    "<td><i class='btn btn-circle fa fa-remove' title='delete this tax' onclick='remove(this)'></i> </td>" +

                    " </tr>"


            })
            // alert(datau.agents_data);
            tableBody_a.html(rows_a);
            setPayments(datau[0].payments);

        })


    }

    function getInvoice_t() {
        $.post('src/get_data.php', {
            token: "invoice_temp",
            id: "1"

        }, function(data) {
            //            alert(data)
            var datau = JSON.parse(data);

            var cn = datau[0].company_name
            var cad = datau[0].address;
            var cp = datau[0].phone;
            var ce = datau[0].email
            var cw = datau[0].website;

            var tn = datau[0].title;
            var tp = datau[0].prefix;
            var td = "<?php echo date('d M Y h:m:s')?>"
            var dd = datau[0].due_date;
            var nd = datau[0].notes;
            var pd = datau[0].policy;
            nd = nd.replace(new RegExp('\r?\n', 'g'), '<br />');

            $("#c-table #c-details").html("<b>" + cn + "</b><br>" + cad + "<br>" + cp + "<br>" + ce + "<br>" + cw);


            $("#c-table #t-name").text(tn);
            $("#c-table #t-date").text(td);
            $("#c-table #due-date").text(dd);
            $("#c-table #t-receipt").text(tp + "001");
            $("#t-notes").html(nd);
            $("#t-h-policy").html(pd);

            var table_b = $(".table-invoice");
            var tablefoot_b = table_b.find('tfoot');
            var rows_b = "<tr><td colspan='2'></td><td>Sub Total</td> <td><p id='subtotal_invoice'>$0</p></td></tr>";
            rows_b += "<tr><td colspan='2'></td><td>Discount</td> <td><p id='discount_invoice'>$0</p></td></tr>";


            var dataw = JSON.parse(datau[0].taxes);
            $.each(dataw, function(i, item) {
                var tn = item.taxname;
                var ta = item.taxamount;

                rows_b += "<tr><td colspan='2'></td>" +
                    "<td>" + tn + " (" + ta + "%)</td>" +
                    "<td>$0</td></tr>";



            })
            rows_b += "<tr><td colspan='2'></td><td><p id='grand-total-invoice'>Grand Total</p></td> <td>$0</td></tr>";

            tablefoot_b.html(rows_b);
        })



    }

</script>
