<?php 
    if(isset($_GET['status']))
    {
        //* check payment status
        if($_GET['status'] == 'cancelled')
        {
            // echo 'YOu cancel the payment';
            header('Location: index.php');
        }
        elseif($_GET['status'] == 'successful')
        {
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
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

            //exit();
              
              $res = json_decode($response);
              if($res->status)
              {
                $id = $res->data->id;
                $tx_ref = $res->data->tx_ref;
                $flw_ref = $res->data->flw_ref;
                $device_fingerprint = $res->data->device_fingerprint;
                $currency = $res->data->currency;
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                $app_fee = $res->data->app_fee;
                $merchant_fee = $res->data->merchant_fee;
                $processor_response = $res->data->processor_response;
                $auth_model = $res->data->auth_model;
                $ip = $res->data->ip;
                $narration = $res->data->narration;
                $status = $res->data->status;
                $payment_type = $res->data->payment_type;
                $trans_created_at = $res->data->created_at;
                $account_id = $res->data->account_id;
                $amount_settled = $res->data->amount_settled;
                $first_6digits = $res->data->card->first_6digits;
                $last_4digits = $res->data->card->last_4digits;
                $issuer = $res->data->card->issuer;
                $country = $res->data->card->country;
	            $type = $res->data->card->type;
                $token = $res->data->card->token;
                $expiry = $res->data->card->expiry;
                $customer_id = $res->data->customer->id;
                $name = $res->data->customer->name;
                $phone_number = $res->data->customer->phone_number;
                $email = $res->data->customer->email;
                $cust_created_at = $res->data->customer->created_at;
                if($amountPaid >= $amountToPay)
                {
                    echo 'Payment successful <br>';
                    echo 'ID - '.$id.'<br>
                         tx_ref - '.$tx_ref.'<br>
                         flw_ref - '.$flw_ref.'<br>
                         device_fingerprint - '.$device_fingerprint.'<br>
                         currency - '.$currency.'<br>
                         Amount_to_pay - '.$amountToPay.'<br>
                         Amount_to_pay - '.$amountToPay.'<br>
                         App_fee - '.$app_fee.'<br>
                         Merchant_fee - '.$merchant_fee.'<br>
                         Processor_response - '.$processor_response.'<br>
                         Auth_model - '.$auth_model.'<br>
                         IP - '.$ip.'<br>
                         Narration - '.$narration.'<br>
                         Status - '.$status.'<br>
                         Payment_type - '.$payment_type.'<br>
                         trans_created_at - '.$created_at.'<br>
                         account_id - '.$account_id.'<br>
                         amount_settled - '.$amount_settled.'<br>
                         first_6digits - '.$first_6digits.'<br>
                         last_4digits - '.$last_4digits.'<br>
                         issuer - '.$issuer.'<br>
                         country - '.$country.'<br>
                         type - '.$type.'<br>
                         token - '.$token.'<br>
                         expiry - '.$expiry.'<br>
                         customer_id - '.$customer_id.'<br>
                         name - '.$name.'<br>
                         phone_number - '.$phone_number.'<br>
                         email - '.$email.'<br>
                         cust_created_at - '.$created_at;


                        // INSERTING INTO TRANSACTIONS TABLE USING PDO

                        $servername = "localhost:8889";
                        $username = "root";
                        $password = "root";
                        $dbname = "money_talks";

                        try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO transactions (trans_id, tx_ref, flw_ref, device_fingerprint, amount, currency, charged_amount, app_fee, merchant_fee, processor_response, auth_model, ip, narration, status, payment_type, trans_created_at, account_id, amount_settled, first_6digits, last_4digits, issuer, country, type, token, expiry, customer_id, name, phone_number, email, cust_created_at, completed, confirmed_person, completed_date)
                        VALUES ('$id', '$tx_ref', '$flw_ref', '$device_fingerprint', '$amountPaid', '$currency', '$amountToPay', '$app_fee', '$merchant_fee', '$processor_response', '$auth_model', '$ip', '$narration', '$status', '$payment_type', '$trans_created_at', '$account_id', '$amount_settled', '$first_6digits', '$last_4digits', '$issuer', '$country', '$type', '$token', '$expiry', '$customer_id', '$name', '$phone_number', '$email', '$cust_created_at', 'No', 0, '0000-00-00')";
                        // use exec() because no results are returned
                        $conn->exec($sql);
                        echo "New record created successfully";
                        } catch(PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                        }
                         // END OF INSERTING INTO TRANSACTIONS TABLE USING PDO


                        // insert into the customers table
                        try {
                        $sql = "INSERT INTO customers (customer_id, customer_name, customer_phone, customer_email, cust_created_at)
                        VALUES ('$customer_id', '$name', '$phone_number', '$email', '$cust_created_at')";
                        // use exec() because no results are returned
                        $conn->exec($sql);
                        echo "New record created successfully";
                        } catch(PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                        }

                         // END OF INSERTING INTO customers TABLE USING PDO


                         // insert into the cards table
                        try {
                            $card_id = $name.'_'.$last_4digits;
                            $date_added = date("Y-m-d h:i:sa", $d);
                            $sql = "INSERT INTO card_table (card_id, customer_id, first_6digits, last_4digits, issuer, country, type, token, expiry, date_added)
                            VALUES ('$card_id', '$customer_id', '$first_6digits', '$last_4digits', '$issuer', '$country', '$type', '$token', '$expiry', '$date_added')";
                            // use exec() because no results are returned
                            $conn->exec($sql);
                            echo "New record created successfully";
                            } catch(PDOException $e) {
                            echo $sql . "<br>" . $e->getMessage();
                            }
    
                             // END OF INSERTING INTO cards TABLE USING PDO

                        $conn = null;
                                    
                           

                            //* Continue to give item to the user
                }
                else
                {
                    echo 'Fraud transaction detected';
                }
              }
              else
              {
                  echo 'Can not process payment';
              }
        }
    }
?>