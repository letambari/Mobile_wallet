<?php

if(isset($_POST['pay'])){

    $account_number = $_POST['account_number'];
    $business_name = $_POST['business_name'];

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
  CURLOPT_POSTFIELDS =>"{\n    \"account_bank\": \"044\",\n    \"account_number\": \"$account_number\",\n    \"business_name\": \"$business_name\",\n    \"business_email\": \"petya@stux.net\",\n    \"business_contact\": \"Anonymous\",\n    \"business_contact_mobile\": \".$trans_id.\",\n    \"business_mobile\": \"09087930450\",\n    \"country\": \"NG\",\n    \"meta\": [\n        {\n            \"meta_name\": \"mem_adr\",\n            \"meta_value\": \"0x16241F327213\"\n        }\n    ],\n    \"split_type\": \"percentage\",\n    \"split_value\": 0.5\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
} else {

}

?>