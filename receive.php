<?php
session_start();
$fullname = htmlspecialchars($_POST["fullname"]);
$email = htmlspecialchars($_POST["email"]);
$phone_number = htmlspecialchars($_POST["phone_number"]);
$password = htmlspecialchars($_POST["password"]);
$confirm_password = htmlspecialchars($_POST["confirm_password"]);

$connection = new mysqli("localhost:8889", "root", "root", "money_talks");
$firstName = $connection->real_escape_string($fullname);  		
$email = $connection->real_escape_string($email);  				
$password = sha1($connection->real_escape_string($password));  
//$confirm_password = sha1($connection->real_escape_string($confirm_password));
$confirm_password = sha1($connection->real_escape_string($confirm_password));


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
  $original_string = $confirm_password;
  $private_secret_key = '1fabcdefghijk4276388ad3214c87@@**3428dbef42243fkbjdbfhjbh@#$%^lmnopuvwxwz' ; //some random hex characters
  $confirm_password1 = encrypt($original_string,$private_secret_key);

  $password = $password;
  $private_secret_key = '1fabcdefghijk4276388ad3214c87@@**3428dbef42243fkbjdbfhjbh@#$%^lmnopuvwxwz' ; //some random hex characters
  $password1 = encrypt($password,$private_secret_key);
  //echo '<h3>Original String : '.$original_string.'</h3>';
  //echo '<h3>After Encryption : '.$encrypted.'</h3>';
  //echo '<h3>After Decryption : '.decrypt('9SnM+p6MCkVrD1SWbl4+zSjD8E6uwM8odyAR9HWTPqg=',$private_secret_key).'</h3>';


// check if password does not match

if($fullname == "" || $email == "" || $password == "" || $confirm_password == ""){
    echo '<p style="color: red">Please fill in all fields</p>'; 
} else {

        if($password != $confirm_password){

            echo '<p style="color: red">your password does not match</p>';  
        } else {

            $get_user = "SELECT * FROM users WHERE email = '$email' OR phone_number = '$phone_number'";
            $query = mysqli_query($connection, $get_user);
            $countit = mysqli_num_rows($query);

                if($countit > 0){
                    echo '<p style="color: red">User details already exists</p>';
                } else{
                    // insert into the users table

                        $sql = "INSERT INTO users (userID, fullname, email, phone_number, password, confirm_password, reg_date, otp, acct_type)
                        VALUES (0, '$fullname', '$email', '$phone_number', '$password1', '$confirm_password1', NOW(), '', 1)";
                        // use exec() because no results are returned
                        $query = mysqli_query($connection, $sql);

                        if($query == TRUE){
                            $_SESSION['user_email'] = $email;
            	            $_SESSION['phone_number'] = $phone_number;

                        //echo '<a href="otp_verification.php"><p style="color: green">A code was sent to your '.$_SESSION["phone_number"].' & '.$_SESSION["user_email"].', click here to enter code.</p></a>';
                        //header('Location: otp_verification.php');
                        echo "success";
                        } else{
                        echo "an error occured";
                        }
                }
        
        }

    }
?>