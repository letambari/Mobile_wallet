<?php
	session_start();

	if (isset($_SESSION["email"]) && isset($_SESSION["loggedIn"])) {
		header("Location: index.php");
		exit();
	}

	if (isset($_POST["logIn"])) {
		$connection = new mysqli("localhost", "root", "", "membershipSystem");
		
		$email = $connection->real_escape_string($_POST["email"]);
		$password = sha1($connection->real_escape_string($_POST["password"]));
		$data = $connection->query("SELECT firstName FROM users WHERE email='$email' AND password='$password'");

		if ($data->num_rows > 0) {
			$_SESSION["email"] = $email;
			$_SESSION["loggedIn"] = 1;
			
			header("Location: index.php");
			exit();

		} else {
			
			echo "Please check your inputs!";
		}
	}	
?>      
<html>
<body>            
	<form action="login.php" method="post"> 			 	                    			
    	<input type="text" name="email" placeholder="Email"/><br />															 <input type="password" name="password" placeholder="Password"/> <br />						                          <input type="submit" value="Log In" name= "logIn" > 				
    </form>    
</body>
</html>