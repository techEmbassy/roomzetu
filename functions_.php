function setFreeRooms(data) {
    //        console.log(data);
    setFreeRoomsData(data);
    var table = $("#tb-free-rooms");
    //console.log(data);

    table.html("<tr><td><h6><i class='fa fa-spinner fa-spin'></i> Loading available rooms...</h6></td></tr>")
    var rooms = JSON.parse(data);
    console.log(rooms[0]["rooms"])
    var rows = "";

    $.each(rooms, function(i, room) {
        var subTotal = parseInt(room.prices[0]['amount']) * getNights();
        var selNights = parseInt(getNights()) == 1 ? "1 night" : getNights() + " nights";
        var freerooms = room.rooms;

       // alert(room.id);


        var alertType = freerooms.length >= 3 ? "alert-success" : "alert-warning";

        rows += "<tr class='room-row'>";
        rows += "<td>";
        rows += "<div class='container-fluid'>";
        rows += "<input type='hidden' value='" + i + "' class='position'>";
        rows += "<h5><b>" + room.name + " </b> <br> <label> (" + room.property_name + ")</label></h5>";
        rows += "<p> - " + room.number_of_beds + " beds (" + room.bed_size + ")</p>";

        $.each(JSON.parse(room.specifications), function(k, s) { //stored as json string id db
            rows += "<p>- " + s + "</p>";
        })

        rows += "<hr class='mt-1 mb-2'>";
        rows += "<p> Adults: " + room.maximum_guests_adults + " ,  Children: " + room.maximum_guests_children + "</p>";
        rows += "</div>";
        rows += "</td>";

        rows += "<td>";
        rows += "<div class='container-fluid'>";
        rows += "<label>Room Rate</label>";
        rows += "<div class='row m-0'>";
        rows += "<div class='col-4 pl-0'>";
        //            rows += "<label>Meal Plan</label>";
        rows += "<select id=\""+room.id+"\" data-propery_id=\""+room.property_id+"\" class='form-control meal-plans chosen' onchange='changeMeal(this)'>";
        rows += "<option class=''>Meals</option>";
        rows += "<option class=''>FB</option>";
        rows += "<option class=''>HB</option>";
        rows += "<option class=''>BB</option>";
        rows += "</select>";;
        rows += "</div>";
        rows += "<div  class='col-8 pl-0'>";

        rows += "<select id=\""+room.id+"select\"  class='form-control rm-prices chosen-select chosen' onchange='changeUnitPrice(this)'>";

        rows += "<option>Select Pricing</option>";

        /*

        $.each(room.prices, function(j, roomprice) {
            rows += "<option id='" + roomprice.cat + "' value='" + roomprice.amount + "'>" + roomprice.label + "</option>";
        });

        */

        rows += "</select>";
        rows += "</div>";
        rows += "</div>";
        rows += "<br><br><span><span class='price'>$<span id=\""+room.id+"unit-price\" >" + 0/*room.prices[0]['amount']*/ + "</span></span> per night</span>";
        //            rows += "</h6>";

        rows += "<br><br>";
        rows += "<p class='alert " + alertType + " p-1'>Available Rooms : <b class='free-room-count'>" + freerooms.length + "</b></p>";

        rows += "</div>";
        rows += "</td>";

        rows += "<td>";
        rows += "<div class='container-fluid'>";
        rows += "<label>Number of Rooms</label>";
        rows += "<p><select class='form-control rm-count' onchange='changeRoomCount(this);'>";

        $.each(freerooms, function(x, fr) {
            var rms = x + 1;
            rows += "<option value='" + rms + "'>" + rms + "</option>";
        });

        rows += "</select> </p>";
        rows += "<br>";
        rows += "<h5>Total Cost: <span class='text-orange'>$<span class='sub-total'>" + 0/*subTotal*/ + "</span></span></h5><h6><span class='selected-rooms'>1 room</span> for <span class='selected-nights'>" + selNights + "<span></h6>";
        rows += "<input type='hidden' class='subtotal'/><br>";

        //rows += "<button class='btn btn-default btn-md' onclick='select(this)'><i class='fa fa-check-circle fa-2x'></i></button>";

        rows += "<button  type='button' onclick='select(this)' class='btn btn-labeled btn-default' data-toggle='modal' data-target='#sel-room'> <span class = 'btn-label-default'> <i class = 'fa fa-check'></i></span> Select </button>";

        rows += "</div>";
        rows += "</td>";

        rows += "</tr>";
    });

    rows = rows == "" ? "<tr><td><h5 class='text-light'>No Free Rooms Available for the selected dates</h5></td></tr>" : rows;
    // console.log(rows);
    table.html(rows);

    $(".chosen").chosen({ width:"110%", disable_search_threshold:10 });

}
