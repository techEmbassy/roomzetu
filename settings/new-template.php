<style>
    .mail-table td {
        border: none;
    }

    .mail-table td .form-control {
        border: 1px solid #eee;
    }

</style>
<?php
$id = (isset($_GET['id']) ? $_GET['id'] : "");
?>

    <div class="card p-0">
        <div class="header p-3">
            <div class="row">
                <div class="col-3 t-temp">
                    New Email Template
                </div>
                <div class="col-9 text-right">
                <a class="btn btn-primary btn-sm" id="update-btn" onclick="updatetemp()"><i class="fa fa-edit"></i> update Template</a>
                <a class="btn btn-primary btn-sm" id="new-btn" onclick="addtemp()"><i class="zmdi zmdi-check-circle"></i> Save Template</a>
                <button class="btn btn-danger btn-sm" id="del-btn" onclick="deltemp()"><i class="zmdi zmdi-close"></i> Delete Template</button>
            </div>

            </div>
        </div>
        <div class="c-body p-3" mt-3>



            <div class="row">
                <div class="col-md-3 text-left">
                    <br>
                    <p class="text-disabled mb-3" id="temptitle">Create a New Template</p>
                </div>
                <div class="col-md-9 text-right">
                    <label class="ml-4 mr-2">Email Template</label><br>
                    <select class="form-control tiny" id="s-temp">
                                    <option value="0">Reservation</option>
                                    <option value="1">Account status</option>
                                    <option value="2">New Deals</option>
                                    <option value="3">Welcome Email</option>
                                    <option value="4">Thank you</option>
                                    </select>
                </div>
            </div>
            <br>

            <input type="text" id="templatename" placeholder="Template Name" class="form-control mb-3" />

            <textarea rows="10" class="form-control mb-3" id="mytextarea" placeholder="Email body"></textarea>

            <br>






        </div>


        <div class="c-footer pl-4 text-right">
            <?php echo $timeLeftFooter; ?>
        </div>


    </div>

    <script>
        var data;
        var id = <?php echo $id; ?>





        function get_template() {
            $.post('src/get_data.php', {
                token: "email_template",
                id: id

            }, function(data) {
                var datau = JSON.parse(data);
                //                alert(data);
                var name = datau[0].template_name;
                var bd = datau[0].template_body;


                $("#templatename").val(name);
                $("#mytextarea").val(bd);
                //alert(bd)
                //                tinymce.get('#mytextarea').setContent(bd);


            })

        }

        function updatetemp() {
            var name = $("#templatename").val();
            var body = $('#mytextarea').val();


            var temp = JSON.stringify({
                template_name: name,
                template_body: body

            });


            $.post("src/update.php", {
                result: temp,
                id: id,
                page: "email_notification_template_tb"
            }, function(data) {

                alertify.success("Template details updated");
            })
            get_template()
        }

        function deltemp() {
            var name = $("#templatename").val();
            alertify.confirm("Delete " + name, "Are you sure you want to delete this template?", function() {
                $.post("src/delete.php", {
                    "reference": "id",
                    "token": "email_notification_template_tb",
                    "data": id
                }, function(response) {
                    if (response == "success") {
                        window.location.replace("settings.php?v=email");
                        alertify.success(name + ' Deleted');
                    } else {
                        alertify.error(response);
                    }
                })
            }, function() {
                alertify.error('Cancelled');
            });
        }




        function addtemp() {
            var name = $("#templatename").val();
            var body = $('#mytextarea').val();
            var template_type = $("#s-temp option:selected").val();


            var temp = JSON.stringify({
                template_name: name,
                template_body: body,
                template_type: template_type

            });


            $.post("src/save.php", {
                result: temp,
                page: "email_notification_template_tb"
            }, function(data) {

                alertify.success("Template added successfully");
            })
            get_template()
        }

    </script>


    <?php

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

    $time = "2017-07-12 10:36:09";
    //echo time_elapsed_string($time, true).PHP_EOL;

    ?>


        <?php
if($id==""){
    ?>
            <script type="text/javascript">
                $('#new-btn').show()
                $('#update-btn').hide()
                $('#del-btn').hide()
                $('.c-body #temptitle').text("Create new Template");
                $('.t-temp').text(" New Template");

            </script>
            <?php
}else{
    ?>
                <script type="text/javascript">
                    $('#new-btn').hide()
                    $('#update-btn').show()
                    $('#del-btn').show()
                    $('.c-body #temptitle').text("Edit Template");
                    $('.t-temp').text("Edit Template");
                    get_template();

                </script>
                <?php
}


?>
