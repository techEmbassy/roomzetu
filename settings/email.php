<style>
    .template-item {
        text-align: center;
        padding: 40px 10px;
        border: 1px solid #eee;
        margin-top: 10px;
        background-color: #f9f9f9
    }
    
    .template-item:hover {
        border: 1px solid #ee8e10;
        background-color: #f9f0e6;
        cursor: pointer !important
    }
    
    .template-item p {
        font-size: 11pt;
        color: #555;
        padding: 5px 0;
    }

</style>
<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Email Notifications
            </div>

            <div class="col-md-9 text-right">
                <a class=" btn btn-sm btn-secondary" href="settings.php?v=new-template"> <i class="fa fa-plus"></i> New Template</a>
            </div>

        </div>
    </div>
    <div class="c-body p-0">

        <div class="container-fluid">
            <div class="row" id="email-template">
        
            </div>
        </div>


    </div>
    <div class="c-footer pl-4 text-right">
        <?php echo $timeLeftFooter; ?>
    </div>


</div>
<?php include 'modals/email-template.php'?>
<script>
    $(function() {
        get_templates();
    });


    function get_templates() {
        $.post('src/get_data.php', {
            token: "email_template",

        }, function(data) {
            //            alert(data)
            var datau = JSON.parse(data);

            var div_a = $("#email-template");
            var cols = "";
            $.each(datau, function(i, item) {
                var id = item.id;
                var name = item.template_name;

                cols += "<div class='col-md-3' onclick='editTemplate(\"" + id + "\")'>" +
                    "<a href='settings.php?v=new-template&id=" + id + "'><div class='template-item'>" +
                    "<i class='fa fa-file-o fa-2x'></i>" +
                    "<p>" + name + "</p>" +
                    "</div></div>";
            })
            div_a.html(cols);
            
            if(cols==""){
                div_a.html("<div class='p-5'><h4 class='text-light'>No Templates Created.</h4><p class='text-muted py-2'>Email templates save you  time while sending <br>out email notifications.</p></div>");

               }


        })

    }

</script>
