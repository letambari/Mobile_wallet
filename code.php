<?php 

session_start();
include 'connect.php';
if (isset($_SESSION['phone_number']) && isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];
    $phone_number = $_SESSION['phone_number'];
    
    // getting the user details
    $get_user = "SELECT * FROM users WHERE email = '$email' AND phone_number = '$phone_number'";
    $query = mysqli_query($connection, $get_user);
    $countit = mysqli_num_rows($query);

    if($countit > 0){
       
        while($row = mysqli_fetch_array($query)){
            //$row = mysqli_fetch_assoc($query);
        
            $_SESSION['fullname'] = $fullname = $row['fullname'];
            $_SESSION['userID'] = $row['userID'];
            $account_password = $row['password'];
            $acct_type = $row['acct_type'];
           
          //exit();
    } 

            //displaying the user account type
            if($acct_type == $the_acct_type1){
              
              $acct_type = 'User';
              $brandstate = '<a class="nav-link" href="agent_reg.php">
              <div>
                  <span class="material-icons icon">widgets</span>
                  Become An Agent
              </div>
              <span class="arrow material-icons">chevron_right</span>
          </a>';
          $earnings = '<h4 class="mb-1 font-weight-normal"></h4>
                  <p class="text-default-secondary">Settlements</p>';

            } elseif($acct_type == $the_acct_type2) {
              //getting the business name, if the user is a brand
              $userID = $_SESSION['userID'];
              $get_user = "SELECT * FROM sub_account WHERE userID = '$userID'";
              $query = mysqli_query($connection, $get_user);
              while($row = mysqli_fetch_array($query)){
                $business_name = $row['business_name'];
              }
              $acct_type = $business_name;
              $brandstate = '
              <li class="nav-item">
              <a class="nav-link " href="dashboard.php">
              <div>
                  <span class="material-icons icon">widgets</span>
                  <span class="badge badge-pill badge-success">Your Dashboard</span>
              </div>
              <span class="arrow material-icons">chevron_right</span>
              </a> 
              ';

              // geting the user business (sub-account details)

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://api.flutterwave.com/v3/subaccounts/{$userID}",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "GET",
                      CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer {$sphere}"
                      ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                    $res = json_decode($response);
                    if($res->status == 'success')
                    { 
                      $sub_account_id = $res->data->id;
                      $sub_account_number = $res->data->account_number;
                      $sub_account_bank = $res->data->account_bank;
                      $sub_account_business_name= $res->data->business_name;
                      $sub_account_full_name = $res->data->full_name;
                      $sub_account_created_at = $res->data->created_at;
                      $sub_account_account_id = $res->data->account_id;
                      $sub_split_ratio = $res->data->split_ratio;
                      $sub_split_type = $res->data->split_type;
                      $sub_split_value = $res->data->split_value;
                      $sub_subaccount_id = $res->data->subaccount_id;
                      $sub_account_bank_name = $res->data->bank_name;
                      $sub_account_country = $res->data->country;
                      $sub_account_country = json_decode($sub_account_country);

                    }else{
                      echo "no user found";
                    }

                    // getting the total amount of the sub-account
                    $curl = curl_init();

                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "{$app_url}/settlements?subaccount_id=RS_44D6D0DD4B8CE75362200888671CC960",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                          "Authorization: Bearer {$sphere}"
                        ),
                      ));

                      $response = curl_exec($curl);

                      curl_close($curl);
                      $array = json_decode($response, true);
                      $fl = $array['data'];//[0]; //['left'];

                      $get = json_encode($fl);

                      $sum = 0;
                      
                      foreach($fl as $x_value) {
                        "gross_amount=" . $x_value['gross_amount'];
                       
                         ''.$sum += $x_value['gross_amount'];
                         
                      }
                      //echo $sum;
                    
          
                    
                    // feching sub account detaisl
    
                    if(isset($_GET['settlementID'])){
                      // get all the settlements
                        $settlement = $_GET['settlementID'];  
                        $_SESSION['settlementID'] = $settlement;      
   
                      } else {
                        $single_settlement = "no transaction";
                      }

                      $earnings = '<h4 class="mb-1 font-weight-normal">'.$sumed_currency.' '.$sum.'</h4>
                      <p class="text-default-secondary">Settlements</p>';
                      $earnings2 = $sumed_currency.' '.$sum;
                      $earnings3 = $sum;
                    

            }else{
              $acct_type = 'Admin';

               // getting the total amount of the sub-account
               $curl = curl_init();

               curl_setopt_array($curl, array(
                 CURLOPT_URL => "{$app_url}/settlements",
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => "",
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 0,
                 CURLOPT_FOLLOWLOCATION => true,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => "GET",
                 CURLOPT_HTTPHEADER => array(
                   "Authorization: Bearer {$sphere}"
                 ),
               ));

               $response = curl_exec($curl);

               curl_close($curl);
               $array = json_decode($response, true);
               $fl = $array['data'];//[0]; //['left'];

               $get = json_encode($fl);

               $sum = 0;
               
               foreach($fl as $x_value) {
                 "gross_amount=" . $x_value['gross_amount'];
                
                  ''.$sum += $x_value['gross_amount'];
                  
               }
               //echo $sum;
            }




            // getting the sum transactions of this user
            $get_transactions = "SELECT SUM(charged_amount) AS charged_amount FROM transactions WHERE email = '$email'";
            $query_tranactions  = mysqli_query($connection, $get_transactions);
            $count_transaction = mysqli_num_rows($query_tranactions);

            while($row = mysqli_fetch_array($query_tranactions)){
                //$row = mysqli_fetch_assoc($query);
                $charged_amount = $row['charged_amount'];

               // echo $sumed_currency;
                
            }
            if($charged_amount < 0){
                $transaction_state = '<div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="mb-1">Your are yet to make a transaction</h6>
                        <p class="text-secondary">Tranaction Value: <span class="text-success">$ 0.00</span></p>

                    </div>
                </div>
                <div class="progress h-5 mt-3">
                    <div class="progress-bar bg-default" role="progressbar" style="width:35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>';
            } else {
                $transaction_state = '<div class="card-body">
                <div class="row">
                    <div class="col">
                        <!-- <h6 class="mb-1">Your wallet limits: $ 1000.00 /month</h6> -->
                        <p class="text-secondary">Tranaction Value:<span class="text-success"> N'.$charged_amount.'</span></p>

                    </div>
                </div>
                <!-- <div class="progress h-5 mt-3">
                    <div class="progress-bar bg-default" role="progressbar" style="width:35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> -->
            </div>';
            }

            // getting all the transactions 
            $get_transactions = "SELECT * FROM transactions WHERE email = '$email'";
            $query_tranactions  = mysqli_query($connection, $get_transactions);
            $count_transaction = mysqli_num_rows($query_tranactions);

            if($count_transaction > 1){
            
                while($row = mysqli_fetch_array($query_tranactions)){
                    //$row = mysqli_fetch_assoc($query);
                    $trans_id = $row['trans_id'];
                    $tx_ref = $row['tx_ref'];
                    $charged_amount = $row['charged_amount'];
                    $sumed_currency = $row['currency'];
                    $trans_created_at = $row['trans_created_at'];
                    $amount = $row['amount'];
                    $trans_created_at = DATE($trans_created_at);
                    $trans_created_at = substr($trans_created_at, 0, 10);
                    $narration = $row['narration'];
                    $is_favour = $row['is_favour'];

                    if($is_favour == 'Received'){
                      $is_favour = 'success';
                    } else {
                      $is_favour = 'danger';
                    }
                  //exit();
                 

                  $earnings = '<h4 class="mb-1 font-weight-normal">'.$sumed_currency.' '.$sum.'</h4>
                  <p class="text-default-secondary">Settlements</p>';

                  $recent_transactions .= ' <a href="transaction_details.php?tx_ref='.$trans_id.'">
                  <li class="list-group-item">
                  <div class="row align-items-center">
                  <div class="col-auto pr-0">
                      <div class="avatar avatar-40 rounded">
                          <div class="background">
                              <img src="img/user2.png" alt="">
                          </div>
                      </div>
                  </div>
                  <div class="col align-self-center pr-0">
                      <h6 class="font-weight-normal mb-1">'.$narration.'</h6>
                      <p class="small text-secondary">'.$trans_created_at.'</p>
                  </div>
                  <div class="col-auto">
                      <h6 class="text-'.$is_favour.'">'.$sumed_currency.''.$charged_amount.'</h6>
                  </div>
              </div>
              </li>
              </a>';
            } 
            
            } else {
                //echo "no";
            }
                
            //getting all the cards
            $getallcards = "SELECT * FROM added_cards WHERE customer_id = '$email' AND removed = 0";
            $query_cards = mysqli_query($connection, $getallcards);
            while($row = mysqli_fetch_array($query_cards)){
                
                $id = $row['id'];
                $card_id = $row['card_id'];
                $customer_id = $row['customer_id'];
                $card_number = decrypt($row['card_number'],$_SESSION['private_secret_key']);
                $name_on_card = decrypt($row['name_on_card'],$_SESSION['private_secret_key']);
                $card_month = decrypt($row['card_month'],$_SESSION['private_secret_key']);
                $card_year = decrypt($row['card_year'],$_SESSION['private_secret_key']);
                $card_year = substr($card_year, 2, 4);
                $card_type = decrypt($row['card_type'],$_SESSION['private_secret_key']);
                $cvv1 = decrypt($row['cvv'],$_SESSION['private_secret_key']);
                $cvv = substr($cvv1, 0, 1);
                $issuing_country = decrypt($row['issuing_country'],$_SESSION['private_secret_key']);
                $bin = decrypt($row['bin'],$_SESSION['private_secret_key']);
                $issuer_info = decrypt($row['issuer_info'],$_SESSION['private_secret_key']);
                $added_date = decrypt($row['added_date'],$_SESSION['private_secret_key']);

              $card_number_first_4 = substr($card_number, 0, 4);
              $card_number_last_4 = substr($card_number, 12, 16);
              $card_number = $card_number_first_4.' **** **** *'.$card_number_last_4;


              

                $virtual_cards3 .= '<div class="card border-0 mb-4 bg-default text-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-40 border-0 bg-white-light rounded-circle text-white">
                                <i class="material-icons vm text-template">credit_card</i>
                            </div>
                        </div>
                        <div class="col pl-0">
                            <h6 class="mb-1">'.$card_type.'</h6>
                            <p>Debit Card</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="mb-0 mt-3">'.$card_number.'</h4>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">'.$card_month.'/'.$card_year.'</p>
                            <p class="small ">Expiry date</p>
                        </div>
                        <div class="col-auto align-self-center text-right">
                            <p class="mb-0">'.$name_on_card.'</p>
                            <p class="small">Card Holder</p>
                        </div>
                    </div>
                </div>
            </div>';


            $virtual_cards .= '<div class="card">
            <div class="card__front card__part">
              <img class="card__front-square card__square" src="https://www.air-aventures.com/wp-content/themes/jupiter/assets/images/woocommerce/icons/credit-cards/mastercard.svg">
              <img class="card__front-logo card__logo" src="https://www.fireeye.com/partners/strategic-technology-partners/visa-fireeye-cyber-watch-program/_jcr_content/content-par/grid_20_80_full/grid-20-left/image.img.png/1505254557388.png">
              <p class="card_numer">'.$card_number.'</p>
              <div class="card__space-75">
                <span class="card__label">Card holder</span>
                <p class="card__info">'.$name_on_card.'</p>
              </div>
              <div class="card__space-25">
                <span class="card__label">Expires</span>
                      <p class="card__info">'.$card_month.'/'.$card_year.'</p>
              </div>
            </div>
            
            <a data-toggle="modal" data-target="#exampleModalCenter" class="class="btn btn-block btn-default rounded">
            <div class="card__back card__part">
              <div class="card__black-line"></div>
              <div class="card__back-content">
                <div class="card__secret">
                  <p class="card__secret--last">'.$cvv.'**</p>
                </div>
                <img class="card__back-square card__square" src="https://image.ibb.co/cZeFjx/little_square.png">
                <img class="card__back-logo card__logo" src="https://www.fireeye.com/partners/strategic-technology-partners/visa-fireeye-cyber-watch-program/_jcr_content/content-par/grid_20_80_full/grid-20-left/image.img.png/1505254557388.png">
                
              </div>
            </div>
            </a>
          </div>
         <br>';


         $virtual_cards2 .= ' <a href="display_card.php?card_id='.$card_id.'"  class="class="btn btn-block btn-default rounded"><div class="card">
            <div class="card__front card__part">
              <img class="card__front-square card__square" src="https://www.air-aventures.com/wp-content/themes/jupiter/assets/images/woocommerce/icons/credit-cards/mastercard.svg">
              <img class="card__front-logo card__logo" src="https://www.fireeye.com/partners/strategic-technology-partners/visa-fireeye-cyber-watch-program/_jcr_content/content-par/grid_20_80_full/grid-20-left/image.img.png/1505254557388.png">
              <p class="card_numer">'.$card_number.'</p>
              <div class="card__space-75">
                <span class="card__label">Card holder</span>
                <p class="card__info">'.$name_on_card.'</p>
              </div>
              <div class="card__space-25">
                <span class="card__label">Expires</span>
                      <p class="card__info">'.$card_month.'/'.$card_year.'</p>
              </div>
            </div>
            </a>
            
            <a href="display_card.php?card_id='.$card_id.'"  class="class="btn btn-block btn-default rounded">
            <div class="card__back card__part">
              <div class="card__black-line"></div>
              <div class="card__back-content">
                <div class="card__secret">
                  <p class="card__secret--last">'.$cvv.'**</p>
                </div>
                <img class="card__back-square card__square" src="https://image.ibb.co/cZeFjx/little_square.png">
                <img class="card__back-logo card__logo" src="https://www.fireeye.com/partners/strategic-technology-partners/visa-fireeye-cyber-watch-program/_jcr_content/content-par/grid_20_80_full/grid-20-left/image.img.png/1505254557388.png">
                
              </div>
            </div>
            </a>
          </div>
         <br>';

            

              
            }

        
              
}else {
        $fullname = "";
    }

    //getting a single transaction details from flutterwave

    if(isset($_GET['tx_ref'])){
     // echo 'found';
      $tx_ref = $_GET['tx_ref'];
      $get_transactions = "SELECT * FROM transactions WHERE trans_id = '$tx_ref'";
      $query_tranactions  = mysqli_query($connection, $get_transactions);
      $count_transaction = mysqli_num_rows($query_tranactions);

      if($count_transaction > 1){
      
          while($row = mysqli_fetch_array($query_tranactions)){
              //$row = mysqli_fetch_assoc($query);
              $trans_id = $row['trans_id'];
              $tx_ref = $row['tx_ref'];
              $charged_amount = $row['charged_amount'];
              $sumed_currency = $row['currency'];
              $trans_created_at = $row['trans_created_at'];
              $amount = $row['amount'];
              //$trans_created_at = DATE($trans_created_at);
              $month1 = explode ("-", $trans_created_at); 
              $trans_this_month = $month1[1];
              //$trans_this_month = substr($trans_created_at, 6, 7);
              $narration = $row['narration'];
              $is_favour = $row['is_favour'];
              $first_6digits = $row['first_6digits'];	
              $last_4digits = $row['last_4digits'];
              $issuer = $row['issuer'];
              $payment_type = $row['payment_type'];
              $type = $row['type'];

              $the_charged_amount = $charged_amount;
            //exit();


            $recent_transactions .= ' <a href="transaction_details.php?tx_ref='.$tx_ref.'">
            <li class="list-group-item">
            <div class="row align-items-center">
            <div class="col-auto pr-0">
                <div class="avatar avatar-40 rounded">
                    <div class="background">
                        <img src="img/user2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col align-self-center pr-0">
                <h6 class="font-weight-normal mb-1">'.$narration.'</h6>
                <p class="small text-secondary">'.$trans_created_at.'</p>
            </div>
            <div class="col-auto">
                <h6 class="text-'.$is_favour.'">'.$sumed_currency.''.$charged_amount.'</h6>
            </div>
        </div>
        </li>
        </a>';

         // getting the sum transactions of this user
         $get_transactions = "SELECT SUM(charged_amount) AS charged_amount FROM transactions WHERE email = '$email'";
         $query_tranactions  = mysqli_query($connection, $get_transactions);
         $count_transaction = mysqli_num_rows($query_tranactions);

         while($row = mysqli_fetch_array($query_tranactions)){
             //$row = mysqli_fetch_assoc($query);
             $charged_amount = $row['charged_amount'];
             //$sumed_currency = $row['currency'];

            // echo $sumed_currency;
             
         }
        
      } 
      
      } else {
          //echo "no";
      }
    }else {
      //echo 'no transaction found';
    }
    //exit();


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

$wallet = '<h4 class="mb-1 font-weight-normal" style="color: white;">'.$sumed_currency.' 0.00</h4>
<p class="text-default-secondary">Wallet</p>';
$wallet2 = $sumed_currency.' 0.0';
$wallet3 = 0.0; 
   

 ?>

<?php
}else{
     header("Location: home.php");
     exit();
}
 ?>