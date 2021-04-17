<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/transactions",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

echo '<pre>';
echo $response;
echo '</pre>';

exit();
$res = json_decode($response);
if($res->status != 'success'){
    echo "no transaction history";
}else{
  $sub_account = $res->data;
  $myJSON = json_encode($sub_account);
  //echo $myJSON;
  

  echo '<pre>';
echo $myJSON;
echo '</pre>';
}





// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://api.flutterwave.com/v3/card-bins/539941",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_HTTPHEADER => array(
//     "Authorization: Bearer FLWSECK_TEST-1534480118f4484ed5c01b9412262e6c-X"
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

// $res = json_decode($response);
//  if($res->status)
//  {
//    $issuing_country = $res->data->issuing_country;
   
//    echo $issuing_country;

// getting all the settlements
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "{$app_url}/settlements?subaccount_id={$sub_subaccount_id}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer {$sphere}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$res = json_decode($response,TRUE);

$array = json_decode($response, true);
$fl = $array['data'][0]; //['left'];
$fl['id'];


foreach($fl as $x => $x_value) {
//  echo "Key=" . $x . ", Value=" . $x_value;
//echo "<br>";
}

//exit();

if($res->status == 'success')
{ $res->data;

$sub_settlement_id = $res->data->id;
$sub_settlement_account_id = $res->data->account_id;
$sub_settlement_merchant_name = $res->data->merchant_name;
$sub_settlement_merchant_email = $res->data->merchant_email;
$sub_settlement_settlement_account = $res->data->settlement_account;
$sub_settlement_transaction_date = $res->data->transaction_date;
$sub_settlement_due_date = $res->data->due_date;
$sub_settlement_processed_date = $res->data->processed_date;
$sub_settlement_status = $res->data->status;
$sub_settlement_is_local = $res->data->is_local;
$sub_settlement_currency = $res->data->currency;
$sub_settlement_gross_amount = $res->data->gross_amount;
$sub_settlement_app_fee = $res->data->app_fee;

$sub_settlement_merchant_fee = $res->data->merchant_fee;
$sub_settlement_chargeback = $res->data->chargeback;
$sub_settlement_refund = $res->data->refund;
$sub_settlement_stampduty_charge = $res->data->stampduty_charge;
$sub_settlement_net_amount = $res->data->net_amount;
$sub_settlement_transaction_count = $res->data->transaction_count;
$sub_settlement_processor_ref = $res->data->processor_ref;
$sub_settlement_disburse_ref = $res->data->disburse_ref;
$sub_settlement_disburse_message = $res->data->disburse_message;
$sub_settlement_channel = $res->data->channel;
$sub_settlement_destination = $res->data->destination;
$sub_settlement_flag_message = $res->data->flag_message;
$sub_settlement_created_at = $res->data->created_at;

//echo $sub_settlement_id;
//exit();
$recent_settlement .= ' <a href="transaction_details.php?tx_ref='.$sub_settlement_id.'">
<li class="list-group-item">
<div class="row align-items-center">
<div class="col-auto pr-0">
    <div class="avatar avatar-40 rounded">
        <div class="background">
           <!-- <img src="img/user2.png" alt=""> -->
        </div>
    </div>
</div>
<div class="col align-self-center pr-0">
    <h6 class="font-weight-normal mb-1">'.$sub_settlement_merchant_name.'</h6>
    <p class="small text-secondary">'.$sub_settlement_created_at.'</p>
</div>
<div class="col-auto">
    <h6 class="text-success">'.$sub_settlement_currency.''.$sub_settlement_net_amount.''.$sub_settlement_flag_message.'</h6>
</div>
</div>
</li>
</a>';

}else{
$recent_settlement = "no user found";
}
 ?>