<!--        login navbar-->
<?php
$active1 = ($pos==1)? 'navactive': '';
$active2 = ($pos==2)? 'navactive': '';
?>
<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 mb-1 bg-white border-bottom">
            <h5 class="my-0 mr-md-auto font-weight-normal">
                <p class="text-center" style="font-family: 'Ubuntu', sans-serif; font-weight:900"><img src="../img/logo.png" width="40px" /> roomzetu RPM</p>
            </h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark <?php echo $active1;?>" href="enter-license.php">Renew Licence</a>
                <a class="p-2 text-dark <?php echo $active2;?>" href="billing.php">Pricing</a>
                <a class="p-2 text-dark" href="https://roomzetu.com">Features</a>
                <a class="p-2 text-dark" href="mailto:support@laceltech.com">Support</a>
                

            </nav>
            <a class="btn btn-link-primary" href="../login?logout=1">Log out</a>
        </div>