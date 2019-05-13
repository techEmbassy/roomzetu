<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="css/text-color.css" rel="stylesheet" media="all">
    <style>
        .box {
            background-color: #fff;
            border-radius: 8px;
            border: 2px solid #e9ebef;
            padding: 30px;
            margin-bottom: 40px;
        }
        
        .box-title {
            margin-bottom: 30px;
            text-transform: uppercase;
            font-size: 23px;
            font-weight: 700;
            color: #102144;
            letter-spacing: 2px;
        }
        
        .plan-selection {
            border-bottom: 2px solid #e9ebef;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a class="brand" href="#">
                    <img src="../img/logo-white.png" alt="Lacel Technologies" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="images/avatar.jpg" alt="John Doe" />
                    </div>
                    <h4 class="name">Lacel Technologies</h4>
                    <a href="#">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas  fa-credit-card"></i>Billing Plans</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="../img/logo-white.png" alt="Lacel Technologies" />
                                </a>
                            </div>


                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">

                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>User account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>Request for License Renewal</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="../img/logo-white.png" alt="Lacel Technologies" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="images/avatar.jpg" alt="John Doe" />
                        </div>
                        <h4 class="name">Lacel Technologies</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="dashboard.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fas  fa-credit-card"></i>Billing Plans</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->



            <!-- STATISTIC-->
            <section class="statistic m-t-25">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>10</h2>
                                                <span>Companies</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-home"></i>
                                            </div>
                                            <div class="text">
                                                <h2>388</h2>
                                                <span>Properties</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-accounts"></i>
                                            </div>
                                            <div class="text">
                                                <h2>23</h2>
                                                <span>Users</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>$1,060</h2>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->


            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>Top Companies </h3>
                                        <!-- <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button> -->
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <p>You Have
                                                    <span>2</span> expired Lisence
                                                </p>
                                            </div>
                                            <div class="au-message-list">
                                                <div class="au-message__item unread" data-toggle="tooltip" data-placement="auto" title="License Expired">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="images/avatar.jpg" alt="John Doe" />
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Gorilla Safaries</h5>
                                                                <p><span class="badge badge-warning">Standard</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>$5,990</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item unread">
                                                    <div class="au-message__item-inner" data-toggle=" tooltip" data-placement="auto" title="License Expires in 6 Days">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="images/avatar.jpg" alt="John Doe" />
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Gorilla Safaries</h5>
                                                                <p><span class="badge badge-secondary">Standard</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>$5,990</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="images/avatar.jpg" alt="John Doe" />
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Gorilla Safaries</h5>
                                                                <p><span class="badge badge-info">Standard</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <h4>$5,990</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="images/avatar.jpg" alt="John Doe" />
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Michelle Sims</h5>
                                                                <p>Purus feugiat finibus</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>Sunday</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item js-load-item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="images/avatar.jpg" alt="John Doe" />
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Michelle Sims</h5>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>Yesterday</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item js-load-item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="images/avatar.jpg" alt="John Doe" />
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Michelle Sims</h5>
                                                                <p>Purus feugiat finibus</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>Sunday</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__footer">
                                                <button class="au-btn au-btn-load js-load-btn">load more</button>
                                            </div>
                                        </div>
                                        <div class="au-chat">
                                            <div class="au-chat__title">
                                                <div class="au-chat-info" style="display: inline;">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar avatar--small">
                                                            <img src="images/avatar.jpg" alt="John Doe" />
                                                        </div>
                                                    </div>
                                                    <span class="nick">
                                                            <a href="#">Gorilla Safaris</a>
                                                    </span>
                                                    <label class="float-right">
                                                        Expires On<br>
                                                    <span class="badge badge-info"> 2019-06-08</span>
                                                </label>

                                                </div>
                                            </div>
                                            <div class="au-chat__contenth text-center mt-5">
                                                <span class="pull-right ml-3 au-message__item_lisence"> <i class="fas fa-arrow-right fa-2x text-blue"></i></span>
                                                <label class=""> Lisences Generated</label>
                                                <table class="table table-striped" style="font-size: 12px;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">License</th>
                                                            <th scope="col">period<br><small>(days)</small></th>
                                                            <th scope="col">Created On</th>
                                                            <th scope="col">Used On</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>7Y8GF8G8FGF4G848</td>
                                                            <td>50</td>
                                                            <td>2019-04-09</td>
                                                            <td>Not Used</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>87Y4B847G4B87747G4</td>
                                                            <td>70</td>
                                                            <td>2019-04-09</td>
                                                            <td>2019-05-09</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>76GFYR76GI2YG364</td>
                                                            <td>270</td>
                                                            <td>2019-04-09</td>
                                                            <td>2019-05-09</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">4</th>
                                                            <td>76GFYR76GI2YG364</td>
                                                            <td>270</td>
                                                            <td>2019-04-09</td>
                                                            <td>Not Used</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">5</th>
                                                            <td>76GFYR76GI2YG364</td>
                                                            <td>270</td>
                                                            <td>2019-04-09</td>
                                                            <td>2019-05-09</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">6</th>
                                                            <td>76GFYR76GI2YG36</td>
                                                            <td>270</td>
                                                            <td>2019-04-09</td>
                                                            <td>2019-05-09</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">7</th>
                                                            <td>87Y4B847G4B87747G4</td>
                                                            <td>70</td>
                                                            <td>2019-04-09</td>
                                                            <td>2019-05-09</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">8</th>
                                                            <td>76GFYR76GI2YG364</td>
                                                            <td>270</td>
                                                            <td>2019-04-09</td>
                                                            <td>2019-05-09</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">9</th>
                                                            <td>76GFYR76GI2YG364</td>
                                                            <td>270</td>
                                                            <td>2019-04-09</td>
                                                            <td>2019-05-09</td>
                                                        </tr>

                                                    </tbody>
                                                </table>



                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url( 'images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>Billing</h3>
                                        <button class="au-btn-plus">
                                                <i class="zmdi zmdi-plus"></i>
                                            </button>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <p>Top Billing Plan Subscriptions</p>
                                        </div>
                                        <div class="au-task-list js-scrollbar3">
                                            <div class="au-task__item au-task__item--danger">
                                                <div class="au-task__item-inner">
                                                    <label class="task">
                                                        <a href="#">Standard</a>
                                                    </label>
                                                    <span class="badge badge-success float-right" style="font-size: 23px;">20</span><br>
                                                    <span class="time">$49.99/mo</span>
                                                </div>


                                            </div>
                                            <div class="au-task__item au-task__item--warning">
                                                <div class="au-task__item-inner">
                                                    <label class="task">
                                                        <a href="#">Standard</a>
                                                    </label>
                                                    <span class="badge badge-success float-right" style="font-size: 23px;">20</span><br>
                                                    <span class="time">$49.99/mo</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--primary">
                                                <div class="au-task__item-inner">
                                                    <label class="task">
                                                        <a href="#">Standard</a>
                                                    </label>
                                                    <span class="badge badge-success float-right" style="font-size: 23px;">20</span><br>
                                                    <span class="time">$49.99/mo</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Companies</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Date Joined</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-right">Users</th>
                                                <th class="text-center">Billing Plan</th>
                                                <th class="text-right">Active Lisence</th>
                                                <th class="text-right">Expiry Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-placement="top" title="Generate License for Gollira Safaris" data-toggle="modal" data-target="#licensemodal">
                                                <td>2018-09-29 05:57</td>
                                                <td class="text-center">Gollira Safaris</td>
                                                <td class="text-center">galai@gmail.com</td>
                                                <td class="text-right">12</td>
                                                <td class="text-center">Standard</td>
                                                <td class="text-center">LI6EH6YH7HR73FFF</td>
                                                <td class="text-center">2019-09-29 05:57
                                                    <p><span class="badge badge-success">Active</span></p>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td class="text-center">Gollira Safaris</td>
                                                <td class="text-center">galai@gmail.com</td>
                                                <td class="text-right">12</td>
                                                <td class="text-center">Standard</td>
                                                <td class="text-center">LI6EH6YH7HR73FFF</td>
                                                <td class="text-center">2019-09-29 05:57
                                                    <p><span class="badge badge-success" data-toggle="modal" data-target="#licensemodal">Active</span></p>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td class="text-center">Gollira Safaris</td>
                                                <td class="text-center">galai@gmail.com</td>
                                                <td class="text-right">12</td>
                                                <td class="text-center">Standard</td>
                                                <td class="text-center">LI6EH6YH7HR73FFF</td>
                                                <td class="text-center">2019-09-29 05:57
                                                    <p><span class="badge badge-success">Active</span></p>
                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2011 Lacel. All rights reserved. <a href="">Lacel</a>.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- modal scroll -->
    <div class="modal fade" id="licensemodal" tabindex="-1" role="dialog" aria-labelledby="licensemodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="licensemodalLabel">Generate License</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>
                <div class="modal-body px-5">
                    <div class="row m-b-25">
                        <div class="col-lg-3 ">
                            <img src="images/bg-title-01.jpg" alt="" />
                        </div>
                        <div class="col-lg-4 text-center">
                            <label><h3>Company Name</h3></label>
                            <label>alex@lacel.tech</label>
                            <label>+256700943112</label>
                        </div>
                        <div class="col-lg-5 text-right" style="font-size: 12px;">
                            <p>Billing Plan: <b>STANDARD</b></p>
                            <p>License: <b>JNIR899R7Y479HR74</b></p>
                            <p>EXPIRIES ON: <b> 2019-06-08</b></p>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box">
                                <h3 class="box-title">Select Billing Plan</h3>
                                <div class="plan-selection">
                                    <div class="plan-data">
                                        <input id="opt-1" name="period" type="radio" value=1 onchange="calamount(value)" checked/> <label for="opt-1" class="ml-2"> Standard</label>
                                    </div>
                                </div>
                                <div class="plan-selection">
                                    <div class="plan-data">
                                        <input id="opt-6" name="period" type="radio" class="with-font" value=6 onchange="calamount(value)" /> <label for="opt-12" class="ml-2"><label for="opt-6" class="ml-2">Gold</label>
                                    </div>
                                </div>
                                <div class="plan-selection">
                                    <div class="plan-data">
                                        <input id="opt-12" name="period" type="radio" class="with-font" value=12 onchange="calamount(value)" /> <label for="opt-12" class="ml-2"> Silver </label>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-6 bottom-align-item pt-5">
                            <div class="input-group mt-5">
                                <input class="form-control" type="number">
                                <div class=" input-group-prepend rs-select2--dark rs-select2--sm rs-select2--border">
                                    <select class="js-select2 au-select-dark" name="time">
                                        <option selected="selected">Days</option>
                                        <option value="">Months</option>
                                        <option value="">Years</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                            </div>



                            <h4 class="mt-5"> Total Amount : $ 4,000<b id="amount-total">
                                </b>
                            </h4>
                        </div>

                        <small class="text-red">Note: The Client will loose the remaining days if you Choose a different billing plan when your current plan has not yet expired</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success pull-right">Generate License</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal scroll -->

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->

<script type="text/javascript">
    function get_license() {
        var company_id_ = $('#company').val();
        var billing_plan_id = $('#billing_plan :selected').data('id');
        var amount_paid = parseFloat($('#amount').text().replace(/,/g, ''));
        var number_of_days = $('#period').val();
        $.post("../src/license.php", {
                action: "get_license",
                company_id_: company_id_,
                billing_plan_id: billing_plan_id,
                amount_paid: amount_paid,
                number_of_days: number_of_days
            },
            function(data) {
                if (data.length == 16)
                    $('#license-label').html("<span>LICENSE: <FONT color='red'>" + data + "</FONT></span><br> <small>Please copy the above license before you exit</small>")
                else
                    alert("failed to get license");
            });
        // alert(2)
    }

    function setAmount() {

        var price = $('#billing_plan :selected').val();
        var period = $('#period').val();
        var amount = price * period / 30;

        amount = parseFloat(amount).toFixed(2);
        amount = amount.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('#amount').html(amount)

    }
</script>
<?php
 $company = DB::query("SELECT c.id,c.company_name, c.billing_plan FROM company_tb c LEFT JOIN billing_tb b on b.id=c.billing_plan ");

 $companyOptions ="";
foreach($company as $c){
    
    $companyOptions .="<option value='".$c['id']."'>".$c['company_name']."</option>";
};

 $billing = DB::query("SELECT * FROM billing_plan_tb ");

 $billingOptions ="";
foreach($billing as $b){
    
    $billingOptions .="<option value='".$b['price']."' data-id='".$b['id']."'>".$b['code']."-".$b['title']."</option>";
};


?>