<style>
    hr {
        margin-top: 5px !important;
        margin-bottom: 5px !important;

    }

</style>


<div class="row p-0 mt-1 mb-2">

    <div id="allocation_settings" class="col-md-9 mr-2">
        <a  style="font-size:12px;">Automatic Room Allocation (ON)</a>
    </div>

    <div class="col-md-2 ">
        <div class="material-switch pull-right mt-3">
            <input id="someSwitchOptionSuccess_" onchange="toggleRoomAlloction();" name="someSwitchOption001" type="checkbox" />
            <label for="someSwitchOptionSuccess_" class="label-success"></label>
        </div>

    </div>
</div>


<hr>


<a href="rooms" class="<?php echo $sbPos == 1? 'active':''?>">Room Status</a>
<a href="room-availability" class="<?php echo $sbPos == 2? 'active':''?>">Room Chart</a>
<?php if(!($role==3||$role==5)){?>
<!-- <a href="seasons-calendar" class="<?php //echo $sbPos == 6? 'active':''?>">Seasons Calendar</a> -->
<!-- <a href="room-prices" class="<?php //echo $sbPos == 3? 'active':''?>">Rooms Rates</a> -->
<a href="room-types" class="<?php echo $sbPos == 5? 'active':''?>">Manage Rooms</a>

<script>

    
   


</script>
<?php }?>
