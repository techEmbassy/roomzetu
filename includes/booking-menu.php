<?php

if($sbPos != 2){
    
if(isset($_GET['v'])){
switch($_GET['v']){
    case "all":
        $sbPos=3;
        $title = "All Bookings";
        break;    
    case "cancelled":
         $sbPos=4;
        $title = " Cancelled Bookings <i class='fa fa-circle text-red'></i>";
     break;
        
    case "deleted":
        $sbPos=5;
        $title = " Deleted Bookings";

        break;
   
    default:
        $sbPos =1;
}
    
}

else{
    $title = "New Bookings";
     $sbPos =1;
}
}
?>
    <a href="reservations" class="<?php echo $sbPos == 1? 'active':''?>">New Bookings</a>
    <a href="bookings-calendar" class="<?php echo $sbPos == 2? 'active':''?>">Bookings Calendar</a>
    <a href="reservations?v=all" class="<?php echo $sbPos == 3? 'active':''?>">All Bookings</a>
    <a href="reservations?v=cancelled" class="<?php echo $sbPos == 4? 'active':''?>">Cancelled Bookings</a>
    <a href="reservations?v=deleted" hidden="hidden" class="<?php echo $sbPos == 5? 'active':''?>">Deleted Bookings</a>