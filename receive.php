<?php
session_start();
$fullname = htmlspecialchars($_POST["fullname"]);
$email = htmlspecialchars($_POST["email"]);
$phone_number = htmlspecialchars($_POST["phone_number"]);
$password = htmlspecialchars($_POST["password"]);
$confirm_password = htmlspecialchars($_POST["confirm_password"]);

include 'connect.php';
$firstName = $connection->real_escape_string($fullname);  		
$email = $connection->real_escape_string($email);  				
$password = sha1($connection->real_escape_string($password));  
//$confirm_password = sha1($connection->real_escape_string($confirm_password));
$confirm_password = sha1($connection->real_escape_string($confirm_password));

  $original_string = $confirm_password;
  $confirm_password1 = encrypt($original_string,$private_secret_key);

  $password = $password;
  $password1 = encrypt($password,$private_secret_key);

// check if password does not match

if($fullname == "" || $email == "" || $password == "" || $confirm_password == ""){
    
  echo '<div class="alert alert-danger">
  <b>Warning!, Please fill in all fields
  </div>';
} else {

      if($password != $confirm_password){

      echo '<div class="alert alert-danger">
          <b>Ooops!</b> your password does not match
          </div>';
      } else {

          $get_user = "SELECT * FROM users WHERE email = '$email' OR phone_number = '$phone_number'";
          $query = mysqli_query($connection, $get_user);
          $countit = mysqli_num_rows($query);

              if($countit > 0){
                  
          echo '<div class="alert alert-danger">
          <b>Ooops!</b> User details already exists
          </div>';
              } else{
                  // insert into the users table

                      $sql = "INSERT INTO users (userID, fullname, email, phone_number, password, confirm_password, reg_date, otp, acct_type)
                      VALUES (0, '$fullname', '$email', '$phone_number', '$password1', '$confirm_password1', NOW(), '', 1)";
                      // use exec() because no results are returned
                      $query = mysqli_query($connection, $sql);

                      if($query == TRUE){
                        $_SESSION['user_email'] = $email;
                        $_SESSION['phone_number'] = $phone_number;

                      //echo '<a href="otp_verification.php"><p style="color: green">A code was sent to your '.$_SESSION["phone_number"].' & '.$_SESSION["user_email"].', click here to enter code.</p></a>';
                      //header('Location: otp_verification.php');
                      echo "success";
                      } else{
                      
                              echo '<div class="alert alert-danger">
                              <b>Ooops!</b> an error occured
                              </div>';
                      }
              }
      
      }

  }
?>