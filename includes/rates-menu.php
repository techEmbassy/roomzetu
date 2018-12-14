
<a href="seasons-calendar" class="<?php echo $sbPos == 1? 'active':''?>">Seasons Calendar</a>
<a href="room-prices" class="<?php echo $sbPos == 2? 'active':''?>">Room Rates</a>
<?php if(!($role==3||$role==5)){?>
<a href="agent-rates" class="<?php echo $sbPos == 3? 'active':''?>">Agent Rates</a>
<a href="kids-rates" class="<?php echo $sbPos == 4? 'active':''?>">Kids Rates</a>
<a href="extra-bed" class="<?php echo $sbPos == 5? 'active':''?>">Extra Beds</a>

<?php }?>
