<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/card-bins/539941",
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
echo $response;

$res = json_decode($response);
 if($res->status)
 {
   $issuing_country = $res->data->issuing_country;
   
   echo $issuing_country;

 }