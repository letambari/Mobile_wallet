<?php 
  // database connection  
  $connection = new mysqli("localhost:8889", "root", "root", "money_talks"); 
  $sphere = 'FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X';
  $app_url = 'https://api.flutterwave.com/v3';
  $app_title = 'Finwallapp - Mobile App';
  $app_name = 'Finwallapp';
  $app_spinner = 'Finwallapp';
  $servername = "localhost:8889";
  $username = "root";
  $password = "root";
  $dbname = "money_talks";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   $get_database_details = "SELECT * FROM database_details";
   $query_details = mysqli_query($conn, $get_database_details);
   while($row = mysqli_fetch_array($query_details)){

    $servername = $row['servername'];
    $username = $row['serveruser'];
    $password = $row['serverpassword'];
    $dbname = $row['serverdatabase'];

    // $servername = $row['servername'];
    // $username = $row['serveruser'];
    // $password = $row['serverpassword'];
    // $dbname = $row['serverdatabase'];
   }

// encryption & decryption code
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

  // encryption private unique salt
  $private_secret_key = '1fabcdefghijk4276388ad3214c87@@**3428dbef42243fkbjdbfhjbh@#$%^lmnopuvwxwz' ; //some random hex characters
  $the_acct_type1 = 1;
  $the_acct_type2 = 2;
  $the_acct_type3 = 3;

?>