<?php 
session_start();
$connection = new mysqli("localhost:8889", "root", "root", "money_talks");
if (isset($_SESSION['phone_number']) && isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];
    $phone_number = $_SESSION['phone_number'];
    $get_user = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($connection, $get_user);
    $countit = mysqli_num_rows($query);
    if($countit > 0){
       
        while($row = mysqli_fetch_array($query)){
            //$row = mysqli_fetch_assoc($query);
        
            $fullname = $row['fullname'];
          //exit();
    } 
}else {
        $fullname = "";
    }
    

 ?>
<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/thank_you.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:39:27 GMT -->
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

<body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="thankyou">
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
                    <button class="btn btn-40 btn-link back-btn" type="button">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">

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
        <div class="main-container h-100">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 col-md-6 col-lg-4 align-self-center text-center my-3 mx-auto">
                       
                        <img src="_img/undraw_building_blocks_n0nc.png" alt="" class="mw-100 my-5">
                        <h4>Welcome Back!</h4>
                        <h6 class="text-secondary mb-3"><span style="color: green"><?php echo $fullname; ?> </span></h6>
                        <p class="text-secondary">Thank you for buying products your order will be delivered soon and we will notify you soon via your registered email address or phone number.</p>
                        <a href="index.php" class="btn btn-success">Come In</a>
                    </div>
                </div>
            </div>
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
    <!-- <script src="js/app.js"></script> -->

</body>


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/thank_you.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:39:27 GMT -->
</html>
<?php
}else{
     header("Location: index.php");
     exit();
}
 ?>