<?php include 'header.php'; ?>


    <!-- Begin page content -->
    <main class="flex-shrink-0 main">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="btn btn-40 btn-link back-btn" type="button">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">
                    <a class="navbar-brand" href="#">
                        <h5 class="mb-0">Language</h5>
                    </a>
                </div>
                <div class="ml-auto col-auto">
                    <a href="profile.html" class="avatar avatar-30 shadow-sm rounded-circle ml-2">
                        <figure class="m-0 background">
                            <img src="img/user1.png" alt="">
                        </figure>
                    </a>
                </div>
            </div>
        </header>

        <!-- page content start -->

        <div class="main-container">
            <div class="container">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-auto">
                                <div class="avatar avatar-50 bg-default-light text-default rounded">
                                    <span class="material-icons">language</span>
                                </div>
                            </div>
                            <div class="col align-self-center pl-0">
                                <h6 class="mb-1">Choose Language</h6>
                                <p class="text-secondary">Select preffered language</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 px-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="custom-control custom-switch">
                                    <input type="radio" name="language" class="custom-control-input" id="customSwitch1" checked>
                                    <label class="custom-control-label" for="customSwitch1">English</label>
                                </div>
                            </li>
                            <!-- <li class="list-group-item">
                                <div class="custom-control custom-switch">
                                    <input type="radio" name="language" class="custom-control-input" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2">Spanish</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="custom-control custom-switch">
                                    <input type="radio" name="language" class="custom-control-input" id="customSwitch3">
                                    <label class="custom-control-label" for="customSwitch3">French</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="custom-control custom-switch">
                                    <input type="radio" name="language" class="custom-control-input" id="customSwitch4">
                                    <label class="custom-control-label" for="customSwitch4">Arabi</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="custom-control custom-switch">
                                    <input type="radio" name="language" class="custom-control-input" id="customSwitch5">
                                    <label class="custom-control-label" for="customSwitch5">Hindi</label>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php include 'footer.php'; ?>