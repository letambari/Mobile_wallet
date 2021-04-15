<?php include 'code.php'; 
$userID = $_SESSION['userID'];
if(isset($_GET['status']))
    {
        //* check payment status
        if($_GET['status'] == 'cancelled')
        {
            // echo 'YOu cancel the payment';
            header('Location: index.php');
        }
        elseif($_GET['status'] == 'successful')
        {
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: Bearer FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X"
                ),
              ));
              
              $response = curl_exec($curl);
              
              curl_close($curl);
            //   echo '<pre>';
            //   echo $response;
            //   echo '</pre>';

            //exit();
              
              $res = json_decode($response);
              if($res->status)
              {
                $id = $res->data->id;
                $tx_ref = $res->data->tx_ref;
                $flw_ref = $res->data->flw_ref;
                $device_fingerprint = $res->data->device_fingerprint;
                $currency = $res->data->currency;
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                $app_fee = $res->data->app_fee;
                $merchant_fee = $res->data->merchant_fee;
                $processor_response = $res->data->processor_response;
                $auth_model = $res->data->auth_model;
                $ip = $res->data->ip;
                $narration = $res->data->narration;
                $status = $res->data->status;
                $payment_type = $res->data->payment_type;
                $trans_created_at = $res->data->created_at;
                $account_id = $res->data->account_id;
                $amount_settled = $res->data->amount_settled;
                $first_6digits = $res->data->card->first_6digits;
                $last_4digits = $res->data->card->last_4digits;
                $issuer = $res->data->card->issuer;
                $country = $res->data->card->country;
	            $type = $res->data->card->type;
                $token = $res->data->card->token;
                $expiry = $res->data->card->expiry;
                $customer_id = $res->data->customer->id;
                $name = $res->data->customer->name;
                $phone_number = $res->data->customer->phone_number;
                $email = $res->data->customer->email;
                $cust_created_at = $res->data->customer->created_at;
                if($amountPaid >= $amountToPay)
                {
                        'Payment successful <br>';
                        'ID - '.$id.'<br>
                         tx_ref - '.$tx_ref.'<br>
                         flw_ref - '.$flw_ref.'<br>
                         device_fingerprint - '.$device_fingerprint.'<br>
                         currency - '.$currency.'<br>
                         Amount_to_pay - '.$amountToPay.'<br>
                         Amount_to_pay - '.$amountToPay.'<br>
                         App_fee - '.$app_fee.'<br>
                         Merchant_fee - '.$merchant_fee.'<br>
                         Processor_response - '.$processor_response.'<br>
                         Auth_model - '.$auth_model.'<br>
                         IP - '.$ip.'<br>
                         Narration - '.$narration.'<br>
                         Status - '.$status.'<br>
                         Payment_type - '.$payment_type.'<br>
                         trans_created_at - '.$created_at.'<br>
                         account_id - '.$account_id.'<br>
                         amount_settled - '.$amount_settled.'<br>
                         first_6digits - '.$first_6digits.'<br>
                         last_4digits - '.$last_4digits.'<br>
                         issuer - '.$issuer.'<br>
                         country - '.$country.'<br>
                         type - '.$type.'<br>
                         token - '.$token.'<br>
                         expiry - '.$expiry.'<br>
                         customer_id - '.$customer_id.'<br>
                         name - '.$name.'<br>
                         phone_number - '.$phone_number.'<br>
                         email - '.$email.'<br>
                         cust_created_at - '.$created_at;


                        // INSERTING INTO TRANSACTIONS TABLE USING PDO



                        try {
                        
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO transactions (trans_id, tx_ref, flw_ref, device_fingerprint, amount, currency, charged_amount, app_fee, merchant_fee, processor_response, auth_model, ip, narration, status, payment_type, trans_created_at, account_id, amount_settled, first_6digits, last_4digits, issuer, country, type, token, expiry, customer_id, name, phone_number, email, cust_created_at, confirmed_person, in_favour)
                        VALUES ('$id', '$tx_ref', '$flw_ref', '$device_fingerprint', '$amountPaid', '$currency', '$amountToPay', '$app_fee', '$merchant_fee', '$processor_response', '$auth_model', '$ip', '$narration', '$status', '$payment_type', '$trans_created_at', '$account_id', '$amount_settled', '$first_6digits', '$last_4digits', '$issuer', '$country', '$type', '$token', '$expiry', '$customer_id', '$name', '$phone_number', '$email', '$cust_created_at', '$userID', 'received')";
                        // use exec() because no results are returned
                        $conn->exec($sql);
                        $good_info = '<p class="text-center text-secondary mb-4">Weldone🎉, we all made it possible <img src="https://media2.giphy.com/media/3OsFzorSZSUZcvo6UC/giphy.gif" height="20px" width="20px"></p>';
                        } catch(PDOException $e) {
                        $bad_info = $sql . "<br>" . $e->getMessage();
                        }
                         // END OF INSERTING INTO TRANSACTIONS TABLE USING PDO


                        // insert into the customers table
                        try {
                        $sql = "INSERT INTO customers (customer_id, customer_name, customer_phone, customer_email, cust_created_at)
                        VALUES ('$customer_id', '$name', '$phone_number', '$email', '$cust_created_at')";
                        // use exec() because no results are returned
                        $conn->exec($sql);
                        $good_info = '<p class="text-center text-secondary mb-4">Weldone🎉, we all made it possible <img src="https://media2.giphy.com/media/3OsFzorSZSUZcvo6UC/giphy.gif" height="20px" width="20px"></p>';
                        } catch(PDOException $e) {
                        $bad_info = $sql . "<br>" . $e->getMessage();
                        }

                         // END OF INSERTING INTO customers TABLE USING PDO


                         // insert into the cards table
                        try {
                            $card_id = $name.'_'.$last_4digits;
                            $date_added = date("Y-m-d h:i:sa", $d);
                            $sql = "INSERT INTO card_table (card_id, customer_id, first_6digits, last_4digits, issuer, country, type, token, expiry, date_added)
                            VALUES ('$card_id', '$customer_id', '$first_6digits', '$last_4digits', '$issuer', '$country', '$type', '$token', '$expiry', '$date_added')";
                            // use exec() because no results are returned
                            $conn->exec($sql);
                            $good_info = '<p class="text-center text-secondary mb-4">Weldone🎉, we all made it possible <img src="https://media2.giphy.com/media/3OsFzorSZSUZcvo6UC/giphy.gif" height="20px" width="20px"></p>';
                            } catch(PDOException $e) {
                            $bad_info =  $sql . "<br>" . $e->getMessage();
                            }
    
                             // END OF INSERTING INTO cards TABLE USING PDO

                        $conn = null;
                                    
                           

                            //* Continue to give item to the user
                }
                else
                {
                    echo 'Fraud transaction detected';
                }
              }
              else
              {
                  echo 'Can not process payment';
              }
        }
    }

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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        
        /* Serialize the submitted form control values to be sent to the web server with the request */
        var formValues = $(this).serialize();
        
        // Send the form data using post
        $.post("pos_confirm.php", formValues, function(data){
            // Display the returned data in browser
            if(data == "success"){
                window.location.replace("index.php");
            } else{
                $("#result").html(data);
            }
        });
    });
});
</script>


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

        <form>
        <div class="main-container">
            <div class="container mb-4">
                <p class="text-center text-secondary mb-1"></p>
                <div class="form-group mb-1">
                <img src="_img/highfive.gif" alt="" class="mw-100 my-5">
                </div>
                <div id="result"></div>
                <?php echo $good_info; ?> 
                <input type="hidden" name="confirm" value="1">
                <input type="hidden" name="trans_id" value="<?php echo $txid; ?>">
                          
            </div>

            <div class="container text-center">
                <input type="submit" value="Confirm" class="btn btn-default mb-2 mx-auto rounded">
            </div>
        </form>

           
        </div>
  
    </main>

<?php include 'footer.php'; ?>