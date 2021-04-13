<?php include 'header2.php'; ?>
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
                        <h5 class="mb-0">Security Settings</h5>
                    </a>
                </div>
                <div class="ml-auto col-auto">
                    <a href="profile.php" class="avatar avatar-30 shadow-sm rounded-circle ml-2">
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
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-success-light text-success rounded mr-2"><span class="material-icons vm">account_circle</span></div>
                            User App Access
                        </h6>
                    </div>
                    <!-- <div class="card-body pt-0 px-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="security" class="custom-control-input" id="customSwitch1" checked>
                                    <label class="custom-control-label" for="customSwitch1">Active PIN Lock</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="security" class="custom-control-input" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2">Ask Password each time</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="security" class="custom-control-input" id="customSwitch3">
                                    <label class="custom-control-label" for="customSwitch3">Third Party Access</label>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-default-light text-default rounded mr-2"><span class="material-icons vm">lock</span></div>
                            Change Password
                        </h6>
                    </div>
                    <div id="result"></div>
                    <div class="card-body">
                        <form>
                        <div class="form-group float-label active">
                            <input type="password" class="form-control" value="<?php echo $account_password; ?>" disabled>
                            <label class="form-control-label">Current Password</label>
                        </div>
                        <div class="form-group float-label">
                            <input type="password" class="form-control" name="password" autofocus>
                            <label class="form-control-label">New Password</label>
                        </div>
                        <div class="form-group float-label">
                            <input type="password" name="confirm_password" class="form-control" >
                            <label class="form-control-label">Confirm New Password</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Update Password" class="btn btn-block btn-default rounded">
                    </div>
                    <form>
                </div>
                <!-- <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-primary-light text-primary rounded mr-2"><span class="material-icons vm">settings</span></div>
                            Change PIN
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group float-label active">
                            <input type="password" class="form-control" pattern=".{4,}" value="Password">
                            <label class="form-control-label">Current PIN</label>
                        </div>
                        <div class="form-group float-label">
                            <input type="password" class="form-control" pattern=".{4,}" >
                            <label class="form-control-label">New PIN</label>
                        </div>
                        <div class="form-group float-label">
                            <input type="password" class="form-control" pattern=".{4,}" >
                            <label class="form-control-label">Confirm New PIN</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-block btn-default rounded">Update PIN</button>
                    </div>
                </div> -->
                <!-- <p class="text-center text-secondary">5 devices and Apps runing on this account. We suggest to logout from any other devices to avaoide unrevokable situations.</p>
                <button class="btn btn-block btn-danger rounded">Logout from all devices</button> -->
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        
        /* Serialize the submitted form control values to be sent to the web server with the request */
        var formValues = $(this).serialize();
        
        // Send the form data using post
        $.post("change_password.php", formValues, function(data){
            // Display the returned data in browser
            $("#result").html(data);
        });
    });
});
</script>
    <!-- Required jquery and libraries -->
  <?php include 'footer.php'; ?>