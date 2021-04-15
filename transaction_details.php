<?php include 'header.php'; ?>
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
            <p class="text-default-secondary">Ask to scan this QR-Code<br>to accept money </p>
            <div class="avatar avatar-120 rounded mb-3">
                <div class="background">
                    <img src="img/QR.png" alt="">
                </div>
            </div>

            <h2 class="text-white"><?php echo $sumed_currency; ?><?php echo $the_charged_amount; ?></h2>
            <p class="text-white mb-4">Total Received</p>
        </div>

        <div class="main-container">
            <div class="container mb-4">
                <!-- <div class="row mb-4">
                    <div class="col-6">
                        <button class="btn btn-outline-default px-2 btn-block rounded"><span class="material-icons mr-1">qr_code_scanner</span> Share QR</button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-default px-2 btn-block rounded"><span class="material-icons mr-1">receipt_long</span> Send Bill</button>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="mb-1">Your wallet limits: <?php echo $sumed_currency; ?> <?php echo number_format($charged_amount); ?> /month</h6>
                                        <!-- <p class="text-secondary">Curreny month(<?php echo $trans_this_month; ?>) Received: <span class="text-success">$ 10.0</span></p> -->

                                    </div>
                                </div>
                                <div class="progress h-5 mt-3">
                                    <div class="progress-bar bg-default" role="progressbar" style="width:<?php echo $charged_amount; ?>%" aria-valuenow="<?php echo $charged_amount; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
            <!-- Swiper -->
            <!-- <div class="container mb-4">
                <div class="swiper-container swiper-users text-center ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card-body p-2">
                                    <div class="avatar avatar-60 rounded mb-1 bg-default-light">
                                        <span class="material-icons">add</span>
                                    </div>
                                    <p class="text-secondary"><small>Send</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="avatar avatar-60 rounded mb-1">
                                        <div class="background"><img src="img/user1.png" alt=""></div>
                                    </div>
                                    <p class="text-secondary"><small>Errica</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="avatar avatar-60 rounded mb-1">
                                        <div class="background"><img src="img/user2.png" alt=""></div>
                                    </div>
                                    <p class="text-secondary"><small>Alisia</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="avatar avatar-60 rounded mb-1">
                                        <div class="background"><img src="img/user3.png" alt=""></div>
                                    </div>
                                    <p class="text-secondary"><small>Maxsmith</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="avatar avatar-60 rounded mb-1">
                                        <div class="background"><img src="img/user4.png" alt=""></div>
                                    </div>
                                    <p class="text-secondary"><small>Jenelia</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Transaction Details</h6>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="list-group list-group-flush border-top border-color">

                        <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons">directions_car</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">Transaction ID</h6>
                                        <p class="text-secondary"><?php echo $trans_id; ?></p>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons">beach_access</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">first 6digits / Last 4digits</h6>
                                        <p class="text-secondary"><?php echo $first_6digits; ?> / <?php echo $last_4digits; ?></p>
                                    </div>
                                </div>
                            </a>
                           
                            <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons">home</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">Type / Issuer</h6>
                                        <p class="text-secondary"><?php echo $type; ?> / <?php echo $issuer; ?></p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons">devices</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">Payment Type</h6>
                                        <p class="text-secondary"><?php echo $payment_type; ?></p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons">receipt</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">Transaction Date</h6>
                                        <p class="text-secondary"><?php echo $trans_created_at; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- footer-->
   <?php include 'footer.php';?>