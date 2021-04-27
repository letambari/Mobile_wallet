<?php

// $curl = curl_init();

//                       curl_setopt_array($curl, array(
//                         CURLOPT_URL => "https://api.flutterwave.com/v3/settlements?subaccount_id=RS_44D6D0DD4B8CE75362200888671CC960",
//                         CURLOPT_RETURNTRANSFER => true,
//                         CURLOPT_ENCODING => "",
//                         CURLOPT_MAXREDIRS => 10,
//                         CURLOPT_TIMEOUT => 0,
//                         CURLOPT_FOLLOWLOCATION => true,
//                         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                         CURLOPT_CUSTOMREQUEST => "GET",
//                         CURLOPT_HTTPHEADER => array(
//                           "Authorization: Bearer FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X"
//                         ),
//                       ));

//                       $response = curl_exec($curl);

//                       curl_close($curl);
//                       $array = json_decode($response, true);
//                       $fl = $array['data'];//[0]; //['left'];

//                       $get = json_encode($fl);

//                       $sum = 0;
                      
//                       foreach($fl as $x_value) {
//                         "gross_amount=" . $x_value['gross_amount'];
                       
//                          ''.$sum += $x_value['gross_amount'];
                         
//                       }
//                       echo $sum;
                    
        
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/accounts/resolve",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n    \"account_number\": \"0163410790\",\n    \"account_bank\": \"058\",\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;




?>