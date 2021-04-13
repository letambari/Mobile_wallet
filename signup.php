<?php 
session_start();

if (!isset($_SESSION['phone_number']) && !isset($_SESSION['user_email'])) {

 ?>

<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:39:27 GMT -->
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        
        /* Serialize the submitted form control values to be sent to the web server with the request */
        var formValues = $(this).serialize();
        
        // Send the form data using post
        $.post("receive.php", formValues, function(data){
            // Display the returned data in browser
            if(data == "success"){
                window.location.replace("transfer.php");
            } else{
                $("#result").html(data);
            }
        });
    });
});
</script>
</head>

<body class="body-scroll d-flex flex-column h-100 menu-overlay">
    <!-- screen loader -->
    <div class="container-fluid h-100 loader-display">
        <div class="row h-100">
            <div class="align-self-center col">
                <div class="logo-loading">
                    <div class="icon icon-100 mb-4 rounded-circle">
                        <img src="img/favicon144.png" alt="" class="w-100">
                    </div>
                    <h4 class="text-default">WIDA YOU</h4>
                    <p class="text-secondary">A popular P.H slang :)</p>
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




    <!-- Begin page content -->
    <main class="flex-shrink-0 main has-footer">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="btn btn-40 btn-link back-btn" type="button">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">

                </div>
                <div class="ml-auto col-auto align-self-center">
                    <a href="login.php" class="text-white">
                        Sign In
                    </a>
                </div>
            </div>
        </header>


        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                        <form>
                            <h2 class="font-weight-normal mb-5">Create new<br>account with us</h2>
                            <div id="result" style="color: white;"></div>
                            <div class="form-group float-label active">
                                <input type="text" name="fullname" class="form-control text-white" placeholder="Full Name">
                                <label class="form-control-label text-white">Full Name</label>
                            </div>
                            <div class="form-group float-label active">
                                <input type="email" name="email" class="form-control text-white" placeholder="Email">
                                <label class="form-control-label text-white">Email</label>
                            </div>
                            <div class="form-group float-label active">
                                <input type="text" name="phone_number" class="form-control text-white" placeholder="Phone Number">
                                <label class="form-control-label text-white">Phone Number</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <input type="password" name="password" class="form-control text-white ">
                                <label class="form-control-label text-white">Password</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <input type="password" name="confirm_password" class="form-control text-white ">
                                <label class="form-control-label text-white">Confirm Password</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">Agree to terms and condition</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- footer-->
    <div class="footer no-bg-shadow py-3">
        <div class="row justify-content-center">
            <div class="col">
                <input type="submit" value="Sign up" class="btn btn-default rounded btn-block">
            </div>
            <br>
           

        </div>
    </div>
    </form>


 
    <!-- Required jquery and libraries -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- cookie js -->
    <script src="js/jquery.cookie.js"></script>

    <!-- Swiper slider  js-->
    <script src="vendor/swiper/js/swiper.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="js/main.js"></script>
    <script src="js/color-scheme-demo.js"></script>


    <!-- page level custom script -->
    <script src="js/app.js"></script>

</body>


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:39:27 GMT -->
</html>
<?php
}else{
     header("Location: home.php");
     exit();
}
 ?>