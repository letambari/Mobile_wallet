<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "{{BASE_API_URL}}/accounts/resolve",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n    \"account_number\": \"0690000032\",\n    \"account_bank\": \"044\",\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
     'Authorization': 'Bearer {SEC_KEY}'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;