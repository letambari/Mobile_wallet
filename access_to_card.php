<?php
session_start();
$email = $_SESSION['user_email'];
$password1= htmlspecialchars($_POST["password"]);


include 'connect.php';

$password = sha1($connection->real_escape_string($password1));

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

if($password1 == ''){

    echo '<h5><span class="badge badge-warning">Warning!, Enter Password</span></h5>';

} else {

      
        $get_pass = "SELECT email, confirm_password FROM users WHERE email = '$email'";
        $query = mysqli_query($connection, $get_pass);
        while($row = mysqli_fetch_array($query)){

        $confirm_password = $row['confirm_password'];
       
        $confirm_password2 = decrypt($confirm_password,$_SESSION['private_secret_key']);

        if($confirm_password2 != $password){
            echo '<h5><span class="badge badge-warning">Warning!, Incorrect Password</span></h5>';
        } else {
            echo 'success';
        }
    }
    
}

?>