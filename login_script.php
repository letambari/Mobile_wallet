<?php
session_start();
include 'connect.php';

$user_details = htmlspecialchars($_POST["user_detail"]);
$password = htmlspecialchars($_POST["password"]);

$user_details = $connection->real_escape_string($user_details);
$password1 = sha1($connection->real_escape_string($password));

if($password == '' || $user_details == ''){

    echo '<div class="alert alert-danger">
    <b> Warning!</b>, Enter Your Login Details.
    </div>';

} else {

      
        $get_pass = "SELECT * FROM users WHERE email = '$user_details' OR phone_number = '$user_details'";
        $query = mysqli_query($connection, $get_pass);
        while($row = mysqli_fetch_array($query)){

        $confirm_password = $row['confirm_password'];
        $email = $row['email'];
        $phone_number = $row['phone_number'];
       
        $confirm_password2 = decrypt($confirm_password,$private_secret_key);

        if($confirm_password2 != $password1){
           echo '<div class="alert alert-danger">
            <b> Oops!</b>, Incorrect Password.
            </div>';
        } else {
            $_SESSION['user_email'] = $email;
            $_SESSION['phone_number'] = $phone_number;
            echo 'success';
        }
    }
    
}

?>