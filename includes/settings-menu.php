<?php
if(isset($_GET['v'])){
switch($_GET['v']){
    case "properties":
        $sbPos=2;
        break;    
    case "locality":
        $sbPos=3;
        break;
    case "users":
        $sbPos=4;
        break; 
    
    case "email":
        $sbPos=5;
        break;
    case "new-template":
        $sbPos=5;
        break;   
    case "extras":
        $sbPos=6;
        break;
    case "payments":
        $sbPos=7;
        break;
    case "policy":
        $sbPos=8;
        break;case "notice-board":
        $sbPos=9;
        break;case "feedback":
        $sbPos=10;
        break;
    default:
        $sbPos =1;
}
    
}

else{
     $sbPos =1;
}
?>


    <a href="settings.php" class="<?php echo $sbPos == 1? 'active':''?>">Account Details</a>
    <a href="?v=properties" class="<?php echo $sbPos == 2? 'active':''?>">Properties</a>
    <a href="?v=locality" class="<?php echo $sbPos == 3? 'active':''?>">Locality & Currency</a>
    <a href="?v=users" class="<?php echo $sbPos == 4? 'active':''?>">Users</a>
    <hr/>
    <a href="?v=email" class="<?php echo $sbPos == 5? 'active':''?>">Email Notifications</a>

    <a href="?v=extras" class="<?php echo $sbPos == 6? 'active':''?>">Services & Extras</a>
    <a href="?v=payments" class="<?php echo $sbPos == 7? 'active':''?>">Payments & Invoicing</a>

    <a href="?v=policy" class="<?php echo $sbPos == 8? 'active':''?>">Hotel Policy</a>
    <a href="?v=notice-board" class="<?php echo $sbPos == 9? 'active':''?>">Notice Board</a>
    <hr/>
    <!-- <a href="?v=feedback" class="<?php echo $sbPos == 10? 'active':''?>">Customer Feedback</a> -->
