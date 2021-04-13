<?php
session_start();
$a = htmlspecialchars($_POST["a"]);
$b = htmlspecialchars($_POST["b"]);
$c = htmlspecialchars($_POST["c"]);
$d = htmlspecialchars($_POST["d"]);

$connection = new mysqli("localhost:8889", "root", "root", "money_talks");
$a = $connection->real_escape_string($a);  		
$b = $connection->real_escape_string($b);  				
$c = $connection->real_escape_string($c); 
$d = $connection->real_escape_string($d); 

// check if code does not match
$otp = $a.''.$b.''.$c.''.$d;

if($a == "" || $b == "" || $c == "" || $d == ""){
    echo '<p style="color: red">Please fill in all fields</p>'; 
} else {


            $get_user = "SELECT * FROM users WHERE otp = '$otp'";
            $query = mysqli_query($connection, $get_user);
            $countit = mysqli_num_rows($query);


                if($countit < 0){
                    echo '<p style="color: red">Incorrect or Expired CODE</p>';
                } else{
                    while($row = mysqli_fetch_array($query)){
                        //$row = mysqli_fetch_assoc($query);
                    
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['phone_number'] = $row['phone_number'];
                        
                    // update the users table

                        $sql = "UPDATE users SET otp = 'done'";
                        // use exec() because no results are returned
                        $query = mysqli_query($connection, $sql);

                        if($query == TRUE){

                        //echo '<a href="congragutlations.php"><p style="color: green">Your Account was verified successfully, click '.$_SESSION['user_email'].'</p></a>';
                        //header('Location: otp_verification.php');
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['phone_number'] = $row['phone_number'];
                        echo "success";
                        } else{
                        echo "an error occured";
                        }
                    }
        
        }

    }
?>