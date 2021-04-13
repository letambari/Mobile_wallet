<?php include 'code.php'; 
$split_value = 0.0042;

?>
<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/withdraw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:38:43 GMT -->
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

<body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="withdraw">
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
                    <a class="navbar-brand" href="#">
                        <h5 class="mb-0">Payment Option</h5>
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

    <form method="post" action="pos.php">
        <div class="main-container">
            <div class="container mb-4">
                <p class="text-center text-secondary mb-1">Enter Amount</p>
                <div class="form-group mb-1">
                    
                </div>
                <p class="text-center text-secondary mb-4">Click the button and enter the amount</p>                
            </div>

            <div class="container text-center">
                <script src="https://checkout.flutterwave.com/v3.js"></script>
                <button type="button" onClick="makePayment()" class="btn btn-default mb-2 mx-auto rounded">Confirm</button>
            </div>

</form>
<script>
  function makePayment() {
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-7131468bd5538dd168a4cb06b5c7411a-X",
      tx_ref: "1617741005",
      amount: <?php echo json_encode($amount); ?>,
      currency: "NGN",
      payment_options: "card,ussd,barter",
      redirect_url: // specified redirect URL
        "http://localhost:8888/mobile_wallet/pos.php",
      customer: {
        email: "innocentdestiny228@gmail.com",
        phonenumber: "08102909304",
        name: "Oscar Kaliente",
      },
      subaccounts: [
        {
          id: "RS_44D6D0DD4B8CE75362200888671CC960",
          transaction_split_ratio:2,
          transaction_charge_type: "percentage",
          transaction_charge: <?php echo json_encode($split_value); ?>
        }
        
      ],
      callback: function (data) {
        console.log(data);
      },
      customizations: {
        title: "My store",
        description: "testing settlements",
        logo: "https://spheretechnologies.website/manager/assets/img/logo2.png",
      },
    });
  }
</script>
            
           
        </div>
  
    </main>

<?php include 'footer.php'; ?>