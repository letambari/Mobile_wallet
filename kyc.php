<?php
session_start();
$user_email = $_SESSION['user_email'];
$user_phone_number = $_SESSION['phone_number'];
$account_bank = htmlspecialchars($_POST["search"]);
$account_number = htmlspecialchars($_POST["account_number"]);
$phone_number = htmlspecialchars($_POST["phone_number"]);
$business_name = htmlspecialchars($_POST["business_name"]);
$business_contact = htmlspecialchars($_POST["business_contact"]);
$country = htmlspecialchars($_POST["country"]);
$split_value = htmlspecialchars($_POST["split_value"]);
$business_contact_mobile = htmlspecialchars($_POST["business_contact_mobile"]);
$business_email = htmlspecialchars($_POST["business_email"]);
$split_type = htmlspecialchars($_POST["split_type"]);
$business_address = htmlspecialchars($_POST["business_address"]);


$connection = new mysqli("localhost:8889", "root", "root", "money_talks");

$account_bank = $connection->real_escape_string($account_bank);  		
$account_number = $connection->real_escape_string($account_number);  				
$phone_number = $connection->real_escape_string($phone_number);  
$business_name = $connection->real_escape_string($business_name);
$business_contact = $connection->real_escape_string($business_contact);
$country = $connection->real_escape_string($country);  		
$split_value = $connection->real_escape_string($split_value);  				
$business_contact_mobile = $connection->real_escape_string($business_contact_mobile);  
$business_email = $connection->real_escape_string($business_email);
$split_type = $connection->real_escape_string($split_type);
$business_address = $connection->real_escape_string($business_address);


// singlebyte strings
//$string = "123-46-78-000";
$acct_code = explode ("-", $account_bank); 
$acct_code = $acct_code[1];

$country_code = explode ("-", $country); 
$country_code[1];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/subaccounts/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n    \"account_bank\": \"$acct_code\",\n    \"account_number\": \"$account_number\",\n    \"business_name\": \"$business_name\",\n    \"business_email\": \"$business_email\",\n    \"business_contact\": \"$business_contact\",\n    \"business_contact_mobile\": \".$business_contact_mobile.\",\n    \"business_mobile\": \"$business_contact_mobile\",\n    \"country\": \"$country_code\",\n    \"meta\": [\n        {\n            \"business_address\": \"$business_address\",\n            \"business_address\": \"$business_address\"\n        }\n    ],\n    \"split_type\": \"$split_type\",\n    \"split_value\": $split_value\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$res = json_decode($response);

if($res->status == 'success')
{
    $userID = $res->data->id;
    
    $create_sub_account = "INSERT INTO sub_account (userID, account_bank, account_number, phone_number, business_name, business_contact, country, split_value, business_contact_mobile, business_email, split_type, business_address, join_date) VALUES ('$userID', '$account_bank', '$account_number', '$phone_number', '$business_name', '$business_contact', '$country', '$split_value', '$business_contact_mobile', '$business_email', '$split_type', '$business_address', NOW())";
    $query = mysqli_query($connection, $create_sub_account);
    //echo $query;
    //exit();
            if($query == TRUE){
                $create_sub_account = "UPDATE users SET userID = '$userID', acct_type = 2";
                $query = mysqli_query($connection, $create_sub_account);
                echo 'success';
            }else {
                # code...
                echo '<div class="alert alert-danger">
                <b>Ooops!</b> Your request could not be processed.1
            </div>';
            }
}
elseif($res->status == 'error')
{
    $error_meaasge = $res->message;
   echo  '<div class="alert alert-danger">
    <b>Ooops!</b> A Business with the Account number exists.
</div>';
}

?>
