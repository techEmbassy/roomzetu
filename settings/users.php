<div class="card p-0">
    <div class="header p-3">
        <div class="row">
            <div class="col-md-3">
                Users
            </div>

            <div class="col-md-9 text-right">
                <label>Property:</label>
                <select class="form-control tiny" id="property">
                    <?php echo $propertyOptions;?></select>
                <!--                <span class="border"></span>-->|
                <a class="btn btn-sm btn-secondary btn-35" data-toggle="modal" data-target="#new-user" onclick="adduser()"><i class="fa fa-plus"></i> Create New User</a>
            </div>

        </div>
    </div>

    <div class="c-body p-0 pt-3">

        <!--users details here-->
        <div class="container-fluid">


            <style>
                .card {
                    margin-bottom: 1.5rem;
                    box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, .03);
                }

                .card {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    min-width: 0;
                    word-wrap: break-word;
                    border: 1px solid #edf2f9;
                    border-radius: .5rem;
                    background-color: #fff;
                    background-clip: border-box;
                }

                .card-body {
                    padding: .7rem;
                    /*                    flex: 1 1 auto;*/
                }

            </style>


            <div class="row " id="grid-users">

            </div>

            <br>

            <h6 class="text-disabled"><small class="fa fa-lock"></small> Locked Users (<span id="locked-users-count"></span>)</h6>
            <hr>
            <div class="row" id="grid-locked-users">

            </div>
        </div>
        <br>
        <br>



    </div>
    <div class="c-footer pl-4 text-right">
        <div class="c-footer pl-4 text-right">
            <?php echo $timeLeftFooter; ?>
        </div>>


    </div>


    <?php include 'modals/new-user.php'?>
    <script>
        var data;
        var data_locked;
        var total_users;
        var locked_users = 0;
        var allUsers;
        var user_id = <?php echo $user_id;?>; //start from here

        $(function() {
            getUsers();



        });



        $('#property').change(function() {


            getUsers();
        });

        function getUsers() {


            var property_id = $('#property').val();

            $.get("src/get.php", {
                token: "get_users_table",
                property_id: property_id
            }, function(response) {
                //alert(response);
                allUsers = response;
                setUsers(response)
                //  data = response;
                //  setBranches(data);
                // data = JSON.parse(response);
                // alert(data.company_name)
            });

        }


        function save_user() {


            var name = $('#new-user #name').val()
            var email = $('#new-user #email').val()
            var phone = $('#new-user #phone').val()
            var role = $('#new-user #role').val()
            var property = $('#new-user #property option:selected').val()
            var password = Math.random().toString(36).slice(-6).toUpperCase();


            var data = {
                "name": name,
                "phone": phone,
                "email": email,
                "role": role,
                "password": password,
                "property_id": property
            }

            if (!(inputsEmpty("#form-new-user"))) {
                $.post("src/save.php", {
                    page: "users",
                    result: JSON.stringify(data)
                }, function(response) { // alert(response); alertify .alert("Sucessfully added "+name, function(){ //alertify.message('OK'); window.location.reload(); });
                    $('#new-user').modal('hide')
                    getUsers()
                })
            }
        }

        function deleteUser(id, name) {
            alertify.confirm('Confirm Delete', 'Delete ' + name + '?', function() {

                    $.post("src/delete.php", {
                        "reference": "id",
                        "token": "users_tb",
                        "data": id
                    }, function(response) {
                        if (response == "success") {
                            window.location.reload();
                            alertify.success(name + ' Deleted');
                        } else {
                            alertify.error(response);
                        }
                    })

                    // alertify.success('Ok')
                },
                function() {
                    alertify.error('Canceled')
                }).set('labels', {
                ok: 'DELETE',
                cancel: 'CANCEL'
            });
        }


        //  var ud = '[{"id":2,"name":"Allen Nakibuuka", "role":"Receptionist", "status":"online", "image":"allen.jpg"},{"id":2,"name":"Joan Birungi", "role":"Manager", "status":"offline", "image":"allen.jpg"},{"id":2,"name":"Joan Birungi", "role":"Manager", "status":"offline", "image":"allen.jpg"}]';

        /**  try {
              setUsers(ud);
          setLockedUsers(ud);
          }catch(e){
              console.log(e)
          } **/

        function setUsers(data) {

            var users = JSON.parse(data);
            console.log(users);
            var total_users = users.length;
            console.log(total_users)
            var grid = "";
            var grid_locked = "";
            $.each(users, function(i, user) {

                var role;
                var hideall = ""
                var disablelock = ""
                var hidelock = ""
                switch (user.role) {
                    case "1":
                        role = "Administrator";

                        break;
                    case "2":
                        role = "Reservations Manager";
                        break;
                    case "3":
                        role = "Lodge Manager";
                        break;
                    case "4":
                        role = "Receptionist";
                        break;
                    case "5":
                        role = "Sales Consultant";
                        break;
                    case "6":
                    role = "Accountant";
                    break;
                    case "7":
                    role = "Reservations";
                    break;
                    default:
                        role = "No Role Assigned";

                }

                if (user.id == user_id) {
                    hidelock = 'style="display:none;"'
                } else if ((user.role == 1)) {
                    hideall = "hide"
                }

                if (user.locked == 1) {

                    locked_users++;

                    var status = user.status == "online" ? '<i class="fa fa-circle text-green"></i> online' : '<i class="fa fa-circle text-disabled"></i> offline';
                    grid_locked += '<div class="col-md-3">';
                    grid_locked += '<div class="carde-container locked">';
                    grid_locked += '<div class="card">';
                    grid_locked += '<div class="front">';
                    grid_locked += '<div class="cover" style="">';

                    grid_locked += '</div>';
                    grid_locked += '<div class="user">';
                    grid_locked += '<img class="img-circle" src="img/profiles/profile.png' + user.image + '" />';
                    grid_locked += '</div>';
                    grid_locked += '<div class="content">';
                    grid_locked += '<div class="main">';
                    grid_locked += '<h3 class="name">' + user.name + '</h3>';


                    grid_locked += '<p class="profession">' + role + '<br> <small>' + status + '</small></p>';

                    grid_locked += '</div>';
                    grid_locked += '<div class="footer">';
                    grid_locked += '<button class="btn btn-simple" onclick="rotateCard(this)">';
                    grid_locked += '<i class="fa fa-pencil btn-circle"  onclick="editUser(\'' + i + '\')"> </i>  <i class="fa fa-lock btn-circle"  title="Lock ' + user.name + '"> </i>  <i class="fa fa-times btn-circle" onclick="deleteUser(\'' + user.id + '\', \'' + user.name + '\')" title="delete ' + user.name + '"></i>';
                    grid_locked += '</button>';
                    grid_locked += '</div>';
                    grid_locked += '</div>';
                    grid_locked += '</div>';

                    grid_locked += '<div class="overlay" onclick="unlockUser(\'' + user.id + '\', \'' + user.name + '\')"><div class="content"><h4><i class="fa fa-lock"></i> <small>user locked</small></h4><a class="btn btn-primary btn-sm"><i class="fa fa-unlock" onclick="unlockUser(\'' + user.id + '\', \'' + user.name + '\')"></i> unlock user</a></div></div>';
                    grid_locked += '</div>';
                    grid_locked += '</div>';
                    grid_locked += '</div>';
                } else {
                    var status = user.status == "online" ? '<i class="fa fa-circle text-green"></i> online' : '<i class="fa fa-circle text-disabled"></i> offline';
                    grid += '<div class="col-md-3 ' + hideall + '" style="margin-bottom: 8px;">';
                    grid += '<div class="carde-container ">';
                    grid += '<div class="card">';
                    grid += '<div class="front">';
                    grid += '<div class="cover" style="">';

                    grid += '</div>';
                    grid += '<div class="user">';
                    grid += '<img class="img-circle" src="img/profiles/profile.png' + user.image + '" />';
                    grid += '</div>';
                    grid += '<div class="content">';
                    grid += '<div class="main">';
                    grid += '<h3 class="name">' + user.name + '</h3>';
                    grid += '<p class="profession">' + role + '<br> <small>' + status + '</small></p>';

                    grid += '</div>';
                    grid += '<div class="footer">';
                    grid += '<button class="btn btn-simple" onclick="rotateCard(this)">';
                    grid += '<i class="fa fa-pencil btn-circle"  onclick="editUser(\'' + i + '\')"> </i>  <i class="fa fa-lock btn-circle " ' + hidelock + ' onclick="lockUser(\'' + user.id + '\', \'' + user.name + '\')"  title="Lock ' + user.name + '"> </i>  <i class="fa fa-times btn-circle " ' + hidelock + ' onclick="deleteUser(\'' + user.id + '\', \'' + user.name + '\')" title="delete ' + user.name + '"></i>';
                    grid += '</button>';
                    grid += '</div>';
                    grid += '</div>';
                    grid += '</div>';

                    grid += '</div>';
                    grid += '</div>';
                    grid += '</div>';
                }
            });


            $("#grid-users").html(grid);
            $("#grid-locked-users").html(grid_locked);
            $("#locked-users-count").text(locked_users);
        }

        function lockUser(id, name) {

            var data = {
                "locked": 1
            }

            alertify.confirm("Lock " + name + "?", name + " will not be able to access the system.",
                function() {
                    $.post("src/update.php", {
                        "reference": id,
                        page: "lock-user",
                        "result": JSON.stringify(data),
                        "col_name": "id"
                    }, function(response) {

                        //                        alert(response)
                        if (response == "success") {

                            alertify.success(name + ' Locked');
                            location.reload(true);
                        } else {
                            alertify.error(response);
                        }
                    })

                },
                function() {
                    alertify.error('Cancelled');
                }).set('labels', {
                ok: 'LOCK',
                cancel: 'CANCEL'
            });

        }


        function unlockUser(id, name) {

            var data = {
                "locked": 0
            }

            alertify.confirm("UnLock " + name + "?", name + " will now be able to access the system.",
                function() {
                    $.post("src/update.php", {
                        "reference": id,
                        page: "lock-user",
                        "result": JSON.stringify(data),
                        "col_name": "id"
                    }, function(response) {
                        if (response == "success") {

                            alertify.success(name + ' Successfully Unlocked');
                            location.reload(true);
                        } else {
                            alertify.error(response);
                        }
                    })

                },
                function() {
                    alertify.error('Cancelled');
                }).set('labels', {
                ok: 'UNLOCK',
                cancel: 'CANCEL'
            });

        }

        /**  function setLockedUsers(data) {
          
              var users = JSON.parse(data);
              var grid = "";
              $.each(users, function(i, user) {
                  var status = user.status =="online"? '<i class="fa fa-circle text-green"></i> online' : '<i class="fa fa-circle text-disabled"></i> offline';
                  grid += '<div class="col-md-3">';
                  grid += '<div class="carde-container locked">';
                  grid += '<div class="card">';
                  grid += '<div class="front">';
                  grid += '<div class="cover" style="background:#f0f0f0">';

                  grid += '</div>';
                  grid += '<div class="user">';
                  grid += '<img class="img-circle" src="img/profiles/' + user.image + '" />';
                  grid += '</div>';
                  grid += '<div class="content">';
                  grid += '<div class="main">';
                  grid += '<h3 class="name">' + user.name + '</h3>';
                  grid += '<p class="profession">' + user.role + '<br> <small>'+status+'</small></p>';

                  grid += '</div>';
                  grid += '<div class="footer">';
                  grid += '<button class="btn btn-simple" onclick="rotateCard(this)">';
                  grid += '<i class="fa fa-pencil btn-circle"  data-toggle="modal" data-target="#new-user"> </i>  <i class="fa fa-lock btn-circle"  title="Lock '+user.name+'"> </i>  <i class="fa fa-times btn-circle" onclick="deleteUser(\''+user.id+'\', \''+user.name+'\')" title="delete '+user.name+'"></i>';
                  grid += '</button>';
                  grid += '</div>';
                  grid += '</div>';
                  grid += '</div>';
                  
                  grid +='<div class="overlay"><div class="content"><h4><i class="fa fa-lock"></i> <small>user locked</small></h4><a class="btn btn-primary btn-sm"><i class="fa fa-unlock"></i> unlock user</a></div></div>';
                  grid += '</div>';
                  grid += '</div>';
                  grid += '</div>';
              });
              
             $("#locked-users-count").text(total_users);
             $("#grid-locked-users").html(grid); 
          } **/


        function adduser() {
            var m = $('#new-user');

            m.find("#name").val("");
            m.find("#email").val("");
            m.find("#phone").val("");
            m.find("#role").val("");
            m.find("#property").val(0);


            m.find("#property").removeAttr('disabled')
            m.find("#role").removeAttr('disabled')
        }

        function editUser(i) {
            //        alert(i);
            var user = JSON.parse(allUsers)[i];
            //   alert(user);
            var m = $('#new-user');

            //        var user_id = user.id;


            m.find("#name").val(user.name);
            m.find("#email").val(user.email);
            m.find("#phone").val(user.phone);
            m.find("#role").val(user.role);
            m.find("#property").val(user.property_id);

            var user_id = <?php echo $user_id;?>;
            if (user_id == user.id) {
                m.find("#property").attr('disabled', 'disabled');
                m.find("#role").attr('disabled', 'disabled');
            } else {
                m.find("#property").removeAttr('disabled')
                m.find("#role").removeAttr('disabled')
            }

            // m.find('#property option[value="' + myText + '"]');.

            m.find('.modal-title').html("<i class='fa fa-pencil'></i> Edit User");
            m.find('.savebtn').attr('onClick', 'updateUser(' + user.id + ')');
            m.modal("show")
        }


        function updateUser(id) {
            //  alert(id);


            $('#new-user').modal('hide')

            var name = $('#new-user #name').val()
            var email = $('#new-user #email').val()
            var phone = $('#new-user #phone').val()
            var role = $('#new-user #role').val()
            var property = $('#new-user #property option:selected').val()



            // alert(property);
            var data = {
                "name": name,
                "phone": phone,
                "email": email,
                "role": role,
                "property_id": property
            }


            $.post("src/update.php", {
                page: "users",
                "reference": id,
                result: JSON.stringify(data)
            }, function(response) {
                //alert(response);
                alertify
                    .alert(name + "'s Information Edited Succesfully", function() {
                        // alertify.message('OK');
                        window.location.reload();
                    });

            })



        }

    </script>
