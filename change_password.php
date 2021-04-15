<?php
session_start();
$email = $_SESSION['user_email'];
$phone_number = $_SESSION['phone_number'];


$password1 = htmlspecialchars($_POST["password"]);
$confirm_password2 = htmlspecialchars($_POST["confirm_password"]);

include 'connect.php';			
$password = sha1($connection->real_escape_string($password1));  
//$confirm_password = sha1($connection->real_escape_string($confirm_password));
$confirm_password = sha1($connection->real_escape_string($confirm_password2));

// echo '<div class="alert alert-danger">
// <b>Ooops!</b> Please fill in all details.
// </div>';

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


  $original_string = $password;
  $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
  $password = encrypt($original_string,$private_secret_key);

  $original_string = $confirm_password;
  $private_secret_key = $_SESSION['private_secret_key']; //some random hex characters
  $confirm_password = encrypt($original_string,$private_secret_key);


// check if password does not match

if($password1 == "" || $confirm_password2 == ""){
    echo '<div class="alert alert-danger">
   <b>Ooops!</b> Please fill in all details.
   </div>';
} else {

        if($password1 != $confirm_password2){
                            echo '<div class="alert alert-danger">
                <b>Ooops!</b> your password does not match
                </div>';
           
        } else {

                $update_password = "UPDATE users SET password = '$password', confirm_password = '$confirm_password' WHERE email = '$email' AND phone_number = '$phone_number'";
                $query = mysqli_query($connection, $update_password);

                if($query == TRUE){
                    echo '<div class="alert alert-success">
                <b>Nice!</b> your password is more SECURED!!! :)
                </div>';
                } else{
                    // insert into the users table

                    echo '<div class="alert alert-danger">
                    <b>Ooops!</b> an error occured.
                    </div>';
                        

                }
        
        }

    }
?>