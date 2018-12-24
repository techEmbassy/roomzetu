<style>
    .acc_type,
    .extras_type {
        margin: 0 0 10px 0;
        padding: 15px;
        border-radius: 4px;
        background: #fff;
        /*            box-shadow: 0 2px 0 rgba(0, 0, 0, .06);*/
    }


    .acc_type_left_col {
        float: left;
        width: 60%;
    }

    .acc_type .img_wrapper {
        float: left;
        padding: 0 10px 10px 0;
        font-size: 8pt;
    }

    .acc_type .img_wrapper img {
        width: 100%;
        max-width: 150px;
    }

    .acc_type .info_wrapper {
        float: left;
    }

    .body-wrapper article h2:nth-of-type(1) {
        padding-top: 0;
    }

    .acc_type .info_wrapper .item {
        padding: 0 20px 3px 0;
    }

    .acc_type .info_wrapper .item .label {
        font-weight: 700;
        display: inline;
        color: #646464;
    }

    .acc_type .button-wrapper {
        padding: 10px 0;
        clear: both;
    }

    .view-button-row a.left {
        margin: 10px 10px 10px 0;
        float: left;
    }

    .view-button-row a {
        margin: 10px 0 10px 10px;
        float: right;
    }

    .left {
        text-align: left !important;
    }

    .red-btn {
        border: 1px solid #ff8150 !important;
        color: #ff8150 !important;
    }

    .tag {
        display: inline-block;
        padding: 2px 4px;
        color: #444;
        background-color: #f7f7f7;
        margin-right: 3px;
        margin-left: 3px;
        font-size: 8pt;
        border: 1px solid #eee;
    }

    /*         
        .btn:link,
        .btn:visited,
        .button-row a,
        .button-row button,
        .button-row input,
        .button-row-top a,
        .button-row-top button,
        .button-row-top input,
        .cal-button-row a,
        .new-invoice-buttons input,
        .settings-btn-wrap a,
        .view-button-row a,
        a.btn {
            background: #fff;
            font-size: 9pt;
            padding: 6px 10px 7px 8px;
            margin: 0 10px 5px 0;
            text-decoration: none;
            display: block;
            float: left;
            white-space: nowrap;
            border-radius: 4px;
            text-transform: uppercase;
            border: 1px solid #5f8398;
            color: #5f8398;
            line-height: 1.2;
            transition: all .2s ease;
        } */

    .acc_type_right_col {
        float: right;
        width: 40%;
    }

    .unit-wrapper {
        padding: 10px;
        border-radius: 4px !important;
        border: 1px dashed #bbb;
    }

    .acc_type_right_col .header {
        padding-bottom: 10px;
        font-size: 8pt;
        color: #7B797C;
    }

    .unit-wrapper .unit {
        float: left;
        margin: 0 5px 5px 0;
        background: #f2f5f8;
        border: 1px solid #f2f5f8;
        border-radius: 4px !important;
    }

    .unit-wrapper .unit a {
        padding: 2px 5px 3px;
        display: inline-block;
        text-decoration: none;
        color: #333;
        font-size: 14px;
    }



    .unit-wrapper .unit a:hover {
        padding: 2px 5px 3px;
        display: inline-block;
        text-decoration: none;
        color: #fff;
        border-radius: 4px !important;
        font-size: 14px;
        background-color: #6E3B30;
    }

    .fa-lg {
        font-size: 1.33333em;
        line-height: .75em;
        vertical-align: -15%;
    }

    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }


    .prop-text {
        font-size: 11px;
        color: #99989B;
    }


    .head {
        font-size: 11px;
        padding-bottom: 4px
    }

    .btn-specx {
        margin-left: 3px;
        color: #eaa;
    }

    .btn-specx:hover {
        /* margin-left:3px; */
        color: red;
    }

</style>




<?php include 'includes/auth.php'?>
<?php if(($role==3)||$role==5){
     header("Location: rooms.php");
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Roomzetu | Hotel Management System</title>
    <?php include 'includes/styles.php'?>
</head>

<body class="gray">
    <style>


    </style>
    <?php $mpos=3; include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2 pr-0">

                    <p><small>Manage rooms, room prices and view room availability</small> </p>
                    <hr/>
                    <div class="sub-menu ">
                        <?php $sbPos=5; include 'includes/rooms-menu.php';?>
                    </div>
                    <div class="foot pt-4 pl-2 text-left">
                        <a class="btn btn-sm btn-secondary" onclick="createNewRoom()"><i class="fa fa-plus"></i> New Room type</a>

                    </div>

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">
                            <div class="row">
                                <div class="col-md-3">
                                    Room Types <span> <a href="#" data-toggle="popover" data-trigger="focus" title="Help" data-placement="bottom" 
                                    
                                    data-content="A room type for example can be Single room or Double room. One or more units of the same type can later be registered under this room type.

Please note that usually it is not a specific unit that should be described here, but rather a general type of accommodation. However, if you want to describe each unit individually, you can register one room type corresponding to each unit.

The field Object type makes sure that the object is described correctly in the booking process.">
                                    
                                    <i class="fa fa-question-circle-o" style="color:#ECE9E9  "></i></a></span>

                                    <script>
                                        $('.popover-dismiss').popover({
                                            trigger: 'focus'
                                        })

                                    </script>






                                </div>


                                <div class="col-md-9 text-right">
                                    <input class="form-control tiny" placeholder="search" oninput="searchRooms(this)">

                                    <select class="form-control tiny" id="properties" onchange="getRoomTypes()">
                                        <?php echo $propertyOptions0; ?>
                                    </select>

                                    <a class="btn btn-secondary btn-35" onclick="createNewRoom()"><i class="fa fa-plus"></i> New room type</a>


                                </div>


                            </div>
                        </div>



                        <div class="c-body px-3 c-content pt-2" id="room-types">
                            <p class='text-muted norooms p-4'>No roomtypes have been added. Click <br><b>New room type</b> to begin adding rooms. </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- modal for room details -->

    <div class="modal fade" id="unit-details" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Update Room/Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Unit Number or Name:</label>
                            <input type="text" class="form-control" id="room-name">
                            <input type="text" id="room-id" hidden>
                        </div>

                        <p>Roomtype: <span class="text-success r-t-name">Doubles</span></p>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteRoom()">Delete</button>
                    <button type="button" class="btn btn-info  btn-sm" onclick="updateRoom(this)">Update</button>
                </div>
            </div>
        </div>
    </div>



    <!-- modal for adding room -->

    <div class="modal fade" id="add-unit" tabindex="-1" role="dialog" aria-labelledby="add-unit" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Room/Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Unit Number or Name:</label>
                            <input type="text" class="form-control room-name" required data-empty-message="Enter Room Name">
                            <input name="room-type-id" hidden type="hidden" />
                        </div>

                        <p>Linked Roomtype: <span class="text-success room-type-name">Doubles</span></p>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-info btn-sm" onclick='save_new_room(this)'>Add Unit</button>
                </div>
            </div>
        </div>
    </div>


    <section class="gray-bg p-2 mini-gallery" hidden>
        <p><b>Photos</b>
            <a class="btn btn-sm btn-primary pull-right" onclick="getPhoto()" data-target="file"> <i class="fa fa-plus"></i> add photo</a>
            <input type="file" value="upload" id="uploadFile" name="uploadFile" class="uploadFile" hidden/>
        </p>
        <hr class="mt-2" />
        <div class="row" id="room_photos" style="height: 100px;">



        </div>

    </section>



    <div class="modal animated fadeIn" id="new-px">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Room Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body" id="form-new-roomtype">
                    <input value="0" id="room-type-id" hidden />
                    <div class="row">

                        <div class="col-md-12 mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Property</label>
                                    <select class="form-control" id="property" onchange='onPropertyChange(this)'>
                   
                        </select>

                                </div>

                                <div class="col-md-6">
                                    <label>Room type name</label>
                                    <input class="form-control" id="name" placeholder="e.g Delux Single Bed" style="text-transform: capitalize;" required/>
                                </div>

                            </div>

                        </div>


                        <div class="col-md-12">
                            <label>Standard Price</label><br>
                            <label><small>High Season</small></label>
                            <div class="input-group">
                                <span class="input-group-addon"><b>$</b></span>
                                <input class="form-control" id="price" placeholder="FB" type="number" />
                                <span class="input-group-addon"><b>$</b></span>
                                <input class="form-control" id="price_hhb" placeholder="HB" type="number" />
                                <span class="input-group-addon"><b>$</b></span>
                                <input class="form-control" id="price_hbb" placeholder="BB" type="number" />
                            </div>
                            <label><small>Low Season</small></label>
                            <div class="input-group">
                                <span class="input-group-addon"><b>$</b></span>
                                <input class="form-control" id="price_lfb" placeholder="FB" type="number" />
                                <span class="input-group-addon"><b>$</b></span>
                                <input class="form-control" id="price_lhb" placeholder="HB" type="number" />
                                <span class="input-group-addon"><b>$</b></span>
                                <input class="form-control" id="price_lbb" placeholder="BB" type="number" />
                            </div>








                        </div>

                        <input type="hidden" id="rtype" />



                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Number of beds</label>
                                    <div class="input-group">
                                        <input class="form-control" id="no-of-beds" placeholder="" type="number" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Bed size(s)</label>
                                    <select class="form-control" id="bed-size">
                                 <option value='King Size'>King Size</option>
                                 <option value='Queen Size'>Queen Size</option>
                                    <option value='Normal Size'>Normal Size</option>
                                     <option value='Kids Size'>Kids Size</option>
                                 <option value='Delux'>Delux</option>
                                 <option value='Double'>Double</option>
                                 <option value='Single'>Single</option>
                                 
                                </select>
                                </div>
                                <!--
                            <div class="col-md-6">
                                <input class="form-control" id="bed-dimens" placeholder="dimensions e.g. 6x6" />
                            </div>
-->
                            </div>

                            <div class="m-0 mb-2">
                                <div class="row">


                                    <div class="col-md-6">
                                        <label>Max. Guests (Inc. Extra Beds)</label>
                                        <div class="input-group">
                                            <input class="form-control" id="max-guests" placeholder="" type="number" />
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class=" mb-2">
                                <label>Rooms Facilities/Specifications</label>

                                <input class="" type="text" id="facilities" data-role="tagsinput" value="">
                            </div>



                             <div class=" mb-2">
                                 <div class="row ">
                                    <div class="col-md-6">
                                    <label class="" >Can be used as </label>

                                        <select class="custom-select form-control" style=" font-size:12px;" onchange="selectUsedAs(this);" id="used_as_select">
                                        <option selected>None</option>
                                        
                                        </select>
                                    </div>
                                
                                </div>
                                <input class="" type="text" id="used_as" data-role="tagsinput" value="">
                            </div>
                            



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-sm btn-save" onclick="addRoomType()">Save Room type</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->









        <?php include 'includes/footer.php';?>


        <!-- tags input js -->
        <script src="js/tags-input-js/tagsinput.js"></script>
        <link href="js/tags-input-js/tagsinput.css" rel="stylesheet" type="text/css">

        <script>
            var data;
            var selected_room;
            var spec_string;
            var room_types_images_string;
            var roomtypes;

            function getPhoto() {
                //alert("got");
                $('#uploadFile').trigger('click');
            }

            $("#used_as").tagsinput({
            itemValue: 'value',
            itemText: 'text'
            
            });

            function selectUsedAs(select){
                var txt= select.options[select.selectedIndex].text;
                var valtxt=$(select).val();
                var used_as=JSON.stringify($("#used_as").val().split(','));

                if(used_as.indexOf(valtxt) <= -1 && txt !="None"){
                    $("#used_as").tagsinput('add', { value: valtxt, text: txt });
                }
              
                
            }

            document.getElementById('uploadFile').onchange = function(evt) {
                var tgt = evt.target || window.event.srcElement,
                    files = tgt.files;

                // FileReader support
                if (FileReader && files && files.length) {
                    var fr = new FileReader();
                    fr.onload = function() {
                        //  document.getElementById('uploaded').src = fr.result;

                        //     alert(show_image);
                        uploadedFile = fr.result;
                        new_logo = $('#logo').val();
                        console.log(new_logo);

                        $("input[name=uploadFile]").upload("src/xhr.php", {
                                action: "upload_room_type_image"
                            },
                            function(response) {
                                // location.reload();
                                if (response != "failed") {
                                    new_logo = response;
                                    console.log(new_logo);
                                    var src_string = "img/roomtypes/" + new_logo;
                                    var show_image = "<div class='col-md-2'><div class='thumbnail'><img src=" + src_string + "  class='img-fluid'><a class='close fa fa-close btn-circle'></a></div></div>";

                                    $('#room_photos').append(show_image);

                                    var room_img = $('#room_photos').map(function() {
                                        return $(this).find('img').map(function() {
                                            return "\"" + $(this).attr('src').split('/')[2] + "\"";
                                        }).get();
                                    }).get();
                                    //alert(tbl);
                                    room_types_images_string = "[" + room_img + "]";
                                    console.log(room_types_images_string);

                                } else {
                                    upload_error = 1;
                                    x0p("","An Error Ocurred While Uploading. Please Try Again","error",false);
                                }
                                // alert(response);
                            },
                            function(progress, value) {
                                // $("#response").text("Saving " + value + "%");
                            });
                    }
                    fr.readAsDataURL(files[0]);
                }

                // Not supported
                else {
                    // fallback -- perhaps submit the input to an iframe and temporarily store
                    // them on the server until the user's session ends.
                }
            }

            $(function() {
                getCompanyProperty();
                getRoomTypes();

                // loadRoom(this, 1);

                //   $('#bed_number').focus();

            });


            function getRoomTypes() {

                $('#room-details').hide(10);
                // var data = {name, property};
                var property_id = $("select#properties option:selected").val();
                //alert(property_id)
                $.get("src/get.php", {
                    token: "get_room_types",
                    property_id: property_id
                }, function(response) {
                    //                         alert(response);
                    data = response;
                    $(".norooms").hide();
                    if (response != "[]") {
                        $('#room-details').show(10);
                        $('#room-details').css({
                            visibility: "visible"
                        });

                        setRoomTypes(data);

                    } else {
                        $('#room-types').html("No rooms added");
                        $(".norooms").show();
                    }

                    // setBranches(data);
                    // data = JSON.parse(response);
                    // alert(data.company_name)
                });

            }

            function getCompanyProperty() {

                $.get("src/get.php", {
                    token: "get_properties"
                }, function(response) {
                    //alert(response);
                    setCompanyProperty(response);

                });

            }



            function getRooms(room_type_id) {

                $.get("src/get.php", {

                    room_type_id: room_type_id,
                    token: "get_room_numbers"

                }, function(response) {
                    //alert(response);
                    setRooms(response);

                });

            }

            function setRooms(data) {

                var rooms = JSON.parse(data);
                $('#nrooms').text(rooms.length)
                if (rooms.length > 0) {
                    var room_html = "";
                    $.each(rooms, function(i, room) {

                        var room_id = room.id;
                        var room_name = room.room_name;

                        room_html += "<tr><td><input type='text' value='" + room_name + "'></td><td><a class='btn btn-sm btn-secondary fa fa-close ' onclick='deleteRoom(\"" + room_name + "\", \"" + room_id + "\")'></a></td></tr>";


                    });



                    $("#rooms").html(room_html);
                } else {
                    $("#rooms").html("<p style='text-align: center'>No Rooms Added</p>");
                }
                // fixTableHead(".table-primary");


            }

            function setCompanyProperty(data) {

                var availableProperty = JSON.parse(data);
                var options = "";
                $.each(availableProperty, function(i, property) {

                    // var property_id = property.id; 

                    options += "<option value=" + property.id + ">" + property.property_name + "</option>";



                });



                $("#property").html(options);


            }

            var as_room_obj = {};


            function onPropertyChange(context) {              
                var property_id = $(context).val();
                $("#used_as").tagsinput('removeAll');
                setRoomTypesAS(property_id);
                
            }


            function setRoomTypesAS(property_id) {
                // console.log(JSON.stringify(as_room_obj));
                var as_rows = "<option selected>None</option>";

                  $.get("src/get.php", {
                    token: "get_room_types",
                    property_id: property_id
                }, function(response) {
                    
                    if (response != "[]") {
                        data = JSON.parse(response);
                        $.each(data, function(i, roomType) {
                            var room_id = roomType.room_type_id;
                            // console.log(roomType.property_id+","+property_id);
                            as_rows += "<option value='" + room_id + "'>" + roomType.room_type_name + "</option>";
                          
                        });

                      

                    } 
                    // console.log(as_rows)
                    $("#used_as_select").html(as_rows);

                });
             

                
            }

            function setRoomTypes(data) {
                // alert(data)

                var roomTypes = JSON.parse(data);
                var rows = "";
                as_room_obj = roomTypes;
                var property_id = $("select#properties option:selected").val();
                

                roomtypes = data; //global variable
                setRoomTypesAS(property_id);

                var row = "";
                $.each(roomTypes, function(i, roomType) {

                    var room_id = roomType.room_type_id;
                    var specs = JSON.parse(roomType.specifications);
                    var rooms = roomType.rooms;

                    row += '<div class="acc_type" style="border:1px solid #eee">';
                    //                    row += '<input value="'+JSON.stringify(roomType)+'">';

                    row += '<div class="acc_type_left_col">';
                    row += '<div>';
                    row += '<div class="img_wrapper">';
                    row += '<img src="img/no-image.png" border="0">';
                    row += '</div>';

                    row += '<div class="info_wrapper">';
                    row += ' <h2 class="rtp_name" style="color:#58463E ;font-size:27px;">' + roomType.room_type_name + '';
                    row += ' <span class="prop-text" id="property_preview">* ' + roomType.property_name + '</span>';
                    row += '</h2>';
                    row += '<div class="item">';
                    row += '  <div class="label">Number of guests:</div> ' + roomType.adults + ' (Max ' + roomType.adults + ' persons )</div>';
                    row += ' <div class="item">';
                    row += '</div>';
                    row += '<div class="item">';
                    row += '<div class="label">Bed Size:</div>' + roomType.bed_size + '</div>';

                    row += '<div class="item">';
                    row += '<div class="label">Number of beds:</div>' + roomType.bed_number + ' </div>';

                    row += '<div class="item">';
                    row += '<div class="label">Room Facilities:</div>';
                    $.each(specs, function(i, spec) {
                        row += '<a class="tag"><span class="">' + spec + '</span ><!--<span class="btn-specx"><i class="fa fa-close"></i></span>--></a>';

                    });

                    row += '</div>';


                    row += '</div>';
                    row += '</div>';

                    row += '<div class="button-wrapper">';
                    row += '<div class="view-button-row">';
                    row += '<a class="btn btn-outline-info btn-sm left" style="border: 1px solid #5f8398;color: #5f8398;" data-toggle="modal" onclick="setRoomData(' + i + ', this)"><i class="fa fa-pencil fa-lg"></i> VIEW/EDIT</a>';

                    row += '<a id="trash_btn" class=" btn btn-outline-danger btn-sm red-btn left " onclick="delete_roomType(' + room_id + ')"><i class="fa fa-trash fa-lg"></i> Delete</a>';
                    row += '</div>';
                    row += '<div style="clear: both;"></div>';
                    row += '</div>';
                    row += '</div>';



                    row += '<div class="acc_type_right_col" style="border:0px;">';
                    row += '<div class="unit-wrapper">';
                    row += '<div class="head">UNITS OF THIS TYPE:</div>';
                    $.each(rooms, function(i, room) {

                        row += '<div class="unit" id="room-id-' + room.id + '">';
                        row += '<a onclick="setRoom(' + room.id + ',\'' + room.room_name + '\',\'' + roomType.room_type_name + '\')">' + room.room_name + '</a>';

                        row += '</div>';
                    });

                    row += '<div style="clear: both;"></div>';
                    row += '<div class="view-button-row">';
                    row += '<a onclick="openNewRoomModal(' + room_id + ', this, \'' + roomType.room_type_name + '\')" class="btn left btn-outline-info btn-sm" style="border: 1px solid #5f8398;color: #5f8398;" ><i class="fa fa-key fa-lg"></i>ADD NEW UNIT</a></div>';

                    row += '<div style="clear: both;"></div>';
                    row += '</div>';
                    row += '</div>';

                    row += '<div style="clear: both;"></div>';
                    row += '</div>';


                });

                //alert(row)
                if (row != "") {
                    $("#room-types").html(row);

                }
                //            else{
                //                alert(0)
                //                  $("#room-types").html("No rooms for property");
                //            }


                // fixTableHead(".table-primary");
            }

            function loadRoom(li, id) {
                //    alert(id);
                selected_room = id;
                $('#rtype').val(id);
                $(".room-list-item").removeClass("active");
                $(li).addClass("active");

                $('#save_btn').attr('onclick', 'save_edits(' + id + ')');
                $('#trash_btn').attr('onclick', 'delete_roomType(' + id + ')');

                $.get("src/get.php", {

                    "room_id": id,
                    token: "get_rooms"
                }, function(response) {
                    // alert(selected_room);
                    //   data = response;
                    setRoomTypeData(response);
                    //   setBranches(data);
                    // data = JSON.parse(response);
                    // alert(data.company_name)
                });
            }

            function setRoomTypeData(roomtypedata) {
                //        alert(roomtypedata)
                var specs = "";
                var room_type_pictures = "";

                var room_data = JSON.parse(roomtypedata);

                room_data = room_data[0];

                var room_id = room_data.room_type_id;
                var name = room_data.room_type_name;
                var number_of_beds = room_data.bed_number;
                var bed_size = room_data.bed_size;

                var pictures = room_data.picutres;
                if (pictures.length > 0) {

                    pictures = JSON.parse(room_data.picutres);
                    // console.log(pictures)


                    for (var i in pictures) {
                        // console.log(specifications[j]);
                        var img_path = "img/roomtypes/" + pictures[i];
                        room_type_pictures += "<div class='col-md-2' id='pic" + i + "'><div class='thumbnail'><img src=" + img_path + "  class='img-fluid'><a class='close fa fa-close btn-circle' onclick='deletePicture(\"" + i + "\", \"" + room_id + "\")'></a></div></div>";
                    }
                    console.log(room_type_pictures)
                    $('#room_photos').html(room_type_pictures);
                } else {
                    $('#room_photos').html("");
                }


                //  alert(bed_size);
                //  var bed_dimensions = room_data.bed_dimensions;
                var specifications = JSON.parse(room_data.specifications);
                //alert((specifications)[0]);
                for (var j in specifications) {
                    // console.log(specifications[j]);
                    specs += "<tr id='spec" + j + "'><td><input id='spec' value='" + specifications[j] + "''></td><td><a class='btn btn-sm btn-circle fa fa-close' onclick='remove(\"" + specifications[j] + "\", \"" + j + "\", \"" + room_id + "\")'></a></td></tr>";
                }

                //console.log(specs);
                $('#specs_table').html(specs);

                var maximum_guests_adults = room_data.adults;
                var maximum_guests_children = room_data.children;
                //  var time_stamp = room_data.time_stamp;


                $('#bed_size').val(bed_size);
                $('#bed_number').val(number_of_beds);
                $('#type_name').html(name);
                $('#adult_guests').val(maximum_guests_adults)
                $('#kid_guests').val(maximum_guests_children)

                $('#property_preview').html(room_data.property_name)


                $('#save_btn').attr('onclick', 'save_edits(' + room_id + ')');
                getRooms(room_id);



            }

            function addRoomType() {
                try {
                    var d = new Array();
                    var modal = $("#new-px");
                    var used_as = JSON.stringify(modal.find("#used_as").val().split(',')); //to json string
                    var pid = modal.find('#property option:selected').val(),
                        room_type_id = modal.find("#room-type-id").val(),
                        rtn = modal.find("#name").val(),
                        px = modal.find("#price").val(),
                        amount_H_HB = modal.find("#price_hhb").val(),
                        amount_H_BB = modal.find("#price_hbb").val(),
                        amount_L_FB = modal.find("#price_lfb").val(),
                        amount_L_HB = modal.find("#price_lhb").val(),
                        amount_L_BB = modal.find("#price_lbb").val(),
                        maximum_guests_adults = modal.find("#max-guests").val(),
                        facilities = JSON.stringify(modal.find("#facilities").val().split(',')), //to json string

                        nob = modal.find("#no-of-beds").val(),
                        bs = modal.find("#bed-size").val(),
                        bd = modal.find("#bed-dimens").val(),
                        d = {
                            property_id: pid,
                            name: rtn,
                            price_per_night: px,
                            amount_H_HB: amount_H_HB,
                            amount_H_BB: amount_H_BB,
                            amount_L_FB: amount_L_FB,
                            amount_L_HB: amount_L_HB,
                            amount_L_BB: amount_L_BB,
                            maximum_guests_adults: maximum_guests_adults,
                            number_of_beds: nob,
                            bed_size: bs,
                            bed_dimensions: bd,
                            specifications: facilities,
                            used_as: used_as
                        };

                        
                    var payload = JSON.stringify(d);
                    //alert(payload)

                    if (!(inputsEmpty("#form-new-roomtype"))) {
                        modal.modal('hide');

                        if(room_type_id>0){

                            $.post("src/update.php", {
                                page: "room_types",
                                room_type_id: room_type_id,
                                result: payload
                            }, function(response) {
                                if (response == 'success') {
                                    x0p("Done", "Your Changes have been Saved","ok", function() {
                                        getRoomTypes(); 
                                        });
                                
                                }
                                else {
                                    x0p("","An error occurred. please refresh page and try again.","error")
                                }
                            });

                        }else{
                            $.post("src/save.php", {
                                page: "room_types",
                                id: room_type_id,
                                result: payload
                            }, function(response) {
                                //alert(response)
                                if (response == 1) {

                                x0p("New RoomType Created", rtn + " has been sucessfully created","ok", function() {
                                            //alertify.message('OK');
                                            // window.location.reload();
                                            getRoomTypes();
                                        });
                                }

                            });
                        }
                    }

                } catch (e) {


                    getRoomTypes();
                    // console.log(e)
                }


            }

            function remove(name, spec, r_id) {
                // alert(name);
                var specid = "#spec" + spec

                //  var caller = u;
                console.log($(this))
              x0p("Confirm ", "Remove " + name + " from the list of specifications for this room?","warning",
                    function(button) {
                        if (button == "warning") {
                        
                        $(specid).remove();

                        var tbl = $('table#spec_table tr').map(function() {
                            return $(this).find('input').map(function() {
                                return "\"" + $(this).val() + "\"";
                            }).get();
                        }).get();
                        //alert(tbl);
                        spec_string = "[" + tbl + "]";
                        console.log(spec_string);
                        var new_specs = {
                            "specifications": spec_string
                        }
                        $.post("src/update.php", {
                            "reference": r_id,
                            "result": new_specs,
                            "token": "room_types_tb",
                            "col_name": "id",
                            "multiple": "no"
                        }, function(response) {
                            if (response == "success") {
                                //  window.location.reload();
                                alertify.success(name + ' Removed');
                            } else {
                                alertify.error(response);
                            }
                        })

                        }
                    });
            }

            function deletePicture(pic, r_id) {
                // console.log($(this));
                var picid = "#pic" + pic;
                alertify.confirm("Confirm ", "This picture will be removed!",
                    function() {
                        $(picid).remove();
                        var room_img = $('#room_photos').map(function() {
                            return $(this).find('img').map(function() {
                                return "\"" + $(this).attr('src').split('/')[2] + "\"";
                            }).get();
                        }).get();
                        //alert(tbl);
                        room_types_images_string = "[" + room_img + "]";
                        var new_pics = {
                            "pictures": room_types_images_string
                        }
                        $.post("src/update.php", {
                            "reference": r_id,
                            "result": new_pics,
                            "token": "room_types_tb",
                            "col_name": "id",
                            "multiple": "no"
                        }, function(response) {
                            if (response == "success") {
                                //  window.location.reload();
                                alertify.success('Picture Removed');
                            } else {
                                alertify.error(response);
                            }
                        })

                    },
                    function() {
                        alertify.error('Cancelled');
                    });
            }

            function cancelAdd(y) {
                console.log(y);
            }

            function delete_roomType(id) {
                var name = $('#type_name').text()
                x0p('Confirm Delete', 'Completely remove the ' + name + ' room type. This action can NOT be reversed!','warning', function(button) {
if (button == "warning") {

                        //console.log(id);

                        $.post("src/delete.php", {
                            "reference": "id",
                            "token": "room_types_tb",
                            "data": id
                        }, function(response) {
                            if (response == "success") {
                                // window.location.reload();
                                getRoomTypes();
                                //alertify.success(name + ' Deleted');
                                 x0p("","Room deleted","ok", false);
                            } else {
                                x0p("", response,"error", false);
                            }
                        })

                        // alertify.success('Ok')
                    }
                    });
                    
            }


            function deleteRoom() {
                var modal = $("#unit-details"),
                    name = modal.find("#room-name").val(),
                    id = modal.find("#room-id").val(),
                    type_name = modal.find(".r-t-name").text();
                x0p('Confirm', 'Remove room ' + name + ' from the ' + type_name + ' category',"warning", function(button) {

                if (button == "warning") {
                    //
                      console.log(id);

                        $.post("src/delete.php", {
                            "reference": "id",
                            "token": "room_tb",
                            "data": id
                        }, function(response) {
                            //alert(response)
                            if (response == "success") {
                                modal.modal("hide")
                                // window.location.reload();
                                $('#room-id-' + id).remove();
                                x0p('Done','Room ' + name + ' removed from the ' + type_name + ' category', "ok", false);
                            } else {
                                x0p("", response,"error", false); 
                            }
                        });
                }
                });
            }
            var unitWrapper = null;

            function openNewRoomModal(id, btn, roomtype_name) {
                var modal = $("#add-unit");
                modal.find('input[name=room-type-id]').val(id);
                modal.find('.room-type-name').text(roomtype_name);
                modal.modal('show');
                unitWrapper = $(btn).parents(".unit-wrapper");
            }

            function save_new_room(btn) {
                //var type_name = $('#type_name').text();
                if (!inputsEmpty("#add-unit")) {
                    $(btn).html("<i class='fa fa-spin fa-spinner'></i> saving...");

                    var room_name = $('#add-unit .room-name').val();
                    var roomtype = $('#add-unit [name=room-type-id]').val();
                    // var roomtypename = $('#add-unit [name=room-type-name]').text();


                    var rmz = JSON.stringify({
                        "room_name": room_name,
                        "room_type_id": roomtype

                    });



                    $.post("src/save.php", {
                        page: "rooms",
                        result: rmz
                    }, function(response) {
                        $(btn).html("Add Unit");
                        if (!isNaN(parseInt(response))) {
                            $('#add-unit').modal('hide');
                            ///alert(response);
                            //getRooms(roomtype);
                            unitWrapper.find(".head").after("<div class='unit bg-success'><a href=\"#\" data-toggle=\"modal\" data-target=\"#unit-details\">" + room_name + "</a></div>");
                            x0p("Unit Added", "Your Changes have been Saved","ok", function() {
                                // <a href="#" data-toggle="modal" data-target="#unit-details">D1</a>

                            });
                        }
                    });


                }


            }

            function updateRoom(btn) {
                //var type_name = $('#type_name').text();
                if (!inputsEmpty("#unit-details")) {
                    $(btn).html("<i class='fa fa-spin fa-spinner'></i> saving...");

                    var room_name = $('#unit-details #room-name').val();
                    var roomid = $('#unit-details #room-id').val();
                    // var roomtypename = $('#add-unit [name=room-type-name]').text();


                    var rmz = JSON.stringify({
                        "room_name": room_name

                    });



                    $.post("src/save.php", {
                        page: "update room",
                        result: rmz,
                        id: roomid
                    }, function(response) {
                        // alert(response)
                        $(btn).html("Save changes");
                        if (response == 1) {
                            $('#unit-details').modal('hide');
                            ///alert(response);
                            //getRooms(roomtype);
                            $("#room-id-" + roomid).text(room_name);


                           x0p("Done", "Your Changes have been Saved","ok", function() {
                                // <a href="#" data-toggle="modal" data-target="#unit-details">D1</a>
                                $("#room-id-" + roomid).addClass("bg-info");
                                setTimeout(function() {
                                    $("#room-id-" + roomid).removeClass("bg-info")
                                }, 3000);

                            });
                        } else {
                            x0p("","An error occurred. please refresh page and try again.","error")
                        }
                    });


                }


            }

            function searchRooms(input) {
                var keyword = $(input).val();
                if (keyword == "") {
                    $(".c-content .acc_type").show();
                } else {
                    $(".c-content .acc_type").each(function(i, li) {
                            var a = $(li).find(".rtp_name");
                            var s = a.text().toLowerCase();

                            if (s.indexOf(keyword.toLowerCase()) < 0) {
                                $(li).hide();
                            } else {
                                $(li).show();
                            }
                        }

                    );
                }

            }

            function createNewRoom() {
                var modal = $("#new-px");
                modal.find('input').val('')
                modal.find('#room-type-id').val('0');
                modal.find('.modal-title').text("New Room type");
                modal.find('.btn-save').text("Save room type");
                modal.find("#facilities").tagsinput("removeAll")
                modal.find("#used_as").tagsinput("removeAll")
                modal.modal('show');
            }

            function setRoom(id, name, roomtype_name) {
                var modal = $("#unit-details");
                modal.find("#room-id").val(id)
                modal.find("#room-name").val(name)
                modal.find(".r-t-name").text(roomtype_name)
                modal.modal('show');
            }

            function setRoomData(index, btn) { //room type
                //                alert(index);


                var modal = $("#new-px");

                modal.find('.modal-title').text("Room type");
                modal.find('.btn-save').text("Save Changes");


                var btn = $(btn);
                btn.html("<i class='fa fa-spin fa-spinner'></i> Loading...");
                var parent = btn.parents('.acc_type');
                var roomtype = JSON.parse(roomtypes)[index];
                // if(){
                $.post("src/get_data.php", {
                    room_type_id: roomtype.room_type_id,
                    token: "roomtype"
                }, function(data) {

                    // { price_per_night: "450", …}amount_H_BB: "34"amount_H_HB: "78"amount_L_BB: "0"amount_L_FB: "67"amount_L_HB: "8"bed_dimensions: nullbed_size: "Delux"company_id: "26"id: "17"maximum_guests_adults: "9"maximum_guests_children: "7"name: "double latino"number_of_beds: "3"pictures: "[]"price_per_night: "450"property_id: "16"specifications: "["vvg","DSTV","room water"]"time_stamp: "2017-08-29 16:00:40"used_as: ""}  

                    var room = JSON.parse(data);
                    console.log(room);
                    btn.html("<i class='fa fa-pencil'></i> View/Edit");

                    if (room.length !== 0) {
                        modal.find("#room-type-id").val(room.id);
                        modal.find("#name").val(room.name);
                        modal.find("#price").val(room.price_per_night);
                        modal.find("#price_hbb").val(room.amount_H_BB);
                        modal.find("#price_hhb").val(room.amount_H_HB);
                        modal.find("#price_lbb").val(room.amount_L_BB);
                        modal.find("#price_lfb").val(room.amount_L_FB);
                        modal.find("#price_lhb").val(room.amount_L_HB);
                        modal.find("#property").val(room.property_id);
                        modal.find("#no-of-beds").val(room.number_of_beds);
                        modal.find("#bed-size").val(room.bed_size);
                        modal.find("#max-guests").val(room.maximum_guests_adults);
                        modal.find("#used_as").tagsinput('removeAll');
                        modal.find("#facilities").tagsinput('removeAll');

                        if (room.specifications != "") {
                            $.each(JSON.parse(room.specifications), function(i, s) {
                                modal.find("#facilities").tagsinput('add', s);

                            })
                      
                            // modal.find("#facilities").val('refresh,helllo,iipppe');
                            // modal.find("#facilities").tagsinput('refresh');
                        }
                        
                        if(room.used_as != ""){
                          
                            
                            $.each(JSON.parse(room.used_as), function(i, s) {
                                
                                $.each(as_room_obj, function(i, roomType) {
                                    var name=roomType.room_type_name;
                                    if (s == roomType.room_type_id) {
                                        modal.find("#used_as").tagsinput('add', { value: s, text: name });
                                    return false;
                                    }
                                });
                                
                            })
                                
                            
                        }
                        //  $("#facilities").tagsinput();
                        modal.modal('show');
                    }
                });


            }

        </script>
