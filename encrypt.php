<h1 style="text-align: center;">Encrypt/Decrypt String using a Private Secret Key with PHP</h1>
<?php
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
  $original_string = "5399419106366214";
  $private_secret_key = '1fabcdefghijk4276388ad3214c87@@**3428dbef42243fkbjdbfhjbh@#$%^lmnopuvwxwz' ; //some random hex characters
  $encrypted = encrypt($original_string,$private_secret_key);
  echo '<h3>Original String : '.$original_string.'</h3>';
  echo '<h3>After Encryption : '.$encrypted.'</h3>';
  echo '<h3>After Decryption : '.decrypt('9SnM+p6MCkVrD1SWbl4+zSjD8E6uwM8odyAR9HWTPqg=',$private_secret_key).'</h3>';



  // $get_cards = "SELECT card_id, email FROM added_cards WHERE card_id = '$card_id' AND customer_id = '$customer_id'";
  //                       $query_card = mysqli_query($conn, $get_cards);
  //                       $check_count = mysqli_num_rows($query_card);
  //                       if($check_count > 0){
  //                           echo '<div class="alert alert-danger">
  //                                       <b>Ooops!</b> There already saved.
  //                                   </div>';
  //                       }else {
  //                           echo '<div class="alert alert-danger">
  //                                       <b>Ooops!</b> There already saved.
  //                                   </div>';
  //                       }