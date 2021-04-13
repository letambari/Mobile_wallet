<?php
session_start();
if(isset($_GET['ref'])){
$card_id= htmlspecialchars($_GET["ref"]);

$customer_id = $_SESSION['user_email'];
$connection = new mysqli("localhost:8889", "root", "root", "money_talks");

$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "money_talks";

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$card_id = $name_on_card.'_'.$card_number_6;

          $sql = "UPDATE added_cards SET removed = 1 WHERE card_id = '$card_id' AND customer_id = '$customer_id'";
          
          // use exec() because no results are returned
          $conn->exec($sql);
          header("Location: cards.php");
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }

}
?>