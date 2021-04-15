<?php
session_start();
$userID = $_SESSION['userID'];

// $_SESSION['user_email'] = $email;
// $_SESSION['phone_number'] = $phone_number;

$confirm = htmlspecialchars($_POST["confirm"]);
$trans_id = htmlspecialchars($_POST["trans_id"]);

include 'connect.php';
$confirm = $connection->real_escape_string($confirm);  		

// check if password does not match

$sql = "UPDATE transactions SET in_favour = 'Received' WHERE trans_id = '$trans_id'";
// use exec() because no results are returned
$query = mysqli_query($connection, $sql);

if($query == TRUE){

echo "success";

} else{

        echo '<div class="alert alert-danger">
        <b>Ooops!</b> an error occured 😞.
        </div>';
}
?>