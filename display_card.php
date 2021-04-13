<?php include 'code.php'; 

if(isset($_GET['card_id'])){
    $card_id = $_GET['card_id'];

    $getallcards = "SELECT * FROM added_cards WHERE customer_id = '$email' AND card_id = '$card_id'";
            $query_cards = mysqli_query($connection, $getallcards);
            while($row = mysqli_fetch_array($query_cards)){
                
                $id = $row['id'];
                $card_ids = $row['card_id'];
                $customer_id = $row['customer_id'];
                $card_number = decrypt($row['card_number'],$_SESSION['private_secret_key']);
                $name_on_card = decrypt($row['name_on_card'],$_SESSION['private_secret_key']);
                $card_month = decrypt($row['card_month'],$_SESSION['private_secret_key']);
                $card_year = decrypt($row['card_year'],$_SESSION['private_secret_key']);
                $card_year = substr($card_year, 2, 4);
                $card_type = decrypt($row['card_type'],$_SESSION['private_secret_key']);
                $cvv1 = decrypt($row['cvv'],$_SESSION['private_secret_key']);
                $cvv = substr($row['cvv'], 0, 1);
                $issuing_country = decrypt($row['issuing_country'],$_SESSION['private_secret_key']);
                $bin = decrypt($row['bin'],$_SESSION['private_secret_key']);
                $issuer_info = decrypt($row['issuer_info'],$_SESSION['private_secret_key']);
                $added_date = decrypt($row['added_date'],$_SESSION['private_secret_key']);

              $card_number_first_4 = substr($card_number, 0, 4);
              $card_number_last_4 = substr($card_number, 12, 16);
              //$card_number = $card_number_first_4.' **** **** *'.$card_number_last_4;

}
$card_numbers = $card_numbers;
}

?>

<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/addcard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:39:08 GMT -->
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
        $.post("update_card.php", formValues, function(data){
            // Display the returned data in browser
            $("#result").html(data);
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
                        <h5 class="mb-0">Add Card</h5>
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
                
                <div id="result" style="color: red;"></div>
                <div class="card">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-primary-light text-primary rounded mr-2"><span class="material-icons vm">credit_card</span></div>
                             Credit/Debit card
                        </h6>
                    </div>
                <form>
                    <div class="card-body">
                        <div class="form-group float-label active">
                          
                            <input type="number" class="form-control" name="card_number" value="<?php echo $card_number; ?>">
                            <label class="form-control-label">Card Number</label>
                            <p class="form-text text-secondary text-right"><?php echo $card_type; ?> Card</p>
                        </div>

                        <div class="form-group float-label">
                            <input type="text" name="name_on_card" class="form-control " value="<?php echo $name_on_card; ?>">
                            <label class="form-control-label">Card Holder Name</label>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid card holder name.
                            </div>
                        </div>
                        <div class="form-group float-label active">
                            <div class="row">
                                <div class="col">
                                    <select class="form-control" name="month">
                                        <option value="<?php echo $card_month; ?>"><?php echo $card_month; ?></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="year">
                                    <option value="<?php echo $card_year; ?>"><?php echo $card_year; ?></option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                        <option>2026</option>
                                        <option>2027</option>
                                        <option>2028</option>
                                        <option>2029</option>
                                        <option>2030</option>
                                        <option>2031</option>
                                        <option>2032</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="cvv" value="<?php echo $cvv1; ?>">
                                </div>
                            </div>
                            <label class="form-control-label">Expiry month / year / Cvv</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        
                        <input type="submit" value="Update Card" class="btn btn-block btn-default rounded">
                        <a data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-block btn-warning rounded">Remove Card</a>
                    </div>
            </form>
                </div>
            </div>
        </div>
    </main>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
      <div id="result"></div>
        <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure?</h5>
      </div>
      
      <div class="modal-body">
      <div class="alert alert-warning">
                                  <b>Hey!</b> are you sure you want to remove this card?.
                                  </div>
        <input type="hidden" placeholder="Enter Password" name="card_id" class="form-control" value="<?php echo $card_id; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="remove_card.php?ref=<?php echo $card_id; ?>" class="btn btn-block btn-default rounded">Confirm</a>
      </div>

    </div>
  </div>
</div>


    <!-- end of modal -->
 
    
    <?php include 'footer.php'; ?>
