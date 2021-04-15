<?php include "header.php"; ?>
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
        <div class="container-fluid px-0">
            <div class="card overflow-hidden">
                <div class="card-body p-0 h-150">
                    <div class="background">
                        <img src="_img/profile_image.png" alt="" style="display: none;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid top-70 text-center mb-4">
            <div class="avatar avatar-140 rounded-circle mx-auto shadow">
                <div class="background">
                    <img src="_img/vector_profile.png" alt="">
                </div>
            </div>
        </div>

        <div class="container mb-4 text-center text-white">
            <h6 class="mb-1"><?php echo $fullname; ?></h6>
            <!-- <p>London, UK</p> -->
            <p class="mb-1"><?php echo $_SESSION['user_email']; ?></p>
            <p><?php echo $_SESSION['phone_number']; ?></p>
        </div>

        <div class="main-container">
            <div class="container mb-4">
                <div class="row mb-4">
                    <div class="col-6">
                        <button class="btn btn-outline-default px-2 btn-block rounded"><span class="material-icons mr-1">qr_code_scanner</span> Share QR</button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-default px-2 btn-block rounded"><span class="material-icons mr-1">receipt_long</span> Send Bill</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <?php echo $transaction_state; ?>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Business Details -->
           <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Business Details</h6>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="list-group list-group-flush border-top border-color">

                        <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons">house</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">Business Details</h6>
                                        <p class="text-secondary"><?php echo $sub_account_business_name; ?></p>
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
                                        <h6 class="mb-1">Account Name</h6>
                                        <p class="text-secondary"><?php echo $sub_account_full_name; ?></p>
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
                                        <h6 class="mb-1">Account Number</h6>
                                        <p class="text-secondary"><?php echo $sub_account_number; ?></p>
                                    </div>
                                </div>
                            </a>
                           
                            <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons"><img src="https://seeklogo.com/images/N/nigeria-flag-logo-3B3BBC7E77-seeklogo.com.png" height="50px" width="50px"></span>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">Country</h6>
                                        <p class="text-secondary"><?php echo $sub_account_country; ?></p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/GTBank_logo.svg/1200px-GTBank_logo.svg.png" height="50px" width="50px">devices</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">Bank</h6>
                                        <p class="text-secondary"><?php echo $sub_account_bank_name; ?></p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons"><img src="http://simpleicon.com/wp-content/uploads/Calendar-4.svg" height="50px" width="50px"></span>
                                            
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1">Transaction Date</h6>
                                        <p class="text-secondary"><?php echo $sub_account_created_at; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end of business details -->
        </div>
    </main>

    <!-- footer-->
   <?php include 'footer.php'; ?>