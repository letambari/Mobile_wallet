<?php
session_start();
$card_number= htmlspecialchars($_POST["card_number"]);
// $card_number_4 = htmlspecialchars($_POST["card_number_4"]);
$name_on_card = htmlspecialchars($_POST["name_on_card"]);
$month = htmlspecialchars($_POST["month"]);
$year = htmlspecialchars($_POST["year"]);
$cvv = htmlspecialchars($_POST["cvv"]);


$connection = new mysqli("localhost:8889", "root", "root", "money_talks");

$card_number = $connection->real_escape_string($card_number);  	
//$first_4digits = $connection->real_escape_string($card_number_4); 
$name_on_card = $connection->real_escape_string($name_on_card);  		
$month = $connection->real_escape_string($month);
$year = $connection->real_escape_string($year);
$cvv = $connection->real_escape_string($cvv);

// singlebyte strings
$card_number_6 = substr($card_number, 0, 6);

// multibyte strings
$result = mb_substr($myStr, 0, 5);

// password encryption
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


  $original_string = $card_number;
  $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
  $card_number = encrypt($original_string,$private_secret_key);

  $original_string = $name_on_card;
  $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
  $ename_on_card = encrypt($original_string,$private_secret_key);

  $original_string = $month;
  $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
  $month = encrypt($original_string,$private_secret_key);

  $original_string = $year;
  $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
  $year = encrypt($original_string,$private_secret_key);

  $original_string = $cvv;
  $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
  $cvv = encrypt($original_string,$private_secret_key);

  //exit();



$customer_id = $_SESSION['user_email'];

if($card_number == '' || $name_on_card == '' || $month == '' || $year == '' || $cvv == ''){

    echo '<div class="alert alert-danger">
    <b>Ooops!</b> Please fill in all details.
</div>';

} else { 

          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/card-bins/$card_number_6",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "Authorization: Bearer FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X"
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          // echo $response;

                    // exit();
                    $res = json_decode($response);
                    $api_status = $res->status;

                    if($api_status == 'success')
                    {
                      $issuing_country = $res->data->issuing_country;
                      $original_string = $issuing_country;
                      $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
                      $issuing_country = encrypt($original_string,$private_secret_key);

                      $bin = $res->data->bin;
                      $original_string = $bin;
                      $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
                      $bin = encrypt($original_string,$private_secret_key);


                      $issuer_info = $res->data->issuer_info;
                      $original_string = $issuer_info;
                      $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
                      $issuer_info = encrypt($original_string,$private_secret_key);

                      $card_type = $res->data->card_type;
                      $original_string = $card_type;
                      $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
                      $card_type = encrypt($original_string,$private_secret_key);
   

                        // insert into the cards table
                        $servername = "localhost:8889";
                        $username = "root";
                        $password = "root";
                        $dbname = "money_talks";

                        try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $card_id = $name_on_card.'_'.$card_number_6;

                        $get_cards = "SELECT card_id, customer_id FROM added_cards WHERE card_id = '$card_id' AND customer_id = '$customer_id'";
                        $query_card = mysqli_query($connection, $get_cards);
                        $check_count = mysqli_num_rows($query_card);

                                if($check_count > 0){
                                      echo '<div class="alert alert-danger">
                                      <b>Ooops!</b> This card is already saved and secured.
                                  </div>';
                                } else {

                                  $date_added = date("Y-m-d h:i:sa", $d);
                                  $sql = "INSERT INTO added_cards (card_id, customer_id, card_number, name_on_card, card_month, card_year, cvv, issuing_country, bin, card_type, issuer_info, added_date, removed)
                                  VALUES ('$card_id', '$customer_id', '$card_number', '$ename_on_card', '$month', '$year', '$cvv', '$issuing_country', '$bin', '$card_type', '$issuer_info', NOW(), 0)";
                                  // use exec() because no results are returned
                                  $conn->exec($sql);
                                  echo '<div class="alert alert-success">
                                  <b>Hurray!</b> Your card is now safe and secured.
                                  </div>';
                                }
                        
                        


                        } catch(PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                        }
                    
                        // END OF INSERTING INTO cards TABLE USING PDO

                    $conn = null;

   
                      //echo $issuing_country;

            } else {

                echo '<div class="alert alert-danger">
                <b>Ooops!</b> There is some error in data you have entered. Please enter correct details.
                </div>';
                  }
        }
?>