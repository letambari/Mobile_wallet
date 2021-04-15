<?php include 'code.php'; ?>
<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:36:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Finwallapp - Mobile HTML template</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="img/favicon180.png" sizes="180x180">
    <link rel="icon" href="img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- swiper CSS -->
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="analytics">
    <!-- screen loader -->
    <div class="container-fluid h-100 loader-display">
        <div class="row h-100">
            <div class="align-self-center col">
                <div class="logo-loading">
                    <div class="icon icon-100 mb-4 rounded-circle">
                        <img src="img/favicon144.png" alt="" class="w-100">
                    </div>
                    <h4 class="text-default">Finwallapp</h4>
                    <p class="text-secondary">Mobile HTML template</p>
                    <div class="loader-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- menu main -->
    <div class="main-menu">
        <div class="row mb-4 no-gutters">
            <div class="col-auto"><button class="btn btn-link btn-40 btn-close text-white"><span class="material-icons">chevron_left</span></button></div>
            <div class="col-auto">
                <div class="avatar avatar-40 rounded-circle position-relative">
                    <figure class="background">
                        <img src="img/user1.png" alt="">
                    </figure>
                </div>
            </div>
            <div class="col pl-3 text-left align-self-center">
                <h6 class="mb-1"><?php echo $fullname; ?></h6>
                <p class="text-default-secondary"><span class="badge badge-light"><?php echo $acct_type; ?></span></p>
            </div>
        </div>
        <div class="menu-container">
            <div class="row mb-4">
                <div class="col">
                    <h4 class="mb-1 font-weight-normal">$1548.00</h4>
                    <p class="text-default-secondary">My Balance</p>
                </div>
                <div class="col-auto">
                    <button class="btn btn-default btn-40 rounded-circle" data-toggle="modal" data-target="#addmoney"><i class="material-icons">add</i></button>
                </div>
            </div>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <div>
                            <span class="material-icons icon">account_balance</span>
                            Home
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="analytics.html">
                        <div>
                            <span class="material-icons icon">insert_chart</span>
                            Analytics
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="refer_friends.html">
                        <div>
                            <span class="material-icons icon">perm_contact_calendar</span>
                            Refer Friends
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cards.php">
                        <div>
                            <span class="material-icons icon">card_giftcard</span>
                            Virtual Cards
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transactions.php">
                        <div>
                            <span class="material-icons icon">money</span>
                            Tranactions
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="my_orders.html">
                        <div>
                            <span class="material-icons icon">shopping_bag</span>
                            My Orders
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="settings.php">
                        <div>
                            <span class="material-icons icon">settings</span>
                            Settings
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages.html">
                        <div>
                            <span class="material-icons icon">layers</span>
                            Pages
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <?php echo $brandstate; ?>
                </li>
            </ul>
            <div class="text-center">
                <a href="logout.php" class="btn btn-outline-danger text-white rounded my-3 mx-auto">Sign out</a>
            </div>
        </div>
    </div>
    <div class="backdrop"></div>


    <!-- Begin page content -->
    <main class="flex-shrink-0 main has-footer">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="menu-btn btn btn-40 btn-link" type="button">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">
                    <a class="navbar-brand" href="#">
                        <h5 class="mb-0">Finwallapp</h5>
                    </a>
                </div>
                <div class="ml-auto col-auto pl-0">
                    <button type="button" class="btn btn-link btn-40 colorsettings">
                        <span class="material-icons">color_lens</span>
                    </button>

                    <a href="notification.html" class=" btn btn-40 btn-link" >
                        <span class="material-icons">notifications_none</span>
                        <span class="counter"></span>
                    </a>
                    <a href="profile.html" class="avatar avatar-30 shadow-sm rounded-circle ml-2">
                        <figure class="m-0 background">
                            <img src="img/user1.png" alt="">
                        </figure>
                    </a>
                </div>
            </div>
        </header>

        <!-- page content start -->
        <div class="container mt-3 mb-4 text-center">
            <h2 class="text-white"><?php echo $sumed_currency; ?> <?php echo number_format($charged_amount); ?></h2>
            <p class="text-white mb-4">Total Transactions</p>
        </div>

        <div class="container text-center overflow-hidden">
            <canvas id="mixedchartjs"></canvas>
        </div>
        <div class="main-container">

            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="doghnutchart" class="mb-3"></canvas>
                                <p class="text-secondary mb-2">Income</p>
                                <h6><?php echo $sumed_currency; ?> <?php echo number_format($charged_amount); ?></h6>
                                <p class="text-success">10% <span class="material-icons small">call_made</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="doghnutchart3" class="mb-3"></canvas>
                                <p class="text-secondary mb-2">Expense</p>
                                <h6>$ 1200.00 </h6>
                                <p class="text-danger">-5% <span class="material-icons small">call_received</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 d-none d-md-block">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="doghnutchart4" class="mb-3"></canvas>
                                <p class="text-secondary mb-2">Send</p>
                                <h6>$ 2051.00</h6>
                                <p class="text-success">10% <span class="material-icons small">call_made</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 d-none d-md-block">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="doghnutchart5" class="mb-3"></canvas>
                                <p class="text-secondary mb-2">Received</p>
                                <h6>$ 1200.00 </h6>
                                <p class="text-danger">-5% <span class="material-icons small">call_received</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
            <!-- <div class="container mb-4">
                <div class="row mb-3">
                    <div class="col">
                        <h6 class="subtitle mb-0">Frequent Payments </h6>
                    </div>
                </div>
                <div class="swiper-container swiper-users ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-60 rounded mb-1">
                                                <div class="background"><img src="img/user1.png" alt=""></div>
                                            </div>
                                        </div>
                                        <div class="col pl-0">
                                            <p class="text-secondary mb-0"><small>Errica</small></p>
                                            <p class="mb-1">$1500 <small class="text-success">28% <span class="material-icons small">call_made</span></small></p>
                                            <p class="text-secondary small">25-06-2020 08:00pm</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-60 rounded mb-1">
                                                <div class="background"><img src="img/user2.png" alt=""></div>
                                            </div>
                                        </div>
                                        <div class="col pl-0">
                                            <p class="text-secondary mb-0"><small>Alisia</small></p>
                                            <p class="mb-1">$1500 <small class="text-danger">10% <span class="material-icons small">call_received</span></small></p>
                                            <p class="text-secondary small">25-06-2020 08:00pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-60 rounded mb-1">
                                                <div class="background"><img src="img/user3.png" alt=""></div>
                                            </div>
                                        </div>
                                        <div class="col pl-0">
                                            <p class="text-secondary mb-0"><small>Maxsmith</small></p>
                                            <p class="mb-1">$1500 <small class="text-success">28% <span class="material-icons small">call_made</span></small></p>
                                            <p class="text-secondary small">25-06-2020 08:00pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-60 rounded mb-1">
                                                <div class="background"><img src="img/user4.png" alt=""></div>
                                            </div>
                                        </div>
                                        <div class="col pl-0">
                                            <p class="text-secondary mb-0"><small>Jenelia</small></p>
                                            <p class="mb-1">$1500 <small class="text-success">28% <span class="material-icons small">call_made</span></small></p>
                                            <p class="text-secondary small">25-06-2020 08:00pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Swiper -->
            <!-- <div class="container mb-4">
                <div class="row mb-3">
                    <div class="col">
                        <h6 class="subtitle mb-0">Expensive Categories</h6>
                    </div>
                </div>
                <div class="swiper-container swiper-users">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide text-center">
                            <div class="avatar avatar-60 bg-default-light text-default rounded-circle">
                                <i class="material-icons">account_balance</i>
                            </div>
                            <p class="mt-2 mb-0">$1500 <small class="text-success">28% <span class="material-icons small">call_made</span></small></p>
                            <p class="small">Rent</p>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="avatar avatar-60  bg-default-light text-default rounded-circle">
                                <i class="material-icons">videogame_asset</i>
                            </div>
                            <p class="mt-2 mb-0">$540 <small class="text-success">5% <span class="material-icons small">call_made</span></small></p>
                            <p class="small mt-1">Gaming</p>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="avatar avatar-60  bg-default-light text-default rounded-circle">
                                <i class="material-icons">cake</i>
                            </div>
                            <p class="mt-2 mb-0">$800 <small class="text-danger">18% <span class="material-icons small">call_received</span></small></p>
                            <p class="small mt-1">Parties</p>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="avatar avatar-60  bg-default-light text-default rounded-circle">
                                <i class="material-icons">local_florist</i>
                            </div>
                            <p class="mt-2 mb-0">$1200 <small class="text-success">12% <span class="material-icons small">call_made</span></small></p>
                            <p class="small mt-1">Gardening</p>
                        </div>
                        <div class="swiper-slide text-center">
                            <div class="avatar avatar-60  bg-default-light text-default rounded-circle">
                                <i class="material-icons">camera</i>
                            </div>
                            <p class="mt-2 mb-0">$100 <small class="text-success">28% <span class="material-icons small">call_made</span></small></p>
                            <p class="small mt-1">Movies</p>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div> -->

            <div class="container">
                <div class="row mb-3">
                    <div class="col">
                        <h6 class="subtitle mb-0">Settlements</h6>
                    </div>
                    <div class="col-auto">
                        <!-- <a href="allpayment.html" class="float-right small">View All</a> -->
                </div>
                </div>
                <?php echo $recent_settlement; ?>
                <!-- <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="mb-1">$ 1548.00 </h5>
                                        <p class="text-secondary">20d to pay electricity bill</p>

                                    </div>
                                    <div class="col-auto pl-0">
                                        <button class="btn btn-40 bg-default-light text-default rounded-circle">
                                            <i class="material-icons">local_atm</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="progress h-5 mt-3">
                                    <div class="progress-bar bg-default" role="progressbar" style="width:35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="mb-1">$ 106.00</h5>
                                        <p class="text-secondary">33 days to pay gas bill</p>
                                    </div>
                                    <div class="col-auto pl-0">
                                        <button class="btn btn-40 bg-default-light text-default rounded-circle">
                                            <i class="material-icons">local_atm</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="progress h-5 mt-3">
                                    <div class="progress-bar bg-default" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </main>

    <!-- footer-->
    <div class="footer">
        <div class="row no-gutters justify-content-center">
            <div class="col-auto">
                <a href="index-2.html" class="">
                    <i class="material-icons">home</i>
                    <p>Home</p>
                </a>
            </div>
            <div class="col-auto">
                <a href="analytics.html" class="active">
                    <i class="material-icons">insert_chart_outline</i>
                    <p>Analytics</p>
                </a>
            </div>
            <div class="col-auto">
                <a href="wallet.html" class="">
                    <i class="material-icons">account_balance_wallet</i>
                    <p>Wallet</p>
                </a>
            </div>
            <div class="col-auto">
                <a href="shop.html" class="">
                    <i class="material-icons">shopping_bag</i>
                    <p>Shop</p>
                </a>
            </div>
            <div class="col-auto">
                <a href="profile.html" class="">
                    <i class="material-icons">account_circle</i>
                    <p>Profile</p>
                </a>
            </div>
        </div>
    </div>


    <!-- color settings style switcher -->
    <div class="color-picker">
        <div class="row">
            <div class="col text-left">
                <div class="selectoption">
                    <input type="checkbox" id="darklayout" name="darkmode">
                    <label for="darklayout">Dark</label>
                </div>
                <div class="selectoption mb-0">
                    <input type="checkbox" id="rtllayout" name="layoutrtl">
                    <label for="rtllayout">RTL</label>
                </div>
            </div>
            <div class="col-auto">
                <button class="btn btn-link text-secondary btn-round colorsettings2"><span class="material-icons">close</span></button>
            </div>
        </div>

        <hr class="mt-2">
        <div class="colorselect">
            <input type="radio" id="templatecolor1" name="sidebarcolorselect">
            <label for="templatecolor1" class="bg-dark-blue" data-title="dark-blue"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor2" name="sidebarcolorselect">
            <label for="templatecolor2" class="bg-dark-purple" data-title="dark-purple"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor4" name="sidebarcolorselect">
            <label for="templatecolor4" class="bg-dark-gray" data-title="dark-gray"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor6" name="sidebarcolorselect">
            <label for="templatecolor6" class="bg-dark-brown" data-title="dark-brown"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor3" name="sidebarcolorselect">
            <label for="templatecolor3" class="bg-maroon" data-title="maroon"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor5" name="sidebarcolorselect">
            <label for="templatecolor5" class="bg-dark-pink" data-title="dark-pink"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor8" name="sidebarcolorselect">
            <label for="templatecolor8" class="bg-red" data-title="red"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor13" name="sidebarcolorselect">
            <label for="templatecolor13" class="bg-amber" data-title="amber"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor7" name="sidebarcolorselect">
            <label for="templatecolor7" class="bg-dark-green" data-title="dark-green"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor11" name="sidebarcolorselect">
            <label for="templatecolor11" class="bg-teal" data-title="teal"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor12" name="sidebarcolorselect">
            <label for="templatecolor12" class="bg-skyblue" data-title="skyblue"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor10" name="sidebarcolorselect">
            <label for="templatecolor10" class="bg-blue" data-title="blue"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor9" name="sidebarcolorselect">
            <label for="templatecolor9" class="bg-purple" data-title="purple"></label>
        </div>
        <div class="colorselect">
            <input type="radio" id="templatecolor14" name="sidebarcolorselect">
            <label for="templatecolor14" class="bg-gray" data-title="gray"></label>
        </div>

    </div>




    <!-- Required jquery and libraries -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- cookie js -->
    <script src="js/jquery.cookie.js"></script>

    <!-- Swiper slider  js-->
    <script src="vendor/swiper/js/swiper.min.js"></script>

    <!-- chart js-->
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/chartjs/utils.js"></script>
    <script src="vendor/chartjs/chart-js-data.js"></script>

    <!-- Customized jquery file  -->
    <script src="js/main.js"></script>
    <script src="js/color-scheme-demo.js"></script>

    <!-- page level custom script -->
    <script src="js/app.js"></script>
</body>


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:36:28 GMT -->
</html>
