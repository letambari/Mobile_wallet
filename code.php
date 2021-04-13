<?php 

session_start();
$connection = new mysqli("localhost:8889", "root", "root", "money_talks");
if (isset($_SESSION['phone_number']) && isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];
    $phone_number = $_SESSION['phone_number'];
    $_SESSION['private_secret_key'] = '1fabcdefghijk4276388ad3214c87@@**3428dbef42243fkbjdbfhjbh@#$%^lmnopuvwxwz';

    function encrypt($message, $encryption_key){
        $key = hex2bin($encryption_key);
        $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
        $nonce = openssl_random_pseudo_bytes($nonceSize);
        $ciphertext = openssl_encrypt(
          $message, 
          'aes-256-ctr', 
          $key,
          OPENSSL_RAW_DATA,
          $nonce
        );
        return base64_encode($nonce.$ciphertext);
      }
      function decrypt($message,$encryption_key){
        $key = hex2bin($encryption_key);
        $message = base64_decode($message);
        $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');
        $plaintext= openssl_decrypt(
          $ciphertext, 
          'aes-256-ctr', 
          $key,
          OPENSSL_RAW_DATA,
          $nonce
        );
        return $plaintext;
      }
    
    // getting the user details
    $get_user = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($connection, $get_user);
    $countit = mysqli_num_rows($query);

    if($countit > 0){
       
        while($row = mysqli_fetch_array($query)){
            //$row = mysqli_fetch_assoc($query);
        
            $_SESSION['fullname'] = $fullname = $row['fullname'];
            $_SESSION['userID'] = $row['userID'];
            $account_password = $row['password'];
           
          //exit();
    } 

            // getting the transactions of this user
            $get_transactions = "SELECT SUM(charged_amount) AS charged_amount FROM transactions WHERE email = '$email'";
            $query_tranactions  = mysqli_query($connection, $get_transactions);
            $count_transaction = mysqli_num_rows($query_tranactions);

            while($row = mysqli_fetch_array($query_tranactions)){
                //$row = mysqli_fetch_assoc($query);
                $charged_amount = $row['charged_amount'];
                $sumed_currency = $row['currency'];

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

            $get_transactions = "SELECT * FROM transactions WHERE email = '$email'";
            $query_tranactions  = mysqli_query($connection, $get_transactions);
            $count_transaction = mysqli_num_rows($query_tranactions);

            if($count_transaction > 1){
            
                while($row = mysqli_fetch_array($query_tranactions)){
                    //$row = mysqli_fetch_assoc($query);
                    $charged_amount = $row['charged_amount'];
                    $sumed_currency = $row['currency'];
                    $trans_created_at = $row['trans_created_at'];
                    $trans_created_at = DATE($trans_created_at);
                    $narration = $row['narration'];
                  //exit();

                  $recent_transactions .= ' <div class="row align-items-center">
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
                      <h6 class="text-success">'.$sumed_currency.''.$charged_amount.'</h6>
                  </div>
              </div>';
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
                $cvv = substr($row['cvv'], 0, 1);
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
    

 ?>

<?php
}else{
     header("Location: home.php");
     exit();
}
 ?>