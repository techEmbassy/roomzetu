<div class="navmenu">
    <nav class="navbar">
        <a class="brand" href="dashboard"><img src="./img/logo-white.png"></a>
        <ul class="navmenu">

            <?php 
                $menuArray = array();
                $roles_array= array("Administrator","Reservations Manager","Lodge Manager","Receptionist","Sales Consultant","Accountant", "Reservations");
                array_push($menuArray, array("title"=>"Dashboard", "link"=>'dashboard', 'icon'=>'dashboard'));
                array_push($menuArray, array("title"=>"Reservations", "link"=>'reservations', 'icon'=>'circle-o'));
                array_push($menuArray, array("title"=>"Rooms", "link"=>'rooms', 'icon'=>'hotel'));

                array_push($menuArray, array("title"=>"Rates", "link"=>'rates', 'icon'=>'dollar'));

                
                
                if(!($role==3)){
                    array_push($menuArray, array("title"=>"Profiles", "link"=>'connections-agents', 'icon'=>'users'));
                }
                if(!($role==4)){
                    array_push($menuArray, array("title"=>"Reports", "link"=>'summary', 'icon'=>'pie-chart'));
                }
                if(!($role==3||$role==5||$role==6 || $role==4)){
                    array_push($menuArray, array("title"=>"Settings", "link"=>'setting', 'icon'=>'cog'));
                }
                
                $menu ="";
                $i=1;
                
                foreach($menuArray as $m){
                    $mLink = $m['link'];
                    $mTitle = $m['title'];
                    $mIcon = $m['icon'];
                    
                    if($mpos == $i){
                        $active="active";
                    }
                    
                    else{
                        $active="";
                    }
                    $menu.="<li class='$active nav-menu-link'><a href='$mLink'><i class='fa fa-$mIcon'></i> $mTitle</a></li>";
                    $i++;
                }
                
                echo $menu;
                ?>

        </ul>


        <style>
            .d-flex {
                display: -ms-flexbox !important;
                display: flex !important;
            }


            small,
            .small {
                font-size: 87.5%;
                font-weight: 400;
            }

            .lowercase {
                text-transform: capitalize !important;
            }

            .account-name {
                margin: 0;
                display: block;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                font-weight: 500;
                line-height: 1rem;
            }

            .account-description {
                font-size: .75rem;
                font-weight: 400;
                opacity: .7;
            }

        </style>
            <style>
    .loader-backdrop{
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.03);
        z-index: 100;
    }
        .loader-backdrop .loader{
            background: #fff;
            border-radius: 8px !important;
           
            font-size: 20pt;
            width: 80px;
            height: 80px;
            line-height: 80px;
            text-align: center;
            color: #dc940e;
            display: block;
            top: 40% !important;
            position: relative;
            margin: auto;
           
            box-shadow: 0 0 30px rgba(0,0,0,0.3)
            
            
    }
    </style>


        <ul class="navmenu navbar-right">
<!--
            <li class="dropdown">
                <a data-toggle="dropdown"><i class="fa fa-bell-o"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">

                </ul>
            </li>
-->


            <li class="nav-item dropdown">
                <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="account-summary pr-lg-2 d-none d-lg-block">
                    <span class="account-summary lowercase pr-lg-2 d-none d-lg-block">
                    <span class="account-name" id='user_name'> <?php if(isset($_SESSION['login']["user_name"]    )){ echo $_SESSION['login']["user_name"];}                    
                      $role_=$_SESSION['login']["role"]-1;;
                    ?></span>
                    <span class="account-description " id="type"><?php echo $roles_array[$role_]; //$role_?></span>
                  </span>
                  </span>
                
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                    <a class="dropdown-item lowercase" href="setting">Settings</a>
<!--
                    <a class="dropdown-item lowercase" href="#"> <i class="dropdown-icon fa fa-help-circle"></i> Need Help </a>
                    <div class="dropdown-divider"></div>
-->
                    <a class="dropdown-item lowercase" href="login?logout=1" onclick="logoutcookie()">Logout</a>

                </div>
            </li>

            <!--
<li class=" dropdown lowercase ">
    <a data-toggle="dropdown "><i class="fa fa-user "></i> &nbsp&nbsp<span id='user_name'><?php if(isset($_SESSION['login']["user_name"])){ echo $_SESSION['login']["user_name "];}?></span> &nbsp&nbsp<i class="fa fa-angle-down "></i></a>

</li>
-->
</ul>
</nav>
</div>
<script>
    function hidelazyload(){
        $(".loader-backdrop").remove();
    }
    function lazyload(){
       $("body").append("<div class='loader-backdrop'><div class='loader'><span class='fa fa-spin fa-spinner '></span></div></div>");
    }
    
    function logoutcookie() {

        var d = new Date();
        d.setTime(d.getTime() + (60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = " reservations-user-email='' ; " + expires + ";path=/ ";
        document.cookie = "reservations-user-password='' ; " + expires + ";path=/ ";


    }
    var yr = "<?php echo date('Y');?>";
    var loaderBig = "<div style='min-height:90vh;' class=' p-4'><p><i class='fa fa-spin fa-spinner'></i> Loading...</p></div>";

</script>
