<?php 
session_start();

if (isset($_SESSION['phone_number']) && isset($_SESSION['user_email'])) {

 ?>
<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/transfer.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:38:43 GMT -->
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
        $.post("otp_verification.php", formValues, function(data){
            // Display the returned data in browser
            if(data == "success"){
                window.location.replace("welcome.php");
            } else{
                $("#result").html(data);
            }
            
        });
    });
});
</script>
</head>

<body class="body-scroll d-flex flex-column h-100 menu-overlay" >
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




    <!-- Begin page content -->
    <main class="flex-shrink-0 main">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <!-- <button class="btn btn-40 btn-link back-btn" type="button">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </button> -->
                </div>
                <div class="text-left col align-self-center">
                    <a class="navbar-brand" href="#">
                        <h5 class="mb-0">Verification</h5>
                    </a>
                </div>
                <!-- <div class="ml-auto col-auto">
                    <a href="profile.html" class="avatar avatar-30 shadow-sm rounded-circle ml-2">
                        <figure class="m-0 background">
                            <img src="img/user1.png" alt="">
                        </figure>
                    </a>
                </div> -->
            </div>
        </header>

        <div class="main-container">            
            <div class="container mb-4">
             
                <p class="text-center text-secondary mb-1">Enter the code sent to the below details</p>
                <div class="form-group mb-1">
                <p style="text-align: center"><?php echo $_SESSION["phone_number"].'<br>'.$_SESSION["user_email"]; ?></p> <br>
                </div>
                


                <form>
                <div id="result" style="color: white; text-align: center"></div>
                <div class="swiper-container categories2tab1 text-center mb-4">
                    <div class="swiper-wrapper" style="padding-left: 10px;">
                    
                        <div class="swiper-slide">
                            <input class="form-control" name="a" maxlength="1" size="5" placeholder="x">
                        </div>
                        <div class="swiper-slide">
                            <input class="form-control" name="b" maxlength="1" size="5" placeholder="x">
                        </div>
                        <div class="swiper-slide">
                            <input class="form-control" name="c" maxlength="1" size="5" placeholder="x">
                        </div>
                        <div class="swiper-slide">
                            <input class="form-control" name="d" maxlength="1" size="5" placeholder="x">
                        </div>
                       
                    </div>

                </div>
                
            </div>
            <div class="container text-center">
            <p class="text-center text-secondary mb-4"><a href='change_details'>Resend Code<hr></a>
            </div>

            <div class="container text-center">
            <p class="text-center text-secondary mb-4"><a href='change_details'>Edit Details</a>
            </div>
            
            
            <div class="container text-center">
                <!-- <a href="thank_you.html" class="btn btn-default mb-2 mx-auto rounded"></a> -->
                <input type="submit" value="Verify" class="btn btn-default mb-2 mx-auto rounded">
            </div>

        </form>
        </div>
    </main>


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


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/transfer.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:38:43 GMT -->
</html>
<?php
}else{
     header("Location: index.php");
     exit();
}
 ?>