<?php
$pagev = isset($_GET['v']) ? $_GET['v'] : "";
switch($pagev){
    case 'revenue':
        $sbPos = 2;
        break;
    case 'guests':
        $sbPos = 3;
        break;
    case 'reservations':
        $sbPos = 4;
        break;
    case 'agents':
        $sbPos = 5;
        break;
    case 'accomodation':
        $sbPos = 6;
        break;
    case 'extras':
        $sbPos =7;
        break;
        
        case 'all-invoices':
        $sbPos =8;
        break;
        case 'unclear-reservations':
        $sbPos =9;
        break;
        case 'statements':
        $sbPos =10;
        break;
        
        default :
        $sbPos = 1;
        break;
}
?>
    <a href="summary" class="<?php echo $sbPos == 1? 'active':''?>">Overview</a>
    <a href="?v=revenue" class="<?php echo $sbPos == 2? 'active':''?>">Revenue</a>
    <a href="?v=guests" class="<?php echo $sbPos == 3? 'active':''?>">Guests</a>
    <a href="?v=reservations" class="<?php echo $sbPos == 4? 'active':''?>">Reservations</a>
    <a href="?v=agents" class="<?php echo $sbPos == 5? 'active':''?>">Agents</a>
    <a href="?v=accomodation" class="<?php echo $sbPos == 6? 'active':''?>">Occupancy</a>
    <a href="?v=extras" class="<?php echo $sbPos == 7? 'active':''?>">Extra Services</a>
    <a href="?v=all-invoices" class="<?php echo $sbPos == 8? 'active':''?>">All Invoices</a>
    <a href="?v=unclear-reservations" class="<?php echo $sbPos == 9? 'active':''?>">Uncleared Reservertions</a>
    <a href="?v=statements" class="<?php echo $sbPos == 10? 'active':''?>">Customer Statements</a>